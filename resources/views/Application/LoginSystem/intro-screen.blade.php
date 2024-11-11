@extends('Application.Layout.login-system')
@section('content')
<div class="intro-banner-section">
    <div class="container p-0">
        <div class="swiper mySwiper intro-slider">
            <div class="swiper-wrapper">
                @if(!empty($intro_screen_data))
                @foreach($intro_screen_data as $intro_screen)
                <div class="swiper-slide">
                    <div class="intro-bannerimg">
                        <a><img src="{{ GetStoragePath($intro_screen->image) }}" alt="{{ $intro_screen->title }}"></a>
                    </div>
                    <div class="info-banner-content">
                        <h1>{{ $intro_screen->title }}</h1>
                    </div>
                </div>
                @endforeach
                @endif
                <!-- <div class="swiper-slide">
                    <div class="intro-bannerimg">
                        <a href="login.html"><img src="{{ asset('assets/images/intro-slider-img-1.jpg') }}" alt=""></a>
                    </div>
                    <div class="info-banner-content">
                        <h1>Show and Event <br>Security</h1>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="intro-bannerimg">
                        <a href="login.html"><img src="{{ asset('assets/images/intro-slider-img-2.jpg') }}" alt=""></a>
                    </div>
                    <div class="info-banner-content">
                        <h1>Manned Guarding <br>Security</h1>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="intro-bannerimg">
                        <a href="login.html"><img src="{{ asset('assets/images/intro-slider-img-3.jpg') }}" alt=""></a>
                    </div>
                    <div class="info-banner-content">
                        <h1>Mobile Patrols<br>Security</h1>
                    </div>
                </div> -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="skip-link"><a href="{{ route('app.signin_role') }}">Skip</a></div>
    </div>
</div>
@endsection
@section('custom_javascript')
<script>
    var intro_screen = new Swiper(".intro-slider", {
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
@endsection