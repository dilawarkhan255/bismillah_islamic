{{-- ============================================================
BISMILLAH ISLAMIC ACADEMY — PREMIUM HEADER
Row 1: Elegant contact bar with gold accents
Row 2: Logo left | Nav CENTER
============================================================ --}}

{{-- ── ROW 1: Premium Contact Bar ─────────────────────────────── --}}
<div class="bia-topbar d-none d-lg-block wow fadeIn" data-wow-delay="0.1s">
    <div class="bia-topbar-inner">

        {{-- Left group: tagline + Social --}}
        <div class="bia-topbar-left">
            <span class="bia-topbar-tagline">
                <span class="bia-topbar-dot"></span>
                Bismillah Islamic Academy
                <span class="bia-topbar-dot"></span>
            </span>
            <div class="bia-socials">
                <a href="" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <div class="bia-topbar-line"></div>

        {{-- Center group: contact info --}}
        <div class="bia-topbar-center">

            <div class="bia-info-chip">
                <div class="bia-info-icon"><i class="far fa-clock"></i></div>
                <div>
                    <span class="bia-info-label">Class Hours</span>
                    <span class="bia-info-val">Mon–Sat &nbsp;6PM – 4AM</span>
                </div>
            </div>

            <div class="bia-vr"></div>

            <div class="bia-info-chip">
                <div class="bia-info-icon"><i class="fas fa-phone-alt"></i></div>
                <div>
                    <span class="bia-info-label">🇵🇰 Pakistan</span>
                    <span class="bia-info-val">+92 314 1833216</span>
                </div>
            </div>

            <div class="bia-vr"></div>

            <div class="bia-info-chip">
                <div class="bia-info-icon"><i class="fas fa-phone-alt"></i></div>
                <div>
                    <span class="bia-info-label">🇬🇧 United Kingdom</span>
                    <span class="bia-info-val">+44 7415 770822</span>
                </div>
            </div>

            <div class="bia-vr"></div>

           <a href="mailto:bismillahquranacademy2@gmail.com" class="bia-info-chip" style="text-decoration:none;">
                <div class="bia-info-icon"><i class="far fa-envelope"></i></div>
                <div>
                    <span class="bia-info-label">Email Us</span>
                    <span class="bia-info-val">bismillahquranacademy2@gmail.com</span>
                </div>
            </a>

        </div>

        <div class="bia-topbar-line"></div>

        {{-- Right: Enroll CTA --}}
        <div class="bia-topbar-right">
            <button class="bia-enroll-btn" data-bs-toggle="modal" data-bs-target="#enrollModal">
                <span class="bia-enroll-icon"><i class="fa fa-graduation-cap"></i></span>
                <span>Enroll Now</span>
                <i class="fa fa-arrow-right bia-arrow"></i>
            </button>
        </div>

    </div>
</div>
{{-- ── END Topbar ──────────────────────────────────────────────── --}}


{{-- ── ROW 2: Navbar ──────────────────────────────────────────── --}}
<nav class="bia-navbar navbar navbar-expand-lg navbar-dark sticky-top">
    <a href="{{ route('home') }}" class="bia-brand ms-3 ms-lg-4">
        <img src="{{ asset('img/logo.png') }}" alt="Bismillah Islamic Academy">
    </a>

    <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#biaNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="biaNav">
        <div class="navbar-nav mx-auto p-3 p-lg-0">
            <a href="{{ route('home') }}"
                class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}"
                class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About Us</a>
            <a href="{{ route('courses') }}"
                class="nav-item nav-link {{ request()->routeIs('courses') ? 'active' : '' }}">Courses</a>
            <a href="{{ route('gallery') }}"
                class="nav-item nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a>
            <a href="{{ route('team') }}" class="nav-item nav-link {{ request()->routeIs('team') ? 'active' : '' }}">Our
                Teachers</a>

            <a href="{{ route('contact') }}"
                class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">More</a>
                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                    <a href="{{ route('blog') }}"
                        class="dropdown-item {{ request()->routeIs('blog') ? 'active' : '' }}">Blog</a>
                </div>
            </div>
        </div>
    </div>
