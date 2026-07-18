@extends('admin.layouts.app')

@section('title', 'Edit Blog Post')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Edit Blog Post</h4>
    <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="panel">
    <div class="panel-body">
        <form action="{{ route('admin.blog.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required>
                        @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" class="form-control @error('excerpt') is-invalid @enderror" rows="3">{{ old('excerpt', $post->excerpt) }}</textarea>
                        @error('excerpt') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="12">{{ old('content', $post->content) }}</textarea>
                        @error('content') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        @if($post->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="rounded" width="120" height="80" style="object-fit:cover;">
                            </div>
                        @endif
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
                        <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author', $post->author) }}" required>
                        @error('author') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="published_at" class="form-label">Published At</label>
                        <input type="datetime-local" name="published_at" id="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
                        @error('published_at') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="read_time" class="form-label">Read Time (minutes)</label>
                        <input type="number" name="read_time" id="read_time" class="form-control @error('read_time') is-invalid @enderror" value="{{ old('read_time', $post->read_time) }}" min="1">
                        @error('read_time') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3 form-check form-switch">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" name="is_featured" id="is_featured" class="form-check-input" value="1" {{ old('is_featured', $post->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Featured Post</label>
                    </div>

                    <div class="mb-3 form-check form-switch">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active', $post->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-lg me-1"></i> Update Post
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
