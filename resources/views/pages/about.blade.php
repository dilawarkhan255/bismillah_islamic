@extends('layouts.app')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color:var(--gold-light);">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="img-border">
                        <img class="img-fluid" src="{{ asset('img/teams-1.jpg') }}" alt="About Bismillah Islamic Academy">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="section-title bg-white text-start pe-3" style="color:var(--gold);">About Us</h6>
                        <h1 class="display-6 mb-4">Bismillah <span style="color:var(--gold);">Islamic Academy</span> With
                            <span style="color:var(--gold);">10
                                Years</span> Of Excellence</h1>
                        <p style="color:var(--text-mid);">Bismillah Islamic Academy was founded with one mission — to
                            provide every Muslim student with authentic, accessible, and high-quality Islamic education. We
                            believe that knowledge of the Quran and Sunnah is the foundation of a righteous life.</p>
                        <p class="mb-4" style="color:var(--text-mid);">From our humble beginning with just a few students,
                            we have grown into a thriving academy with over 1,500 students, 25 qualified teachers, and a
                            curriculum that spans Quran recitation, Tajweed, Hifz, Islamic Studies, and Arabic Language.</p>
                        <div class="d-flex align-items-center mb-4 pb-2">
                            <img class="flex-shrink-0 rounded-circle" src="{{ asset('img/team-1.jpg') }}" alt="Founder"
                                style="width:50px; height:50px; border:2px solid var(--gold); object-fit:cover;">
                            <div class="ps-4">
                                <h6 style="margin:0; color:var(--navy);">Sheikh Abdullah</h6>
                                <small style="color:var(--gold); letter-spacing:1px;">Founder & Principal</small>
                            </div>
                        </div>
                        <a href="{{ route('contact') }}" class="btn rounded-pill py-3 px-5"
                            style="background:var(--gold);color:#fff;border:none;">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- ===================== MISSION & VISION ===================== -->
    <section class="mv-section">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <span class="mv-label">Our Purpose</span>
                <h2 class="mv-heading">Mission & <span style="color:var(--gold);">Vision</span></h2>
                <div class="mv-divider"></div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="mv-card">
                        <div class="mv-card-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <div class="mv-card-tag">Mission</div>
                        <h4 class="mv-card-title">Our Mission</h4>
                        <p class="mv-card-text">To provide every Muslim student with authentic, accessible, and high-quality Islamic education — rooted in the Quran and Sunnah — through qualified scholars, modern methods, and a nurturing environment that develops both character and knowledge.</p>
                        <ul class="mv-list">
                            <li><i class="fas fa-check"></i> Authentic Quranic Education</li>
                            <li><i class="fas fa-check"></i> Certified & Qualified Teachers</li>
                            <li><i class="fas fa-check"></i> Accessible to Every Muslim</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.35s">
                    <div class="mv-card mv-card-vision">
                        <div class="mv-card-icon mv-icon-vision">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="mv-card-tag mv-tag-vision">Vision</div>
                        <h4 class="mv-card-title">Our Vision</h4>
                        <p class="mv-card-text">To become the most trusted Islamic academy in the world — a place where generations of Muslims connect deeply with their Deen, memorize the Quran, and carry the light of Islamic knowledge into every corner of their lives.</p>
                        <ul class="mv-list">
                            <li><i class="fas fa-check"></i> Global Islamic Education Hub</li>
                            <li><i class="fas fa-check"></i> Generations of Hafiz & Scholars</li>
                            <li><i class="fas fa-check"></i> Lifelong Connection with Deen</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== END MISSION & VISION ===================== -->


    <!-- ===================== TIMELINE ===================== -->
    <section class="timeline-section">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <span class="mv-label">Our Journey</span>
                <h2 class="mv-heading">Our <span style="color:var(--gold);">Story</span></h2>
                <div class="mv-divider"></div>
                <p style="color:var(--text-mid); max-width:520px; margin:16px auto 0; font-size:15px; line-height:1.9;">From a single classroom to a global academy — every step guided by faith and dedication.</p>
            </div>

            <div class="timeline-wrap">

                <div class="timeline-item wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="timeline-dot"><span>2016</span></div>
                    <div class="timeline-content">
                        <div class="tc-year">2016</div>
                        <h5 class="tc-title">Academy Founded</h5>
                        <p class="tc-text">Bismillah Islamic Academy was established in Islamabad with a small group of dedicated students and 2 qualified teachers. The journey began with a single mission — authentic Quranic education for all.</p>
                    </div>
                </div>

                <div class="timeline-item timeline-right wow fadeInRight" data-wow-delay="0.2s">
                    <div class="timeline-dot"><span>2018</span></div>
                    <div class="timeline-content">
                        <div class="tc-year">2018</div>
                        <h5 class="tc-title">First Hifz Batch Completed</h5>
                        <p class="tc-text">A proud milestone — our very first batch of Hifz students completed the memorization of the entire Holy Quran. A graduation ceremony was held to honor their dedication and hard work.</p>
                    </div>
                </div>

                <div class="timeline-item wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="timeline-dot"><span>2020</span></div>
                    <div class="timeline-content">
                        <div class="tc-year">2020</div>
                        <h5 class="tc-title">Curriculum Expanded</h5>
                        <p class="tc-text">We introduced new courses including Tajweed ul Quran, Islamic Studies, and Arabic Language — transforming into a full Islamic education institution with 10+ qualified scholars.</p>
                    </div>
                </div>

                <div class="timeline-item timeline-right wow fadeInRight" data-wow-delay="0.4s">
                    <div class="timeline-dot"><span>2022</span></div>
                    <div class="timeline-content">
                        <div class="tc-year">2022</div>
                        <h5 class="tc-title">Online Expansion</h5>
                        <p class="tc-text">Bismillah Academy went digital — launching a full online learning platform to reach Muslim students worldwide. Students from UK, USA, Canada, and Australia joined our growing family.</p>
                    </div>
                </div>

                <div class="timeline-item wow fadeInLeft" data-wow-delay="0.5s">
                    <div class="timeline-dot"><span>2024</span></div>
                    <div class="timeline-content">
                        <div class="tc-year">2024</div>
                        <h5 class="tc-title">500+ Hafiz Graduates</h5>
                        <p class="tc-text">A historic achievement — over 500 students completed full Quran memorization. Academy expanded with new teachers, new courses, and students enrolling from 15+ countries worldwide.</p>
                    </div>
                </div>

                <div class="timeline-item timeline-right wow fadeInRight" data-wow-delay="0.6s">
                    <div class="timeline-dot"><span>2026</span></div>
                    <div class="timeline-content">
                        <div class="tc-year">2026</div>
                        <h5 class="tc-title">1500+ Students Strong</h5>
                        <p class="tc-text">Today, Bismillah Islamic Academy proudly serves over 1,500 students globally with 25+ certified teachers, 9 structured courses, and hundreds of Hafiz graduates. The journey continues — with Allah's blessing.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ===================== END TIMELINE ===================== -->


    <!-- ===================== CERTIFICATIONS ===================== -->
    <section class="cert-section">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <span class="mv-label">Trust & Authority</span>
                <h2 class="mv-heading">Accreditation & <span style="color:var(--gold);">Certifications</span></h2>
                <div class="mv-divider"></div>
                <p style="color:var(--text-mid); max-width:520px; margin:16px auto 0; font-size:15px; line-height:1.9;">Our teachers are certified by recognized Islamic institutions — ensuring every lesson meets the highest standards of authenticity.</p>
            </div>

            <div class="row g-4 justify-content-center mb-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="cert-card">
                        <div class="cert-icon"><i class="fas fa-certificate"></i></div>
                        <h5 class="cert-title">Ijazah in Quran Recitation</h5>
                        <p class="cert-text">All our Quran teachers hold a certified Ijazah — an unbroken chain of authorization tracing back to the Prophet ﷺ — guaranteeing authentic transmission of the Quran.</p>
                        <div class="cert-badge">Verified Ijazah</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="cert-card">
                        <div class="cert-icon"><i class="fas fa-university"></i></div>
                        <h5 class="cert-title">Wafaq ul Madaris Certified</h5>
                        <p class="cert-text">Our scholars are graduates of Wafaq ul Madaris Al-Arabia — Pakistan's largest and most respected Islamic seminary board — ensuring rigorous academic standards.</p>
                        <div class="cert-badge">Wafaq ul Madaris</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="cert-card">
                        <div class="cert-icon"><i class="fas fa-shield-alt"></i></div>
                        <h5 class="cert-title">International Teaching Standard</h5>
                        <p class="cert-text">Our online teaching methodology follows internationally recognized standards for Islamic e-learning — with structured lesson plans, progress tracking, and regular assessments.</p>
                        <div class="cert-badge">ISO Compliant</div>
                    </div>
                </div>
            </div>

            <!-- Trust badges row -->
            <div class="trust-row wow fadeInUp" data-wow-delay="0.4s">
                <div class="trust-badge"><i class="fas fa-star"></i> 500+ Hafiz Graduates</div>
                <div class="trust-badge"><i class="fas fa-users"></i> 1500+ Active Students</div>
                <div class="trust-badge"><i class="fas fa-chalkboard-teacher"></i> 25+ Certified Scholars</div>
                <div class="trust-badge"><i class="fas fa-globe"></i> Students in 15+ Countries</div>
                <div class="trust-badge"><i class="fas fa-book-open"></i> 10 Years of Excellence</div>
            </div>
        </div>
    </section>
    <!-- ===================== END CERTIFICATIONS ===================== -->

    <!-- CTA Banner Start -->
    <div class="container-fluid cta-section py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-3 ">
            <div class="row align-items-center g-5">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-6 text-white mb-3">
                        Ready to Begin Your <span style="color:var(--gold-light);">Islamic Journey?</span>
                    </h1>
                    <p class="mb-0" style="color:rgba(255,255,255,0.65); font-size:16px; max-width:580px;">
                        Enroll today and give your child the gift of the Quran, authentic Deen, and lifelong Islamic
                        knowledge. Seats are limited — join our growing family of 1,500+ students.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end wow fadeInUp" data-wow-delay="0.3s">
                    <a href="{{ route('contact') }}" class="btn rounded-pill py-3 px-5 me-3 mb-3"
                        style="background:var(--gold);color:#fff;border:none;">Enroll Now</a>
                    <a href="{{ route('courses') }}" class="btn btn-outline-light rounded-pill py-3 px-5 mb-3">View
                        Courses</a>
                </div>
            </div>
        </div>
    </div>
    <!-- CTA Banner End -->

