@extends('layouts.app')

@section('title', 'Privacy Policy — Bismillah Islamic Academy')

@section('content')

<section class="pp-hero">
    <div class="pp-hero-bg"></div>
    <div class="container text-center" style="position:relative;z-index:3;">
        <div class="pp-arabic">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
        <div class="pp-tag">✦ Bismillah Islamic Academy ✦</div>
        <h1 class="pp-title">Privacy <span>Policy</span></h1>
        <p class="pp-sub">{{ section('privacy-policy', 'subtitle', 'title', 'Your trust is our amanah. Here\'s how we protect your information.') }}</p>
        <div class="pp-badge">
            <i class="fas fa-shield-alt"></i> Last Updated: January 2026
        </div>
    </div>
</section>


<section class="pp-main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <!-- Commitment Banner -->
                <div class="pp-banner">
                    <div class="pp-banner-icon"><i class="fas fa-user-shield"></i></div>
                    <div>
                        <h5>Our Commitment</h5>
                        <p>Bismillah Islamic Academy collects only what is needed to serve you. We never sell your data, never run ads, and always handle your information with <em>amanah</em> and <em>wudhuh</em>.</p>
                    </div>
                </div>

                <!-- Accordion Sections -->
                <div class="pp-accordion">

                    @php
                    $sections = [
                        [
                            'num'   => '01',
                            'icon'  => 'fa-info-circle',
                            'title' => 'Introduction',
                            'open'  => true,
                            'body'  => '<p>This policy covers all services by Bismillah Islamic Academy — our website, enrollment forms, WhatsApp, and Google Meet classes — for students and families in Pakistan, the UK, and beyond.</p><p>By enrolling or using our website you agree to this policy.</p>'
                        ],
                        [
                            'num'   => '02',
                            'icon'  => 'fa-database',
                            'title' => 'Information We Collect',
                            'open'  => false,
                            'body'  => '
                            <p>We collect only what is necessary:</p>
                            <div class="pp-chips">
                                <span><i class="fas fa-user"></i> Student & parent name</span>
                                <span><i class="fas fa-envelope"></i> Email & WhatsApp number</span>
                                <span><i class="fas fa-globe"></i> Country & time zone</span>
                                <span><i class="fas fa-graduation-cap"></i> Quran level & goals</span>
                                <span><i class="fas fa-chart-line"></i> Progress reports</span>
                                <span><i class="fas fa-laptop"></i> Basic device & browser data</span>
                            </div>'
                        ],
                        [
                            'num'   => '03',
                            'icon'  => 'fa-cogs',
                            'title' => 'How We Use It',
                            'open'  => false,
                            'body'  => '
                            <ul class="pp-list">
                                <li>Enroll students and assign qualified teachers</li>
                                <li>Schedule classes in your time zone</li>
                                <li>Send reminders, progress updates, and announcements</li>
                                <li>Respond to inquiries and support requests</li>
                                <li>Process payments where applicable</li>
                                <li>Improve our courses and website</li>
                            </ul>
                            <div class="pp-callout">
                                <i class="fas fa-ban"></i>
                                <p>We will <strong>never</strong> sell your data or use it for unsolicited marketing.</p>
                            </div>'
                        ],
                        [
                            'num'   => '04',
                            'icon'  => 'fa-share-alt',
                            'title' => 'Data Sharing',
                            'open'  => false,
                            'body'  => '
                            <p>We share your data only when necessary:</p>
                            <div class="pp-share-list">
                                <div class="pp-share-item">
                                    <strong>Assigned Teachers</strong>
                                    <span>To prepare and conduct lessons — need-to-know only</span>
                                </div>
                                <div class="pp-share-item">
                                    <strong>WhatsApp / Google Meet</strong>
                                    <span>Class sessions — protected by platform encryption</span>
                                </div>
                                <div class="pp-share-item">
                                    <strong>Payment Processors</strong>
                                    <span>Fee collection — PCI-DSS compliant only</span>
                                </div>
                                <div class="pp-share-item">
                                    <strong>Legal Authorities</strong>
                                    <span>Only if required by law</span>
                                </div>
                            </div>'
                        ],
                        [
                            'num'   => '05',
                            'icon'  => 'fa-lock',
                            'title' => 'Data Security',
                            'open'  => false,
                            'body'  => '
                            <div class="pp-sec-grid">
                                <div class="pp-sec-item"><i class="fas fa-lock"></i><div><strong>Encrypted Storage</strong><p>Sensitive data is encrypted; passwords never stored in plain text.</p></div></div>
                                <div class="pp-sec-item"><i class="fas fa-user-lock"></i><div><strong>Access Control</strong><p>Only authorized staff can access student records.</p></div></div>
                                <div class="pp-sec-item"><i class="fas fa-shield-virus"></i><div><strong>Secure Comms</strong><p>HTTPS on website; encrypted messaging for all communications.</p></div></div>
                                <div class="pp-sec-item"><i class="fas fa-trash-alt"></i><div><strong>Data Minimization</strong><p>We delete data when it is no longer needed.</p></div></div>
                            </div>'
                        ],
                        [
                            'num'   => '06',
                            'icon'  => 'fa-cookie-bite',
                            'title' => 'Cookies',
                            'open'  => false,
                            'body'  => '
                            <div class="pp-cookie-list">
                                <div class="pp-cookie-item"><span class="pp-badge-req">Required</span><strong>Essential</strong><p>Core website functions — cannot be disabled.</p></div>
                                <div class="pp-cookie-item"><span class="pp-badge-opt">Optional</span><strong>Analytics</strong><p>Google Analytics — helps us improve the site.</p></div>
                                <div class="pp-cookie-item"><span class="pp-badge-opt">Optional</span><strong>Preferences</strong><p>Remembers language and region settings.</p></div>
                            </div>
                            <p style="margin-top:14px;font-size:13px;">You can manage cookies in your browser settings.</p>'
                        ],
                        [
                            'num'   => '07',
                            'icon'  => 'fa-balance-scale',
                            'title' => 'Your Rights',
                            'open'  => false,
                            'body'  => '
                            <div class="pp-rights">
                                <div><i class="fas fa-eye"></i> <strong>Access</strong> — request a copy of your data</div>
                                <div><i class="fas fa-edit"></i> <strong>Rectification</strong> — correct inaccurate information</div>
                                <div><i class="fas fa-trash"></i> <strong>Erasure</strong> — request deletion of your data</div>
                                <div><i class="fas fa-download"></i> <strong>Portability</strong> — receive your data in a readable format</div>
                                <div><i class="fas fa-times-circle"></i> <strong>Object</strong> — object to certain types of processing</div>
                            </div>
                            <div class="pp-callout" style="margin-top:18px;">
                                <i class="fas fa-envelope"></i>
                                <p>Email <a href="mailto:bismillahquranacademy2@gmail.com">bismillahquranacademy2@gmail.com</a> to exercise any right. We respond within 24 hours.</p>
                            </div>'
                        ],
                        [
                            'num'   => '08',
                            'icon'  => 'fa-child',
                            'title' => "Children's Privacy",
                            'open'  => false,
                            'body'  => '
                            <div class="pp-callout pp-callout--green">
                                <i class="fas fa-child"></i>
                                <p><strong>Special Protection for Minors.</strong> All enrollment and communication for children is handled through a parent or legal guardian. We collect only the minimum data needed, never serve ads to minors, and never share their data beyond what is described in Section 4. Parents may request access, correction, or deletion of their child\'s data at any time.</p>
                            </div>'
                        ],
                        [
                            'num'   => '09',
                            'icon'  => 'fa-sync-alt',
                            'title' => 'Policy Changes',
                            'open'  => false,
                            'body'  => '<p>When we make significant changes, we will update the date on this page, notify enrolled families via email or WhatsApp, and post a notice on our homepage for 30 days.</p>'
                        ],
                        [
                            'num'   => '10',
                            'icon'  => 'fa-headset',
                            'title' => 'Contact Us',
                            'open'  => false,
                            'body'  => '
                            <div class="pp-contacts">
                                <a href="mailto:bismillahquranacademy2@gmail.com" class="pp-contact">
                                    <div class="pp-ci"><i class="fas fa-envelope"></i></div>
                                    <div><strong>Email</strong><span>bismillahquranacademy2@gmail.com</span></div>
                                </a>
                                <a href="https://wa.me/923141833216" class="pp-contact" target="_blank">
                                    <div class="pp-ci pp-ci--wa"><i class="fab fa-whatsapp"></i></div>
                                    <div><strong>Pakistan</strong><span>+92 314 1833216</span></div>
                                </a>
                                <a href="https://wa.me/447415770822" class="pp-contact" target="_blank">
                                    <div class="pp-ci pp-ci--uk"><i class="fab fa-whatsapp"></i></div>
                                    <div><strong>United Kingdom</strong><span>+44 7415 770822</span></div>
                                </a>
                            </div>'
                        ],
                    ];
                    @endphp

                    @foreach($sections as $i => $s)
                    <div class="pp-item {{ $s['open'] ? 'pp-item--open' : '' }}">
                        <button class="pp-item-hd" onclick="ppToggle(this)" aria-expanded="{{ $s['open'] ? 'true' : 'false' }}">
                            <div class="pp-item-left">
                                <span class="pp-num">{{ $s['num'] }}</span>
                                <div class="pp-icon"><i class="fas {{ $s['icon'] }}"></i></div>
                                <span class="pp-item-title">{{ $s['title'] }}</span>
                            </div>
                            <i class="fas fa-chevron-down pp-chevron"></i>
                        </button>
                        <div class="pp-item-bd">
                            <div class="pp-item-inner">
                                {!! $s['body'] !!}
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>{{-- /accordion --}}

            </div>
        </div>
    </div>
