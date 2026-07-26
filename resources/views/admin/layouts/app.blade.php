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

  @stack('styles')
</head>
<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

    <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
      <div class="sidebar-header" style="text-align:center;">
        <a class="brand-mark" href="{{ route('admin.dashboard') }}" data-sidebar-close aria-label="Bismillah Academy dashboard" style="flex-direction:column;align-items:center;gap:6px;">
          <span class="brand-icon" style="width:auto;height:auto;">
            <img src="{{ setting('img_logo') ? asset('storage/' . setting('img_logo')) : asset('storage/logo.png') }}" alt="Logo" style="height:48px;width:auto;">
          </span>
          <span class="brand-copy">
            <span class="brand-title">Bismillah Academy</span>
            <span class="brand-subtitle">Admin Panel</span>
          </span>
        </a>
      </div>

      <nav class="sidebar-nav">
        @role('admin')
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" data-sidebar-close aria-current="{{ request()->routeIs('admin.dashboard') ? 'page' : 'false' }}">
          <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
          <span class="nav-text">Dashboard</span>
        </a>
        @endrole

        @role('admin|editor')
        <a class="nav-link {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}" href="{{ route('admin.teachers.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-person-badge" aria-hidden="true"></i></span>
          <span class="nav-text">Teachers</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}" href="{{ route('admin.team-members.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
          <span class="nav-text">Team Members</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}" href="{{ route('admin.courses.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-book" aria-hidden="true"></i></span>
          <span class="nav-text">Courses</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}" href="{{ route('admin.blog.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-journal-text" aria-hidden="true"></i></span>
          <span class="nav-text">Blog Posts</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}" href="{{ route('admin.blog-categories.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-tags" aria-hidden="true"></i></span>
          <span class="nav-text">Categories</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}" href="{{ route('admin.testimonials.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-chat-quote" aria-hidden="true"></i></span>
          <span class="nav-text">Testimonials</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}" href="{{ route('admin.gallery.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-images" aria-hidden="true"></i></span>
          <span class="nav-text">Gallery</span>
        </a>
        @endrole

        @role('admin')
        <a class="nav-link {{ request()->routeIs('admin.hero-slides.*') ? 'active' : '' }}" href="{{ route('admin.hero-slides.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-easel" aria-hidden="true"></i></span>
          <span class="nav-text">Hero Slides</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.pricing.*') ? 'active' : '' }}" href="{{ route('admin.pricing.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-cash-stack" aria-hidden="true"></i></span>
          <span class="nav-text">Pricing</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.enrollments.*') ? 'active' : '' }}" href="{{ route('admin.enrollments.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
          <span class="nav-text">Enrollments</span>
          @php $pendingEnrollments = \App\Models\Enrollment::where('status', 'pending')->count(); @endphp
          @if($pendingEnrollments > 0)
            <span class="badge" style="background:var(--admin-warning);color:#fff;margin-left:auto;">{{ $pendingEnrollments }}</span>
          @endif
        </a>
        <a class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-envelope" aria-hidden="true"></i></span>
          <span class="nav-text">Messages</span>
          @php $unreadMessages = \App\Models\Message::where('is_read', false)->count(); @endphp
          @if($unreadMessages > 0)
            <span class="badge" style="background:var(--admin-danger);color:#fff;margin-left:auto;">{{ $unreadMessages }}</span>
          @endif
        </a>
        <a class="nav-link {{ request()->routeIs('admin.free-trials.*') ? 'active' : '' }}" href="{{ route('admin.free-trials.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-calendar-check" aria-hidden="true"></i></span>
          <span class="nav-text">Free Trials</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
          <span class="nav-text">Users</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.page-content.*') ? 'active' : '' }}" href="{{ route('admin.page-content.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-file-earmark-text" aria-hidden="true"></i></span>
          <span class="nav-text">Page Content</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}" data-sidebar-close>
          <span class="nav-icon"><i class="bi bi-gear" aria-hidden="true"></i></span>
          <span class="nav-text">Settings</span>
        </a>
        @endrole
      </nav>

      @php $user = Auth::user(); @endphp
      <div class="sidebar-user">
        @if($user && $user->avatar)
          <img class="avatar-img avatar-md sidebar-user-avatar" src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}">
        @else
          <span class="avatar-img avatar-md sidebar-user-avatar" style="display:inline-grid;place-items:center;background:var(--admin-primary);color:#fff;font-weight:800;font-size:1.2rem;">{{ strtoupper(substr($user->name ?? 'A', 0, 1)) }}</span>
        @endif
        <strong>{{ $user->name ?? 'Admin' }}</strong>
        <small>{{ ucfirst($user->getRoleNames()->first() ?? 'User') }}</small>
      </div>

      <div class="sidebar-footer">
        <span class="status-dot"></span>
        <span class="sidebar-footer-text">System running smoothly</span>
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

          <div class="navbar-actions ms-auto">
            <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme" title="Switch color theme">
              <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
            </button>

            <a href="{{ url('/') }}" target="_blank" class="icon-button" style="width:auto;padding:0 14px;font-size:13px;font-weight:700;text-decoration:none;color:var(--admin-primary);border-color:var(--admin-primary);display:inline-flex;align-items:center;gap:4px;">
              <i class="bi bi-box-arrow-up-right" style="font-size:14px;" aria-hidden="true"></i>
              <span class="sidebar-footer-text">Visit Site</span>
            </a>

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
                <li><a class="dropdown-item" href="{{ route('admin.settings.index') }}"><i class="bi bi-gear me-2" aria-hidden="true"></i>Settings</a></li>
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
            html += '<a class="dropdown-item" href="' + (n.url || '#') + '">';
            html += '<span class="notification-title">' + n.message + '</span>';
            html += '<span class="notification-time">' + (n.created_at || '') + '</span>';
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

    function openModal(id) { new bootstrap.Modal(document.getElementById(id)).show(); }
    function closeModal(id) { bootstrap.Modal.getInstance(document.getElementById(id)).hide(); }

    document.addEventListener('DOMContentLoaded', function() {
      loadNotifications();
      setInterval(loadNotifications, 60000);
    });
  </script>

  @stack('scripts')
</body>
</html>
