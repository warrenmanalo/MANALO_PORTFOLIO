@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Content Manager</h1>

<!-- {{-- HERO FORM --}} -->
<div class="bg-gray-800 p-6 rounded mb-8">
    <h2 class="text-xl mb-4 font-semibold">Hero Section</h2>

    <form action="{{ route('admin.content.hero.update') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="heading" value="{{ $heroes->heading }}" class="w-full mb-3 p-2 rounded text-black">
        <input type="text" name="highlight" value="{{ $heroes->highlight }}" class="w-full mb-3 p-2 rounded text-black">
        <input type="text" name="subheading" value="{{ $heroes->subheading }}" class="w-full mb-3 p-2 rounded text-black">

        <button class="bg-blue-600 px-4 py-2 rounded text-white">Update Hero</button>
    </form>
</div>

<!-- {{-- ABOUT FORM --}} -->
<div class="bg-gray-800 p-6 rounded mb-8">
    <h2 class="text-xl mb-4 font-semibold">About Section</h2>

    <form action="{{ route('admin.content.about.update') }}" method="POST">
        @csrf
        <textarea name="about_text" class="w-full p-3 rounded text-black" rows="5">{{ $about->about_text }}</textarea>

        <button class="bg-blue-600 px-4 py-2 rounded text-white mt-3">Update About</button>
    </form>
</div>

<!-- {{-- CONTACT FORM --}} -->
<div class="bg-gray-800 p-6 rounded">
    <h2 class="text-xl mb-4 font-semibold">Contact Links</h2>

    <form action="{{ route('admin.content.contact.update') }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="facebook" value="{{ $contact->facebook_url }}" class="w-full mb-3 p-2 rounded text-black">
        <input type="text" name="email" value="{{ $contact->email }}" class="w-full mb-3 p-2 rounded text-black">
        <input type="text" name="github" value="{{ $contact->github_url }}" class="w-full mb-3 p-2 rounded text-black">

        <button class="bg-blue-600 px-4 py-2 rounded text-white">Update Contact</button>
    </form>
</div>
@endsection