</section>


<!-- CTA -->
<section class="pp-cta">
    <div class="pp-cta-bg"></div>
    <div class="container text-center" style="position:relative;z-index:2;">
        <div class="pp-arabic" style="opacity:.7;">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
        <h2 class="pp-cta-title">Begin Your <span>Quranic Journey</span></h2>
        <p class="pp-cta-sub">Your privacy is protected. Your trust is our amanah.</p>
        <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
            <a href="{{ route('free_trial') }}" class="pp-btn-gold">Start Free Trial</a>
            <a href="{{ route('contact') }}" class="pp-btn-outline">Contact Us</a>
        </div>
    </div>
</section>

@endsection


@push('styles')
<style>

/* ── VARIABLES ────────────────────────────── */
:root {
    --gold:       #AE8225;
    --gold-light: #D4A94A;
    --navy:       #0D1B2A;
}

/* ── HERO ─────────────────────────────────── */
.pp-hero {
    position:relative; padding:100px 0 72px;
    background:linear-gradient(150deg, #0D1B2A 0%, #071320 100%);
    overflow:hidden; text-align:center;
}
.pp-hero-bg {
    position:absolute; inset:0; opacity:.05;
    background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2260%22 height=%2260%22%3E%3Cpath d=%22M30 0L60 30L30 60L0 30Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
    z-index:1;
}
.pp-hero::after {
    content:''; position:absolute; bottom:0; left:0; right:0; height:2px;
    background:linear-gradient(90deg, transparent, var(--gold), transparent); z-index:2;
}
.pp-arabic { font-family:'Amiri',serif; font-size:clamp(18px,2.5vw,24px); color:rgba(174,130,37,.75); margin-bottom:14px; }
.pp-tag {
    display:inline-block; font-family:'Amiri',serif; font-size:11px; letter-spacing:5px;
    color:var(--gold-light); border:1px solid rgba(174,130,37,.4); padding:6px 24px; margin-bottom:18px;
}
.pp-title {
    font-family:'Cinzel',serif; font-size:clamp(28px,5vw,52px);
    font-weight:900; color:#fff; line-height:1.1; margin-bottom:12px;
}
.pp-title span { color:var(--gold-light); }
.pp-sub {
    color:rgba(255,255,255,.5); font-family:'Lato',sans-serif;
    font-size:14px; max-width:480px; margin:0 auto 20px; line-height:1.8;
}
.pp-badge {
    display:inline-flex; align-items:center; gap:8px;
    background:rgba(174,130,37,.12); border:1px solid rgba(174,130,37,.3);
    color:var(--gold-light); font-family:'Lato',sans-serif;
    font-size:11px; letter-spacing:1.5px; padding:7px 18px;
}
.pp-badge i { color:var(--gold); }

/* ── MAIN ─────────────────────────────────── */
.pp-main { background:#f4f2ee; padding:60px 0 80px; }

/* ── BANNER ───────────────────────────────── */
.pp-banner {
    display:flex; gap:18px; align-items:flex-start;
    background:var(--navy); border-bottom:2px solid var(--gold);
    padding:24px 28px; margin-bottom:20px;
}
.pp-banner-icon {
    width:50px; height:50px; flex-shrink:0;
    background:rgba(174,130,37,.15); border:1px solid rgba(174,130,37,.4);
    border-radius:50%; display:flex; align-items:center; justify-content:center;
    color:var(--gold); font-size:20px;
}
.pp-banner h5 {
    font-family:'Cinzel',serif; color:#fff; font-size:14px;
    font-weight:700; margin-bottom:6px;
}
.pp-banner p {
    color:rgba(255,255,255,.55); font-family:'Lato',sans-serif;
    font-size:13px; line-height:1.85; margin:0;
}
.pp-banner em { color:var(--gold-light); font-style:italic; }
@media(max-width:575px){
    .pp-banner { flex-direction:column; padding:20px 18px; }
    .pp-banner-icon { width:42px; height:42px; font-size:17px; }
}

/* ── ACCORDION ────────────────────────────── */
.pp-accordion { background:#fff; border:1px solid rgba(174,130,37,.15); }

.pp-item { border-bottom:1px solid rgba(174,130,37,.1); }
.pp-item:last-child { border-bottom:none; }

.pp-item-hd {
    width:100%; background:none; border:none; cursor:pointer;
    display:flex; align-items:center; justify-content:space-between;
    padding:18px 24px; gap:12px; transition:background .2s;
    text-align:left;
}
.pp-item-hd:hover { background:rgba(174,130,37,.04); }
.pp-item--open .pp-item-hd { background:rgba(174,130,37,.05); }

.pp-item-left { display:flex; align-items:center; gap:12px; }
.pp-num {
    font-family:'Cinzel',serif; font-size:10px; font-weight:700;
    color:var(--gold); letter-spacing:1.5px;
    background:rgba(174,130,37,.1); border:1px solid rgba(174,130,37,.2);
    padding:3px 8px; flex-shrink:0;
}
.pp-icon {
    width:32px; height:32px; flex-shrink:0;
    background:rgba(13,27,42,.06); border:1px solid rgba(13,27,42,.08);
    display:flex; align-items:center; justify-content:center;
    color:var(--navy); font-size:13px; transition:all .25s;
}
.pp-item--open .pp-icon { background:var(--navy); color:var(--gold); border-color:var(--navy); }
.pp-item-title {
    font-family:'Cinzel',serif; font-size:clamp(13px,2vw,15px);
    color:var(--navy); font-weight:700;
}
.pp-chevron {
    color:rgba(174,130,37,.6); font-size:12px; flex-shrink:0;
    transition:transform .3s;
}
.pp-item--open .pp-chevron { transform:rotate(180deg); color:var(--gold); }

/* Accordion body */
.pp-item-bd { max-height:0; overflow:hidden; transition:max-height .4s cubic-bezier(.25,.46,.45,.94); }
.pp-item--open .pp-item-bd { max-height:900px; }
.pp-item-inner {
    padding:4px 24px 24px 68px;
    border-top:1px solid rgba(174,130,37,.08);
}
@media(max-width:575px){
    .pp-item-hd { padding:16px 18px; }
    .pp-item-inner { padding:16px 18px; }
}

/* body text */
.pp-item-inner p {
    font-family:'Lato',sans-serif; font-size:13.5px;
    color:#444; line-height:1.95; margin-bottom:12px;
}
.pp-item-inner p:last-child { margin-bottom:0; }
.pp-item-inner a { color:var(--gold); text-decoration:none; }
.pp-item-inner a:hover { text-decoration:underline; }

/* Chips */
.pp-chips { display:flex; flex-wrap:wrap; gap:8px; margin-top:14px; }
.pp-chips span {
    display:inline-flex; align-items:center; gap:6px;
    background:#f4f2ee; border:1px solid rgba(174,130,37,.2);
    font-family:'Lato',sans-serif; font-size:12px; color:#444;
    padding:6px 12px;
}
.pp-chips span i { color:var(--gold); font-size:11px; }

/* List */
.pp-list { list-style:none; padding:0; margin:10px 0; }
.pp-list li {
    font-family:'Lato',sans-serif; font-size:13.5px; color:#444;
    padding:8px 0 8px 22px; position:relative; line-height:1.8;
    border-bottom:1px solid rgba(174,130,37,.07);
}
.pp-list li:last-child { border-bottom:none; }
.pp-list li::before {
    content:'\f00c'; font-family:'Font Awesome 5 Free'; font-weight:900;
    position:absolute; left:0; top:10px; color:var(--gold); font-size:10px;
}

/* Callout */
.pp-callout {
    display:flex; gap:12px; align-items:flex-start;
    background:rgba(174,130,37,.06); border-left:3px solid var(--gold);
    padding:14px 16px; margin:10px 0;
}
.pp-callout i { color:var(--gold); font-size:16px; flex-shrink:0; margin-top:1px; }
.pp-callout p { margin:0 !important; font-family:'Lato',sans-serif; font-size:13px; line-height:1.85; color:#444; }
.pp-callout strong { color:var(--navy); }
.pp-callout--green { background:rgba(46,125,50,.06); border-color:#2e7d32; }
.pp-callout--green i { color:#2e7d32; }

/* Share list */
.pp-share-list { margin-top:14px; }
.pp-share-item {
    display:flex; flex-direction:column; gap:3px;
    padding:11px 0; border-bottom:1px solid rgba(174,130,37,.08);
}
.pp-share-item:last-child { border-bottom:none; }
.pp-share-item strong { font-family:'Lato',sans-serif; font-size:13px; color:var(--navy); }
.pp-share-item span { font-family:'Lato',sans-serif; font-size:12px; color:#666; }

/* Security grid */
.pp-sec-grid { display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-top:10px; }
@media(max-width:575px){ .pp-sec-grid { grid-template-columns:1fr; } }
.pp-sec-item {
    display:flex; gap:12px; align-items:flex-start;
    background:#f9f8f5; border:1px solid rgba(174,130,37,.1); padding:16px;
}
.pp-sec-item > i { color:var(--gold); font-size:18px; flex-shrink:0; margin-top:2px; }
.pp-sec-item strong { font-family:'Lato',sans-serif; font-size:13px; color:var(--navy); display:block; margin-bottom:4px; }
.pp-sec-item p { font-family:'Lato',sans-serif; font-size:12px; color:#666; margin:0; line-height:1.75; }

/* Cookies */
.pp-cookie-list { margin-top:10px; }
.pp-cookie-item {
    display:flex; align-items:flex-start; gap:12px; padding:12px 0;
    border-bottom:1px solid rgba(174,130,37,.08);
}
.pp-cookie-item:last-child { border-bottom:none; }
.pp-badge-req,
.pp-badge-opt {
    font-family:'Lato',sans-serif; font-size:9px; font-weight:800;
    letter-spacing:1.5px; text-transform:uppercase; padding:3px 9px; color:#fff; flex-shrink:0;
}
.pp-badge-req { background:#c62828; }
.pp-badge-opt { background:#b8860b; }
.pp-cookie-item strong { font-family:'Cinzel',serif; font-size:12px; color:var(--navy); display:block; margin-bottom:3px; }
.pp-cookie-item p { font-family:'Lato',sans-serif; font-size:12px; color:#666; margin:0; line-height:1.75; }

/* Rights */
.pp-rights { margin-top:10px; }
.pp-rights > div {
    display:flex; align-items:center; gap:10px;
    font-family:'Lato',sans-serif; font-size:13px; color:#444;
    padding:10px 0; border-bottom:1px solid rgba(174,130,37,.08);
}
.pp-rights > div:last-child { border-bottom:none; }
.pp-rights i { color:var(--gold); width:16px; flex-shrink:0; }
.pp-rights strong { color:var(--navy); margin-right:4px; }

/* Contacts */
.pp-contacts { display:grid; grid-template-columns:1fr 1fr 1fr; gap:12px; margin-top:14px; }
@media(max-width:700px){ .pp-contacts { grid-template-columns:1fr; } }
.pp-contact {
    display:flex; gap:12px; align-items:center;
    background:#f9f8f5; border:1px solid rgba(174,130,37,.12);
    padding:16px 14px; text-decoration:none; transition:all .25s;
}
.pp-contact:hover { border-color:var(--gold); transform:translateY(-3px); }
.pp-ci {
    width:40px; height:40px; flex-shrink:0;
    background:var(--navy); display:flex; align-items:center;
    justify-content:center; color:var(--gold); font-size:17px; transition:transform .25s;
}
.pp-ci--wa { background:#25d366; color:#fff; }
.pp-ci--uk { background:#1565c0; color:#fff; }
.pp-contact:hover .pp-ci { transform:scale(1.08); }
.pp-contact strong { font-family:'Cinzel',serif; font-size:12px; color:var(--navy); display:block; margin-bottom:2px; }
.pp-contact span { font-family:'Lato',sans-serif; font-size:12px; color:#666; }

/* ── CTA ──────────────────────────────────── */
.pp-cta {
    background:var(--navy); padding:72px 0;
    position:relative; overflow:hidden; border-top:2px solid var(--gold);
}
.pp-cta-bg {
    position:absolute; inset:0; opacity:.04;
    background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2260%22 height=%2260%22%3E%3Cpath d=%22M30 0L60 30L30 60L0 30Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
}
.pp-cta-title { font-family:'Cinzel',serif; font-size:clamp(22px,3.5vw,38px); font-weight:800; color:#fff; margin-bottom:10px; }
.pp-cta-title span { color:var(--gold-light); }
.pp-cta-sub { color:rgba(255,255,255,.5); font-size:14px; margin-bottom:28px; font-family:'Lato',sans-serif; }
.pp-btn-gold {
    display:inline-block; background:var(--gold); color:#fff;
    font-family:'Cinzel',serif; font-weight:700; font-size:12px;
    letter-spacing:2px; text-transform:uppercase; padding:13px 30px;
    text-decoration:none; border:2px solid var(--gold); transition:all .3s;
}
.pp-btn-gold:hover { background:transparent; color:var(--gold); }
.pp-btn-outline {
    display:inline-block; background:transparent; color:rgba(255,255,255,.75);
    font-family:'Cinzel',serif; font-weight:700; font-size:12px;
    letter-spacing:2px; text-transform:uppercase; padding:13px 30px;
    text-decoration:none; border:2px solid rgba(255,255,255,.25); transition:all .3s;
}
.pp-btn-outline:hover { border-color:var(--gold); color:var(--gold); }

</style>
@endpush


@push('scripts')
<script>
function ppToggle(btn){
    var item = btn.closest('.pp-item');
    var isOpen = item.classList.contains('pp-item--open');

    // close all
    document.querySelectorAll('.pp-item--open').forEach(function(el){
        el.classList.remove('pp-item--open');
        el.querySelector('.pp-item-hd').setAttribute('aria-expanded','false');
    });

    // open clicked if it was closed
    if(!isOpen){
        item.classList.add('pp-item--open');
        btn.setAttribute('aria-expanded','true');
    }
}

// Scroll reveal
(function(){
    var els = document.querySelectorAll('.pp-banner, .pp-accordion, .pp-cta');
    if('IntersectionObserver' in window){
        var io = new IntersectionObserver(function(entries){
            entries.forEach(function(e){
                if(e.isIntersecting){
                    e.target.style.opacity = '1';
                    e.target.style.transform = 'translateY(0)';
                    io.unobserve(e.target);
                }
            });
        },{threshold:.05});
        els.forEach(function(el){
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity .7s ease, transform .7s ease';
            io.observe(el);
        });
    }
})();
</script>
@endpush
