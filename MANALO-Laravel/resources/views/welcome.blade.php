<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Portfolio</title>
    <!-- TAILWIND CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#1E90FF",
                        darkbg: "#0D1117",
                        card: "#111827",
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-darkbg text-gray-200 overflow-x-hidden">

    <!-- NAVBAR -->
    <nav class="fixed top-0 left-0 w-full z-50 backdrop-blur-md bg-darkbg/80 border-b border-primary/10">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-8 py-4">
            <h1 class="text-primary font-semibold text-xl">WDM</h1>
            <ul class="flex space-x-8">
                <li><a href="#hero" class="hover:text-primary transition">Home</a></li>
                <li><a href="#about" class="hover:text-primary transition">About</a></li>
                <li><a href="#projects" class="hover:text-primary transition">Projects</a></li>
                <li><a href="#contact" class="hover:text-primary transition">Contact</a></li>
            </ul>
        </div>
    </nav>
    

    <!-- HERO SECTION -->
    <section id="hero" class="min-h-screen flex flex-col justify-center px-8 pt-40 max-w-7xl mx-auto">
        <h1 id="hero-title" class="text-5xl font-bold opacity-0 animate-[fadeUp_1s_forwards]">
            <span>
                {{ $heroes->heading ?? '' }} 
                <span class="text-primary">{{ $heroes->highlight }}</span>
            </span>
        </h1>
        <p class="mt-3 text-xl opacity-0 animate-[fadeUp_1s_0.3s_forwards]">
             {{ $heroes->subheading ?? ''}}
        </p>
        <div class="w-32 h-1 bg-primary shadow-[0_0_15px_#1E90FF] mt-5 opacity-0 animate-[fadeUp_1s_0.6s_forwards]"></div>
    </section>

    <style>
        @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>

    <!-- ABOUT SECTION -->
    <section id="about" class="py-24 px-8 max-w-7xl mx-auto reveal opacity-0 translate-y-6 transition-all duration-700">
        <h2 class="text-3xl font-semibold mb-6">About Me</h2>
        <div class="bg-card p-8 rounded-xl border border-primary/20 hover:border-primary hover:shadow-[0_0_20px_#1E90FF40] transition">
            <p class="leading-relaxed text-gray-300 text-lg whitespace-pre-line">
            {{ $about->about_text ?? 'No about info added yet.' }}
        </p>
        </div>
    </section>

    <!-- PROJECTS SECTION -->
    <section id="projects" class="py-28 px-6 max-w-7xl mx-auto reveal opacity-0 translate-y-6 transition-all duration-700">
        <h2 class="text-4xl font-bold mb-14 tracking-tight">Projects</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($projects as $project)
            <div 
                onclick="openProjectModal({{ $project->id }})"
                class="cursor-pointer bg-card/40 backdrop-blur-md p-6 rounded-2xl border border-white/10 
                    hover:border-primary/50 hover:shadow-lg hover:shadow-primary/20 
                    transition transform hover:-translate-y-2 group"
            >
                <div class="overflow-hidden rounded-xl mb-4">
                    <img src="{{ asset('storage/' . $project->image) }}" 
                        class="w-full h-52 object-cover transition duration-500 group-hover:scale-110">
                </div>

                <h3 class="text-primary text-xl font-semibold mb-1 group-hover:text-primary/80 transition">
                    {{ $project->title }}
                </h3>

                <p class="text-gray-400 text-sm">{{ $project->category }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- MODAL -->
    <div id="projectModal"
        class="fixed inset-0 z-50 hidden bg-black/70 backdrop-blur-sm flex items-end md:items-center justify-center">
        
        <!-- Slide-Up Container -->
        <div id="modalPanel"
        class="hide-scrollbar w-full md:max-w-3xl bg-zinc-900 rounded-t-2xl md:rounded-2xl 
            border border-white/10 overflow-y-auto max-h-[92vh]
            transform translate-y-full transition-all duration-300 ease-out shadow-2xl">

            <!-- Header Image -->
            <div class="relative w-full h-64 md:h-72 overflow-hidden">
                <img id="modalImage" class="w-full h-full object-cover">

                <!-- Close Button -->
                <button onclick="closeProjectModal()"
                    class="absolute top-4 right-4 bg-black/60 p-2 rounded-full text-white hover:bg-black/80">
                    ✕
                </button>
            </div>

            <!-- Content -->
            <div class="p-6 space-y-4">

                <h3 id="modalTitle" class="text-3xl font-bold text-white"></h3>
                <p id="modalCategory" class="text-gray-400"></p>

                <div id="modalDescription" class="text-gray-300 leading-relaxed whitespace-pre-line"></div>

                <!-- Preview -->
                <div class="pt-4">
                    <h4 class="text-xl font-semibold text-white mb-3">Screenshot</h4>
                    <img id="modalPreview" class="w-full rounded-lg border border-white/10 shadow">
                </div>
            </div>
        </div>
    </div>

    <style>
        .hide-scrollbar {
            scrollbar-width: none;
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>

    <script>
        const projects = @json($projects);

        function openProjectModal(id) {
            const p = projects.find(pr => pr.id === id);

            modalImage.src = "/storage/" + p.image;
            modalTitle.textContent = p.title;
            modalCategory.textContent = p.category ?? "";
            modalDescription.innerHTML = p.description;

            modalPreview.src = p.image_preview
                ? "/storage/" + p.image_preview
                : "/storage/" + p.image;

            const modal = document.getElementById("projectModal");
            const panel = document.getElementById("modalPanel");

            modal.classList.remove("hidden");

            // slide-up animation
            setTimeout(() => {
                modal.classList.add("show");
                panel.classList.remove("translate-y-full");
            }, 10);

            // ensure scroll resets every time
            panel.scrollTop = 0;
        }

        function closeProjectModal() {
            const modal = document.getElementById("projectModal");
            const panel = document.getElementById("modalPanel");

            // slide down animation
            panel.classList.add("translate-y-full");

            setTimeout(() => {
                modal.classList.add("hidden");
                modal.classList.remove("show");
            }, 300);
        }

       

        // Click outside the modal panel closes it
        document.getElementById("projectModal").addEventListener("click", function (e) {
            const panel = document.getElementById("modalPanel");
            if (!panel.contains(e.target)) {
                closeProjectModal();
            }
        });

        // Pressing ESC closes the modal
        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape") {
                const modal = document.getElementById("projectModal");
                if (!modal.classList.contains("hidden")) {
                    closeProjectModal();
                }
            }
        });
    </script>

   <!-- CONTACT SECTION -->
    <section id="contact" class="py-24 px-8 text-center max-w-7xl mx-auto reveal opacity-0 translate-y-6 transition-all duration-700">
        <h2 class="text-3xl font-semibold mb-4">Contact Me</h2>
        <p class="text-gray-300">Let's connect — feel free to reach out.</p>

        <div class="flex justify-center gap-6 mt-6">

            @if($contact && $contact->facebook_url)
                <a href="{{ $contact->facebook_url }}" target="_blank"
                class="px-6 py-2 border border-primary rounded-lg hover:bg-primary hover:text-darkbg hover:shadow-[0_0_10px_#1E90FF] transition">
                    Facebook
                </a>
            @endif

            @if($contact && $contact->email)
                <a href="mailto:{{ $contact->email }}"
                class="px-6 py-2 border border-primary rounded-lg hover:bg-primary hover:text-darkbg hover:shadow-[0_0_10px_#1E90FF] transition">
                    Email
                </a>
            @endif

            @if($contact && $contact->github_url)
                <a href="{{ $contact->github_url }}" target="_blank"
                class="px-6 py-2 border border-primary rounded-lg hover:bg-primary hover:text-darkbg hover:shadow-[0_0_10px_#1E90FF] transition">
                    GitHub
                </a>
            @endif

        </div>
    </section>


    <!-- JAVASCRIPT -->
    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener("click", function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute("href")).scrollIntoView({ behavior: "smooth" });
            });
        });

        const revealElements = document.querySelectorAll(".reveal");

        function revealLoop() {
            const windowHeight = window.innerHeight;

            revealElements.forEach(el => {
                const elementTop = el.getBoundingClientRect().top;
                const elementBottom = el.getBoundingClientRect().bottom;

                if (elementBottom > 0 && elementTop < windowHeight) {
                    // element is visible
                    el.classList.add("opacity-100", "translate-y-0");
                } else {
                    // element is out of viewport
                    el.classList.remove("opacity-100", "translate-y-0");
                }
            });
        }

        window.addEventListener("scroll", revealLoop);
        revealLoop();

        function typeHTMLOrdered(element, speed) {
            const original = element.innerHTML;     // store original HTML including <span class="text-primary">
            const temp = document.createElement("div");
            temp.innerHTML = original;

            const nodes = Array.from(temp.childNodes);
            element.innerHTML = "";

            function typeNode(node, parent, done) {
                if (node.nodeType === 3) {
                    // TEXT NODE
                    let text = node.textContent;
                    let i = 0;

                    function typeChar() {
                        if (i < text.length) {
                            parent.append(text[i]);
                            i++;
                            setTimeout(typeChar, speed);
                        } else {
                            done();
                        }
                    }
                    typeChar();

                } else if (node.nodeType === 1) {
                    // ELEMENT NODE (span, strong, etc.)
                    const clone = node.cloneNode(false); // clone tag + attributes
                    parent.appendChild(clone);

                    const children = Array.from(node.childNodes);
                    let index = 0;

                    function nextChild() {
                        if (index >= children.length) return done();
                        typeNode(children[index], clone, () => {
                            index++;
                            nextChild();
                        });
                    }
                    nextChild();
                }
            }

            let index = 0;
            function nextNode() {
                if (index >= nodes.length) return;
                typeNode(nodes[index], element, () => {
                    index++;
                    nextNode();
                });
            }
            nextNode();
        }


        const heroTitle = document.getElementById("hero-title");
        typeHTMLOrdered(heroTitle, 5);
    </script>

</body>
</html>