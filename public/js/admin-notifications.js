// Admin Real-time Notifications — Vanilla JS
(function () {
    var notifCount = 0;
    var notifList = document.getElementById('notif-list');
    var notifBadge = document.getElementById('notif-badge');

    window.loadNotifications = function () {
        fetch('/admin/notifications', {
            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(function (r) { return r.json(); })
        .then(function (data) {
            if (!data || data.length === 0) return;
            notifList.innerHTML = '';
            data.forEach(function (n) {
                var d = n.data || {};
                var icon = 'bi-envelope';
                var color = 'bg-info';
                if (d.type === 'new_enrollment') { icon = 'bi-person-plus'; color = 'bg-success'; }
                if (d.type === 'new_free_trial') { icon = 'bi-calendar-check'; color = 'bg-primary'; }

                var html = '<a href="' + (d.url || '#') + '" class="dropdown-item py-2 border-bottom">' +
                    '<div class="d-flex align-items-start gap-2">' +
                    '<div class="rounded-circle ' + color + ' text-white d-flex align-items-center justify-content-center" style="width:32px;height:32px;flex-shrink:0;font-size:13px;">' +
                    '<i class="bi ' + icon + '"></i></div>' +
                    '<div><div class="fw-semibold" style="font-size:13px;">' + (d.title || 'Notification') + '</div>' +
                    '<div class="text-muted" style="font-size:12px;">' + (d.message || '') + '</div>' +
                    '<div class="text-muted" style="font-size:11px;">Just now</div></div></div></a>';
                notifList.insertAdjacentHTML('beforeend', html);
                notifCount++;
            });
            if (notifCount > 0) {
                notifBadge.style.display = 'inline';
                notifBadge.textContent = notifCount;
            }
        });
    };

    window.markAllRead = function () {
        fetch('/admin/notifications/read', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), 'Accept': 'application/json' }
        }).then(function () {
            notifCount = 0;
            notifBadge.style.display = 'none';
            notifList.innerHTML = '<p class="text-center text-muted py-3" style="font-size:13px;">No new notifications</p>';
        });
    };

    // Poll every 30 seconds
    setInterval(function () {
        if (typeof loadNotifications === 'function') loadNotifications();
    }, 30000);
})();
