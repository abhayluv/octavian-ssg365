@extends('Application.Layout.login-system')
@section('content')
<div class="signup-wrapper h-100">
    <div class="positionfixed">
        <div class="container">
            <div class="flex-center-between topbar-sec">
                <div class="back-arrow-topbar min-w-topbar"><a href="{{ route('app.signup_role') }}"><img src="{{ asset('assets/images/back-arrow.svg') }}" alt=""></a></div>
                <h3>Sign Up</h3>
                <div class="right-topbar min-w-topbar"></div>
            </div>
        </div>
    </div>
    <div class="container h-100">
        <div class="signup-form PTB-full-screen h-100">
            <form class="form-d-flex h-100">
                <div class="form-detail">
                    <div class="mb-3">
                        <label class="form-label">Enter your email *</label>
                        <div class="inputicon">
                            <input type="email" id="email" class="form-control" placeholder="email">
                            <div class="forminput-icon">
                                <img src="{{ asset('assets/images/email-icon.svg') }}" alt="">
                            </div>
                        </div>
                        <span class="text-danger" id="emailErr"></span>
                        <div class="form-message-text">A code will be sent to your email.</div>
                        <div class="form-message-text text-right">already registered? <a href="{{ route('app.signin_role') }}">Sign Up</a></div>
                    </div>
                </div>
                <div class="btn-PB">
                    <!-- <input type="button" class="btn btn-primary w-100" value="Submit" id="registerEmail"> -->
                    <button type="button" class="btn btn-primary w-100" id="registerEmail">
                        Submit
                        <div class="spinner-grow spinner-grow-sm d-none" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('custom_javascript')
<script>
    $('#registerEmail').click(function() {
        let role = "{{ Request()->segment(3) }}";
        let email = $('#email').val();
        let allowed_email = /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/;
        alert(role);
        if (email == '') {
            $('#emailErr').text('Please enter email');
        } else if (!validateEmail(email)) {
            $('#emailErr').text('Invalid email');
        } else if (role != '' && role != null && (role == 'officer' || role == 'client')) {
            $('#registerEmail').attr('disabled', true);
            $('#registerEmail .spinner-grow').removeClass('d-none');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ route('app.signup_email_send') }}",
                method: "POST",
                data: {
                    'email': 'as',
                    'role': role
                },
                success: function(res) {
                    SuccessMsg(res.message);
                },
                error: function(r) {
                    let res = r.responseJSON;
                    ErrorMsg(res.error.message);
                }
            });
        } else {

        }
    });
</script>
@endsection