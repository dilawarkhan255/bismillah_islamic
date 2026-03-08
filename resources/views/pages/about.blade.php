@extends('layouts.app')

@section('content')

@include('partials.topbar')
@include('partials.header')

<!-- ===================== PAGE HEADER ===================== -->
<div style="
    background: linear-gradient(135deg, #1a1208 0%, #2d1f05 50%, #1a1208 100%);
    position: relative;
    padding: 80px 0;
    margin-bottom: 60px;
    overflow: hidden;
">
    <!-- Islamic pattern overlay -->
    <div style="
        position: absolute; inset: 0; opacity: 0.06;
        background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Cpath d=%22M40 0L80 40L40 80L0 40Z%22 fill=%22none%22 stroke=%22%23C8A84B%22 stroke-width=%221%22/%3E%3Cpath d=%22M40 10L70 40L40 70L10 40Z%22 fill=%22none%22 stroke=%22%23C8A84B%22 stroke-width=%221%22/%3E%3C/svg%3E');
    "></div>
    <div style="position:absolute; inset:0; background: radial-gradient(ellipse at center, rgba(200,168,75,0.1) 0%, transparent 70%);"></div>

    <div class="container text-center" style="position:relative; z-index:2;">
        <div style="
            display:inline-block;
            font-family:'Amiri',serif;
            font-size:13px;
            color:var(--gold-light);
            letter-spacing:4px;
            text-transform:uppercase;
            margin-bottom:15px;
            padding: 6px 25px;
            border: 1px solid rgba(200,168,75,0.4);
        ">✦ Bismillah Islamic Academy ✦</div>
        <h1 style="
            font-family:'Cinzel',serif;
            font-size: clamp(32px, 5vw, 56px);
            font-weight:900;
            color:#ffffff;
            margin-bottom:20px;
        ">About Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0" style="background:transparent;">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" style="color:rgba(255,255,255,0.7); text-decoration:none; font-family:'Lato',sans-serif; font-size:13px;">Home</a>
                </li>
                <li class="breadcrumb-item active" style="color:var(--gold-light); font-family:'Lato',sans-serif; font-size:13px;" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- ===================== STATS / FACTS ===================== -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 animate-on-scroll">
                <div class="stat-item">
                    <i class="fa fa-certificate stat-icon"></i>
                    <div class="stat-number">10</div>
                    <div class="stat-label">Years Experience</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 animate-on-scroll" style="transition-delay:0.15s">
                <div class="stat-item">
                    <i class="fa fa-users-cog stat-icon"></i>
                    <div class="stat-number">25</div>
                    <div class="stat-label">Qualified Teachers</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 animate-on-scroll" style="transition-delay:0.3s">
                <div class="stat-item">
                    <i class="fa fa-users stat-icon"></i>
                    <div class="stat-number">1500</div>
                    <div class="stat-label">Satisfied Students</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 animate-on-scroll" style="transition-delay:0.45s">
                <div class="stat-item">
                    <i class="fa fa-check stat-icon"></i>
                    <div class="stat-number">500</div>
                    <div class="stat-label">Hafiz Graduates</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Stats End -->


<!-- ===================== ABOUT ===================== -->
<section class="about-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 animate-on-scroll">
                <div class="about-img-wrapper">
                    <img class="img-fluid" src="{{ asset('img/about.jpg') }}" alt="About Bismillah Islamic Academy">
                </div>
            </div>
            <div class="col-lg-6 animate-on-scroll" style="transition-delay:0.2s">
                <div class="section-label">About Us</div>
                <h2 class="section-title">#1 Islamic Academy With <span>10 Years</span> Of Excellence</h2>
                <div class="divider-gold" style="margin: 20px 0;"></div>
                <p style="color:var(--text-mid); line-height:1.9; margin-bottom:15px;">
                    Bismillah Islamic Academy was founded with a singular mission — to provide authentic, high-quality Islamic education rooted in the Quran and Sunnah. Over the past decade, we have guided thousands of students on the path of knowledge and righteousness.
                </p>
                <div class="about-quote-box">
                    <p>"Seek knowledge from the cradle to the grave." — Prophet Muhammad ﷺ</p>
                </div>
                <p style="color:var(--text-mid); line-height:1.9; margin-bottom:25px;">
                    Our comprehensive curriculum covers Quran recitation, Tajweed, Hifz, Islamic Studies, Arabic Language, Hadith and Seerah — designed for all age groups and taught by certified scholars and Huffaz.
                </p>
                <div class="founder-card">
                    <img src="{{ asset('img/team-1.jpg') }}" alt="Founder">
                    <div>
                        <h6>Sheikh Abdullah</h6>
                        <small>Founder & Principal</small>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="btn-gold mt-4 d-inline-block">Contact Us</a>
            </div>
        </div>
    </div>
</section>
<!-- About End -->


<!-- ===================== WHY CHOOSE US ===================== -->
<section class="why-section" style="background: var(--light-gray);">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 animate-on-scroll">
                <div class="section-label">Why Choose Us</div>
                <h2 class="section-title">Why Parents <span>Trust Us</span> For Their Children</h2>
                <div class="divider-gold" style="margin: 20px 0;"></div>
                <p style="color:var(--text-mid); line-height:1.9; margin-bottom:30px;">
                    Our academy combines traditional Islamic teaching methods with modern pedagogy. Every teacher is a qualified scholar committed to nurturing the next generation of Muslims with knowledge, character and love for the Deen.
                </p>
                <div class="row g-3">
                    <div class="col-12">
                        <div class="skill-bar">
                            <div class="skill-bar-header">
                                <span>Quran & Tajweed</span>
                                <span>95%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="95" style="width:0%; transition: width 1.5s ease;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="skill-bar">
                            <div class="skill-bar-header">
                                <span>Islamic Studies</span>
                                <span>90%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" style="width:0%; transition: width 1.5s ease 0.2s;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="skill-bar">
                            <div class="skill-bar-header">
                                <span>Arabic Language</span>
                                <span>85%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="85" style="width:0%; transition: width 1.5s ease 0.4s;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="skill-bar">
                            <div class="skill-bar-header">
                                <span>Hifz Program</span>
                                <span>88%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="88" style="width:0%; transition: width 1.5s ease 0.6s;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 animate-on-scroll" style="transition-delay:0.2s">
                <div class="about-img-wrapper">
                    <img class="img-fluid" src="{{ asset('img/feature.jpg') }}" alt="Why Choose Us">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why Choose Us End -->


<!-- ===================== TEAM ===================== -->
<section class="team-section">
    <div class="container">
        <div class="text-center mb-5 animate-on-scroll">
            <div class="section-label">Our Teachers</div>
            <h2 class="section-title">Meet Our <span>Qualified Scholars</span></h2>
            <div class="divider-gold"></div>
        </div>
        <div class="row g-4">
            @php
            $team = [
                ['name' => 'Sheikh Abdullah',  'role' => 'Principal & Quran Teacher',  'img' => 'team-1.jpg', 'delay' => '0s'],
                ['name' => 'Ustaz Ibrahim',     'role' => 'Tajweed Specialist',         'img' => 'team-2.jpg', 'delay' => '0.15s'],
                ['name' => 'Ustaza Fatima',     'role' => 'Islamic Studies Teacher',    'img' => 'team-3.jpg', 'delay' => '0.3s'],
            ];
            @endphp

            @foreach($team as $member)
            <div class="col-lg-4 col-md-6 animate-on-scroll" style="transition-delay:{{ $member['delay'] }}">
                <div class="team-card">
                    <div class="team-img-wrap">
                        <img src="{{ asset('img/' . $member['img']) }}" alt="{{ $member['name'] }}">
                    </div>
                    <h5>{{ $member['name'] }}</h5>
                    <span class="designation">{{ $member['role'] }}</span>
                    <div class="team-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Team End -->

@include('partials.footer')

@endsection

@push('scripts')
<script>
    // Animate skill bars when in view
    var skillsAnimated = false;
    var skillObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting && !skillsAnimated) {
                skillsAnimated = true;
                setTimeout(function() {
                    document.querySelectorAll('.progress-bar').forEach(function(bar) {
                        var val = bar.getAttribute('aria-valuenow');
                        bar.style.width = val + '%';
                    });
                }, 200);
            }
        });
    }, { threshold: 0.3 });

    var whySec = document.querySelector('.why-section');
    if (whySec) skillObserver.observe(whySec);
</script>
@endpush
