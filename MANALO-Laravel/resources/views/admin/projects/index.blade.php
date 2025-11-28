@extends('layouts.admin')

@section('content')
<div class="p-10 min-h-screen bg-darkbg text-white">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-4xl font-bold tracking-tight">Projects</h1>

        <a href="{{ route('admin.projects.create') }}"
           class="px-6 py-2 bg-primary text-white rounded-xl shadow-lg hover:scale-105 hover:bg-blue-500 transition transform duration-200">
            + Add Project
        </a>
    </div>

    {{-- PROJECT GRID --}}
    <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">

        @foreach ($projects as $project)
        <div class="group bg-card border border-gray-800 rounded-2xl p-5 shadow-lg 
                    hover:shadow-2xl hover:border-primary transition duration-300">

            {{-- IMAGE --}}
            @if($project->image)
                <div class="relative overflow-hidden rounded-xl mb-5">
                    <img src="{{ asset('storage/'.$project->image) }}"
                         class="w-full h-48 object-cover rounded-xl transform group-hover:scale-105 transition duration-500">
                </div>
            @endif

            {{-- TITLE --}}
            <h2 class="text-xl font-semibold mb-1">{{ $project->title }}</h2>

            {{-- CATEGORY TAG --}}
            <span class="inline-block mb-4 px-3 py-1 text-xs font-semibold rounded-full bg-primary/20 text-primary border border-primary/30">
                {{ $project->category }}
            </span>

            {{-- BUTTONS --}}
            <div class="mt-4 flex gap-3">

                <a href="{{ route('admin.projects.edit', $project->id) }}"
                    class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-500 hover:scale-[1.02] transition duration-200">
                    Edit
                </a>

                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this project?')">
                    @csrf
                    @method('DELETE')

                    <button
                        class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-500 hover:scale-[1.02] transition duration-200">
                        Delete
                    </button>
                </form>

            </div>

        </div>
        @endforeach

    </div>

</div>
@endsection
