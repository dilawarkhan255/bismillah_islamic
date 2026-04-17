@extends('layouts.app')

@section('title', 'Bismillah Islamic Academy - Learn Quran & Islamic Studies')

@section('content')

    <!-- ===================== HERO CAROUSEL ===================== -->
    <section class="hero-carousel wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1">
                    <img class="img-fluid" src="{{ asset('img/slide-1.jpg') }}" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                    <img class="img-fluid" src="{{ asset('img/slide-2.jpg') }}" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                    <img class="img-fluid" src="{{ asset('img/slide-3.jpg') }}" alt="Image">
                </button>
            </div>

            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img class="w-100 carousel-img" src="{{ asset('img/slide-1.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="slide-content-wrap">
                            <div class="hero-badge animate__animated animate__fadeInDown">
                                ✦ Bismillah Islamic Academy ✦
                            </div>
                            <h1 class="slide-title animated zoomIn">
                                Learn The Holy <span style="color: var(--gold-light);">Quran</span>
                            </h1>
                            <p class="slide-sub animated fadeInUp">
                                "Read in the name of your Lord who created" — Surah Al-Alaq
                            </p>
                            <div class="slide-btns animate__animated animate__fadeInUp" style="animation-delay:0.3s;">
                                <a href="{{ route('free_trial') }}" class="slide-btn-gold">Free Trial</a>
                                <a href="{{ route('about') }}" class="slide-btn-outline">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img class="w-100 carousel-img" src="{{ asset('img/slide-2.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="slide-content-wrap">
                            <div class="hero-badge animate__animated animate__fadeInDown">
                                ✦ Join Our Community ✦
                            </div>
                            <h1 class="slide-title animated zoomIn">
                                Islamic <span style="color: var(--gold-light);">Education</span><br>For Every Age
                            </h1>
                            <p class="slide-sub animated fadeInUp">
                                Quran, Tajweed, Hadith, Islamic Studies & Arabic Language
                            </p>
                            <div class="slide-btns animate__animated animate__fadeInUp" style="animation-delay:0.3s;">
                                <a href="{{ route('courses') }}" class="slide-btn-gold">View Courses</a>
                                <a href="{{ route('contact') }}" class="slide-btn-outline">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img class="w-100 carousel-img" src="{{ asset('img/slide-3.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="slide-content-wrap">
                            <div class="hero-badge animate__animated animate__fadeInDown">
                                ✦ Expert Teachers ✦
                            </div>
                            <h1 class="slide-title animated zoomIn">
                                Certified <span style="color: var(--gold-light);">Scholars</span><br>& Hafiz-e-Quran
                            </h1>
                            <p class="slide-sub animated fadeInUp">
                                Learn from qualified Islamic scholars with years of teaching experience
                            </p>
                            <div class="slide-btns animate__animated animate__fadeInUp" style="animation-delay:0.3s;">
                                <a href="{{ route('team') }}" class="slide-btn-gold">Meet Our Teachers</a>
                                <a href="{{ route('free_trial') }}" class="slide-btn-outline">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- Carousel End -->


    <!-- ===================== STATS ===================== -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="stat-item">
                        <i class="fa fa-certificate stat-icon"></i>
                        <div class="stat-number" data-target="10">0</div>
                        <div class="stat-label">Years Experience</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="stat-item">
                        <i class="fa fa-users-cog stat-icon"></i>
                        <div class="stat-number" data-target="25">0</div>
                        <div class="stat-label">Qualified Teachers</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="stat-item">
                        <i class="fa fa-users stat-icon"></i>
                        <div class="stat-number" data-target="1500">0</div>
                        <div class="stat-label">Satisfied Students</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="stat-item">
                        <i class="fa fa-book-open stat-icon"></i>
                        <div class="stat-number" data-target="500">0</div>
                        <div class="stat-label">Hafiz Graduates</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ===================== WHY CHOOSE US ===================== -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h6 class="section-title bg-white text-start pe-3" style="color: var(--gold);">Why Choose Us</h6>
                        <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">Why Parents
                            Trust Us For Their Children</h1>
                        <p class="mb-4" style="color: var(--text-mid); line-height: 1.9;">
                            Our academy combines traditional Islamic teaching methods with modern pedagogy. Every teacher is
                            a
                            qualified scholar committed to nurturing the next generation of Muslims.
                        </p>
                        <div class="row g-4">
                            @php
                                $skills = [
                                    ['label' => 'Quran & Tajweed', 'val' => 99, 'delay' => '0s'],
                                    ['label' => 'Islamic Studies', 'val' => 99, 'delay' => '0.2s'],
                                    ['label' => 'Arabic Language', 'val' => 99, 'delay' => '0.4s'],
                                    ['label' => 'Hifz Program', 'val' => 99, 'delay' => '0.6s'],
                                ];
                            @endphp
                            @foreach($skills as $skill)
                                <div class="col-12">
                                    <div class="skill">
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2"
                                                style="color: var(--text-mid); font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">
                                                {{ $skill['label'] }}</p>
                                            <p class="mb-2" style="color: var(--gold); font-weight: 700;">{{ $skill['val'] }}%
                                            </p>
                                        </div>
                                        <div class="progress"
                                            style="height: 5px; background: rgba(174,130,37,0.12); border-radius: 0;">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill['val'] }}"
                                                aria-valuemin="0" aria-valuemax="100"
                                                style="background: linear-gradient(90deg, var(--gold-dark), var(--gold), var(--gold-light)); width: 0%; transition: width 1.5s ease {{ $skill['delay'] }};">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="img-border">
                        <img class="img-fluid" src="{{ asset('img/feature.jpg') }}" alt="Why Choose Us">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ===================== COURSES ===================== -->
    <div class="container-xxl py-5" style="background: var(--light-bg);">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title text-center px-3" style="background: var(--light-bg); color: var(--gold);">Our
                    Courses</h6>
                <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">We Focus On Authentic
                    Islamic Education</h1>
            </div>
            <div class="row g-4">
                @php
                    $courses = [
                        ['img' => 'service-1.jpg', 'title' => 'Norani Qaida', 'delay' => '0.1s'],
                        ['img' => 'service-2.jpg', 'title' => 'Quran Recitation', 'delay' => '0.3s'],
                        ['img' => 'service-3.jpg', 'title' => 'Tajweed Rules', 'delay' => '0.5s'],
                        ['img' => 'service-4.jpg', 'title' => 'Hifz ul Quran', 'delay' => '0.1s'],
                        ['img' => 'service-5.jpg', 'title' => 'Islamic Studies', 'delay' => '0.3s'],
                        ['img' => 'service-7.jpg', 'title' => 'Hadith & Seerah', 'delay' => '0.1s'],
                    ];
                @endphp
                @foreach($courses as $course)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $course['delay'] }}">
                        <a href="{{ route('courses') }}" class="text-decoration-none d-block">
                            <div class="position-relative overflow-hidden rounded">
                                <img src="{{ asset('img/' . $course['img']) }}" alt="{{ $course['title'] }}"
                                    class="img-fluid w-100 course-img" onmouseover="this.style.transform='scale(1.05)'"
                                    onmouseout="this.style.transform='scale(1)'">
                                <div class="position-absolute bottom-0 start-0 end-0"
                                    style="background: linear-gradient(to top, rgba(13,27,42,0.90) 0%, rgba(13,27,42,0.4) 50%, transparent 100%); padding: 40px 16px 18px;">
                                    <h4 class="mb-0 text-white text-center"
                                        style="font-family: 'Cinzel', serif; font-size: 15px; letter-spacing: 1px;">
                                        {{ $course['title'] }}
                                    </h4>
                                    <div class="mx-auto mt-2" style="width: 40px; height: 2px; background: var(--gold);"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="text-center mt-5 wow fadeInUp" data-wow-delay="0.3s">
                    <a href="{{ route('courses') }}" class="btn py-3 px-5"
                        style="background: var(--gold); color: var(--white); font-family: 'Cinzel', serif; font-weight: 700; font-size: 12px; letter-spacing: 2px; text-transform: uppercase; border-radius: 0; border: 2px solid var(--gold);">
                        View All Courses
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- ===================== FREE TRIAL ===================== -->
    <div class="container-xxl py-5" style="background: var(--off-white);">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="position-relative">
                        <img src="{{ asset('img/trial.jpg') }}" alt="Free Trial Class"
                            class="img-fluid w-100 rounded trial-img">
                        <div class="position-absolute"
                            style="top: 24px; left: -16px; background: var(--navy); border: 2px solid var(--gold); padding: 14px 20px; border-radius: 4px; box-shadow: 0 8px 32px rgba(13,27,42,0.25);">
                            <div
                                style="font-family: 'Cinzel', serif; color: var(--gold); font-size: 28px; font-weight: 700; line-height: 1;">
                                3</div>
                            <div
                                style="font-family: 'Cinzel', serif; color: var(--white); font-size: 10px; letter-spacing: 2px; text-transform: uppercase; margin-top: 2px;">
                                Days Free</div>
                        </div>
                        <div class="position-absolute bottom-0 start-0 end-0"
                            style="background: linear-gradient(to top, rgba(13,27,42,0.92) 0%, transparent 100%); padding: 40px 24px 20px; border-radius: 0 0 4px 4px;">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div style="width: 36px; height: 2px; background: var(--gold);"></div>
                                <span
                                    style="font-family: 'Amiri', serif; color: rgba(255,255,255,0.75); font-size: 15px; font-style: italic;">No
                                    commitment required</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start pe-3"
                        style="color: var(--gold); background: var(--off-white) !important;">Free Trial</h6>
                    <h1 class="display-6 mb-3" style="font-family: 'Cinzel', serif; color: var(--navy);">
                        Start Your <span style="color: var(--gold);">3 Days</span><br>Free Trial Classes
                    </h1>
                    <p class="mb-4" style="color: var(--text-mid); line-height: 1.9; font-size: 15px;">
                        Experience the quality of our teaching before you commit. Join our <strong
                            style="color: var(--navy);">3-day free trial</strong> and let your child learn directly from our
                        qualified Quran teachers — completely free, no obligation.
                    </p>
                    @php
                        $trialFeatures = [
                            ['icon' => 'fa-user-graduate', 'title' => 'One-on-One Session', 'desc' => 'Personal attention from a certified Quran teacher.'],
                            ['icon' => 'fa-clock', 'title' => 'Flexible Timing', 'desc' => 'Choose class time that suits your schedule.'],
                            ['icon' => 'fa-shield-alt', 'title' => 'No Commitment', 'desc' => 'Cancel anytime — zero pressure, zero cost.'],
                        ];
                    @endphp
                    <div class="d-flex flex-column gap-3 mb-4">
                        @foreach($trialFeatures as $f)
                            <div class="d-flex align-items-start gap-3">
                                <div class="flex-shrink-0 d-flex align-items-center justify-content-center"
                                    style="width: 44px; height: 44px; border-radius: 50%; background: var(--navy); border: 2px solid var(--gold);">
                                    <i class="fa {{ $f['icon'] }}" style="color: var(--gold); font-size: 15px;"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1" style="font-family: 'Cinzel', serif; color: var(--navy); font-size: 13px;">
                                        {{ $f['title'] }}</h6>
                                    <p class="mb-0" style="font-size: 13px; color: var(--text-mid); line-height: 1.7;">
                                        {{ $f['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('free_trial') }}" class="btn py-3 px-5"
                            style="background: var(--gold); color: var(--white); font-family: 'Cinzel', serif; font-size: 12px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; border-radius: 0; border: 2px solid var(--gold); transition: all 0.3s;"
                            onmouseover="this.style.background='transparent'; this.style.color='var(--gold)';"
                            onmouseout="this.style.background='var(--gold)'; this.style.color='var(--white)';">
                            Book Free Trial
                        </a>
                        <a href="{{ route('contact') }}" class="btn py-3 px-5"
                            style="background: transparent; color: var(--navy); font-family: 'Cinzel', serif; font-size: 12px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; border-radius: 0; border: 2px solid var(--navy); transition: all 0.3s;"
                            onmouseover="this.style.background='var(--navy)'; this.style.color='var(--white)';"
                            onmouseout="this.style.background='transparent'; this.style.color='var(--navy)';">
                            Ask a Question
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ===================== HOW IT WORKS ===================== -->
    <div class="hiw-section">
        <div class="hiw-bg-image">
            <img src="{{ asset('img/how-to-learn.jpg') }}" alt="" aria-hidden="true">
            <div class="hiw-bg-overlay"></div>
        </div>
        <div class="container" style="position:relative; z-index:2;">

            <div class="hiw-header wow fadeInUp" data-wow-delay="0.1s">
                <span class="hiw-eyebrow">✦ Simple Process ✦</span>
                <h1 class="hiw-heading">How It <span>Works</span></h1>
                <p class="hiw-subtext">From registration to certification — your complete Quran learning journey in 5 easy
                    steps, delivered live via <strong style="color: var(--gold); font-style: normal;">Microsoft
                        Teams</strong>.</p>
            </div>

            <div class="hiw-steps-row wow fadeInUp" data-wow-delay="0.2s">
                @php
                    $steps = [
                        ['num' => '01', 'icon' => 'fa-user-plus', 'title' => 'Register Online', 'desc' => 'Fill out our simple enrollment form and create your student account in minutes.'],
                        ['num' => '02', 'icon' => 'fa-calendar-check', 'title' => 'Book Free Trial', 'desc' => 'Schedule a free trial session with a qualified teacher at your preferred time.'],
                        ['num' => '03', 'icon' => 'fa-book-open', 'title' => 'Choose Your Course', 'desc' => 'Pick from Norani Qaida, Tajweed, Hifz, Islamic Studies, Arabic & more.'],
                        ['num' => '04', 'icon' => 'fa-chalkboard-teacher', 'title' => 'Start Learning', 'desc' => 'Attend live one-on-one classes via Microsoft Teams — our primary online classroom platform.'],
                        ['num' => '05', 'icon' => 'fa-certificate', 'title' => 'Get Certified', 'desc' => 'Earn an official certificate from Bismillah Islamic Academy upon completion.'],
                    ];
                @endphp

                @foreach($steps as $step)
                    <div class="hiw-step-col">
                        @if(!$loop->last)
                            <div class="hiw-arrow">
                                <svg viewBox="0 0 40 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 6 Q10 1 20 6 Q30 11 40 6" stroke="var(--gold)" stroke-width="1.5"
                                        stroke-dasharray="4 3" fill="none" />
                                    <polygon points="36,3 40,6 36,9" fill="var(--gold)" opacity="0.8" />
                                </svg>
                            </div>
                        @endif
                        <div class="hiw-card">
                            <div class="hiw-wm">{{ $step['num'] }}</div>
                            <div class="hiw-step-badge">STEP {{ $step['num'] }}</div>
                            <div class="hiw-icon-ring">
                                <div class="hiw-icon-inner">
                                    <i class="fa {{ $step['icon'] }}"></i>
                                </div>
                            </div>
                            <div class="hiw-card-divider"></div>
                            <h6 class="hiw-card-title">{{ $step['title'] }}</h6>
                            <p class="hiw-card-desc">{{ $step['desc'] }}</p>
                            @if($step['num'] === '04')
                                <div class="hiw-teams-badge">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.5 8.5h-3v-1a2.5 2.5 0 1 0-5 0v1h-3A1.5 1.5 0 0 0 7 10v8a1.5 1.5 0 0 0 1.5 1.5h11A1.5 1.5 0 0 0 21 18v-8a1.5 1.5 0 0 0-1.5-1.5z"
                                            fill="rgba(174,130,37,0.8)" />
                                        <circle cx="14" cy="7" r="2" fill="var(--gold)" />
                                        <rect x="10" y="13" width="8" height="1.5" rx="0.75" fill="white" opacity="0.9" />
                                        <rect x="10" y="16" width="5" height="1.5" rx="0.75" fill="white" opacity="0.6" />
                                    </svg>
                                    Microsoft Teams
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="hiw-cta wow fadeInUp" data-wow-delay="0.4s">
                <p class="hiw-cta-text">Ready to begin your Quran journey?</p>
                <a href="{{ route('free_trial') }}" class="hiw-cta-btn">
                    <span>Enroll Now — It's Free</span>
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

  <!-- ====== LEARNING JOURNEY STRIP ====== -->
<section class="lj-section wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center mb-5">
            <span class="lj-eyebrow">✦ Your Path ✦</span>
            <h2 class="lj-heading">Your Learning Journey</h2>
        </div>
        <div class="lj-track">
            @php
                $journey = [
                    ['icon' => 'fa-graduation-cap', 'title' => 'Free Trial', 'desc' => 'Start your journey risk-free'],
                    ['icon' => 'fa-book-open', 'title' => 'Norani Qaida', 'desc' => 'Build strong foundations'],
                    ['icon' => 'fa-quran', 'title' => 'Quran Reading', 'desc' => 'Read fluently with confidence'],
                    ['icon' => 'fa-microphone', 'title' => 'Tajweed', 'desc' => 'Perfect your pronunciation'],
                    ['icon' => 'fa-trophy', 'title' => 'Hifz ul Quran', 'desc' => 'Achieve mastery & memorization'],
                ];
            @endphp
            @foreach($journey as $step)
            <div class="lj-step">
                <div class="lj-circle">
                    <i class="fa {{ $step['icon'] }}"></i>
                </div>
                <p class="lj-title">{{ $step['title'] }}</p>
                <p class="lj-desc">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('free_trial') }}" class="lj-btn">Book Your Free Trial Today</a>
        </div>
    </div>
</section>
    <!-- ====== FEATURES ICONS END ====== -->


    {{-- ═══════════════════════════════════════════════════════════════
    SECTION B: QUR'AN AYAH BANNER — Dark cinematic strip
    PASTE THIS after FEATURES ICONS, still before TEAM FULL IMAGE
    ═══════════════════════════════════════════════════════════════ --}}

    <!-- ====== AYAH BANNER ====== -->
    <section class="ayah-section wow fadeIn" data-wow-delay="0.1s">
        <div class="ayah-bg">
            <img src="{{ asset('img/slide-1.jpg') }}" alt="">
            <div class="ayah-veil"></div>
        </div>
        <div class="container ayah-body">
            <div class="ayah-ornament">﷽</div>
            <p class="ayah-arabic">اقْرَأْ بِاسْمِ رَبِّكَ الَّذِي خَلَقَ</p>
            <div class="ayah-rule"></div>
            <p class="ayah-english">"Read in the name of your Lord who created"</p>
            <span class="ayah-ref">Surah Al-Alaq · 96:1 · First Revelation of the Holy Quran</span>
            <a href="{{ route('free_trial') }}" class="ayah-cta">
                Start Your Free Trial &nbsp;<i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>
    <!-- ====== AYAH BANNER END ====== -->


    {{-- ═══════════════════════════════════════════════════════════════
    SECTION C: COUNTRIES WE SERVE — flag strip / trust bar
    PASTE THIS after AYAH BANNER
    ═══════════════════════════════════════════════════════════════ --}}

    <!-- ====== COUNTRIES STRIP ====== -->
    <section class="countries-section wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <p class="countries-label">Trusted by families across</p>
            <div class="countries-row">
                <div class="country-chip">🇵🇰 Pakistan</div>
                <div class="country-divider"></div>
                <div class="country-chip">🇬🇧 United Kingdom</div>
                <div class="country-divider"></div>
                <div class="country-chip">🇺🇸 United States</div>
                <div class="country-divider"></div>
                <div class="country-chip">🇨🇦 Canada</div>
                <div class="country-divider"></div>
                <div class="country-chip">🇦🇺 Australia</div>
                <div class="country-divider"></div>
                <div class="country-chip">🇸🇦 Saudi Arabia</div>
                <div class="country-divider"></div>
                <div class="country-chip">🇦🇪 UAE</div>
            </div>
        </div>
    </section>

    <!-- ===================== TEAM FULL IMAGE ===================== -->
    <div class="container-xxl py-5" style="background: var(--light-bg);">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title text-center px-3" style="background: var(--light-bg); color: var(--gold);">Our
                    Academy</h6>
                <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">Meet Our Team</h1>
            </div>
            <div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="position-relative overflow-hidden rounded">
                    <img src="{{ asset('img/teams.jpg') }}" alt="Bismillah Islamic Academy Team"
                        class="w-100 team-full-img">
                    <div class="position-absolute top-0 start-0 w-100 h-100"
                        style="background: linear-gradient(to top, rgba(13,27,42,0.75) 0%, rgba(13,27,42,0.1) 60%, transparent 100%);">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ===================== TEAM ===================== -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center px-3" style="color: var(--gold);">Our Teachers</h6>
                <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">Meet Our Qualified
                    Scholars</h1>
            </div>
            <div class="row g-4">
                @php
                    $team = [
                        ['name' => 'Sheikh Abdullah', 'role' => 'Quran Teacher', 'img' => 'team-1.jpg', 'delay' => '0.1s'],
                        ['name' => 'Kamran Qureshi', 'role' => 'Tajweed Specialist', 'img' => 'team-2.jpg', 'delay' => '0.3s'],
                        ['name' => 'Noor Ur Rehman', 'role' => 'Islamic Studies Teacher', 'img' => 'team-3.jpg', 'delay' => '0.5s'],
                    ];
                @endphp
                @foreach($team as $member)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $member['delay'] }}">
                        <div class="team-item text-center p-4"
                            style="background: var(--off-white); border: 1px solid rgba(174,130,37,0.15); transition: all 0.4s;">
                            <img src="{{ asset('img/' . $member['img']) }}" alt="{{ $member['name'] }}"
                                style="width: 130px; height: 130px; border-radius: 50%; border: 3px solid var(--gold); object-fit: cover; display: block; margin: 0 auto 20px; padding: 4px; background: var(--white);">
                            <div class="team-text">
                                <div class="team-title">
                                    <h5
                                        style="font-family: 'Cinzel', serif; color: var(--navy); font-size: 16px; margin-bottom: 4px;">
                                        {{ $member['name'] }}</h5>
                                    <span
                                        style="color: var(--gold); font-size: 11px; letter-spacing: 2px; text-transform: uppercase; font-family: 'Lato', sans-serif; display: block; margin-bottom: 14px;">{{ $member['role'] }}</span>
                                </div>
                                <div class="team-social"
                                    style="display: flex; justify-content: center; gap: 8px; margin-top: 14px;">
                                    <a href="#"
                                        style="width:34px;height:34px;border:1px solid var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:13px;text-decoration:none;transition:all 0.3s;"
                                        onmouseover="this.style.background='var(--gold)';this.style.color='white';"
                                        onmouseout="this.style.background='transparent';this.style.color='var(--gold)';"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a href="#"
                                        style="width:34px;height:34px;border:1px solid var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:13px;text-decoration:none;transition:all 0.3s;"
                                        onmouseover="this.style.background='var(--gold)';this.style.color='white';"
                                        onmouseout="this.style.background='transparent';this.style.color='var(--gold)';"><i
                                            class="fab fa-twitter"></i></a>
                                    <a href="#"
                                        style="width:34px;height:34px;border:1px solid var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:13px;text-decoration:none;transition:all 0.3s;"
                                        onmouseover="this.style.background='var(--gold)';this.style.color='white';"
                                        onmouseout="this.style.background='transparent';this.style.color='var(--gold)';"><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- ===================== TESTIMONIALS ===================== -->
    <div class="container-xxl py-5" style="background: var(--light-bg);">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title text-center px-3" style="background: var(--light-bg); color: var(--gold);">
                    Testimonials</h6>
                <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">What Our Students &
                    Parents Say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @php
                    $testimonials = [
                        ['name' => 'Ahmad Khan', 'role' => 'Parent', 'img' => 'testimonial-1.jpg', 'text' => 'Alhamdulillah, my son memorized 5 Juz in just one year. The teachers are dedicated and the environment is truly Islamic.'],
                        ['name' => 'Sarah Bibi', 'role' => 'Parent', 'img' => 'testimonial-2.jpg', 'text' => 'My daughter improved her Tajweed tremendously. The academy provides a wonderful learning atmosphere for children.'],
                        ['name' => 'Omar Farooq', 'role' => 'Student', 'img' => 'testimonial-3.jpg', 'text' => 'The Arabic language course helped me understand the Quran directly. Highly recommend to every Muslim.'],
                        ['name' => 'Aisha Rahman', 'role' => 'Parent', 'img' => 'testimonial-4.jpg', 'text' => 'Best Islamic school in the area. The scholars here are very knowledgeable and approachable. JazakAllah Khair!'],
                    ];
                @endphp
                @foreach($testimonials as $t)
                    <div class="testimonial-item rounded p-4"
                        style="background: var(--white); border: 1px solid rgba(174,130,37,0.15); position: relative; box-shadow: 0 4px 20px rgba(13,27,42,0.07);">
                        <div class="d-flex align-items-center mb-4">
                            <img class="flex-shrink-0 rounded-circle border p-1" src="{{ asset('img/' . $t['img']) }}"
                                alt="{{ $t['name'] }}"
                                style="width:62px;height:62px;border-color:var(--gold)!important;object-fit:cover;">
                            <div class="ms-4">
                                <h5 class="mb-1" style="font-family:'Cinzel',serif;color:var(--navy);font-size:14px;">
                                    {{ $t['name'] }}</h5>
                                <span
                                    style="color:var(--gold);font-size:10px;letter-spacing:2px;text-transform:uppercase;">{{ $t['role'] }}</span>
                                <div style="color:var(--gold);font-size:12px;margin-top:3px;">★★★★★</div>
                            </div>
                        </div>
                        <div style="height:1px;background:rgba(174,130,37,0.12);margin-bottom:16px;"></div>
                        <p class="mb-0"
                            style="font-family:'Amiri',serif;font-size:16px;font-style:italic;color:var(--text-mid);line-height:1.85;">
                            {{ $t['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection


{{-- ===================== PAGE STYLES ===================== --}}
@push('styles')

@endpush


{{-- ===================== PAGE SCRIPTS ===================== --}}
@push('scripts')
    <script>
        (function () {
            /* ── STATS COUNTER ──────────────────────────────── */
            var counted = false;

            function animateCounter(el) {
                var target = parseInt(el.getAttribute('data-target'));
                var duration = 2000, startTime = null;
                function step(ts) {
                    if (!startTime) startTime = ts;
                    var prog = Math.min((ts - startTime) / duration, 1);
                    var eased = 1 - (1 - prog) * (1 - prog);
                    el.textContent = Math.floor(eased * target);
                    if (prog < 1) requestAnimationFrame(step);
                    else el.textContent = target;
                }
                requestAnimationFrame(step);
            }

            function startCounting() {
                if (counted) return;
                counted = true;
                document.querySelectorAll('.stat-item').forEach(function (i) { i.classList.add('visible'); });
                document.querySelectorAll('.stat-number[data-target]').forEach(animateCounter);
            }

            var statsSection = document.querySelector('.stats-section');
            if (statsSection) {
                new IntersectionObserver(function (entries, obs) {
                    entries.forEach(function (e) { if (e.isIntersecting) { startCounting(); obs.disconnect(); } });
                }, { threshold: 0.3 }).observe(statsSection);
            }

            /* ── SKILL BARS ─────────────────────────────────── */
            var skillsDone = false;
            var whySec = document.querySelector('.skill');
            if (whySec) {
                new IntersectionObserver(function (entries) {
                    entries.forEach(function (e) {
                        if (e.isIntersecting && !skillsDone) {
                            skillsDone = true;
                            setTimeout(function () {
                                document.querySelectorAll('.progress-bar').forEach(function (bar) {
                                    bar.style.width = bar.getAttribute('aria-valuenow') + '%';
                                });
                            }, 200);
                        }
                    });
                }, { threshold: 0.3 }).observe(whySec.closest('.container-xxl'));
            }
        })();
    </script>
@endpush
