@extends('layouts.app')

@section('title', 'Bismillah Islamic Academy - Learn Quran Online')

@section('styles')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;900&family=Lato:wght@300;400;700&display=swap');

:root {
    --navy:      #0d1b2a;
    --navy2:     #112236;
    --navy3:     #1a2f45;
    --gold:      #c9a84c;
    --gold2:     #e8c96a;
    --gold3:     #f5dfa0;
    --white:     #ffffff;
    --light:     #f0ece3;
    --gray:      #8a9bb0;
}

* { box-sizing: border-box; margin: 0; padding: 0; }

body {
    font-family: 'Lato', sans-serif;
    background: var(--navy);
    color: var(--white);
}

/* ── GEOMETRIC PATTERN ── */
.geo-bg {
    background-image:
        url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23c9a84c' stroke-opacity='0.07' stroke-width='1'%3E%3Cpolygon points='40,4 76,22 76,58 40,76 4,58 4,22'/%3E%3Cpolygon points='40,16 64,28 64,52 40,64 16,52 16,28'/%3E%3C/g%3E%3C/svg%3E");
}

/* ── HERO ── */
.hero-section {
    min-height: 100vh;
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy2) 50%, #0a2540 100%);
    position: relative;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image:
        url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23c9a84c' stroke-opacity='0.06' stroke-width='1'%3E%3Cpolygon points='40,4 76,22 76,58 40,76 4,58 4,22'/%3E%3Cpolygon points='40,16 64,28 64,52 40,64 16,52 16,28'/%3E%3C/g%3E%3C/svg%3E");
}

.hero-section::after {
    content: '';
    position: absolute;
    right: -100px;
    top: -100px;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(201,168,76,0.08) 0%, transparent 70%);
    pointer-events: none;
}

.hero-content { position: relative; z-index: 2; }

.hero-badge {
    display: inline-block;
    background: rgba(201,168,76,0.15);
    border: 1px solid rgba(201,168,76,0.4);
    color: var(--gold2);
    padding: 6px 20px;
    border-radius: 30px;
    font-size: 0.85rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 20px;
}

.hero-title {
    font-family: 'Cinzel', serif;
    font-size: clamp(2.2rem, 5vw, 4rem);
    font-weight: 900;
    line-height: 1.15;
    color: var(--white);
    margin-bottom: 10px;
}

.hero-title span {
    color: var(--gold);
    display: block;
}

.hero-arabic {
    font-size: 1.6rem;
    color: var(--gold3);
    margin: 15px 0;
    font-family: serif;
    letter-spacing: 2px;
}

.hero-sub {
    color: var(--gray);
    font-size: 1.05rem;
    line-height: 1.7;
    max-width: 520px;
    margin-bottom: 35px;
}

.btn-gold {
    background: linear-gradient(135deg, var(--gold), var(--gold2));
    color: var(--navy);
    font-weight: 700;
    padding: 14px 36px;
    border-radius: 4px;
    border: none;
    font-size: 0.95rem;
    letter-spacing: 1px;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s;
    text-transform: uppercase;
}
.btn-gold:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(201,168,76,0.4);
    color: var(--navy);
    text-decoration: none;
}

.btn-outline-gold {
    background: transparent;
    color: var(--gold);
    font-weight: 700;
    padding: 13px 36px;
    border-radius: 4px;
    border: 2px solid var(--gold);
    font-size: 0.95rem;
    letter-spacing: 1px;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s;
    text-transform: uppercase;
}
.btn-outline-gold:hover {
    background: var(--gold);
    color: var(--navy);
    text-decoration: none;
}

/* Stats bar */
.stats-bar {
    background: linear-gradient(90deg, var(--gold), var(--gold2));
    padding: 18px 0;
}
.stat-item {
    text-align: center;
    color: var(--navy);
}
.stat-number {
    font-family: 'Cinzel', serif;
    font-size: 2rem;
    font-weight: 900;
    display: block;
    line-height: 1;
}
.stat-label {
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 700;
}

