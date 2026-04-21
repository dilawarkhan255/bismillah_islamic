@extends('layouts.app')

@section('title', 'Pricing — Bismillah Islamic Academy')

@section('content')

    <!-- ── HERO ──────────────────────────────────────── -->
    <section style="background:linear-gradient(160deg,#0A1520 0%,#0D1B2A 55%,#101F2E 100%);padding:88px 0 72px;border-bottom:2px solid #AE8225;position:relative;overflow:hidden;">
        <div style="position:absolute;inset:0;opacity:.035;background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2264%22 height=%2264%22%3E%3Cpath d=%22M32 4L60 32L32 60L4 32Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');"></div>
        <div style="position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,transparent,#AE8225 30%,#D4A843 50%,#AE8225 70%,transparent);"></div>
        <div class="container text-center" style="position:relative;z-index:2;">
            <div style="font-family:'Amiri',serif;font-size:20px;color:rgba(174,130,37,.65);letter-spacing:3px;margin-bottom:16px;">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
            <div style="display:inline-block;font-family:'Cinzel',serif;font-size:9px;color:#D4A843;letter-spacing:5px;text-transform:uppercase;padding:7px 22px;border:1px solid rgba(174,130,37,.4);margin-bottom:22px;">✦ Transparent Pricing ✦</div>
            <h1 style="font-family:'Cinzel',serif;color:#fff;font-size:clamp(28px,4.5vw,54px);font-weight:900;line-height:1.1;margin-bottom:16px;">
                Choose Your <span style="color:#D4A843;">Learning Plan</span>
            </h1>
            <p style="color:rgba(255,255,255,.5);font-family:'Lato',sans-serif;font-size:15px;max-width:480px;margin:0 auto 30px;line-height:1.85;">
                All plans are <strong style="color:rgba(255,255,255,.75);">30-minute</strong> live one-on-one sessions via Microsoft Teams. Every plan includes a <strong style="color:#D4A843;">3-day free trial</strong>.
            </p>
            <!-- 4 trust badges -->
            <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;">
                @foreach(['3-Day Free Trial', 'One-on-One Classes', 'Female Teachers Available', 'Cancel Anytime'] as $badge)
                    <span style="display:inline-flex;align-items:center;gap:7px;background:rgba(174,130,37,.1);border:1px solid rgba(174,130,37,.28);color:#D4A843;font-family:'Lato',sans-serif;font-size:11px;font-weight:700;padding:7px 16px;letter-spacing:.5px;">
                        <i class="fas fa-check" style="font-size:9px;"></i>{{ $badge }}
                    </span>
                @endforeach
            </div>
        </div>
    </section>


    <!-- ── PLANS ──────────────────────────────────────── -->
    <section style="background:#f5f3ed;padding:80px 0 70px;">
        <div class="container">
            <div class="row g-0 justify-content-center align-items-stretch bia-plan-row">

                @php
                    $plans = [
                        [
                            'letter' => 'A',
                            'name' => 'Starter',
                            'tagline' => 'Great for beginners',
                            'popular' => false,
                            'accent' => '#5B8DB8',
                            'days' => 3,
                            'label' => '3 Days / Week',
                            'classes' => '12 classes / month',
                            'courses' => '1 course',
                            'report' => 'Monthly report',
                            'cert' => false,
                            'features' => [
                                'Any 1 course of your choice',
                                '30-min live one-on-one class',
                                'Qualified Quran teacher',
                                'Makeup class available',
                                'Female teacher on request',
                                'WhatsApp teacher contact',
                            ],
                        ],
                        [
                            'letter' => 'B',
                            'name' => 'Standard',
                            'tagline' => 'Most popular choice',
                            'popular' => true,
                            'accent' => '#AE8225',
                            'days' => 5,
                            'label' => '5 Days / Week',
                            'classes' => '20 classes / month',
                            'courses' => '2 courses',
                            'report' => 'Weekly report',
                            'cert' => true,
                            'features' => [
                                'Any 2 courses of your choice',
                                '30-min live one-on-one class',
                                'Dedicated Quran teacher',
                                'Weekly progress report',
                                'Completion certificate',
                                'Makeup class available',
                                'Female teacher on request',
                                'Monthly parent-teacher call',
                            ],
                        ],
                        [
                            'letter' => 'C',
                            'name' => 'Premium',
                            'tagline' => 'Full Islamic curriculum',
                            'popular' => false,
                            'accent' => '#7B5EA7',
                            'days' => 6,
                            'label' => '6 Days / Week',
                            'classes' => '24 classes / month',
                            'courses' => 'All courses',
                            'report' => 'Weekly + parent call',
                            'cert' => true,
                            'features' => [
                                'Access to ALL courses',
                                '30-min live one-on-one class',
                                'Senior certified scholar',
                                'Weekly report + parent call',
                                'Completion certificate',
                                'Priority makeup classes',
                                'Female teacher on request',
                                'Dedicated WhatsApp support',
                            ],
                        ],
                    ];
                @endphp

                @foreach($plans as $idx => $plan)
                    <div class="col-lg-4 col-md-6 {{ $plan['popular'] ? 'bia-col-popular' : '' }}">
                        <div class="bia-plan {{ $plan['popular'] ? 'bia-plan-featured' : '' }}" style="--accent:{{ $plan['accent'] }};">

                            @if($plan['popular'])
                                <div class="bia-pop-badge">⭐ Most Popular</div>
                            @endif

                            <!-- Top: Letter + Name -->
                            <div class="bia-plan-top">
                                <div class="bia-plan-letter" style="color:{{ $plan['accent'] }};">{{ $plan['letter'] }}</div>
                                <div>
                                    <div class="bia-plan-name">Plan {{ $plan['letter'] }} — {{ $plan['name'] }}</div>
                                    <div class="bia-plan-tagline">{{ $plan['tagline'] }}</div>
                                </div>
                            </div>

                            <!-- Day dots visual -->
                            <div class="bia-days-row">
                                @for($d = 1; $d <= 6; $d++)
                                    <div class="bia-day-dot {{ $d <= $plan['days'] ? 'active' : '' }}" style="{{ $d <= $plan['days'] ? 'background:' . $plan['accent'] . ';' : '' }}">
                                        {{ ['M', 'T', 'W', 'T', 'F', 'S'][$d - 1] }}
                                    </div>
                                @endfor
                            </div>

                            <!-- Key stats strip -->
                            <div class="bia-stats-strip">
                                <div class="bia-stat">
                                    <span class="bia-stat-val">{{ $plan['classes'] }}</span>
                                    <span class="bia-stat-lbl">Classes</span>
                                </div>
                                <div class="bia-stat-divider"></div>
                                <div class="bia-stat">
                                    <span class="bia-stat-val">30 min</span>
                                    <span class="bia-stat-lbl">Per class</span>
                                </div>
                                <div class="bia-stat-divider"></div>
                                <div class="bia-stat">
                                    <span class="bia-stat-val">{{ $plan['courses'] }}</span>
                                    <span class="bia-stat-lbl">Available</span>
                                </div>
                            </div>

                            <!-- Features -->
                            <div class="bia-features">
                                @foreach($plan['features'] as $f)
                                    <div class="bia-feat">
                                        <i class="fas fa-check" style="color:{{ $plan['accent'] }};font-size:10px;margin-top:3px;flex-shrink:0;"></i>
                                        <span>{{ $f }}</span>
                                    </div>
                                @endforeach
                                @if($plan['cert'])
                                    <div class="bia-feat bia-feat-cert" style="border-left:2px solid {{ $plan['accent'] }};">
                                        <i class="fas fa-certificate" style="color:{{ $plan['accent'] }};font-size:10px;margin-top:3px;flex-shrink:0;"></i>
                                        <span style="font-weight:700;">Completion Certificate Included</span>
                                    </div>
                                @endif
                            </div>

                            <!-- CTA -->
                            <div class="bia-plan-cta">
                                <a href="{{ route('free_trial') }}" class="bia-cta-primary {{ $plan['popular'] ? 'bia-cta-gold' : '' }}" style="{{ !$plan['popular'] ? 'border-color:' . $plan['accent'] . ';color:' . $plan['accent'] . ';' : '' }}">
                                    Start Free Trial <i class="fas fa-arrow-right" style="font-size:10px;margin-left:6px;"></i>
                                </a>
                                <a href="https://wa.me/923141833216?text=Assalamu+Alaikum,+I+am+interested+in+free+trial+classes" target="_blank" class="bia-cta-wa">
                                    <i class="fab fa-whatsapp"></i> Ask on WhatsApp
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

            <p class="text-center mt-4" style="font-family:'Lato',sans-serif;font-size:13px;color:#aaa;">
                <i class="fas fa-info-circle" style="color:#AE8225;"></i>
                &nbsp;Fees are discussed and confirmed via WhatsApp after your free trial. No upfront payment.
            </p>
        </div>
    </section>


    <!-- ── COMPARISON TABLE ──────────────────────────── -->
    <section style="background:#0D1B2A;padding:72px 0;border-top:2px solid #AE8225;border-bottom:2px solid #AE8225;">
        <div class="container">
            <div class="text-center mb-5">
                <span style="font-family:'Cinzel',serif;font-size:9px;letter-spacing:4px;text-transform:uppercase;color:#AE8225;display:block;margin-bottom:12px;">Side by Side</span>
                <h2 style="font-family:'Cinzel',serif;color:#fff;font-size:clamp(20px,3vw,34px);font-weight:800;">Full Plan Comparison</h2>
                <div style="width:40px;height:2px;background:linear-gradient(90deg,#AE8225,#D4A843);margin:14px auto 0;"></div>
            </div>
            <div style="overflow-x:auto;">
                <table class="bia-table">
                    <thead>
                        <tr>
                            <th class="bia-th-feat">Feature</th>
                            <th>Plan A<br><small>Starter</small></th>
                            <th class="bia-th-b">Plan B ⭐<br><small>Standard</small></th>
                            <th>Plan C<br><small>Premium</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $rows = [
                            ['Days per Week', '3 days', '5 days', '6 days'],
                            ['Class Duration', '30 min', '30 min', '30 min'],
                            ['Classes per Month', '12', '20', '24'],
                            ['Courses', '1', '2', 'All'],
                            ['Progress Report', 'Monthly', 'Weekly', 'Weekly'],
                            ['Parent-Teacher Call', false, 'Monthly', 'Weekly'],
                            ['Certificate', false, true, true],
                            ['Makeup Classes', true, true, 'Priority'],
                            ['Female Teacher', true, true, true],
                            ['WhatsApp Support', true, true, 'Dedicated'],
                            ['Free Trial', true, true, true],
                        ]; @endphp
                        @foreach($rows as $row)
                            <tr>
                                <td class="bia-td-lbl">{{ $row[0] }}</td>
                                @for($c = 1; $c <= 3; $c++)
                                    <td class="{{ $c === 2 ? 'bia-td-b' : '' }}">
                                        @if($row[$c] === true)<i class="fas fa-check" style="color:#4caf50;font-size:13px;"></i>
                                        @elseif($row[$c] === false)<i class="fas fa-times" style="color:rgba(255,255,255,.15);font-size:12px;"></i>
                                        @else<span style="font-family:'Lato',sans-serif;font-size:13px;color:#D4A843;font-weight:600;">{{ $row[$c] }}</span>
                                        @endif
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <!-- ── COURSES ─────────────────────────────────────── -->
    <section style="background:#fff;padding:72px 0;">
        <div class="container">
            <div class="text-center mb-5">
                <span style="font-family:'Cinzel',serif;font-size:9px;letter-spacing:4px;text-transform:uppercase;color:#AE8225;display:block;margin-bottom:12px;">What We Teach</span>
                <h2 style="font-family:'Cinzel',serif;color:#0D1B2A;font-size:clamp(20px,3vw,34px);font-weight:800;">All Available Courses</h2>
                <div style="width:40px;height:2px;background:linear-gradient(90deg,#AE8225,#D4A843);margin:14px auto 0;"></div>
            </div>
            <div class="row g-3">
                @php $courses = [
                    ['fa-book', 'Norani Qaida', 'For complete beginners & young children'],
                    ['fa-quran', 'Quran Recitation (Nazra)', 'Learn to read the Holy Quran correctly'],
                    ['fa-microphone', 'Tajweed ul Quran', 'Rules of beautiful Quranic recitation'],
                    ['fa-star', 'Hifz ul Quran', 'Complete Quran memorisation programme'],
                    ['fa-mosque', 'Islamic Studies', 'Aqeedah, Fiqh, Seerah & Islamic manners'],
                    ['fa-language', 'Arabic Language', 'Classical Arabic to understand the Quran'],
                    ['fa-scroll', 'Hadith & Seerah', "40 Hadith Nawawi & Prophet's ﷺ life"],
                    ['fa-hands', 'Namaz & Ibadat', 'Correct method of Salah & worship'],
                ]; @endphp
                @foreach($courses as $c)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bia-course-item">
                            <div class="bia-course-icon"><i class="fas {{ $c[0] }}"></i></div>
                            <div>
                                <div style="font-family:'Cinzel',serif;color:#0D1B2A;font-size:12px;font-weight:700;margin-bottom:3px;">{{ $c[1] }}</div>
                                <div style="font-family:'Lato',sans-serif;color:#999;font-size:11px;line-height:1.5;">{{ $c[2] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="text-center mt-4" style="font-family:'Lato',sans-serif;font-size:13px;color:#aaa;">
                Plan A = 1 course &nbsp;·&nbsp; Plan B = 2 courses &nbsp;·&nbsp; Plan C = all courses
            </p>
        </div>
    </section>


    <!-- ── BOTTOM CTA ────────────────────────────────── -->
    <section style="background:#0D1B2A;padding:72px 0;border-top:2px solid #AE8225;position:relative;overflow:hidden;">
        <div style="position:absolute;inset:0;opacity:.035;background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2264%22 height=%2264%22%3E%3Cpath d=%22M32 4L60 32L32 60L4 32Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');"></div>
        <div class="container text-center" style="position:relative;z-index:2;">
            <div style="font-family:'Amiri',serif;font-size:18px;color:rgba(174,130,37,.6);margin-bottom:14px;">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
            <h2 style="font-family:'Cinzel',serif;color:#fff;font-size:clamp(22px,3.5vw,40px);font-weight:900;margin-bottom:12px;">
                Try 3 Classes <span style="color:#D4A843;">Completely Free</span>
            </h2>
            <p style="font-family:'Lato',sans-serif;color:rgba(255,255,255,.5);font-size:15px;max-width:440px;margin:0 auto 30px;line-height:1.85;">No payment. No commitment. Just 3 live classes with a certified teacher.</p>
            <div style="display:flex;flex-wrap:wrap;gap:12px;justify-content:center;">
                <a href="{{ route('free_trial') }}" style="display:inline-flex;align-items:center;gap:10px;background:#AE8225;color:#fff;font-family:'Cinzel',serif;font-weight:700;font-size:11px;letter-spacing:2px;text-transform:uppercase;padding:15px 36px;border:2px solid #AE8225;text-decoration:none;transition:all .3s;" onmouseover="this.style.background='transparent';this.style.color='#AE8225';" onmouseout="this.style.background='#AE8225';this.style.color='#fff';">
                    <i class="fas fa-play-circle"></i> Book Free Trial
                </a>
                <a href="https://wa.me/923141833216?text=Assalamu+Alaikum,+I+want+to+know+more+about+pricing" target="_blank" style="display:inline-flex;align-items:center;gap:10px;background:#25D366;color:#fff;font-family:'Cinzel',serif;font-weight:700;font-size:11px;letter-spacing:2px;text-transform:uppercase;padding:15px 32px;border:2px solid #25D366;text-decoration:none;transition:all .3s;" onmouseover="this.style.background='transparent';this.style.color='#25D366';" onmouseout="this.style.background='#25D366';this.style.color='#fff';">
                    <i class="fab fa-whatsapp" style="font-size:15px;"></i> Ask on WhatsApp
                </a>
            </div>
        </div>
    </section>

@endsection


@push('styles')

@endpush
