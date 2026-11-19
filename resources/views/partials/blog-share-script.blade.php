{{-- Share buttons (.js-share with data-url / data-title): native share sheet on phones,
     otherwise copy the link to the clipboard. --}}
<script>
    (function () {
        function toast(msg) {
            if (window.Swal) {
                Swal.fire({ toast: true, position: 'bottom', icon: 'success', title: msg, timer: 2200, showConfirmButton: false });
            } else {
                alert(msg);
            }
        }

        document.addEventListener('click', function (e) {
            var btn = e.target.closest('.js-share');
            if (!btn) return;
            e.preventDefault();
            var url = btn.dataset.url || location.href;
            var title = btn.dataset.title || document.title;

            if (navigator.share) {
                navigator.share({ title: title, url: url }).catch(function () {});
            } else if (navigator.clipboard) {
                navigator.clipboard.writeText(url).then(function () { toast('Link copied'); });
            } else {
                window.prompt('Copy this link:', url);
            }
        });
    })();
</script>
