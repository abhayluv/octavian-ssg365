<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppLoginSystemController extends Controller
{
    public function splashScreen()
    {
        $title = 'Splash Screen';
        return view('Application.LoginSystem.splash-screen', compact('title'));
    }

    public function introScreen()
    {
        $title = 'Intro Screen';
        return view('Application.LoginSystem.intro-screen', compact('title'));
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