/* ── SECTION TITLES ── */
.section-badge {
    display: inline-block;
    color: var(--gold);
    font-size: 0.82rem;
    letter-spacing: 3px;
    text-transform: uppercase;
    font-weight: 700;
    margin-bottom: 10px;
}
.section-badge::before,
.section-badge::after {
    content: '— ';
}
.section-title-main {
    font-family: 'Cinzel', serif;
    font-size: clamp(1.6rem, 3vw, 2.4rem);
    font-weight: 700;
    color: var(--white);
    margin-bottom: 15px;
}
.section-title-main span { color: var(--gold); }

.section-divider {
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, var(--gold), var(--gold2));
    margin: 0 auto 40px;
    border-radius: 2px;
}
.section-divider.left { margin: 0 0 40px; }

/* ── STEPS ── */
.steps-section {
    background: var(--navy2);
    padding: 70px 0;
}
.step-card {
    text-align: center;
    padding: 30px 20px;
    position: relative;
}
.step-number {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, var(--gold), var(--gold2));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Cinzel', serif;
    font-weight: 900;
    font-size: 1.3rem;
    color: var(--navy);
    margin: 0 auto 20px;
}
.step-card h5 { color: var(--gold2); font-weight: 700; margin-bottom: 10px; }
.step-card p { color: var(--gray); font-size: 0.92rem; line-height: 1.6; }
.step-arrow {
    position: absolute;
    right: -15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gold);
    font-size: 1.5rem;
    z-index: 2;
}

/* ── WHY CHOOSE US ── */
.why-section {
    background: var(--navy);
    padding: 80px 0;
}
.why-card {
    background: var(--navy2);
    border: 1px solid rgba(201,168,76,0.15);
    border-radius: 8px;
    padding: 30px 25px;
    height: 100%;
    transition: all 0.3s;
}
.why-card:hover {
    border-color: var(--gold);
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
}
.why-icon {
    width: 60px;
    height: 60px;
    background: rgba(201,168,76,0.12);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    font-size: 1.6rem;
    color: var(--gold);
}
.why-card h5 { color: var(--white); font-weight: 700; margin-bottom: 10px; }
.why-card p { color: var(--gray); font-size: 0.9rem; line-height: 1.6; margin: 0; }

/* ── COURSES ── */
.courses-section {
    background: var(--navy2);
    padding: 80px 0;
}
.course-card {
    background: var(--navy3);
    border: 1px solid rgba(201,168,76,0.12);
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s;
    height: 100%;
}
.course-card:hover {
    border-color: var(--gold);
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.4);
}
.course-img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    background: linear-gradient(135deg, var(--navy3), var(--navy));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: var(--gold);
}
.course-body { padding: 22px; }
.course-tag {
    display: inline-block;
    background: rgba(201,168,76,0.15);
    color: var(--gold);
    font-size: 0.75rem;
    padding: 3px 12px;
    border-radius: 20px;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 10px;
}
.course-card h5 { color: var(--white); font-weight: 700; margin-bottom: 8px; }
.course-card p { color: var(--gray); font-size: 0.88rem; line-height: 1.6; margin-bottom: 15px; }
.course-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 15px;
    border-top: 1px solid rgba(255,255,255,0.07);
}
.course-price { color: var(--gold2); font-weight: 700; font-size: 1rem; }

/* ── CTA BANNER ── */
.cta-banner {
    background: linear-gradient(135deg, var(--gold), var(--gold2));
    padding: 50px 0;
    text-align: center;
}
.cta-banner h2 {
    font-family: 'Cinzel', serif;
    color: var(--navy);
    font-size: 2rem;
    font-weight: 900;
    margin-bottom: 10px;
}
.cta-banner p { color: var(--navy2); margin-bottom: 25px; font-size: 1.05rem; }

/* ── ABOUT ── */
.about-section {
    background: var(--navy);
    padding: 80px 0;
}
.about-img-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}
.about-img-grid img {
    width: 100%;
    border-radius: 8px;
    object-fit: cover;
}
.about-img-grid img:first-child { height: 220px; }
.about-img-grid img:nth-child(2) { height: 160px; margin-top: 40px; }
.about-img-grid img:nth-child(3) { height: 160px; }
.about-img-grid img:nth-child(4) { height: 220px; }

.about-stat {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 20px;
    background: var(--navy2);
    border-left: 4px solid var(--gold);
    border-radius: 0 8px 8px 0;
}
.about-stat-num {
    font-family: 'Cinzel', serif;
    font-size: 2rem;
    font-weight: 900;
    color: var(--gold);
    line-height: 1;
}
.about-stat-label { color: var(--gray); font-size: 0.85rem; }
.about-stat-title { color: var(--white); font-weight: 700; }

