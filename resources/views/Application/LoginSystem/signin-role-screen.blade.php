@extends('Application.Layout.login-system')
@section('content')
<div class="login-screen text-center">
    <div class="container">
        <div class="loging-midd-sec">
            <div class="login-logo"><img src="{{ asset('assets/images/logo.png') }}" alt=""></div>
            <h1>Sign In</h1>
            <div class="flex-center-between login-user-list">
                <div class="login-box">
                    <a href="{{ route('app.signin_email') }}">
                        <div class="login-user"><img src="{{ asset('assets/images/guard-icon.png') }}" alt=""></div>
                        <h3>Email</h3>
                    </a>
                </div>
                <div class="login-box">
                    <a href="{{ route('app.signin_phone') }}">
                        <div class="login-user"><img src="{{ asset('assets/images/client-icon.png') }}" alt=""></div>
                        <h3>Phone</h3>
                    </a>
                </div>
                <div class="login-box">
                    <a href="{{ route('app.signin_mpin') }}">
                        <div class="login-user"><img src="{{ asset('assets/images/admin-icon.png') }}" alt=""></div>
                        <h3>M-PIN</h3>
                    </a>
                </div>
            </div>
            <div class="login-sub-cont">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor.
            </div>
        </div>
    </div>
</div>
@endsection