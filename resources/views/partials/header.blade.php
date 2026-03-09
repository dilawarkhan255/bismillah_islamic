<!-- Topbar Start -->
<div class="container-fluid topbar px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="small" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a class="small" href="{{ route('courses') }}">Courses</a></li>
                <li class="breadcrumb-item"><a class="small" href="#">Terms</a></li>
                <li class="breadcrumb-item"><a class="small" href="#">Privacy</a></li>
            </ol>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <div class="h-100 d-inline-flex align-items-center social-links">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-linkedin-in"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Brand & Contact Start -->
<div class="container-fluid header-brand py-4 px-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-12 text-center text-lg-start">
            <a href="{{ route('home') }}" class="brand-logo m-0 p-0">
                <img src="{{ asset('img/logo.png') }}" alt="Bismillah Islamic Academy Logo">
            </a>
        </div>
        <div class="col-lg-8 col-md-7 d-none d-lg-block">
            <div class="row">
                <div class="col-4">
                    <div class="header-contact-item justify-content-end">
                        <div class="header-contact-icon">
                            <i class="far fa-clock"></i>
                        </div>
                        <div class="header-contact-text ps-3">
                            <p>Class Hours</p>
                            <h6>Mon - Sat, 8:00 - 9:00</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="header-contact-item justify-content-end">
                        <div class="header-contact-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="header-contact-text ps-3">
                            <p>Call Us</p>
                            <h6>+012 345 6789</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="header-contact-item justify-content-end">
                        <div class="header-contact-icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="header-contact-text ps-3">
                            <p>Email Us</p>
                            <h6>info@bismillah.com</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand & Contact End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="{{ route('home') }}" class="navbar-brand ms-3 d-lg-none">MENU</a>
    <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav me-auto p-3 p-lg-0">
            <a href="{{ route('home') }}"
               class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('blog') }}"
               class="nav-item nav-link {{ request()->routeIs('blog') ? 'active' : '' }}">Blog</a>
            <a href="{{ route('courses') }}"
               class="nav-item nav-link {{ request()->routeIs('courses') ? 'active' : '' }}">Courses</a>
            <a href="{{ route('projects') }}"
               class="nav-item nav-link {{ request()->routeIs('projects') ? 'active' : '' }}">Gallery</a>
            <a href="{{ route('about') }}"
               class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About Us</a>
            <a href="{{ route('contact') }}"
               class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">More</a>
                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                    <a href="{{ route('team') }}"
                       class="dropdown-item {{ request()->routeIs('team') ? 'active' : '' }}">Our Teachers</a>
                    <a href="{{ route('enroll') }}"
                       class="dropdown-item {{ request()->routeIs('enroll') ? 'active' : '' }}">Enroll Now</a>
                </div>
            </div>
        </div>

        {{-- Right side Enroll button — desktop only --}}
        <button type="button"
            class="btn btn-enroll d-none d-lg-block"
            data-bs-toggle="modal"
            data-bs-target="#enrollModal">
            Enroll Now
        </button>
    </div>
</nav>
<!-- Navbar End -->
