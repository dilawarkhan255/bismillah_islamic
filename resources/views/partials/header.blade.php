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
                {{ \App\Models\SiteSetting::get('site_name', 'Bismillah Islamic Academy') }}
                <span class="bia-topbar-dot"></span>
            </span>
            <div class="bia-socials">
                @if(\App\Models\SiteSetting::get('facebook'))
                    <a href="{{ \App\Models\SiteSetting::get('facebook') }}" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if(\App\Models\SiteSetting::get('instagram'))
                    <a href="{{ \App\Models\SiteSetting::get('instagram') }}" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                @endif
                @if(\App\Models\SiteSetting::get('youtube'))
                    <a href="{{ \App\Models\SiteSetting::get('youtube') }}" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                @endif
            </div>
        </div>

        <div class="bia-topbar-line"></div>

        {{-- Center group: contact info --}}
        <div class="bia-topbar-center">

            <div class="bia-info-chip">
                <div class="bia-info-icon"><i class="far fa-clock"></i></div>
                <div>
                    <span class="bia-info-label">Class Hours</span>
                    <span class="bia-info-val">{{ \App\Models\SiteSetting::get('class_hours', 'Mon–Sat &nbsp;24/7 - Hours') }}</span>
                </div>
            </div>

            <div class="bia-vr"></div>

             <a href="https://wa.me/{{ \App\Models\SiteSetting::get('whatsapp', '923141833216') }}" target="_blank" class="bia-info-chip" style="text-decoration:none;">
                <div class="bia-info-icon"><i class="fab fa-whatsapp"></i></div>
                <div>
                    <span class="bia-info-label">🇵🇰 Pakistan</span>
                    <span class="bia-info-val">{{ \App\Models\SiteSetting::get('phone', '+92 314 1833216') }}</span>
                </div>
            </a>

            <div class="bia-vr"></div>

            <a href="https://wa.me/{{ \App\Models\SiteSetting::get('whatsapp_uk', '447415770822') }}" target="_blank" class="bia-info-chip" style="text-decoration:none;">
                <div class="bia-info-icon"><i class="fab fa-whatsapp"></i></div>
                <div>
                    <span class="bia-info-label">🇬🇧 United Kingdom</span>
                    <span class="bia-info-val">{{ \App\Models\SiteSetting::get('phone_uk', '+44 7415 770822') }}</span>
                </div>
            </a>

            <div class="bia-vr"></div>

           <a href="mailto:{{ \App\Models\SiteSetting::get('email', 'bismillahquranacademy2@gmail.com') }}" class="bia-info-chip" style="text-decoration:none;">
                <div class="bia-info-icon"><i class="far fa-envelope"></i></div>
                <div>
                    <span class="bia-info-label">Email Us</span>
                    <span class="bia-info-val">{{ \App\Models\SiteSetting::get('email', 'bismillahquranacademy2@gmail.com') }}</span>
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
        <img src="{{ setting('img_logo') ? asset('storage/' . setting('img_logo')) : asset('img/logo.png') }}" alt="{{ \App\Models\SiteSetting::get('site_name', 'Bismillah Islamic Academy') }}">
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
            <a href="{{ route('team') }}" class="nav-item nav-link {{ request()->routeIs('team') ? 'active' : '' }}">Our Teachers</a>
            <a href="{{ route('our-team') }}" class="nav-item nav-link {{ request()->routeIs('our-team') ? 'active' : '' }}">Our Team</a>

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
    @auth
        @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
            <a href="{{ url('/admin') }}" class="btn btn-sm d-lg-inline-flex align-items-center gap-1 me-3"
               style="background:var(--gold);color:#fff;font-family:'Cinzel',serif;font-size:9px;letter-spacing:1.5px;text-transform:uppercase;padding:7px 16px;border:1px solid var(--gold);text-decoration:none;white-space:nowrap;">
                <i class="bi bi-speedometer2"></i> Admin Panel
            </a>
        @endif
    @endauth
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
    max-width: 100%;
    overflow: hidden;
    box-sizing: border-box;
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
    min-width: 0;
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
    min-width: 0;
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

.bia-info-chip > div {
    display: flex;
    flex-direction: column;
    line-height: 1.25;
    min-width: 0;
}

