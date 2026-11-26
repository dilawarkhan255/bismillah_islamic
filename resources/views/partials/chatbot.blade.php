{{--
  Chatbot on every public page. Quick-question buttons answer from Admin > Chatbot FAQs.
  Typed questions go to the AI assistant (POST /chat, App\Support\ChatAssistant) when an
  API key is set; otherwise, or if the AI is unavailable, they are matched against the FAQs
  (English and Roman Urdu keywords). When a person is needed it offers WhatsApp.
  Conversations are not stored.
--}}
@php
    $chatFaqs = \App\Support\ContentCache::remember('faqs.active', fn () => \App\Models\Faq::active()
        ->get(['id', 'question', 'answer', 'keywords', 'button_text', 'button_url'])
        ->map(fn ($f) => [
            'q' => $f->question, 'a' => $f->answer, 'k' => (string) $f->keywords,
            'bt' => $f->button_text, 'bu' => $f->button_url ? url($f->button_url) : null,
        ])->values()->all());
    $chatWa = preg_replace('/\D+/', '', (string) setting('whatsapp_float', '923141833216'));
    $chatAi = \App\Support\ChatAssistant::enabled();
@endphp
@if($chatFaqs)
<div class="cb" id="chatbot">
    <button type="button" class="cb-launch" aria-label="Ask a question" aria-expanded="false" aria-controls="cbPanel">
        <i class="fas fa-comment-dots cb-ico-open"></i><i class="fas fa-times cb-ico-close"></i>
    </button>
    <div class="cb-panel" id="cbPanel" role="dialog" aria-label="Questions and answers" hidden>
        <div class="cb-head">
            <div class="cb-avatar"><i class="fas fa-mosque"></i></div>
            <div><strong>Bismillah Assistant</strong><span>Answers in seconds</span></div>
            <button type="button" class="cb-close" aria-label="Close"><i class="fas fa-times"></i></button>
        </div>
        <div class="cb-body" aria-live="polite"></div>
        <form class="cb-form" autocomplete="off">
            <input type="text" class="cb-input" placeholder="Type your question…" maxlength="200" aria-label="Your question">
            <button type="submit" class="cb-send" aria-label="Send"><i class="fas fa-paper-plane"></i></button>
        </form>
    </div>
</div>

