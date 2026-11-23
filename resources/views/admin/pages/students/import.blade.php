@extends('admin.layouts.app')

@section('title', 'Import Students')

@section('content')
<x-admin.page-header title="Import from Excel" icon="bi-file-earmark-arrow-up" eyebrow="Students" subtitle="Upload your class sheet: students and their class times are added in one go." :back="route('admin.students.index')"></x-admin.page-header>

@if($result)
  <div class="panel mb-4">
    <div class="panel-header"><h5 class="mb-0"><i class="bi bi-clipboard-check"></i> Result: {{ $result['file'] }}</h5></div>
    <div class="panel-body">
      <div class="row g-3 mb-2">
        @foreach([
          ['New students', $result['students'], 'var(--admin-success)'],
          ['Classes added', $result['classes'], 'var(--admin-primary)'],
          ['Already in system', $result['existing'], 'var(--admin-muted)'],
          ['Same class skipped', $result['duplicates'], 'var(--admin-muted)'],
        ] as [$label, $n, $color])
          <div class="col-6 col-md-3">
            <div class="imp-stat"><strong style="color:{{ $color }}">{{ $n }}</strong><span>{{ $label }}</span></div>
          </div>
        @endforeach
      </div>

      @if($result['skipped'] || $result['warnings'])
        <h6 class="mt-4 mb-2">Please check these rows</h6>
        <ul class="imp-list">
          @foreach($result['skipped'] as $line)<li><i class="bi bi-x-circle" style="color:var(--admin-danger);"></i> {{ $line }}</li>@endforeach
          @foreach($result['warnings'] as $line)<li><i class="bi bi-exclamation-triangle" style="color:#AE8225;"></i> {{ $line }}</li>@endforeach
        </ul>
      @endif

      <div class="mt-3 d-flex gap-2">
        <a href="{{ route('admin.classes.index') }}" class="btn btn-primary"><i class="bi bi-calendar-week"></i> Open Timetable</a>
        <a href="{{ route('admin.students.index') }}" class="btn btn-light">Students</a>
      </div>
    </div>
  </div>
@endif

<div class="row g-4">
  <div class="col-lg-5">
    <div class="panel h-100">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-upload"></i> Upload</h5></div>
      <div class="panel-body">
        <form action="{{ route('admin.students.import.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <label class="form-label fw-bold">Excel (.xlsx) or .csv file</label>
          <input type="file" name="file" class="form-control mb-3" accept=".xlsx,.csv" required>
          <button type="submit" class="btn btn-primary w-100"><i class="bi bi-upload"></i> Import</button>
        </form>
        <hr>
        <p class="small text-muted mb-2">Not sure about the format? Download the example, fill it in Excel and upload it.</p>
        <a href="{{ route('admin.students.import.template') }}" class="btn btn-light w-100"><i class="bi bi-download"></i> Download example sheet</a>
      </div>
    </div>
  </div>

  <div class="col-lg-7">
    <div class="panel h-100">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-info-circle"></i> How the sheet should look</h5></div>
      <div class="panel-body small">
        <p>First row = column names. Then <strong>one row per class</strong>. A student with two different class times can have two rows with the same name.</p>
        <table class="table table-sm align-middle">
          <thead><tr><th>Column</th><th>Example</th><th></th></tr></thead>
          <tbody>
            <tr><td><strong>Student Name</strong></td><td>Ali Khan</td><td><span class="badge bg-danger">required</span></td></tr>
            <tr><td>Parent Name</td><td>Sana Khan</td><td></td></tr>
            <tr><td>WhatsApp</td><td>+44 7400 000000</td><td></td></tr>
            <tr><td>Country</td><td>UK, USA, Pakistan…</td><td>sets the student's timezone</td></tr>
            <tr><td>Course</td><td>Norani Qaida</td><td></td></tr>
            <tr><td>Teacher</td><td>Hafiz Kamran</td><td>part of the name is enough</td></tr>
            <tr><td><strong>Days</strong></td><td>Mon-Fri · Mon, Wed, Fri · Daily · Peer, Budh</td><td></td></tr>
            <tr><td><strong>Time</strong></td><td>9:00 PM · 21:00 · 9 PM - 9:30 PM</td><td><strong>Pakistan time</strong></td></tr>
            <tr><td>Duration</td><td>30</td><td>minutes, default 30</td></tr>
            <tr><td>Email, Notes, Status</td><td></td><td>optional</td></tr>
          </tbody>
        </table>
        <p class="mb-0 text-muted">Uploading the same sheet again is safe: students already added are reused and the same class is not added twice.</p>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .imp-stat { padding:.9rem 1rem; border:1px solid var(--admin-border); border-radius:12px; text-align:center; }
  .imp-stat strong { display:block; font-size:1.6rem; line-height:1.1; }
  .imp-stat span { color:var(--admin-muted); font-size:.8rem; }
  .imp-list { list-style:none; padding:0; margin:0; max-height:320px; overflow:auto; }
  .imp-list li { padding:.35rem 0; border-bottom:1px solid var(--admin-border); font-size:.9rem; }
</style>
@endpush
