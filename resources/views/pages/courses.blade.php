@extends('layouts.app')

@section('content')

    @php
        $courses = [
            [
                'icon' => 'fas fa-baby',
                'img' => 'service-1.jpg',
                'title' => 'Norani Qaida',
                'badge' => 'Beginner',
                'badge_color' => '#e65100',
                'duration' => '2-4 Months',
                'level' => '4-10 Years',
                'desc' => 'The perfect starting point for young children. Norani Qaida teaches Arabic letters, their forms, and basic joining rules — the essential first step before Quran recitation.',
                'features' => ['Arabic Alphabets', 'Letter Forms', 'Joining Rules', 'Short Words Practice'],
            ],
            [
                'icon' => 'fas fa-quran',
                'img' => 'service-2.jpg',
                'title' => 'Quran Recitation (Nazra)',
                'badge' => 'Beginner',
                'badge_color' => '#2e7d32',
                'duration' => '3-6 Months',
                'level' => 'All Ages',
                'desc' => 'Learn to read the Holy Quran with proper pronunciation. This foundational course teaches Arabic letters, vowels, and basic reading skills from scratch.',
                'features' => ['Arabic Alphabet', 'Harakat & Tanween', 'Joining Letters', 'Basic Reading'],
            ],
            [
                'icon' => 'fas fa-microphone',
                'img' => 'service-3.jpg',
                'title' => 'Tajweed ul Quran',
                'badge' => 'Intermediate',
                'badge_color' => '#b8860b',
                'duration' => '6-12 Months',
                'level' => '10+ Years',
                'desc' => 'Master the rules of Tajweed — the art of reciting the Quran beautifully and correctly. Taught by certified Qaris following the Hafs an Asim narration.',
                'features' => ['Makharij al-Huruf', 'Sifat al-Huruf', 'Noon & Meem Rules', 'Madd Rules'],
            ],
            [
                'icon' => 'fas fa-star',
                'img' => 'service-4.jpg',
                'title' => 'Hifz ul Quran',
                'badge' => 'Advanced',
                'badge_color' => '#6a1b9a',
                'duration' => '2-4 Years',
                'level' => '7-18 Years',
                'desc' => 'Complete memorization of the entire Holy Quran under expert Huffaz. Our structured Hifz program includes daily revision, weekly tests and parental progress reports.',
                'features' => ['Daily Memorization', 'Weekly Revision', 'Sabqi & Manzil', 'Graduation Ceremony'],
            ],
            [
                'icon' => 'fas fa-book-open',
                'img' => 'service-5.jpg',
                'title' => 'Islamic Studies',
                'badge' => 'All Levels',
                'badge_color' => '#1565c0',
                'duration' => 'Ongoing',
                'level' => 'All Ages',
                'desc' => 'Comprehensive Islamic education covering Aqeedah, Fiqh, Seerah, and Islamic manners. Structured curriculum from beginner to advanced level.',
                'features' => ['Aqeedah', 'Fiqh ul Ibadah', 'Seerah an-Nabawiyyah', 'Islamic Manners'],
            ],
            [
                'icon' => 'fas fa-language',
                'img' => 'service-6.jpg',
                'title' => 'Arabic Language',
                'badge' => 'Beginner–Advanced',
                'badge_color' => '#00695c',
                'duration' => '1-2 Years',
                'level' => 'All Ages',
                'desc' => 'Learn Classical Arabic to understand the Quran and Hadith directly. Our conversational and classical Arabic program builds vocabulary, grammar and comprehension.',
                'features' => ['Arabic Grammar (Nahw)', 'Morphology (Sarf)', 'Quran Vocabulary', 'Reading Comprehension'],
            ],
            [
                'icon' => 'fas fa-scroll',
                'img' => 'service-7.jpg',
                'title' => 'Hadith & Seerah',
                'badge' => 'Intermediate',
                'badge_color' => '#c62828',
                'duration' => '6-12 Months',
                'level' => '12+ Years',
                'desc' => 'Study the authenticated sayings of the Prophet ﷺ and his noble life. This course covers selected Ahadith from Arbaeen an-Nawawi and key events of the Seerah.',
                'features' => ['40 Hadith Nawawi', 'Hadith Methodology', 'Seerah an-Nabawiyyah', 'Companions of the Prophet'],
            ],
            [
                'icon' => 'fas fa-mosque',
                'img' => 'service-8.jpg',
                'title' => 'Namaz & Ibadat',
                'badge' => 'Beginner',
                'badge_color' => '#1565c0',
                'duration' => '1-2 Months',
                'level' => 'All Ages',
                'desc' => 'Learn the correct method of Salah, Wudu, and other acts of worship according to the Quran and Sunnah. Essential foundation course for every Muslim.',
                'features' => ['Method of Wudu', 'Salah Step by Step', 'Farz & Sunnah Prayers', 'Common Mistakes'],
            ],
            [
                'icon' => 'fas fa-hands',
                'img' => 'service-9.jpg',
                'title' => 'Dua & Azkar',
                'badge' => 'All Levels',
                'badge_color' => '#2e7d32',
                'duration' => '1-3 Months',
                'level' => 'All Ages',
                'desc' => 'Learn essential daily duas and morning/evening azkar from the Quran and Sunnah. Build a strong connection with Allah through regular remembrance and supplication.',
                'features' => ['Morning & Evening Azkar', 'Masnoon Duas', 'Dua Etiquettes', 'Memorization'],
            ],
        ];
        $totalCourses = count($courses);
    @endphp


    <!-- ===================== PAGE HEADER ===================== -->
    <div class="page-hero">

        {{-- ── BG IMAGE (swap courses-hero.jpg with your generated image) ── --}}
        <div class="page-hero-bg">
            <img src="{{ asset('img/courses-hero.jpg') }}" alt="Courses Hero Background">
        </div>

        <div class="hero-pattern"></div>
        <div class="hero-glow"></div>
        <div class="hero-line-left"></div>
        <div class="hero-line-right"></div>
        <div class="hero-line-bottom"></div>

        <!-- Floating particles -->
        <div class="particles-wrap">
            @for($p = 1; $p <= 10; $p++)
                <div class="particle"
                    style="left:{{ rand(5, 95) }}%; animation-delay:{{ $p * 0.6 }}s; animation-duration:{{ 4 + ($p % 3) }}s;">
                </div>
            @endfor
        </div>

        <div class="container text-center" style="position:relative; z-index:5;">
            <div class="hero-arabic  reveal-up" style="animation-delay:0s;">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
            <div class="hero-tag    reveal-up" style="animation-delay:0.15s;">✦ Bismillah Islamic Academy ✦</div>
            <h1 class="hero-title  reveal-up" style="animation-delay:0.3s;">Our Islamic <span
                    style="color:var(--gold-light);">Courses</span></h1>
            <p class="hero-sub    reveal-up" style="animation-delay:0.45s;">From the first Arabic letter to complete Quran
                memorization —<br>a structured path for every student.</p>
            <nav aria-label="breadcrumb" class="reveal-up" style="animation-delay:0.6s;">
                <ol class="breadcrumb justify-content-center mb-0" style="background:transparent;">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"
                            style="color:rgba(255,255,255,0.5); text-decoration:none; font-family:'Lato',sans-serif; font-size:13px;">Home</a>
                    </li>
                    <li style="color:rgba(255,255,255,0.3); padding:0 8px; font-size:13px;">›</li>
                    <li style="color:var(--gold-light); font-family:'Lato',sans-serif; font-size:13px;">Courses</li>
                </ol>
            </nav>
        </div>
    </div>


    <!-- ===================== INTRO ===================== -->
    <section class="intro-section">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6 scroll-reveal" data-dir="left">
                    <span class="label-tag">Our Curriculum</span>
                    <h2 class="section-h2" style="margin-top:14px;">
                        Authentic Islamic Education<br>
                        <span style="color:var(--gold);">For Every Age & Level</span>
                    </h2>
                    <div class="gold-bar"></div>
                    <p class="body-text" style="margin-bottom:28px;">
                        Our comprehensive Islamic curriculum is carefully designed for every age — from beginners learning
                        the Arabic alphabet to advanced Hifz students completing the entire Quran. All courses are taught by
                        certified scholars using modern and traditional teaching methods.
                    </p>
                    <div style="display:flex; gap:10px; flex-wrap:wrap;">
                        <a href="{{ ('enroll') }}" class="btn-gold-solid">Enroll Now</a>
                        <a href="{{ route('contact') }}" class="btn-navy-outline">Ask a Question</a>
                    </div>
                </div>

                <div class="col-lg-6 scroll-reveal" data-dir="right">
                    <div class="row g-3">
                        @php
                            $highlights = [
                                ['icon' => 'fa-book-open', 'num' => $totalCourses, 'suf' => '+', 'label' => 'Courses Offered'],
                                ['icon' => 'fa-users', 'num' => 1500, 'suf' => '+', 'label' => 'Students Enrolled'],
                                ['icon' => 'fa-chalkboard-teacher', 'num' => 25, 'suf' => '+', 'label' => 'Expert Teachers'],
                                ['icon' => 'fa-star', 'num' => 500, 'suf' => '+', 'label' => 'Hafiz Graduates'],
                            ];
                        @endphp
                        @foreach($highlights as $hi => $h)
                            <div class="col-6">
                                <div class="stat-box scroll-reveal" data-dir="up" style="transition-delay:{{ $hi * 0.08 }}s;"
                                    data-target="{{ $h['num'] }}" data-suffix="{{ $h['suf'] }}">
                                    <i class="fa {{ $h['icon'] }} stat-icon"></i>
                                    <div class="stat-num">{{ $h['num'] }}{{ $h['suf'] }}</div>
                                    <div class="stat-label">{{ $h['label'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ===================== COURSES GRID ===================== -->
    <section class="courses-section">
        <div class="container">

            <div class="text-center mb-5 scroll-reveal" data-dir="up">
                <span class="label-tag">What We Teach</span>
                <h2 class="section-h2" style="margin-top:12px; margin-bottom:14px;">All Available Courses</h2>
                <div style="width:50px; height:2px; background:var(--gold); margin:0 auto;"></div>
            </div>

            <div class="row g-4">
                @foreach($courses as $index => $course)
                    <div class="col-lg-4 col-md-6 scroll-reveal" data-dir="up"
                        style="transition-delay:{{ ($index % 3) * 0.1 }}s;">
                        <div class="course-card">
                            <div class="card-shimmer-line"></div>

                            <div class="card-img-wrap">
                                <img src="{{ asset('img/' . $course['img']) }}" alt="{{ $course['title'] }}">
                                <div class="card-img-overlay"></div>
                                <span class="course-badge"
                                    style="background:{{ $course['badge_color'] }};">{{ $course['badge'] }}</span>
                                <span class="course-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <div class="course-icon-circle">
                                    <i class="{{ $course['icon'] }}"></i>
                                </div>
                            </div>

                            <div class="card-body-inner">
                                <div class="card-meta">
                                    <span><i class="far fa-clock"></i> {{ $course['duration'] }}</span>
                                    <span><i class="fas fa-user-graduate"></i> {{ $course['level'] }}</span>
                                </div>
                                <h4 class="card-title">{{ $course['title'] }}</h4>
                                <p class="card-desc">{{ $course['desc'] }}</p>
                                <div class="card-features">
                                    @foreach($course['features'] as $feat)
                                        <div class="feature-item"><i class="fas fa-check"></i> {{ $feat }}</div>
                                    @endforeach
                                </div>
                                <a href="{{ ('enroll') }}" class="card-enroll-btn">
                                    <span>Enroll Now</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- ===================== CTA BANNER ===================== -->
    <section class="cta-banner scroll-reveal" data-dir="up">
        <div class="cta-pattern"></div>
        <div class="cta-glow"></div>
        <div class="container" style="position:relative; z-index:2;">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="cta-arabic">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
                    <h2 class="cta-title">Ready To Start Your<br><span style="color:var(--gold-light);">Quranic
                            Journey?</span></h2>
                    <p class="cta-desc">Join hundreds of students already learning at Bismillah Islamic Academy. Enroll
                        today and take the first step toward Quranic excellence.</p>
                </div>
                <div class="col-lg-5">
                    <div style="display:flex; gap:14px; flex-wrap:wrap;" class="justify-content-lg-end">
                        <a href="{{ ('enroll') }}" class="btn-gold-solid">Enroll Now</a>
                        <a href="{{ route('contact') }}" class="btn-white-outline">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('styles')
    <style>
        /* ── PAGE HERO ───────────────────────────────────────────── */
        .page-hero {
            position: relative;
            padding: 110px 0 90px;
            overflow: hidden;
            isolation: isolate;
            background: var(--navy); /* fallback if image fails to load */
        }

        /* ── BG IMAGE LAYER ──────────────────────────────────────── */
        .page-hero-bg {
            position: absolute;
            inset: 0;
            z-index: 0;
        }
        .page-hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }
        /* Dark gradient overlay on top of bg image */
        .page-hero-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg,
                rgba(13,27,42,0.96) 0%,
                rgba(13,27,42,0.80) 55%,
                rgba(10,21,32,0.88) 100%);
        }

        /* All decorative layers above bg image */
        .hero-pattern {
            position: absolute;
            inset: 0;
            z-index: 1;
            opacity: .05;
            background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Cpath d=%22M40 0L80 40L40 80L0 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3Cpath d=%22M40 10L70 40L40 70L10 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
        }

        .hero-glow {
            position: absolute;
            inset: 0;
            z-index: 2;
            background: radial-gradient(ellipse at center, rgba(174, 130, 37, .12) 0%, transparent 65%);
        }

        .hero-line-left,
        .hero-line-right {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 4px;
            z-index: 3;
            background: linear-gradient(180deg, transparent, var(--gold), transparent);
        }
        .hero-line-left  { left: 0; }
        .hero-line-right { right: 0; }

        .hero-line-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            z-index: 3;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }

        .hero-arabic {
            font-family: 'Amiri', serif;
            font-size: 28px;
            color: rgba(174, 130, 37, .7);
            margin-bottom: 16px;
            letter-spacing: 2px;
        }

        .hero-tag {
            display: inline-block;
            font-family: 'Amiri', serif;
            font-size: 12px;
            color: var(--gold-light);
            letter-spacing: 5px;
            text-transform: uppercase;
            margin-bottom: 20px;
            padding: 7px 28px;
            border: 1px solid rgba(174, 130, 37, .45);
        }

        .hero-title {
            font-family: 'Cinzel', serif;
            font-size: clamp(32px, 5vw, 58px);
            font-weight: 900;
            color: #fff;
            margin-bottom: 16px;
            line-height: 1.1;
        }

        .hero-sub {
            color: rgba(255, 255, 255, .55);
            font-family: 'Lato', sans-serif;
            font-size: 15px;
            max-width: 520px;
            margin: 0 auto 24px;
            line-height: 1.8;
        }

        /* ── PARTICLES ───────────────────────────────────────────── */
        .particles-wrap {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
            z-index: 4;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: var(--gold);
            border-radius: 50%;
            opacity: 0;
            bottom: -10px;
            animation: floatUp linear infinite;
        }

        @keyframes floatUp {
            0%   { opacity: 0; transform: translateY(0) scale(1); }
            10%  { opacity: .6; }
            90%  { opacity: .15; }
            100% { opacity: 0; transform: translateY(-130px) scale(.3); }
        }

        /* ── HERO REVEAL ─────────────────────────────────────────── */
        .reveal-up {
            opacity: 0;
            transform: translateY(28px);
            animation: revUp .7s cubic-bezier(.25, .46, .45, .94) forwards;
        }

        @keyframes revUp {
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── SCROLL REVEAL ───────────────────────────────────────── */
        .scroll-reveal {
            opacity: 0;
            transition: opacity .75s ease, transform .75s cubic-bezier(.25, .46, .45, .94);
        }
        .scroll-reveal[data-dir="left"]  { transform: translateX(-45px); }
        .scroll-reveal[data-dir="right"] { transform: translateX(45px); }
        .scroll-reveal[data-dir="up"]    { transform: translateY(40px); }
        .scroll-reveal.visible { opacity: 1 !important; transform: translate(0) !important; }

        /* ── COMMON ──────────────────────────────────────────────── */
        .label-tag {
            font-family: 'Cinzel', serif;
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--gold);
            display: block;
        }

        .section-h2 {
            font-family: 'Cinzel', serif;
            font-size: clamp(24px, 3vw, 38px);
            color: var(--navy);
            font-weight: 800;
            line-height: 1.25;
            margin-bottom: 20px;
        }

        .gold-bar {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold-dark), var(--gold-light));
            margin-bottom: 24px;
        }

        .body-text {
            color: var(--text-mid);
            font-size: 15px;
            line-height: 1.95;
        }

        /* ── BUTTONS ─────────────────────────────────────────────── */
        .btn-gold-solid {
            display: inline-block;
            background: var(--gold);
            color: var(--white);
            font-family: 'Cinzel', serif;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 14px 32px;
            text-decoration: none;
            border: 2px solid var(--gold);
            transition: all .3s;
        }
        .btn-gold-solid:hover { background: transparent; color: var(--gold); }

        .btn-navy-outline {
            display: inline-block;
            background: transparent;
            color: var(--navy);
            font-family: 'Cinzel', serif;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 14px 32px;
            text-decoration: none;
            border: 2px solid rgba(13, 27, 42, .25);
            transition: all .3s;
        }
        .btn-navy-outline:hover { border-color: var(--gold); color: var(--gold); }

        .btn-white-outline {
            display: inline-block;
            background: transparent;
            color: rgba(255, 255, 255, .8);
            font-family: 'Cinzel', serif;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 14px 32px;
            text-decoration: none;
            border: 2px solid rgba(255, 255, 255, .25);
            transition: all .3s;
        }
        .btn-white-outline:hover { border-color: var(--gold); color: var(--gold); }

        /* ── SECTIONS ────────────────────────────────────────────── */
        .intro-section {
            background: var(--off-white);
            padding: 85px 0 60px;
            border-bottom: 1px solid rgba(174, 130, 37, .1);
        }

        .courses-section {
            background: var(--white);
            padding: 80px 0 100px;
        }

        /* ── STAT BOXES ──────────────────────────────────────────── */
        .stat-box {
            background: var(--white);
            border: 1px solid rgba(174, 130, 37, .15);
            padding: 26px 20px;
            text-align: center;
            transition: all .35s;
            position: relative;
            overflow: hidden;
        }

        .stat-box::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold-dark), var(--gold-light));
            transform: scaleX(0);
            transition: transform .35s;
        }

        .stat-box:hover {
            border-color: var(--gold);
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(13, 27, 42, .1);
        }
        .stat-box:hover::after { transform: scaleX(1); }

        .stat-icon {
            color: var(--gold);
            font-size: 1.9rem;
            display: block;
            margin-bottom: 12px;
        }

        .stat-num {
            font-family: 'Cinzel', serif;
            font-size: 1.7rem;
            font-weight: 800;
            color: var(--navy);
            line-height: 1;
        }

        .stat-label {
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-top: 7px;
            font-family: 'Lato', sans-serif;
        }

        /* ── COURSE CARDS ────────────────────────────────────────── */
        .course-card {
            background: var(--white);
            border: 1px solid rgba(174, 130, 37, .12);
            transition: all .4s cubic-bezier(.25, .46, .45, .94);
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 20px rgba(13, 27, 42, .06);
            overflow: hidden;
            position: relative;
        }

        .course-card:hover {
            border-color: var(--gold);
            transform: translateY(-9px);
            box-shadow: 0 28px 55px rgba(13, 27, 42, .14);
        }

        .card-shimmer-line {
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold-dark), var(--gold-light), var(--gold-dark));
            background-size: 200% 100%;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .45s ease;
            z-index: 3;
        }

        .course-card:hover .card-shimmer-line {
            transform: scaleX(1);
            animation: shimmer 1.5s linear infinite;
        }

        @keyframes shimmer {
            0%   { background-position: 0% 0%; }
            100% { background-position: 200% 0%; }
        }

        .card-img-wrap {
            position: relative;
            overflow: hidden;
        }

        .card-img-wrap img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
            transition: transform .5s ease;
        }
        .course-card:hover .card-img-wrap img { transform: scale(1.08); }

        .card-img-overlay {
            position: absolute;
            inset: 0;
            background: rgba(13, 27, 42, 0);
            transition: background .4s;
        }
        .course-card:hover .card-img-overlay { background: rgba(13, 27, 42, .22); }

        .course-badge {
            position: absolute;
            top: 0; left: 0;
            color: #fff;
            font-family: 'Lato', sans-serif;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 5px 14px;
            z-index: 2;
        }

        .course-number {
            position: absolute;
            bottom: 12px; left: 16px;
            font-family: 'Cinzel', serif;
            font-size: 11px;
            color: rgba(255, 255, 255, .4);
            letter-spacing: 2px;
            z-index: 2;
        }

        .course-icon-circle {
            position: absolute;
            bottom: -22px; right: 20px;
            width: 52px; height: 52px;
            background: var(--navy);
            border: 2px solid var(--gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 18px;
            box-shadow: 0 4px 15px rgba(13, 27, 42, .35);
            z-index: 2;
            transition: all .35s;
        }
        .course-card:hover .course-icon-circle {
            background: var(--gold);
            color: var(--white);
            transform: rotate(15deg) scale(1.1);
        }

        .card-body-inner {
            padding: 34px 24px 26px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .card-meta {
            display: flex;
            gap: 18px;
            margin-bottom: 14px;
            padding-bottom: 14px;
            border-bottom: 1px solid rgba(174, 130, 37, .1);
        }

        .card-meta span {
            font-family: 'Lato', sans-serif;
            font-size: 11px;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .card-meta i { color: var(--gold); }

        .card-title {
            font-family: 'Cinzel', serif;
            font-size: 16px;
            color: var(--navy);
            font-weight: 700;
            margin-bottom: 12px;
            line-height: 1.35;
            transition: color .3s;
        }
        .course-card:hover .card-title { color: var(--gold-dark); }

        .card-desc {
            color: var(--text-mid);
            font-size: 13px;
            line-height: 1.85;
            margin-bottom: 20px;
            flex: 1;
        }

        .card-features {
            background: var(--off-white);
            padding: 14px 16px;
            margin-bottom: 20px;
            border-left: 3px solid var(--gold);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 7px;
            transition: border-color .3s;
        }
        .course-card:hover .card-features { border-left-color: var(--gold-dark); }

        .feature-item {
            font-family: 'Lato', sans-serif;
            font-size: 12px;
            color: var(--text-mid);
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .feature-item i { color: var(--gold); font-size: 10px; flex-shrink: 0; }

        .card-enroll-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--navy);
            color: var(--gold-light);
            font-family: 'Cinzel', serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            padding: 13px 18px;
            border: 1px solid rgba(174, 130, 37, .2);
            transition: all .3s;
        }
        .card-enroll-btn i { transition: transform .3s; }
        .course-card:hover .card-enroll-btn { background: var(--gold); color: var(--white); border-color: var(--gold); }
        .course-card:hover .card-enroll-btn i { transform: translateX(5px); }

        /* ── CTA BANNER ──────────────────────────────────────────── */
        .cta-banner {
            background: var(--navy);
            padding: 85px 0;
            position: relative;
            overflow: hidden;
            border-top: 2px solid var(--gold);
        }

        .cta-pattern {
            position: absolute;
            inset: 0;
            opacity: .04;
            background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Cpath d=%22M40 0L80 40L40 80L0 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
        }

        .cta-glow {
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at center, rgba(174, 130, 37, .08) 0%, transparent 65%);
        }

        .cta-arabic {
            font-family: 'Amiri', serif;
            font-size: 20px;
            color: var(--gold-light);
            margin-bottom: 12px;
            opacity: .8;
        }

        .cta-title {
            font-family: 'Cinzel', serif;
            font-size: clamp(22px, 3vw, 38px);
            font-weight: 800;
            color: #fff;
            margin-bottom: 16px;
            line-height: 1.2;
        }

        .cta-desc {
            color: rgba(255, 255, 255, .55);
            font-size: 15px;
            max-width: 500px;
            line-height: 1.85;
            margin-bottom: 0;
        }
    </style>
@endpush


@push('scripts')
    <script>
        (function () {

            /* ── SCROLL REVEAL ───────────────────────────────────────── */
            var els = document.querySelectorAll('.scroll-reveal');
            if ('IntersectionObserver' in window) {
                var io = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            io.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 });
                els.forEach(function (el) { io.observe(el); });
            } else {
                els.forEach(function (el) { el.classList.add('visible'); });
            }

            /* ── STAT COUNTER ────────────────────────────────────────── */
            var statsDone = false;
            var firstStat = document.querySelector('.stat-box');
            if (firstStat && 'IntersectionObserver' in window) {
                var sio = new IntersectionObserver(function (entries) {
                    if (entries[0].isIntersecting && !statsDone) {
                        statsDone = true;
                        document.querySelectorAll('.stat-box').forEach(function (box) {
                            var numEl = box.querySelector('.stat-num');
                            var target = parseInt(box.getAttribute('data-target'), 10);
                            var suffix = box.getAttribute('data-suffix') || '';
                            if (!numEl || isNaN(target)) return;
                            var start = null, dur = 1800;
                            requestAnimationFrame(function tick(ts) {
                                if (!start) start = ts;
                                var prog = Math.min((ts - start) / dur, 1);
                                var eased = 1 - Math.pow(1 - prog, 3);
                                numEl.textContent = Math.floor(eased * target) + suffix;
                                if (prog < 1) requestAnimationFrame(tick);
                                else numEl.textContent = target + suffix;
                            });
                        });
                        sio.disconnect();
                    }
                }, { threshold: 0.4 });
                sio.observe(firstStat.closest('section'));
            }

            /* ── CARD TILT ───────────────────────────────────────────── */
            document.querySelectorAll('.course-card').forEach(function (card) {
                card.addEventListener('mousemove', function (e) {
                    var r = card.getBoundingClientRect();
                    var rx = ((e.clientY - r.top - r.height / 2) / (r.height / 2)) * -4;
                    var ry = ((e.clientX - r.left - r.width / 2) / (r.width / 2)) * 4;
                    card.style.transform = 'translateY(-9px) perspective(900px) rotateX(' + rx + 'deg) rotateY(' + ry + 'deg)';
                });
                card.addEventListener('mouseleave', function () {
                    card.style.transform = '';
                });
            });

        })();
    </script>
@endpush
