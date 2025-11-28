@include('components.header')

<div class="min-h-screen flex items-center justify-center relative overflow-hidden">

    <!-- DARK BACKGROUND -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#0A0F1F] via-[#0D1117] to-[#111827]"></div>
    <div class="absolute inset-0 backdrop-blur-sm"></div>

    <!-- Login Card -->
    <div 
        id="loginBox"
        class="relative w-full max-w-md bg-white/10 backdrop-blur-xl p-8 rounded-3xl 
               shadow-2xl border border-white/10 opacity-0 translate-y-6 
               transition-all duration-700 ease-out"
    >

        <h2 class="text-3xl font-semibold text-center mb-2 tracking-tight text-white">
            Admin Login
        </h2>

        <p class="text-center text-red-400 font-semibold mb-6">
            ⚠ Authorized Personnel Only
        </p>

        {{-- Error messages --}}
        @if ($errors->any())
            <div class="bg-red-900/40 text-red-200 p-3 rounded-xl mb-4 shadow-sm border border-red-700/40">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Floating Label Input -->
            <div class="relative">
                <input 
                    type="email" 
                    name="email" 
                    required
                    class="peer w-full px-4 py-3 border rounded-xl bg-white/10 text-white 
                           focus:bg-white/20 border-gray-600 focus:border-blue-500
                           outline-none transition duration-200"
                >
                <label 
                    class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 
                           peer-focus:top-2 peer-focus:text-xs peer-focus:text-blue-400
                           peer-valid:top-2 peer-valid:text-xs peer-valid:text-blue-400
                           transition-all duration-200 pointer-events-none"
                >
                    Email
                </label>
            </div>

            <div class="relative">
                <input 
                    type="password" 
                    name="password" 
                    required
                    class="peer w-full px-4 py-3 border rounded-xl bg-white/10 text-white 
                           focus:bg-white/20 border-gray-600 focus:border-blue-500
                           outline-none transition duration-200"
                >
                <label 
                    class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 
                           peer-focus:top-2 peer-focus:text-xs peer-focus:text-blue-400
                           peer-valid:top-2 peer-valid:text-xs peer-valid:text-blue-400
                           transition-all duration-200 pointer-events-none"
                >
                    Password
                </label>
            </div>

            <button 
                type="submit"
                class="w-full py-3 bg-blue-600 text-white rounded-xl font-semibold 
                       hover:bg-blue-700 transition shadow-md hover:shadow-blue-900/50"
            >
                Login
            </button>
        </form>
    </div>

</div>

<!-- Fade In -->
<script>
    window.addEventListener("load", () => {
        document.getElementById("loginBox").classList.remove("opacity-0", "translate-y-6");
    });
</script>

@include('components.footer')
