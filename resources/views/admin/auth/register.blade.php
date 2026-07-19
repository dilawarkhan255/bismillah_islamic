<x-guest-layout>
    <div class="form-badge">
        <i class="bi bi-person-plus"></i> New Account
    </div>

    <h2>Create Account</h2>
    <p class="form-subtitle">Register a new admin account</p>

    @if ($errors->any())
        <div class="alert alert-danger py-2 px-3 mb-3" style="border-left-color:#dc3545;">
            <i class="bi bi-exclamation-circle me-1"></i>
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Enter your name" required autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="you@example.com" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Min 8 characters" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                   class="form-control"
                   placeholder="Re-enter password" required>
        </div>

        <button type="submit" class="btn-admin">
            <i class="bi bi-person-plus me-1"></i> Register
        </button>
    </form>

    <div class="text-center mt-4" style="font-size:13px;color:#888;">
        Already have an account?
        <a href="{{ route('login') }}" class="auth-link">Sign In</a>
    </div>

    <a href="{{ route('home') }}" class="back-link">
        <i class="bi bi-arrow-left"></i> Back to Website
    </a>
</x-guest-layout>
