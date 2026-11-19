@extends('errors.layout')
@section('code', '404')
@section('error_title', 'Page Not Found')
@section('message', 'The page you are looking for may have been moved or no longer exists. Let us guide you back.')
@section('secondary')
    <a href="{{ route('courses') }}" class="err-btn"><i class="fas fa-book-open"></i> View Courses</a>
@endsection
