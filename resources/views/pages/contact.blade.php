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
                               @if(str_contains($line, '@'))
                                <a href="mailto:{{ $line }}" class="c-info-line">{{ $line }}</a>
                            @else
                                <p class="c-info-line">{{ $line }}</p>
                            @endif
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

                        <form action="{{ route('contact.submit') }}" method="POST" class="cc-form">
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
                                        <label>Select Course <span>*</span></label>
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
                            <a href="https://www.facebook.com/share/1JPSiUdTG3/?mibextid=wwXIfr"  target="_blank" class="cc-social-row cc-social--fb">
                                <div class="cc-social-icon"><i class="fab fa-facebook-f"></i></div>
                                <span>Facebook Page</span>
                                <i class="fas fa-chevron-right cc-social-arrow"></i>
                            </a>
                            <a href="https://www.instagram.com/bismillahislamicacademy?igsh=OWxiZHZwc2l5aXd6&utm_source=qr"  target="_blank" class="cc-social-row cc-social--ig">
                                <div class="cc-social-icon"><i class="fab fa-instagram"></i></div>
                                <span>Instagram</span>
                                <i class="fas fa-chevron-right cc-social-arrow"></i>
                            </a>
                            <a href="https://wa.me/923141833216" target="_blank" class="cc-social-row cc-social--wa" style="border:none;">
                                <div class="cc-social-icon"><i class="fab fa-whatsapp"></i></div>
                                <span>WhatsApp</span>
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
    <!--<div class="cc-map-label">-->
    <!--    <i class="fas fa-map-marker-alt"></i> Find Us On The Map-->
    <!--</div>-->

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3157.93719018323!2d72.94892000000002!3d33.6228671!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df97ec9c5db731%3A0x41632ff4b234dc47!2sAllied%20Bank!5e1!3m2!1sen!2s!4v1773176142786!5m2!1sen!2s"
        width="100%" height="430" style="border:0;display:block;" allowfullscreen="" loading="lazy">
    </iframe>
    </div>

@endsection


@push('styles')

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
                inp.addEventListener('focus', function () { inp.closest('.cc-field').classList.add('focused'); });
                inp.addEventListener('blur', function () { inp.closest('.cc-field').classList.remove('focused'); });
            });
        })();
    </script>
@endpush
