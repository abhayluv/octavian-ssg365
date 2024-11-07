@extends('Application.Layout.login-system')
@section('content')
<div class="signup-wrapper h-100">
    <div class="positionfixed">
        <div class="container">
            <div class="flex-center-between topbar-sec">
                <div class="back-arrow-topbar min-w-topbar"><a href="{{ route('app.signin_role') }}"><img src="{{ asset('assets/images/back-arrow.svg') }}" alt=""></a></div>
                <h3>Sign In</h3>
                <div class="right-topbar min-w-topbar"></div>
            </div>
        </div>
    </div>
    <div class="container h-100">
        <div class="signup-form PTB-full-screen h-100">
            <form action="signup-verification.html" class="form-d-flex h-100">
                <div class="form-detail">
                    <div class="mb-3">
                        <label class="form-label">Enter your M-PIN *</label>
                        <div class="inputicon"><input type="email" class="form-control" placeholder="Enter your 4 digit M-PIN">
                            <div class="forminput-icon"><img src="{{ asset('assets/images/eye-on-icon.svg') }}" alt=""></div>
                        </div>
                        <div class="form-message-text text-right">You haven't registered? <a href="{{ route('app.signup_role') }}">Sign Up</a></div>
                    </div>
                </div>
                <div class="btn-PB">
                    <input type="submit" class="btn btn-primary w-100" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection