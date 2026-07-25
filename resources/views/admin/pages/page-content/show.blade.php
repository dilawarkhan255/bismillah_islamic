@extends('admin.layouts.app')

@section('title', $pageConfig['name'] . ' Content')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon" style="background:{{ $pageConfig['color'] }}15;color:{{ $pageConfig['color'] }};"><i class="bi {{ $pageConfig['icon'] }}"></i></span>
    <div>
      <p class="eyebrow mb-1"><a href="{{ route('admin.page-content.index') }}" style="color:var(--admin-primary);text-decoration:none;">Page Content</a></p>
      <h1 class="h3 mb-1">{{ $pageConfig['name'] }}</h1>
      <p class="text-muted mb-0">View, add, edit or delete sections for this page.</p>
    </div>
  </div>
  <div class="heading-actions">
    <button class="btn btn-primary" onclick="openModal('addSectionModal')"><i class="bi bi-plus-lg"></i> Add Section</button>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
@endif

<div class="panel">
  <div class="panel-header">
    <div>
      <h2 class="h5 mb-1 section-title"><i class="bi bi-list-ul"></i><span>Sections ({{ $sections->count() }})</span></h2>
    </div>
  </div>

  @if($sections->isEmpty())
    <div class="text-center py-5">
      <i class="bi bi-inbox" style="font-size:48px;color:#ccc;"></i>
      <p class="text-muted mt-3 mb-0">No sections found for this page.</p>
      <button class="btn btn-primary btn-sm mt-3" onclick="openModal('addSectionModal')"><i class="bi bi-plus-lg me-1"></i> Add First Section</button>
    </div>
  @else
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead>
          <tr>
            <th style="width:160px">Key</th>
            <th>Title / Content</th>
            <th style="width:80px">Image</th>
            <th style="width:80px">Button</th>
            <th style="width:80px">Status</th>
            <th style="width:120px" class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sections as $section)
            <tr>
              <td><code style="font-size:12px;background:rgba(13,27,42,.06);padding:2px 8px;border-radius:4px;">{{ $section->section_key }}</code></td>
              <td>
                <strong style="color:var(--navy);">{{ Str::limit($section->title ?? '---', 60) }}</strong>
                @if($section->description)
                  <br><small class="text-muted">{{ Str::limit(strip_tags($section->description), 100) }}</small>
                @endif
              </td>
              <td>
                @if($section->image)
                  <img src="{{ asset('storage/' . $section->image) }}" alt="" style="width:40px;height:40px;object-fit:cover;border-radius:6px;">
                @else
                  <span class="text-muted">---</span>
                @endif
              </td>
              <td>
                @if($section->button_text)
                  <span class="badge" style="background:rgba(13,110,253,.1);color:#0d6efd;">{{ Str::limit($section->button_text, 20) }}</span>
                @else
                  <span class="text-muted">---</span>
                @endif
              </td>
              <td>
                @if($section->is_active)
                  <span class="badge" style="background:rgba(25,135,84,.1);color:#198754;">Active</span>
                @else
                  <span class="badge" style="background:rgba(220,53,69,.1);color:#dc3545;">Off</span>
                @endif
              </td>
              <td class="text-end">
                <div class="d-flex justify-content-end gap-1">
                  <button class="btn btn-sm btn-outline-primary" onclick="editSection({{ $section->id }})" title="Edit"><i class="bi bi-pencil"></i></button>
                  <button class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{ $section->id }}, '{{ addslashes(Str::limit($section->title ?? $section->section_key, 30)) }}')" title="Delete"><i class="bi bi-trash"></i></button>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
</div>

