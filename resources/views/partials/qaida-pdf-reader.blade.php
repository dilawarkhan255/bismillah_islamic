{{-- Norani Qaida PDF, shown page by page with PDF.js (works on phones too, unlike an <iframe>). Needs: $pdfUrl --}}
<div class="qd-reader" id="qdReader" data-src="{{ $pdfUrl }}">
    <div class="qd-reader-bar">
        <div class="qd-reader-group">
            <button type="button" class="qd-rbtn" data-act="prev" aria-label="Previous page"><i class="fas fa-chevron-left"></i></button>
            <span class="qd-reader-page">
                Page <input type="number" min="1" value="1" class="qd-reader-input" aria-label="Page number"> of <span class="qd-reader-total">…</span>
            </span>
            <button type="button" class="qd-rbtn" data-act="next" aria-label="Next page"><i class="fas fa-chevron-right"></i></button>
        </div>
        <div class="qd-reader-group">
            <button type="button" class="qd-rbtn" data-act="zoom-out" aria-label="Zoom out"><i class="fas fa-search-minus"></i></button>
            <button type="button" class="qd-rbtn" data-act="zoom-in" aria-label="Zoom in"><i class="fas fa-search-plus"></i></button>
            <button type="button" class="qd-rbtn" data-act="full" aria-label="Full screen"><i class="fas fa-expand"></i></button>
            <a href="{{ $pdfUrl }}" download class="qd-rbtn qd-rbtn--text" aria-label="Download PDF"><i class="fas fa-download"></i> <span>Download</span></a>
        </div>
    </div>

    <div class="qd-reader-stage">
        <div class="qd-reader-loading"><i class="fas fa-spinner fa-spin"></i> Loading Qaida…</div>
        <canvas class="qd-reader-canvas" aria-label="Norani Qaida page"></canvas>
        <div class="qd-reader-error" hidden>
            The PDF could not be shown here.
            <a href="{{ $pdfUrl }}" target="_blank">Open it in a new tab</a>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
(function () {
    var root = document.getElementById('qdReader');
    if (!root || !window.pdfjsLib) return;
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

    var canvas = root.querySelector('.qd-reader-canvas'),
        stage = root.querySelector('.qd-reader-stage'),
        input = root.querySelector('.qd-reader-input'),
        total = root.querySelector('.qd-reader-total'),
        loading = root.querySelector('.qd-reader-loading'),
        errorBox = root.querySelector('.qd-reader-error'),
        doc = null, page = 1, zoom = 1, rendering = false, pending = null, task = null;

    function render(num) {
        if (!doc) return;
        if (rendering) { pending = num; return; }
        rendering = true;
        doc.getPage(num).then(function (p) {
            var base = p.getViewport({ scale: 1 });
            var fit = (stage.clientWidth - 24) / base.width;           // fit the page to the reader width
            var viewport = p.getViewport({ scale: fit * zoom });
            var ratio = window.devicePixelRatio || 1;                   // sharp on phones / retina
            canvas.width = Math.floor(viewport.width * ratio);
            canvas.height = Math.floor(viewport.height * ratio);
            canvas.style.width = Math.floor(viewport.width) + 'px';
            canvas.style.height = Math.floor(viewport.height) + 'px';
            var ctx = canvas.getContext('2d');
            ctx.setTransform(ratio, 0, 0, ratio, 0, 0);
            task = p.render({ canvasContext: ctx, viewport: viewport });
            return task.promise;
        }).then(function () {
            rendering = false;
            loading.hidden = true;
            if (pending !== null) { var n = pending; pending = null; render(n); }
        }).catch(function () { rendering = false; });
        page = num;
        input.value = num;
    }

    function go(num) {
        if (!doc) return;
        num = Math.max(1, Math.min(doc.numPages, num));
        if (num !== page || !canvas.width) render(num);
        stage.scrollTop = 0;
    }

    pdfjsLib.getDocument({ url: root.dataset.src }).promise.then(function (pdf) {
        doc = pdf;
        total.textContent = pdf.numPages;
        input.max = pdf.numPages;
        render(1);
    }).catch(function () {
        loading.hidden = true;
        errorBox.hidden = false;
    });

    root.addEventListener('click', function (e) {
        var b = e.target.closest('[data-act]');
        if (!b) return;
        var act = b.dataset.act;
        if (act === 'prev') go(page - 1);
        if (act === 'next') go(page + 1);
        if (act === 'zoom-in') { zoom = Math.min(zoom + 0.25, 3); render(page); }
        if (act === 'zoom-out') { zoom = Math.max(zoom - 0.25, 0.5); render(page); }
        if (act === 'full') {
            if (document.fullscreenElement) document.exitFullscreen();
            else if (root.requestFullscreen) root.requestFullscreen();
        }
    });

    input.addEventListener('change', function () { go(parseInt(input.value, 10) || 1); });

    document.addEventListener('keydown', function (e) {
        if (e.target.matches('input, textarea')) return;
        if (e.key === 'ArrowRight') go(page + 1);
        if (e.key === 'ArrowLeft') go(page - 1);
    });

    // swipe on phones
    var sx = null;
    stage.addEventListener('touchstart', function (e) { sx = e.touches[0].clientX; }, { passive: true });
    stage.addEventListener('touchend', function (e) {
        if (sx === null || zoom > 1) return;
        var dx = e.changedTouches[0].clientX - sx;
        if (Math.abs(dx) > 60) go(page + (dx < 0 ? 1 : -1));
        sx = null;
    }, { passive: true });

    var t;
    window.addEventListener('resize', function () { clearTimeout(t); t = setTimeout(function () { render(page); }, 200); });
    document.addEventListener('fullscreenchange', function () { setTimeout(function () { render(page); }, 150); });
})();
</script>
@endpush