@endsection

@push('styles')
    <style>

        /* ── Page Header ─────────────────────────────────────────── */
        .page-header {
            background-image:
                linear-gradient(rgba(13, 27, 42, 0.80), rgba(13, 27, 42, 0.80)),
                    url('{{ asset("img/about-bg.jpg") }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: scroll;
            border-bottom: 3px solid var(--gold);
            min-height: 200px;
        }





        /* ── CTA Section ─────────────────────────────────────────── */
        .cta-section {
            background-image:
                linear-gradient(rgba(13, 27, 42, 0.88), rgba(13, 27, 42, 0.88)),
                url('{{ asset("img/about-bg.jpg") }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            /* scroll by default — mobile safe */
            background-attachment: scroll;
            border-top: 2px solid var(--gold);
            border-bottom: 2px solid var(--gold);
        }

    </style>
@endpush

@push('scripts')
    <script>
        // Skill bars animate on scroll
        var skillsDone = false;
        var skillObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting && !skillsDone) {
                    skillsDone = true;
                    setTimeout(function () {
                        document.querySelectorAll('.progress-bar').forEach(function (bar) {
                            bar.style.width = bar.getAttribute('aria-valuenow') + '%';
                            bar.style.transition = 'width 1.5s ease';
                        });
                    }, 200);
                }
            });
        }, { threshold: 0.3 });
        var featureSec = document.querySelector('.skill');
        if (featureSec) skillObs.observe(featureSec.closest('.container-xxl'));
    </script>
@endpush
