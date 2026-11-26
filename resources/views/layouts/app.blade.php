<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @php
        // @section content is already HTML-escaped by Blade, so these are printed with {!! !!} below.
        $seoTitle = trim($__env->yieldContent('title')) ?: e('Bismillah Islamic Academy - Learn Quran & Islamic Studies');
        $seoDescription = trim($__env->yieldContent('meta_description')) ?: e('Learn Quran online with qualified teachers: Norani Qaida, Nazra, Tajweed, Hifz, Islamic Studies and Arabic. Live one-on-one classes for kids and adults. Book a free trial.');
        $seoImage = trim($__env->yieldContent('og_image')) ?: e(asset('storage/logo.png'));
    @endphp
    <title>{!! $seoTitle !!}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="{!! $seoDescription !!}">
    <link rel="canonical" href="{{ url()->current() }}">
    @hasSection('robots')<meta name="robots" content="@yield('robots')">@endif

    <!-- Link previews (WhatsApp, Facebook, X) -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="Bismillah Islamic Academy">
    <meta property="og:title" content="{!! $seoTitle !!}">
    <meta property="og:description" content="{!! $seoDescription !!}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{!! $seoImage !!}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" href="{{ asset('favicon-32.png') }}" type="image/png" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Amiri:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}?v={{ @filemtime(public_path('css/style.css')) }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}?v={{ @filemtime(public_path('css/site.css')) }}">
    {{-- Each page adds its own stylesheet here (same position as before, so the cascade is unchanged) --}}
    @stack('page-css')


    <style>
        /* ============================================================
           BISMILLAH ISLAMIC ACADEMY — THEME
           Navy #0D1B2A  |  Gold #AE8225  |  White #FFFFFF
        ============================================================ */
        :root {
            --gold: #AE8225;
            --gold-light: #D4A843;
            --gold-pale: #F0DCA0;
            --gold-dark: #7A5A18;
            --navy: #0D1B2A;
            --navy-mid: #122233;
            --navy-light: #1A3048;
            --white: #ffffff;
            --off-white: #FAFAF7;
            --light-bg: #F5F3EE;
            --border: rgba(174, 130, 37, 0.25);
            --border-soft: rgba(174, 130, 37, 0.12);
            --text-dark: #0D1B2A;
            --text-mid: #3D4F61;
            --text-muted: #7A8FA0;
            --primary: #AE8225;
            --secondary: #0D1B2A;
            --light: #F5F3EE;
            --dark: #0D1B2A;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            max-width: 100%;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--white);
            color: var(--text-dark);
            max-width: 100vw;
        }

        .row {
            --bs-gutter-x: 1.5rem;
            margin-right: 0 !important;
            margin-left: 0 !important;
        }

        .row>* {
            padding-right: calc(var(--bs-gutter-x) * 0.5) !important;
            padding-left: calc(var(--bs-gutter-x) * 0.5) !important;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 767px) {
            .container {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }

            .container-xxl {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .container-xxl>.container {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Inter', sans-serif;
        }

        a,
        button,
        [role="button"],
        label[for],
        select,
        summary,
        input[type="submit"],
        input[type="button"],
        input[type="reset"],
        input[type="checkbox"],
        input[type="radio"],
        .btn,
        .nav-link,
        .dropdown-item,
        .dropdown-toggle,
        .navbar-toggler,
        .carousel-control-prev,
        .carousel-control-next,
        .carousel-indicators button,
        .owl-prev,
        .owl-next,
        .owl-dot,
        .back-to-top,
        .hiw-card,
        .hiw-cta-btn,
        .bia-socials a,
        .bstrip-socials a,
        .bstrip-enroll,
        .bia-enroll-btn,
        .btn-enroll,
        .team-social a,
        .stat-item {
            cursor: pointer !important;
        }

        /* ===== SPINNER ===== */
        #spinner {
            position: fixed;
            inset: 0;
            background: var(--navy);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 99999;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.6s ease, visibility 0.6s ease;
        }

        #spinner.hide {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .spinner-logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 2px solid rgba(174, 130, 37, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 28px;
            position: relative;
        }

        .spinner-logo-arabic {
            font-family: 'Amiri', serif;
            color: var(--gold);
            font-size: 22px;
            line-height: 1;
        }

        .spinner-ring {
            position: absolute;
            inset: -8px;
            border: 3px solid transparent;
            border-top-color: var(--gold);
            border-right-color: rgba(174, 130, 37, 0.3);
            border-radius: 50%;
            animation: spinnerSpin 1s linear infinite;
        }

        .spinner-ring-outer {
            position: absolute;
            inset: -18px;
            border: 1px solid rgba(174, 130, 37, 0.15);
            border-top-color: rgba(174, 130, 37, 0.5);
            border-radius: 50%;
            animation: spinnerSpin 2s linear infinite reverse;
        }

        @keyframes spinnerSpin {
            to {
                transform: rotate(360deg);
            }
        }

        .spinner-text {
            font-family: 'Inter', sans-serif;
            color: rgba(255, 255, 255, 0.85);
            font-size: 11px;
            letter-spacing: 5px;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .spinner-sub {
            font-family: 'Amiri', serif;
            color: rgba(174, 130, 37, 0.7);
            font-size: 14px;
            letter-spacing: 2px;
        }

        .spinner-dots {
            display: flex;
            gap: 6px;
            margin-top: 20px;
        }

        .spinner-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--gold);
            opacity: 0.3;
            animation: spinnerDot 1.2s ease-in-out infinite;
        }

        .spinner-dot:nth-child(1) {
            animation-delay: 0s;
        }

        .spinner-dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .spinner-dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes spinnerDot {

            0%,
            100% {
                opacity: 0.2;
                transform: scale(0.8);
            }

            50% {
                opacity: 1;
                transform: scale(1.2);
            }
        }

        /* ===== TOPBAR ===== */
        .topbar {
            background: var(--navy);
            border-bottom: 1px solid rgba(174, 130, 37, 0.3);
            padding: 9px 0;
        }

        .topbar a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 12px;
            letter-spacing: 0.5px;
            transition: color 0.3s;
        }

        .topbar a:hover {
            color: var(--gold-light);
        }

        .topbar small {
            color: rgba(255, 255, 255, 0.4);
            font-size: 11px;
            letter-spacing: 1px;
        }

        .topbar .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border: 1px solid rgba(174, 130, 37, 0.4);
            border-radius: 50%;
            margin-left: 6px;
            color: var(--gold-light);
            font-size: 11px;
            transition: all 0.3s;
        }

        .topbar .social-links a:hover {
            background: var(--gold);
            color: var(--white);
            border-color: var(--gold);
        }

        /* ===== HEADER BRAND ===== */
        .header-brand {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 18px 0;
            box-shadow: 0 2px 20px rgba(13, 27, 42, 0.08);
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
        }

        .brand-logo img {
            height: 90px;
            width: auto;
            object-fit: contain;
        }

        .header-contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-contact-icon {
            width: 46px;
            height: 46px;
            border: 1px solid var(--gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 15px;
            flex-shrink: 0;
            background: rgba(174, 130, 37, 0.06);
            transition: all 0.3s;
        }

        .header-contact-item:hover .header-contact-icon {
            background: var(--gold);
            color: var(--white);
        }

        .header-contact-text p {
            margin: 0;
            font-size: 11px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header-contact-text h6 {
            margin: 0;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            color: var(--navy);
            font-weight: 700;
        }

        /* ===== NAVBAR ===== */
        .navbar.bg-primary {
            background: var(--navy) !important;
            border-bottom: 2px solid var(--gold);
        }

        .navbar-dark .navbar-nav .nav-link {
            font-family: 'Inter', sans-serif !important;
            font-size: 11px !important;
            font-weight: 600 !important;
            color: rgba(255, 255, 255, 0.85) !important;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 18px 18px !important;
            transition: all 0.3s;
            border-bottom: 3px solid transparent;
        }

        .navbar-dark .navbar-nav .nav-link:hover,
        .navbar-dark .navbar-nav .nav-link.active {
            color: var(--gold-light) !important;
            border-bottom-color: var(--gold);
        }

        .navbar-dark .dropdown-menu {
            background: var(--navy-mid) !important;
            border: 1px solid rgba(174, 130, 37, 0.3) !important;
            border-radius: 0 !important;
            margin-top: 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .navbar-dark .dropdown-item {
            font-family: 'Inter', sans-serif;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            padding: 10px 20px;
            transition: all 0.3s;
        }

        .navbar-dark .dropdown-item:hover,
        .navbar-dark .dropdown-item.active {
            background: rgba(174, 130, 37, 0.15) !important;
            color: var(--gold-light) !important;
        }

        .btn-enroll {
            background: var(--gold) !important;
            color: var(--white) !important;
            font-family: 'Inter', sans-serif !important;
            font-size: 11px !important;
            font-weight: 700 !important;
            letter-spacing: 2px;
            padding: 10px 22px !important;
            border-radius: 0 !important;
            border: none !important;
            text-transform: uppercase;
            transition: all 0.3s;
        }

        .btn-enroll:hover {
            background: var(--gold-light) !important;
        }

        /* ===== BACK TO TOP ===== */
        .back-to-top {
            position: fixed !important;
            right: 24px;
            bottom: 24px;
            width: 44px !important;
            height: 44px !important;
            background: var(--gold) !important;
            color: var(--white) !important;
            border: none !important;
            border-radius: 0 !important;
            display: flex !important;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            cursor: pointer;
            z-index: 999;
            text-decoration: none;
            opacity: 0;
            transition: all 0.3s;
        }

        .back-to-top.visible {
            opacity: 1;
        }

        .back-to-top:hover {
            background: var(--navy) !important;
            color: var(--gold-light) !important;
            transform: translateY(-3px);
        }

        /* ===== WOW ===== */
        .wow {
            visibility: hidden;
        }

        /* ===== RESPONSIVE NAVBAR ===== */
        @media (max-width:991px) {
            .navbar-collapse {
                background: var(--navy-mid);
                padding: 8px 0 16px;
                border-top: 1px solid rgba(174, 130, 37, 0.25);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            }

            .navbar-dark .navbar-nav .nav-link {
                padding: 13px 22px !important;
                border-bottom: 1px solid rgba(174, 130, 37, 0.08) !important;
            }

            .navbar-dark .navbar-nav .nav-link:hover,
            .navbar-dark .navbar-nav .nav-link.active {
                padding-left: 32px !important;
                color: var(--gold-light) !important;
                background: rgba(174, 130, 37, 0.07);
            }

            .navbar-dark .dropdown-menu {
                background: rgba(174, 130, 37, 0.05) !important;
                border: none !important;
                border-left: 2px solid var(--gold) !important;
                padding-left: 10px;
                margin-left: 22px;
                box-shadow: none !important;
            }
        }

        @media (max-width:768px) {
            .header-brand {
                padding: 12px 0;
            }

            .brand-logo img {
                height: 65px !important;
            }
        }

        /* ===== SWEETALERT2 — ACADEMY THEME ===== */
        .swal-popup {
            border: 1px solid rgba(174, 130, 37, 0.4) !important;
            border-top: 4px solid #AE8225 !important;
            border-radius: 0 !important;
            font-family: 'Inter', sans-serif !important;
        }

        .swal-title {
            font-family: 'Inter', sans-serif !important;
            font-size: 17px !important;
            color: #AE8225 !important;
        }

        .swal-btn {
            font-family: 'Inter', sans-serif !important;
            font-size: 11px !important;
            letter-spacing: 2px !important;
            text-transform: uppercase !important;
            padding: 12px 30px !important;
            border-radius: 0 !important;
        }

        .swal-timer {
            background: #AE8225 !important;
        }

        .swal2-icon.swal2-success .swal2-success-ring {
            border-color: rgba(174, 130, 37, 0.3) !important;
        }

        .swal2-icon.swal2-success [class^='swal2-success-line'] {
            background-color: #AE8225 !important;
        }

        /* ===== DARK MODE VARIABLES ===== */
        [data-theme="dark"] {
            --white: #0D1B2A;
            --off-white: #0F1D2A;
            --light-bg: #122233;
            --border: rgba(174, 130, 37, 0.25);
            --border-soft: rgba(174, 130, 37, 0.1);
            --text-dark: #F0EFE8;
            --text-mid: #B0BEC8;
            --text-muted: #7A8FA0;
            --light: #122233;
            --dark: #F0EFE8;
        }

        [data-theme="dark"] body {
            background-color: #0D1B2A;
            color: #F0EFE8;
        }

        [data-theme="dark"] .header-brand {
            background: #0F1D2A;
            border-bottom-color: rgba(174, 130, 37, 0.25);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.4);
        }

        [data-theme="dark"] .header-contact-text h6 {
            color: #F0EFE8;
        }

        /* Cards, sections, white backgrounds */
        [data-theme="dark"] .bg-white,
        [data-theme="dark"] .card,
        [data-theme="dark"] section {
            background-color: #122233 !important;
            color: #F0EFE8;
        }

        [data-theme="dark"] p,
        [data-theme="dark"] li,
        [data-theme="dark"] span:not(.bia-topbar-tagline):not(.bia-info-label):not(.bia-info-val) {
            color: #C8D6E0;
        }

        [data-theme="dark"] h1,
        [data-theme="dark"] h2,
        [data-theme="dark"] h3,
        [data-theme="dark"] h4,
        [data-theme="dark"] h5,
        [data-theme="dark"] h6 {
            color: #F0EFE8;
        }

        /* Footer */
        [data-theme="dark"] footer,
        [data-theme="dark"] .footer {
            background: #060F18 !important;
        }

        /* Inputs & forms */
        [data-theme="dark"] input,
        [data-theme="dark"] textarea,
        [data-theme="dark"] select {
            background: #122233 !important;
            color: #F0EFE8 !important;
            border-color: rgba(174, 130, 37, 0.3) !important;
        }

        /* Dark mode toggle button */
        .theme-toggle-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: transparent;
            border: 1.5px solid rgba(174, 130, 37, 0.45);
            color: #D4A843;
            font-family: 'Inter', sans-serif;
            font-size: 9.5px;
            font-weight: 700;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            padding: 7px 14px;
            border-radius: 2px;
            cursor: pointer;
            transition: all .3s;
            white-space: nowrap;
        }

        .theme-toggle-btn:hover {
            background: #AE8225;
            color: #fff;
            border-color: #AE8225;
        }

        .theme-toggle-icon {
            font-size: 13px;
            line-height: 1;
        }
    </style>

    @stack('styles')

    {{-- ── Meta Pixel ─────────────────────────────────────────── --}}
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '854559400712986');
    fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=854559400712986&ev=PageView&noscript=1"/>
    </noscript>
    {{-- ── End Meta Pixel ──────────────────────────────────────── --}}

