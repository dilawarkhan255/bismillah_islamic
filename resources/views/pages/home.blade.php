@extends('layouts.app')

@section('title', 'Bismillah Islamic Academy - Learn Quran & Islamic Studies')

@section('content')

    <!-- ===================== HERO CAROUSEL ===================== -->
    <section class="hero-carousel wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
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
                        <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">Why Parents Trust Us For Their Children</h1>
                        <p class="mb-4" style="color: var(--text-mid); line-height: 1.9;">
                            Our academy combines traditional Islamic teaching methods with modern pedagogy. Every teacher is a
                            qualified scholar committed to nurturing the next generation of Muslims.
                        </p>
                        <div class="row g-4">
                            @php
                                $skills = [
                                    ['label' => 'Quran & Tajweed',  'val' => 99, 'delay' => '0s'],
                                    ['label' => 'Islamic Studies',  'val' => 99, 'delay' => '0.2s'],
                                    ['label' => 'Arabic Language',  'val' => 99, 'delay' => '0.4s'],
                                    ['label' => 'Hifz Program',     'val' => 99, 'delay' => '0.6s'],
                                ];
                            @endphp
                            @foreach($skills as $skill)
                            <div class="col-12">
                                <div class="skill">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2" style="color: var(--text-mid); font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">{{ $skill['label'] }}</p>
                                        <p class="mb-2" style="color: var(--gold); font-weight: 700;">{{ $skill['val'] }}%</p>
                                    </div>
                                    <div class="progress" style="height: 5px; background: rgba(174,130,37,0.12); border-radius: 0;">
                                        <div class="progress-bar" role="progressbar"
                                             aria-valuenow="{{ $skill['val'] }}" aria-valuemin="0" aria-valuemax="100"
                                             style="background: linear-gradient(90deg, var(--gold-dark), var(--gold), var(--gold-light)); width: 0%; transition: width 1.5s ease {{ $skill['delay'] }};"></div>
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
                <h6 class="section-title text-center px-3" style="background: var(--light-bg); color: var(--gold);">Our Courses</h6>
                <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">We Focus On Authentic Islamic Education</h1>
            </div>
            <div class="row g-4">
                @php
                    $courses = [
                        ['img' => 'service-1.jpg', 'title' => 'Norani Qaida',     'delay' => '0.1s'],
                        ['img' => 'service-2.jpg', 'title' => 'Quran Recitation', 'delay' => '0.3s'],
                        ['img' => 'service-3.jpg', 'title' => 'Tajweed Rules',    'delay' => '0.5s'],
                        ['img' => 'service-4.jpg', 'title' => 'Hifz ul Quran',   'delay' => '0.1s'],
                        ['img' => 'service-5.jpg', 'title' => 'Islamic Studies',  'delay' => '0.3s'],
                        ['img' => 'service-7.jpg', 'title' => 'Hadith & Seerah',  'delay' => '0.1s'],
                    ];
                @endphp
                @foreach($courses as $course)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $course['delay'] }}">
                    <a href="{{ route('courses') }}" class="text-decoration-none d-block">
                        <div class="position-relative overflow-hidden rounded">
                            <img src="{{ asset('img/' . $course['img']) }}"
                                 alt="{{ $course['title'] }}"
                                 class="img-fluid w-100 course-img"
                                 onmouseover="this.style.transform='scale(1.05)'"
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
                            <div style="font-family: 'Cinzel', serif; color: var(--gold); font-size: 28px; font-weight: 700; line-height: 1;">3</div>
                            <div style="font-family: 'Cinzel', serif; color: var(--white); font-size: 10px; letter-spacing: 2px; text-transform: uppercase; margin-top: 2px;">Days Free</div>
                        </div>
                        <div class="position-absolute bottom-0 start-0 end-0"
                             style="background: linear-gradient(to top, rgba(13,27,42,0.92) 0%, transparent 100%); padding: 40px 24px 20px; border-radius: 0 0 4px 4px;">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div style="width: 36px; height: 2px; background: var(--gold);"></div>
                                <span style="font-family: 'Amiri', serif; color: rgba(255,255,255,0.75); font-size: 15px; font-style: italic;">No commitment required</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start pe-3" style="color: var(--gold); background: var(--off-white) !important;">Free Trial</h6>
                    <h1 class="display-6 mb-3" style="font-family: 'Cinzel', serif; color: var(--navy);">
                        Start Your <span style="color: var(--gold);">3 Days</span><br>Free Trial Classes
                    </h1>
                    <p class="mb-4" style="color: var(--text-mid); line-height: 1.9; font-size: 15px;">
                        Experience the quality of our teaching before you commit. Join our <strong style="color: var(--navy);">3-day free trial</strong> and let your child learn directly from our qualified Quran teachers — completely free, no obligation.
                    </p>
                    @php
                        $trialFeatures = [
                            ['icon' => 'fa-user-graduate', 'title' => 'One-on-One Session',   'desc' => 'Personal attention from a certified Quran teacher.'],
                            ['icon' => 'fa-clock',          'title' => 'Flexible Timing',      'desc' => 'Choose class time that suits your schedule.'],
                            ['icon' => 'fa-shield-alt',     'title' => 'No Commitment',        'desc' => 'Cancel anytime — zero pressure, zero cost.'],
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
                                <h6 class="mb-1" style="font-family: 'Cinzel', serif; color: var(--navy); font-size: 13px;">{{ $f['title'] }}</h6>
                                <p class="mb-0" style="font-size: 13px; color: var(--text-mid); line-height: 1.7;">{{ $f['desc'] }}</p>
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
                <p class="hiw-subtext">From registration to certification — your complete Quran learning journey in 5 easy steps, delivered live via <strong style="color: var(--gold); font-style: normal;">Microsoft Teams</strong>.</p>
            </div>

            <div class="hiw-steps-row wow fadeInUp" data-wow-delay="0.2s">
                @php
                    $steps = [
                        ['num' => '01', 'icon' => 'fa-user-plus',          'title' => 'Register Online',    'desc' => 'Fill out our simple enrollment form and create your student account in minutes.'],
                        ['num' => '02', 'icon' => 'fa-calendar-check',     'title' => 'Book Free Trial',    'desc' => 'Schedule a free trial session with a qualified teacher at your preferred time.'],
                        ['num' => '03', 'icon' => 'fa-book-open',          'title' => 'Choose Your Course', 'desc' => 'Pick from Norani Qaida, Tajweed, Hifz, Islamic Studies, Arabic & more.'],
                        ['num' => '04', 'icon' => 'fa-chalkboard-teacher', 'title' => 'Start Learning',     'desc' => 'Attend live one-on-one classes via Microsoft Teams — our primary online classroom platform.'],
                        ['num' => '05', 'icon' => 'fa-certificate',        'title' => 'Get Certified',      'desc' => 'Earn an official certificate from Bismillah Islamic Academy upon completion.'],
                    ];
                @endphp

                @foreach($steps as $step)
                <div class="hiw-step-col">
                    @if(!$loop->last)
                    <div class="hiw-arrow">
                        <svg viewBox="0 0 40 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 6 Q10 1 20 6 Q30 11 40 6" stroke="var(--gold)" stroke-width="1.5" stroke-dasharray="4 3" fill="none"/>
                            <polygon points="36,3 40,6 36,9" fill="var(--gold)" opacity="0.8"/>
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
                                <path d="M19.5 8.5h-3v-1a2.5 2.5 0 1 0-5 0v1h-3A1.5 1.5 0 0 0 7 10v8a1.5 1.5 0 0 0 1.5 1.5h11A1.5 1.5 0 0 0 21 18v-8a1.5 1.5 0 0 0-1.5-1.5z" fill="rgba(174,130,37,0.8)"/>
                                <circle cx="14" cy="7" r="2" fill="var(--gold)"/>
                                <rect x="10" y="13" width="8" height="1.5" rx="0.75" fill="white" opacity="0.9"/>
                                <rect x="10" y="16" width="5" height="1.5" rx="0.75" fill="white" opacity="0.6"/>
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


    <!-- ===================== TEAM FULL IMAGE ===================== -->
    <div class="container-xxl py-5" style="background: var(--light-bg);">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title text-center px-3" style="background: var(--light-bg); color: var(--gold);">Our Academy</h6>
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
                <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">Meet Our Qualified Scholars</h1>
            </div>
            <div class="row g-4">
                @php
                    $team = [
                        ['name' => 'Sheikh Abdullah', 'role' => 'Principal & Quran Teacher', 'img' => 'team-1.jpg', 'delay' => '0.1s'],
                        ['name' => 'Ustaz Ibrahim',   'role' => 'Tajweed Specialist',        'img' => 'team-2.jpg', 'delay' => '0.3s'],
                        ['name' => 'Ustaza Fatima',   'role' => 'Islamic Studies Teacher',   'img' => 'team-3.jpg', 'delay' => '0.5s'],
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
                                <h5 style="font-family: 'Cinzel', serif; color: var(--navy); font-size: 16px; margin-bottom: 4px;">{{ $member['name'] }}</h5>
                                <span style="color: var(--gold); font-size: 11px; letter-spacing: 2px; text-transform: uppercase; font-family: 'Lato', sans-serif; display: block; margin-bottom: 14px;">{{ $member['role'] }}</span>
                            </div>
                            <div class="team-social" style="display: flex; justify-content: center; gap: 8px; margin-top: 14px;">
                                <a href="#" style="width:34px;height:34px;border:1px solid var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:13px;text-decoration:none;transition:all 0.3s;"
                                   onmouseover="this.style.background='var(--gold)';this.style.color='white';"
                                   onmouseout="this.style.background='transparent';this.style.color='var(--gold)';"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" style="width:34px;height:34px;border:1px solid var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:13px;text-decoration:none;transition:all 0.3s;"
                                   onmouseover="this.style.background='var(--gold)';this.style.color='white';"
                                   onmouseout="this.style.background='transparent';this.style.color='var(--gold)';"><i class="fab fa-twitter"></i></a>
                                <a href="#" style="width:34px;height:34px;border:1px solid var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:13px;text-decoration:none;transition:all 0.3s;"
                                   onmouseover="this.style.background='var(--gold)';this.style.color='white';"
                                   onmouseout="this.style.background='transparent';this.style.color='var(--gold)';"><i class="fab fa-instagram"></i></a>
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
                <h6 class="section-title text-center px-3" style="background: var(--light-bg); color: var(--gold);">Testimonials</h6>
                <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">What Our Students & Parents Say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @php
                    $testimonials = [
                        ['name' => 'Ahmad Khan',   'role' => 'Parent',  'img' => 'testimonial-1.jpg', 'text' => 'Alhamdulillah, my son memorized 5 Juz in just one year. The teachers are dedicated and the environment is truly Islamic.'],
                        ['name' => 'Sarah Bibi',   'role' => 'Parent',  'img' => 'testimonial-2.jpg', 'text' => 'My daughter improved her Tajweed tremendously. The academy provides a wonderful learning atmosphere for children.'],
                        ['name' => 'Omar Farooq',  'role' => 'Student', 'img' => 'testimonial-3.jpg', 'text' => 'The Arabic language course helped me understand the Quran directly. Highly recommend to every Muslim.'],
                        ['name' => 'Aisha Rahman', 'role' => 'Parent',  'img' => 'testimonial-4.jpg', 'text' => 'Best Islamic school in the area. The scholars here are very knowledgeable and approachable. JazakAllah Khair!'],
                    ];
                @endphp
                @foreach($testimonials as $t)
                <div class="testimonial-item rounded p-4"
                     style="background: var(--white); border: 1px solid rgba(174,130,37,0.15); position: relative; box-shadow: 0 4px 20px rgba(13,27,42,0.07);">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1"
                             src="{{ asset('img/' . $t['img']) }}" alt="{{ $t['name'] }}"
                             style="width:62px;height:62px;border-color:var(--gold)!important;object-fit:cover;">
                        <div class="ms-4">
                            <h5 class="mb-1" style="font-family:'Cinzel',serif;color:var(--navy);font-size:14px;">{{ $t['name'] }}</h5>
                            <span style="color:var(--gold);font-size:10px;letter-spacing:2px;text-transform:uppercase;">{{ $t['role'] }}</span>
                            <div style="color:var(--gold);font-size:12px;margin-top:3px;">★★★★★</div>
                        </div>
                    </div>
                    <div style="height:1px;background:rgba(174,130,37,0.12);margin-bottom:16px;"></div>
                    <p class="mb-0" style="font-family:'Amiri',serif;font-size:16px;font-style:italic;color:var(--text-mid);line-height:1.85;">{{ $t['text'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection


{{-- ===================== PAGE STYLES ===================== --}}
@push('styles')
<style>

/* ══════════════════════════════════════════════════
   GLOBAL OVERFLOW FIX — horizontal scroll band karo
   ══════════════════════════════════════════════════ */
.hero-carousel,
.stats-section,
.hiw-section,
.container-xxl {
    max-width: 100%;
}

/* ── GLOBAL CURSOR ───────────────────────────────── */
a, button, [role="button"], .btn, .nav-link, .dropdown-item,
.carousel-control-prev, .carousel-control-next, .carousel-indicators button,
.owl-prev, .owl-next, .back-to-top, .hiw-card, .bia-socials a,
.bstrip-socials a, .team-social a, .hiw-cta-btn, .bia-enroll-btn, .bstrip-enroll {
    cursor: pointer !important;
}

/* ══════════════════════════════════════════════════
   HERO CAROUSEL — Responsive height via aspect-ratio
   ══════════════════════════════════════════════════ */

/* Desktop default */
.carousel-img {
    width: 100%;
    height: 620px;
    object-fit: cover;
    object-position: center;
    display: block;
}

/* Tablet */
@media (max-width: 991px) {
    .carousel-img { height: 500px; }
}

/* Large mobile */
@media (max-width: 767px) {
    .carousel-img { height: 420px; }
    .carousel-caption { bottom: 20px; left: 8px; right: 8px; }
}

/* Small mobile */
@media (max-width: 480px) {
    .carousel-img {
        height: 320px;
        /* Mobile pe center crop better lagti hai */
        object-position: center 30%;
    }
    .carousel-caption { bottom: 12px; left: 4px; right: 4px; }
}

/* Very small (320px) */
@media (max-width: 360px) {
    .carousel-img { height: 260px; }
}

.slide-content-wrap {
    max-width: 860px;
    margin: 0 auto;
    padding: 0 12px;
}

/* Badge */
.hero-badge {
    color: var(--gold-light);
    font-family: 'Amiri', serif;
    letter-spacing: 4px;
    font-size: 16px;
    margin-bottom: 20px;
    display: inline-block;
    padding: 7px 26px;
    border: 1px solid rgba(174,130,37,0.5);
}

/* Heading */
.slide-title {
    font-family: 'Cinzel', serif;
    color: #fff;
    font-size: clamp(20px, 5.5vw, 70px);
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: 16px;
}

/* Subtitle */
.slide-sub {
    font-family: 'Amiri', serif;
    font-size: clamp(11px, 1.8vw, 19px);
    color: rgba(255,255,255,0.65);
    margin-bottom: 28px;
    letter-spacing: 1px;
}

/* Button row */
.slide-btns {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    justify-content: center;
}

.slide-btn-gold {
    display: inline-block;
    background: var(--gold);
    color: #fff;
    font-family: 'Cinzel', serif;
    font-weight: 700;
    font-size: 11px;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 13px 30px;
    border: 2px solid var(--gold);
    text-decoration: none;
    box-shadow: 0 4px 20px rgba(174,130,37,0.35);
    transition: all 0.3s;
    cursor: pointer;
    white-space: nowrap;
}
.slide-btn-gold:hover { background: transparent; color: var(--gold); }

.slide-btn-outline {
    display: inline-block;
    background: transparent;
    color: #fff;
    font-family: 'Cinzel', serif;
    font-weight: 700;
    font-size: 11px;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 13px 30px;
    border: 2px solid rgba(255,255,255,0.5);
    text-decoration: none;
    transition: all 0.3s;
    cursor: pointer;
    white-space: nowrap;
}
.slide-btn-outline:hover { border-color: var(--gold); color: var(--gold); }

/* Tablet adjustments */
@media (max-width: 767px) {
    .hero-badge {
        font-size: 10px;
        letter-spacing: 2px;
        padding: 5px 14px;
        margin-bottom: 10px;
    }
    .slide-sub { margin-bottom: 14px; }
    .slide-btn-gold,
    .slide-btn-outline {
        font-size: 9px;
        letter-spacing: 1.5px;
        padding: 9px 18px;
    }
}

/* Mobile */
@media (max-width: 480px) {
    .slide-btns {
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }
    .slide-btn-gold,
    .slide-btn-outline {
        width: 100%;
        max-width: 200px;
        text-align: center;
        padding: 9px 14px;
    }
}

/* ══════════════════════════════════════════════════
   STATS — Row negative margin fix
   ══════════════════════════════════════════════════ */
.stats-section {
    background: var(--navy);
    padding: 60px 0;
}

/* Override Bootstrap's row negative margin inside stats */
.stats-section .row {
    margin-right: 0 !important;
    margin-left: 0 !important;
}

.stat-item {
    text-align: center;
    padding: 20px 10px;
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}
.stat-item.visible { opacity: 1; transform: translateY(0); }
.stat-item:nth-child(1) { transition-delay: 0.1s; }
.stat-item:nth-child(2) { transition-delay: 0.3s; }
.stat-item:nth-child(3) { transition-delay: 0.5s; }
.stat-item:nth-child(4) { transition-delay: 0.7s; }
.stat-icon { color: var(--gold); font-size: 2.5rem; margin-bottom: 15px; display: block; }
.stat-number { font-family: 'Cinzel', serif; font-size: 2.8rem; font-weight: 700; color: var(--white); line-height: 1; margin-bottom: 10px; }
.stat-label { font-size: 11px; letter-spacing: 2px; text-transform: uppercase; color: rgba(255,255,255,0.55); font-family: 'Cinzel', serif; }

/* Mobile stats: smaller font */
@media (max-width: 480px) {
    .stat-number { font-size: 2rem; }
    .stat-icon { font-size: 1.8rem; }
    .stat-label { font-size: 10px; letter-spacing: 1px; }
}

/* ══════════════════════════════════════════════════
   COURSE IMAGES — responsive height
   ══════════════════════════════════════════════════ */
.course-img {
    height: 250px;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}
@media (max-width: 575px) {
    .course-img { height: 200px; }
}

/* ══════════════════════════════════════════════════
   TRIAL IMAGE — responsive height
   ══════════════════════════════════════════════════ */
.trial-img {
    height: 480px;
    object-fit: cover;
    object-position: center;
}
@media (max-width: 991px) {
    .trial-img { height: 360px; }
}
@media (max-width: 575px) {
    .trial-img { height: 260px; }
}

/* Trial badge — on mobile it was going off left edge */
@media (max-width: 575px) {
    .trial-img + div[style*="top: 24px"] {
        left: 8px !important;
        top: 12px !important;
    }
}

/* ══════════════════════════════════════════════════
   TEAM FULL IMAGE — responsive
   ══════════════════════════════════════════════════ */
.team-full-img {
    height: 550px;
    object-fit: cover;
    object-position: center;
    display: block;
}
@media (max-width: 767px) {
    .team-full-img { height: 320px; }
}
@media (max-width: 480px) {
    .team-full-img { height: 220px; }
}

/* =====================================================
   HOW IT WORKS
   ===================================================== */
.hiw-section {
    position: relative;
    padding: 100px 0 90px;
    overflow: hidden;       /* ← ye horizontal scroll band karta hai */
    width: 100%;
    max-width: 100%;
}
.hiw-bg-image { position: absolute; inset: 0; z-index: 0; }
.hiw-bg-image img { width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; }
.hiw-bg-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(105deg,
        rgba(13,27,42,0.97) 0%,
        rgba(13,27,42,0.92) 40%,
        rgba(13,27,42,0.80) 65%,
        rgba(13,27,42,0.70) 100%);
}
.hiw-header { text-align: center; margin-bottom: 60px; }
.hiw-eyebrow { font-family: 'Amiri', serif; color: var(--gold); font-size: 15px; letter-spacing: 4px; display: block; margin-bottom: 14px; opacity: 0.9; }
.hiw-heading { font-family: 'Cinzel', serif; color: #fff; font-size: clamp(24px, 3.5vw, 40px); font-weight: 700; margin-bottom: 14px; line-height: 1.2; }
.hiw-heading span { color: var(--gold); }
.hiw-subtext { color: rgba(255,255,255,0.6); font-size: 15px; max-width: 560px; margin: 0 auto; line-height: 1.9; font-family: 'Amiri', serif; font-style: italic; }

/* Steps row */
.hiw-steps-row {
    display: flex;
    align-items: stretch;
    gap: 14px;
    position: relative;
    width: 100%;
}
.hiw-step-col { flex: 1; position: relative; display: flex; align-items: stretch; min-width: 0; }
.hiw-arrow { position: absolute; top: 44px; right: -22px; width: 44px; height: 16px; z-index: 3; opacity: 0.55; }
.hiw-arrow svg { width: 100%; height: 100%; }

/* Card */
.hiw-card {
    position: relative;
    background: rgba(13,27,42,0.65);
    border-radius: 0;
    border: 1px solid rgba(174,130,37,0.28);
    border-left: 3px solid rgba(174,130,37,0.55);
    padding: 30px 16px 26px;
    text-align: center;
    width: 100%;
    overflow: hidden;
    transition: all 0.38s ease;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    align-items: center;
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
}
.hiw-card:hover {
    background: rgba(13,27,42,0.82);
    border-color: var(--gold);
    border-left-color: var(--gold);
    transform: translateY(-8px);
    box-shadow: 0 24px 56px rgba(0,0,0,0.5), 0 0 0 1px rgba(174,130,37,0.2);
}

.hiw-wm {
    position: absolute; bottom: -12px; right: 4px;
    font-family: 'Cinzel', serif; font-size: 72px; font-weight: 700;
    color: rgba(174,130,37,0.07); line-height: 1;
    pointer-events: none; user-select: none; transition: color 0.38s;
    overflow: hidden; max-width: 100%;
}
.hiw-card:hover .hiw-wm { color: rgba(174,130,37,0.14); }

.hiw-icon-ring {
    width: 62px; height: 62px;
    border-radius: 0;
    border: 1px solid rgba(174,130,37,0.3);
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 14px;
    transition: all 0.38s ease;
    position: relative; z-index: 1; flex-shrink: 0;
}
.hiw-card:hover .hiw-icon-ring {
    border-color: var(--gold);
    box-shadow: 0 0 0 4px rgba(174,130,37,0.12), 0 0 20px rgba(174,130,37,0.2);
}
.hiw-icon-inner {
    width: 44px; height: 44px;
    border-radius: 0;
    background: rgba(174,130,37,0.12);
    border: 1px solid rgba(174,130,37,0.35);
    display: flex; align-items: center; justify-content: center;
    transition: all 0.38s;
}
.hiw-card:hover .hiw-icon-inner { background: var(--gold); border-color: var(--gold); }
.hiw-icon-inner i { color: #e8b84b; font-size: 17px; transition: color 0.38s; filter: drop-shadow(0 0 4px rgba(232,184,75,0.6)); }
.hiw-card:hover .hiw-icon-inner i { color: var(--navy); filter: none; }

.hiw-step-badge {
    font-family: 'Cinzel', serif;
    font-size: 9px;
    letter-spacing: 3px;
    color: var(--gold);
    text-transform: uppercase;
    width: 100%;
    text-align: center;
    padding-bottom: 12px;
    margin-bottom: 14px;
    border-bottom: 1px solid rgba(174,130,37,0.18);
    position: relative; z-index: 1;
    transition: color 0.38s, border-color 0.38s;
    text-shadow: 0 0 12px rgba(174,130,37,0.5);
}
.hiw-card:hover .hiw-step-badge {
    color: #f0c040;
    border-bottom-color: rgba(174,130,37,0.4);
}

.hiw-card-divider {
    width: 32px; height: 2px;
    background: rgba(174,130,37,0.3);
    margin: 0 auto 10px;
    transition: width 0.38s ease, background 0.38s;
    position: relative; z-index: 1;
}
.hiw-card:hover .hiw-card-divider { width: 56px; background: var(--gold); }

.hiw-card-title {
    font-family: 'Cinzel', serif;
    color: #fff;
    font-size: 11.5px;
    font-weight: 700;
    margin-bottom: 0;
    line-height: 1.4;
    position: relative; z-index: 1;
    transition: color 0.38s;
    text-shadow: 0 1px 6px rgba(0,0,0,0.6);
    text-transform: uppercase;
    letter-spacing: 1.5px;
}
.hiw-card:hover .hiw-card-title { color: var(--gold); }

.hiw-card-desc {
    font-size: 11.5px;
    color: rgba(255,255,255,0.82);
    line-height: 1.9;
    margin: 0;
    position: relative; z-index: 1;
    flex: 1;
    transition: color 0.38s, background 0.38s;
    text-shadow: 0 1px 4px rgba(0,0,0,0.5);
    text-align: left;
    width: 100%;
    margin-top: 10px;
    padding: 10px 12px;
    background: rgba(0,0,0,0.22);
    border-top: 1px solid rgba(174,130,37,0.12);
}
.hiw-card:hover .hiw-card-desc {
    color: #fff;
    background: rgba(0,0,0,0.30);
    border-top-color: rgba(174,130,37,0.28);
}

.hiw-teams-badge {
    display: inline-flex; align-items: center; gap: 7px;
    margin-top: 12px; padding: 6px 12px;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 0;
    font-size: 10px; font-family: 'Lato', sans-serif;
    letter-spacing: 1px; font-weight: 600; color: #fff;
    position: relative; z-index: 1; transition: all 0.38s; flex-shrink: 0;
}
.hiw-card:hover .hiw-teams-badge { border-color: var(--gold); color: var(--gold); background: rgba(174,130,37,0.1); }

.hiw-cta { text-align: center; margin-top: 60px; }
.hiw-cta-text { font-family: 'Amiri', serif; color: rgba(255,255,255,0.5); font-size: 15px; font-style: italic; margin-bottom: 20px; letter-spacing: 1px; }
.hiw-cta-btn {
    display: inline-flex; align-items: center; gap: 10px;
    background: var(--gold); color: var(--navy);
    font-family: 'Cinzel', serif; font-size: 12px; font-weight: 700;
    letter-spacing: 2px; text-transform: uppercase;
    padding: 14px 40px; border: 2px solid var(--gold);
    text-decoration: none; transition: all 0.3s; border-radius: 0;
}
.hiw-cta-btn:hover { background: transparent; color: var(--gold); }
.hiw-cta-btn i { font-size: 11px; transition: transform 0.3s; }
.hiw-cta-btn:hover i { transform: translateX(4px); }

/* ── HIW Mobile ──────────────────────────────────── */
@media (max-width: 991px) {
    .hiw-section {
        overflow: hidden;
        padding: 70px 0 60px;
    }

    .hiw-steps-row {
        flex-direction: column;
        gap: 12px;
        width: 100%;
        max-width: 100%;
        margin: 0;
        box-sizing: border-box;
    }
    .hiw-step-col {
        flex: none;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
    }
    .hiw-arrow { display: none; }

    .hiw-card {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
        padding: 18px 16px 16px;
        border-left: 3px solid var(--gold);
        width: 100%;
        box-sizing: border-box;
        overflow: hidden;
        /* No hover transform on touch — prevents layout shift */
        transition: background 0.3s, border-color 0.3s;
    }
    /* Disable translateY on touch devices — causes scroll jitter */
    @media (hover: none) {
        .hiw-card:hover { transform: none; }
    }

    .hiw-icon-ring {
        display: flex;
        width: 44px; height: 44px;
        border-radius: 0;
        margin: 0 0 12px 0;
        flex-shrink: 0;
    }
    .hiw-icon-inner { width: 32px; height: 32px; }
    .hiw-icon-inner i { font-size: 13px; }

    .hiw-step-badge {
        display: block;
        width: 100%;
        margin-bottom: 6px;
        font-size: 9px;
    }
    .hiw-card-divider {
        display: block;
        margin: 0 0 8px 0;
        width: 28px;
    }
    .hiw-card-title {
        display: block;
        width: 100%;
        font-size: 12px;
    }
    .hiw-card-desc {
        display: block;
        width: 100%;
        box-sizing: border-box;
        margin-top: 8px;
        padding: 10px 12px;
        font-size: 12px;
        text-align: left;
    }
    .hiw-wm { font-size: 46px; bottom: -6px; right: 4px; }
    .hiw-teams-badge { margin-top: 10px; align-self: flex-start; }
}

@media (max-width: 575px) {
    .hiw-card { padding: 14px 12px 12px; }
    .hiw-steps-row, .hiw-step-col, .hiw-card {
        max-width: 100% !important;
        box-sizing: border-box !important;
    }
}

</style>
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
