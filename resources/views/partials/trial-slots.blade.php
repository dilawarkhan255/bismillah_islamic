{{--
  Free trial slot picker: shows the open trial times (Admin > Settings, Pakistan time)
  for the next two weeks in the visitor's own timezone. Picking one fills the
  "Preferred Timing" select (#ftTiming). Without JavaScript the plain select still works.
--}}
@php
    $slotDays = array_values(array_filter(array_map('intval', explode(',', (string) setting('trial_days', '1,2,3,4,5,6')))));
    $slotFrom = (string) setting('trial_hours_from', '18:00');
    $slotTo = (string) setting('trial_hours_to', '03:00');
    $toMin = fn ($t) => preg_match('/^(\d{1,2}):(\d{2})$/', trim($t), $m) ? ((int) $m[1]) * 60 + (int) $m[2] : null;
    $slotConfig = [
        'days' => $slotDays,                       // ISO weekdays, 1 = Monday
        'from' => $toMin($slotFrom) ?? 900,
        'to'   => $toMin($slotTo) ?? 180,
        'step' => max(15, (int) setting('trial_slot_minutes', 30)),
        'noticeHours' => 3,
        'days_ahead' => 14,
    ];
    if ($slotConfig['to'] <= $slotConfig['from']) {
        $slotConfig['to'] += 1440; // e.g. 6 PM to 3 AM runs past midnight
    }
@endphp
<div class="col-12" id="trialSlots" hidden>
    <div class="ts-box">
        <div class="ts-head">
            <span><i class="far fa-calendar-check"></i> Pick a time for your free class</span>
            <small class="ts-tz"></small>
        </div>
        <div class="ts-days" role="tablist" aria-label="Day"></div>
        <div class="ts-times" aria-label="Time"></div>
        <div class="ts-picked" hidden><i class="fas fa-check-circle"></i> <span></span></div>
    </div>
</div>

@push('styles')
<style>
    .ts-box { border: 1px solid rgba(174,130,37,.3); background: rgba(174,130,37,.04); padding: 16px; }
    .ts-head { display:flex; justify-content:space-between; align-items:center; gap:10px; flex-wrap:wrap; margin-bottom:12px; font-family:'Cinzel',serif; color:var(--navy); font-size:14px; font-weight:700; }
    .ts-head i { color: var(--gold); margin-right: 6px; }
    .ts-tz { font-family:'Lato',sans-serif; font-weight:400; color:#888; font-size:12px; }
    .ts-days { display:flex; gap:8px; overflow-x:auto; padding-bottom:6px; margin-bottom:10px; }
    .ts-day { flex:0 0 auto; min-width:68px; padding:8px 6px; text-align:center; border:1px solid rgba(174,130,37,.3); background:#fff; cursor:pointer; font-family:'Lato',sans-serif; color:var(--navy); }
    .ts-day strong { display:block; font-size:16px; }
    .ts-day small { font-size:11px; text-transform:uppercase; letter-spacing:1px; color:#888; }
    .ts-day.is-on { background: var(--gold); border-color: var(--gold); color:#fff; }
    .ts-day.is-on small { color: rgba(255,255,255,.85); }
    .ts-times { display:flex; flex-wrap:wrap; gap:8px; }
    .ts-time { padding:7px 12px; border:1px solid rgba(174,130,37,.3); background:#fff; cursor:pointer; font:600 13px 'Lato',sans-serif; color:var(--navy); }
    .ts-time.is-on { background: var(--navy); border-color: var(--navy); color: var(--gold-light, #e8c97a); }
    .ts-picked { margin-top:12px; color:#0f766e; font-weight:700; font-size:14px; }
    [data-theme="dark"] .ts-day, [data-theme="dark"] .ts-time { background: transparent; color: #f0efe8; }
</style>
@endpush

@push('scripts')
<script>
(function () {
    var cfg = @json($slotConfig);
    var box = document.getElementById('trialSlots');
    var select = document.getElementById('ftTiming');
    if (!box || !select || !window.Intl || !cfg.days.length) return;

    var visitorTz = Intl.DateTimeFormat().resolvedOptions().timeZone || 'UTC';
    var place = visitorTz.split('/').pop().replace(/_/g, ' ');
    var fmt = function (opts, tz) { return new Intl.DateTimeFormat('en-GB', Object.assign({ timeZone: tz || visitorTz }, opts)); };
    var dayKey = fmt({ year: 'numeric', month: '2-digit', day: '2-digit' });
    var dayName = fmt({ weekday: 'short' });
    var dayNum = fmt({ day: 'numeric', month: 'short' });
    var timeFmt = new Intl.DateTimeFormat('en-US', { timeZone: visitorTz, hour: 'numeric', minute: '2-digit' });
    var pkTime = new Intl.DateTimeFormat('en-US', { timeZone: 'Asia/Karachi', hour: 'numeric', minute: '2-digit' });
    var pkLong = fmt({ weekday: 'short', day: 'numeric', month: 'short' }, 'Asia/Karachi');

    // today's date in Pakistan
    var parts = {};
    new Intl.DateTimeFormat('en-US', { timeZone: 'Asia/Karachi', year: 'numeric', month: 'numeric', day: 'numeric' })
        .formatToParts(new Date()).forEach(function (p) { parts[p.type] = Number(p.value); });

    var earliest = Date.now() + cfg.noticeHours * 3600 * 1000;
    var groups = {}, order = [];
    for (var i = 0; i < cfg.days_ahead; i++) {
        var midnightUtc = Date.UTC(parts.year, parts.month - 1, parts.day + i);
        var iso = new Date(midnightUtc).getUTCDay() || 7;
        if (cfg.days.indexOf(iso) === -1) continue;
        for (var m = cfg.from; m < cfg.to; m += cfg.step) {
            var at = new Date(midnightUtc + (m - 300) * 60000);   // Pakistan is UTC+5 all year
            if (at.getTime() < earliest) continue;
            var key = dayKey.format(at);
            if (!groups[key]) { groups[key] = { date: at, slots: [] }; order.push(key); }
            groups[key].slots.push(at);
        }
    }
    if (!order.length) return;

    var daysEl = box.querySelector('.ts-days'), timesEl = box.querySelector('.ts-times'), picked = box.querySelector('.ts-picked');
    var samePk = timeFmt.format(new Date()) === pkTime.format(new Date());
    box.querySelector('.ts-tz').textContent = samePk ? 'Pakistan time' : 'Times shown in your time (' + place + ')';

    function showDay(key, btn) {
        daysEl.querySelectorAll('.ts-day').forEach(function (b) { b.classList.toggle('is-on', b === btn); });
        timesEl.innerHTML = '';
        groups[key].slots.forEach(function (at) {
            var t = document.createElement('button');
            t.type = 'button'; t.className = 'ts-time'; t.textContent = timeFmt.format(at);
            t.addEventListener('click', function () {
                timesEl.querySelectorAll('.ts-time').forEach(function (b) { b.classList.toggle('is-on', b === t); });
                var label = dayName.format(at) + ' ' + dayNum.format(at) + ', ' + timeFmt.format(at)
                    + (samePk ? ' (Pakistan)' : ' ' + place + ' time = ' + pkLong.format(at) + ' ' + pkTime.format(at) + ' PK');
                var opt = select.querySelector('option[data-slot]') || document.createElement('option');
                opt.setAttribute('data-slot', '1'); opt.value = label; opt.textContent = 'Selected: ' + label;
                if (!opt.parentNode) select.insertBefore(opt, select.options[1] || null);
                select.value = label;
                picked.hidden = false; picked.querySelector('span').textContent = label;
            });
            timesEl.appendChild(t);
        });
    }

    order.forEach(function (key, idx) {
        var g = groups[key], b = document.createElement('button');
        b.type = 'button'; b.className = 'ts-day';
        b.innerHTML = '<small>' + dayName.format(g.date) + '</small><strong>' + dayNum.format(g.date) + '</strong>';
        b.addEventListener('click', function () { showDay(key, b); });
        daysEl.appendChild(b);
        if (idx === 0) showDay(key, b);
    });

    select.options[0].textContent = 'Pick a time below, or choose:';
    box.hidden = false;
})();
</script>
@endpush
