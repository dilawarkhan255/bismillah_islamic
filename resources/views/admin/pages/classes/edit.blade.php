@extends('admin.layouts.app')

@section('title', 'Edit Class')

@section('content')
<x-admin.page-header title="Edit Class" icon="bi-calendar-week" eyebrow="{{ $class->student->name }}" :back="route('admin.students.edit', $class->student)"></x-admin.page-header>

<div class="panel" style="max-width:820px;">
  <div class="panel-body">
    <form action="{{ route('admin.classes.update', $class) }}" method="POST">
      @csrf @method('PUT')
      <input type="hidden" name="student_id" value="{{ $class->student_id }}">
      @include('admin.pages.classes._fields', ['class' => $class])
      <div class="text-end mt-4">
        <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Save class</button>
      </div>
    </form>
  </div>
</div>
@endsection
