@extends('admin.layouts.app')

@section('title', 'Site Settings')

@php use App\Models\SiteSetting; @endphp

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Site Settings</h4>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="panel mb-4">
        <div class="panel-header">
            <h5 class="mb-0"><i class="bi bi-telephone"></i> Contact Information</h5>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Phone (Pakistan)</label>
                    <input type="text" name="settings[phone]" class="form-control" value="{{ SiteSetting::get('phone') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Phone (UK)</label>
                    <input type="text" name="settings[phone_uk]" class="form-control" value="{{ SiteSetting::get('phone_uk') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="settings[email]" class="form-control" value="{{ SiteSetting::get('email') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">WhatsApp (Pakistan)</label>
                    <input type="text" name="settings[whatsapp]" class="form-control" value="{{ SiteSetting::get('whatsapp') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">WhatsApp (UK)</label>
                    <input type="text" name="settings[whatsapp_uk]" class="form-control" value="{{ SiteSetting::get('whatsapp_uk') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Class Hours</label>
                    <input type="text" name="settings[class_hours]" class="form-control" value="{{ SiteSetting::get('class_hours') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="settings[address]" class="form-control" value="{{ SiteSetting::get('address') }}">
                </div>
            </div>
        </div>
    </div>

    <div class="panel mb-4">
        <div class="panel-header">
            <h5 class="mb-0"><i class="bi bi-share"></i> Social Media</h5>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Facebook URL</label>
                    <input type="url" name="settings[facebook]" class="form-control" value="{{ SiteSetting::get('facebook') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Instagram URL</label>
                    <input type="url" name="settings[instagram]" class="form-control" value="{{ SiteSetting::get('instagram') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">YouTube URL</label>
                    <input type="url" name="settings[youtube]" class="form-control" value="{{ SiteSetting::get('youtube') }}">
                </div>
            </div>
        </div>
    </div>

    <div class="panel mb-4">
        <div class="panel-header">
            <h5 class="mb-0"><i class="bi bi-image"></i> Page Images</h5>
        </div>
        <div class="panel-body">
            <p class="text-muted small mb-3">Upload images for different pages. Leave empty to keep the default template image.</p>

            @php
                $imageFields = [
                    'img_logo' => ['label' => 'Site Logo', 'desc' => 'Header logo'],
                    'img_home_feature' => ['label' => 'Why Choose Us', 'desc' => 'Home page feature section'],
                    'img_home_trial' => ['label' => 'Free Trial', 'desc' => 'Home page trial section'],
                    'img_how_to_learn' => ['label' => 'How to Learn', 'desc' => 'Home page learning section'],
                    'img_home_teams' => ['label' => 'Our Teams', 'desc' => 'Home page teams banner'],
                    'img_about_hero' => ['label' => 'About Hero', 'desc' => 'About page top image'],
                    'img_about_team' => ['label' => 'About Team', 'desc' => 'About page team section'],
                    'img_about_bg' => ['label' => 'About Background', 'desc' => 'About page parallax background'],
                    'img_courses_hero' => ['label' => 'Courses Hero', 'desc' => 'Courses page top banner'],
                    'img_gallery_hero' => ['label' => 'Gallery Hero', 'desc' => 'Gallery page top banner'],
                ];
            @endphp

            <div class="row">
                @foreach($imageFields as $key => $field)
                    @php $current = SiteSetting::get($key); @endphp
                    <div class="col-md-4 mb-4">
                        <label class="form-label fw-semibold">{{ $field['label'] }}</label>
                        <div class="text-muted small mb-2">{{ $field['desc'] }}</div>
                        @if($current)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $current) }}" alt="{{ $field['label'] }}" class="rounded" style="width:100%;max-height:120px;object-fit:cover;border:1px solid #ddd;">
                            </div>
                        @endif
                        <input type="file" name="images[{{ $key }}]" class="form-control" accept="image/*">
                    </div>
                @endforeach
            </div>

            <hr>
            <h6 class="mb-3">Footer Gallery Images (6 slides)</h6>
            <div class="row">
                @for($i = 1; $i <= 6; $i++)
                    @php $key = 'img_footer_project_' . $i; $current = SiteSetting::get($key); @endphp
                    <div class="col-md-2 mb-3">
                        <label class="form-label fw-semibold">Project {{ $i }}</label>
                        @if($current)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $current) }}" alt="Project {{ $i }}" class="rounded" style="width:100%;height:80px;object-fit:cover;border:1px solid #ddd;">
                            </div>
                        @endif
                        <input type="file" name="images[{{ $key }}]" class="form-control form-control-sm" accept="image/*">
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="panel mb-4">
        <div class="panel-header">
            <h5 class="mb-0"><i class="bi bi-gear"></i> Other Settings</h5>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Google Maps Embed URL</label>
                    <input type="url" name="settings[google_maps]" class="form-control" value="{{ SiteSetting::get('google_maps') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Copyright Text</label>
                    <input type="text" name="settings[copyright]" class="form-control" value="{{ SiteSetting::get('copyright') }}">
                </div>
            </div>
        </div>
    </div>

    <div class="text-end mb-5">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-lg"></i> Save Settings
        </button>
    </div>
</form>
@endsection
