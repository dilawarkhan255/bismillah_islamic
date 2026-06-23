@extends('layouts.app')

@section('title', 'Our Teachers — Bismillah Islamic Academy')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center page-header-inner">
            <h1 class="display-4 text-white animated slideInDown mb-3">Our Teachers</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color:var(--gold-light);">Our Teachers</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width:600px;">
                <h6 class="section-title bg-white text-center pe-3" style="color:var(--gold);">Our Teachers</h6>
                <h1 class="display-6 mb-4">Meet Our <span style="color:var(--gold);">Qualified</span> & Dedicated Instructors</h1>
                <p style="color:var(--text-mid);">Our teachers are certified scholars and experienced educators committed to delivering authentic Islamic education with care and excellence.</p>
            </div>

            @php
                $teachers = [
                    ['name' => 'Mufti Aftab Ahmed Abbasi',     'img' => 'team-1.jpg'],
                    ['name' => 'Hafiz Kamran Qureshi',  'img' => 'team-2.jpg'],
                    ['name' => 'Allama Noor Ur Rehman',     'img' => 'team-3.jpg'],
                    ['name' => 'Ustaz Yusuf Ahmed',   'img' => 'team-4.jpg'],
                    ['name' => 'Sheikh Bilal Hassan', 'img' => 'team-5.jpg'],
                    ['name' => 'Maulana Asif', 'img' => 'team-6.jpg'],
                ];
            @endphp

            <div class="row g-4">
                @foreach($teachers as $i => $teacher)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $i * 0.1 }}s">
                        <div class="bia-team-card">
                            <div class="bia-team-bar"></div>
                            <div class="bia-team-img-wrap">
                                <img src="{{ asset('img/' . $teacher['img']) }}" alt="{{ $teacher['name'] }}" class="bia-team-img">
                                <div class="bia-team-ring"></div>
                            </div>
                            <div class="bia-team-body">
                                <h5 class="bia-team-name">{{ $teacher['name'] }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Team End -->


    <!-- CTA Banner Start -->
    <div class="container-fluid cta-section py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="row align-items-center g-5">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-6 text-white mb-3">
                        Learn From The <span style="color:var(--gold-light);">Best Scholars</span>
                    </h1>
                    <p class="mb-0" style="color:rgba(255,255,255,0.65); font-size:16px; max-width:580px;">
                        Enroll today and study under our qualified teachers — dedicated to guiding every student on the path of Quran and Sunnah.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end wow fadeInUp" data-wow-delay="0.3s">
                    <a href="{{ route('contact') }}" class="btn rounded-pill py-3 px-5 me-3 mb-3"
                        style="background:var(--gold);color:#fff;border:none;">Enroll Now</a>
                    <a href="{{ route('courses') }}" class="btn btn-outline-light rounded-pill py-3 px-5 mb-3">View Courses</a>
                </div>
            </div>
        </div>
    </div>
    <!-- CTA Banner End -->

@endsection


@push('styles')
    <style>
        /* ── Page Header ─────────────────────────────────── */
        .page-header {
            background-image:
                linear-gradient(rgba(13, 27, 42, 0.82), rgba(13, 27, 42, 0.82)),
                url("{{ asset("img/feature.jpg") }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center 40% !important;
            background-attachment: scroll !important;
            border-bottom: 3px solid var(--gold);

            /* ✅ flex — text bilkul center */
            min-height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
        }



        /* ── CTA ─────────────────────────────────────────── */
        .cta-section {
            background-image:
                linear-gradient(rgba(13, 27, 42, 0.90), rgba(13, 27, 42, 0.90)),
                url("{{ asset("img/feature.jpg") }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: scroll;
            border-top: 2px solid var(--gold);
            border-bottom: 2px solid var(--gold);
        }

        @media (min-width: 992px) {
            .cta-section {
                background-attachment: fixed;
                background-position: center center;
            }
        }

        .cta-section .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.35);
            color: #fff;
            transition: all .3s;
        }

        .cta-section .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--gold-light);
            color: var(--gold-light);
        }
    </style>
@endpush
