@extends('layouts.app')

@section('title', 'Bismillah Islamic Academy - Learn Quran & Islamic Studies')

@section('content')

    <!-- ===================== HERO CAROUSEL ===================== -->
    <section class="hero-carousel wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            @if($slides->isNotEmpty())
                <div class="carousel-inner">
                    @foreach($slides as $index => $slide)
                        <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                            <img class="w-100 carousel-img" src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}">
                            <div class="carousel-caption">
                                <div class="slide-content-wrap">
                                    <div class="hero-badge animate__animated animate__fadeInDown">
                                        ✦ {{ $slide->badge }} ✦
                                    </div>
                                    <h1 class="slide-title animated zoomIn">
                                        {!! $slide->title !!}
                                    </h1>
                                    <p class="slide-sub animated fadeInUp">
                                        {{ $slide->subtitle }}
                                    </p>
                                    <div class="slide-btns animate__animated animate__fadeInUp" style="animation-delay:0.3s;">
                                        <a href="{{ $slide->btn1_url }}" class="slide-btn-gold">{{ $slide->btn1_text }}</a>
                                        <a href="{{ $slide->btn2_url }}" class="slide-btn-outline">{{ $slide->btn2_text }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1">
                        <img class="img-fluid" src="{{ setting('img_home_slide_1') ? asset('storage/' . setting('img_home_slide_1')) : asset('img/slide-1.jpg') }}" alt="Slide 1">
                    </button>
                    <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                        <img class="img-fluid" src="{{ setting('img_home_slide_2') ? asset('storage/' . setting('img_home_slide_2')) : asset('img/slide-2.jpg') }}" alt="Slide 2">
                    </button>
                    <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                        <img class="img-fluid" src="{{ setting('img_home_slide_3') ? asset('storage/' . setting('img_home_slide_3')) : asset('img/slide-3.jpg') }}" alt="Slide 3">
                    </button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100 carousel-img" src="{{ setting('img_home_slide_1') ? asset('storage/' . setting('img_home_slide_1')) : asset('img/slide-1.jpg') }}" alt="Slide 1">
                        <div class="carousel-caption">
                            <div class="slide-content-wrap">
                                <div class="hero-badge animate__animated animate__fadeInDown">
                                    ✦ Bismillah Islamic Academy ✦
                                </div>
                                <h1 class="slide-title animated zoomIn">
                                    Learn The Holy <span style="color: var(--gold-light);">Quran</span>
                                </h1>
                                <p class="slide-sub animated fadeInUp">
                                    "Read in the name of your Lord who created"
                                </p>
                                <div class="slide-btns animate__animated animate__fadeInUp" style="animation-delay:0.3s;">
                                    <a href="{{ route('free_trial') }}" class="slide-btn-gold">Free Trial</a>
                                    <a href="{{ route('about') }}" class="slide-btn-outline">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="w-100 carousel-img" src="{{ setting('img_home_slide_2') ? asset('storage/' . setting('img_home_slide_2')) : asset('img/slide-2.jpg') }}" alt="Slide 2">
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

                    <div class="carousel-item">
                        <img class="w-100 carousel-img" src="{{ setting('img_home_slide_3') ? asset('storage/' . setting('img_home_slide_3')) : asset('img/slide-3.jpg') }}" alt="Slide 3">
                        <div class="carousel-caption">
                            <div class="slide-content-wrap">
                                <div class="hero-badge animate__animated animate__fadeInDown">
                                    ✦ Expert Teachers ✦
                                </div>
                                <h1 class="slide-title animated zoomIn">
                                    Certified <span style="color: var(--gold-light);">Scholars</span><br>& Hafiz-e-Quran
                                </h1>
                                <p class="slide-sub animated fadeInUp">
                                    Learn from qualified Islamic scholars
                                </p>
                                <div class="slide-btns animate__animated animate__fadeInUp" style="animation-delay:0.3s;">
                                    <a href="{{ route('team') }}" class="slide-btn-gold">Meet Our Teachers</a>
                                    <a href="{{ route('free_trial') }}" class="slide-btn-outline">Enroll Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

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
                @php
                    $statsKeys = ['stats_1','stats_2','stats_3','stats_4'];
                    $statsDefaults = [
                        ['icon' => 'fa fa-certificate', 'num' => '10', 'label' => 'Years Experience'],
                        ['icon' => 'fa fa-users-cog', 'num' => '25', 'label' => 'Qualified Teachers'],
                        ['icon' => 'fa fa-users', 'num' => '1500', 'label' => 'Satisfied Students'],
                        ['icon' => 'fa fa-book-open', 'num' => '500', 'label' => 'Hafiz Graduates'],
                    ];
                @endphp
                @foreach($statsKeys as $i => $statKey)
                    @php
                        $s = \App\Models\Section::where('page_name','home')->where('section_key',$statKey)->first();
                        $icon = $s && $s->subtitle ? $s->subtitle : $statsDefaults[$i]['icon'];
                        $num = $s && $s->description ? $s->description : $statsDefaults[$i]['num'];
                        $label = $s && $s->title ? $s->title : $statsDefaults[$i]['label'];
                    @endphp
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="stat-item">
                            <i class="{{ $icon }} stat-icon"></i>
                            <div class="stat-number" data-target="{{ $num }}">0</div>
                            <div class="stat-label">{{ $label }}</div>
                        </div>
                    </div>
                @endforeach
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
                        <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">{{ section('home', 'why_title', 'title', 'Why Parents Trust Us For Their Children') }}</h1>
                        <p class="mb-4" style="color: var(--text-mid); line-height: 1.9;">
                            {{ section('home', 'why_title', 'description', 'Our academy combines traditional Islamic teaching methods with modern pedagogy. Every teacher is a qualified scholar committed to nurturing the next generation of Muslims.') }}
                        </p>
                        <div class="row g-4">
                            @php
                                $skillsData = \App\Models\Section::where('page_name','home')->where('section_key','skills')->first();
                                $skillLabels = $skillsData ? explode(',', $skillsData->title) : ['Quran & Tajweed','Islamic Studies','Arabic Language','Hifz Program'];
                                $skillVals = $skillsData ? explode(',', $skillsData->description) : [99,99,99,99];
                                $skills = [];
                                foreach($skillLabels as $i => $label) {
                                    $skills[] = ['label' => trim($label), 'val' => (int)($skillVals[$i] ?? 99), 'delay' => ($i * 0.2) . 's'];
                                }
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
                        <img class="img-fluid" src="{{ setting('img_home_feature') ? asset('storage/' . setting('img_home_feature')) : asset('img/feature.jpg') }}" alt="Why Choose Us">
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
                <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">{{ section('home', 'courses_title', 'title', 'We Focus On Authentic Islamic Education') }}</h1>
            </div>
            <div class="row g-4">
                @foreach($courses as $course)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                        <a href="{{ route('courses') }}" class="text-decoration-none d-block">
                            <div class="position-relative overflow-hidden rounded">
                                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
                                    class="img-fluid w-100 course-img" onmouseover="this.style.transform='scale(1.05)'"
                                    onmouseout="this.style.transform='scale(1)'">
                                <div class="position-absolute bottom-0 start-0 end-0"
                                    style="background: linear-gradient(to top, rgba(13,27,42,0.90) 0%, rgba(13,27,42,0.4) 50%, transparent 100%); padding: 40px 16px 18px;">
                                    <h4 class="mb-0 text-white text-center"
                                        style="font-family: 'Cinzel', serif; font-size: 15px; letter-spacing: 1px;">
                                        {{ $course->title }}
                                    </h4>
                                    <div class="mx-auto mt-2" style="width: 40px; height: 2px; background: var(--gold);"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="text-center mt-5 wow fadeInUp" data-wow-delay="0.3s">
                    <a href="{{ section('home', 'courses_btn', 'button_url', '/courses') }}" class="btn py-3 px-5"
                        style="background: var(--gold); color: var(--white); font-family: 'Cinzel', serif; font-weight: 700; font-size: 12px; letter-spacing: 2px; text-transform: uppercase; border-radius: 0; border: 2px solid var(--gold);">
                        {{ section('home', 'courses_btn', 'title', 'View All Courses') }}
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
                        <img src="{{ setting('img_home_trial') ? asset('storage/' . setting('img_home_trial')) : asset('img/trial.jpg') }}" alt="Free Trial Class"
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
                        {!! section('home', 'trial_title', 'title', 'Start Your <span style="color: var(--gold);">3 Days</span><br>Free Trial Classes') !!}
                    </h1>
                    <p class="mb-4" style="color: var(--text-mid); line-height: 1.9; font-size: 15px;">
                        {{ section('home', 'trial_title', 'description', 'Experience the quality of our teaching before you commit. Join our 3-day free trial and let your child learn directly from our qualified Quran teachers — completely free, no obligation.') }}
                    </p>
                    @php
                        $trialFeatures = [];
                        foreach(['trial_feat_1','trial_feat_2','trial_feat_3'] as $tfKey) {
                            $tf = \App\Models\Section::where('page_name','home')->where('section_key',$tfKey)->first();
                            if($tf) $trialFeatures[] = ['icon' => $tf->subtitle, 'title' => $tf->title, 'desc' => $tf->description];
                        }
                        if(empty($trialFeatures)) {
                            $trialFeatures = [
                                ['icon' => 'fa-user-graduate', 'title' => 'One-on-One Session', 'desc' => 'Personal attention from a certified Quran teacher.'],
                                ['icon' => 'fa-clock', 'title' => 'Flexible Timing', 'desc' => 'Choose class time that suits your schedule.'],
                                ['icon' => 'fa-shield-alt', 'title' => 'No Commitment', 'desc' => 'Cancel anytime — zero pressure, zero cost.'],
                            ];
                        }
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
            <img src="{{ setting('img_how_to_learn') ? asset('storage/' . setting('img_how_to_learn')) : asset('img/how-to-learn.jpg') }}" alt="" aria-hidden="true">
            <div class="hiw-bg-overlay"></div>
        </div>
        <div class="container" style="position:relative; z-index:2;">

            <div class="hiw-header wow fadeInUp" data-wow-delay="0.1s">
                <span class="hiw-eyebrow">✦ Simple Process ✦</span>
                <h1 class="hiw-heading">{!! section('home', 'how_title', 'title', 'How It <span>Works</span>') !!}</h1>
                <p class="hiw-subtext">From registration to certification — your complete Quran learning journey in 5 easy
                    steps, delivered live via <strong style="color: var(--gold); font-style: normal;">Microsoft
                        Teams</strong>.</p>
            </div>

            <div class="hiw-steps-row wow fadeInUp" data-wow-delay="0.2s">
                @php
                    $stepsData = [];
                    foreach(['step_1','step_2','step_3','step_4','step_5'] as $i => $sk) {
                        $sd = \App\Models\Section::where('page_name','home')->where('section_key',$sk)->first();
                        if($sd) $stepsData[] = ['num' => str_pad($i+1, 2, '0', STR_PAD_LEFT), 'icon' => $sd->subtitle, 'title' => $sd->title, 'desc' => $sd->description];
                    }
                    if(empty($stepsData)) {
                        $stepsData = [
                            ['num' => '01', 'icon' => 'fa-user-plus', 'title' => 'Register Online', 'desc' => 'Fill out our simple enrollment form and create your student account in minutes.'],
                            ['num' => '02', 'icon' => 'fa-calendar-check', 'title' => 'Book Free Trial', 'desc' => 'Schedule a free trial session with a qualified teacher at your preferred time.'],
                            ['num' => '03', 'icon' => 'fa-book-open', 'title' => 'Choose Your Course', 'desc' => 'Pick from Norani Qaida, Tajweed, Hifz, Islamic Studies, Arabic & more.'],
                            ['num' => '04', 'icon' => 'fa-chalkboard-teacher', 'title' => 'Start Learning', 'desc' => 'Attend live one-on-one classes via Microsoft Teams — our primary online classroom platform.'],
                            ['num' => '05', 'icon' => 'fa-certificate', 'title' => 'Get Certified', 'desc' => 'Earn an official certificate from Bismillah Islamic Academy upon completion.'],
                        ];
                    }
                @endphp

                @foreach($stepsData as $step)
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
                $journeyData = [];
                foreach(['journey_1','journey_2','journey_3','journey_4','journey_5'] as $jk) {
                    $jd = \App\Models\Section::where('page_name','home')->where('section_key',$jk)->first();
                    if($jd) $journeyData[] = ['icon' => $jd->subtitle, 'title' => $jd->title, 'desc' => $jd->description];
                }
                if(empty($journeyData)) {
                    $journeyData = [
                        ['icon' => 'fa-graduation-cap', 'title' => 'Free Trial', 'desc' => 'Start your journey risk-free'],
                        ['icon' => 'fa-book-open', 'title' => 'Norani Qaida', 'desc' => 'Build strong foundations'],
                        ['icon' => 'fa-quran', 'title' => 'Quran Reading', 'desc' => 'Read fluently with confidence'],
                        ['icon' => 'fa-microphone', 'title' => 'Tajweed', 'desc' => 'Perfect your pronunciation'],
                        ['icon' => 'fa-trophy', 'title' => 'Hifz ul Quran', 'desc' => 'Achieve mastery & memorization'],
                    ];
                }
            @endphp
            @foreach($journeyData as $step)
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
            <img src="{{ setting('img_home_slide_1') ? asset('storage/' . setting('img_home_slide_1')) : asset('img/slide-1.jpg') }}" alt="">
            <div class="ayah-veil"></div>
        </div>
        <div class="container ayah-body">
            <div class="ayah-ornament">﷽</div>
            <p class="ayah-arabic">{{ section('home', 'ayah', 'title', 'اقْرَأْ بِاسْمِ رَبِّكَ الَّذِي خَلَقَ') }}</p>
            <div class="ayah-rule"></div>
            <p class="ayah-english">{{ section('home', 'ayah', 'subtitle', '"Read in the name of your Lord who created"') }}</p>
            <span class="ayah-ref">{{ section('home', 'ayah', 'description', 'Surah Al-Alaq · 96:1 · First Revelation of the Holy Quran') }}</span>
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
            <p class="countries-label">{{ section('home', 'countries', 'title', 'Trusted by families across') }}</p>
            <div class="countries-row">
                @php
                    $countriesRaw = section('home', 'countries', 'description', 'Pakistan,United Kingdom,United States,Canada,Australia,Saudi Arabia,UAE');
                    $countryFlags = ['Pakistan' => '🇵🇰', 'United Kingdom' => '🇬🇧', 'United States' => '🇺🇸', 'Canada' => '🇨🇦', 'Australia' => '🇦🇺', 'Saudi Arabia' => '🇸🇦', 'UAE' => '🇦🇪'];
                    $countries = array_map('trim', explode(',', $countriesRaw));
                @endphp
                @foreach($countries as $ci => $country)
                    @if($ci > 0)<div class="country-divider"></div>@endif
                    <div class="country-chip">{{ $countryFlags[$country] ?? '🌍' }} {{ $country }}</div>
                @endforeach
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
                    <img src="{{ setting('img_home_teams') ? asset('storage/' . setting('img_home_teams')) : asset('img/teams.jpg') }}" alt="Bismillah Islamic Academy Team"
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
                <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">{{ section('home', 'team_title', 'title', 'Meet Our Qualified Scholars') }}</h1>
            </div>
            <div class="row g-4">
                @foreach($teachers->filter(fn($t) => $t->is_active) as $index => $teacher)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $index + 1 }}s">
                        <a href="{{ route('teacher.profile', $teacher) }}" class="text-decoration-none d-block">
                            <div class="team-item text-center p-4"
                                style="background: var(--off-white); border: 1px solid rgba(174,130,37,0.15); transition: all 0.4s;">
                                <img src="{{ asset('storage/' . $teacher->image) }}" alt="{{ $teacher->name }}"
                                    style="width: 130px; height: 130px; border-radius: 50%; border: 3px solid var(--gold); object-fit: cover; display: block; margin: 0 auto 20px; padding: 4px; background: var(--white);">
                                <div class="team-text">
                                    <div class="team-title">
                                        <h5
                                            style="font-family: 'Cinzel', serif; color: var(--navy); font-size: 16px; margin-bottom: 4px;">
                                            {{ $teacher->name }}</h5>
                                        <span
                                            style="color: var(--gold); font-size: 11px; letter-spacing: 2px; text-transform: uppercase; font-family: 'Lato', sans-serif; display: block; margin-bottom: 14px;">{{ $teacher->role }}</span>
                                    </div>
                                    <div class="team-social"
                                        style="display: flex; justify-content: center; gap: 8px; margin-top: 14px;">
                                        @if($teacher->facebook_url)
                                            <a href="{{ $teacher->facebook_url }}"
                                                style="width:34px;height:34px;border:1px solid var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:13px;text-decoration:none;transition:all 0.3s;"
                                                onmouseover="this.style.background='var(--gold)';this.style.color='white';"
                                                onmouseout="this.style.background='transparent';this.style.color='var(--gold)';"><i
                                                    class="fab fa-facebook-f"></i></a>
                                        @endif
                                        @if($teacher->twitter_url)
                                            <a href="{{ $teacher->twitter_url }}"
                                                style="width:34px;height:34px;border:1px solid var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:13px;text-decoration:none;transition:all 0.3s;"
                                                onmouseover="this.style.background='var(--gold)';this.style.color='white';"
                                                onmouseout="this.style.background='transparent';this.style.color='var(--gold)';"><i
                                                    class="fab fa-twitter"></i></a>
                                        @endif
                                        @if($teacher->instagram_url)
                                            <a href="{{ $teacher->instagram_url }}"
                                                style="width:34px;height:34px;border:1px solid var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:13px;text-decoration:none;transition:all 0.3s;"
                                                onmouseover="this.style.background='var(--gold)';this.style.color='white';"
                                                onmouseout="this.style.background='transparent';this.style.color='var(--gold)';"><i
                                                    class="fab fa-instagram"></i></a>
                                        @endif
                                        @if($teacher->linkedin_url)
                                            <a href="{{ $teacher->linkedin_url }}"
                                                style="width:34px;height:34px;border:1px solid var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:13px;text-decoration:none;transition:all 0.3s;"
                                                onmouseover="this.style.background='var(--gold)';this.style.color='white';"
                                                onmouseout="this.style.background='transparent';this.style.color='var(--gold)';"><i
                                                    class="fab fa-linkedin-in"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
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
                <h1 class="display-6 mb-4" style="font-family: 'Cinzel', serif; color: var(--navy);">{{ section('home', 'testimonials_title', 'title', 'What Our Students & Parents Say') }}</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach($testimonials->filter(fn($t) => $t->is_active) as $t)
                    <div class="testimonial-item rounded p-4"
                        style="background: var(--white); border: 1px solid rgba(174,130,37,0.15); position: relative; box-shadow: 0 4px 20px rgba(13,27,42,0.07);">
                        <div class="d-flex align-items-center mb-4">
                            <img class="flex-shrink-0 rounded-circle border p-1" src="{{ asset('storage/' . $t->image) }}"
                                alt="{{ $t->name }}"
                                style="width:62px;height:62px;border-color:var(--gold)!important;object-fit:cover;">
                            <div class="ms-4">
                                <h5 class="mb-1" style="font-family:'Cinzel',serif;color:var(--navy);font-size:14px;">
                                    {{ $t->name }}</h5>
                                <span
                                    style="color:var(--gold);font-size:10px;letter-spacing:2px;text-transform:uppercase;">{{ $t->role }}</span>
                                <div style="color:var(--gold);font-size:12px;margin-top:3px;">★★★★★</div>
                            </div>
                        </div>
                        <div style="height:1px;background:rgba(174,130,37,0.12);margin-bottom:16px;"></div>
                        <p class="mb-0"
                            style="font-family:'Amiri',serif;font-size:16px;font-style:italic;color:var(--text-mid);line-height:1.85;">
                            {{ $t->text }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

     <!-- ===================== QUICK CONTACT ===================== -->
    <div class="container-xxl py-5 wow fadeIn" data-wow-delay="0.1s" style="background:#fff;">
    <div class="container">

        <div class="text-center mx-auto mb-5" style="max-width:600px;">
            <span style="font-size:11px;color:#AE8225;letter-spacing:3px;text-transform:uppercase;font-family:'Lato',sans-serif;display:block;margin-bottom:12px;">✦ Get In Touch ✦</span>
            <h2 style="font-family:'Cinzel',serif;color:var(--navy);font-size:30px;font-weight:400;margin:0 0 10px;">
                {!! section('home', 'contact_title', 'title', 'Have a <span style="color:#D4A843;">Question?</span> We\'re Here') !!}
            </h2>
            <p style="font-size:14px;color:var(--text-mid);font-family:'Lato',sans-serif;margin:0;line-height:1.8;">
                {{ section('home', 'contact_title', 'description', 'Fill the form and our team will respond within 24 hours, In sha Allah.') }}
            </p>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" class="hc-input" name="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6">
                <input type="email" class="hc-input" name="email" placeholder="Your Email" required>
            </div>
            <div class="col-12">
                <input type="text" class="hc-input" name="subject" placeholder="Subject" required>
            </div>
            <div class="col-12">
                <textarea class="hc-input" name="message" placeholder="Message" style="height:200px; resize:vertical;" required></textarea>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="hc-submit-btn">
                    Send Message &nbsp;<i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </form>
</div>
        </div>

    </div>
</div>
    <!-- ===================== QUICK CONTACT END ===================== -->

@endsection


@push('styles')
<style>
.hc-input {
    width: 100%;
    padding: 14px 16px;
    background: #f5f5f5;
    border: 1.5px solid #ccc;
    border-radius: 6px;
    color: #0d1b2a;
    font-family: 'Lato', sans-serif;
    font-size: 14px;
    box-shadow: none !important;
    outline: none !important;
    display: block;
    transition: border-color 0.3s, box-shadow 0.3s;
}
.hc-input::placeholder {
    color: rgba(0,0,0,0.38);
}
.hc-input:hover,
.hc-input:focus,
.hc-input:active,
.hc-input:focus-visible,
.form-control.hc-input:focus,
.form-control.hc-input:hover {
    border-color: #AE8225 !important;
    box-shadow: 0 0 0 3px rgba(174, 130, 37, 0.15) !important;
    outline: none !important;
    background: #f5f5f5 !important;
}
.hc-submit-btn {
    padding: 13px 50px;
    background: #AE8225;
    color: #fff;
    border: 2px solid #AE8225;
    font-family: 'Cinzel', serif;
    font-size: 11px;
    letter-spacing: 2px;
    text-transform: uppercase;
    cursor: pointer;
    font-weight: 700;
    transition: all 0.3s;
    border-radius: 0;
}
.hc-submit-btn:hover { background: transparent; color: #AE8225; }
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