/* ── TEACHERS ── */
.teachers-section {
    background: var(--navy2);
    padding: 80px 0;
}
.teacher-card {
    background: var(--navy3);
    border: 1px solid rgba(201,168,76,0.12);
    border-radius: 10px;
    overflow: hidden;
    text-align: center;
    transition: all 0.3s;
}
.teacher-card:hover {
    border-color: var(--gold);
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
}
.teacher-img-wrap {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    overflow: hidden;
    margin: 30px auto 15px;
    border: 3px solid var(--gold);
}
.teacher-img-wrap img { width: 100%; height: 100%; object-fit: cover; }
.teacher-card h5 { color: var(--white); font-weight: 700; margin-bottom: 4px; }
.teacher-card small { color: var(--gold); font-size: 0.82rem; }
.teacher-socials {
    display: flex;
    justify-content: center;
    gap: 8px;
    padding: 20px;
}
.teacher-socials a {
    width: 34px;
    height: 34px;
    background: rgba(201,168,76,0.12);
    border: 1px solid rgba(201,168,76,0.3);
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--gold);
    font-size: 0.85rem;
    text-decoration: none;
    transition: all 0.3s;
}
.teacher-socials a:hover {
    background: var(--gold);
    color: var(--navy);
}

/* ── TESTIMONIALS ── */
.testi-section {
    background: var(--navy);
    padding: 80px 0;
}
.testi-card {
    background: var(--navy2);
    border: 1px solid rgba(201,168,76,0.15);
    border-radius: 10px;
    padding: 30px;
    height: 100%;
    position: relative;
}
.testi-card::before {
    content: '\201C';
    font-size: 5rem;
    color: var(--gold);
    opacity: 0.2;
    position: absolute;
    top: 10px;
    left: 20px;
    line-height: 1;
    font-family: serif;
}
.testi-stars { color: var(--gold); margin-bottom: 15px; font-size: 0.9rem; }
.testi-card p { color: var(--gray); font-size: 0.93rem; line-height: 1.7; margin-bottom: 20px; font-style: italic; }
.testi-author { display: flex; align-items: center; gap: 12px; }
.testi-author img {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    border: 2px solid var(--gold);
    object-fit: cover;
}
.testi-author h6 { color: var(--white); font-weight: 700; margin: 0; font-size: 0.9rem; }
.testi-author small { color: var(--gold); font-size: 0.78rem; }

/* ── ENROLL FORM ── */
.enroll-section {
    background: var(--navy2);
    padding: 80px 0;
}
.form-section-bg {
    background: var(--navy3);
    border: 1px solid rgba(201,168,76,0.2);
    border-radius: 12px;
    padding: 40px;
}
.form-control, .form-select {
    background: var(--navy2) !important;
    border: 1px solid rgba(201,168,76,0.25) !important;
    color: var(--white) !important;
    border-radius: 6px;
}
.form-control:focus, .form-select:focus {
    border-color: var(--gold) !important;
    box-shadow: 0 0 0 3px rgba(201,168,76,0.15) !important;
}
.form-control::placeholder { color: var(--gray) !important; }
.form-floating label { color: var(--gray) !important; }

/* ── NEWSLETTER ── */
.newsletter-section {
    background: linear-gradient(135deg, var(--navy3) 0%, var(--navy2) 100%);
    padding: 70px 0;
    text-align: center;
    border-top: 1px solid rgba(201,168,76,0.15);
}
.newsletter-section h2 {
    font-family: 'Cinzel', serif;
    color: var(--white);
    margin-bottom: 10px;
}
.newsletter-section h2 span { color: var(--gold); }
.newsletter-section p { color: var(--gray); margin-bottom: 30px; }
.newsletter-input-wrap {
    max-width: 480px;
    margin: 0 auto;
    display: flex;
    gap: 0;
    border-radius: 6px;
    overflow: hidden;
    border: 1px solid rgba(201,168,76,0.4);
}
.newsletter-input-wrap input {
    flex: 1;
    background: var(--navy2);
    border: none;
    color: var(--white);
    padding: 14px 20px;
    outline: none;
    font-size: 0.95rem;
}
.newsletter-input-wrap input::placeholder { color: var(--gray); }
.newsletter-input-wrap button {
    background: linear-gradient(135deg, var(--gold), var(--gold2));
    color: var(--navy);
    border: none;
    padding: 14px 28px;
    font-weight: 700;
    letter-spacing: 1px;
    cursor: pointer;
    font-size: 0.9rem;
}

