<x-guest-layout>
    <div class="form-badge">
        <i class="bi bi-shield-check"></i> Secure Area
    </div>

    <h2>Confirm Password</h2>
    <p class="form-subtitle">Please confirm your password before continuing</p>

    @if ($errors->any())
        <div class="alert alert-danger py-2 px-3 mb-3" style="border-left-color:#dc3545;">
            <i class="bi bi-exclamation-circle me-1"></i>
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Enter your password" required autofocus>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-admin">
            <i class="bi bi-check-circle me-1"></i> Confirm
        </button>
    </form>
</x-guest-layout>
