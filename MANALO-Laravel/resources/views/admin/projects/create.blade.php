@extends('layouts.admin')

@section('content')
<div class="p-8 max-w-4xl mx-auto">

    <!-- Back Button -->
    <a href="{{ route('admin.projects.index') }}"
       class="inline-flex items-center gap-2 px-4 py-2 bg-gray-800 border border-gray-700 
              text-gray-300 rounded-xl hover:bg-gray-700 hover:text-white transition mb-6">
        <span class="text-lg">←</span> Back
    </a>

    <!-- Box Container -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 shadow-xl
        opacity-0 translate-y-4 animate-[fadeUp_0.7s_ease-out_forwards]">


        <h1 class="text-3xl font-bold text-white tracking-tight mb-6">Create Project</h1>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="font-medium text-gray-200">Title</label>
                <input type="text" name="title"
                       class="w-full mt-1 p-3 bg-gray-800 border border-gray-700 rounded-xl">
            </div>

            <div>
                <label class="font-medium text-gray-200">Category</label>
                <input type="text" name="category"
                       class="w-full mt-1 p-3 bg-gray-800 border border-gray-700 rounded-xl">
            </div>

            <div>
                <label class="font-medium text-gray-200">Description</label>
                <textarea name="description" rows="4"
                    class="w-full mt-1 p-3 bg-gray-800 border border-gray-700 rounded-xl"></textarea>
            </div>

            <div>
                <label class="font-medium text-gray-200">Main Image</label>
                <input type="file" name="image"
                       class="w-full mt-1 text-gray-300">
            </div>

            <div>
                <label class="font-medium text-gray-200">Screenshot / Preview Image</label>
                <input type="file" name="image_preview"
                       class="w-full mt-1 text-gray-300">
            </div>

            <button class="px-6 py-2 bg-primary text-white rounded-xl shadow hover:opacity-90 transition">
                Create
            </button>

        </form>

    </div>

</div>
@endsection
