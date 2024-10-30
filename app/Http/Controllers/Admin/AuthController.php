<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard')
                ->withSuccess('You have Successfully loggedin');
        }
        return redirect("admin.login")->withError('You have entered invalid credentials');
    }

    public function dashboard()
    {
        // if(Auth::check()){
        return view('admin.dashboard');
        // }

        // return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function registration()
    {
        return view('admin.auth.registration');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_pass' => 'required|same:password',
        ]);

        $data = $request->all();
        $user = $this->create($data);

        return redirect()->route('admin.login')->withSuccess('Registration Successfull! Please Login.');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect()->route('admin.login');
    }
}