<style>
    .cb-launch { position: fixed; right: 20px; bottom: 148px; z-index: 998; width: 56px; height: 56px; border-radius: 50%; border: 0;
        background: var(--navy, #0D1B2A); color: var(--gold-light, #D4A843); font-size: 24px; cursor: pointer;
        box-shadow: 0 6px 20px rgba(0,0,0,.25); display: grid; place-items: center; transition: transform .25s; }
    .cb-launch:hover { transform: scale(1.06); }
    .cb-ico-close, .cb.is-open .cb-ico-open { display: none; }
    .cb.is-open .cb-ico-close { display: inline; }
    .cb-panel { position: fixed; right: 20px; bottom: 214px; z-index: 1055; width: 360px; max-width: calc(100vw - 32px);
        height: 520px; max-height: calc(100vh - 240px); background: #fff; display: flex; flex-direction: column;
        box-shadow: 0 18px 50px rgba(13,27,42,.28); border-radius: 14px; overflow: hidden; font-family: 'Inter', sans-serif; }
    .cb-panel[hidden] { display: none; }
    .cb-head { display: flex; align-items: center; gap: 12px; padding: 14px 16px; background: linear-gradient(135deg, #0D1B2A, #18324a); color: #fff; }
    .cb-head strong { display: block; font-size: 15px; }
    .cb-head span { font-size: 12px; color: rgba(255,255,255,.65); }
    .cb-avatar { width: 38px; height: 38px; border-radius: 50%; background: rgba(212,168,67,.18); color: #D4A843; display: grid; place-items: center; }
    .cb-close { margin-left: auto; background: none; border: 0; color: rgba(255,255,255,.7); font-size: 16px; cursor: pointer; }
    .cb-body { flex: 1; overflow-y: auto; padding: 16px; background: #faf7f0; display: flex; flex-direction: column; gap: 10px; }
    .cb-msg { max-width: 86%; padding: 10px 13px; border-radius: 14px; font-size: 14px; line-height: 1.55; white-space: pre-line; }
    .cb-bot { align-self: flex-start; background: #fff; color: #1a1a1a; border: 1px solid rgba(174,130,37,.18); border-bottom-left-radius: 4px; }
    .cb-user { align-self: flex-end; background: var(--gold, #AE8225); color: #fff; border-bottom-right-radius: 4px; }
    .cb-actions { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 8px; }
    .cb-btn { display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 16px; font-size: 12.5px; font-weight: 700; text-decoration: none; }
    .cb-btn--gold { background: var(--gold, #AE8225); color: #fff; }
    .cb-btn--wa { background: #25D366; color: #fff; }
    .cb-btn:hover { color: #fff; opacity: .9; }
    .cb-chips { display: flex; flex-wrap: wrap; gap: 6px; }
    .cb-chip { background: #fff; border: 1px solid rgba(174,130,37,.45); color: var(--navy, #0D1B2A); padding: 6px 11px; border-radius: 16px;
        font-size: 12.5px; cursor: pointer; text-align: left; font-family: inherit; }
    .cb-chip:hover { background: rgba(174,130,37,.1); }
    .cb-form { display: flex; gap: 8px; padding: 10px; border-top: 1px solid rgba(174,130,37,.18); background: #fff; }
    .cb-input { flex: 1; border: 1px solid rgba(174,130,37,.35); border-radius: 20px; padding: 9px 14px; font-size: 14px; font-family: inherit; outline: none; }
    .cb-input:focus { border-color: var(--gold, #AE8225); }
    .cb-typing span { display: inline-block; width: 7px; height: 7px; margin: 0 2px; border-radius: 50%; background: rgba(174,130,37,.6); animation: cbDot 1.2s infinite ease-in-out; }
    .cb-typing span:nth-child(2) { animation-delay: .15s; }
    .cb-typing span:nth-child(3) { animation-delay: .3s; }
    @keyframes cbDot { 0%, 80%, 100% { transform: scale(.6); opacity: .5; } 40% { transform: scale(1); opacity: 1; } }
    .cb-send { width: 40px; height: 40px; border-radius: 50%; border: 0; background: var(--navy, #0D1B2A); color: #D4A843; cursor: pointer; }
    @media (max-width: 575.98px) {
        .cb-launch { right: 14px; bottom: 140px; width: 52px; height: 52px; font-size: 22px; }
        .cb-panel { right: 8px; left: 8px; width: auto; max-width: none; bottom: 200px; height: auto; max-height: calc(100vh - 220px); }
    }
</style>

<script>
(function () {
    var faqs = @json($chatFaqs);
    var wa = @json($chatWa);
    var ai = @json($chatAi), aiUrl = @json(route('chat.reply')), csrf = @json(csrf_token());
    var history = [];   // text of this conversation, sent to the AI for context
    var root = document.getElementById('chatbot');
    if (!root) return;
    var panel = root.querySelector('.cb-panel'), body = root.querySelector('.cb-body'),
        launch = root.querySelector('.cb-launch'), input = root.querySelector('.cb-input'), started = false;

    var STOP = ('a an the is are am do does did you your i my me we our to of for in on at it this that what how ' +
        'can could will would should please tell about any have has with from and or kya hai hain ka ki ke ko mein me se ' +
        'aur bhi yeh ye wo woh aap ap mujhe hum kar karna sakta sakti chahiye').split(' ');

    function words(text) {
        return (text || '').toLowerCase().replace(/[^a-z0-9\s]/g, ' ').split(/\s+/)
            .filter(function (w) { return w.length > 1 && STOP.indexOf(w) === -1; });
    }

    function best(text) {
        var asked = words(text), joined = ' ' + text.toLowerCase() + ' ', top = null, topScore = 0;
        faqs.forEach(function (f) {
            var score = 0, qWords = words(f.q), keys = f.k.toLowerCase().split(',').map(function (k) { return k.trim(); }).filter(Boolean);
            keys.forEach(function (k) {
                if (k.indexOf(' ') > -1 && joined.indexOf(k) > -1) score += 4;           // phrase typed exactly
            });
            asked.forEach(function (w) {
                if (keys.indexOf(w) > -1) score += 3;
                else if (keys.some(function (k) { return k.length > 3 && w.length > 3 && (k.indexOf(w) === 0 || w.indexOf(k) === 0); })) score += 2;
                if (qWords.indexOf(w) > -1) score += 1;
            });
            if (score > topScore) { topScore = score; top = f; }
        });
        return topScore >= 2 ? top : null;
    }

    function add(cls, text) {
        var el = document.createElement('div');
        el.className = 'cb-msg ' + cls;
        el.textContent = text;
        body.appendChild(el);
        body.scrollTop = body.scrollHeight;
        return el;
    }

    function link(parent, cls, href, html, external) {
        var a = document.createElement('a');
        a.className = 'cb-btn ' + cls; a.href = href; a.innerHTML = html;
        if (external) { a.target = '_blank'; a.rel = 'noopener'; }
        parent.appendChild(a);
    }

    function waLink(question) {
        return 'https://wa.me/' + wa + '?text=' + encodeURIComponent('Assalamu Alaikum, ' + (question || 'I have a question about your classes.'));
    }

    function chips(list) {
        var wrap = document.createElement('div');
        wrap.className = 'cb-chips';
        list.forEach(function (f) {
            var b = document.createElement('button');
            b.type = 'button'; b.className = 'cb-chip'; b.textContent = f.q;
            b.addEventListener('click', function () { ask(f.q, f); });
            wrap.appendChild(b);
        });
        body.appendChild(wrap);
        body.scrollTop = body.scrollHeight;
    }

    function answer(f, question) {
        var el = add('cb-bot', f ? f.a : "Sorry, I don't have an answer for that yet. Our team will gladly help you on WhatsApp.");
        var actions = document.createElement('div');
        actions.className = 'cb-actions';
        if (f && f.bt && f.bu) link(actions, 'cb-btn--gold', f.bu, f.bt);
        if (!f || !f.bu) link(actions, 'cb-btn--wa', waLink(f ? null : question), '<i class="fab fa-whatsapp"></i> Ask on WhatsApp', true);
        if (actions.children.length) el.appendChild(actions);
    }

    function remember(role, text) {
        history.push({ role: role, content: String(text).slice(0, 1000) });
        while (history.length > 11) history.shift();
        while (history.length && history[0].role !== 'user') history.shift();
    }

    function faqReply(text, known) {
        var f = known || best(text);
        answer(f, text);
        remember('assistant', f ? f.a : 'Please ask the team on WhatsApp.');
        chips(faqs.filter(function (x) { return x !== f; }).slice(0, 3));
    }

    function aiReply(text) {
        var typing = add('cb-bot cb-typing', '');
        typing.innerHTML = '<span></span><span></span><span></span>';
        fetch(aiUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf },
            body: JSON.stringify({ messages: history })
        })
            .then(function (r) { return r.ok ? r.json() : Promise.reject(r.status); })
            .then(function (data) {
                typing.remove();
                var el = add('cb-bot', data.reply);
                remember('assistant', data.reply);
                if (data.whatsapp) {
                    var actions = document.createElement('div');
                    actions.className = 'cb-actions';
                    link(actions, 'cb-btn--wa', waLink(text), '<i class="fab fa-whatsapp"></i> Continue on WhatsApp', true);
                    el.appendChild(actions);
                }
            })
            .catch(function () { typing.remove(); faqReply(text); });
    }

    function ask(text, known) {
        add('cb-user', text);
        remember('user', text);
        if (!known && ai) { aiReply(text); return; }
        setTimeout(function () { faqReply(text, known); }, 350);
    }

    function open(show) {
        panel.hidden = !show;
        root.classList.toggle('is-open', show);
        launch.setAttribute('aria-expanded', show ? 'true' : 'false');
        if (show && !started) {
            started = true;
            add('cb-bot', 'Assalamu Alaikum! 👋 How can we help you? Tap a question or type your own.');
            chips(faqs.slice(0, 6));
        }
        if (show) setTimeout(function () { input.focus(); }, 50);
    }

    launch.addEventListener('click', function () { open(panel.hidden); });
    root.querySelector('.cb-close').addEventListener('click', function () { open(false); });
    root.querySelector('.cb-form').addEventListener('submit', function (e) {
        e.preventDefault();
        var text = input.value.trim();
        if (!text) return;
        input.value = '';
        ask(text);
    });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) open(false); });
})();
</script>
@endif
