@extends('layouts.app')

@section('content')

    <!-- ===================== PAGE HEADER ===================== -->
    <div style="
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 60%, #0A1520 100%);
        position: relative; padding: 90px 0; overflow: hidden;
    ">
        <div style="position:absolute; inset:0; opacity:0.05;
            background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Cpath d=%22M40 0L80 40L40 80L0 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
        "></div>
        <div
            style="position:absolute; inset:0; background: radial-gradient(ellipse at center, rgba(174,130,37,0.1) 0%, transparent 65%);">
        </div>
        <div
            style="position:absolute; left:0; top:0; bottom:0; width:4px; background: linear-gradient(180deg, transparent, var(--gold), transparent);">
        </div>
        <div class="container text-center" style="position:relative; z-index:2;">
            <div
                style="display:inline-block; font-family:'Amiri',serif; font-size:13px; color:var(--gold-light); letter-spacing:4px; text-transform:uppercase; margin-bottom:16px; padding:6px 25px; border:1px solid rgba(174,130,37,0.4);">
                ✦ Get In Touch ✦</div>
            <h1
                style="font-family:'Cinzel',serif; font-size:clamp(30px,5vw,54px); font-weight:900; color:#fff; margin-bottom:18px;">
                Contact Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0" style="background:transparent;">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                            style="color:rgba(255,255,255,0.6); text-decoration:none; font-family:'Lato',sans-serif; font-size:13px;">Home</a>
                    </li>
                    <li class="breadcrumb-item active"
                        style="color:var(--gold-light); font-family:'Lato',sans-serif; font-size:13px;" aria-current="page">
                        Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>


    <!-- ===================== CONTACT INFO CARDS ===================== -->
    <section style="background: var(--navy); padding: 60px 0; border-bottom: 1px solid rgba(174,130,37,0.15);">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 animate-on-scroll">
                    <div style="background:var(--navy-light); border:1px solid rgba(174,130,37,0.2); padding:35px 28px; text-align:center; transition: all 0.3s;"
                        class="info-card">
                        <div
                            style="width:65px; height:65px; background:rgba(174,130,37,0.1); border:1px solid var(--gold); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 18px; font-size:24px; color:var(--gold);">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <h5 style="font-family:'Cinzel',serif; color:var(--white); font-size:15px; margin-bottom:10px;">Our
                            Location</h5>
                        <p style="color:rgba(255,255,255,0.55); font-size:13px; line-height:1.8; margin:0;">123 Islamic
                            Center Road<br>City, Country</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 animate-on-scroll" style="transition-delay:0.1s">
                    <div style="background:var(--gold); border:1px solid var(--gold); padding:35px 28px; text-align:center; transition: all 0.3s;"
                        class="info-card">
                        <div
                            style="width:65px; height:65px; background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 18px; font-size:24px; color:var(--white);">
                            <i class="fa fa-phone-alt"></i>
                        </div>
                        <h5 style="font-family:'Cinzel',serif; color:var(--white); font-size:15px; margin-bottom:10px;">Call
                            Us</h5>
                        <p style="color:rgba(255,255,255,0.85); font-size:13px; line-height:1.8; margin:0;">+012 345
                            67890<br>Mon – Sat, 8:00 – 9:00 PM</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 animate-on-scroll" style="transition-delay:0.2s">
                    <div style="background:var(--navy-light); border:1px solid rgba(174,130,37,0.2); padding:35px 28px; text-align:center; transition: all 0.3s;"
                        class="info-card">
                        <div
                            style="width:65px; height:65px; background:rgba(174,130,37,0.1); border:1px solid var(--gold); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 18px; font-size:24px; color:var(--gold);">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <h5 style="font-family:'Cinzel',serif; color:var(--white); font-size:15px; margin-bottom:10px;">
                            Email Us</h5>
                        <p style="color:rgba(255,255,255,0.55); font-size:13px; line-height:1.8; margin:0;">
                            info@bismillah.academy<br>admissions@bismillah.academy</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ===================== CONTACT FORM ===================== -->
    <section style="background: var(--white); padding: 90px 0;">
        <div class="container">
            <div class="text-center mb-5 animate-on-scroll" style="max-width:600px; margin:0 auto 50px;">
                <div class="section-label">Contact Us</div>
                <h2 class="section-title">If You Have Any Query, <span>Feel Free To Contact Us</span></h2>
                <div class="divider-gold"></div>
                <p style="color:var(--text-mid); font-size:14px; line-height:1.9; margin-top:10px;">
                    Our team is ready to answer your questions about admissions, courses, schedules and more. We typically
                    respond within 24 hours InshaaAllah.
                </p>
            </div>

            <div class="row g-5 justify-content-center">
                <!-- Form -->
                <div class="col-lg-7 animate-on-scroll">
                    <form action="#" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div style="position:relative;">
                                    <label
                                        style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:8px;">Your
                                        Name *</label>
                                    <input type="text" name="name" placeholder="e.g. Ahmad Khan" required style="
                                        width:100%; padding:13px 16px;
                                        border: 1px solid var(--border);
                                        background: var(--off-white);
                                        font-family:'Lato',sans-serif; font-size:13px;
                                        color:var(--text-dark); outline:none;
                                        border-radius:0; transition: border 0.3s;
                                    " class="contact-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label
                                        style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:8px;">Your
                                        Email *</label>
                                    <input type="email" name="email" placeholder="e.g. ahmad@example.com" required style="
                                        width:100%; padding:13px 16px;
                                        border: 1px solid var(--border);
                                        background: var(--off-white);
                                        font-family:'Lato',sans-serif; font-size:13px;
                                        color:var(--text-dark); outline:none;
                                        border-radius:0; transition: border 0.3s;
                                    " class="contact-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label
                                        style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:8px;">Phone
                                        Number</label>
                                    <input type="tel" name="phone" placeholder="+92 300 0000000" style="
                                        width:100%; padding:13px 16px;
                                        border: 1px solid var(--border);
                                        background: var(--off-white);
                                        font-family:'Lato',sans-serif; font-size:13px;
                                        color:var(--text-dark); outline:none;
                                        border-radius:0; transition: border 0.3s;
                                    " class="contact-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label
                                        style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:8px;">Inquiry
                                        About</label>
                                    <select name="subject" style="
                                        width:100%; padding:13px 16px;
                                        border: 1px solid var(--border);
                                        background: var(--off-white);
                                        font-family:'Lato',sans-serif; font-size:13px;
                                        color:var(--text-dark); outline:none;
                                        border-radius:0; transition: border 0.3s;
                                        appearance: none;
                                    " class="contact-input">
                                        <option value="">Select a Topic</option>
                                        <option>Admissions / Enrollment</option>
                                        <option>Quran Recitation Course</option>
                                        <option>Hifz Program</option>
                                        <option>Tajweed Course</option>
                                        <option>Islamic Studies</option>
                                        <option>Arabic Language</option>
                                        <option>General Inquiry</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <label
                                        style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:8px;">Your
                                        Message *</label>
                                    <textarea name="message" placeholder="Write your message here..." required rows="6"
                                        style="
                                        width:100%; padding:13px 16px;
                                        border: 1px solid var(--border);
                                        background: var(--off-white);
                                        font-family:'Lato',sans-serif; font-size:13px;
                                        color:var(--text-dark); outline:none;
                                        border-radius:0; transition: border 0.3s;
                                        resize: vertical;
                                    " class="contact-input"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-gold"
                                    style="width:100%; text-align:center; cursor:pointer; border:none;">
                                    <i class="fa fa-paper-plane me-2"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Side Info -->
                <div class="col-lg-4 animate-on-scroll" style="transition-delay:0.2s">
                    <!-- Opening Hours -->
                    <div
                        style="background:var(--light-bg); border:1px solid var(--border-soft); padding:30px 25px; margin-bottom:24px;">
                        <h5
                            style="font-family:'Cinzel',serif; color:var(--navy); font-size:14px; letter-spacing:2px; text-transform:uppercase; margin-bottom:20px; padding-bottom:12px; border-bottom:1px solid var(--border-soft);">
                            <i class="far fa-clock me-2" style="color:var(--gold);"></i> Class Hours
                        </h5>
                        @php
                            $hours = [
                                ['day' => 'Saturday – Thursday', 'time' => '8:00 AM – 9:00 PM'],
                                ['day' => 'Friday', 'time' => 'Jumu\'ah Only'],
                                ['day' => 'Online Classes', 'time' => 'By Appointment'],
                            ];
                        @endphp
                        @foreach($hours as $h)
                            <div
                                style="display:flex; justify-content:space-between; padding:9px 0; border-bottom:1px solid var(--border-soft);">
                                <span
                                    style="font-family:'Lato',sans-serif; font-size:13px; color:var(--text-mid);">{{ $h['day'] }}</span>
                                <span
                                    style="font-family:'Lato',sans-serif; font-size:13px; color:var(--gold); font-weight:700;">{{ $h['time'] }}</span>
                            </div>
                        @endforeach
                    </div>

                    <!-- Social Links -->
                    <div style="background:var(--navy); border:1px solid rgba(174,130,37,0.2); padding:28px 25px;">
                        <h5
                            style="font-family:'Cinzel',serif; color:var(--gold-light); font-size:13px; letter-spacing:2px; text-transform:uppercase; margin-bottom:18px;">
                            Follow Us</h5>
                        @php
                            $socials = [
                                ['icon' => 'fab fa-facebook-f', 'label' => 'Facebook', 'handle' => '@BismillahAcademy', 'color' => '#1877f2'],
                                ['icon' => 'fab fa-instagram', 'label' => 'Instagram', 'handle' => '@BismillahAcademy', 'color' => '#e4405f'],
                                ['icon' => 'fab fa-youtube', 'label' => 'YouTube', 'handle' => 'Bismillah Academy', 'color' => '#ff0000'],
                                ['icon' => 'fab fa-whatsapp', 'label' => 'WhatsApp', 'handle' => '+012 345 67890', 'color' => '#25d366'],
                            ];
                        @endphp
                        @foreach($socials as $s)
                            <a href="#"
                                style="display:flex; align-items:center; gap:12px; padding:9px 0; border-bottom:1px solid rgba(174,130,37,0.08); text-decoration:none; transition: all 0.3s;"
                                class="social-row">
                                <div
                                    style="width:36px; height:36px; background:{{ $s['color'] }}22; border-radius:50%; display:flex; align-items:center; justify-content:center; color:{{ $s['color'] }}; font-size:14px; flex-shrink:0;">
                                    <i class="{{ $s['icon'] }}"></i>
                                </div>
                                <div>
                                    <div
                                        style="font-family:'Cinzel',serif; font-size:11px; color:rgba(255,255,255,0.8); letter-spacing:1px;">
                                        {{ $s['label'] }}</div>
                                    <div style="font-family:'Lato',sans-serif; font-size:12px; color:rgba(255,255,255,0.4);">
                                        {{ $s['handle'] }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ===================== GOOGLE MAP ===================== -->
   <div style="line-height:0;">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3157.937359755442!2d72.94634697549728!3d33.622862473321824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfbfd07891722f%3A0x56d81ad239073793!2sJWFX%2B4HV%2C%20Islamabad%2C%20Pakistan!5e1!3m2!1sen!2s!4v1772943909510!5m2!1sen!2s"
        width="100%" height="420" style="border:0; display:block; filter: grayscale(0.3) sepia(0.1);"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>


@endsection

@push('styles')
    <style>
        .contact-input:focus {
            border-color: var(--gold) !important;
            background: var(--white) !important;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .social-row:hover {
            padding-left: 8px !important;
        }
    </style>
@endpush
