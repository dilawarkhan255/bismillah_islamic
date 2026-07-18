<!DOCTYPE html>
<html lang="en" dir="ltr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login — Bismillah Islamic Academy</title>
    <link rel="icon" type="image/png" href="{{ setting('img_logo') ? asset('storage/' . setting('img_logo')) : asset('img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Lato:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --navy: #0D1B2A;
            --navy-dark: #060F18;
            --gold: #AE8225;
            --gold-light: #D4A843;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Lato', sans-serif;
            min-height: 100vh;
            display: flex;
            background: var(--navy);
            overflow: hidden;
        }

        /* ── Left: Branding Panel ── */
        .login-left {
            flex: 1;
            background: linear-gradient(135deg, var(--navy-dark) 0%, var(--navy) 50%, #111f30 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            inset: 0;
            opacity: 0.04;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60'%3E%3Cpath d='M30 0L60 30L30 60L0 30Z' fill='none' stroke='%23AE8225' stroke-width='1'/%3E%3C/svg%3E");
        }

        .login-left .brand-logo {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .login-left .brand-logo img {
            height: 120px;
            width: auto;
            margin-bottom: 24px;
            filter: drop-shadow(0 4px 20px rgba(174, 130, 37, 0.3));
        }

        .login-left .brand-title {
            font-family: 'Cinzel', serif;
            color: #fff;
            font-size: clamp(22px, 3vw, 34px);
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .login-left .brand-subtitle {
            font-family: 'Cinzel', serif;
            color: var(--gold-light);
            font-size: 12px;
            letter-spacing: 4px;
            text-transform: uppercase;
            border: 1px solid rgba(174, 130, 37, 0.4);
            display: inline-block;
            padding: 6px 20px;
            margin-bottom: 28px;
        }

        .login-left .brand-desc {
            color: rgba(255, 255, 255, 0.45);
            font-size: 14px;
            max-width: 320px;
            line-height: 1.8;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .gold-line {
            width: 50px;
            height: 2px;
            background: var(--gold);
            margin: 20px auto;
            position: relative;
            z-index: 2;
        }

        /* ── Right: Login Form ── */
        .login-right {
            width: 480px;
            min-height: 100vh;
            background: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 50px 48px;
            position: relative;
        }

        .login-right::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--gold), var(--gold-light), var(--gold));
        }

        .login-form-wrap {
            width: 100%;
            max-width: 360px;
        }

        .login-form-wrap .form-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(174, 130, 37, 0.08);
            border: 1px solid rgba(174, 130, 37, 0.25);
            color: var(--gold);
            font-family: 'Cinzel', serif;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 6px 16px;
            margin-bottom: 24px;
        }

        .login-form-wrap h2 {
            font-family: 'Cinzel', serif;
            color: var(--navy);
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .login-form-wrap .form-subtitle {
            color: #888;
            font-size: 13px;
            margin-bottom: 32px;
        }

        .form-label {
            font-family: 'Cinzel', serif;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--navy);
            margin-bottom: 6px;
        }

        .form-control {
            border: 1.5px solid #e0dcd2;
            border-radius: 4px;
            padding: 12px 14px;
            font-size: 14px;
            color: var(--navy);
            transition: all .3s;
            background: #fafaf7;
        }

        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(174, 130, 37, 0.12);
            background: #fff;
        }

        .form-check-input:checked {
            background-color: var(--gold);
            border-color: var(--gold);
        }

        .btn-admin-login {
            width: 100%;
            background: var(--gold);
            color: #fff;
            border: 2px solid var(--gold);
            font-family: 'Cinzel', serif;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: all .3s;
        }

        .btn-admin-login:hover {
            background: transparent;
            color: var(--gold);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #888;
            font-size: 12px;
            text-decoration: none;
            margin-top: 20px;
            transition: color .3s;
        }

        .back-link:hover {
            color: var(--gold);
        }

        .invalid-feedback {
            font-size: 12px;
        }

        /* ── Mobile ── */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
                overflow: auto;
            }
            .login-left {
                flex: none;
                padding: 40px 24px 24px;
                min-height: auto;
            }
            .login-left .brand-logo img { height: 70px; }
            .login-left .brand-title { font-size: 20px; }
            .login-left .brand-desc { display: none; }
            .login-right {
                width: 100%;
                min-height: auto;
                padding: 32px 24px 48px;
                border-radius: 0;
            }
        }
    </style>
</head>
<body>

    {{-- ── Left: Branding ── --}}
    <div class="login-left d-none d-md-flex">
        <div class="brand-logo">
            <img src="{{ setting('img_logo') ? asset('storage/' . setting('img_logo')) : asset('img/logo.png') }}" alt="Logo">
            <div class="brand-title">{{ setting('site_name', 'Bismillah Islamic Academy') }}</div>
            <div class="gold-line"></div>
            <div class="brand-subtitle">Admin Panel</div>
            <p class="brand-desc">
                Manage courses, teachers, students, and content from your secure admin dashboard.
            </p>
        </div>
    </div>

    {{-- ── Right: Form ── --}}
    <div class="login-right">
        <div class="login-form-wrap">

            <div class="form-badge">
                <i class="bi bi-shield-lock"></i> Secure Access
            </div>

            <h2>Welcome Back</h2>
            <p class="form-subtitle">Sign in to your admin account</p>

            @if ($errors->any())
                <div class="alert alert-danger py-2 px-3 mb-3" style="font-size:13px;border-radius:4px;border-left:3px solid #dc3545;">
                    <i class="bi bi-exclamation-circle me-1"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
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
                </div>

                <button type="submit" class="btn-admin-login">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
                </button>
            </form>

            <a href="{{ route('home') }}" class="back-link">
                <i class="bi bi-arrow-left"></i> Back to Website
            </a>

        </div>
    </div>

</body>
</html>
