<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Timetable — {{ \App\Models\SiteSetting::get('site_name', 'Bismillah Islamic Academy') }}</title>
<style>
  * { box-sizing: border-box; }
  body { font-family: Arial, Helvetica, sans-serif; color: #1a1a1a; margin: 0; padding: 24px; background: #fff; font-size: 13px; }
  .toolbar { display: flex; gap: 8px; justify-content: flex-end; align-items: center; margin-bottom: 16px; }
  .toolbar .back { margin-right: auto; color: #AE8225; font-weight: bold; text-decoration: none; }
  .toolbar button { font: inherit; padding: 8px 16px; border: 1px solid #AE8225; background: #AE8225; color: #fff; cursor: pointer; border-radius: 6px; }
  .toolbar button.secondary { background: #fff; color: #AE8225; }
  header { display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 3px solid #AE8225; padding-bottom: 10px; margin-bottom: 18px; }
  header h1 { font-size: 20px; margin: 0; color: #0D1B2A; }
  header p { margin: 4px 0 0; color: #666; }
  header .meta { text-align: right; color: #666; font-size: 12px; }
  section { margin-bottom: 26px; page-break-inside: avoid; }
  section + section.teacher { page-break-before: auto; }
  h2 { font-size: 15px; margin: 0 0 8px; padding: 6px 10px; background: #0D1B2A; color: #fff; }
  h2 small { color: #d4b46a; font-weight: normal; }
  table { width: 100%; border-collapse: collapse; }
  th, td { border: 1px solid #d9d2c3; padding: 6px 8px; text-align: left; vertical-align: top; }
  th { background: #f6f1e6; font-size: 11px; text-transform: uppercase; letter-spacing: .5px; color: #555; }
  td.time { white-space: nowrap; font-weight: bold; }
  .muted { color: #777; font-size: 11px; }
  .empty { padding: 30px; text-align: center; color: #777; border: 1px dashed #ccc; }
  @media print {
    body { padding: 0; }
    .toolbar { display: none; }
    @page { margin: 12mm; }
    .per-teacher section.teacher + section.teacher { page-break-before: always; }
  }
</style>
</head>
<body class="{{ request('per_page') ? 'per-teacher' : '' }}">
  <div class="toolbar">
    <a class="back" href="{{ route('admin.classes.index', request()->only(['teacher', 'day', 'status'])) }}">&larr; Back to timetable</a>
    <button class="secondary" type="button" onclick="document.body.classList.toggle('per-teacher')">Toggle: each teacher on a new page</button>
    <button type="button" onclick="window.print()">Print</button>
  </div>

  <header>
    <div>
      <h1>{{ \App\Models\SiteSetting::get('site_name', 'Bismillah Islamic Academy') }} — Timetable</h1>
      <p>
        {{ $filters['day_number'] ? \App\Models\ClassSchedule::DAY_NAMES[$filters['day_number']] : 'All days' }}
        @if($teacherName) · {{ $teacherName }} @endif
        · Times are Pakistan time
      </p>
    </div>
    <div class="meta">Printed {{ now(\App\Support\Timezones::ACADEMY)->format('d M Y, g:i A') }}</div>
  </header>

  @forelse($byTeacher as $teacher => $classes)
    <section class="teacher">
      <h2>{{ $teacher }} <small>· {{ $classes->count() }} {{ Str::plural('class', $classes->count()) }}</small></h2>
      <table>
        <thead>
          <tr>
            <th style="width:110px;">Time (PK)</th>
            <th style="width:120px;">Days</th>
            <th>Student</th>
            <th>Course</th>
            <th style="width:170px;">Student's time</th>
            <th style="width:130px;">WhatsApp</th>
            <th>Notes</th>
          </tr>
        </thead>
        <tbody>
          @foreach($classes as $c)
            <tr>
              <td class="time">{{ $c->time_label }}<div class="muted">{{ $c->duration_minutes }} min</div></td>
              <td>{{ $c->days_label }}</td>
              <td><strong>{{ $c->student->name }}</strong>@if($c->student->parent_name)<div class="muted">{{ $c->student->parent_name }}</div>@endif</td>
              <td>{{ $c->course ?: $c->student->course }}</td>
              <td>
                @if($c->local_time_label)
                  {{ $c->local_time_label }}<div class="muted">{{ $c->local_days_label }} · {{ $c->student->timezone_label }}</div>
                @else
                  <span class="muted">Pakistan</span>
                @endif
              </td>
              <td>{{ $c->student->whatsapp }}</td>
              <td>{{ $c->notes }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </section>
  @empty
    <div class="empty">No classes for this selection.</div>
  @endforelse
</body>
</html>
