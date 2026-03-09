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
                    <img class="w-100" src="{{ asset('img/slide-1.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <div class="hero-badge animate__animated animate__fadeInDown" style="color: var(--gold-light); font-family: 'Amiri', serif; letter-spacing: 4px; font-size: 17px; margin-bottom: 22px; display: inline-block; padding: 8px 28px; border: 1px solid rgba(174,130,37,0.5);">
                                ✦ Bismillah Islamic Academy ✦
                            </div>
                            <h1 class="display-1 text-white mb-3 animated zoomIn" style="font-family: 'Cinzel', serif;">
                                Learn The Holy <span style="color: var(--gold-light);">Quran</span>
                            </h1>
                            <p class="animated fadeInUp" style="font-family: 'Amiri', serif; font-size: 19px; color: rgba(255,255,255,0.65); margin-bottom: 36px; letter-spacing: 1px;">
                                "Read in the name of your Lord who created" — Surah Al-Alaq
                            </p>
                            <div class="animate__animated animate__fadeInUp" style="animation-delay: 0.3s;">
                                <a href="{{ route('enroll') }}" class="btn py-3 px-5 me-2"
                                   style="background: var(--gold); color: var(--white); font-family: 'Cinzel', serif; font-weight: 700; font-size: 12px; letter-spacing: 2px; text-transform: uppercase; border-radius: 0; border: 2px solid var(--gold); box-shadow: 0 4px 20px rgba(174,130,37,0.35);">
                                    Enroll Now
                                </a>
                                <a href="{{ route('about') }}" class="btn py-3 px-5"
                                   style="background: transparent; color: var(--white); font-family: 'Cinzel', serif; font-weight: 700; font-size: 12px; letter-spacing: 2px; text-transform: uppercase; border-radius: 0; border: 2px solid rgba(255,255,255,0.5);">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/slide-2.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <div class="animate__animated animate__fadeInDown" style="color: var(--gold-light); font-family: 'Amiri', serif; letter-spacing: 4px; font-size: 17px; margin-bottom: 22px; display: inline-block; padding: 8px 28px; border: 1px solid rgba(174,130,37,0.5);">
                                ✦ Join Our Community ✦
                            </div>
                            <h1 class="display-1 text-white mb-3 animated zoomIn" style="font-family: 'Cinzel', serif;">
                                Islamic <span style="color: var(--gold-light);">Education</span><br>For Every Age
                            </h1>
                            <p class="animated fadeInUp" style="font-family: 'Amiri', serif; font-size: 19px; color: rgba(255,255,255,0.65); margin-bottom: 36px; letter-spacing: 1px;">
                                Quran, Tajweed, Hadith, Islamic Studies & Arabic Language
                            </p>
                            <div class="animate__animated animate__fadeInUp" style="animation-delay: 0.3s;">
                                <a href="{{ route('courses') }}" class="btn py-3 px-5 me-2"
                                style="background: var(--gold); color: var(--white); font-family: 'Cinzel', serif; font-weight: 700; font-size: 12px; letter-spacing: 2px; text-transform: uppercase; border-radius: 0; border: 2px solid var(--gold);">
                                    View Courses
                                </a>
                                <a href="{{ route('contact') }}" class="btn py-3 px-5"
                                style="background: transparent; color: var(--white); font-family: 'Cinzel', serif; font-weight: 700; font-size: 12px; letter-spacing: 2px; text-transform: uppercase; border-radius: 0; border: 2px solid rgba(255,255,255,0.5);">
                                    Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/slide-3.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <div class="animate__animated animate__fadeInDown" style="color: var(--gold-light); font-family: 'Amiri', serif; letter-spacing: 4px; font-size: 17px; margin-bottom: 22px; display: inline-block; padding: 8px 28px; border: 1px solid rgba(174,130,37,0.5);">
                                ✦ Expert Teachers ✦
                            </div>
                            <h1 class="display-1 text-white mb-3 animated zoomIn" style="font-family: 'Cinzel', serif;">
                                Certified <span style="color: var(--gold-light);">Scholars</span><br>& Hafiz-e-Quran
                            </h1>
                            <p class="animated fadeInUp" style="font-family: 'Amiri', serif; font-size: 19px; color: rgba(255,255,255,0.65); margin-bottom: 36px; letter-spacing: 1px;">
                                Learn from qualified Islamic scholars with years of teaching experience
                            </p>
                            <div class="animate__animated animate__fadeInUp" style="animation-delay: 0.3s;">
                                <a href="{{ route('team') }}" class="btn py-3 px-5 me-2"
                                   style="background: var(--gold); color: var(--white); font-family: 'Cinzel', serif; font-weight: 700; font-size: 12px; letter-spacing: 2px; text-transform: uppercase; border-radius: 0; border: 2px solid var(--gold);">
                                    Meet Our Teachers
                                </a>
                                <a href="{{ route('enroll') }}" class="btn py-3 px-5"
                                   style="background: transparent; color: var(--white); font-family: 'Cinzel', serif; font-weight: 700; font-size: 12px; letter-spacing: 2px; text-transform: uppercase; border-radius: 0; border: 2px solid rgba(255,255,255,0.5);">
                                    Enroll Now
                                </a>
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
            <div class="row">
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
    <!-- Stats End -->


   <!-- ===================== HOW TO LEARN ONLINE ===================== -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">

                <!-- Left: Image -->
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="position-relative">
                        <img src="{{ asset('img/how-to-learn.jpg') }}"
                             alt="Learn Quran Online"
                             class="img-fluid w-100 rounded"
                             style="object-fit: cover; height: 560px;">

                        <!-- Floating badge on image -->
                        <div class="position-absolute top-0 start-0 m-3 px-3 py-2"
                             style="background: var(--navy); border: 1px solid var(--gold); border-radius: 4px;">
                            <span style="font-family: 'Cinzel', serif; color: var(--gold); font-size: 11px; letter-spacing: 2px; text-transform: uppercase;">
                                ✦ Online Classes Available
                            </span>
                        </div>

                        <!-- Floating stat badge -->
                        <div class="position-absolute bottom-0 end-0 m-3 p-3 text-center"
                             style="background: var(--gold); min-width: 110px; border-radius: 4px;">
                            <div style="font-family: 'Cinzel', serif; font-size: 2rem; font-weight: 700; color: var(--white); line-height: 1;">1500+</div>
                            <div style="font-size: 10px; letter-spacing: 2px; text-transform: uppercase; color: rgba(255,255,255,0.85); font-family: 'Cinzel', serif;">Students</div>
                        </div>
                    </div>
                </div>

                <!-- Right: Steps -->
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start pe-3" style="color: var(--gold);">How It Works</h6>
                    <h1 class="display-6 mb-2" style="font-family: 'Cinzel', serif; color: var(--navy);">
                        Learn Quran Online By<br><span style="color: var(--gold);">Following These Steps</span>
                    </h1>
                    <p class="mb-4" style="color: var(--text-mid); line-height: 1.9; font-size: 15px;">
                        Our online classes make it easy for students worldwide to learn Quran from certified scholars — from the comfort of home.
                    </p>

                    <!-- Steps -->
                    @php
                        $steps = [
                            [
                                'num'   => '01',
                                'icon'  => 'fa-user-plus',
                                'title' => 'Register / Enroll Online',
                                'desc'  => 'Fill out our simple enrollment form and create your student account in minutes.',
                            ],
                            [
                                'num'   => '02',
                                'icon'  => 'fa-calendar-check',
                                'title' => 'Schedule a Free Trial Class',
                                'desc'  => 'Book a free trial session with one of our qualified teachers at your preferred time.',
                            ],
                            [
                                'num'   => '03',
                                'icon'  => 'fa-book-open',
                                'title' => 'Choose Your Course',
                                'desc'  => 'Select from Norani Qaida, Quran Recitation, Tajweed, Hifz, Islamic Studies and more.',
                            ],
                            [
                                'num'   => '04',
                                'icon'  => 'fa-chalkboard-teacher',
                                'title' => 'Start Learning with Teacher',
                                'desc'  => 'Attend live one-on-one or group classes via Zoom/Skype with your dedicated teacher.',
                            ],
                            [
                                'num'   => '05',
                                'icon'  => 'fa-certificate',
                                'title' => 'Get Certificate',
                                'desc'  => 'Upon completion, receive an official certificate from Bismillah Islamic Academy.',
                            ],
                        ];
                    @endphp

                    <div class="d-flex flex-column gap-3">
                        @foreach($steps as $step)
                        <div class="d-flex align-items-start gap-3 p-3"
                             style="border: 1px solid rgba(174,130,37,0.15); border-radius: 6px; background: var(--off-white); transition: all 0.3s;"
                             onmouseover="this.style.borderColor='var(--gold)'; this.style.background='var(--white)';"
                             onmouseout="this.style.borderColor='rgba(174,130,37,0.15)'; this.style.background='var(--off-white)';">

                            <!-- Step number circle -->
                            <div class="flex-shrink-0 d-flex align-items-center justify-content-center"
                                 style="width: 48px; height: 48px; border-radius: 50%; background: var(--navy); border: 2px solid var(--gold);">
                                <i class="fa {{ $step['icon'] }}" style="color: var(--gold); font-size: 16px;"></i>
                            </div>

                            <!-- Step content -->
                            <div>
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <span style="font-family: 'Cinzel', serif; font-size: 10px; color: var(--gold); letter-spacing: 2px;">STEP {{ $step['num'] }}</span>
                                </div>
                                <h6 class="mb-1" style="font-family: 'Cinzel', serif; color: var(--navy); font-size: 14px;">{{ $step['title'] }}</h6>
                                <p class="mb-0" style="font-size: 13px; color: var(--text-mid); line-height: 1.7;">{{ $step['desc'] }}</p>
                            </div>

                        </div>
                        @endforeach
                    </div>

                    <!-- CTA Button -->
                    <div class="mt-4">
                        <a href="{{ route('enroll') }}" class="btn py-3 px-5"
                           style="background: var(--gold); color: var(--white); font-family: 'Cinzel', serif; font-size: 12px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; border-radius: 0; border: 2px solid var(--gold); transition: all 0.3s;"
                           onmouseover="this.style.background='transparent'; this.style.color='var(--gold)';"
                           onmouseout="this.style.background='var(--gold)'; this.style.color='var(--white)';">
                            Enroll Now — It's Free
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- How To Learn End -->


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
                        ['img' => 'service-6.jpg', 'title' => 'Arabic Language',  'delay' => '0.5s'],
                        ['img' => 'service-7.jpg', 'title' => 'Hadith & Seerah',  'delay' => '0.1s'],
                        ['img' => 'service-8.jpg', 'title' => 'Dua & Azkar',      'delay' => '0.3s'],
                        ['img' => 'service-9.jpg', 'title' => 'Namaz & Ibadat',   'delay' => '0.5s'],
                    ];
                @endphp
                @foreach($courses as $course)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $course['delay'] }}">
                    <a href="{{ route('courses') }}" class="text-decoration-none d-block">
                        <div class="position-relative overflow-hidden rounded">
                            <img src="{{ asset('img/' . $course['img']) }}"
                                 alt="{{ $course['title'] }}"
                                 class="img-fluid w-100"
                                 style="height: 250px; object-fit: cover; display: block; transition: transform 0.4s ease;"
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
            </div>
        </div>
    </div>
    <!-- Courses End -->


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
                                    ['label' => 'Quran & Tajweed',  'val' => 95, 'delay' => '0s'],
                                    ['label' => 'Islamic Studies',  'val' => 90, 'delay' => '0.2s'],
                                    ['label' => 'Arabic Language',  'val' => 85, 'delay' => '0.4s'],
                                    ['label' => 'Hifz Program',     'val' => 88, 'delay' => '0.6s'],
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
    <!-- Why Choose Us End -->


    <!-- ===================== GALLERY ===================== -->
    <div class="container-xxl py-5" style="background: var(--light-bg);">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title text-center px-3" style="background: var(--light-bg); color: var(--gold);">Our Gallery</h6>
                <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">Moments From Our Academy</h1>
            </div>
            <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
                @for ($i = 1; $i <= 9; $i++)
                <div class="project-item border rounded h-100 p-4"
                     data-dot="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}"
                     style="background: var(--white); border-color: rgba(174,130,37,0.15) !important;">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="{{ asset('img/project-' . $i . '.jpg') }}" alt="">
                        <a href="{{ asset('img/project-' . $i . '.jpg') }}" data-lightbox="gallery">
                            <i class="fa fa-search-plus fa-2x" style="color: var(--gold-light);"></i>
                        </a>
                    </div>
                    <h6 style="font-family: 'Cinzel', serif; color: var(--navy); font-size: 13px;">Academy Event</h6>
                    <span style="font-size: 12px; color: var(--text-muted);">Bismillah Islamic Academy</span>
                </div>
                @endfor
            </div>
        </div>
    </div>
    <!-- Gallery End -->


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
                                <a href="#" style="width: 34px; height: 34px; border: 1px solid var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--gold); font-size: 13px; text-decoration: none; transition: all 0.3s;"
                                   onmouseover="this.style.background='var(--gold)'; this.style.color='white';"
                                   onmouseout="this.style.background='transparent'; this.style.color='var(--gold)';"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" style="width: 34px; height: 34px; border: 1px solid var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--gold); font-size: 13px; text-decoration: none; transition: all 0.3s;"
                                   onmouseover="this.style.background='var(--gold)'; this.style.color='white';"
                                   onmouseout="this.style.background='transparent'; this.style.color='var(--gold)';"><i class="fab fa-twitter"></i></a>
                                <a href="#" style="width: 34px; height: 34px; border: 1px solid var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--gold); font-size: 13px; text-decoration: none; transition: all 0.3s;"
                                   onmouseover="this.style.background='var(--gold)'; this.style.color='white';"
                                   onmouseout="this.style.background='transparent'; this.style.color='var(--gold)';"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->


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
                        ['name' => 'Ahmad Khan',   'role' => 'Parent',  'img' => 'testimonial-1.jpg',
                         'text' => 'Alhamdulillah, my son memorized 5 Juz in just one year. The teachers are dedicated and the environment is truly Islamic.'],
                        ['name' => 'Sarah Bibi',   'role' => 'Parent',  'img' => 'testimonial-2.jpg',
                         'text' => 'My daughter improved her Tajweed tremendously. The academy provides a wonderful learning atmosphere for children.'],
                        ['name' => 'Omar Farooq',  'role' => 'Student', 'img' => 'testimonial-3.jpg',
                         'text' => 'The Arabic language course helped me understand the Quran directly. Highly recommend to every Muslim.'],
                        ['name' => 'Aisha Rahman', 'role' => 'Parent',  'img' => 'testimonial-4.jpg',
                         'text' => 'Best Islamic school in the area. The scholars here are very knowledgeable and approachable. JazakAllah Khair!'],
                    ];
                @endphp
                @foreach($testimonials as $t)
                <div class="testimonial-item rounded p-4"
                     style="background: var(--white); border: 1px solid rgba(174,130,37,0.15); position: relative; box-shadow: 0 4px 20px rgba(13,27,42,0.07);">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1"
                             src="{{ asset('img/' . $t['img']) }}" alt="{{ $t['name'] }}"
                             style="width: 62px; height: 62px; border-color: var(--gold) !important; object-fit: cover;">
                        <div class="ms-4">
                            <h5 class="mb-1" style="font-family: 'Cinzel', serif; color: var(--navy); font-size: 14px;">{{ $t['name'] }}</h5>
                            <span style="color: var(--gold); font-size: 10px; letter-spacing: 2px; text-transform: uppercase;">{{ $t['role'] }}</span>
                            <div style="color: var(--gold); font-size: 12px; margin-top: 3px;">★★★★★</div>
                        </div>
                    </div>
                    <div style="height: 1px; background: rgba(174,130,37,0.12); margin-bottom: 16px;"></div>
                    <p class="mb-0" style="font-family: 'Amiri', serif; font-size: 16px; font-style: italic; color: var(--text-mid); line-height: 1.85;">
                        {{ $t['text'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonials End -->

@endsection


{{-- ===================== PAGE STYLES ===================== --}}
@push('styles')
<style>
/* ===== STATS SECTION ===== */
.stats-section {
    background: var(--navy);
    padding: 60px 0;
}

.stat-item {
    text-align: center;
    padding: 20px 10px;
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}

.stat-item.visible {
    opacity: 1;
    transform: translateY(0);
}

.stat-item:nth-child(1) { transition-delay: 0.1s; }
.stat-item:nth-child(2) { transition-delay: 0.3s; }
.stat-item:nth-child(3) { transition-delay: 0.5s; }
.stat-item:nth-child(4) { transition-delay: 0.7s; }

.stat-icon {
    color: var(--gold);
    font-size: 2.5rem;
    margin-bottom: 15px;
    display: block;
}

.stat-number {
    font-family: 'Cinzel', serif;
    font-size: 2.8rem;
    font-weight: 700;
    color: var(--white);
    line-height: 1;
    margin-bottom: 10px;
}

.stat-label {
    font-size: 11px;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.55);
    font-family: 'Cinzel', serif;
}

.project-carousel .owl-dots {
    display: none !important;
}

.carousel-item,
.carousel-item img {
    height: 620px;
    object-fit: cover;
}
</style>
@endpush


{{-- ===================== PAGE SCRIPTS ===================== --}}
@push('scripts')
<script>
(function () {
    /* ===== STATS COUNTER ===== */
    var counted = false;

    function animateCounter(el) {
        var target = parseInt(el.getAttribute('data-target'));
        var duration = 2000;
        var startTime = null;

        function step(timestamp) {
            if (!startTime) startTime = timestamp;
            var progress = Math.min((timestamp - startTime) / duration, 1);
            var eased = 1 - (1 - progress) * (1 - progress); // easeOutQuad
            el.textContent = Math.floor(eased * target);
            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                el.textContent = target;
            }
        }
        requestAnimationFrame(step);
    }

    function startCounting() {
        if (counted) return;
        counted = true;
        document.querySelectorAll('.stat-item').forEach(function (item) {
            item.classList.add('visible');
        });
        document.querySelectorAll('.stat-number[data-target]').forEach(function (el) {
            animateCounter(el);
        });
    }

    var statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    startCounting();
                    observer.disconnect();
                }
            });
        }, { threshold: 0.3 });
        observer.observe(statsSection);
    }

    /* ===== SKILL BARS ===== */
    var skillsDone = false;
    var skillObs = new IntersectionObserver(function (entries) {
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
    }, { threshold: 0.3 });

    var whySec = document.querySelector('.skill');
    if (whySec) skillObs.observe(whySec.closest('.container-xxl'));
})();

</script>
@endpush
