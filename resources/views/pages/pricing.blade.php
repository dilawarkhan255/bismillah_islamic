@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}?v={{ @filemtime(public_path('css/pricing.css')) }}">
@endpush

@section('title', 'Pricing — Bismillah Islamic Academy')
@section('meta_description', 'Simple monthly fee plans for online Quran and Islamic Studies classes. Choose classes per week that suit your family.')

@section('content')

    <x-page-hero
        :title="section('pricing', 'hero_title', 'title', 'Choose Your <span>Learning Plan</span>')"
        :tag="'Transparent Pricing'"
        :subtitle="section('pricing', 'hero_title', 'description', 'All plans are 30-minute live one-on-one sessions via Microsoft Teams. Every plan includes a 3-day free trial.')"
        :image="setting('img_pricing_hero') ? asset('storage/' . setting('img_pricing_hero')) : asset('storage/how-to-learn.jpg')"
        :crumbs="['Pricing' => null]"
    >
        <!-- 4 trust badges -->
            @php
                $pricingBadgesRaw = section('pricing', 'trust_badges', 'title', '3-Day Free Trial,One-on-One Classes,Female Teachers Available,Cancel Anytime');
                $pricingBadges = array_map('trim', explode(',', $pricingBadgesRaw));
            @endphp
            <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;">
                @foreach($pricingBadges as $badge)
                    <span style="display:inline-flex;align-items:center;gap:7px;background:rgba(174,130,37,.1);border:1px solid rgba(174,130,37,.28);color:#D4A843;font-family:'Inter',sans-serif;font-size:11px;font-weight:700;padding:7px 16px;letter-spacing:.5px;">
                        <i class="fas fa-check" style="font-size:9px;"></i>{{ $badge }}
                    </span>
                @endforeach
            </div>
    </x-page-hero>



    <!-- ── PLANS ──────────────────────────────────────── -->
    <section style="background:var(--light-bg);padding:80px 0 70px;">
        <div class="container">
            @php $planWa = preg_replace('/\D+/', '', (string) setting('whatsapp_float', '923141833216')); @endphp
            <div class="row g-4 justify-content-center align-items-stretch pl-row">
                @foreach($plans as $plan)
                    @php
                        $allCourses = strcasecmp((string) $plan->courses_count, 'all') === 0;
                        $waText = rawurlencode('Assalamu Alaikum, I am interested in the ' . $plan->name . ' plan (' . $plan->days_per_week . ' days a week).');
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="pl-card {{ $plan->is_popular ? 'pl-card--featured' : '' }}">
                            @if($plan->is_popular)
                                <span class="pl-ribbon"><i class="fas fa-star"></i> Most Popular</span>
                            @endif

                            <div class="pl-head">
                                <span class="pl-mark">{{ mb_strtoupper(mb_substr($plan->name, 0, 1)) }}</span>
                                <div>
                                    <h3 class="pl-name">{{ $plan->name }}</h3>
                                    <p class="pl-sub">{{ $plan->days_per_week }} days a week</p>
                                </div>
                                @if($plan->badge && ! $plan->is_popular)
                                    <span class="pl-tag">{{ $plan->badge }}</span>
                                @endif
                            </div>

                            <div class="pl-days" aria-label="{{ $plan->days_per_week }} class days a week">
                                @foreach(['M', 'T', 'W', 'T', 'F', 'S'] as $i => $day)
                                    <span class="{{ $i < $plan->days_per_week ? 'on' : '' }}">{{ $day }}</span>
                                @endforeach
                            </div>

                            <div class="pl-stats">
                                <div><strong>{{ $plan->classes_per_month }}</strong><span>classes<br>a month</span></div>
                                <div><strong>30</strong><span>minutes<br>per class</span></div>
                                <div><strong>{{ $allCourses ? 'All' : $plan->courses_count }}</strong><span>{{ $allCourses || (int) $plan->courses_count !== 1 ? 'courses' : 'course' }}<br>included</span></div>
                            </div>

                            <ul class="pl-features">
                                @foreach($plan->features as $f)
                                    <li><i class="fas fa-check"></i><span>{{ $f }}</span></li>
                                @endforeach
                                @if($plan->certificate)
                                    <li class="pl-cert"><i class="fas fa-award"></i><span>Completion certificate included</span></li>
                                @endif
                            </ul>

                            <div class="pl-cta">
                                <a href="{{ route('free_trial') }}" class="pl-btn {{ $plan->is_popular ? 'pl-btn--gold' : '' }}">
                                    Start Free Trial <i class="fas fa-arrow-right"></i>
                                </a>
                                <a href="https://wa.me/{{ $planWa }}?text={{ $waText }}" target="_blank" rel="noopener" class="pl-wa">
                                    <i class="fab fa-whatsapp"></i> Ask about this plan
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <p class="text-center mt-4" style="font-family:'Inter',sans-serif;font-size:13px;color:#aaa;">
                <i class="fas fa-info-circle" style="color:#AE8225;"></i>
                &nbsp;{{ section('pricing', 'bottom_note', 'title', 'Fees are discussed and confirmed via WhatsApp after your free trial. No upfront payment.') }}
            </p>
        </div>
    </section>


    <!-- ── COMPARISON TABLE ──────────────────────────── -->
    <section style="background:#0D1B2A;padding:72px 0;border-top:2px solid #AE8225;border-bottom:2px solid #AE8225;">
        <div class="container">
            <div class="text-center mb-5">
                <span style="font-family:'Inter',sans-serif;font-size:9px;letter-spacing:4px;text-transform:uppercase;color:#AE8225;display:block;margin-bottom:12px;">{{ section('pricing', 'compare_title', 'description', 'Side by Side') }}</span>
                <h2 style="font-family:'Inter',sans-serif;color:#fff;font-size:clamp(20px,3vw,34px);font-weight:800;">{{ section('pricing', 'compare_title', 'title', 'Full Plan Comparison') }}</h2>
                <div style="width:40px;height:2px;background:linear-gradient(90deg,#AE8225,#D4A843);margin:14px auto 0;"></div>
            </div>
            <div style="overflow-x:auto;">
                <table class="bia-table">
                    <thead>
                        <tr>
                            <th class="bia-th-feat">Feature</th>
                            <th>Plan A<br><small>Starter</small></th>
                            <th class="bia-th-b">Plan B ✦<br><small>Most Popular</small></th>
                            <th>Plan C<br><small>Premium</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $compareRaw = section('pricing', 'compare_rows', 'title', 'Days per Week|3 days|5 days|6 days,Class Duration|30 min|30 min|30 min,Classes per Month|12|20|24,Courses|1|2|All,Progress Report|Monthly|Weekly|Weekly,Parent-Teacher Call||Monthly|Weekly,Certificate||✓|✓,Makeup Classes|✓|✓|Priority,Female Teacher|✓|✓|✓,WhatsApp Support|✓|✓|Dedicated,Free Trial|✓|✓|✓');
                            $rows = [];
                            foreach(explode(',', $compareRaw) as $row) {
                                $cols = array_map('trim', explode('|', $row));
                                if(count($cols) >= 4) {
                                    // convert string booleans
                                    for($c = 1; $c <= 3; $c++) {
                                        if($cols[$c] === '✓') $cols[$c] = true;
                                        elseif($cols[$c] === '' || $cols[$c] === 'false') $cols[$c] = false;
                                    }
                                    $rows[] = $cols;
                                }
                            }
                            if(empty($rows)) {
                                $rows = [
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
                                ];
                            }
                        @endphp
                        @foreach($rows as $row)
                            <tr>
                                <td class="bia-td-lbl">{{ $row[0] }}</td>
                                @for($c = 1; $c <= 3; $c++)
                                    <td class="{{ $c === 2 ? 'bia-td-b' : '' }}">
                                        @if($row[$c] === true)<i class="fas fa-check" style="color:#4caf50;font-size:13px;"></i>
                                        @elseif($row[$c] === false)<i class="fas fa-times" style="color:rgba(255,255,255,.15);font-size:12px;"></i>
                                        @else<span style="font-family:'Inter',sans-serif;font-size:13px;color:#D4A843;font-weight:600;">{{ $row[$c] }}</span>
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
                <span style="font-family:'Inter',sans-serif;font-size:9px;letter-spacing:4px;text-transform:uppercase;color:#AE8225;display:block;margin-bottom:12px;">{{ section('pricing', 'courses_title', 'description', 'What We Teach') }}</span>
                <h2 style="font-family:'Inter',sans-serif;color:#0D1B2A;font-size:clamp(20px,3vw,34px);font-weight:800;">{{ section('pricing', 'courses_title', 'title', 'All Available Courses') }}</h2>
                <div style="width:40px;height:2px;background:linear-gradient(90deg,#AE8225,#D4A843);margin:14px auto 0;"></div>
            </div>
            <div class="row g-3">
                @php
                    $coursesRaw = section('pricing', 'courses_list', 'title', 'fa-book|Norani Qaida|For complete beginners & young children,fa-quran|Quran Recitation (Nazra)|Learn to read the Holy Quran correctly,fa-microphone|Tajweed ul Quran|Rules of beautiful Quranic recitation,fa-star|Hifz ul Quran|Complete Quran memorisation programme,fa-mosque|Islamic Studies|Aqeedah, Fiqh, Seerah & Islamic manners,fa-language|Arabic Language|Classical Arabic to understand the Quran,fa-scroll|Hadith & Seerah|40 Hadith Nawawi & Prophet\'s ﷺ life,fa-hands|Namaz & Ibadat|Correct method of Salah & worship');
                    $courses = [];
                    foreach(explode(',', $coursesRaw) as $c) {
                        $parts = array_map('trim', explode('|', $c));
                        if(count($parts) >= 3) $courses[] = $parts;
                    }
                @endphp
                @foreach($courses as $c)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bia-course-item">
                            <div class="bia-course-icon"><i class="fas {{ $c[0] }}"></i></div>
                            <div>
                                <div style="font-family:'Inter',sans-serif;color:#0D1B2A;font-size:12px;font-weight:700;margin-bottom:3px;">{{ $c[1] }}</div>
                                <div style="font-family:'Inter',sans-serif;color:#999;font-size:11px;line-height:1.5;">{{ $c[2] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="text-center mt-4" style="font-family:'Inter',sans-serif;font-size:13px;color:#aaa;">
                Plan A = 1 course &nbsp;·&nbsp; Plan B = 2 courses &nbsp;·&nbsp; Plan C = all courses
            </p>
        </div>
    </section>


    <!-- ── BOTTOM CTA ────────────────────────────────── -->
    <section style="background:#0D1B2A;padding:72px 0;border-top:2px solid #AE8225;position:relative;overflow:hidden;">
        <div style="position:absolute;inset:0;opacity:.035;background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2264%22 height=%2264%22%3E%3Cpath d=%22M32 4L60 32L32 60L4 32Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');"></div>
        <div class="container text-center" style="position:relative;z-index:2;">
            <div style="font-family:'Amiri',serif;font-size:18px;color:rgba(174,130,37,.6);margin-bottom:14px;">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
            <h2 style="font-family:'Inter',sans-serif;color:#fff;font-size:clamp(22px,3.5vw,40px);font-weight:900;margin-bottom:12px;">
                {!! section('pricing', 'cta', 'title', 'Try 3 Classes <span style="color:#D4A843;">Completely Free</span>') !!}
            </h2>
            <p style="font-family:'Inter',sans-serif;color:rgba(255,255,255,.5);font-size:15px;max-width:440px;margin:0 auto 30px;line-height:1.85;">{{ section('pricing', 'cta', 'description', 'No payment. No commitment. Just 3 live classes with a certified teacher.') }}</p>
            <div style="display:flex;flex-wrap:wrap;gap:12px;justify-content:center;">
                <a class="hv-10" href="{{ section('pricing', 'cta', 'button_url', '/free-trial') }}">
                    <i class="fas fa-play-circle"></i> {{ section('pricing', 'cta', 'button_text', 'Book Free Trial') }}
                </a>
                <a class="hv-11" href="https://wa.me/923141833216?text=Assalamu+Alaikum,+I+want+to+know+more+about+pricing" target="_blank">
                    <i class="fab fa-whatsapp" style="font-size:15px;"></i> Ask on WhatsApp
                </a>
            </div>
        </div>
    </section>

@endsection


@push('styles')

@endpush
