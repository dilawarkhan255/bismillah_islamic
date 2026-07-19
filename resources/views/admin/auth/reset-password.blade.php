<x-guest-layout>
    <div class="form-badge">
        <i class="bi bi-shield-lock"></i> New Password
    </div>

    <h2>Reset Password</h2>
    <p class="form-subtitle">Enter your new password below</p>

    @if ($errors->any())
        <div class="alert alert-danger py-2 px-3 mb-3" style="border-left-color:#dc3545;">
            <i class="bi bi-exclamation-circle me-1"></i>
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}"
                   class="form-control @error('email') is-invalid @enderror"
                   required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
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
            <i class="bi bi-check-circle me-1"></i> Reset Password
        </button>
    </form>

    <a href="{{ route('login') }}" class="back-link">
        <i class="bi bi-arrow-left"></i> Back to Login
    </a>
</x-guest-layout>
