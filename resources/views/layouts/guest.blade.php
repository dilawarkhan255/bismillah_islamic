<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Bismillah Islamic Academy') }} — Admin</title>
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
            overflow-x: hidden;
        }

        .auth-left {
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
        .auth-left::before {
            content: '';
            position: absolute;
            inset: 0;
            opacity: 0.04;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60'%3E%3Cpath d='M30 0L60 30L30 60L0 30Z' fill='none' stroke='%23AE8225' stroke-width='1'/%3E%3C/svg%3E");
        }
        .auth-left .brand-logo {
            position: relative;
            z-index: 2;
            text-align: center;
        }
        .auth-left .brand-logo img {
            height: 120px;
            width: auto;
            margin-bottom: 24px;
            filter: drop-shadow(0 4px 20px rgba(174, 130, 37, 0.3));
        }
        .auth-left .brand-title {
            font-family: 'Cinzel', serif;
            color: #fff;
            font-size: clamp(22px, 3vw, 34px);
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }
        .auth-left .brand-subtitle {
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
        .auth-left .brand-desc {
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

        .auth-right {
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
        .auth-right::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--gold), var(--gold-light), var(--gold));
        }
        .auth-form-wrap {
            width: 100%;
            max-width: 360px;
        }

        .form-badge {
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

        .auth-form-wrap h2 {
            font-family: 'Cinzel', serif;
            color: var(--navy);
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 6px;
        }
        .auth-form-wrap .form-subtitle {
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

        .btn-admin {
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
        .btn-admin:hover {
            background: transparent;
            color: var(--gold);
        }

        .auth-link {
            color: var(--gold);
            font-size: 13px;
            text-decoration: none;
            font-weight: 600;
            transition: color .3s;
        }
        .auth-link:hover {
            color: var(--gold-light);
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
        .back-link:hover { color: var(--gold); }

        .invalid-feedback { font-size: 12px; }

        .alert {
            border-radius: 4px;
            font-size: 13px;
            border-left: 3px solid;
        }

        @media (max-width: 768px) {
            body { flex-direction: column; overflow-y: auto; }
            .auth-left { flex: none; padding: 40px 24px 24px; min-height: auto; }
            .auth-left .brand-logo img { height: 70px; }
            .auth-left .brand-title { font-size: 20px; }
            .auth-left .brand-desc { display: none; }
            .auth-right { width: 100%; min-height: auto; padding: 32px 24px 48px; }
        }
    </style>
</head>
<body>

    <div class="auth-left d-none d-md-flex">
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

    <div class="auth-right">
        <div class="auth-form-wrap">
            {{ $slot }}
        </div>
    </div>

</body>
</html>
