@extends('layouts.app')

@section('title', 'Contact Us — Bismillah Islamic Academy')

@section('content')




    {{-- ═══════════════════════════════════════════════════
    INFO CARDS — original style
    ═══════════════════════════════════════════════════ --}}
    <section class="c-info-section">
        <div class="container">
            <div class="row g-4">

                @php
                    $cards = [
                        [
                            'icon' => 'fa-map-marker-alt',
                            'title' => 'Our Location',
                            'lines' => ['JWFX+4HV, Jhangi Sayedan, Islamabad, Pakistan'],
                            'gold' => false,
                        ],
                        [
                            'icon' => 'fa-phone-alt',
                            'title' => 'Call Us',
                            'lines' => ['+92 314 1833216', 'Mon – Sat, 6:00 PM – 4:00 AM'],
                            'gold' => false,
                        ],
                        [
                            'icon' => 'fa-envelope',
                            'title' => 'Email Us',
                            'lines' => ['bismillahquranacademy2@gmail.com'],
                            'gold' => false,
                        ],
                    ];
                @endphp

                @foreach($cards as $ci => $card)
                    <div class="col-lg-4 col-md-6 cc-sr" data-dir="up" style="transition-delay:{{ $ci * 0.1 }}s;">
                        <div class="c-info-card {{ $card['gold'] ? 'c-info-card--gold' : '' }}">
                            <div class="c-info-icon">
                                <i class="fas {{ $card['icon'] }}"></i>
                            </div>
                            <h5 class="c-info-title">{{ $card['title'] }}</h5>
                            @foreach($card['lines'] as $line)
                                <p class="c-info-line">{{ $line }}</p>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════════
    FORM + SIDEBAR
    ═══════════════════════════════════════════════════ --}}
    <section class="cc-main-section">
        <div class="container">
            <div class="row g-5">

                {{-- Contact Form --}}
                <div class="col-lg-7 cc-sr" data-dir="left">
                    <div class="cc-form-wrap">
                        <div class="cc-form-header">
                            <span class="cc-eyebrow">Send A Message</span>
                            <h2 class="cc-form-title">Have a <span>Question?</span></h2>
                            <p class="cc-form-sub">Fill in the form below and our team will respond within 24 hours, In sha
                                Allah.</p>
                            <div class="cc-form-divider"></div>
                        </div>

                        <form action="#" method="POST" class="cc-form">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="cc-field">
                                        <label>Your Name <span>*</span></label>
                                        <input type="text" name="name" placeholder="e.g. Abdullah Khan" required>
                                        <div class="cc-field-line"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cc-field">
                                        <label>Email Address <span>*</span></label>
                                        <input type="email" name="email" placeholder="you@example.com" required>
                                        <div class="cc-field-line"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cc-field">
                                        <label>Phone Number</label>
                                        <input type="tel" name="phone" placeholder="+92 300 0000000">
                                        <div class="cc-field-line"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cc-field cc-field--select">
                                        <label>Inquiry About <span>*</span></label>
                                        <select name="inquiry" required>
                                            <option value="" disabled selected>Select a course…</option>
                                            <option>Norani Qaida</option>
                                            <option>Quran Recitation / Nazra</option>
                                            <option>Tajweed ul Quran</option>
                                            <option>Hifz ul Quran</option>
                                            <option>Islamic Studies</option>
                                            <option>Arabic Language</option>
                                            <option>Hadith &amp; Seerah</option>
                                            <option>General Inquiry</option>
                                        </select>
                                        <i class="fas fa-chevron-down cc-select-arrow"></i>
                                        <div class="cc-field-line"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="cc-field">
                                        <label>Your Message <span>*</span></label>
                                        <textarea name="message" rows="5" placeholder="Write your message here…"
                                            required></textarea>
                                        <div class="cc-field-line"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="cc-submit-btn">
                                        <span>Send Message</span>
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="col-lg-5 cc-sr" data-dir="right">

                    {{-- Class Hours --}}
                    <div class="cc-sidebar-box cc-sidebar-box--light" style="margin-bottom:24px;">
                        <div class="cc-sb-header"><i class="fas fa-clock"></i><span>Class Hours</span></div>
                        <div class="cc-sb-body">
                            <div class="cc-hour-row">
                                <span class="cc-day">Monday – Saturday</span>
                                <span class="cc-time cc-time--gold">6:00 PM – 4:00 AM</span>
                            </div>
                            <div class="cc-hour-row">
                                <span class="cc-day">Sunday</span>
                                <span class="cc-time">Off</span>
                            </div>
                            <div class="cc-hour-row" style="border:none;">
                                <span class="cc-day">Online Classes</span>
                                <span class="cc-time cc-time--gold">By Appointment</span>
                            </div>
                            <div class="cc-hours-note">
                                <i class="fas fa-info-circle"></i>
                                Trial class available — contact us to schedule
                            </div>
                        </div>
                    </div>

                    {{-- Social --}}
                    <div class="cc-sidebar-box cc-sidebar-box--dark" style="margin-bottom:24px;">
                        <div class="cc-sb-header"><i class="fas fa-share-alt"></i><span>Connect With Us</span></div>
                        <div class="cc-sb-body" style="padding:12px 22px;">
                            <a href="#" class="cc-social-row cc-social--fb">
                                <div class="cc-social-icon"><i class="fab fa-facebook-f"></i></div>
                                <span>Facebook Page</span>
                                <i class="fas fa-chevron-right cc-social-arrow"></i>
                            </a>
                            <a href="#" class="cc-social-row cc-social--ig">
                                <div class="cc-social-icon"><i class="fab fa-instagram"></i></div>
                                <span>Instagram</span>
                                <i class="fas fa-chevron-right cc-social-arrow"></i>
                            </a>
                            <a href="#" class="cc-social-row cc-social--yt">
                                <div class="cc-social-icon"><i class="fab fa-youtube"></i></div>
                                <span>YouTube Channel</span>
                                <i class="fas fa-chevron-right cc-social-arrow"></i>
                            </a>
                            <a href="#" class="cc-social-row cc-social--wa" style="border:none;">
                                <div class="cc-social-icon"><i class="fab fa-whatsapp"></i></div>
                                <span>WhatsApp Us</span>
                                <i class="fas fa-chevron-right cc-social-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════════
    GOOGLE MAP
    ═══════════════════════════════════════════════════ --}}
    <div class="cc-map-wrap cc-sr" data-dir="up">
        <div class="cc-map-label">
            <i class="fas fa-map-marker-alt"></i> Find Us On The Map
        </div>

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3157.93719018323!2d72.94892000000002!3d33.6228671!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df97ec9c5db731%3A0x41632ff4b234dc47!2sAllied%20Bank!5e1!3m2!1sen!2s!4v1773176142786!5m2!1sen!2s"
            width="100%" height="430" style="border:0;display:block;" allowfullscreen="" loading="lazy">
        </iframe>
    </div>

