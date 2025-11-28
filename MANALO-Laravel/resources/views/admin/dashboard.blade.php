@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto py-10 px-6">

    {{-- PAGE TITLE --}}
    <h1 class="text-3xl font-semibold mb-8">Home Dashboard</h1>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div id="successMessage"
            class="mb-6 p-4 bg-green-600/20 border border-green-600 text-green-300 rounded-lg
                transition-all duration-700 ease-in-out">
            {{ session('success') }}
        </div>

        <script>
            // Auto-hide after 3 seconds with Tailwind transitions
            setTimeout(() => {
                const msg = document.getElementById('successMessage');
                if (msg) {
                    msg.classList.add('opacity-0', 'translate-y-2');
                    setTimeout(() => msg.style.display = 'none', 700);
                }
            }, 3000);
        </script>
    @endif


    {{-- HERO SECTION --}}
    <div class="bg-card border border-gray-700 rounded-xl mb-8 shadow-md opacity-0 translate-y-4 animate-[fadeUp_0.7s_ease-out_forwards]"> 
        <div class="border-b border-gray-700 px-6 py-4">
            <h2 class="text-xl font-semibold">Hero Section</h2>
        </div>

        <div class="p-6">
            <form action="{{ route('admin.content.hero.update') }}" method="POST" enctype="multipart/form-data"  class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-gray-300 mb-1">Heading</label>
                    <input type="text" name="heading"
                           class="w-full px-4 py-2 bg-darkbg border border-gray-700 rounded-lg text-white"
                           value="{{ $heroes->heading ?? 'Hi I\'m' }}">
                </div>

                <div>
                    <label class="block text-gray-300 mb-1">Subheading</label>
                    <input type="text" name="subheading"
                           class="w-full px-4 py-2 bg-darkbg border border-gray-700 rounded-lg text-white"
                           value="{{ $heroes->subheading ?? 'Aspiring Developer • CS Student • Tech Enthusiast' }}">
                </div>

                <div>
                    <label class="block text-gray-300 mb-1">Highlight Text</label>
                    <input type="text" name="highlight"
                           class="w-full px-4 py-2 bg-darkbg border border-gray-700 rounded-lg text-white"
                           value="{{ $heroes->highlight ?? 'Warren' }}">
                </div>

                <div>
                    <label class="font-medium text-gray-200">Profile Photo</label>
                    <input type="file" name="profile_photo" class="w-full mt-1 text-gray-300">
                    @if(isset($heroes) && $heroes->profile_photo)
                        <img src="{{ asset('storage/'.$heroes->profile_photo) }}" class="w-28 mt-2 rounded-xl border border-gray-700">
                    @endif
                </div>

                <button class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-blue-500">
                    Save Hero Section
                </button>
            </form>
        </div>
    </div>

    {{-- ABOUT SECTION --}}
    <div class="bg-card border border-gray-700 rounded-xl mb-8 shadow-md opacity-0 translate-y-4 animate-[fadeUp_0.7s_ease-out_forwards]">
        <div class="border-b border-gray-700 px-6 py-4">
            <h2 class="text-xl font-semibold">About Section</h2>
        </div>

        <div class="p-6">
            <form action="{{ route('admin.content.about.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-gray-300 mb-1">About Text</label>
                    <textarea name="about_text" rows="4"
                              class="w-full px-4 py-2 bg-darkbg border border-gray-700 rounded-lg text-white">{{ $about->about_text ?? '' }}</textarea>
                </div>

                <button class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-blue-500">
                    Save About Section
                </button>
            </form>
        </div>
    </div>

    {{-- CONTACT SECTION --}}
    <div class="bg-card border border-gray-700 rounded-xl mb-8 shadow-md opacity-0 translate-y-4 animate-[fadeUp_0.7s_ease-out_forwards]">
        <div class="border-b border-gray-700 px-6 py-4">
            <h2 class="text-xl font-semibold">Contact Links</h2>
        </div>

        <div class="p-6">
            <form action="{{ route('admin.content.contact.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-gray-300 mb-1">Facebook URL</label>
                    <input type="text" name="facebook_url"
                           class="w-full px-4 py-2 bg-darkbg border border-gray-700 rounded-lg text-white"
                           value="{{ $contact->facebook_url ?? '' }}">
                </div>

                <div>
                    <label class="block text-gray-300 mb-1">Email Address</label>
                    <input type="text" name="email"
                           class="w-full px-4 py-2 bg-darkbg border border-gray-700 rounded-lg text-white"
                           value="{{ $contact->email ?? '' }}">
                </div>

                <div>
                    <label class="block text-gray-300 mb-1">GitHub URL</label>
                    <input type="text" name="github_url"
                           class="w-full px-4 py-2 bg-darkbg border border-gray-700 rounded-lg text-white"
                           value="{{ $contact->github_url ?? '' }}">
                </div>

                <button class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-blue-500">
                    Save Contact Section
                </button>
            </form>
        </div>
    </div>

    {{-- PROJECTS --}}
    <div class="bg-card border border-gray-700 rounded-xl p-8 shadow-md text-center opacity-0 translate-y-4 animate-[fadeUp_0.7s_ease-out_forwards]">
        <h2 class="text-xl font-semibold mb-2">Manage Projects</h2>
        <p class="text-gray-400 mb-6">You can add, edit or delete your projects here.</p>

        <a href="{{ route('admin.projects.index') }}"
           class="px-6 py-2 bg-green-600 hover:bg-green-500 text-white rounded-lg">
            Go to Projects Manager
        </a>
    </div>

</div>

@endsection