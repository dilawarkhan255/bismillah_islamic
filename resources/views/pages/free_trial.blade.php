@extends('layouts.app')

@section('title', 'Free Trial — Bismillah Islamic Academy')
@section('meta_description', 'Book 3 free Quran trial classes with a qualified teacher. No payment, no commitment. Flexible timings for students worldwide.')

@section('content')

    <x-page-hero
        :title="section('free-trial', 'hero_title', 'title', 'Book Your <span>FREE</span> Trial Today')"
        :tag="section('free-trial', 'hero_title', 'subtitle', '3 Free Classes — No Commitment')"
        :subtitle="section('free-trial', 'hero_title', 'description', 'Live one-on-one classes with a qualified teacher. No payment, no commitment.')"
        :image="setting('img_free_trial_hero') ? asset('storage/' . setting('img_free_trial_hero')) : asset('storage/trial.jpg')"
        :crumbs="['Free Trial' => null]"
    >
        <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin-bottom:24px;">
                @php
                    $ftBadgesRaw = section('free-trial', 'hero_badges', 'title', '100% Free,No Credit Card,No Commitment,Female Teachers Available');
                    $ftBadges = array_map('trim', explode(',', $ftBadgesRaw));
                @endphp
                @foreach($ftBadges as $badge)
                <span
                    style="display:inline-flex;align-items:center;gap:6px;background:rgba(174,130,37,.12);border:1px solid rgba(174,130,37,.3);color:var(--gold-light);font-family:'Lato',sans-serif;font-size:11px;font-weight:700;padding:6px 14px;"><i
                        class="fas fa-check-circle"></i> {{ $badge }}</span>
                @endforeach
            </div>
            <!-- Quick Contact Buttons -->
            <div style="display:flex;flex-wrap:wrap;gap:12px;justify-content:center;">
                <a class="hv-1" href="https://wa.me/923141833216?text=Assalamu+Alaikum,+I+want+to+book+a+free+trial" target="_blank">
                    <i class="fab fa-whatsapp" style="font-size:16px;"></i> Book via WhatsApp
                </a>
                <a class="hv-2" href="tel:+923141833216">
                    <i class="fas fa-phone-alt"></i> 🇵🇰 Call Pakistan
                </a>
                <a class="hv-3" href="tel:+447415770822">
                    <i class="fas fa-phone-alt"></i> 🇬🇧 Call UK
                </a>
            </div>
    </x-page-hero>



    <!-- ── HOW IT WORKS ──────────────────────────────── -->
    <section style="background:#fff;padding:60px 0;border-bottom:1px solid rgba(174,130,37,.1);">
        <div class="container">
            <div class="text-center mb-4">
                <span
                    style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:3px;text-transform:uppercase;color:var(--gold);display:block;margin-bottom:10px;">Simple
                    Process</span>
                <h2 style="font-family:'Cinzel',serif;color:var(--navy);font-size:clamp(20px,3vw,30px);font-weight:800;">How
                    It Works</h2>
                <div style="width:40px;height:2px;background:var(--gold);margin:12px auto 0;"></div>
            </div>
            <div class="row g-4 justify-content-center">
                @php
                    $ftSteps = [];
                    foreach(['step_1','step_2','step_3'] as $ftsk) {
                        $fts = \App\Models\Section::findCached('free-trial', $ftsk);
                        if($fts) $ftSteps[] = $fts;
                    }
                    if(empty($ftSteps)) {
                        $ftSteps = [
                            (object)['title'=>'Book Your Slot','description'=>'Send a WhatsApp message or fill the form below. We reply within 2 hours to confirm your trial time.','subtitle'=>'fab fa-whatsapp'],
                            (object)['title'=>'Attend 3 Free Classes','description'=>'Join live one-on-one sessions via Microsoft Teams. Your teacher assesses your level and guides you personally.','subtitle'=>'fas fa-laptop'],
                            (object)['title'=>'Choose a Plan','description'=>'After the trial, select Plan A, B or C based on your schedule. No pressure — completely your choice.','subtitle'=>'fas fa-graduation-cap'],
                        ];
                    }
                    $stepColors = ['#25D366', 'var(--gold)', 'var(--gold-light)'];
                    $stepNums = ['01','02','03'];
                @endphp
                @foreach($ftSteps as $si => $step)
                    <div class="col-lg-4 col-md-6">
                        <div class="hv-4">
                            <div
                                style="font-family:'Cinzel',serif;font-size:42px;font-weight:900;color:rgba(174,130,37,.07);position:absolute;top:12px;right:16px;line-height:1;">
                                {{ $stepNums[$si] }}</div>
                            <div style="font-size:2rem;color:{{ $stepColors[$si] }};margin-bottom:14px;display:block;"><i
                                    class="{{ $step->subtitle }}"></i></div>
                            <h5
                                style="font-family:'Cinzel',serif;color:var(--navy);font-size:14px;font-weight:700;margin-bottom:10px;">
                                {{ $step->title }}</h5>
                            <p style="color:#666;font-size:13px;line-height:1.8;margin:0;">{{ $step->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- ── ENROLLMENT FORM ───────────────────────────── -->
    <section style="background:#f8f6f0;padding:70px 0;" id="enroll-form">
        <div class="container">
            <div class="row g-5 align-items-start">

                <!-- Left: Contact Info -->
                @php $ftSidebar = \App\Models\Section::findCached('free-trial', 'sidebar_title'); @endphp
                <div class="col-lg-4">
                    <span
                        style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:3px;text-transform:uppercase;color:var(--gold);display:block;margin-bottom:10px;">Get
                        Started</span>
                    <h2
                        style="font-family:'Cinzel',serif;color:var(--navy);font-size:clamp(20px,3vw,30px);font-weight:800;margin-bottom:12px;">
                        {{ $ftSidebar->title ?? 'Book Your FREE Trial' }}</h2>
                    <div style="width:40px;height:2px;background:var(--gold);margin-bottom:20px;"></div>
                    <p style="color:#666;font-size:14px;line-height:1.9;margin-bottom:28px;">{{ $ftSidebar->description ?? 'Fill the form and we\'ll contact you within 2 hours to confirm your slot. Or reach us directly:' }}</p>

                    <div style="display:flex;flex-direction:column;gap:10px;">
                        @php
                            $ftWhatsappPk = \App\Models\Section::findCached('free-trial', 'whatsapp_pk');
                            $ftWhatsappUk = \App\Models\Section::findCached('free-trial', 'whatsapp_uk');
                            $ftEmail = \App\Models\Section::findCached('free-trial', 'email_contact');
                        @endphp
                        <a class="hv-5" href="{{ $ftWhatsappPk->button_url ?? 'https://wa.me/923141833216?text=Assalamu+Alaikum,+I+want+to+book+a+free+trial' }}"
                            target="_blank">
                            <div
                                style="width:40px;height:40px;flex-shrink:0;background:rgba(174,130,37,.1);border:1px solid rgba(174,130,37,.25);display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:18px;">
                                <i class="fab fa-whatsapp"></i></div>
                            <div>
                                <div
                                    style="font-size:10px;color:#999;text-transform:uppercase;letter-spacing:1px;font-family:'Lato',sans-serif;">
                                    {{ $ftWhatsappPk->title ?? 'WhatsApp — Pakistan' }}</div>
                                <div style="font-family:'Cinzel',serif;color:var(--navy);font-size:13px;font-weight:700;">
                                    {{ $ftWhatsappPk->description ?? '+92 314 1833216' }}</div>
                            </div>
                        </a>
                        <a class="hv-5" href="{{ $ftWhatsappUk->button_url ?? 'https://wa.me/447415770822?text=Assalamu+Alaikum,+I+want+to+book+a+free+trial' }}"
                            target="_blank">
                            <div
                                style="width:40px;height:40px;flex-shrink:0;background:rgba(174,130,37,.1);border:1px solid rgba(174,130,37,.25);display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:18px;">
                                <i class="fab fa-whatsapp"></i></div>
                            <div>
                                <div
                                    style="font-size:10px;color:#999;text-transform:uppercase;letter-spacing:1px;font-family:'Lato',sans-serif;">
                                    {{ $ftWhatsappUk->title ?? 'WhatsApp — United Kingdom' }}</div>
                                <div style="font-family:'Cinzel',serif;color:var(--navy);font-size:13px;font-weight:700;">
                                    {{ $ftWhatsappUk->description ?? '+44 7415 770822' }}</div>
                            </div>
                        </a>
                        <a class="hv-5" href="{{ $ftEmail->button_url ?? 'mailto:bismillahquranacademy2@gmail.com' }}">
                            <div
                                style="width:40px;height:40px;flex-shrink:0;background:rgba(174,130,37,.1);border:1px solid rgba(174,130,37,.25);display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:16px;">
                                <i class="fas fa-envelope"></i></div>
                            <div>
                                <div
                                    style="font-size:10px;color:#999;text-transform:uppercase;letter-spacing:1px;font-family:'Lato',sans-serif;">
                                    {{ $ftEmail->title ?? 'Email Us' }}</div>
                                <div
                                    style="font-family:'Lato',sans-serif;color:var(--navy);font-size:12px;font-weight:700;word-break:break-all;">
                                    {{ $ftEmail->description ?? 'bismillahquranacademy2@gmail.com' }}</div>
                            </div>
                        </a>
                    </div>

                    <!-- Class hours note -->
                    @php $ftHours = \App\Models\Section::findCached('free-trial', 'class_hours'); @endphp
                    <div
                        style="margin-top:20px;padding:14px 16px;background:#fff;border-left:3px solid var(--gold);border:1px solid rgba(174,130,37,.15);border-left-width:3px;">
                        <div
                            style="font-family:'Cinzel',serif;font-size:11px;color:var(--navy);font-weight:700;margin-bottom:6px;">
                            <i class="far fa-clock" style="color:var(--gold);margin-right:6px;"></i>{{ $ftHours->title ?? 'Class Hours' }}</div>
                        <div style="font-size:12px;color:#666;font-family:'Lato',sans-serif;line-height:1.7;">
                            @php
                                $hourLines = $ftHours ? explode(',', $ftHours->description) : ['🇵🇰 Pakistan: 6:00 PM – 3:00 AM','🇬🇧 UK: 2:00 PM – 11:00 PM'];
                            @endphp
                            @foreach($hourLines as $hl)
                                {{ $hl }}<br>
                            @endforeach
                            <span style="font-size:11px;color:#999;">{{ $ftHours->button_text ?? 'Monday – Saturday (Sunday Off)' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Form -->
                <div class="col-lg-8">
                    <div style="background:#fff;border:1px solid rgba(174,130,37,.15);border-top:3px solid var(--gold);">
                        <div
                            style="padding:20px 26px;background:linear-gradient(135deg,#0D1B2A,#18232F);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px;">
                            <h4 style="font-family:'Cinzel',serif;color:#fff;font-size:16px;margin:0;">Enrollment Form</h4>
                            <span style="color:rgba(255,255,255,.4);font-size:11px;font-family:'Lato',sans-serif;">Fields
                                marked * are required</span>
                        </div>
                        <form action="{{ route('free_trial.submit') }}" method="POST" style="padding:26px;">
                            @csrf
                            <x-honeypot />
                            @if ($errors->any())
                                <div style="background:#fdecec;border-left:3px solid #dc2626;color:#991b1b;padding:12px 16px;margin-bottom:18px;font-family:'Lato',sans-serif;font-size:13px;">
                                    <strong>Please fix the following:</strong>
                                    <ul style="margin:6px 0 0;padding-left:18px;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="ft-label">Parent / Guardian Name *</label>
                                    <input type="text" name="parent_name" value="{{ old('parent_name') }}" placeholder="Your full name" required class="ft-input">
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">Student Name *</label>
                                    <input type="text" name="student_name" value="{{ old('student_name') }}" placeholder="Student's full name (or yours if adult)" required class="ft-input">
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">Email Address *</label>
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="your@email.com" required class="ft-input">
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">WhatsApp Number *</label>
                                    <input type="tel" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="+92 or +44..." required class="ft-input">
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">Student Age *</label>
                                    <select name="age" required class="ft-input">
                                        <option value="" disabled selected>Select age</option>
                                        <option @selected(old('age') === '4 – 7 years')>4 – 7 years</option>
                                        <option @selected(old('age') === '8 – 12 years')>8 – 12 years</option>
                                        <option @selected(old('age') === '13 – 17 years')>13 – 17 years</option>
                                        <option @selected(old('age') === '18+ (Adult)')>18+ (Adult)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">Country *</label>
                                    <select name="country" required class="ft-input">
                                        <option value="" disabled selected>Select country</option>
                                        <option @selected(old('country') === 'Pakistan')>Pakistan</option>
                                        <option @selected(old('country') === 'United Kingdom')>United Kingdom</option>
                                        <option @selected(old('country') === 'USA')>USA</option>
                                        <option @selected(old('country') === 'Canada')>Canada</option>
                                        <option @selected(old('country') === 'Australia')>Australia</option>
                                        <option @selected(old('country') === 'UAE')>UAE</option>
                                        <option @selected(old('country') === 'Other')>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">Preferred Course *</label>
                                    <select name="course" required class="ft-input">
                                         <option value="" disabled selected>Select course</option>
                                         @foreach($courses as $course)
                                             <option @selected(old('course') === $course)>{{ $course }}</option>
                                         @endforeach
                                     </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">Preferred Timing *</label>
                                    <select name="timing" required class="ft-input" id="ftTiming">
                                        <option value="" disabled selected>Select time slot</option>
                                        <option @selected(old('timing') === 'Morning (6AM–12PM PKT)')>Morning (6AM–12PM PKT)</option>
                                        <option @selected(old('timing') === 'Afternoon (12PM–5PM PKT)')>Afternoon (12PM–5PM PKT)</option>
                                        <option @selected(old('timing') === 'Evening (5PM–11PM PKT)')>Evening (5PM–11PM PKT)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">Teacher Gender Preference</label>
                                    <select name="teacher_gender" class="ft-input">
                                        <option value="">No preference</option>
                                        <option @selected(old('teacher_gender') === 'Male Teacher')>Male Teacher</option>
                                        <option @selected(old('teacher_gender') === 'Female Teacher')>Female Teacher</option>
                                    </select>
                                </div>
                                @include('partials.trial-slots')
                                <div class="col-12">
                                    <label class="ft-label">Additional Message</label>
                                    <textarea name="message" rows="3" placeholder="Any questions or special requirements..."
                                        class="ft-input" style="resize:vertical;min-height:80px;">{{ old('message') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <button class="hv-6" type="submit">
                                        <i class="fas fa-paper-plane"></i> Book My FREE Trial Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection


@push('styles')
    <style>
        .ft-label {
            font-family: 'Lato', sans-serif;
            font-size: 11px;
            font-weight: 700;
            color: var(--navy);
            letter-spacing: .5px;
            text-transform: uppercase;
            display: block;
            margin-bottom: 6px;
        }

        .ft-input {
            border: 1px solid rgba(174, 130, 37, .2);
            padding: 11px 14px;
            font-family: 'Lato', sans-serif;
            font-size: 13px;
            color: var(--navy);
            background: #fff;
            outline: none;
            transition: border-color .3s;
            border-radius: 0;
            appearance: none;
            -webkit-appearance: none;
            width: 100%;
            display: block;
        }

        .ft-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(174, 130, 37, .08);
        }

        @media(max-width:575px) {
            .ft-input {
                padding: 10px 12px;
                font-size: 13px;
            }
        }
    </style>
@endpush