/* ── FOOTER ── */
.main-footer {
    background: #070f18;
    padding: 60px 0 0;
    border-top: 1px solid rgba(201,168,76,0.2);
}
.footer-logo img { height: 70px; margin-bottom: 15px; }
.footer-desc { color: var(--gray); font-size: 0.9rem; line-height: 1.7; }
.footer-title {
    color: var(--gold);
    font-family: 'Cinzel', serif;
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(201,168,76,0.2);
}
.footer-links { list-style: none; padding: 0; }
.footer-links li { margin-bottom: 10px; }
.footer-links a {
    color: var(--gray);
    text-decoration: none;
    font-size: 0.9rem;
    transition: color 0.3s;
}
.footer-links a:hover { color: var(--gold); }
.footer-links a::before { content: '▸ '; color: var(--gold); font-size: 0.7rem; }
.footer-contact p {
    color: var(--gray);
    font-size: 0.9rem;
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 12px;
}
.footer-contact p i { color: var(--gold); margin-top: 3px; min-width: 14px; }
.footer-socials { display: flex; gap: 10px; margin-top: 20px; }
.footer-socials a {
    width: 38px;
    height: 38px;
    background: var(--navy2);
    border: 1px solid rgba(201,168,76,0.3);
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--gold);
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s;
}
.footer-socials a:hover { background: var(--gold); color: var(--navy); }
.footer-bottom {
    margin-top: 50px;
    padding: 20px 0;
    border-top: 1px solid rgba(255,255,255,0.06);
    text-align: center;
    color: var(--gray);
    font-size: 0.85rem;
}

/* ── BACK TO TOP ── */
.back-to-top {
    position: fixed;
    bottom: 25px;
    right: 25px;
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, var(--gold), var(--gold2));
    color: var(--navy);
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 1.1rem;
    z-index: 999;
    transition: all 0.3s;
    opacity: 0;
    pointer-events: none;
}
.back-to-top.show { opacity: 1; pointer-events: all; }
.back-to-top:hover { transform: translateY(-3px); color: var(--navy); }

/* ── SPINNER ── */
#spinner {
    background: var(--navy);
    z-index: 99999;
}
#spinner .spinner-border { color: var(--gold) !important; }

/* ── RESPONSIVE ── */
@media (max-width: 768px) {
    .hero-section { padding: 100px 0 60px; min-height: auto; }
    .step-arrow { display: none; }
}
</style>
@endsection

@section('content')

<!-- Spinner -->
<div id="spinner" class="position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="z-index:99999;">
    <div class="spinner-border" style="width:3rem;height:3rem;color:var(--gold);" role="status"></div>
</div>

{{-- Navbar from partial --}}
@include('partials.navbar')

<!-- ═══════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════ -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 hero-content">
                <div class="hero-badge">⭐ Certified Quran Tutors</div>
                <h1 class="hero-title">
                    Learn Quran
                    <span>Online With Ease</span>
                </h1>
                <div class="hero-arabic">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</div>
                <p class="hero-sub">
                    Bismillah Islamic Academy provides expert Quran education for all ages — Nazra, Hifz, Tajweed, and Islamic Studies — from certified scholars, online and in-person.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#enroll" class="btn-gold">Enroll Now — Free Trial</a>
                    <a href="#courses" class="btn-outline-gold">View Courses</a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('img/logo.png') }}"
                     alt="Bismillah Islamic Academy"
                     style="max-width:380px; width:100%; filter: drop-shadow(0 0 60px rgba(201,168,76,0.35));">
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     STATS BAR
═══════════════════════════════════════════ -->
<div class="stats-bar">
    <div class="container">
        <div class="row g-3 text-center">
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-number">10+</span>
                    <span class="stat-label">Years Experience</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Happy Students</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-number">20+</span>
                    <span class="stat-label">Certified Teachers</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-number">4.9★</span>
                    <span class="stat-label">Student Rating</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ═══════════════════════════════════════════
     3 STEPS
