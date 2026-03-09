<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Bismillah Islamic Academy')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Islamic Academy, Quran, Islamic Education" name="keywords">
    <meta content="Bismillah Islamic Academy - Learn Quran & Islamic Studies" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Lato:wght@300;400;700&family=Amiri:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

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

        body {
            font-family: 'Lato', sans-serif;
            background-color: var(--white);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Cinzel', serif;
        }

        /* ===== SPINNER ===== */
        #spinner {
            position: fixed;
            inset: 0;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s;
        }

        #spinner.hide {
            opacity: 0;
            pointer-events: none;
        }

        .spinner-ring {
            width: 68px;
            height: 68px;
            border: 3px solid rgba(174, 130, 37, 0.15);
            border-top-color: var(--gold);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 14px;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .spinner-text {
            font-family: 'Cinzel', serif;
            color: var(--navy);
            font-size: 13px;
            letter-spacing: 4px;
            text-transform: uppercase;
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
            font-family: 'Lato', sans-serif;
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
            font-family: 'Cinzel', serif !important;
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
            font-family: 'Lato', sans-serif;
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
            font-family: 'Cinzel', serif !important;
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
    </style>

    @stack('styles')
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner">
        <div style="text-align:center;">
            <div class="spinner-ring"></div>
            <p class="spinner-text">Loading...</p>
        </div>
    </div>
    <!-- Spinner End -->

    {{-- Header --}}
    @include('partials.header')

    {{-- Main Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('partials.footer')

    <!-- Back to Top -->
    <a href="#" class="btn back-to-top" id="backToTop"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries — ORDER MATTERS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        /* ===== Spinner ===== */
        window.addEventListener('load', function () {
            setTimeout(function () {
                document.getElementById('spinner').classList.add('hide');
            }, 600);
        });

        /* ===== Back to top ===== */
        window.addEventListener('scroll', function () {
            document.getElementById('backToTop').classList.toggle('visible', window.scrollY > 300);
        });
        document.getElementById('backToTop').addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        /* ===== WOW init ===== */
        new WOW().init();

        /* ===== Counter Up Fix =====
           - $(document).ready ensures jQuery + plugins are loaded
           - setTimeout(800) gives WOW enough time to make elements visible
             before counterUp attaches the Waypoint trigger
        */
        $(document).ready(function () {
            setTimeout(function () {
                $('[data-toggle="counter-up"]').counterUp({
                    delay: 10,
                    time: 2000
                });
            }, 800);
        });
    </script>

    @stack('scripts')

    @include('partials.enroll_modal')

</body>

</html>
