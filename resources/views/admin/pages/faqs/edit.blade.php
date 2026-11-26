@extends('admin.layouts.app')

@section('title', 'Edit Question')

@section('content')
<x-admin.page-header title="Edit Question" icon="bi-chat-dots" eyebrow="Chatbot FAQs" :back="route('admin.faqs.index')"></x-admin.page-header>

<div class="panel">
  <div class="panel-body">
    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
      @csrf @method('PUT')
      @include('admin.pages.faqs._form')
      <div class="text-end mt-4"><button class="btn btn-primary" type="submit"><i class="bi bi-check-lg"></i> Save</button></div>
    </form>
  </div>
</div>
@endsection
