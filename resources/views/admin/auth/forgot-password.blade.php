<x-guest-layout>
    <div class="form-badge">
        <i class="bi bi-key"></i> Password Recovery
    </div>

    <h2>Forgot Password?</h2>
    <p class="form-subtitle">Enter your email and we'll send you a reset link</p>

    @if (session('status'))
        <div class="alert py-2 px-3 mb-3" style="border-left-color:#198754;background:#d1e7dd;color:#0f5132;">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger py-2 px-3 mb-3" style="border-left-color:#dc3545;">
            <i class="bi bi-exclamation-circle me-1"></i>
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="admin@bismillahacademy.com" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-admin">
            <i class="bi bi-envelope me-1"></i> Send Reset Link
        </button>
    </form>

    <div class="text-center mt-4" style="font-size:13px;color:#888;">
        Remember your password?
        <a href="{{ route('login') }}" class="auth-link">Sign In</a>
    </div>

    <a href="{{ route('home') }}" class="back-link">
        <i class="bi bi-arrow-left"></i> Back to Website
    </a>
</x-guest-layout>
