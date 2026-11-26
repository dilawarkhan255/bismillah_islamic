{{-- Standalone on purpose: a 500 can mean the database is down, so no layout, settings or DB calls here. --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Something went wrong — Bismillah Islamic Academy</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --gold: #AE8225; --navy: #0D1B2A; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: grid; place-items: center; padding: 24px; background: #F5F3EE; font-family: 'Inter', Georgia, serif; color: var(--navy); }
        .card { max-width: 560px; width: 100%; text-align: center; padding: 52px 30px; background: #fff; border: 1px solid rgba(174,130,37,.18); border-top: 3px solid var(--gold); }
        .code { font-size: 84px; font-weight: 700; color: var(--gold); letter-spacing: 6px; line-height: 1; }
        h1 { font-size: 24px; margin: 22px 0 10px; }
        p { font-family: 'Inter', Arial, sans-serif; font-size: 15px; line-height: 1.8; color: #5a6b7b; margin: 0 0 28px; }
        a { display: inline-block; padding: 13px 28px; background: var(--gold); color: #fff; text-decoration: none; font-family: 'Inter', Arial, sans-serif; font-size: 12px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; }
    </style>
</head>
<body>
    <div class="card">
        <div class="code">500</div>
        <h1>Something went wrong</h1>
        <p>We're sorry, something went wrong on our side. Please try again in a few minutes. If the problem continues, contact us on WhatsApp.</p>
        <a href="/">Back to Home</a>
    </div>
</body>
</html>
