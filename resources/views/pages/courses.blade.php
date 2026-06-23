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
                        <button type="button" class="btn-gold-solid" data-bs-toggle="modal" data-bs-target="#enrollModal">
                            Enroll Now
                        </button> <a href="{{ route('contact') }}" class="btn-navy-outline">Ask a Question</a>
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
                                <button type="button" class="card-enroll-btn" data-bs-toggle="modal"
                                    data-bs-target="#enrollModal">
                                    <span>Enroll Now</span>
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- ===================== CTA BANNER ===================== -->
    <section class="cta-banner scroll-reveal mb-5" data-dir="up">
        <div class="cta-pattern"></div>
        <div class="cta-glow"></div>
        <div class="container" style="position:relative; z-index:2;">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="cta-arabic">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
                    <h2 class="cta-title">Ready To Start Your<br><span style="color:var(--gold-light);">Quranic Journey?</span></h2>
                    <p class="cta-desc">Join hundreds of students already learning at Bismillah Islamic Academy. Enroll today and take the first step toward Quranic excellence.</p>
                    <div style="display:flex; gap:14px; flex-wrap:wrap; justify-content:center; margin-top:28px;">
                        <button type="button" class="btn-gold-solid" data-bs-toggle="modal" data-bs-target="#enrollModal">
                            Enroll Now
                        </button>
                        <a href="{{ route('contact') }}" class="btn-white-outline">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('styles')

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
