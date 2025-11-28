<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        darkbg: "#0d1117",
                        card: "#111827",
                        primary: "#2563eb",
                        textlight: "#9ca3af"
                    },
                    keyframes: {
                        fadeUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                    },
                    animation: {
                        fadeUp: 'fadeUp 0.7s ease-out forwards',
                    },
                }
            }
        }
    </script>

    <!-- Smooth Sidebar Reveal -->
    <style>
        .sidebar-link {
            @apply block px-4 py-2 rounded-lg text-textlight transition-all duration-300;
        }
        .sidebar-link:hover {
            @apply bg-primary text-white translate-x-1;
        }
    </style>
</head>

<body class="bg-darkbg text-white">

    <!-- SIDEBAR -->
    <div class="fixed top-0 left-0 h-full w-64 bg-card shadow-xl p-6 flex flex-col">
        
        <!-- Logo -->
        <div class="text-2xl font-bold mb-10 tracking-tight">
            Admin Dashboard
        </div>

        <!-- Nav Links -->
        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard') }}" 
                class="block py-3 px-2 rounded-lg hover:bg-primary/20 hover:text-primary transition">
                    Dashboard
                </a>

                <a href="{{ route('admin.projects.index') }}"
                class="block py-3 px-2 rounded-lg hover:bg-primary/20 hover:text-primary transition">
                    Projects
                </a>

            <hr class="border-gray-700 my-4">

            <a href="{{ route('logout') }}"
               class="block py-3 px-2 rounded-lg text-red-400 hover:text-white hover:bg-red-500"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
        </nav>

        <!-- Hidden Logout Form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>

    <!-- MAIN CONTENT -->
    <div class="ml-64 p-10">
        @yield('content')
    </div>

</body>
</html>
