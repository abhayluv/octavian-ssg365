<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GeneralSetting;
use App\Models\IntroScreen;

class AppLoginSystemController extends Controller
{
    public $general_setting_model, $intro_screen_model;
    public function __construct()
    {
        $this->general_setting_model = new GeneralSetting;
        $this->intro_screen_model = new IntroScreen;
    }

    public function splashScreen()
    {
        $title = 'Splash Screen';
        $general_setting = $this->general_setting_model->getLastInsertedId();
        return view('Application.LoginSystem.splash-screen', compact('title', 'general_setting'));
    }

    public function introScreen()
    {
        $title = 'Intro Screen';
        $intro_screen_data = $this->intro_screen_model->getAllData();
        return view('Application.LoginSystem.intro-screen', compact('title', 'intro_screen_data'));
    }

    public function signinRoleScreen()
    {
        $title = 'Signin Role';
        return view('Application.LoginSystem.signin-role-screen', compact('title'));
    }

    public function signinEmailScreen()
    {
        $title = 'Signin Email';
        return view('Application.LoginSystem.signin-email', compact('title'));
    }

    public function signinPhoneScreen()
    {
        $title = 'Signin Phone';
        return view('Application.LoginSystem.signin-phone', compact('title'));
    }

    public function signinMpinScreen()
    {
        $title = 'Signin M-PIN';
        return view('Application.LoginSystem.signin-mpin', compact('title'));
    }

    public function signupRoleScreen()
    {
        $title = 'Signup Role';
        return view('Application.LoginSystem.signup-role-screen', compact('title'));
    }

    public function signupEmailScreen($role = '')
    {
        $title = 'Signup Email';
        return view('Application.LoginSystem.signup-email-screen', compact('title', 'role'));
    }

    public function signupEmailSend(Request $request)
    {
        $input = $request->all();
        $role_id = SystemRoles('', $input['role']);
        echo $role_id;
        die;
    }
}
