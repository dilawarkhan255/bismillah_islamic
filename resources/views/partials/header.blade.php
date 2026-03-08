<!-- Header Brand Start -->
<div class="header-brand">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12 text-center text-lg-start mb-3 mb-lg-0">
                <a href="{{ route('home') }}"
                    class="brand-logo d-inline-flex justify-content-center justify-content-lg-start">
                    <img src="{{ asset('img/logo.png') }}" alt="Bismillah Islamic Academy Logo"
                        style="height: 90px; width: auto; object-fit: contain;">
                </a>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <div class="row justify-content-end">
                    <div class="col-4">
                        <div class="header-contact-item justify-content-end">
                            <div class="header-contact-icon">
                                <i class="far fa-clock"></i>
                            </div>
                            <div class="header-contact-text">
                                <p>Class Hours</p>
                                <h6>Mon - Sat, 6:00pm - 3:00am</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="header-contact-item justify-content-end">
                            <div class="header-contact-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="header-contact-text">
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
                            <div class="header-contact-text">
                                <p>Email Us</p>
                                <h6>info@bismillah.academy</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Brand End -->

<!-- Navbar Start -->
<nav class="main-navbar navbar navbar-expand-lg">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand navbar-brand-mobile d-lg-none">MENU</a>
        <button type="button" class="navbar-toggler border-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            style="color: var(--navy);">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto">
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
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">More</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('team') }}"
                            class="dropdown-item {{ request()->routeIs('team') ? 'active' : '' }}">Our Teachers</a>
                        <a href="{{ route('contact') }}"
                            class="dropdown-item {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a>
                        <a href="{{ route('enroll') }}"
                            class="dropdown-item {{ request()->routeIs('enroll') ? 'active' : '' }}">Enroll Now</a>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-enroll d-none d-lg-block" data-bs-toggle="modal"
                data-bs-target="#enrollModal">Enroll Now</button>
        </div>
    </div>
</nav>
<!-- Navbar End -->