.bia-info-label {
    font-size: 9px;
    color: rgba(255, 255, 255, 0.32);
    text-transform: uppercase;
    letter-spacing: 1.2px;
    font-family: 'Lato', sans-serif;
    cursor: pointer;
    white-space: nowrap;
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

/* Email chip val truncate */
a.bia-info-chip .bia-info-val {
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
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
    background: #ffffff !important;
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
    height: 100px;
    width: auto;
    object-fit: contain;
    display: block;
}

.bia-navbar .navbar-nav .nav-link {
    font-family: 'Cinzel', serif !important;
    font-size: 10.5px !important;
    font-weight: 600 !important;
    color: #0F1D2A !important;
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
    color: #0F1D2A !important;
    border-bottom-color: var(--gold, #AE8225);
    background: rgba(174, 130, 37, 0.07);
}

.bia-navbar .dropdown-menu {
    background: #ffffff !important;
    border: 1px solid rgba(174, 130, 37, 0.28) !important;
    border-radius: 0 0 6px 6px !important;
    margin-top: 0;
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
}

.bia-navbar .dropdown-item {
    font-family: 'Lato', sans-serif;
    color: #0F1D2A;
    font-size: 13px;
    padding: 10px 22px;
    transition: all .25s;
    cursor: pointer;
}

.bia-navbar .dropdown-item:hover,
.bia-navbar .dropdown-item.active {
    background: rgba(174, 130, 37, 0.10) !important;
    color: var(--gold, #AE8225) !important;
    padding-left: 28px;
}

/* Toggler icon dark banana white bg pe */
.bia-navbar .navbar-toggler-icon {
    filter: invert(1) brightness(0);
}

/* ============================================================
   991px - 1400px FIX
   ============================================================ */
@media (min-width: 992px) and (max-width: 1400px) {

    .bia-topbar-inner {
        padding: 0 16px;
    }

    .bia-topbar-tagline {
        display: none !important;
    }

    .bia-topbar-left {
        padding: 8px 10px 8px 0;
        gap: 6px;
        flex-shrink: 0;
    }

    .bia-topbar-center {
        flex: 1;
        padding: 0 2px;
        min-width: 0;
    }

    .bia-vr {
        margin: 0 8px;
        flex-shrink: 0;
    }

    .bia-info-chip {
        gap: 6px;
        flex-shrink: 1;
        min-width: 0;
    }

    .bia-info-icon {
        width: 28px;
        height: 28px;
        flex-shrink: 0;
    }

    .bia-info-label {
        font-size: 8px;
    }

    .bia-info-val {
        font-size: 11px;
    }

    a.bia-info-chip .bia-info-val {
        max-width: 130px;
    }

    .bia-topbar-right {
        flex-shrink: 0 !important;
        padding: 8px 0 8px 10px;
        display: flex !important;
        visibility: visible !important;
    }

    .bia-enroll-btn {
        padding: 7px 12px;
        font-size: 9px;
        letter-spacing: 1px;
        gap: 5px;
        white-space: nowrap;
    }

    .bia-enroll-icon {
        width: 18px;
        height: 18px;
        font-size: 9px;
    }

    .bia-arrow {
        display: none !important;
    }

    .bia-topbar-line {
        flex-shrink: 0;
    }
}

/* ============================================================
   MOBILE (max 991px)
   ============================================================ */
@media (max-width: 991px) {
    .bia-brand img {
        height: 50px;
    }

    .bia-navbar .navbar-collapse {
        background: #ffffff;
        padding: 8px 0 16px;
        border-top: 1px solid rgba(174, 130, 37, 0.2);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .bia-navbar .navbar-nav .nav-link {
        padding: 13px 22px !important;
        border-bottom: 1px solid rgba(174, 130, 37, 0.07) !important;
        color: #0F1D2A !important;
    }

    .bia-navbar .navbar-nav .nav-link:hover,
    .bia-navbar .navbar-nav .nav-link.active {
        padding-left: 30px !important;
        background: rgba(174, 130, 37, 0.07);
        color: #0F1D2A !important;
        border-bottom-color: rgba(174, 130, 37, 0.07) !important;
    }

    .bia-navbar .dropdown-menu {
        background: rgba(174, 130, 37, 0.04) !important;
        border: none !important;
        border-left: 2px solid var(--gold, #AE8225) !important;
        margin-left: 22px;
        box-shadow: none !important;
        border-radius: 0 !important;
    }

    .bia-navbar .dropdown-item {
        color: #0F1D2A;
    }
}
</style>
