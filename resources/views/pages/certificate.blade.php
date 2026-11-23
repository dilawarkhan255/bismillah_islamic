<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Certificate {{ $certificate->serial }} — {{ setting('site_name', 'Bismillah Islamic Academy') }}</title>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Lato:wght@400;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
<style>
  @page { size: A4 landscape; margin: 0; }
  * { box-sizing: border-box; }
  body { margin: 0; background: #e9e4d8; font-family: 'Lato', sans-serif; color: #0D1B2A; }
  .bar { max-width: 297mm; margin: 16px auto; display: flex; justify-content: space-between; align-items: center; gap: 12px; padding: 0 8px; flex-wrap: wrap; }
  .verified { color: #0f766e; font-weight: 700; font-size: 14px; margin-right: auto; }
  .back { color: #AE8225; font-weight: 700; font-size: 14px; text-decoration: none; }
  .bar button { font: 700 14px 'Lato', sans-serif; padding: 9px 18px; border: 0; background: #AE8225; color: #fff; cursor: pointer; border-radius: 6px; }
  .sheet { width: 297mm; height: 210mm; margin: 0 auto 24px; background: #fffdf7; position: relative; padding: 14mm; box-shadow: 0 10px 40px rgba(0,0,0,.18); }
  .frame { position: absolute; inset: 9mm; border: 2.5px solid #AE8225; }
  .frame::after { content: ""; position: absolute; inset: 3mm; border: 1px solid rgba(174,130,37,.55); }
  .inner { position: relative; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 6mm 22mm 14mm; }
  .bismillah { font-family: 'Amiri', serif; font-size: 26px; color: #AE8225; margin-bottom: 4mm; direction: rtl; }
  .logo { height: 22mm; margin-bottom: 3mm; }
  .academy { font-family: 'Cinzel', serif; font-size: 15px; letter-spacing: 4px; text-transform: uppercase; color: #0D1B2A; }
  h1 { font-family: 'Cinzel', serif; font-size: 40px; margin: 6mm 0 2mm; color: #0D1B2A; letter-spacing: 2px; }
  .presented { font-size: 15px; color: #666; margin: 3mm 0 2mm; }
  .name { font-family: 'Cinzel', serif; font-size: 36px; color: #AE8225; border-bottom: 1px solid rgba(174,130,37,.5); padding: 0 12mm 2mm; margin-bottom: 4mm; }
  .reason { font-size: 16px; max-width: 190mm; line-height: 1.6; color: #333; }
  .reason strong { color: #0D1B2A; }
  .foot { width: 100%; display: flex; justify-content: space-between; align-items: flex-end; margin-top: 8mm; }
  .sign { width: 62mm; border-top: 1px solid #0D1B2A; padding-top: 2mm; font-size: 13px; color: #444; }
  .sign strong { display: block; color: #0D1B2A; font-size: 14px; }
  .seal { width: 30mm; height: 30mm; border-radius: 50%; border: 2px solid #AE8225; display: flex; align-items: center; justify-content: center; font-family: 'Cinzel', serif; font-size: 10px; color: #AE8225; letter-spacing: 1px; line-height: 1.3; }
  .serial { position: absolute; bottom: 15mm; left: 0; right: 0; text-align: center; font-size: 10.5px; color: #888; }
  @media print {
    body { background: #fff; }
    .bar { display: none; }
    .sheet { margin: 0; box-shadow: none; }
  }
  @media screen and (max-width: 1150px) {
    .sheet { transform: scale(calc(100vw / 1150px)); transform-origin: top left; }
  }
</style>
</head>
<body>
  <div class="bar">
    <a class="back" href="javascript:history.back()" hidden>&larr; Back</a>
    <span class="verified">✔ Genuine certificate issued by {{ setting('site_name', 'Bismillah Islamic Academy') }}</span>
    <button type="button" onclick="window.print()">Print / Save as PDF</button>
  </div>

  <div class="sheet">
    <div class="frame"></div>
    <div class="inner">
      <div class="bismillah">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</div>
      <img class="logo" src="{{ setting('img_logo') ? asset('storage/' . setting('img_logo')) : asset('storage/logo.png') }}" alt="">
      <div class="academy">{{ setting('site_name', 'Bismillah Islamic Academy') }}</div>
      <h1>Certificate</h1>
      <div class="presented">This certificate is proudly presented to</div>
      <div class="name">{{ $certificate->student->name }}</div>
      <p class="reason">
        for the successful <strong>{{ Str::lcfirst($certificate->title) }}</strong>@if($certificate->course && ! Str::contains(Str::lower($certificate->title), Str::lower($certificate->course))) in <strong>{{ $certificate->course }}</strong>@endif,
        with dedication and love for the Book of Allah. May Allah bless this effort and make it a light in this world and the Hereafter.
      </p>
      <div class="foot">
        <div class="sign"><strong>{{ $certificate->teacher_name ?: '—' }}</strong>Teacher</div>
        <div class="seal">BISMILLAH<br>ISLAMIC<br>ACADEMY</div>
        <div class="sign"><strong>{{ $certificate->issued_on->format('d F Y') }}</strong>Date</div>
      </div>
    </div>
    <div class="serial">Certificate no. {{ $certificate->serial }} · Check at {{ route('certificate.show', $certificate) }}</div>
  </div>
<script>
  // "Back" only when the visitor came from another page of this site (e.g. the admin)
  if (document.referrer && document.referrer.indexOf(location.origin) === 0) document.querySelector('.back').hidden = false;
</script>
</body>
</html>