{{-- ADD SECTION MODAL --}}
<div class="modal fade" id="addSectionModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <form action="{{ route('admin.page-content.store', $page) }}" method="POST" enctype="multipart/form-data" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-plus-circle me-2"></i>Add Section to {{ $pageConfig['name'] }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Section Key <span class="text-danger">*</span></label>
            <input type="text" name="section_key" class="form-control" placeholder="e.g. hero_title, stats_1" required>
            <small class="text-muted">Unique identifier, no spaces (use _)</small>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Add After</label>
            <select name="after_section" class="form-select">
              <option value="0">--- At the beginning ---</option>
              @foreach($sections as $s)
                <option value="{{ $s->id }}">{{ $s->section_key }} — {{ Str::limit($s->title ?? 'No title', 30) }}</option>
              @endforeach
              <option value="last">--- At the end ---</option>
            </select>
          </div>
          <div class="col-12 mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-switch mt-1">
              <input type="checkbox" name="is_active" class="form-check-input" value="1" checked id="addActive">
              <label class="form-check-label" for="addActive">Active</label>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Main heading or label">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Subtitle / Tagline</label>
            <input type="text" name="subtitle" class="form-control" placeholder="Short tagline or icon class">
          </div>
          <div class="col-12 mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Main content (HTML allowed)"></textarea>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
          </div>
          <div class="col-md-3 mb-3">
            <label class="form-label">Button Text</label>
            <input type="text" name="button_text" class="form-control" placeholder="e.g. Learn More">
          </div>
          <div class="col-md-3 mb-3">
            <label class="form-label">Button URL</label>
            <input type="text" name="button_url" class="form-control" placeholder="e.g. /contact">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Add Section</button>
      </div>
    </form>
  </div>
</div>

{{-- EDIT SECTION MODAL --}}
<div class="modal fade" id="editSectionModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <form method="POST" enctype="multipart/form-data" class="modal-content" id="editSectionForm">
      @csrf @method('PUT')
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-pencil-square me-2"></i>Edit Section</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Section Key</label>
            <input type="text" class="form-control" id="edit_section_key" readonly style="background:#f8f9fa;">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-switch mt-2">
              <input type="checkbox" name="is_active" class="form-check-input" value="1" id="edit_is_active">
              <label class="form-check-label" for="edit_is_active">Active</label>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="edit_title">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Subtitle</label>
            <input type="text" name="subtitle" class="form-control" id="edit_subtitle">
          </div>
          <div class="col-12 mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" id="edit_description"></textarea>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            <div id="edit_image_preview" class="mt-2"></div>
          </div>
          <div class="col-md-3 mb-3">
            <label class="form-label">Button Text</label>
            <input type="text" name="button_text" class="form-control" id="edit_button_text">
          </div>
          <div class="col-md-3 mb-3">
            <label class="form-label">Button URL</label>
            <input type="text" name="button_url" class="form-control" id="edit_button_url">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Save Changes</button>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
  function editSection(id) {
    fetch('{{ url("admin/page-content/sections") }}/' + id + '/edit')
      .then(function(r) { return r.json(); })
      .then(function(d) {
        document.getElementById('editSectionForm').action = '{{ url("admin/page-content/sections") }}/' + id;
        document.getElementById('edit_section_key').value = d.section_key || '';
        document.getElementById('edit_title').value = d.title || '';
        document.getElementById('edit_subtitle').value = d.subtitle || '';
        document.getElementById('edit_description').value = d.description || '';
        document.getElementById('edit_button_text').value = d.button_text || '';
        document.getElementById('edit_button_url').value = d.button_url || '';
        document.getElementById('edit_is_active').checked = d.is_active;
        var preview = document.getElementById('edit_image_preview');
        preview.innerHTML = d.image ? '<img src="/storage/' + d.image + '" class="rounded" style="max-height:80px;">' : '';
        openModal('editSectionModal');
      });
  }

  function confirmDelete(id, name) {
    Swal.fire({
      title: 'Delete "' + name + '"?',
      text: 'This section will be permanently removed.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#dc3545',
      confirmButtonText: 'Delete',
      cancelButtonText: 'Cancel',
    }).then(function(r) {
      if (r.isConfirmed) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ url("admin/page-content/sections") }}/' + id;
        form.innerHTML = '@csrf @method('DELETE')';
        document.body.appendChild(form);
        form.submit();
      }
    });
  }
</script>
@endpush