═══════════════════════════════════════════ -->
<section class="steps-section geo-bg">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">How It Works</div>
            <h2 class="section-title-main">Start Learning <span>In 3 Simple Steps</span></h2>
            <div class="section-divider"></div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 position-relative">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h5>Register Online</h5>
                    <p>Fill out our simple enrollment form and choose your preferred course and schedule.</p>
                </div>
                <div class="step-arrow d-none d-md-block">›</div>
            </div>
            <div class="col-md-4 position-relative">
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h5>Free Trial Class</h5>
                    <p>Attend a free trial session with our certified teacher to experience our teaching method.</p>
                </div>
                <div class="step-arrow d-none d-md-block">›</div>
            </div>
            <div class="col-md-4">
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h5>Begin Your Journey</h5>
                    <p>Start your regular classes and track your progress with personalized feedback.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     WHY CHOOSE US
═══════════════════════════════════════════ -->
<section class="why-section" id="about-why">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">Our Advantages</div>
            <h2 class="section-title-main">Why Choose <span>Bismillah Academy?</span></h2>
            <div class="section-divider"></div>
        </div>
        <div class="row g-4">
            @foreach([
                ['fa-quran',       'Certified Huffaz',        'All our Quran teachers are certified Hafiz ul Quran with ijazah in recitation and Tajweed.'],
                ['fa-laptop',      'Online & Offline',        'Flexible learning — join from home via Zoom or attend our physical classes in Rawalpindi.'],
                ['fa-female',      'Female Teachers',         'Dedicated female scholars available for sisters and female students in a comfortable setting.'],
                ['fa-users',       '1-on-1 Sessions',         'Personalized one-on-one classes ensure maximum attention and faster learning progress.'],
                ['fa-clock',       'Flexible Timings',        'Morning, evening and weekend slots available to fit your busy schedule.'],
                ['fa-star',        'Free Trial Class',        'Try before you commit — we offer a completely free trial class with no obligation.'],
            ] as $w)
            <div class="col-md-6 col-lg-4">
                <div class="why-card">
                    <div class="why-icon"><i class="fa {{ $w[0] }}"></i></div>
                    <h5>{{ $w[1] }}</h5>
                    <p>{{ $w[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     COURSES
═══════════════════════════════════════════ -->
<section class="courses-section" id="courses">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">Programs</div>
            <h2 class="section-title-main">Our Most Popular <span>Courses</span></h2>
            <div class="section-divider"></div>
        </div>
        <div class="row g-4">
            @foreach([
                ['fa-book-open',  'Quran Nazra',          'Beginner', 'Learn to read Quran with proper makharij and pronunciation from scratch.',        'Free Trial'],
                ['fa-microphone', 'Tajweed Course',       'Popular',  'Master the rules of Tajweed for beautiful and correct Quran recitation.',         'PKR 1500/mo'],
                ['fa-star',       'Quran Hifz Program',   'Advanced', 'Complete Quran memorization with a certified Hafiz teacher, step by step.',       'PKR 2000/mo'],
                ['fa-language',   'Arabic Language',      'New',      'Learn Quranic Arabic to understand the Quran without translation.',               'PKR 1800/mo'],
                ['fa-mosque',     'Islamic Studies',      'All Ages', 'Fiqh, Hadith, Seerah, Aqeedah — comprehensive Islamic curriculum.',               'PKR 2000/mo'],
                ['fa-child',      'Kids Program',         'Ages 4+',  'Fun, engaging, age-appropriate Quran and Islamic education for young children.',   'PKR 1200/mo'],
            ] as $c)
            <div class="col-md-6 col-lg-4">
                <div class="course-card">
                    <div class="course-img">
                        <i class="fa {{ $c[0] }}"></i>
                    </div>
                    <div class="course-body">
                        <span class="course-tag">{{ $c[2] }}</span>
                        <h5>{{ $c[1] }}</h5>
                        <p>{{ $c[3] }}</p>
                        <div class="course-footer">
                            <span class="course-price">{{ $c[4] }}</span>
                            <a href="#enroll" class="btn-gold" style="padding:8px 20px;font-size:0.82rem;">Enroll</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     CTA BANNER
═══════════════════════════════════════════ -->
<div class="cta-banner">
    <div class="container">
        <h2>Let The Voice Of Your Child Be Pure for Quran!</h2>
        <p>Enroll your child today and start their Quran journey with certified teachers.</p>
        <a href="#enroll" class="btn btn-dark px-5 py-3 fw-bold" style="border-radius:4px;letter-spacing:1px;">
            Book A Free Trial Now →
        </a>
    </div>
</div>

<!-- ═══════════════════════════════════════════
     ABOUT SECTION
═══════════════════════════════════════════ -->
<section class="about-section" id="about">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="about-img-grid">
                    <img src="{{ asset('img/about-1.jpg') }}" alt="Quran Learning">
                    <img src="{{ asset('img/about-2.jpg') }}" alt="Students">
                    <img src="{{ asset('img/about-3.jpg') }}" alt="Online Class">
                    <img src="{{ asset('img/about-4.jpg') }}" alt="Teacher">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-badge">About Us</div>
                <h2 class="section-title-main" style="text-align:left;">
                    Bismillah Islamic Academy —<br><span>The Best Online Quran Learning</span>
                </h2>
                <div class="section-divider left"></div>
                <p style="color:var(--gray);line-height:1.8;margin-bottom:20px;">
                    Bismillah Islamic Academy is a trusted Islamic educational institution dedicated to providing authentic Quran and Islamic education. Our certified Huffaz and scholars guide students of all ages with patience and deep knowledge.
                </p>
                <p style="color:var(--gray);line-height:1.8;margin-bottom:30px;">
                    We offer structured programs for children and adults — both online and in-person in Rawalpindi — helping every student build a strong and lasting connection with the Holy Quran and Sunnah.
                </p>
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="about-stat">
                            <div>
                                <div class="about-stat-num">10+</div>
                                <div class="about-stat-title" style="color:var(--white);font-weight:700;font-size:0.9rem;">Years of Experience</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="about-stat">
                            <div>
                                <div class="about-stat-num">500+</div>
                                <div class="about-stat-title" style="color:var(--white);font-weight:700;font-size:0.9rem;">Satisfied Students</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#enroll" class="btn-gold">Start Learning Today</a>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     TEACHERS
═══════════════════════════════════════════ -->
<section class="teachers-section" id="teachers">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">Our Team</div>
            <h2 class="section-title-main">Meet Our <span>Certified Scholars</span></h2>
            <div class="section-divider"></div>
        </div>
        <div class="row g-4">
            @foreach([
                ['Hafiz Muhammad Ali',  'Quran Hifz Teacher',    'team-1.jpg'],
                ['Qari Ahmed Raza',     'Tajweed & Recitation',  'team-2.jpg'],
                ['Ustaz Bilal Hassan',  'Islamic Studies',       'team-3.jpg'],
                ['Ustaza Fatima Noor',  'Female Quran Teacher',  'team-4.jpg'],
            ] as $t)
            <div class="col-md-6 col-lg-3">
                <div class="teacher-card">
                    <div class="teacher-img-wrap">
                        <img src="{{ asset('img/' . $t[2]) }}" alt="{{ $t[0] }}">
                    </div>
                    <h5>{{ $t[0] }}</h5>
                    <small>{{ $t[1] }}</small>
                    <div class="teacher-socials">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     TESTIMONIALS
═══════════════════════════════════════════ -->
<section class="testi-section">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">Reviews</div>
            <h2 class="section-title-main">What Our <span>Students Say</span></h2>
            <div class="section-divider"></div>
        </div>
        <div class="row g-4">
            @foreach([
                ['My son memorized 5 Paras in just 6 months. The teachers are dedicated and caring. Alhamdulillah, best academy ever!', 'Muhammad Tariq', 'Parent from Rawalpindi', 'testimonial-1.jpg'],
                ['Excellent online Quran academy. My daughter loves her classes and has improved so much. Highly recommended!', 'Aisha Malik', 'Parent from Lahore', 'testimonial-2.jpg'],
                ['The Islamic Studies program is comprehensive. Staff is professional and always available. MashAllah!', 'Ahmad Siddiqui', 'Parent from Islamabad', 'testimonial-3.jpg'],
                ['I joined Tajweed course and my recitation improved remarkably in just weeks. Jazak Allah Khair!', 'Zainab Hussain', 'Adult Student', 'testimonial-4.jpg'],
            ] as $r)
            <div class="col-md-6 col-lg-3">
                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p>"{{ $r[0] }}"</p>
                    <div class="testi-author">
                        <img src="{{ asset('img/' . $r[3]) }}" alt="{{ $r[1] }}">
                        <div>
                            <h6>{{ $r[1] }}</h6>
                            <small>{{ $r[2] }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     ENROLL FORM
═══════════════════════════════════════════ -->
<section class="enroll-section" id="enroll">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-section-bg">
                    <div class="text-center mb-4">
                        <div class="section-badge">Get Started</div>
                        <h2 class="section-title-main">Enroll Now — <span>First Class Free</span></h2>
                    </div>
                    {{-- action="{{ route('admission.store') }}" — add when ready --}}
                    <form action="#" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Student Name" required>
                                    <label for="name">Student Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                                    <label for="phone">Phone / WhatsApp</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    <label for="email">Email (Optional)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="course" name="course">
                                        <option value="">Select Course</option>
                                        <option>Quran Nazra</option>
                                        <option>Quran Hifz</option>
                                        <option>Tajweed</option>
                                        <option>Islamic Studies</option>
                                        <option>Arabic Language</option>
                                        <option>Kids Program</option>
                                        <option>Online Program</option>
                                    </select>
                                    <label for="course">Select Course</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" id="message" placeholder="Additional Info" style="height:100px;"></textarea>
                                    <label for="message">Additional Information</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn-gold" style="width:100%;padding:16px;font-size:1rem;">
                                    Book Free Trial — بِسْمِ اللَّه
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     NEWSLETTER
═══════════════════════════════════════════ -->
<section class="newsletter-section">
    <div class="container">
        <h2>Subscribe to Our <span>Newsletter</span></h2>
        <p>Get updates on new courses, Islamic content, and academy news directly in your inbox.</p>
        <div class="newsletter-input-wrap">
            <input type="email" placeholder="Enter your email address...">
            <button>Subscribe</button>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     FOOTER
═══════════════════════════════════════════ -->
<footer class="main-footer">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div class="footer-logo">
                    <img src="{{ asset('img/logo.png') }}" alt="Bismillah Islamic Academy">
                </div>
                <p class="footer-desc">
                    Bismillah Islamic Academy — your trusted partner for authentic Quran and Islamic education, online and in-person.
                </p>
                <div class="footer-socials">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-title">Quick Links</div>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Teachers</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Admission</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-title">Class Timings</div>
                <div class="footer-contact">
                    <p><i class="fa fa-calendar"></i> Mon – Sat: 08AM – 10PM</p>
                    <p><i class="fa fa-calendar"></i> Sunday: 10AM – 06PM</p>
                    <p style="color:var(--gold);font-size:0.85rem;margin-top:10px;">Multiple shifts available</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-title">Contact Us</div>
                <div class="footer-contact">
                    <p><i class="fa fa-map-marker-alt"></i> Rawalpindi, Punjab, Pakistan</p>
                    <p><i class="fa fa-phone"></i> +92 300 0000000</p>
                    <p><i class="fa fa-envelope"></i> info@bismillahacademy.pk</p>
                    <p><i class="fab fa-whatsapp"></i> WhatsApp Available 24/7</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            &copy; {{ date('Y') }} Bismillah Islamic Academy — All Rights Reserved.
            &nbsp;|&nbsp; Designed with ❤️ for Islamic Education
        </div>
    </div>
</footer>

<!-- Back to Top -->
<a href="#" class="back-to-top" id="backToTop"><i class="bi bi-arrow-up"></i></a>

@endsection

@section('scripts')
<script>
    // Spinner hide
    window.addEventListener('load', function () {
        document.getElementById('spinner').style.display = 'none';
    });

    // Back to top
    window.addEventListener('scroll', function () {
        var btn = document.getElementById('backToTop');
        if (window.scrollY > 300) {
            btn.classList.add('show');
        } else {
            btn.classList.remove('show');
        }
    });
    document.getElementById('backToTop').addEventListener('click', function (e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
@endsection
