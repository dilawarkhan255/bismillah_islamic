@extends('admin.layouts.app')

@section('title', 'Page Content')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-file-earmark-text"></i></span>
    <div>
      <p class="eyebrow mb-1">Manage</p>
      <h1 class="h3 mb-1">Page Content</h1>
      <p class="text-muted mb-0">Select a page to view, add, edit or delete its content sections.</p>
    </div>
  </div>
</div>

<div class="row g-4">
  @foreach($pages as $slug => $page)
    <div class="col-md-6 col-lg-4">
      <a href="{{ route('admin.page-content.show', $slug) }}" class="text-decoration-none">
        <div class="card h-100 border-0 shadow-sm" style="border-radius:14px;transition:all .2s;cursor:pointer;overflow:hidden;">
          <div class="card-body p-4">
            <div class="d-flex align-items-center mb-3">
              <div style="width:48px;height:48px;border-radius:12px;background:{{ $page['color'] }}15;display:grid;place-items:center;">
                <i class="bi {{ $page['icon'] }}" style="font-size:22px;color:{{ $page['color'] }};"></i>
              </div>
              <div class="ms-3">
                <h5 class="mb-0" style="color:var(--navy);font-weight:700;">{{ $page['name'] }}</h5>
                <small class="text-muted">{{ $counts->get($slug, 0) }} sections</small>
              </div>
            </div>
            <p class="text-muted mb-0" style="font-size:13.5px;line-height:1.5;">{{ $page['description'] }}</p>
          </div>
          <div class="card-footer bg-transparent border-0 px-4 pb-4 pt-0">
            <span class="btn btn-sm w-100" style="background:{{ $page['color'] }}12;color:{{ $page['color'] }};font-weight:600;border-radius:8px;">
              <i class="bi bi-pencil-square me-1"></i> Manage Content
            </span>
          </div>
        </div>
      </a>
    </div>
  @endforeach
</div>
@endsection
