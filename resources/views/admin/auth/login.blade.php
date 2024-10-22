@extends('admin.layouts.admin_login')

@section('content')

<div class="form-box-padding form-midd-center mob-d-table">
    <div class="container">
    <div class="formwhitebg sm-box-width form-secton">
        <div class="form-logo text-center"><img src="{{ asset('images/logo-red.png')}}" alt=""></div>
        <div class="form-title">
            <h3 class="ft-w-600">{{ __('Login')}}</h3>
            <p>{{ __('Please enter your details below.')}}</p>
        </div>   
        <div class="on-bording-form-part">
            <form class="items-center" method="POST" action="{{ route('verify_user')}}">
                @csrf
                <div class="mb-3">
                <label class="form-label">{{ __('Email')}}</label>
                <div class="form-input-icon">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Enter your email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                    <div class="form-mes-icon desk-none"><a href=""><img src="{{ asset('images/help-icon.svg')}}" alt=""></a></div>
                    @error('email')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Password')}}</label>
                    <div class="form-input-icon">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" autocomplete="current-password">
                        <div class="form-mes-icon"><a href=""><img src="{{ asset('images/eye-icon.svg')}}" alt=""></a></div>
                        @error('password')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                <!-- <div class="mb-3">
                    <div class="form-check">
                        <input id="remember-checkbox" class="form-check-input" type="checkbox">
                        <label for="remember-checkbox" class="form-label form-check-label opacity-70">{{ __('Remember for 30 days')}}</label>
                    </div>
                </div> -->
                <div class="mb-3">
                    <div class="forget-a d-md-block"><a href="#">{{ __('Forgot password')}}</a></div>
                </div>
                </div>
                <div class="mb-3 onbording-form-btn"><input class="btn btn-primary btn-full" type="submit" value="Sign in"></div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
