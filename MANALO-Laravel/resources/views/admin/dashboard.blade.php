@extends('layouts.admin') 
@section('content')

<div class="container py-4">
    
    <h1 class="mb-4">Home Dashboard</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- HERO SECTION --}}
    <div class="card mb-4">
        <div class="card-header">
            <h4>Hero Section</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.content.hero.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" 
                           value="{{ $heroes->heading ?? '' }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Subheading</label>
                    <input type="text" name="subheading" class="form-control" 
                           value="{{ $heroes->subheading ?? '' }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Highlight Text</label>
                    <input type="text" name="highlight" class="form-control" 
                           value="{{ $heroes->highlight ?? '' }}">
                </div>

                <button class="btn btn-primary">Save Hero Section</button>
            </form>
        </div>
    </div>

    {{-- ABOUT --}}
    <div class="card mb-4">
        <div class="card-header">
            <h4>About Section</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.content.about.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">About Text</label>
                    <textarea name="about_text" class="form-control" rows="4">{{ $about->about_text ?? '' }}</textarea>
                </div>

                <button class="btn btn-primary">Save About Section</button>
            </form>
        </div>
    </div>

    {{-- CONTACT --}}
    <div class="card mb-4">
        <div class="card-header">
            <h4>Contact Links</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.content.contact.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Facebook URL</label>
                    <input type="text" name="facebook_url" class="form-control" 
                           value="{{ $contact->facebook_url ?? '' }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="text" name="email" class="form-control" 
                           value="{{ $contact->email ?? '' }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">GitHub URL</label>
                    <input type="text" name="github_url" class="form-control" 
                           value="{{ $contact->github_url ?? '' }}">
                </div>

                <button class="btn btn-primary">Save Contact Section</button>
            </form>
        </div>
    </div>

    {{-- PROJECTS --}}
    <div class="card">
        <div class="card-body text-center">
            <h4>Manage Projects</h4>
            <p>You can add, edit or delete your projects here.</p>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-success">
                Go to Projects Manager
            </a>
        </div>
    </div>

</div>

@endsection
