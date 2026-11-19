<x-guest-layout>
    <div class="form-badge">
        <i class="bi bi-shield-lock"></i> Secure Access
    </div>

    <h2>Welcome Back</h2>
    <p class="form-subtitle">Sign in to your admin account</p>

    @if ($errors->any())
        <div class="alert alert-danger py-2 px-3 mb-3" style="border-left-color:#dc3545;">
            <i class="bi bi-exclamation-circle me-1"></i>
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="admin@bismillahacademy.com" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Enter your password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                       {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember" style="font-size:13px;color:#666;">
                    Remember me
                </label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="auth-link">Forgot password?</a>
            @endif
        </div>

        <button type="submit" class="btn-admin">
            <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
        </button>
    </form>


    <a href="{{ route('home') }}" class="back-link">
        <i class="bi bi-arrow-left"></i> Back to Website
    </a>
</x-guest-layout>
