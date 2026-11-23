{{-- Floating WhatsApp chat button on every public page. Number: Admin > Settings > "Floating WhatsApp button". --}}
@php
    $waNumber = preg_replace('/\D+/', '', (string) \App\Models\SiteSetting::get('whatsapp_float', '923141833216'));
    $waText = rawurlencode('Assalamu Alaikum, I would like to know more about your classes.');
@endphp
@if($waNumber)
<a href="https://wa.me/{{ $waNumber }}?text={{ $waText }}" class="wa-float" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp">
    <span class="wa-float-label">Chat with us</span>
    <span class="wa-float-btn"><i class="fab fa-whatsapp"></i></span>
</a>

<style>
    .wa-float {
        position: fixed;
        right: 20px;
        bottom: 80px;            /* sits above the back-to-top button */
        z-index: 998;
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
    }
    .wa-float-btn {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: #25D366;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, .25);
        transition: transform .25s;
        position: relative;
    }
    .wa-float-btn::after {       /* soft pulse so visitors notice it */
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 50%;
        border: 2px solid #25D366;
        animation: wa-pulse 2.4s ease-out infinite;
    }
    .wa-float-label {
        background: #fff;
        color: var(--navy, #0D1B2A);
        font-family: 'Lato', sans-serif;
        font-size: 13px;
        font-weight: 700;
        padding: 8px 14px;
        border-radius: 20px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, .15);
        white-space: nowrap;
        opacity: 0;
        transform: translateX(8px);
        transition: all .25s;
        pointer-events: none;
    }
    .wa-float:hover .wa-float-btn,
    .wa-float:focus-visible .wa-float-btn { transform: scale(1.08); }
    .wa-float:hover .wa-float-label,
    .wa-float:focus-visible .wa-float-label { opacity: 1; transform: none; }
    @keyframes wa-pulse {
        0%   { transform: scale(1);   opacity: .7; }
        100% { transform: scale(1.6); opacity: 0; }
    }
    @media (max-width: 575.98px) {
        .wa-float { right: 14px; bottom: 76px; }
        .wa-float-btn { width: 52px; height: 52px; font-size: 28px; }
        .wa-float-label { display: none; }
    }
    @media (prefers-reduced-motion: reduce) {
        .wa-float-btn::after { animation: none; }
    }
</style>
@endif
