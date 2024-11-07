@extends('Application.Layout.login-system')
@section('content')
<div class="flex-center-center splash-screen">
    <div class="container">
        <div class="splash-logo" data-aos="fade-down" data-aos-delay="100"><a><img src="{{ asset('assets/images/logo.png') }}" alt=""></a></div>
    </div>
</div>
@endsection
@section('custom_javascript')
<script>
    function aos_init() {
        AOS.init({
            duration: 1500,
            easing: "ease-in-out",
            once: true,
            mirror: false
        });
    }
    window.addEventListener('load', () => {
        aos_init();
    });

    setTimeout(() => {
        let route = "{{ route('app.intro') }}";
        window.location.href = route;
    }, 2000);
</script>
@endsection