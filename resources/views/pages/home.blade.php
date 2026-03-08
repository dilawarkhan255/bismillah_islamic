@extends('layouts.app')

@section('content')

    @include('partials.topbar')
    @include('partials.header')

    <!-- ===================== HERO CAROUSEL ===================== -->
    <section class="hero-carousel">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <!-- Indicators -->
            <div class="carousel-indicators-custom"
                style="position:absolute; bottom:25px; left:50%; transform:translateX(-50%); display:flex; gap:8px; z-index:5;">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"
                    style="width:50px; height:3px; background:var(--gold); border:none; cursor:pointer; border-radius:0;"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"
                    style="width:30px; height:3px; background:rgba(200,168,75,0.4); border:none; cursor:pointer; border-radius:0;"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"
                    style="width:30px; height:3px; background:rgba(200,168,75,0.4); border:none; cursor:pointer; border-radius:0;"></button>
            </div>

            <div class="carousel-inner">

                <!-- Slide 1: Image -->
                <div class="carousel-item active">
                    <div class="hero-slide">
                        <div class="hero-bg"
                            style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('img/slide-1.jpg') }}') center/cover no-repeat;">
                        </div>
                        <div class="hero-pattern"></div>
                        <div class="hero-content container">
                            <div class="hero-badge animate__animated animate__fadeInDown">
                                Bismillah Islamic Academy
                            </div>
                            <h1 class="hero-title animate__animated animate__zoomIn">
                                Learn The Holy <span>Quran</span><br>With Excellence
                            </h1>
                            <p class="hero-subtitle animate__animated animate__fadeInUp">
                                "Read in the name of your Lord who created" — Surah Al-Alaq
                            </p>
                            <div class="animate__animated animate__fadeInUp" style="animation-delay:0.3s;">
                                <a href="{{ route('enroll') }}" class="btn-gold">Enroll Now</a>
                                <a href="{{ route('about') }}" class="btn-gold-outline">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Video -->
                <div class="carousel-item">
                    <div class="hero-slide" style="position:relative; height:100vh;">
                        <!-- Video Background -->
                        <video autoplay loop muted playsinline
                            style="position:absolute; top:0; left:0; width:100%; height:100%; object-fit:cover; z-index:1;">
                            <source src="{{ asset('videos/slide-2.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>

                        <!-- Gradient Overlay -->
                        <div class="hero-bg" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4));
                                    position:absolute; top:0; left:0; width:100%; height:100%; z-index:2;">
                        </div>

                        <!-- Slide Content -->
                        <div class="hero-content container" style="position:relative; z-index:3;">
                            <div class="hero-badge animate__animated animate__fadeInDown">Join Our Community</div>
                            <h1 class="hero-title animate__animated animate__zoomIn">
                                Islamic <span>Education</span><br>For Every Age
                            </h1>
                            <p class="hero-subtitle animate__animated animate__fadeInUp">
                                Quran, Tajweed, Hadith, Islamic Studies & Arabic Language
                            </p>
                            <div class="animate__animated animate__fadeInUp" style="animation-delay:0.3s;">
                                <a href="{{ route('courses') }}" class="btn-gold">View Courses</a>
                                <a href="{{ route('contact') }}" class="btn-gold-outline">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: Image -->
                <div class="carousel-item">
                    <div class="hero-slide">
                        <div class="hero-bg"
                            style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('img/slide-3.jpg') }}') center/cover no-repeat;">
                        </div>
                        <div class="hero-pattern"></div>
                        <div class="hero-content container">
                            <div class="hero-badge animate__animated animate__fadeInDown">
                                Expert Teachers
                            </div>
                            <h1 class="hero-title animate__animated animate__zoomIn">
                                Certified <span>Scholars</span><br>& Hafiz-e-Quran
                            </h1>
                            <p class="hero-subtitle animate__animated animate__fadeInUp">
                                Learn from qualified Islamic scholars with years of teaching experience
                            </p>
                            <div class="animate__animated animate__fadeInUp" style="animation-delay:0.3s;">
                                <a href="{{ route('team') }}" class="btn-gold">Meet Our Teachers</a>
                                <a href="{{ route('enroll') }}" class="btn-gold-outline">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev"
                style="width:60px; opacity:0.7;">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next"
                style="width:60px; opacity:0.7;">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>
    <!-- Hero Carousel End -->


    <!-- ===================== STATS ===================== -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 animate-on-scroll">
                    <div class="stat-item">
                        <i class="fa fa-certificate stat-icon"></i>
                        <div class="stat-number">10</div>
                        <div class="stat-label">Years Experience</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 animate-on-scroll" style="transition-delay:0.15s">
                    <div class="stat-item">
                        <i class="fa fa-users-cog stat-icon"></i>
                        <div class="stat-number">25</div>
                        <div class="stat-label">Qualified Teachers</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 animate-on-scroll" style="transition-delay:0.3s">
                    <div class="stat-item">
                        <i class="fa fa-users stat-icon"></i>
                        <div class="stat-number">1500</div>
                        <div class="stat-label">Satisfied Students</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 animate-on-scroll" style="transition-delay:0.45s">
                    <div class="stat-item">
                        <i class="fa fa-book-open stat-icon"></i>
                        <div class="stat-number">500</div>
                        <div class="stat-label">Hafiz Graduates</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Stats End -->


    <!-- ===================== ABOUT ===================== -->
    <section class="about-section">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 animate-on-scroll">
                    <div class="about-img-wrapper">
                        <img src="{{ asset('img/about.jpg') }}" alt="About Bismillah Islamic Academy">
                    </div>
                </div>
                <div class="col-lg-6 animate-on-scroll" style="transition-delay:0.2s">
                    <div class="section-label">About Us</div>
                    <h2 class="section-title">#1 Islamic Academy With <span>10 Years</span> Of Excellence</h2>
                    <div class="divider-gold" style="margin:20px 0;"></div>
                    <p style="color:#888; line-height:1.9; margin-bottom:15px;">
                        Bismillah Islamic Academy is dedicated to providing authentic Islamic education in a nurturing
                        environment. Our mission is to guide every student toward understanding the Quran, Sunnah, and
                        Islamic values.
                    </p>
                    <div class="about-quote-box">
                        <p>"Seek knowledge from the cradle to the grave." — Prophet Muhammad (SAW)</p>
                    </div>
                    <p style="color:#888; line-height:1.9; margin-bottom:25px;">
                        We offer comprehensive courses in Quran recitation, Tajweed, Hifz, Islamic Studies, Arabic Language,
                        and more — for all age groups, taught by certified scholars and Huffaz.
                    </p>
                    <div class="founder-card">
                        <img src="{{ asset('img/team-1.jpg') }}" alt="Founder">
                        <div>
                            <h6>Sheikh Abdullah</h6>
                            <small>Founder & Principal</small>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="btn-gold mt-4 d-inline-block">Read More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->


    <!-- ===================== SERVICES / COURSES ===================== -->
    <section class="services-section">
        <div class="container">
            <div class="text-center mb-5 animate-on-scroll">
                <div class="section-label">Our Courses</div>
                <h2 class="section-title">We Focus On Authentic <span>Islamic Education</span></h2>
                <div class="divider-gold"></div>
            </div>
            <div class="row g-4">
                @php
                    $courses = [
                        ['icon' => 'fas fa-quran', 'title' => 'Quran Recitation', 'delay' => '0s'],
                        ['icon' => 'fas fa-mosque', 'title' => 'Hifz ul Quran', 'delay' => '0.1s'],
                        ['icon' => 'fas fa-book-open', 'title' => 'Tajweed Rules', 'delay' => '0.2s'],
                        ['icon' => 'fas fa-star-and-crescent', 'title' => 'Islamic Studies', 'delay' => '0.3s'],
                        ['icon' => 'fas fa-language', 'title' => 'Arabic Language', 'delay' => '0.4s'],
                        ['icon' => 'fas fa-graduation-cap', 'title' => 'Hadith & Seerah', 'delay' => '0.5s'],
                    ];
                @endphp

                @foreach($courses as $course)
                    <div class="col-lg-4 col-md-6 animate-on-scroll" style="transition-delay:{{ $course['delay'] }}">
                        <a href="{{ route('courses') }}" class="service-card">
                            <div class="service-icon">
                                <i class="{{ $course['icon'] }}"></i>
                            </div>
                            <h4>{{ $course['title'] }}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Services End -->


    <!-- ===================== WHY CHOOSE US ===================== -->
    <section class="why-section">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 animate-on-scroll">
                    <div class="section-label">Why Choose Us</div>
                    <h2 class="section-title">Why Parents <span>Trust Us</span> For Their Children</h2>
                    <div class="divider-gold" style="margin:20px 0;"></div>
                    <p style="color:#888; line-height:1.9; margin-bottom:30px;">
                        Our academy combines traditional Islamic teaching methods with modern pedagogy. Every teacher is a
                        qualified scholar committed to nurturing the next generation of Muslims.
                    </p>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="skill-bar">
                                <div class="skill-bar-header">
                                    <span>Quran & Tajweed</span>
                                    <span>95%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="95"
                                        style="width:0%; transition: width 1.5s ease;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="skill-bar">
                                <div class="skill-bar-header">
                                    <span>Islamic Studies</span>
                                    <span>90%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90"
                                        style="width:0%; transition: width 1.5s ease 0.2s;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="skill-bar">
                                <div class="skill-bar-header">
                                    <span>Arabic Language</span>
                                    <span>85%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="85"
                                        style="width:0%; transition: width 1.5s ease 0.4s;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="skill-bar">
                                <div class="skill-bar-header">
                                    <span>Hifz Program</span>
                                    <span>88%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="88"
                                        style="width:0%; transition: width 1.5s ease 0.6s;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 animate-on-scroll" style="transition-delay:0.2s">
                    <div class="about-img-wrapper">
                        <img src="{{ asset('img/feature.jpg') }}" alt="Why Choose Bismillah Academy">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us End -->


    <!-- ===================== PROJECTS / GALLERY ===================== -->
    <section class="projects-section">
        <div class="container">
            <div class="text-center mb-5 animate-on-scroll">
                <div class="section-label">Our Gallery</div>
                <h2 class="section-title">Moments From <span>Our Academy</span></h2>
                <div class="divider-gold"></div>
            </div>
            <div class="owl-carousel project-carousel animate-on-scroll">
                @for($i = 1; $i <= 9; $i++)
                    <div class="project-card">
                        <div class="project-img-wrap">
                            <img src="{{ asset('img/project-' . $i . '.jpg') }}" alt="Gallery {{ $i }}">
                            <div class="project-overlay">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <h6>Academy Event</h6>
                        <span>Bismillah Islamic Academy</span>
                    </div>
                @endfor
            </div>
        </div>
    </section>
    <!-- Projects End -->


    <!-- ===================== TEAM ===================== -->
    <section class="team-section">
        <div class="container">
            <div class="text-center mb-5 animate-on-scroll">
                <div class="section-label">Our Teachers</div>
                <h2 class="section-title">Meet Our <span>Qualified Scholars</span></h2>
                <div class="divider-gold"></div>
            </div>
            <div class="row g-4">
                @php
                    $team = [
                        ['name' => 'Sheikh Abdullah', 'role' => 'Principal & Quran Teacher', 'img' => 'team-1.jpg', 'delay' => '0s'],
                        ['name' => 'Ustaz Ibrahim', 'role' => 'Tajweed Specialist', 'img' => 'team-2.jpg', 'delay' => '0.15s'],
                        ['name' => 'Ustaza Fatima', 'role' => 'Islamic Studies Teacher', 'img' => 'team-3.jpg', 'delay' => '0.3s'],
                    ];
                @endphp

                @foreach($team as $member)
                    <div class="col-lg-4 col-md-6 animate-on-scroll" style="transition-delay:{{ $member['delay'] }}">
                        <div class="team-card">
                            <div class="team-img-wrap">
                                <img src="{{ asset('img/' . $member['img']) }}" alt="{{ $member['name'] }}">
                            </div>
                            <h5>{{ $member['name'] }}</h5>
                            <span class="designation">{{ $member['role'] }}</span>
                            <div class="team-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Team End -->


    <!-- ===================== TESTIMONIALS ===================== -->
    <section class="testimonial-section">
        <div class="container">
            <div class="text-center mb-5 animate-on-scroll">
                <div class="section-label">Testimonials</div>
                <h2 class="section-title">What Our <span>Students & Parents</span> Say</h2>
                <div class="divider-gold"></div>
            </div>
            <div class="owl-carousel testimonial-carousel animate-on-scroll">
                @php
                    $testimonials = [
                        [
                            'name' => 'Ahmad Khan',
                            'prof' => 'Parent',
                            'img' => 'testimonial-1.jpg',
                            'text' => 'Alhamdulillah, my son memorized 5 Juz in just one year. The teachers are dedicated and the environment is truly Islamic.'
                        ],
                        [
                            'name' => 'Sarah Bibi',
                            'prof' => 'Parent',
                            'img' => 'testimonial-2.jpg',
                            'text' => 'My daughter improved her Tajweed tremendously. The academy provides a wonderful learning atmosphere for children.'
                        ],
                        [
                            'name' => 'Omar Farooq',
                            'prof' => 'Student',
                            'img' => 'testimonial-3.jpg',
                            'text' => 'The Arabic language course helped me understand the Quran directly. Highly recommend to every Muslim.'
                        ],
                        [
                            'name' => 'Aisha Rahman',
                            'prof' => 'Parent',
                            'img' => 'testimonial-4.jpg',
                            'text' => 'Best Islamic school in the area. The scholars here are very knowledgeable and approachable. JazakAllah Khair!'
                        ],
                    ];
                @endphp

                @foreach($testimonials as $t)
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ asset('img/' . $t['img']) }}" alt="{{ $t['name'] }}">
                            <div>
                                <h5>{{ $t['name'] }}</h5>
                                <span class="profession">{{ $t['prof'] }}</span>
                                <div class="stars">★★★★★</div>
                            </div>
                        </div>
                        <p>{{ $t['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Testimonials End -->

    @include('partials.footer')

@endsection

@push('scripts')
    <script>
        // Animate skill bars when in view
        var skillsAnimated = false;
        var skillObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting && !skillsAnimated) {
                    skillsAnimated = true;
                    setTimeout(function () {
                        document.querySelectorAll('.progress-bar').forEach(function (bar) {
                            var val = bar.getAttribute('aria-valuenow');
                            bar.style.width = val + '%';
                        });
                    }, 200);
                }
            });
        }, { threshold: 0.3 });

        var whySec = document.querySelector('.why-section');
        if (whySec) skillObserver.observe(whySec);
    </script>
@endpush
