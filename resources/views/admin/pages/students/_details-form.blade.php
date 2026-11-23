{{-- Student details form (new student, and the Details tab). Needs: $student, $courses --}}
<form action="{{ $student->exists ? route('admin.students.update', $student) : route('admin.students.store') }}" method="POST">
  @csrf
  @if($student->exists) @method('PUT') @endif

  <div class="row g-3">
    <div class="col-12"><h6 class="st-section"><i class="bi bi-person"></i> Student & parent</h6></div>
    <div class="col-md-6">
      <label class="form-label fw-bold">Student name <span class="text-danger">*</span></label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
    </div>
    <div class="col-md-6">
      <label class="form-label fw-bold">Parent name</label>
      <input type="text" name="parent_name" class="form-control" value="{{ old('parent_name', $student->parent_name) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label fw-bold">WhatsApp</label>
      <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp', $student->whatsapp) }}" placeholder="+44 7400 000000">
    </div>
    <div class="col-md-6">
      <label class="form-label fw-bold">Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}">
    </div>
    <div class="col-12"><h6 class="st-section"><i class="bi bi-globe2"></i> Where they live</h6></div>
    <div class="col-md-6">
      <label class="form-label fw-bold">Country</label>
      <input type="text" name="country" class="form-control" value="{{ old('country', $student->country) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label fw-bold">Student's timezone <span class="text-danger">*</span></label>
      <select name="timezone" class="form-select" required>
        @foreach(\App\Support\Timezones::OPTIONS as $group => $zones)
          <optgroup label="{{ $group }}">
            @foreach($zones as $zone => $label)
              <option value="{{ $zone }}" @selected(old('timezone', $student->timezone) === $zone)>{{ $label }}</option>
            @endforeach
          </optgroup>
        @endforeach
      </select>
      <small class="text-muted">Used to show the class in the student's own time.</small>
    </div>
    <div class="col-12"><h6 class="st-section"><i class="bi bi-book"></i> Course</h6></div>
    <div class="col-md-6">
      <label class="form-label fw-bold">Course</label>
      <input type="text" name="course" class="form-control" list="courseList" value="{{ old('course', $student->course) }}">
      <datalist id="courseList">
        @foreach($courses as $c)<option value="{{ $c }}">@endforeach
      </datalist>
    </div>
    <div class="col-md-3">
      <label class="form-label fw-bold">Status</label>
      <select name="status" class="form-select">
        @foreach(\App\Models\Student::STATUSES as $value => $label)
          <option value="{{ $value }}" @selected(old('status', $student->status) === $value)>{{ $label }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-3">
      <label class="form-label fw-bold">Started</label>
      <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $student->start_date?->format('Y-m-d')) }}">
    </div>
    <div class="col-12"><h6 class="st-section"><i class="bi bi-cash-coin"></i> Monthly fee</h6></div>
    <div class="col-md-4">
      <label class="form-label fw-bold">Monthly fee</label>
      <input type="number" step="0.01" min="0" name="fee_amount" class="form-control" value="{{ old('fee_amount', $student->fee_amount !== null ? rtrim(rtrim((string) $student->fee_amount, '0'), '.') : '') }}" placeholder="e.g. 40">
    </div>
    <div class="col-md-4">
      <label class="form-label fw-bold">Currency</label>
      <select name="fee_currency" class="form-select">
        @foreach(\App\Models\Student::CURRENCIES as $code => $symbol)
          <option value="{{ $code }}" @selected(old('fee_currency', $student->fee_currency) === $code)>{{ $code }} ({{ $symbol }})</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-4">
      <label class="form-label fw-bold">Due on day</label>
      <input type="number" min="1" max="28" name="fee_due_day" class="form-control" value="{{ old('fee_due_day', $student->fee_due_day ?: 5) }}">
    </div>
    <div class="col-12"><h6 class="st-section"><i class="bi bi-sticky"></i> Notes</h6></div>
    <div class="col-12">
            <textarea name="notes" class="form-control" rows="3">{{ old('notes', $student->notes) }}</textarea>
    </div>
  </div>

  <div class="text-end mt-4">
    <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> {{ $student->exists ? 'Save student' : 'Add student' }}</button>
  </div>
</form>

@once
@push('styles')
<style>
  .st-section { margin:.75rem 0 0; padding-bottom:.4rem; border-bottom:1px solid var(--admin-border); font-size:.8rem; text-transform:uppercase; letter-spacing:.06em; color:var(--admin-primary); font-weight:800; }
  .row > .col-12:first-child .st-section { margin-top:0; }
</style>
@endpush
@endonce
