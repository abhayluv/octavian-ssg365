@extends('Application.Layout.login-system')
@section('content')
<div class="login-screen text-center">
    <div class="container">
        <div class="loging-midd-sec">
            <div class="login-logo"><img src="{{ asset('assets/images/logo.png') }}" alt=""></div>
            <h1>Sign Up</h1>
            <div class="flex-center-between login-user-list">
                <div class="login-box">
                    <a href="{{ route('app.signup_email', 'officer') }}">
                        <div class="login-user"><img src="{{ asset('assets/images/guard-icon.png') }}" alt="Officer"></div>
                        <h3>Officer</h3>
                    </a>
                </div>
                <div class="login-box">
                    <a href="{{ route('app.signup_email', 'client') }}">
                        <div class="login-user"><img src="{{ asset('assets/images/client-icon.png') }}" alt="Client"></div>
                        <h3>Client</h3>
                    </a>
                </div>
                <!-- <div class="login-box">
                    <a href="signup-email.html">
                        <div class="login-user"><img src="{{ asset('assets/images/admin-icon.png') }}" alt="Admin"></div>
                        <h3>Admin</h3>
                    </a>
                </div> -->
            </div>
            <div class="login-sub-cont">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor.
            </div>
            <div class="form-message-text text-right">Already registered? <a href="{{ route('app.signin_role') }}">Sign In</a></div>
        </div>
    </div>
</div>
@endsection