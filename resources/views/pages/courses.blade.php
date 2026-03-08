@extends('layouts.app')

@section('content')

    @include('partials.topbar')
    @include('partials.header')

    <!-- ===================== PAGE HEADER ===================== -->
    <div style="
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 60%, #0A1520 100%);
        position: relative; padding: 90px 0; margin-bottom: 0; overflow: hidden;
    ">
        <div style="position:absolute; inset:0; opacity:0.05;
            background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Cpath d=%22M40 0L80 40L40 80L0 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3Cpath d=%22M40 10L70 40L40 70L10 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
        "></div>
        <div
            style="position:absolute; inset:0; background: radial-gradient(ellipse at center, rgba(174,130,37,0.1) 0%, transparent 65%);">
        </div>
        <div style="position:absolute; left:0; top:0; bottom:0; width:4px;
            background: linear-gradient(180deg, transparent, var(--gold), transparent);"></div>

        <div class="container text-center" style="position:relative; z-index:2;">
            <div style="
                display:inline-block; font-family:'Amiri',serif; font-size:13px;
                color:var(--gold-light); letter-spacing:4px; text-transform:uppercase;
                margin-bottom:16px; padding:6px 25px;
                border: 1px solid rgba(174,130,37,0.4);
            ">✦ Bismillah Islamic Academy ✦</div>
            <h1 style="
                font-family:'Cinzel',serif; font-size:clamp(30px,5vw,54px);
                font-weight:900; color:#ffffff; margin-bottom:18px;
            ">Our Quran Courses</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0" style="background:transparent;">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"
                            style="color:rgba(255,255,255,0.6); text-decoration:none; font-family:'Lato',sans-serif; font-size:13px;">Home</a>
                    </li>
                    <li class="breadcrumb-item active"
                        style="color:var(--gold-light); font-family:'Lato',sans-serif; font-size:13px;" aria-current="page">
                        Courses</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- ===================== COURSES INTRO ===================== -->
    <section style="background: var(--white); padding: 80px 0 40px;">
        <div class="container">
            <div class="text-center animate-on-scroll" style="max-width:650px; margin:0 auto;">
                <div class="section-label">Our Courses</div>
                <h2 class="section-title">We Focus On Authentic <span>Quranic Education</span></h2>
                <div class="divider-gold"></div>
                <p style="color:var(--text-mid); font-size:15px; line-height:1.9; margin-top:10px;">
                    Our comprehensive Islamic curriculum is designed for every age and level — from beginners learning the
                    Arabic alphabet to advanced Hifz students completing the entire Quran.
                </p>
            </div>
        </div>
    </section>


    <!-- ===================== MAIN COURSES ===================== -->
    <section style="background: var(--white); padding: 20px 0 80px;">
        <div class="container">
            <div class="row g-4">

                @php
                    $courses = [
                        [
                            'icon' => 'fas fa-quran',
                            'img' => 'service-1.jpg',
                            'title' => 'Quran Recitation (Nazra)',
                            'badge' => 'Beginner',
                            'badge_color' => '#2e7d32',
                            'duration' => '3-6 Months',
                            'level' => 'All Ages',
                            'desc' => 'Learn to read the Holy Quran with proper pronunciation. This foundational course teaches Arabic letters, vowels, and basic reading skills from scratch.',
                            'features' => ['Arabic Alphabet', 'Harakat & Tanween', 'Joining Letters', 'Basic Reading'],
                            'delay' => '0s',
                        ],
                        [
                            'icon' => 'fas fa-microphone',
                            'img' => 'service-2.jpg',
                            'title' => 'Tajweed ul Quran',
                            'badge' => 'Intermediate',
                            'badge_color' => '#e65100',
                            'duration' => '6-12 Months',
                            'level' => '10+ Years',
                            'desc' => 'Master the rules of Tajweed — the art of reciting the Quran beautifully and correctly. Taught by certified Qaris following the Hafs an Asim narration.',
                            'features' => ['Makharij al-Huruf', 'Sifat al-Huruf', 'Noon & Meem Rules', 'Madd Rules'],
                            'delay' => '0.1s',
                        ],
                        [
                            'icon' => 'fas fa-star',
                            'img' => 'service-3.jpg',
                            'title' => 'Hifz ul Quran',
                            'badge' => 'Advanced',
                            'badge_color' => '#6a1b9a',
                            'duration' => '2-4 Years',
                            'level' => '7-18 Years',
                            'desc' => 'Complete memorization of the entire Holy Quran under expert Huffaz. Our structured Hifz program includes daily revision, weekly tests and parental progress reports.',
                            'features' => ['Daily Memorization', 'Weekly Revision', 'Sabqi & Manzil', 'Graduation Ceremony'],
                            'delay' => '0.2s',
                        ],
                        [
                            'icon' => 'fas fa-book-open',
                            'img' => 'service-4.jpg',
                            'title' => 'Islamic Studies',
                            'badge' => 'All Levels',
                            'badge_color' => '#1565c0',
                            'duration' => 'Ongoing',
                            'level' => 'All Ages',
                            'desc' => 'Comprehensive Islamic education covering Aqeedah, Fiqh, Seerah, and Islamic manners. Structured curriculum from beginner to advanced level.',
                            'features' => ['Aqeedah', 'Fiqh ul Ibadah', 'Seerah an-Nabawiyyah', 'Islamic Manners'],
                            'delay' => '0.3s',
                        ],
                        [
                            'icon' => 'fas fa-language',
                            'img' => 'service-5.jpg',
                            'title' => 'Arabic Language',
                            'badge' => 'Beginner–Advanced',
                            'badge_color' => '#00695c',
                            'duration' => '1-2 Years',
                            'level' => 'All Ages',
                            'desc' => 'Learn Classical Arabic to understand the Quran and Hadith directly. Our conversational and classical Arabic program builds vocabulary, grammar and comprehension.',
                            'features' => ['Arabic Grammar (Nahw)', 'Morphology (Sarf)', 'Quran Vocabulary', 'Reading Comprehension'],
                            'delay' => '0.4s',
                        ],
                        [
                            'icon' => 'fas fa-scroll',
                            'img' => 'service-6.jpg',
                            'title' => 'Hadith & Seerah',
                            'badge' => 'Intermediate',
                            'badge_color' => '#c62828',
                            'duration' => '6-12 Months',
                            'level' => '12+ Years',
                            'desc' => 'Study the authenticated sayings of the Prophet ﷺ and his noble life. This course covers selected Ahadith from Arbaeen an-Nawawi and key events of the Seerah.',
                            'features' => ['40 Hadith Nawawi', 'Hadith Methodology', 'Seerah an-Nabawiyyah', 'Companions of the Prophet'],
                            'delay' => '0.5s',
                        ],
                    ];
                @endphp

                @foreach($courses as $course)
                    <div class="col-lg-4 col-md-6 animate-on-scroll" style="transition-delay: {{ $course['delay'] }}">
                        <div style="
                            background: var(--white);
                            border: 1px solid var(--border-soft);
                            transition: all 0.4s;
                            height: 100%;
                            display: flex; flex-direction: column;
                            box-shadow: 0 2px 15px rgba(13,27,42,0.05);
                            overflow: hidden;
                        " class="course-card">

                            <!-- Image -->
                            <div style="position:relative; overflow:hidden;">
                                <img src="{{ asset('img/' . $course['img']) }}" alt="{{ $course['title'] }}"
                                    style="width:100%; height:210px; object-fit:cover; transition: transform 0.4s; display:block;">
                                <!-- Badge -->
                                <span style="
                                    position:absolute; top:14px; left:14px;
                                    background: {{ $course['badge_color'] }};
                                    color:#fff; font-family:'Lato',sans-serif;
                                    font-size:10px; font-weight:700;
                                    letter-spacing:1.5px; text-transform:uppercase;
                                    padding: 4px 12px;
                                ">{{ $course['badge'] }}</span>
                                <!-- Icon overlay -->
                                <div style="
                                    position:absolute; bottom:-20px; right:20px;
                                    width:50px; height:50px;
                                    background: var(--gold);
                                    border-radius:50%;
                                    display:flex; align-items:center; justify-content:center;
                                    color:#fff; font-size:20px;
                                    box-shadow: 0 4px 15px rgba(174,130,37,0.4);
                                ">
                                    <i class="{{ $course['icon'] }}"></i>
                                </div>
                            </div>

                            <!-- Content -->
                            <div style="padding: 32px 24px 24px; flex:1; display:flex; flex-direction:column;">
                                <!-- Meta -->
                                <div style="display:flex; gap:16px; margin-bottom:14px;">
                                    <span
                                        style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:0.5px;">
                                        <i class="far fa-clock"
                                            style="color:var(--gold); margin-right:5px;"></i>{{ $course['duration'] }}
                                    </span>
                                    <span style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted);">
                                        <i class="fas fa-user-graduate"
                                            style="color:var(--gold); margin-right:5px;"></i>{{ $course['level'] }}
                                    </span>
                                </div>

                                <h4 style="
                                    font-family:'Cinzel',serif; font-size:16px;
                                    color:var(--navy); font-weight:700;
                                    margin-bottom:12px; line-height:1.3;
                                ">{{ $course['title'] }}</h4>

                                <p style="color:var(--text-mid); font-size:13px; line-height:1.8; margin-bottom:18px; flex:1;">
                                    {{ $course['desc'] }}
                                </p>

                                <!-- Features list -->
                                <ul
                                    style="list-style:none; padding:0; margin:0 0 20px; display:grid; grid-template-columns:1fr 1fr; gap:6px;">
                                    @foreach($course['features'] as $feature)
                                        <li
                                            style="font-family:'Lato',sans-serif; font-size:12px; color:var(--text-mid); display:flex; align-items:center; gap:6px;">
                                            <i class="fas fa-check-circle"
                                                style="color:var(--gold); font-size:11px; flex-shrink:0;"></i>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- Divider -->
                                <div style="height:1px; background:var(--border-soft); margin-bottom:18px;"></div>

                                <!-- CTA -->
                                <a href="#" style="
                                    display:inline-flex; align-items:center; gap:8px;
                                    font-family:'Cinzel',serif; font-size:11px;
                                    font-weight:700; letter-spacing:1.5px;
                                    text-transform:uppercase; color:var(--gold);
                                    text-decoration:none; transition: all 0.3s;
                                " class="course-link">
                                    Enroll Now
                                    <i class="fas fa-arrow-right" style="font-size:10px; transition: transform 0.3s;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <!-- ===================== ENROLL CTA BANNER ===================== -->
    <section style="
        background: var(--navy);
        padding: 70px 0;
        position: relative; overflow: hidden;
        border-top: 2px solid var(--gold);
        border-bottom: 2px solid var(--gold);
    ">
        <div style="position:absolute; inset:0; opacity:0.04;
            background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Cpath d=%22M40 0L80 40L40 80L0 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
        "></div>
        <div class="container text-center animate-on-scroll" style="position:relative; z-index:2;">
            <div style="font-family:'Amiri',serif; font-size:22px; color:var(--gold-light); margin-bottom:12px;">
                بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ
            </div>
            <h2
                style="font-family:'Cinzel',serif; font-size:clamp(22px,3vw,36px); font-weight:700; color:#fff; margin-bottom:14px;">
                Ready To Start Your <span style="color:var(--gold-light);">Quranic Journey?</span>
            </h2>
            <p style="color:rgba(255,255,255,0.6); font-size:15px; max-width:550px; margin:0 auto 30px; line-height:1.8;">
                Join hundreds of students already learning at Bismillah Islamic Academy. Enroll today and take the first
                step toward Quranic excellence.
            </p>
            <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
                <a href="#" class="btn-gold">Enroll Now</a>
                <a href="{{ route('about') }}" class="btn-gold-outline">Learn More</a>
            </div>
        </div>
    </section>


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
                            'text' => 'Alhamdulillah, my son memorized 5 Juz in just one year. The Hifz program is extremely well structured and the teachers are truly dedicated.'
                        ],
                        [
                            'name' => 'Sarah Bibi',
                            'prof' => 'Parent',
                            'img' => 'testimonial-2.jpg',
                            'text' => 'The Tajweed course transformed my daughter\'s recitation completely. She now reads with such beautiful pronunciation. JazakAllah Khair!'
                        ],
                        [
                            'name' => 'Omar Farooq',
                            'prof' => 'Student',
                            'img' => 'testimonial-3.jpg',
                            'text' => 'The Arabic Language course helped me understand the Quran directly without translation. It is truly a life-changing course.'
                        ],
                        [
                            'name' => 'Aisha Rahman',
                            'prof' => 'Parent',
                            'img' => 'testimonial-4.jpg',
                            'text' => 'Best Islamic academy in the area. The Islamic Studies curriculum is thorough and the teachers make it engaging for children. Highly recommended!'
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


    @include('partials.footer')

@endsection

@push('styles')
    <style>
        .course-card:hover {
            border-color: var(--gold) !important;
            transform: translateY(-6px);
            box-shadow: 0 20px 45px rgba(13, 27, 42, 0.12) !important;
        }

        .course-card:hover img {
            transform: scale(1.06);
        }

        .course-card:hover .course-link {
            color: var(--gold-dark) !important;
        }

        .course-card:hover .course-link i {
            transform: translateX(5px);
        }
    </style>
@endpush
