<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"></head>
<body style="margin:0;padding:0;background:#f4f4f4;font-family:'Inter',Arial,Helvetica,sans-serif;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f4;padding:24px 12px;">
<tr><td align="center">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:600px;background:#ffffff;border-top:4px solid #AE8225;">
    <tr><td style="background:#0D1B2A;padding:26px 30px;">
        <div style="color:#AE8225;font-size:20px;font-weight:bold;">{{ $heading }}</div>
        <div style="color:#b9c2cc;font-size:12px;margin-top:6px;">Bismillah Islamic Academy</div>
    </td></tr>

    <tr><td style="padding:28px 30px 8px;color:#1a1a1a;font-size:15px;line-height:1.7;">
        <p style="margin:0 0 14px;">Assalamu Alaikum {{ $name }},</p>
        <p style="margin:0 0 14px;">{{ $intro }}</p>
        <p style="margin:0 0 18px;"><strong>What happens next:</strong> {{ $next }}</p>
    </td></tr>

    @if(count($details))
    <tr><td style="padding:0 30px 8px;">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f9f6f0;border:1px solid #f0e8d8;">
            <tr><td colspan="2" style="padding:12px 16px 4px;color:#AE8225;font-size:12px;font-weight:bold;text-transform:uppercase;letter-spacing:1px;">Your details</td></tr>
            @foreach($details as $label => $value)
            <tr>
                <td style="padding:7px 16px;color:#888;font-size:13px;width:140px;vertical-align:top;">{{ $label }}</td>
                <td style="padding:7px 16px;color:#1a1a1a;font-size:14px;font-weight:bold;">{{ $value }}</td>
            </tr>
            @endforeach
            <tr><td colspan="2" style="height:8px;"></td></tr>
        </table>
    </td></tr>
    @endif

    @if($whatsapp)
    <tr><td style="padding:18px 30px 6px;color:#1a1a1a;font-size:14px;line-height:1.7;">
        Need to talk sooner? Message us on WhatsApp:
    </td></tr>
    <tr><td style="padding:0 30px 26px;">
        <a href="https://wa.me/{{ $whatsapp }}" style="display:inline-block;background:#25D366;color:#ffffff;text-decoration:none;font-weight:bold;font-size:14px;padding:11px 22px;">Chat on WhatsApp</a>
    </td></tr>
    @endif

    <tr><td style="background:#f9f6f0;padding:16px 30px;font-size:12px;color:#888;text-align:center;line-height:1.6;">
        You can reply to this email if you have any questions.<br>
        <a href="{{ config('app.url') }}" style="color:#AE8225;text-decoration:none;">{{ preg_replace('~^https?://~', '', config('app.url')) }}</a>
    </td></tr>
</table>
</td></tr>
</table>
</body>
</html>
