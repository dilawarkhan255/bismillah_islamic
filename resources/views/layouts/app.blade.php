<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bismillah Islamic Academy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Islamic Academy, Quran, Islamic Education" name="keywords">
    <meta content="Bismillah Islamic Academy - Learn Quran & Islamic Studies" name="description">

    <link href="{{ asset('img/logo.png') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Lato:wght@300;400;700&family=Amiri:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

    <style>
        /* ============================================
           BISMILLAH ISLAMIC ACADEMY — THEME
           Navy #0D1B2A | Gold #AE8225 | White #FFFFFF
        ============================================ */
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

        /* ========== TOPBAR ========== */
        .topbar {
            background: var(--navy);
            border-bottom: 1px solid rgba(174, 130, 37, 0.3);
            padding: 9px 0;
        }

        .topbar a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 12px;
            font-family: 'Lato', sans-serif;
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

        /* ========== HEADER BRAND ========== */
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
            height: 130px;
            width: auto;
            object-fit: contain;
            border-radius: 0;
            background: transparent;
            padding: 0;
        }

        .brand-name {
            font-family: 'Cinzel', serif;
            font-size: 24px;
            font-weight: 700;
            color: var(--navy);
            line-height: 1.1;
            letter-spacing: 2px;
        }

        .brand-subtitle {
            font-family: 'Amiri', serif;
            font-size: 12px;
            color: var(--gold);
            letter-spacing: 3px;
            text-transform: uppercase;
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

        .header-contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
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

        /* ========== NAVBAR ========== */
        .main-navbar {
            background: var(--navy);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 0;
            border-bottom: 2px solid var(--gold);
        }

        .main-navbar .navbar-nav .nav-link {
            font-family: 'Cinzel', serif;
            font-size: 11px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.85) !important;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 18px 18px !important;
            transition: all 0.3s;
            border-bottom: 3px solid transparent;
        }

        .main-navbar .navbar-nav .nav-link:hover,
        .main-navbar .navbar-nav .nav-link.active {
            color: var(--gold-light) !important;
            border-bottom-color: var(--gold);
        }

        .main-navbar .dropdown-menu {
            background: var(--navy-mid);
            border: 1px solid rgba(174, 130, 37, 0.3);
            border-radius: 0;
            margin-top: 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .main-navbar .dropdown-item {
            font-family: 'Lato', sans-serif;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            padding: 10px 20px;
            transition: all 0.3s;
        }

        .main-navbar .dropdown-item:hover {
            background: rgba(174, 130, 37, 0.15);
            color: var(--gold-light);
        }

        .navbar-brand-mobile {
            font-family: 'Cinzel', serif;
            color: var(--white) !important;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .btn-enroll {
            background: var(--gold);
            color: var(--white) !important;
            font-family: 'Cinzel', serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            padding: 10px 22px !important;
            border-radius: 0 !important;
            border: none;
            text-transform: uppercase;
            transition: all 0.3s;
        }

        .btn-enroll:hover {
            background: var(--gold-light);
            color: var(--white) !important;
        }

        /* ========== HERO ========== */
        .hero-carousel {
            position: relative;
            overflow: hidden;
        }

        .hero-slide {
            height: 620px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 60%, #0A1520 100%);
        }

        .hero-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(ellipse at 15% 50%, rgba(174, 130, 37, 0.12) 0%, transparent 55%),
                radial-gradient(ellipse at 85% 30%, rgba(174, 130, 37, 0.08) 0%, transparent 50%);
        }

        .hero-pattern {
            position: absolute;
            inset: 0;
            opacity: 0.05;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80'%3E%3Cpath d='M40 0L80 40L40 80L0 40Z' fill='none' stroke='%23AE8225' stroke-width='1'/%3E%3Cpath d='M40 10L70 40L40 70L10 40Z' fill='none' stroke='%23AE8225' stroke-width='1'/%3E%3Cpath d='M40 20L60 40L40 60L20 40Z' fill='none' stroke='%23AE8225' stroke-width='0.5'/%3E%3C/svg%3E");
        }

        /* Decorative gold line left */
        .hero-slide::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, transparent, var(--gold), transparent);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 40px 20px;
        }

        .hero-badge {
            display: inline-block;
            font-family: 'Amiri', serif;
            font-size: 17px;
            color: var(--gold-light);
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 22px;
            padding: 8px 28px;
            border: 1px solid rgba(174, 130, 37, 0.5);
        }

        .hero-badge::before,
        .hero-badge::after {
            content: '✦';
            margin: 0 10px;
            font-size: 11px;
        }

        .hero-title {
            font-family: 'Cinzel', serif;
            font-size: clamp(30px, 5vw, 62px);
            font-weight: 900;
            color: var(--white);
            line-height: 1.1;
            margin-bottom: 16px;
        }

        .hero-title span {
            color: var(--gold-light);
        }

        .hero-subtitle {
            font-family: 'Amiri', serif;
            font-size: 19px;
            color: rgba(255, 255, 255, 0.65);
            margin-bottom: 36px;
            letter-spacing: 1px;
        }

        .btn-gold {
            background: var(--gold);
            color: var(--white);
            font-family: 'Cinzel', serif;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 14px 40px;
            border: 2px solid var(--gold);
            border-radius: 0;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            box-shadow: 0 4px 20px rgba(174, 130, 37, 0.35);
        }

        .btn-gold:hover {
            background: transparent;
            color: var(--gold-light);
            border-color: var(--gold-light);
            box-shadow: 0 8px 30px rgba(174, 130, 37, 0.2);
        }

        .btn-gold-outline {
            background: transparent;
            color: var(--white);
            border: 2px solid rgba(255, 255, 255, 0.5);
            font-family: 'Cinzel', serif;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 12px 36px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            margin-left: 14px;
        }

        .btn-gold-outline:hover {
            background: var(--white);
            color: var(--navy);
            border-color: var(--white);
        }

        /* ========== STATS ========== */
        .stats-section {
            background: var(--navy);
            border-top: 1px solid rgba(174, 130, 37, 0.2);
            padding: 65px 0;
        }

        .stat-item {
            text-align: center;
            padding: 25px 20px;
            position: relative;
        }

        .stat-item::after {
            content: '';
            position: absolute;
            right: 0;
            top: 20%;
            height: 60%;
            width: 1px;
            background: rgba(174, 130, 37, 0.2);
        }

        .stat-item:last-child::after {
            display: none;
        }

        .stat-icon {
            font-size: 38px;
            color: var(--gold);
            margin-bottom: 14px;
            display: block;
        }

        .stat-number {
            font-family: 'Cinzel', serif;
            font-size: 46px;
            font-weight: 900;
            color: var(--white);
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-label {
            font-family: 'Lato', sans-serif;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.45);
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* ========== SECTION TITLES ========== */
        .section-label {
            display: inline-block;
            font-family: 'Amiri', serif;
            font-size: 13px;
            color: var(--gold);
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .section-label::before {
            content: '— ';
        }

        .section-label::after {
            content: ' —';
        }

        .section-title {
            font-family: 'Cinzel', serif;
            font-size: clamp(22px, 3vw, 36px);
            font-weight: 700;
            color: var(--navy);
            line-height: 1.2;
        }

        .section-title span {
            color: var(--gold);
        }

        .divider-gold {
            width: 55px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            margin: 18px auto;
        }

        /* ========== ABOUT ========== */
        .about-section {
            background: var(--white);
            padding: 100px 0;
        }

        .about-img-wrapper {
            position: relative;
        }

        .about-img-wrapper::before {
            content: '';
            position: absolute;
            inset: -12px;
            border: 2px solid rgba(174, 130, 37, 0.35);
            z-index: 0;
        }

        .about-img-wrapper::after {
            content: '';
            position: absolute;
            inset: -6px;
            border: 1px solid rgba(174, 130, 37, 0.15);
            z-index: 0;
        }

        .about-img-wrapper img {
            position: relative;
            z-index: 1;
            width: 100%;
            object-fit: cover;
        }

        .about-quote-box {
            background: linear-gradient(135deg, rgba(174, 130, 37, 0.07), rgba(174, 130, 37, 0.02));
            border-left: 3px solid var(--gold);
            padding: 18px 22px;
            margin: 22px 0;
        }

        .about-quote-box p {
            font-family: 'Amiri', serif;
            font-size: 16px;
            color: var(--text-mid);
            margin: 0;
            font-style: italic;
        }

        .founder-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 0;
            border-top: 1px solid var(--border);
            margin-top: 20px;
        }

        .founder-card img {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            border: 2px solid var(--gold);
            object-fit: cover;
        }

        .founder-card h6 {
            font-family: 'Cinzel', serif;
            color: var(--navy);
            margin: 0;
            font-size: 14px;
        }

        .founder-card small {
            color: var(--gold);
            font-size: 11px;
            letter-spacing: 1px;
        }

        /* ========== SERVICES ========== */
        .services-section {
            background: var(--light-bg);
            padding: 100px 0;
        }

        .service-card {
            background: var(--white);
            border: 1px solid var(--border-soft);
            padding: 35px 28px;
            text-align: center;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
            height: 100%;
            text-decoration: none;
            display: block;
            box-shadow: 0 2px 15px rgba(13, 27, 42, 0.05);
        }

        .service-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gold);
            transform: scaleX(0);
            transition: transform 0.4s;
        }

        .service-card:hover::after {
            transform: scaleX(1);
        }

        .service-card:hover {
            border-color: var(--border);
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(13, 27, 42, 0.1);
        }

        .service-icon {
            width: 72px;
            height: 72px;
            background: rgba(174, 130, 37, 0.08);
            border: 1px solid var(--border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 26px;
            color: var(--gold);
            transition: all 0.3s;
        }

        .service-card:hover .service-icon {
            background: var(--navy);
            color: var(--gold-light);
            border-color: var(--navy);
        }

        .service-card h4 {
            font-family: 'Cinzel', serif;
            font-size: 15px;
            color: var(--navy);
            font-weight: 600;
        }

        /* ========== WHY CHOOSE US ========== */
        .why-section {
            background: var(--white);
            padding: 100px 0;
        }

        .skill-bar {
            margin-bottom: 22px;
        }

        .skill-bar-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 7px;
        }

        .skill-bar-header span {
            font-family: 'Lato', sans-serif;
            font-size: 12px;
            color: var(--text-mid);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .skill-bar-header span:last-child {
            color: var(--gold);
            font-weight: 700;
        }

        .progress {
            height: 5px;
            background: rgba(174, 130, 37, 0.12);
            border-radius: 0;
            overflow: hidden;
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--gold-dark), var(--gold), var(--gold-light));
            border-radius: 0;
        }

        /* ========== PROJECTS ========== */
        .projects-section {
            background: var(--light-bg);
            padding: 100px 0;
        }

        .project-card {
            border: 1px solid var(--border-soft);
            background: var(--white);
            padding: 14px;
            transition: all 0.3s;
            box-shadow: 0 2px 10px rgba(13, 27, 42, 0.05);
        }

        .project-card:hover {
            border-color: var(--gold);
            box-shadow: 0 12px 35px rgba(13, 27, 42, 0.12);
        }

        .project-img-wrap {
            position: relative;
            overflow: hidden;
            margin-bottom: 12px;
        }

        .project-img-wrap img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: all 0.4s;
        }

        .project-card:hover .project-img-wrap img {
            transform: scale(1.06);
        }

        .project-overlay {
            position: absolute;
            inset: 0;
            background: rgba(13, 27, 42, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .project-card:hover .project-overlay {
            opacity: 1;
        }

        .project-overlay i {
            color: var(--gold-light);
            font-size: 26px;
            background: rgba(13, 27, 42, 0.8);
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .project-card h6 {
            font-family: 'Cinzel', serif;
            color: var(--navy);
            font-size: 13px;
            margin-bottom: 4px;
        }

        .project-card span {
            font-size: 12px;
            color: var(--text-muted);
        }

        /* ========== TEAM ========== */
        .team-section {
            background: var(--white);
            padding: 100px 0;
        }

        .team-card {
            text-align: center;
            padding: 35px 20px;
            background: var(--off-white);
            border: 1px solid var(--border-soft);
            transition: all 0.4s;
            box-shadow: 0 2px 15px rgba(13, 27, 42, 0.05);
        }

        .team-card:hover {
            border-color: var(--gold);
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(13, 27, 42, 0.12);
        }

        .team-img-wrap {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }

        .team-img-wrap img {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            border: 3px solid var(--gold);
            object-fit: cover;
            padding: 4px;
            background: var(--white);
        }

        .team-card h5 {
            font-family: 'Cinzel', serif;
            color: var(--navy);
            font-size: 16px;
            margin-bottom: 4px;
        }

        .team-card .designation {
            color: var(--gold);
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-family: 'Lato', sans-serif;
            display: block;
            margin-bottom: 14px;
        }

        .team-social {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 14px;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s;
        }

        .team-card:hover .team-social {
            opacity: 1;
            transform: translateY(0);
        }

        .team-social a {
            width: 34px;
            height: 34px;
            border: 1px solid var(--gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 13px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .team-social a:hover {
            background: var(--gold);
            color: var(--white);
        }

        /* ========== TESTIMONIALS ========== */
        .testimonial-section {
            background: var(--navy);
            padding: 100px 0;
        }

        .testimonial-section .section-title {
            color: var(--white);
        }

        .testimonial-section .section-label {
            color: var(--gold-light);
        }

        .testimonial-card {
            background: var(--navy-light);
            border: 1px solid rgba(174, 130, 37, 0.2);
            padding: 30px 28px;
            position: relative;
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 10px;
            left: 20px;
            font-family: 'Amiri', serif;
            font-size: 75px;
            color: rgba(174, 130, 37, 0.2);
            line-height: 1;
        }

        .testimonial-card img {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            border: 2px solid var(--gold);
            object-fit: cover;
        }

        .testimonial-card h5 {
            font-family: 'Cinzel', serif;
            color: var(--white);
            font-size: 14px;
            margin: 0 0 2px;
        }

        .testimonial-card .profession {
            color: var(--gold-light);
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .testimonial-card p {
            color: rgba(255, 255, 255, 0.65);
            font-family: 'Amiri', serif;
            font-size: 16px;
            font-style: italic;
            line-height: 1.7;
            margin-top: 18px;
        }

        .stars {
            color: var(--gold);
            font-size: 13px;
            margin-top: 4px;
        }

        /* ========== FOOTER ========== */
        .footer {
            background: var(--navy);
            border-top: 2px solid var(--gold);
            padding: 80px 0 0;
        }

        .footer h5 {
            font-family: 'Cinzel', serif;
            color: var(--gold-light);
            font-size: 13px;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 22px;
            padding-bottom: 12px;
            border-bottom: 1px solid rgba(174, 130, 37, 0.2);
        }

        .footer p,
        .footer address {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.9;
        }

        .footer p i {
            color: var(--gold);
            width: 18px;
        }

        .footer-links a {
            display: block;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            font-size: 13px;
            padding: 5px 0;
            transition: all 0.3s;
            font-family: 'Lato', sans-serif;
            border-bottom: 1px solid rgba(174, 130, 37, 0.06);
        }

        .footer-links a::before {
            content: '› ';
            color: var(--gold);
        }

        .footer-links a:hover {
            color: var(--gold-light);
            padding-left: 8px;
        }

        .footer-social {
            display: flex;
            gap: 9px;
            margin-top: 20px;
        }

        .footer-social a {
            width: 36px;
            height: 36px;
            border: 1px solid rgba(174, 130, 37, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.5);
            font-size: 13px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer-social a:hover {
            background: var(--gold);
            border-color: var(--gold);
            color: var(--white);
        }

        .footer-gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 6px;
        }

        .footer-gallery img {
            width: 100%;
            height: 68px;
            object-fit: cover;
            opacity: 0.6;
            transition: opacity 0.3s;
        }

        .footer-gallery img:hover {
            opacity: 1;
        }

        .newsletter-form {
            position: relative;
        }

        .newsletter-form input {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(174, 130, 37, 0.3);
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 110px 12px 16px;
            width: 100%;
            font-size: 13px;
            outline: none;
            border-radius: 0;
        }

        .newsletter-form input::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        .newsletter-form button {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            background: var(--gold);
            color: var(--white);
            border: none;
            padding: 0 18px;
            font-family: 'Cinzel', serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .newsletter-form button:hover {
            background: var(--gold-light);
        }

        .footer-bottom {
            margin-top: 55px;
            padding: 18px 0;
            border-top: 1px solid rgba(174, 130, 37, 0.12);
        }

        .footer-bottom p {
            margin: 0;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.3);
        }

        .footer-bottom a {
            color: var(--gold);
            text-decoration: none;
        }

        /* ========== OWL CAROUSEL ========== */
        .owl-dots {
            text-align: center;
            margin-top: 28px;
        }

        .owl-dot span {
            width: 28px !important;
            height: 3px !important;
            border-radius: 0 !important;
            background: rgba(174, 130, 37, 0.25) !important;
            margin: 0 4px !important;
        }

        .owl-dot.active span {
            background: var(--gold) !important;
            width: 48px !important;
        }

        /* ========== BACK TO TOP ========== */
        .back-to-top {
            position: fixed;
            right: 24px;
            bottom: 24px;
            width: 44px;
            height: 44px;
            background: var(--gold);
            color: var(--white);
            border: none;
            border-radius: 0;
            display: flex;
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
            background: var(--navy);
            color: var(--gold-light);
            transform: translateY(-3px);
        }

        /* ========== SCROLL ANIMATIONS ========== */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }

        /* ========== SPINNER ========== */
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

        @media (max-width: 768px) {
            .hero-slide {
                height: 460px;
            }

            .stat-item::after {
                display: none;
            }
        }
    </style>
    @stack('styles')
</head>

<body>

    <div id="spinner">
        <div style="text-align:center;">
            <div class="spinner-ring"></div>
            <p class="spinner-text">Loading...</p>
        </div>
    </div>

    @yield('content')

    <a href="#" class="back-to-top" id="backToTop"><i class="bi bi-arrow-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        window.addEventListener('load', function () {
            setTimeout(function () { document.getElementById('spinner').classList.add('hide'); }, 700);
        });

        window.addEventListener('scroll', function () {
            var btn = document.getElementById('backToTop');
            if (window.scrollY > 300) btn.classList.add('visible');
            else btn.classList.remove('visible');
        });

        document.getElementById('backToTop').addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) entry.target.classList.add('animated');
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.animate-on-scroll').forEach(function (el) { observer.observe(el); });

        $(document).ready(function () {
            $('.testimonial-carousel').owlCarousel({
                loop: true, margin: 24, nav: false, dots: true,
                autoplay: true, autoplayTimeout: 5000,
                responsive: { 0: { items: 1 }, 768: { items: 2 }, 992: { items: 3 } }
            });
            $('.project-carousel').owlCarousel({
                loop: true, margin: 24, nav: false, dots: true, autoplay: true,
                responsive: { 0: { items: 1 }, 768: { items: 2 }, 992: { items: 3 } }
            });
        });

        var counterDone = false;
        var counterObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting && !counterDone) {
                    counterDone = true;
                    entry.target.querySelectorAll('.stat-number').forEach(function (el) {
                        var target = parseInt(el.textContent);
                        var start = 0; var step = target / (2000 / 16);
                        var timer = setInterval(function () {
                            start += step;
                            if (start >= target) { el.textContent = target + '+'; clearInterval(timer); }
                            else el.textContent = Math.floor(start);
                        }, 16);
                    });
                }
            });
        }, { threshold: 0.3 });
        document.querySelectorAll('.stats-section').forEach(function (el) { counterObserver.observe(el); });
    </script>
    @stack('scripts')
    @include('partials.enroll_modal')
</body>

</html>
