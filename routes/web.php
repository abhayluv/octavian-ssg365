<?php

use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\IntroScreenController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SiaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/', function () {
    return redirect()->route('login');
}); 


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('verify', [AuthController::class, 'verify'])->name('verify_user');
Route::post('store-user', [AuthController::class, 'store'])->name('user_store');
Route::get('registration', [AuthController::class, 'registration'])->name('registration');

Route::prefix('admin')->name('admin.')->group(function () {

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