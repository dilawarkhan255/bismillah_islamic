<!DOCTYPE html>
<html>
<head>
<style>
    body { font-family: Arial, sans-serif; background:#f4f4f4; margin:0; padding:0; }
    .wrap { max-width:600px; margin:30px auto; background:#fff; border-top:4px solid #AE8225; }
    .header { background:#0D1B2A; padding:28px 32px; }
    .header h2 { color:#AE8225; font-size:20px; margin:0; }
    .header p { color:rgba(255,255,255,0.6); font-size:12px; margin:6px 0 0; }
    .body { padding:30px 32px; }
    .row { display:flex; border-bottom:1px solid #f0e8d8; padding:12px 0; }
    .label { color:#888; font-size:12px; width:160px; flex-shrink:0; padding-top:2px; }
    .value { color:#1a1a1a; font-size:14px; font-weight:600; }
    .msg-box { background:#faf7f1; border-left:3px solid #AE8225; padding:14px 18px; margin-top:20px; font-size:14px; color:#333; line-height:1.7; }
    .footer { background:#f9f6f0; padding:16px 32px; font-size:11px; color:#999; text-align:center; }
</style>
</head>
<body>
<div class="wrap">
    <div class="header">
        <h2>✉️ New Contact Message</h2>
        <p>Bismillah Islamic Academy — Admin Notification</p>
    </div>
    <div class="body">
        <div class="row"><span class="label">Name</span><span class="value">{{ $data['name'] }}</span></div>
        <div class="row"><span class="label">Email</span><span class="value">{{ $data['email'] }}</span></div>
        <div class="row"><span class="label">Phone</span><span class="value">{{ $data['phone'] ?? 'N/A' }}</span></div>
       <div class="row"><span class="label">Select Course</span><span class="value">{{ $data['inquiry'] ?? 'N/A' }}</span></div>
        <div class="msg-box">{{ $data['message'] }}</div>
    </div>
    <div class="footer">Reply directly to {{ $data['email'] }} to respond to this inquiry.</div>
</div>
</body>
</html>
