@extends('layouts.admin')

@section('content')
<div class="p-8 max-w-3xl mx-auto">

    <h1 class="text-3xl font-semibold mb-6">Create Project</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="font-medium">Title</label>
            <input type="text" name="title"
                class="w-full mt-1 p-2 bg-gray-900 border border-gray-700 rounded">
        </div>

        <div>
            <label class="font-medium">Category</label>
            <input type="text" name="category"
                class="w-full mt-1 p-2 bg-gray-900 border border-gray-700 rounded">
        </div>

        <div>
            <label class="font-medium">Description</label>
            <textarea name="description" rows="4"
                class="w-full mt-1 p-2 bg-gray-900 border border-gray-700 rounded"></textarea>
        </div>

        <div>
            <label class="font-medium">Main Image</label>
            <input type="file" name="image"
                class="w-full mt-1 text-gray-300">
        </div>

        <div>
            <label class="font-medium">Screenshot / Preview Image</label>
            <input type="file" name="image_preview"
                class="w-full mt-1 text-gray-300">
        </div>

        <button class="px-6 py-2 bg-primary text-white rounded-lg">Create</button>

    </form>

</div>
@endsection
