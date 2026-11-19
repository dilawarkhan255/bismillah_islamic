{{-- Shared design for friendly error pages (404, 403, 419, 429) inside the normal site layout. --}}
@extends('layouts.app')

@section('title')
@yield('error_title') — Bismillah Islamic Academy
@endsection

@section('content')
<section class="err-page">
    <div class="container">
        <div class="err-card">
            <div class="err-code">@yield('code')</div>
            <div class="err-divider"><span>✦</span></div>
            <h1 class="err-title">@yield('error_title')</h1>
            <p class="err-text">@yield('message')</p>
            <div class="err-actions">
                <a href="{{ route('home') }}" class="err-btn err-btn--solid"><i class="fas fa-home"></i> Back to Home</a>
                @hasSection('secondary')
                    @yield('secondary')
                @else
                    <a href="{{ route('contact') }}" class="err-btn"><i class="fas fa-envelope"></i> Contact Us</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .err-page { padding: 110px 0 120px; background: linear-gradient(180deg, var(--off-white, #FAFAF7), #fff); }
    .err-card { max-width: 620px; margin: 0 auto; text-align: center; padding: 56px 32px; background: #fff; border: 1px solid rgba(174,130,37,.15); border-top: 3px solid var(--gold); box-shadow: 0 20px 50px rgba(13,27,42,.06); }
    .err-code { font-family: 'Cinzel', serif; font-size: clamp(64px, 14vw, 110px); font-weight: 700; line-height: 1; color: var(--gold); letter-spacing: 6px; }
    .err-divider { margin: 18px auto 22px; display: flex; align-items: center; gap: 12px; max-width: 200px; color: var(--gold); }
    .err-divider::before, .err-divider::after { content: ""; flex: 1; height: 1px; background: rgba(174,130,37,.35); }
    .err-title { font-family: 'Cinzel', serif; font-size: 24px; color: var(--navy); margin-bottom: 12px; }
    .err-text { font-family: 'Lato', sans-serif; font-size: 15px; line-height: 1.8; color: var(--text-mid); margin: 0 auto 30px; max-width: 460px; }
    .err-actions { display: flex; justify-content: center; flex-wrap: wrap; gap: 12px; }
    .err-btn { display: inline-flex; align-items: center; gap: 8px; padding: 13px 26px; border: 2px solid var(--gold); color: var(--gold); font-family: 'Cinzel', serif; font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; text-decoration: none; transition: all .3s; }
    .err-btn:hover, .err-btn--solid { background: var(--gold); color: #fff; }
    .err-btn--solid:hover { background: transparent; color: var(--gold); }
</style>
@endpush
