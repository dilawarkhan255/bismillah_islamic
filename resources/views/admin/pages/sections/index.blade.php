@extends('admin.layouts.app')

@section('title', 'Content Blocks')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-layers"></i></span>
    <div>
      <p class="eyebrow mb-1">Manage</p>
      <h1 class="h3 mb-1">Content Blocks</h1>
      <p class="text-muted mb-0">Manage page content — text, images, buttons for all frontend pages.</p>
    </div>
  </div>
  <div class="heading-actions">
    <button class="btn btn-primary" onclick="openModal('addSectionModal')"><i class="bi bi-plus-lg"></i> Add Block</button>
  </div>
</div>

<div class="panel">
  <div class="panel-header">
    <div>
      <h2 class="h5 mb-1 section-title"><i class="bi bi-layers"></i><span>Blocks</span></h2>
    </div>
    <div>
      <select class="form-select form-select-sm" style="width:auto;" onchange="window.location='{{ route('admin.sections.index') }}?page='+this.value">
        <option value="">All Pages</option>
        @foreach(['home','about','courses','gallery','blog','team','our-team','contact','pricing','free-trial','privacy-policy','footer'] as $p)
          <option value="{{ $p }}" {{ ($selected ?? '') == $p ? 'selected' : '' }}>{{ ucwords(str_replace('-', ' ', $p)) }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table align-middle mb-0" id="sectionsTable">
      <thead>
        <tr>
          <th style="width:120px">Page</th>
          <th style="width:140px">Key</th>
          <th>Title / Content</th>
          <th style="width:60px">Image</th>
          <th style="width:60px">Button</th>
          <th style="width:60px">Order</th>
          <th style="width:80px">Status</th>
          <th style="width:140px" class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sections as $section)
          <tr>
            <td><span class="badge" style="background:rgba(13,27,42,.08);color:var(--navy);text-transform:capitalize;">{{ str_replace('-', ' ', $section->page_name) }}</span></td>
            <td><code>{{ $section->section_key }}</code></td>
            <td>
              <strong>{{ Str::limit($section->title, 50) }}</strong>
              @if($section->description)
                <br><small class="text-muted">{{ Str::limit($section->description, 80) }}</small>
              @endif
            </td>
            <td>
              @if($section->image)
                <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);"><i class="bi bi-check"></i></span>
              @else
                <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);"><i class="bi bi-x"></i></span>
              @endif
            </td>
            <td>
              @if($section->button_text)
                <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);"><i class="bi bi-check"></i></span>
              @else
                <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);"><i class="bi bi-x"></i></span>
              @endif
            </td>
            <td>{{ $section->sort_order }}</td>
            <td>
              @if($section->is_active)
                <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Active</span>
              @else
                <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Inactive</span>
              @endif
            </td>
            <td class="text-end">
              <div class="d-flex justify-content-end gap-2">
                <button class="btn btn-sm btn-light" onclick="editSection({{ $section->id }})"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-light" style="color:var(--admin-danger);" onclick="confirmDelete('deleteSectionForm{{ $section->id }}')"><i class="bi bi-trash"></i></button>
                <form id="deleteSectionForm{{ $section->id }}" action="{{ route('admin.sections.destroy', $section) }}" method="POST" style="display:none;">
                  @csrf @method('DELETE')
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{-- Add Modal --}}
<div class="modal fade" id="addSectionModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <form action="{{ route('admin.sections.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Add Block</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Page <span class="text-danger">*</span></label>
            <select name="page_name" class="form-select" required>
              <option value="">Select...</option>
              @foreach(['home','about','courses','gallery','blog','team','our-team','contact','pricing','free-trial','privacy-policy','footer'] as $p)
                <option value="{{ $p }}" {{ $selected == $p ? 'selected' : '' }}>{{ ucwords(str_replace('-', ' ', $p)) }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Key <span class="text-danger">*</span></label>
            <input type="text" name="section_key" class="form-control" placeholder="e.g. hero_title" required>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="0">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Heading">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Subtitle / Tagline</label>
            <input type="text" name="subtitle" class="form-control" placeholder="Short tagline">
          </div>
          <div class="col-12 mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Main content"></textarea>
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
          <div class="col-md-3 mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-switch mt-2">
              <input type="checkbox" name="is_active" class="form-check-input" value="1" checked id="addActive">
              <label class="form-check-label" for="addActive">Active</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Create Block</button>
      </div>
    </form>
  </div>
</div>

{{-- Edit Modal --}}
<div class="modal fade" id="editSectionModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <form method="POST" enctype="multipart/form-data" class="modal-content" id="editSectionForm">
      @csrf @method('PUT')
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-pencil-square"></i> Edit Block</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Page <span class="text-danger">*</span></label>
            <select name="page_name" class="form-select" required id="edit_page_name">
              <option value="">Select...</option>
              @foreach(['home','about','courses','gallery','blog','team','our-team','contact','pricing','free-trial','privacy-policy','footer'] as $p)
                <option value="{{ $p }}">{{ ucwords(str_replace('-', ' ', $p)) }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Key <span class="text-danger">*</span></label>
            <input type="text" name="section_key" class="form-control" required id="edit_section_key">
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" id="edit_sort_order">
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
            <textarea name="description" class="form-control" rows="3" id="edit_description"></textarea>
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
          <div class="col-md-3 mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-switch mt-2">
              <input type="checkbox" name="is_active" class="form-check-input" value="1" id="edit_is_active">
              <label class="form-check-label" for="edit_is_active">Active</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Update Block</button>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
  function editSection(id) {
    fetch('/admin/sections/' + id + '/edit')
      .then(function(r) { return r.json(); })
      .then(function(d) {
        document.getElementById('editSectionForm').action = '/admin/sections/' + id;
        document.getElementById('edit_page_name').value = d.page_name;
        document.getElementById('edit_section_key').value = d.section_key;
        document.getElementById('edit_title').value = d.title || '';
        document.getElementById('edit_subtitle').value = d.subtitle || '';
        document.getElementById('edit_description').value = d.description || '';
        document.getElementById('edit_button_text').value = d.button_text || '';
        document.getElementById('edit_button_url').value = d.button_url || '';
        document.getElementById('edit_sort_order').value = d.sort_order || 0;
        document.getElementById('edit_is_active').checked = d.is_active;
        var preview = document.getElementById('edit_image_preview');
        preview.innerHTML = d.image ? '<img src="/storage/' + d.image + '" class="rounded" style="max-height:100px;">' : '';
        openModal('editSectionModal');
      });
  }

  function confirmDelete(formId) {
    Swal.fire({
      title: 'Delete block?',
      text: 'This cannot be undone.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: 'var(--admin-danger)',
      confirmButtonText: 'Delete',
      cancelButtonText: 'Cancel',
    }).then(function(r) { if (r.isConfirmed) document.getElementById(formId).submit(); });
  }
</script>
@endpush
