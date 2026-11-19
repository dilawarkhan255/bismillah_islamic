@extends('errors.layout')
@section('code', '419')
@section('error_title', 'Page Expired')
@section('message', 'This page was open for too long. Please go back, refresh the page and submit the form again.')
@section('secondary')
    <a href="{{ url()->previous() }}" class="err-btn"><i class="fas fa-redo"></i> Go Back</a>
@endsection
