@extends('layouts.admin')

@section('content')
<div class="p-8">

    <div class="flex justify-between mb-8">
        <h1 class="text-3xl font-semibold">Projects</h1>
        <a href="{{ route('admin.projects.create') }}"
            class="px-6 py-2 bg-primary text-white rounded-lg">+ Add Project</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($projects as $project)
        <div class="bg-gray-900 border border-gray-700 rounded-xl p-4">

            @if($project->image)
                <img src="{{ asset('storage/'.$project->image) }}" class="rounded-lg mb-4">
            @endif

            <h2 class="text-xl font-semibold">{{ $project->title }}</h2>
            <p class="text-primary">{{ $project->category }}</p>

            <div class="mt-4 flex gap-2">
                <a href="{{ route('admin.projects.edit', $project->id) }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded">Edit</a>

                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-2 bg-red-600 text-white rounded">Delete</button>
                </form>
            </div>

        </div>
        @endforeach

    </div>

</div>
@endsection
