@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('css/course.css') }}?v={{ @filemtime(public_path('css/course.css')) }}">
@endpush

@section('title', 'Online Quran Courses — Bismillah Islamic Academy')
@section('meta_description', 'Our courses: Norani Qaida, Quran Nazra, Tajweed, Hifz ul Quran, Islamic Studies, Arabic Language, Hadith & Seerah, Namaz and Duas. For kids and adults.')

@section('content')

    @php $totalCourses = count($courses); @endphp


    <x-page-hero
        :title="section('courses', 'hero', 'title', 'Our Islamic <span>Courses</span>')"
        :subtitle="section('courses', 'hero', 'subtitle', 'From the first Arabic letter to complete Quran memorization — a structured path for every student.')"
        :image="setting('img_courses_hero') ? asset('storage/' . setting('img_courses_hero')) : asset('storage/courses-hero.jpg')"
        :crumbs="['Courses' => null]"
    ></x-page-hero>


    <!-- ===================== INTRO ===================== -->
    <section class="intro-section">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6 scroll-reveal" data-dir="left">
                    <span class="label-tag">Our Curriculum</span>
                    <h2 class="section-h2" style="margin-top:14px;">
                        {!! section('courses', 'intro_title', 'title', 'Authentic Islamic Education<br>For Every Age & Level') !!}
                    </h2>
                    <div class="gold-bar"></div>
                    <p class="body-text" style="margin-bottom:28px;">
                        {{ section('courses', 'intro_title', 'description', 'Our comprehensive Islamic curriculum is carefully designed for every age — from beginners learning the Arabic alphabet to advanced Hifz students completing the entire Quran. All courses are taught by certified scholars using modern and traditional teaching methods.') }}
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
                <h2 class="section-h2" style="margin-top:12px; margin-bottom:14px;">{{ section('courses', 'grid_title', 'title', 'All Available Courses') }}</h2>
                <div style="width:50px; height:2px; background:var(--gold); margin:0 auto;"></div>
            </div>

            <div class="row g-4">
                @foreach($courses as $index => $course)
                    <div class="col-lg-4 col-md-6 scroll-reveal" data-dir="up"
                        style="transition-delay:{{ ($index % 3) * 0.1 }}s;">
                        <div class="course-card">
                            <div class="card-shimmer-line"></div>

                            @php
                                // FontAwesome 5 names for icons saved with FontAwesome 6 names
                                $courseIcon = str_replace(['fa-hands-praying', 'fa-person-praying'], 'fa-pray', (string) $course->icon);
                                $badgeBg = preg_match('/^(#[0-9a-f]{3,8}|rgba?\(.+\))$/i', (string) $course->badge_color) ? $course->badge_color : null;
                            @endphp
                            <div class="card-media">
                                <div class="card-img-wrap">
                                    <img loading="lazy" decoding="async" src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}">
                                    <div class="card-img-overlay"></div>
                                    @if($course->badge)
                                        <span class="course-badge" @if($badgeBg) style="background:{{ $badgeBg }};" @endif>{{ $course->badge }}</span>
                                    @endif
                                    <span class="course-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                <div class="course-icon-circle">
                                    <i class="{{ faIcon($courseIcon ?: 'fa-book-open') }}"></i>
                                </div>
                            </div>

                            <div class="card-body-inner">
                                <div class="card-meta">
                                    <span><i class="far fa-clock"></i> {{ $course->duration }}</span>
                                    <span><i class="fas fa-user-graduate"></i> {{ $course->level }}</span>
                                </div>
                                <h4 class="card-title">{{ $course->title }}</h4>
                                <p class="card-desc">{{ $course->description }}</p>
                                <div class="card-features">
                                    @if($course->features)
                                        @foreach($course->features as $feat)
                                            <div class="feature-item"><i class="fas fa-check"></i> {{ $feat }}</div>
                                        @endforeach
                                    @endif
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
    <section class="cta-banner scroll-reveal" data-dir="up">
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