</nav>
{{-- ── END Navbar ─────────────────────────────────────────────── --}}


<style>
    /* ============================================================
   PREMIUM TOPBAR
   ============================================================ */
    .bia-topbar {
        background: #18232F;
        border-bottom: 1px solid rgba(174, 130, 37, 0.25);
        position: relative;
        cursor: default;
    }

    .bia-topbar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg,
                transparent 0%,
                var(--gold, #AE8225) 20%,
                var(--gold-light, #D4A843) 50%,
                var(--gold, #AE8225) 80%,
                transparent 100%);
    }

    .bia-topbar-inner {
        display: flex;
        align-items: center;
        padding: 0 40px;
        min-height: 52px;
        gap: 0;
    }

    /* ── Left ── */
    .bia-topbar-left {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-shrink: 0;
        padding: 14px 24px 14px 0;
        cursor: pointer;
    }

    .bia-topbar-tagline {
        font-family: 'Amiri', serif;
        font-size: 11px;
        color: rgba(255, 255, 255, 0.48);
        letter-spacing: 1.5px;
        white-space: nowrap;
        display: flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
    }

    .bia-topbar-dot {
        display: inline-block;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: var(--gold, #AE8225);
        opacity: 0.75;
    }

    .bia-socials {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .bia-socials a {
        width: 28px;
        height: 28px;
        border: 1px solid rgba(174, 130, 37, 0.28);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: rgba(255, 255, 255, 0.45);
        font-size: 10px;
        text-decoration: none;
        transition: all .25s;
        cursor: pointer;
    }

    .bia-socials a:hover {
        background: var(--gold, #AE8225);
        color: #fff;
        border-color: var(--gold, #AE8225);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(174, 130, 37, 0.35);
    }

    /* ── Dividers ── */
    .bia-topbar-line {
        width: 1px;
        align-self: stretch;
        background: linear-gradient(to bottom,
                transparent,
                rgba(174, 130, 37, 0.35) 30%,
                rgba(174, 130, 37, 0.35) 70%,
                transparent);
        flex-shrink: 0;
        margin: 0 4px;
    }

    /* ── Center chips ── */
    .bia-topbar-center {
        display: flex;
        align-items: center;
        flex: 1;
        justify-content: center;
        gap: 0;
        padding: 0 8px;
    }

    .bia-vr {
        width: 1px;
        height: 28px;
        background: rgba(174, 130, 37, 0.15);
        flex-shrink: 0;
        margin: 0 16px;
    }

    .bia-info-chip {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 0;
        transition: all .25s;
        cursor: pointer;
    }

    .bia-info-chip:hover .bia-info-icon {
        background: rgba(174, 130, 37, 0.18);
        border-color: var(--gold, #AE8225);
    }

    .bia-info-chip:hover .bia-info-val {
        color: var(--gold-light, #D4A843);
    }

    .bia-info-icon {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        border: 1px solid rgba(174, 130, 37, 0.25);
        background: rgba(174, 130, 37, 0.08);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all .25s;
    }

    .bia-info-icon i {
        color: var(--gold, #AE8225);
        font-size: 11px;
    }


    .bia-info-chip>div {
        display: flex;
        flex-direction: column;
        line-height: 1.25;
    }

    .bia-info-label {
        font-size: 9px;
        color: rgba(255, 255, 255, 0.32);
        text-transform: uppercase;
        letter-spacing: 1.2px;
        font-family: 'Lato', sans-serif;
        cursor: pointer;
    }

    .bia-info-val {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.88);
        font-weight: 600;
        white-space: nowrap;
        transition: color .25s;
        font-family: 'Lato', sans-serif;
        cursor: pointer;
    }

    /* ── Right: Enroll ── */
    .bia-topbar-right {
        flex-shrink: 0;
        padding: 10px 0 10px 24px;
    }

    .bia-enroll-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        color: var(--gold-light, #D4A843);
        font-family: 'Cinzel', serif;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 9px 20px;
        border: 1.5px solid rgba(174, 130, 37, 0.55);
        border-radius: 2px;
        cursor: pointer;
        white-space: nowrap;
        transition: all .3s;
        position: relative;
        overflow: hidden;
    }

    .bia-enroll-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(174, 130, 37, 0.07);
    }

    .bia-enroll-btn:hover {
        background: var(--gold, #AE8225);
        color: #fff;
        border-color: var(--gold, #AE8225);
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(174, 130, 37, 0.35);
    }

    .bia-enroll-icon {
        width: 22px;
        height: 22px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        cursor: pointer;
    }

    .bia-arrow {
        font-size: 9px;
        opacity: 0.7;
        transition: transform .3s;
    }

    .bia-enroll-btn:hover .bia-arrow {
        transform: translateX(3px);
    }

    /* ============================================================
   NAVBAR
   ============================================================ */
    .bia-navbar {
        background: #0F1D2A !important;
        border-bottom: 2px solid var(--gold, #AE8225);
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }

    .bia-navbar .collapse,
.bia-navbar .navbar-collapse {
    visibility: visible !important;
}

    .bia-brand {
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        flex-shrink: 0;
        padding: 6px 0;
        cursor: pointer;
    }

    .bia-brand img {
        height: 62px;
        width: auto;
        object-fit: contain;
        display: block;
    }

    .bia-navbar .navbar-nav .nav-link {
        font-family: 'Cinzel', serif !important;
        font-size: 10.5px !important;
        font-weight: 600 !important;
        color: rgba(255, 255, 255, 0.80) !important;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 22px 16px !important;
        transition: all .3s;
        border-bottom: 3px solid transparent;
        white-space: nowrap;
        cursor: pointer;
    }

    .bia-navbar .navbar-nav .nav-link:hover,
    .bia-navbar .navbar-nav .nav-link.active {
        color: var(--gold-light, #D4A843) !important;
        border-bottom-color: var(--gold, #AE8225);
    }

    .bia-navbar .dropdown-menu {
        background: #0F1D2A !important;
        border: 1px solid rgba(174, 130, 37, 0.28) !important;
        border-radius: 0 0 6px 6px !important;
        margin-top: 0;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
    }

    .bia-navbar .dropdown-item {
        font-family: 'Lato', sans-serif;
        color: rgba(255, 255, 255, 0.65);
        font-size: 13px;
        padding: 10px 22px;
        transition: all .25s;
        cursor: pointer;
    }

    .bia-navbar .dropdown-item:hover,
    .bia-navbar .dropdown-item.active {
        background: rgba(174, 130, 37, 0.12) !important;
        color: var(--gold-light, #D4A843) !important;
        padding-left: 28px;
    }

    /* Mobile */
    @media (max-width: 991px) {
        .bia-brand img {
            height: 50px;
        }

        .bia-navbar .navbar-collapse {
            background: #0F1D2A;
            padding: 8px 0 16px;
            border-top: 1px solid rgba(174, 130, 37, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .bia-navbar .navbar-nav .nav-link {
            padding: 13px 22px !important;
            border-bottom: 1px solid rgba(174, 130, 37, 0.07) !important;
        }

        .bia-navbar .navbar-nav .nav-link:hover,
        .bia-navbar .navbar-nav .nav-link.active {
            padding-left: 30px !important;
            background: rgba(174, 130, 37, 0.07);
        }

        .bia-navbar .dropdown-menu {
            background: rgba(174, 130, 37, 0.04) !important;
            border: none !important;
            border-left: 2px solid var(--gold, #AE8225) !important;
            margin-left: 22px;
            box-shadow: none !important;
            border-radius: 0 !important;
        }
    }
</style>
