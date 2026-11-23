{{--
  Today's Hijri date and prayer times for the visitor's city (from their browser timezone).
  Hijri date: the browser's Umm al-Qura calendar. Prayer times: api.aladhan.com (free, no key),
  Hanafi Asr, cached for the day. If the request fails only the Hijri date is shown.
--}}
<div class="pt-bar" id="prayerBar" hidden>
    <div class="container">
        <div class="pt-inner">
            <div class="pt-date">
                <i class="fas fa-moon"></i>
                <span class="pt-hijri"></span>
                <small class="pt-city"></small>
            </div>
            <ul class="pt-list" hidden></ul>
        </div>
    </div>
</div>

<style>
    .pt-bar { background: #0a1622; border-top: 2px solid var(--gold); color: #e9e4d8; font-family: 'Lato', sans-serif; }
    .pt-inner { display: flex; align-items: center; justify-content: space-between; gap: 14px 24px; flex-wrap: wrap; padding: 14px 0; }
    .pt-date { display: flex; align-items: baseline; gap: 10px; flex-wrap: wrap; }
    .pt-date i { color: var(--gold); }
    .pt-hijri { font-family: 'Cinzel', serif; color: var(--gold-light, #e8c97a); font-size: 15px; font-weight: 700; }
    .pt-city { color: rgba(255,255,255,.5); font-size: 12px; }
    .pt-list { display: flex; flex-wrap: wrap; gap: 6px; list-style: none; margin: 0; padding: 0; }
    .pt-list li { padding: 5px 12px; border: 1px solid rgba(174,130,37,.3); font-size: 13px; text-align: center; min-width: 74px; }
    .pt-list li small { display: block; font-size: 10px; letter-spacing: 1px; text-transform: uppercase; color: rgba(255,255,255,.5); }
    .pt-list li.is-next { background: var(--gold); border-color: var(--gold); color: #fff; }
    .pt-list li.is-next small { color: rgba(255,255,255,.85); }
    @media (max-width: 575.98px) { .pt-list li { min-width: 0; flex: 1 0 28%; } }
</style>

<script>
(function () {
    var bar = document.getElementById('prayerBar');
    if (!bar || !window.Intl || !window.fetch) return;

    var tz = Intl.DateTimeFormat().resolvedOptions().timeZone || 'Asia/Karachi';
    try {
        bar.querySelector('.pt-hijri').textContent = new Intl.DateTimeFormat('en-u-ca-islamic-umalqura', { day: 'numeric', month: 'long', year: 'numeric' })
            .format(new Date()).replace(/\s?AH$/, '') + ' AH';
    } catch (e) { return; }
    bar.hidden = false;

    var city = tz.indexOf('/') > -1 ? tz.split('/').pop().replace(/_/g, ' ') : 'Karachi';
    // calculation method the local mosques usually follow
    var method = /^Asia\/(Karachi|Kolkata|Calcutta|Dhaka)/.test(tz) ? 1
        : /^America\//.test(tz) ? 2
        : /^Asia\/(Riyadh|Aden)/.test(tz) ? 4
        : /^Asia\/(Dubai|Muscat)/.test(tz) ? 16
        : /^Asia\/Qatar/.test(tz) ? 10
        : /^Asia\/Kuwait/.test(tz) ? 9
        : /^Europe\/(London|Dublin)/.test(tz) ? 15
        : 3;

    var d = new Date();
    var today = ('0' + d.getDate()).slice(-2) + '-' + ('0' + (d.getMonth() + 1)).slice(-2) + '-' + d.getFullYear();
    var cacheKey = 'prayer:' + tz + ':' + today;

    function show(t) {
        var names = [['Fajr', 'Fajr'], ['Sunrise', 'Sunrise'], ['Dhuhr', 'Dhuhr'], ['Asr', 'Asr'], ['Maghrib', 'Maghrib'], ['Isha', 'Isha']];
        var now = d.getHours() * 60 + d.getMinutes(), nextFound = false, list = bar.querySelector('.pt-list');
        names.forEach(function (n) {
            var hm = String(t[n[0]] || '').slice(0, 5);
            if (!/^\d{2}:\d{2}$/.test(hm)) return;
            var mins = Number(hm.slice(0, 2)) * 60 + Number(hm.slice(3));
            var h12 = ((Number(hm.slice(0, 2)) + 11) % 12 + 1) + ':' + hm.slice(3);
            var li = document.createElement('li');
            li.innerHTML = '<small>' + n[1] + '</small>' + h12;
            if (!nextFound && n[0] !== 'Sunrise' && mins > now) { li.className = 'is-next'; nextFound = true; }
            list.appendChild(li);
        });
        bar.querySelector('.pt-city').textContent = 'Prayer times for ' + city;
        list.hidden = false;
    }

    try {
        var cached = localStorage.getItem(cacheKey);
        if (cached) { show(JSON.parse(cached)); return; }
    } catch (e) {}

    fetch('https://api.aladhan.com/v1/timingsByAddress/' + today + '?address=' + encodeURIComponent(city) + '&method=' + method + '&school=1')
        .then(function (r) { return r.ok ? r.json() : null; })
        .then(function (j) {
            if (!j || !j.data || !j.data.timings) return;
            try { localStorage.setItem(cacheKey, JSON.stringify(j.data.timings)); } catch (e) {}
            show(j.data.timings);
        })
        .catch(function () {});
})();
</script>
