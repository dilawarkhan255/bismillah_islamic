@extends('layouts.app')

@section('title', 'Free Trial — Bismillah Islamic Academy')

@section('content')

    <!-- ── HERO ──────────────────────────────────────── -->
    <section
        style="background:linear-gradient(135deg,#0D1B2A 0%,#0F1D2A 100%);padding:80px 0 60px;border-bottom:2px solid var(--gold);position:relative;overflow:hidden;">
        <div
            style="position:absolute;inset:0;opacity:.04;background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2260%22 height=%2260%22%3E%3Cpath d=%22M30 0L60 30L30 60L0 30Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');">
        </div>
        <div class="container text-center" style="position:relative;z-index:2;">
            <div style="font-family:'Amiri',serif;font-size:18px;color:rgba(174,130,37,.7);margin-bottom:12px;">بِسْمِ
                اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
            <div
                style="display:inline-block;font-family:'Cinzel',serif;font-size:10px;color:var(--gold-light);letter-spacing:4px;text-transform:uppercase;padding:6px 20px;border:1px solid rgba(174,130,37,.4);margin-bottom:18px;">
                ✦ 3 Free Classes — No Commitment ✦</div>
            <h1
                style="font-family:'Cinzel',serif;color:#fff;font-size:clamp(26px,4.5vw,52px);font-weight:900;margin-bottom:14px;">
                Book Your <span style="color:var(--gold-light);">FREE</span> Trial Today</h1>
            <p style="color:rgba(255,255,255,.55);font-size:15px;max-width:520px;margin:0 auto 20px;line-height:1.8;">Live
                one-on-one classes via Microsoft Teams. Certified scholars. Female teachers available. Completely free for 3
                days.</p>
            <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin-bottom:24px;">
                <span
                    style="display:inline-flex;align-items:center;gap:6px;background:rgba(174,130,37,.12);border:1px solid rgba(174,130,37,.3);color:var(--gold-light);font-family:'Lato',sans-serif;font-size:11px;font-weight:700;padding:6px 14px;"><i
                        class="fas fa-check-circle"></i> 100% Free</span>
                <span
                    style="display:inline-flex;align-items:center;gap:6px;background:rgba(174,130,37,.12);border:1px solid rgba(174,130,37,.3);color:var(--gold-light);font-family:'Lato',sans-serif;font-size:11px;font-weight:700;padding:6px 14px;"><i
                        class="fas fa-check-circle"></i> No Credit Card</span>
                <span
                    style="display:inline-flex;align-items:center;gap:6px;background:rgba(174,130,37,.12);border:1px solid rgba(174,130,37,.3);color:var(--gold-light);font-family:'Lato',sans-serif;font-size:11px;font-weight:700;padding:6px 14px;"><i
                        class="fas fa-check-circle"></i> No Commitment</span>
                <span
                    style="display:inline-flex;align-items:center;gap:6px;background:rgba(174,130,37,.12);border:1px solid rgba(174,130,37,.3);color:var(--gold-light);font-family:'Lato',sans-serif;font-size:11px;font-weight:700;padding:6px 14px;"><i
                        class="fas fa-check-circle"></i> Female Teachers Available</span>
            </div>
            <!-- Quick Contact Buttons -->
            <div style="display:flex;flex-wrap:wrap;gap:12px;justify-content:center;">
                <a href="https://wa.me/923141833216?text=Assalamu+Alaikum,+I+want+to+book+a+free+trial" target="_blank"
                    style="display:inline-flex;align-items:center;gap:10px;background:#25D366;color:#fff;font-family:'Cinzel',serif;font-weight:700;font-size:11px;letter-spacing:1.5px;text-transform:uppercase;padding:14px 26px;border:2px solid #25D366;text-decoration:none;transition:all .3s;"
                    onmouseover="this.style.background='transparent';this.style.color='#25D366';"
                    onmouseout="this.style.background='#25D366';this.style.color='#fff';">
                    <i class="fab fa-whatsapp" style="font-size:16px;"></i> Book via WhatsApp
                </a>
                <a href="tel:+923141833216"
                    style="display:inline-flex;align-items:center;gap:10px;background:var(--gold);color:#fff;font-family:'Cinzel',serif;font-weight:700;font-size:11px;letter-spacing:1.5px;text-transform:uppercase;padding:14px 24px;border:2px solid var(--gold);text-decoration:none;transition:all .3s;"
                    onmouseover="this.style.background='transparent';this.style.color='var(--gold)';"
                    onmouseout="this.style.background='var(--gold)';this.style.color='#fff';">
                    <i class="fas fa-phone-alt"></i> 🇵🇰 Call Pakistan
                </a>
                <a href="tel:+447415770822"
                    style="display:inline-flex;align-items:center;gap:10px;background:transparent;color:rgba(255,255,255,.8);font-family:'Cinzel',serif;font-weight:700;font-size:11px;letter-spacing:1.5px;text-transform:uppercase;padding:14px 24px;border:2px solid rgba(255,255,255,.3);text-decoration:none;transition:all .3s;"
                    onmouseover="this.style.borderColor='var(--gold)';this.style.color='var(--gold)';"
                    onmouseout="this.style.borderColor='rgba(255,255,255,.3)';this.style.color='rgba(255,255,255,.8)';">
                    <i class="fas fa-phone-alt"></i> 🇬🇧 Call UK
                </a>
            </div>
            <nav aria-label="breadcrumb" class="mt-4">
                <ol class="breadcrumb justify-content-center mb-0" style="background:transparent;">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                            style="color:rgba(255,255,255,.45);text-decoration:none;font-size:13px;">Home</a></li>
                    <li style="color:rgba(255,255,255,.3);padding:0 8px;font-size:13px;">›</li>
                    <li style="color:var(--gold-light);font-size:13px;">Free Trial</li>
                </ol>
            </nav>
        </div>
    </section>


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
                    $steps = [
                        ['num' => '01', 'icon' => 'fab fa-whatsapp', 'title' => 'Book Your Slot', 'desc' => 'Send a WhatsApp message or fill the form below. We reply within 2 hours to confirm your trial time.', 'col' => '#25D366'],
                        ['num' => '02', 'icon' => 'fas fa-laptop', 'title' => 'Attend 3 Free Classes', 'desc' => 'Join live one-on-one sessions via Microsoft Teams. Your teacher assesses your level and guides you personally.', 'col' => 'var(--gold)'],
                        ['num' => '03', 'icon' => 'fas fa-graduation-cap', 'title' => 'Choose a Plan', 'desc' => 'After the trial, select Plan A, B or C based on your schedule. No pressure — completely your choice.', 'col' => 'var(--gold-light)'],
                    ];
                @endphp
                @foreach($steps as $s)
                    <div class="col-lg-4 col-md-6">
                        <div style="border:1px solid rgba(174,130,37,.15);padding:28px 24px;height:100%;text-align:center;border-bottom:3px solid transparent;transition:all .35s;position:relative;"
                            onmouseover="this.style.borderColor='var(--gold)';this.style.borderBottomColor='var(--gold)';this.style.transform='translateY(-5px)';this.style.boxShadow='0 16px 36px rgba(13,27,42,.1)';"
                            onmouseout="this.style.borderColor='rgba(174,130,37,.15)';this.style.borderBottomColor='transparent';this.style.transform='none';this.style.boxShadow='none';">
                            <div
                                style="font-family:'Cinzel',serif;font-size:42px;font-weight:900;color:rgba(174,130,37,.07);position:absolute;top:12px;right:16px;line-height:1;">
                                {{ $s['num'] }}</div>
                            <div style="font-size:2rem;color:{{ $s['col'] }};margin-bottom:14px;display:block;"><i
                                    class="{{ $s['icon'] }}"></i></div>
                            <h5
                                style="font-family:'Cinzel',serif;color:var(--navy);font-size:14px;font-weight:700;margin-bottom:10px;">
                                {{ $s['title'] }}</h5>
                            <p style="color:#666;font-size:13px;line-height:1.8;margin:0;">{{ $s['desc'] }}</p>
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
                <div class="col-lg-4">
                    <span
                        style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:3px;text-transform:uppercase;color:var(--gold);display:block;margin-bottom:10px;">Get
                        Started</span>
                    <h2
                        style="font-family:'Cinzel',serif;color:var(--navy);font-size:clamp(20px,3vw,30px);font-weight:800;margin-bottom:12px;">
                        Book Your FREE Trial</h2>
                    <div style="width:40px;height:2px;background:var(--gold);margin-bottom:20px;"></div>
                    <p style="color:#666;font-size:14px;line-height:1.9;margin-bottom:28px;">Fill the form and we'll contact
                        you within <strong>2 hours</strong> to confirm your slot. Or reach us directly:</p>

                    <div style="display:flex;flex-direction:column;gap:10px;">
                        <a href="https://wa.me/923141833216?text=Assalamu+Alaikum,+I+want+to+book+a+free+trial"
                            target="_blank"
                            style="display:flex;align-items:center;gap:12px;padding:14px 16px;background:#fff;border:1px solid rgba(174,130,37,.15);text-decoration:none;transition:all .3s;"
                            onmouseover="this.style.borderColor='var(--gold)';this.style.transform='translateX(4px)';"
                            onmouseout="this.style.borderColor='rgba(174,130,37,.15)';this.style.transform='none';">
                            <div
                                style="width:40px;height:40px;flex-shrink:0;background:rgba(37,211,102,.1);border:1px solid rgba(37,211,102,.3);display:flex;align-items:center;justify-content:center;color:#25D366;font-size:18px;">
                                <i class="fab fa-whatsapp"></i></div>
                            <div>
                                <div
                                    style="font-size:10px;color:#999;text-transform:uppercase;letter-spacing:1px;font-family:'Lato',sans-serif;">
                                    WhatsApp — Pakistan</div>
                                <div style="font-family:'Cinzel',serif;color:var(--navy);font-size:13px;font-weight:700;">
                                    +92 314 1833216</div>
                            </div>
                        </a>
                        <a href="https://wa.me/447415770822?text=Assalamu+Alaikum,+I+want+to+book+a+free+trial"
                            target="_blank"
                            style="display:flex;align-items:center;gap:12px;padding:14px 16px;background:#fff;border:1px solid rgba(174,130,37,.15);text-decoration:none;transition:all .3s;"
                            onmouseover="this.style.borderColor='var(--gold)';this.style.transform='translateX(4px)';"
                            onmouseout="this.style.borderColor='rgba(174,130,37,.15)';this.style.transform='none';">
                            <div
                                style="width:40px;height:40px;flex-shrink:0;background:rgba(37,211,102,.1);border:1px solid rgba(37,211,102,.3);display:flex;align-items:center;justify-content:center;color:#25D366;font-size:18px;">
                                <i class="fab fa-whatsapp"></i></div>
                            <div>
                                <div
                                    style="font-size:10px;color:#999;text-transform:uppercase;letter-spacing:1px;font-family:'Lato',sans-serif;">
                                    WhatsApp — United Kingdom</div>
                                <div style="font-family:'Cinzel',serif;color:var(--navy);font-size:13px;font-weight:700;">
                                    +44 7415 770822</div>
                            </div>
                        </a>
                        <a href="mailto:bismillahquranacademy2@gmail.com"
                            style="display:flex;align-items:center;gap:12px;padding:14px 16px;background:#fff;border:1px solid rgba(174,130,37,.15);text-decoration:none;transition:all .3s;"
                            onmouseover="this.style.borderColor='var(--gold)';this.style.transform='translateX(4px)';"
                            onmouseout="this.style.borderColor='rgba(174,130,37,.15)';this.style.transform='none';">
                            <div
                                style="width:40px;height:40px;flex-shrink:0;background:rgba(174,130,37,.1);border:1px solid rgba(174,130,37,.25);display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:16px;">
                                <i class="fas fa-envelope"></i></div>
                            <div>
                                <div
                                    style="font-size:10px;color:#999;text-transform:uppercase;letter-spacing:1px;font-family:'Lato',sans-serif;">
                                    Email Us</div>
                                <div
                                    style="font-family:'Lato',sans-serif;color:var(--navy);font-size:12px;font-weight:700;word-break:break-all;">
                                    bismillahquranacademy2@gmail.com</div>
                            </div>
                        </a>
                    </div>

                    <!-- Class hours note -->
                    <div
                        style="margin-top:20px;padding:14px 16px;background:#fff;border-left:3px solid var(--gold);border:1px solid rgba(174,130,37,.15);border-left-width:3px;">
                        <div
                            style="font-family:'Cinzel',serif;font-size:11px;color:var(--navy);font-weight:700;margin-bottom:6px;">
                            <i class="far fa-clock" style="color:var(--gold);margin-right:6px;"></i>Class Hours</div>
                        <div style="font-size:12px;color:#666;font-family:'Lato',sans-serif;line-height:1.7;">
                            🇵🇰 Pakistan: <strong>6:00 PM – 3:00 AM</strong><br>
                            🇬🇧 UK: <strong>2:00 PM – 11:00 PM</strong><br>
                            <span style="font-size:11px;color:#999;">Monday – Saturday (Sunday Off)</span>
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
                        <form action="{{ route('contact') }}" method="POST" style="padding:26px;">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="ft-label">Full Name *</label>
                                    <input type="text" name="name" placeholder="Your full name" required class="ft-input">
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">Email Address *</label>
                                    <input type="email" name="email" placeholder="your@email.com" required class="ft-input">
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">WhatsApp Number *</label>
                                    <input type="tel" name="whatsapp" placeholder="+92 or +44..." required class="ft-input">
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">Student Age *</label>
                                    <select name="age" required class="ft-input">
                                        <option value="" disabled selected>Select age</option>
                                        <option>4 – 7 years</option>
                                        <option>8 – 12 years</option>
                                        <option>13 – 17 years</option>
                                        <option>18+ (Adult)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">Country *</label>
                                    <select name="country" required class="ft-input">
                                        <option value="" disabled selected>Select country</option>
                                        <option>Pakistan</option>
                                        <option>United Kingdom</option>
                                        <option>USA</option>
                                        <option>Canada</option>
                                        <option>Australia</option>
                                        <option>UAE</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">Preferred Course *</label>
                                    <select name="course" required class="ft-input">
                                        <option value="" disabled selected>Select course</option>
                                        <option>Norani Qaida</option>
                                        <option>Quran Recitation (Nazra)</option>
                                        <option>Tajweed ul Quran</option>
                                        <option>Hifz ul Quran</option>
                                        <option>Islamic Studies</option>
                                        <option>Arabic Language</option>
                                        <option>Hadith & Seerah</option>
                                        <option>Namaz & Ibadat</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">Preferred Timing *</label>
                                    <select name="timing" required class="ft-input">
                                        <option value="" disabled selected>Select time slot</option>
                                        <option>Morning (6AM–12PM PKT)</option>
                                        <option>Afternoon (12PM–5PM PKT)</option>
                                        <option>Evening (5PM–11PM PKT)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="ft-label">Teacher Gender Preference</label>
                                    <select name="teacher_gender" class="ft-input">
                                        <option value="" disabled selected>No preference</option>
                                        <option>Male Teacher</option>
                                        <option>Female Teacher</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="ft-label">Additional Message</label>
                                    <textarea name="message" rows="3" placeholder="Any questions or special requirements..."
                                        class="ft-input" style="resize:vertical;min-height:80px;"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit"
                                        style="display:flex;align-items:center;justify-content:center;gap:10px;width:100%;background:var(--gold);color:#fff;font-family:'Cinzel',serif;font-weight:700;font-size:13px;letter-spacing:2px;text-transform:uppercase;padding:15px;border:2px solid var(--gold);cursor:pointer;transition:all .3s;"
                                        onmouseover="this.style.background='transparent';this.style.color='var(--gold)';"
                                        onmouseout="this.style.background='var(--gold)';this.style.color='#fff';">
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
