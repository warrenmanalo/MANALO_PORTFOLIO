@extends('layouts.admin')

@section('content')
<div class="p-8 max-w-3xl mx-auto">

    <h1 class="text-3xl font-semibold mb-6">Edit Project</h1>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="font-medium">Title</label>
            <input type="text" name="title"
                   value="{{ $project->title }}"
                   class="w-full mt-1 p-2 bg-gray-900 border border-gray-700 rounded">
        </div>

        <div>
            <label class="font-medium">Category</label>
            <input type="text" name="category"
                   value="{{ $project->category }}"
                   class="w-full mt-1 p-2 bg-gray-900 border border-gray-700 rounded">
        </div>

        <div>
            <label>Description</label>
            <textarea name="description" rows="4"
                class="w-full mt-1 p-2 bg-gray-900 border-gray-700 rounded">{{ $project->description }}</textarea>
        </div>

        <div>
            <label>Main Image</label>
            <input type="file" name="image" class="w-full mt-1 text-gray-300">
            @if($project->image)
                <img src="{{ asset('storage/'.$project->image) }}" class="w-28 mt-2 rounded">
            @endif
        </div>

        <div>
            <label>Screenshot / Preview</label>
            <input type="file" name="image_preview" class="w-full mt-1 text-gray-300">
            @if($project->image_preview)
                <img src="{{ asset('storage/'.$project->image_preview) }}" class="w-28 mt-2 rounded">
            @endif
        </div>

        <button class="px-6 py-2 bg-primary text-white rounded-lg">Update</button>

    </form>

</div>
@endsection