@endsection


@push('styles')
    <style>
        /* ─── HERO ─────────────────────────────────────── */
        .cc-hero {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 60%, #0A1520 100%);
            position: relative;
            padding: 100px 0 80px;
            overflow: hidden;
        }

        .cc-hero-pattern {
            position: absolute;
            inset: 0;
            opacity: .05;
            background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Cpath d=%22M40 0L80 40L40 80L0 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3Cpath d=%22M40 10L70 40L40 70L10 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
        }

        .cc-hero-glow {
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at center, rgba(174, 130, 37, .12) 0%, transparent 65%);
        }

        .cc-line-l,
        .cc-line-r {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, transparent, var(--gold), transparent);
        }

        .cc-line-l { left: 0; }
        .cc-line-r { right: 0; }

        .cc-line-b {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }

        .cc-arabic {
            font-family: 'Amiri', serif;
            font-size: 26px;
            color: rgba(174, 130, 37, .65);
            margin-bottom: 16px;
        }

        .cc-tag {
            display: inline-block;
            font-family: 'Amiri', serif;
            font-size: 12px;
            color: var(--gold-light);
            letter-spacing: 5px;
            text-transform: uppercase;
            margin-bottom: 20px;
            padding: 7px 28px;
            border: 1px solid rgba(174, 130, 37, .45);
        }

        .cc-title {
            font-family: 'Cinzel', serif;
            font-size: clamp(30px, 5vw, 56px);
            font-weight: 900;
            color: #fff;
            margin-bottom: 14px;
            line-height: 1.1;
        }

        .cc-title span { color: var(--gold-light); }

        .cc-sub {
            color: rgba(255, 255, 255, .55);
            font-family: 'Lato', sans-serif;
            font-size: 15px;
            max-width: 520px;
            margin: 0 auto 22px;
            line-height: 1.8;
        }

        .cc-particles {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .cc-particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: var(--gold);
            border-radius: 50%;
            opacity: 0;
            bottom: -10px;
            animation: ccFloat linear infinite;
        }

        @keyframes ccFloat {
            0%   { opacity: 0; transform: translateY(0) scale(1); }
            10%  { opacity: .5; }
            90%  { opacity: .1; }
            100% { opacity: 0; transform: translateY(-140px) scale(.2); }
        }

        .cc-rv {
            opacity: 0;
            transform: translateY(22px);
            animation: ccRv .75s cubic-bezier(.25, .46, .45, .94) forwards;
        }

        @keyframes ccRv { to { opacity: 1; transform: translateY(0); } }

        .cc-sr {
            opacity: 0;
            transition: opacity .75s ease, transform .75s cubic-bezier(.25, .46, .45, .94);
        }
        .cc-sr[data-dir="up"]    { transform: translateY(40px); }
        .cc-sr[data-dir="left"]  { transform: translateX(-45px); }
        .cc-sr[data-dir="right"] { transform: translateX(45px); }
        .cc-sr.in { opacity: 1 !important; transform: translate(0) !important; }

        /* ─── INFO SECTION ──────────────────────────────
           BG: white | Cards: navy | Height: fixed/stable
        ─────────────────────────────────────────────── */
        .c-info-section {
            background: #ffffff;                          /* ✅ white bg */
            padding: 65px 0;
            border-top: 1px solid rgba(174, 130, 37, .12);
            border-bottom: 1px solid rgba(174, 130, 37, .15);
        }

        /* Equal-height columns */
        .c-info-section .row {
            align-items: stretch;
        }
        .c-info-section .col-lg-4,
        .c-info-section .col-md-6 {
            display: flex;
        }

        .c-info-card {
            background: var(--navy);                      /* ✅ navy card */
            border: 1px solid rgba(174, 130, 37, 0.25);
            padding: 40px 28px;
            text-align: center;
            transition: all .35s;
            position: relative;
            overflow: hidden;
            width: 100%;                                  /* ✅ full column width */

            /* ✅ Fixed min-height — content add hone se layout nahi tutega */
            min-height: 200px;

            /* ✅ Flex column so content stays vertically centered */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        /* Gold bottom bar on hover */
        .c-info-card::before {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            transform: scaleX(0);
            transition: transform .35s;
        }

        /* Left gold accent line — always visible, subtle */
        .c-info-card::after {
            content: '';
            position: absolute;
            top: 18px; bottom: 18px;
            left: 0;
            width: 3px;
            background: linear-gradient(180deg, transparent, var(--gold), transparent);
            opacity: 0.4;
        }

        .c-info-card:hover {
            transform: translateY(-6px);
            border-color: var(--gold);
            background: #0d2035;                          /* slightly lighter navy on hover */
            box-shadow: 0 20px 40px rgba(0, 0, 0, .25),
                        0 0 0 1px rgba(174,130,37,.15);
        }

        .c-info-card:hover::before { transform: scaleX(1); }

        /* Gold variant card */
        .c-info-card--gold {
            background: var(--gold) !important;
            border-color: var(--gold) !important;
        }
        .c-info-card--gold::before {
            background: rgba(255, 255, 255, 0.4) !important;
        }
        .c-info-card--gold:hover {
            background: var(--gold-dark) !important;
        }

        /* Icon */
        .c-info-icon {
            width: 68px;
            height: 68px;
            flex-shrink: 0;                               /* ✅ icon size stable */
            background: rgba(174, 130, 37, 0.1);
            border: 1px solid rgba(174, 130, 37, 0.45);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            font-size: 24px;
            color: var(--gold);
            transition: all .35s;
        }

        .c-info-card--gold .c-info-icon {
            background: rgba(255, 255, 255, .18);
            border-color: rgba(255, 255, 255, .4);
            color: var(--white);
        }

        .c-info-card:hover .c-info-icon {
            transform: scale(1.1) rotate(8deg);
            background: rgba(174, 130, 37, 0.18);
        }

        /* Title */
        .c-info-title {
            font-family: 'Cinzel', serif;
            color: var(--white);
            font-size: 14px;
            margin-bottom: 8px;
            letter-spacing: 1.2px;
        }

        /* Lines — ✅ word-break so long text wraps cleanly */
        .c-info-line {
            color: rgba(255, 255, 255, 0.55);
            font-size: 13px;
            line-height: 1.75;
            margin: 0;
            word-break: break-word;                       /* ✅ long emails won't overflow */
            max-width: 100%;
        }

        .c-info-card--gold .c-info-line { color: rgba(255, 255, 255, 0.85); }

        /* ─── MAIN SECTION ──────────────────────────────── */
        .cc-main-section {
            background: var(--off-white);
            padding: 80px 0 90px;
        }

        /* Form wrap */
        .cc-form-wrap {
            background: var(--white);
            border: 1px solid rgba(174, 130, 37, .12);
            padding: 44px 40px;
            box-shadow: 0 4px 30px rgba(13, 27, 42, .06);
            position: relative;
        }

        .cc-form-wrap::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gold-dark), var(--gold-light), var(--gold-dark));
            background-size: 200% 100%;
            animation: ccShimmer 3s linear infinite;
        }

        @keyframes ccShimmer {
            0%   { background-position: 0% 0%; }
            100% { background-position: 200% 0%; }
        }

        .cc-eyebrow {
            font-family: 'Cinzel', serif;
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--gold);
            display: block;
            margin-bottom: 8px;
        }

        .cc-form-title {
            font-family: 'Cinzel', serif;
            font-size: clamp(22px, 3vw, 30px);
            color: var(--navy);
            font-weight: 800;
            margin-bottom: 10px;
        }
        .cc-form-title span { color: var(--gold); }

        .cc-form-sub {
            font-family: 'Lato', sans-serif;
            font-size: 14px;
            color: var(--text-mid);
            line-height: 1.75;
        }

        .cc-form-divider {
            width: 50px;
            height: 2px;
            background: var(--gold);
            margin: 18px 0 28px;
        }

        .cc-field { position: relative; margin-bottom: 4px; }

        .cc-field label {
            display: block;
            font-family: 'Cinzel', serif;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--navy);
            margin-bottom: 8px;
            transition: color .3s;
        }
        .cc-field label span { color: var(--gold); }
        .cc-field.focused label { color: var(--gold); }

        .cc-field input,
        .cc-field textarea,
        .cc-field select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid rgba(174, 130, 37, .2);
            background: var(--off-white);
            font-family: 'Lato', sans-serif;
            font-size: 13px;
            color: var(--text-dark);
            outline: none;
            border-radius: 0;
            transition: border-color .3s, background .3s;
            -webkit-appearance: none;
            appearance: none;
        }
        .cc-field input:focus,
        .cc-field textarea:focus,
        .cc-field select:focus {
            border-color: var(--gold);
            background: var(--white);
        }
        .cc-field textarea { resize: vertical; min-height: 130px; }
        .cc-field--select { position: relative; }
        .cc-select-arrow {
            position: absolute;
            right: 14px; bottom: 14px;
            color: var(--gold);
            font-size: 11px;
            pointer-events: none;
        }
        .cc-field-line {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 2px;
            background: var(--gold);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .4s;
        }
        .cc-field input:focus ~ .cc-field-line,
        .cc-field textarea:focus ~ .cc-field-line,
        .cc-field select:focus ~ .cc-field-line { transform: scaleX(1); }

        .cc-submit-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--navy);
            color: #fff;
            font-family: 'Cinzel', serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            padding: 14px 34px;
            border: 2px solid var(--navy);
            cursor: pointer;
            transition: all .3s;
        }
        .cc-submit-btn:hover { background: var(--gold); border-color: var(--gold); }
        .cc-submit-btn i { transition: transform .3s; }
        .cc-submit-btn:hover i { transform: translateX(5px) rotate(15deg); }

        /* Sidebar */
        .cc-sidebar-box {
            overflow: hidden;
            border: 1px solid rgba(174, 130, 37, .15);
        }
        .cc-sidebar-box--light { background: var(--white); }
        .cc-sidebar-box--dark  { background: var(--navy); }

        .cc-sb-header {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 22px;
            background: var(--navy);
            font-family: 'Cinzel', serif;
            font-size: 11px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--gold-light);
            border-bottom: 1px solid rgba(174, 130, 37, .2);
        }
        .cc-sidebar-box--dark .cc-sb-header { background: rgba(174, 130, 37, .1); }
        .cc-sb-header i { color: var(--gold); font-size: 13px; }
        .cc-sb-body { padding: 20px 22px; }

        .cc-hour-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 11px 0;
            border-bottom: 1px solid rgba(174, 130, 37, .08);
        }
        .cc-day  { font-family: 'Lato', sans-serif; font-size: 13px; color: var(--text-mid); }
        .cc-time { font-family: 'Lato', sans-serif; font-size: 12px; font-weight: 700; color: var(--text-muted); }
        .cc-time--gold { color: var(--gold-dark); }

        .cc-hours-note {
            margin-top: 16px;
            padding: 10px 14px;
            background: rgba(174, 130, 37, .06);
            border-left: 3px solid var(--gold);
            font-family: 'Lato', sans-serif;
            font-size: 12px;
            color: var(--text-mid);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .cc-hours-note i { color: var(--gold); }

        .cc-social-row {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 11px 0;
            border-bottom: 1px solid rgba(174, 130, 37, .1);
            text-decoration: none;
            transition: all .3s;
        }
        .cc-social-row:hover { padding-left: 8px; }
        .cc-social-row span {
            font-family: 'Lato', sans-serif;
            font-size: 13px;
            color: rgba(255, 255, 255, .7);
            flex: 1;
            transition: color .3s;
        }
        .cc-social-row:hover span { color: var(--gold-light); }
        .cc-social-arrow { color: rgba(174, 130, 37, .4); font-size: 11px; transition: all .3s; }
        .cc-social-row:hover .cc-social-arrow { color: var(--gold-light); transform: translateX(4px); }

        .cc-social-icon {
            width: 34px; height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            transition: all .3s;
            flex-shrink: 0;
        }
        .cc-social--fb .cc-social-icon { background: #1877f2; color: #fff; }
        .cc-social--ig .cc-social-icon {
            background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
            color: #fff;
        }
        .cc-social--yt .cc-social-icon { background: #ff0000; color: #fff; }
        .cc-social--wa .cc-social-icon { background: #25d366; color: #fff; }
        .cc-social-row:hover .cc-social-icon { transform: scale(1.15) rotate(-5deg); }

        /* Map */
        .cc-map-wrap {
            position: relative;
            border-top: 3px solid var(--gold);
        }
        .cc-map-label {
            position: absolute;
            top: -18px; left: 50%;
            transform: translateX(-50%);
            background: var(--gold);
            color: #fff;
            font-family: 'Cinzel', serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 9px 28px;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            z-index: 10;
            box-shadow: 0 4px 20px rgba(174, 130, 37, .4);
        }

        @media (max-width: 767px) {
            .c-info-card { padding: 32px 20px; min-height: 180px; }
            .cc-form-wrap { padding: 30px 22px; }
        }
    </style>
@endpush


@push('scripts')
    <script>
        (function () {
            var els = document.querySelectorAll('.cc-sr');
            if ('IntersectionObserver' in window) {
                var io = new IntersectionObserver(function (entries) {
                    entries.forEach(function (e) {
                        if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
                    });
                }, { threshold: .08 });
                els.forEach(function (el) { io.observe(el); });
            } else {
                els.forEach(function (el) { el.classList.add('in'); });
            }

            /* Label highlight on field focus */
            document.querySelectorAll('.cc-field input,.cc-field textarea,.cc-field select').forEach(function (inp) {
                inp.addEventListener('focus',  function () { inp.closest('.cc-field').classList.add('focused'); });
                inp.addEventListener('blur',   function () { inp.closest('.cc-field').classList.remove('focused'); });
            });
        })();
    </script>
@endpush
