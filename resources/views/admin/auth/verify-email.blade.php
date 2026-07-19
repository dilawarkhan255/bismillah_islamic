<x-guest-layout>
    <div class="form-badge">
        <i class="bi bi-envelope-check"></i> Email Verification
    </div>

    <h2>Verify Email</h2>
    <p class="form-subtitle">Check your inbox to verify your email address</p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert py-2 px-3 mb-3" style="border-left-color:#198754;background:#d1e7dd;color:#0f5132;">
            <i class="bi bi-check-circle me-1"></i>
            A new verification link has been sent to your email address.
        </div>
    @endif

    <p style="color:#666;font-size:13px;line-height:1.8;margin-bottom:24px;">
        Thanks for signing up! Before getting started, please verify your email address by clicking the link we sent you.
        If you didn't receive the email, click below to resend.
    </p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn-admin mb-3">
            <i class="bi bi-envelope me-1"></i> Resend Verification Email
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="back-link" style="cursor:pointer;background:none;border:none;font-family:'Lato',sans-serif;">
            <i class="bi bi-box-arrow-left"></i> Log Out
        </button>
    </form>
</x-guest-layout>
