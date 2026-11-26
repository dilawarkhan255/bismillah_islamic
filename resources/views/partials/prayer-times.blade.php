{{--
  Today's Hijri date and prayer times for Pakistan (Islamabad), the UK (London) and the USA (New York).
  The visitor's own country opens first. Hijri date: the browser's Umm al-Qura calendar.
  Prayer times: api.aladhan.com (free, no key), Hanafi Asr, each country's usual calculation
  method, cached per day. If a request fails only the Hijri date is shown.
--}}
<div class="pt-bar" id="prayerBar" hidden>
    <div class="container">
        <div class="pt-inner">
            <div class="pt-date">
                <i class="fas fa-moon"></i>
                <span class="pt-hijri"></span>
                <small class="pt-city"></small>
            </div>
            <div class="pt-right">
                <div class="pt-tabs" role="tablist" aria-label="Country">
                    <button type="button" role="tab" data-place="pk">Pakistan</button>
                    <button type="button" role="tab" data-place="uk">UK</button>
                    <button type="button" role="tab" data-place="us">USA</button>
                </div>
                <ul class="pt-list" hidden></ul>
            </div>
        </div>
    </div>
</div>

<style>
    /* Light band between the page and the dark footer, so the two never blend */
    .pt-bar { background: var(--light-bg, #F1ECE0); border-top: 1px solid var(--border, rgba(174,130,37,.25)); color: var(--text-dark, #0D1B2A); font-family: 'Inter', sans-serif; }
    .pt-inner { display: flex; align-items: center; justify-content: space-between; gap: 14px 24px; flex-wrap: wrap; padding: 16px 0; }
    .pt-date { display: flex; align-items: baseline; gap: 10px; flex-wrap: wrap; }
    .pt-date i { color: var(--gold); }
    .pt-hijri { color: var(--gold-dark, #7A5A18); font-size: 15px; font-weight: 700; }
    .pt-city { color: var(--text-muted, #7A8FA0); font-size: 12px; }
    .pt-list { display: flex; flex-wrap: wrap; gap: 8px; list-style: none; margin: 0; padding: 0; }
    .pt-list li { padding: 6px 12px; background: var(--white, #fff); border: 1px solid var(--border-soft, rgba(174,130,37,.12)); border-radius: 6px;
        box-shadow: 0 2px 8px rgba(13,27,42,.05); font-size: 13px; font-weight: 600; text-align: center; min-width: 74px; color: var(--navy, #0D1B2A); }
    .pt-list li small { display: block; font-size: 10px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: var(--text-muted, #7A8FA0); }
    .pt-list li.is-next { background: var(--gold); border-color: var(--gold); color: #fff; box-shadow: 0 4px 12px rgba(174,130,37,.3); }
    .pt-list li.is-next small { color: rgba(255,255,255,.9); }
    [data-theme="dark"] .pt-bar { background: #142536; color: #e9e4d8; border-top-color: rgba(174,130,37,.3); }
    [data-theme="dark"] .pt-list li { background: rgba(255,255,255,.05); color: #e9e4d8; border-color: rgba(174,130,37,.25); }
    [data-theme="dark"] .pt-hijri { color: var(--gold-light, #D4A843); }
    .pt-right { display: flex; align-items: center; gap: 14px; flex-wrap: wrap; }
    .pt-tabs { display: inline-flex; background: var(--white, #fff); border: 1px solid var(--border-soft, rgba(174,130,37,.12)); border-radius: 30px; padding: 3px; }
    .pt-tabs button { border: 0; background: none; padding: 6px 14px; border-radius: 30px; font: 700 12px/1 'Inter', sans-serif; color: var(--text-mid, #3D4F61); cursor: pointer; }
    .pt-tabs button.on { background: var(--navy, #0D1B2A); color: var(--gold-light, #D4A843); }
    [data-theme="dark"] .pt-tabs { background: rgba(255,255,255,.05); }
    [data-theme="dark"] .pt-tabs button { color: #e9e4d8; }
    @media (max-width: 575.98px) { .pt-list li { min-width: 0; flex: 1 0 28%; } .pt-right { width: 100%; } }
</style>

<script>
(function () {
    var bar = document.getElementById('prayerBar');
    if (!bar || !window.Intl || !window.fetch) return;

    try {
        bar.querySelector('.pt-hijri').textContent = new Intl.DateTimeFormat('en-u-ca-islamic-umalqura', { day: 'numeric', month: 'long', year: 'numeric' })
            .format(new Date()).replace(/\s?AH$/, '') + ' AH';
    } catch (e) { return; }
    bar.hidden = false;

    // city, its timezone, and the calculation method its mosques usually follow
    var PLACES = {
        pk: { city: 'Islamabad', country: 'Pakistan', tz: 'Asia/Karachi', method: 1 },
        uk: { city: 'London', country: 'United Kingdom', tz: 'Europe/London', method: 15 },
        us: { city: 'New York', country: 'United States', tz: 'America/New_York', method: 2 }
    };
    var NAMES = ['Fajr', 'Sunrise', 'Dhuhr', 'Asr', 'Maghrib', 'Isha'];
    var list = bar.querySelector('.pt-list'), label = bar.querySelector('.pt-city');

    function partsIn(tz) {   // today's date and the current minute in that place
        var p = {};
        new Intl.DateTimeFormat('en-GB', { timeZone: tz, year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', hour12: false })
            .formatToParts(new Date()).forEach(function (x) { p[x.type] = x.value; });
        return { date: p.day + '-' + p.month + '-' + p.year, minutes: (Number(p.hour) % 24) * 60 + Number(p.minute) };
    }

    function show(key, timings) {
        var place = PLACES[key], now = partsIn(place.tz).minutes, nextFound = false;
        list.innerHTML = '';
        NAMES.forEach(function (n) {
            var hm = String(timings[n] || '').slice(0, 5);
            if (!/^\d{2}:\d{2}$/.test(hm)) return;
            var mins = Number(hm.slice(0, 2)) * 60 + Number(hm.slice(3));
            var li = document.createElement('li');
            li.innerHTML = '<small>' + n + '</small>' + (((Number(hm.slice(0, 2)) + 11) % 12) + 1) + ':' + hm.slice(3);
            if (!nextFound && n !== 'Sunrise' && mins > now) { li.className = 'is-next'; nextFound = true; }
            list.appendChild(li);
        });
        label.textContent = 'Prayer times in ' + place.city + ' (local time)';
        list.hidden = false;
    }

    function load(key) {
        bar.querySelectorAll('.pt-tabs button').forEach(function (b) {
            var on = b.dataset.place === key;
            b.classList.toggle('on', on);
            b.setAttribute('aria-selected', on ? 'true' : 'false');
        });
        var place = PLACES[key], date = partsIn(place.tz).date, cacheKey = 'prayer:' + key + ':' + date;
        try {
            var cached = localStorage.getItem(cacheKey);
            if (cached) { show(key, JSON.parse(cached)); return; }
        } catch (e) {}
        fetch('https://api.aladhan.com/v1/timingsByCity/' + date + '?city=' + encodeURIComponent(place.city) +
              '&country=' + encodeURIComponent(place.country) + '&method=' + place.method + '&school=1')
            .then(function (r) { return r.ok ? r.json() : null; })
            .then(function (j) {
                if (!j || !j.data || !j.data.timings) return;
                try { localStorage.setItem(cacheKey, JSON.stringify(j.data.timings)); } catch (e) {}
                show(key, j.data.timings);
            })
            .catch(function () {});
    }

    bar.querySelectorAll('.pt-tabs button').forEach(function (b) {
        b.addEventListener('click', function () { load(b.dataset.place); });
    });

    // open the visitor's own country first
    var tz = Intl.DateTimeFormat().resolvedOptions().timeZone || '';
    load(/^Europe\/(London|Belfast)/.test(tz) ? 'uk' : (/^America\//.test(tz) ? 'us' : 'pk'));
})();
</script>
