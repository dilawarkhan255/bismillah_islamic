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
    .footer { background:#f9f6f0; padding:16px 32px; font-size:11px; color:#999; text-align:center; }
</style>
</head>
<body>
<div class="wrap">
    <div class="header">
        <h2>📋 New Enrollment Request</h2>
        <p>Bismillah Islamic Academy — Admin Notification</p>
    </div>
    <div class="body">
        <div class="row"><span class="label">Student Name</span><span class="value">{{ $data['student_name'] }}</span></div>
        <div class="row"><span class="label">Parent Name</span><span class="value">{{ $data['parent_name'] }}</span></div>
        <div class="row"><span class="label">Phone</span><span class="value">{{ $data['phone'] }}</span></div>
        <div class="row"><span class="label">Email</span><span class="value">{{ $data['email'] ?? 'N/A' }}</span></div>
        <div class="row"><span class="label">Age</span><span class="value">{{ $data['age'] }}</span></div>
        <div class="row"><span class="label">Gender</span><span class="value">{{ $data['gender'] }}</span></div>
        <div class="row"><span class="label">Course</span><span class="value">{{ $data['course'] }}</span></div>
        <div class="row"><span class="label">Class Type</span><span class="value">{{ $data['class_type'] }}</span></div>
        @if(!empty($data['message']))
        <div class="row"><span class="label">Message</span><span class="value">{{ $data['message'] }}</span></div>
        @endif
    </div>
    <div class="footer">This email was auto-generated. Please respond to the parent/student directly.</div>
</div>
</body>
</html>
