<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>

    {{-- Tailwind CDN (optional) --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Hero Section -->
    <section class="min-h-screen flex flex-col justify-center items-center text-center">
        <h1 class="text-5xl font-bold mb-4">Hello, I'm <span class="text-indigo-600">Your Name</span></h1>
        <p class="text-xl text-gray-600 max-w-xl">
            Full-stack developer specializing in Laravel, Vue, and modern web applications.
        </p>
        <a href="#projects"
           class="mt-8 inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700">
            View My Work
        </a>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-white" id="about">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-4">About Me</h2>
            <p class="text-gray-700 leading-relaxed">
                I am a passionate developer with experience building clean, scalable applications.
                I enjoy backend development, UI/UX design, and creating meaningful digital experiences.
            </p>
        </div>
    </section>

    <!-- Projects Section -->
    <section class="py-20 bg-gray-100" id="projects">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-10 text-center">Projects</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Example Project -->
                <div class="bg-white rounded-lg shadow p-4">
                    <img src="https://via.placeholder.com/600x400"
                         class="rounded-md mb-4" alt="Project Image">
                    <h3 class="text-xl font-semibold mb-2">Project Title</h3>
                    <p class="text-gray-600 mb-4">Short description of the project...</p>
                    <a href="#" class="text-indigo-600 font-medium hover:underline">View Details →</a>
                </div>

                <!-- Duplicate these for more projects -->
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-white" id="contact">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-4">Get in Touch</h2>
            <p class="text-gray-700 mb-6">
                Have a project or want to collaborate? Send me a message!
            </p>

            <a href="mailto:you@example.com"
               class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                Contact Me
            </a>
        </div>
    </section>

</body>
</html>
