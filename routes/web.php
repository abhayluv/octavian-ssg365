<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/* Start:: Admin Controller */
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\IntroScreenController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SiaController;
/* End:: Admin Controller */

/* Start:: Application Controller */
use App\Http\Controllers\Application\AppLoginSystemController;
/* End:: Application Controller */



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('app')->name('app.')->group(function () {
    Route::get('/', [AppLoginSystemController::class, 'splashScreen'])->name('splash');
    Route::get('intro', [AppLoginSystemController::class, 'introScreen'])->name('intro');
    Route::get('signin_role', [AppLoginSystemController::class, 'signinRoleScreen'])->name('signin_role');
    Route::get('signin_email', [AppLoginSystemController::class, 'signinEmailScreen'])->name('signin_email');
    Route::get('signin_phone', [AppLoginSystemController::class, 'signinPhoneScreen'])->name('signin_phone');
    Route::get('signin_mpin', [AppLoginSystemController::class, 'signinMpinScreen'])->name('signin_mpin');
    Route::get('signup_role', [AppLoginSystemController::class, 'signupRoleScreen'])->name('signup_role');
    Route::get('signup/{role}', [AppLoginSystemController::class, 'signupEmailScreen'])->name('signup_email');
    Route::post('signup_email_send', [AppLoginSystemController::class, 'signupEmailSend'])->name('signup_email_send');
});

/* Start:: Web Application */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('verify', [AuthController::class, 'verify'])->name('verify_user');
    // Route::post('store-user', [AuthController::class, 'store'])->name('user_store');
    // Route::get('registration', [AuthController::class, 'registration'])->name('registration');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        Route::prefix('manage_services')->name('manage_service.')->group(function () {
            Route::get('/', [ServiceController::class, 'index'])->name('index');
            Route::get('/create', [ServiceController::class, 'create'])->name('create');
            Route::post('/store', [ServiceController::class, 'store'])->name('store');
            Route::get('{id}/edit', [ServiceController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [ServiceController::class, 'update'])->name('update');
            Route::delete('{id}/delete', [ServiceController::class, 'destroy'])->name('delete');
        });

        Route::prefix('sia_licences')->name('sia_licence.')->group(function () {
            Route::get('/', [SiaController::class, 'index'])->name('index');
            Route::get('/create', [SiaController::class, 'create'])->name('create');
            Route::post('/store', [SiaController::class, 'store'])->name('store');
            Route::get('{id}/edit', [SiaController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [SiaController::class, 'update'])->name('update');
            Route::delete('{id}/delete', [SiaController::class, 'destroy'])->name('delete');
        });

        Route::prefix('general_settings')->name('general_setting.')->group(function () {
            Route::get('/', [GeneralSettingController::class, 'index'])->name('index');
            Route::post('save', [GeneralSettingController::class, 'save'])->name('save');
        });

        Route::prefix('intro_screen')->name('intro_screen.')->group(function () {
            Route::get('/', [IntroScreenController::class, 'index'])->name('index');
            Route::post('save', [IntroScreenController::class, 'save'])->name('save');
            Route::delete('{id}/delete', [IntroScreenController::class, 'destroy'])->name('delete');
        });
    });
});
/* End:: Web Application */

Route::get('/clear', function () {
    // Config::set('app.debug', true);
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('storage:link');
    return "Cleared!";

    // Create the storage link
    // Artisan::call('storage:link');

    // return "Cleared and storage link created!";
});