</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner">
        <div class="spinner-logo">
            <div class="spinner-ring-outer"></div>
            <div class="spinner-ring"></div>
            <span class="spinner-logo-arabic">ب</span>
        </div>
        <p class="spinner-text">Bismillah Academy</p>
        <p class="spinner-sub">بِسْمِ اللَّهِ</p>
        <div class="spinner-dots">
            <div class="spinner-dot"></div>
            <div class="spinner-dot"></div>
            <div class="spinner-dot"></div>
        </div>
    </div>
    <script>
        /* Loading screen only on the first page of a visit; later pages open instantly. */
        (function () {
            var seen = false;
            try { seen = !!sessionStorage.getItem('biaSeenLoader'); sessionStorage.setItem('biaSeenLoader', '1'); } catch (e) {}
            if (seen) {
                var s = document.getElementById('spinner');
                s.style.transition = 'none';
                s.classList.add('hide');
            }
        })();
    </script>
    <!-- Spinner End -->

    {{-- Header --}}
    @include('partials.header')

    {{-- Main Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('partials.footer')

    @include('partials.chatbot')
    {{-- Visitor counter (Admin > Visitors): sends only the page, where the visitor came from and their timezone --}}
    <script>
        (function () {
            try {
                var d = new FormData();
                d.append('p', location.pathname);
                d.append('r', document.referrer || '');
                d.append('tz', (window.Intl && Intl.DateTimeFormat().resolvedOptions().timeZone) || '');
                if (navigator.sendBeacon) navigator.sendBeacon(@json(route('visit.track')), d);
                else fetch(@json(route('visit.track')), { method: 'POST', body: d, keepalive: true });
            } catch (e) {}
        })();
    </script>
    @include('partials.whatsapp-float')

    <!-- Back to Top -->
    <a href="#" class="btn back-to-top" id="backToTop"><i class="fas fa-arrow-up"></i></a>

    <!-- JavaScript Libraries — ORDER MATTERS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}" defer></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}" defer></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}" defer></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}" defer></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}" defer></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}?v={{ @filemtime(public_path('js/main.js')) }}" defer></script>

    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

    <script>
        /* ===== Spinner: hide as soon as the page is usable (max 1.2s on slow connections) ===== */
        (function () {
            function hideSpinner() {
                var spinner = document.getElementById('spinner');
                if (spinner) spinner.classList.add('hide');
            }
            if (document.readyState !== 'loading') hideSpinner();
            else document.addEventListener('DOMContentLoaded', hideSpinner);
            setTimeout(hideSpinner, 1200);
        })();

        /* ===== Back to top ===== */
        window.addEventListener('scroll', function () {
            document.getElementById('backToTop').classList.toggle('visible', window.scrollY > 300);
        });
        document.getElementById('backToTop').addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        /* ===== WOW init ===== */
        if (typeof WOW !== 'undefined') new WOW().init();

        /* ===== Counter Up ===== */
        if (typeof jQuery !== 'undefined') {
            jQuery(document).ready(function () {
                setTimeout(function () {
                    jQuery('[data-toggle="counter-up"]').counterUp({ delay: 10, time: 2000 });
                }, 800);
            });
        }
    </script>

    {{-- ✅ Page specific scripts --}}
    @stack('scripts')

    {{-- ✅ Vite — Alpine.js (SweetAlert CDN pehle aa chuka hai) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- ════════════════════════════════════════════
    SWEETALERT2 FLASH MESSAGES
    CDN upar load ho chuka hai — ye 100% kaam karega
    ════════════════════════════════════════════ --}}
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: 'JazakAllah Khair!',
                        text: "{{ session('success') }}",
                        confirmButtonText: 'Close',
                        confirmButtonColor: '#AE8225',
                        background: '#0D1B2A',
                        color: '#ffffff',
                        iconColor: '#AE8225',
                        timer: 5000,
                        timerProgressBar: true,
                    });
                }
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Something Went Wrong!',
                        text: "{{ session('error') }}",
                        confirmButtonText: 'Try Again',
                        confirmButtonColor: '#AE8225',
                        background: '#0D1B2A',
                        color: '#ffffff',
                        iconColor: '#e74c3c',
                    });
                }
            });
        </script>
    @endif

    @include('partials.enroll_modal')

    {{-- ═══ ENROLL MODAL AUTO POPUP — sirf home page par, browser mein pehli dafa site
         khulne par. Kuch seconds dikh kar khud band ho jata hai (agar user form use
         na kar raha ho). Baaki waqt modal sirf "Enroll" button click par khulta hai. ═══ --}}
    @if (request()->routeIs('home'))
    <script>
        (function () {
            var KEY = 'enrollModalShown';
            var SHOW_AFTER = 2000;  // site load ke 2 second baad khule
            var HIDE_AFTER = 6000;  // 6 second dikh kar band ho jaye

            try {
                if (localStorage.getItem(KEY)) return;
            } catch (e) {}

            function popup() {
                var modalEl = document.getElementById('enrollModal');
                if (!modalEl || typeof bootstrap === 'undefined') return;
                if (modalEl.classList.contains('show')) return; // user ne khud already khol liya

                // Bootstrap 5.0.0 mein getOrCreateInstance nahi hai
                var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                var box = modalEl.querySelector('.modal-dialog') || modalEl;
                var userBusy = false;
                function markBusy(e) {
                    // Bootstrap khulte waqt modal ko khud focus karta hai — sirf form fields count karo
                    if (e.type === 'focusin' && !e.target.matches('input, select, textarea')) return;
                    userBusy = true;
                }

                // User modal box par mouse/touch kare ya form mein type kare to auto-band na ho
                box.addEventListener('mouseenter', markBusy);
                box.addEventListener('touchstart', markBusy, { passive: true });
                box.addEventListener('focusin', markBusy);

                modal.show();
                try { localStorage.setItem(KEY, '1'); } catch (e) {}

                setTimeout(function () {
                    box.removeEventListener('mouseenter', markBusy);
                    box.removeEventListener('touchstart', markBusy);
                    box.removeEventListener('focusin', markBusy);
                    if (!userBusy && modalEl.classList.contains('show')) modal.hide();
                }, HIDE_AFTER);
            }

            // Bootstrap "defer" se load hota hai — poora page load hone ke baad timer shuru karo
            function start() { setTimeout(popup, SHOW_AFTER); }
            if (document.readyState === 'complete') start();
            else window.addEventListener('load', start);
        })();
    </script>
    @endif
</body>

</html>
