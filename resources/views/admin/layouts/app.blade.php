<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Admin') | Bismillah Academy</title>
  <link rel="icon" href="{{ asset('storage/logo.png') }}" type="image/png">

  <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-assets/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
  <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/admin-ui.css') }}?v={{ @filemtime(public_path('admin-assets/assets/css/admin-ui.css')) }}">

  @stack('styles')
</head>
<body>
  <script>
    try { if (localStorage.getItem('adminHMD.sidebarMini') === 'true' && window.matchMedia('(min-width: 992px)').matches) document.body.classList.add('sidebar-mini'); } catch (e) {}
  </script>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

    <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
      <div class="sidebar-header">
        <a class="brand-mark" href="{{ route('dashboard') }}" data-sidebar-close aria-label="Bismillah Islamic Academy admin home">
          <span class="brand-logo">
            <img src="{{ setting('img_logo') ? asset('storage/' . setting('img_logo')) : asset('storage/logo.png') }}" alt="Bismillah Islamic Academy">
          </span>
          <span class="brand-subtitle">Admin Panel</span>
        </a>
      </div>

      <nav class="sidebar-nav">

        {{-- Each link needs its permission (App\Support\AdminPermissions). Admin sees everything. --}}

        @can('view dashboard')
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
          <span class="nav-text">Dashboard</span>
        </a>
        @endcan

        @role(\App\Support\AdminPermissions::ADMIN_ROLE)
        <div class="nav-section-label">Classes</div>
        <a class="nav-link {{ request()->routeIs('admin.classes.*') ? 'active' : '' }}" href="{{ route('admin.classes.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-calendar-week" aria-hidden="true"></i></span>
          <span class="nav-text">Timetable</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.students.*') ? 'active' : '' }}" href="{{ route('admin.students.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-mortarboard" aria-hidden="true"></i></span>
          <span class="nav-text">Students</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.fees.*') ? 'active' : '' }}" href="{{ route('admin.fees.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-cash-coin" aria-hidden="true"></i></span>
          <span class="nav-text">Fees</span>
        </a>
        @endrole

        @canany(['manage enrollments', 'manage free trials', 'manage messages'])
        <div class="nav-section-label">Inbox</div>
        @endcanany

        @can('manage enrollments')
        <a class="nav-link {{ request()->routeIs('admin.enrollments.*') ? 'active' : '' }}" href="{{ route('admin.enrollments.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
          <span class="nav-text">Enrollments</span>
          @php $pendingEnrollments = \App\Models\Enrollment::where('status', 'pending')->count(); @endphp
          @if($pendingEnrollments > 0)
            <span class="badge" style="background:var(--admin-warning);color:#fff;margin-left:auto;">{{ $pendingEnrollments }}</span>
          @endif
        </a>
        @endcan

        @can('manage free trials')
        <a class="nav-link {{ request()->routeIs('admin.free-trials.*') ? 'active' : '' }}" href="{{ route('admin.free-trials.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-calendar-check" aria-hidden="true"></i></span>
          <span class="nav-text">Free Trials</span>
          @php $pendingTrials = \App\Models\FreeTrial::where('status', 'pending')->count(); @endphp
          @if($pendingTrials > 0)
            <span class="badge" style="background:var(--admin-warning);color:#fff;margin-left:auto;">{{ $pendingTrials }}</span>
          @endif
        </a>
        @endcan

        @can('manage messages')
        <a class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-envelope" aria-hidden="true"></i></span>
          <span class="nav-text">Messages</span>
          @php $unreadMessages = \App\Models\Message::where('is_read', false)->count(); @endphp
          @if($unreadMessages > 0)
            <span class="badge" style="background:var(--admin-danger);color:#fff;margin-left:auto;">{{ $unreadMessages }}</span>
          @endif
        </a>
        @endcan

        @canany(['manage courses', 'manage teachers', 'manage team members', 'manage blog', 'manage testimonials', 'manage gallery', 'manage qaida'])
        <div class="nav-section-label">Website content</div>
        @endcanany

        @can('manage courses')
        <a class="nav-link {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}" href="{{ route('admin.courses.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-book" aria-hidden="true"></i></span>
          <span class="nav-text">Courses</span>
        </a>
        @endcan

        @can('manage teachers')
        <a class="nav-link {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}" href="{{ route('admin.teachers.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-person-badge" aria-hidden="true"></i></span>
          <span class="nav-text">Teachers</span>
        </a>
        @endcan

        @can('manage team members')
        <a class="nav-link {{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}" href="{{ route('admin.team-members.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
          <span class="nav-text">Team Members</span>
        </a>
        @endcan

        @can('manage blog')
        <a class="nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}" href="{{ route('admin.blog.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-journal-text" aria-hidden="true"></i></span>
          <span class="nav-text">Blog Posts</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}" href="{{ route('admin.blog-categories.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-tags" aria-hidden="true"></i></span>
          <span class="nav-text">Categories</span>
        </a>
        @endcan

        @can('manage testimonials')
        <a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}" href="{{ route('admin.testimonials.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-chat-quote" aria-hidden="true"></i></span>
          <span class="nav-text">Testimonials</span>
        </a>
        @endcan

        @can('manage qaida')
        <a class="nav-link {{ request()->routeIs('admin.qaida.*') ? 'active' : '' }}" href="{{ route('admin.qaida.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-book-half" aria-hidden="true"></i></span>
          <span class="nav-text">Norani Qaida</span>
        </a>
        @endcan

        @can('manage gallery')
        <a class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}" href="{{ route('admin.gallery.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-images" aria-hidden="true"></i></span>
          <span class="nav-text">Gallery</span>
        </a>
        @endcan

        {{-- Editors reach page blocks here; admins use "Page Content" below --}}
        @can('manage sections')
          @cannot('manage page content')
        <a class="nav-link {{ request()->routeIs('admin.sections.*') ? 'active' : '' }}" href="{{ route('admin.sections.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-layout-text-window" aria-hidden="true"></i></span>
          <span class="nav-text">Page Blocks</span>
        </a>
          @endcannot
        @endcan

        @canany(['manage hero slides', 'manage pricing', 'manage page content', 'manage settings'])
        <div class="nav-section-label">Site setup</div>
        @endcanany

        @can('manage hero slides')
        <a class="nav-link {{ request()->routeIs('admin.hero-slides.*') ? 'active' : '' }}" href="{{ route('admin.hero-slides.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-easel" aria-hidden="true"></i></span>
          <span class="nav-text">Hero Slides</span>
        </a>
        @endcan

        @can('manage pricing')
        <a class="nav-link {{ request()->routeIs('admin.pricing.*') ? 'active' : '' }}" href="{{ route('admin.pricing.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-cash-stack" aria-hidden="true"></i></span>
          <span class="nav-text">Pricing</span>
        </a>
        @endcan

        @can('manage page content')
        <a class="nav-link {{ request()->routeIs('admin.page-content.*') ? 'active' : '' }}" href="{{ route('admin.page-content.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-file-earmark-text" aria-hidden="true"></i></span>
          <span class="nav-text">Page Content</span>
        </a>
        @endcan

        @can('manage settings')
        <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-gear" aria-hidden="true"></i></span>
          <span class="nav-text">Settings</span>
        </a>
        @endcan

        @role('admin')
        <div class="nav-section-label">Administration</div>
        <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-person-gear" aria-hidden="true"></i></span>
          <span class="nav-text">Users</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-shield-lock" aria-hidden="true"></i></span>
          <span class="nav-text">Roles &amp; Permissions</span>
        </a>
        @endrole

      </nav>

      @php $user = Auth::user(); @endphp
      <div class="sidebar-user">
        @if($user && $user->avatar)
          <img class="sidebar-user-avatar" src="{{ asset('storage/' . $user->avatar) }}" alt="">
        @else
          <span class="sidebar-user-avatar">{{ strtoupper(mb_substr($user->name ?? 'A', 0, 1)) }}</span>
        @endif
        <span class="sidebar-user-info">
          <strong>{{ $user->name ?? 'Admin' }}</strong>
          <small>{{ ucfirst($user->getRoleNames()->first() ?? 'User') }}</small>
        </span>
        <form action="{{ route('logout') }}" method="POST" class="sidebar-user-logout">
          @csrf
          <button type="submit" title="Sign out" aria-label="Sign out"><i class="bi bi-box-arrow-right"></i></button>
        </form>
      </div>
    </aside>

    <div class="admin-main">
      <nav class="navbar admin-navbar navbar-expand bg-white">
        <div class="container-fluid px-3 px-lg-4">
          <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar" aria-expanded="true" aria-label="Toggle sidebar">
            <span></span>
            <span></span>
            <span></span>
          </button>
          <div class="navbar-page-title">@yield('title', 'Admin')</div>

          <div class="navbar-actions ms-auto">
            <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme" title="Switch color theme">
              <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
            </button>

            <a href="{{ url('/') }}" target="_blank" class="icon-button visit-site-btn" title="Open website">
              <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
              <span class="visit-site-text">Visit Site</span>
            </a>

            @canany(['manage enrollments', 'manage free trials', 'manage messages'])
            <div class="dropdown">
              <button class="icon-button" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Notifications">
                <span class="notification-dot" id="notifDot" style="display:none;"></span>
                <i class="bi bi-bell" aria-hidden="true"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end notification-menu">
                <div class="dropdown-header fw-bold text-body">Notifications</div>
                <div id="notif-list">
                  <a class="dropdown-item" href="#">
                    <span class="notification-title">No new notifications</span>
                  </a>
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item text-center small" onclick="markAllRead();return false;" style="color:var(--admin-primary);">Mark all as read</a>
              </div>
            @endcanany
            </div>

            <div class="dropdown">
              <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if($user && $user->avatar)
                  <img class="avatar-img avatar-sm" src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}">
                @else
                  <span class="avatar-img avatar-sm" style="display:inline-grid;place-items:center;background:var(--admin-primary);color:#fff;font-weight:800;font-size:0.85rem;border-radius:10px;">{{ strtoupper(substr($user->name ?? 'A', 0, 1)) }}</span>
                @endif
                <span class="profile-name d-none d-sm-inline">{{ $user->name ?? 'Admin' }}</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-person me-2" aria-hidden="true"></i>Profile</a></li>
                @can('manage settings')
                <li><a class="dropdown-item" href="{{ route('admin.settings.index') }}"><i class="bi bi-gear me-2" aria-hidden="true"></i>Settings</a></li>
                @endcan
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item text-danger" type="submit"><i class="bi bi-box-arrow-right me-2" aria-hidden="true"></i>Sign out</button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          @if(session('success'))
            <script>document.addEventListener('DOMContentLoaded',function(){Swal.fire({icon:'success',title:'Success!',text:'{{ session("success") }}',timer:4000,timerProgressBar:true,showConfirmButton:false,toast:true,position:'top-end'});});</script>
          @endif
          @if(session('warning'))
            <script>document.addEventListener('DOMContentLoaded',function(){Swal.fire({icon:'warning',title:'Please check',text:@js(session('warning'))});});</script>
          @endif
          @if($errors->any())
            <script>document.addEventListener('DOMContentLoaded',function(){Swal.fire({icon:'error',title:'Please fix the following',html:@js('<ul style="text-align:left;margin:0;padding-left:1.2rem;">' . collect($errors->all())->map(fn ($e) => '<li>' . e($e) . '</li>')->implode('') . '</ul>')});});</script>
          @endif
          @if(session('error'))
            <script>document.addEventListener('DOMContentLoaded',function(){Swal.fire({icon:'error',title:'Error!',text:'{{ session("error") }}',timer:5000,timerProgressBar:true,showConfirmButton:false,toast:true,position:'top-end'});});</script>
          @endif

          @yield('content')
        </div>
      </main>

      <footer class="admin-footer">
        <div class="container-fluid px-3 px-lg-4">
          <span>Copyright &copy; {{ date('Y') }} Bismillah Islamic Academy. All rights reserved.</span>
          <span>Admin Dashboard</span>
        </div>
      </footer>
    </div>
  </div>

  <script src="{{ asset('admin-assets/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
  <script src="{{ asset('admin-assets/assets/js/main.js') }}"></script>

  <script>
    function esc(v) {
      return String(v).replace(/[&<>"']/g, function (c) { return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]; });
    }

    function loadNotifications() {
      fetch('{{ route("admin.notifications.index") }}', {
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
      })
      .then(function(r){ return r.json(); })
      .then(function(data) {
        var list = document.getElementById('notif-list');
        var dot = document.getElementById('notifDot');
        if (data.notifications && data.notifications.length > 0) {
          var html = '';
          data.notifications.forEach(function(n) {
            html += '<a class="dropdown-item" href="' + esc(n.url || '#') + '">';
            html += '<span class="notification-title">' + esc(n.message) + '</span>';
            html += '<span class="notification-time">' + esc(n.created_at || '') + '</span>';
            html += '</a>';
          });
          list.innerHTML = html;
          dot.style.display = '';
        } else {
          list.innerHTML = '<a class="dropdown-item" href="#"><span class="notification-title">No new notifications</span></a>';
          dot.style.display = 'none';
        }
      })
      .catch(function() {});
    }

    function markAllRead() {
      fetch('{{ route("admin.notifications.read") }}', {
        method: 'POST',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
          'Content-Type': 'application/json'
        }
      })
      .then(function() {
        document.getElementById('notifDot').style.display = 'none';
        document.getElementById('notif-list').innerHTML = '<a class="dropdown-item" href="#"><span class="notification-title">No new notifications</span></a>';
      });
    }

    function initDatatables(selector, options) {
      var defaults = {
        responsive: true,
        pageLength: 10,
        language: { search: "", lengthMenu: "Show _MENU_", info: "Showing _START_ to _END_ of _TOTAL_", paginate: { previous: "<i class='bi bi-chevron-left'></i>", next: "<i class='bi bi-chevron-right'></i>" } },
        dom: '<"row mb-3"<"col-sm-6"l><"col-sm-6"f>>rtip',
        drawCallback: function() { $(this).closest('.dataTables_wrapper').find('.dataTables_paginate').addClass('mt-3'); }
      };
      return $(selector).DataTable($.extend(true, defaults, options || {}));
    }

    // ── Delete confirmation (used by every delete button in the admin) ──
    function askDelete(name) {
      return Swal.fire({
        title: 'Delete ' + (name || 'this item') + '?',
        text: 'This cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: '<i class="bi bi-trash"></i> Yes, delete',
        cancelButtonText: 'Cancel',
        reverseButtons: true,
        focusCancel: true,
        customClass: { confirmButton: 'swal-delete-confirm' }
      }).then(function (r) { return r.isConfirmed; });
    }

    // Forms rendered by the admin delete-button component
    document.addEventListener('submit', function (e) {
      var form = e.target;
      if (!form.classList || !form.classList.contains('js-confirm-delete') || form.dataset.confirmed) return;
      e.preventDefault();
      askDelete(form.dataset.name).then(function (ok) {
        if (!ok) return;
        form.dataset.confirmed = '1';
        form.submit();
      });
    });

    // Older pages that trigger a hidden form by id
    function confirmDeleteForm(formId, name) {
      askDelete(name).then(function (ok) { if (ok) document.getElementById(formId).submit(); });
    }

    // ── Bulk delete for DataTables lists ──
    // Rows need <input type="checkbox" class="js-row-check" value="{id}">, the header
    // a .js-select-all checkbox, and the page a .js-bulk-delete button plus a hidden
    // form whose id is in the button's data-form. Works across every table page.
    function initBulkDelete(dt, noun) {
      var $table = $(dt.table().node());
      var $btn = $('.js-bulk-delete[data-table="#' + $table.attr('id') + '"]');
      var form = document.getElementById($btn.data('form'));
      var $all = $table.find('.js-select-all');

      function checked() { return dt.$('.js-row-check:checked'); }

      function refresh() {
        var n = checked().length;
        $btn.prop('disabled', n === 0).find('.js-bulk-count').text(n ? '(' + n + ')' : '');
        var $visible = $(dt.rows({ search: 'applied' }).nodes()).find('.js-row-check');
        var on = $visible.filter(':checked').length;
        $all.prop('checked', $visible.length > 0 && on === $visible.length)
            .prop('indeterminate', on > 0 && on < $visible.length);
      }

      $all.on('change', function () {
        $(dt.rows({ search: 'applied' }).nodes()).find('.js-row-check').prop('checked', this.checked);
        refresh();
      });
      $table.on('change', '.js-row-check', refresh);
      dt.on('draw', refresh);

      $btn.on('click', function () {
        var $rows = checked();
        if (!$rows.length) return;
        askDelete($rows.length + ' ' + noun + ($rows.length === 1 ? '' : 's')).then(function (ok) {
          if (!ok) return;
          $(form).find('input[name="ids[]"]').remove();
          $rows.each(function () { $('<input type="hidden" name="ids[]">').val(this.value).appendTo(form); });
          form.submit();
        });
      });

      refresh();
    }

    // Collapsed sidebar shows icons only: give every link a tooltip with its name
    document.querySelectorAll('.sidebar-nav .nav-link').forEach(function (a) {
      var t = a.querySelector('.nav-text');
      if (t && !a.title) a.title = t.textContent.trim();
    });

    function openModal(id) { new bootstrap.Modal(document.getElementById(id)).show(); }
    function closeModal(id) { bootstrap.Modal.getInstance(document.getElementById(id)).hide(); }

    document.addEventListener('DOMContentLoaded', function() {
      if (document.getElementById('notif-list')) {
        loadNotifications();
        setInterval(loadNotifications, 60000);
      }
    });
  </script>

  @stack('scripts')
</body>
</html>
