<!DOCTYPE html>
<html lang="en" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FANTASTIC // Menu</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=orbitron:400,900|space-mono:400,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Space Mono', monospace; }
            .font-cyber { font-family: 'Orbitron', sans-serif; }
            .hero-food-bg {
                background-image: 
                    linear-gradient(to right, rgba(11, 15, 25, 0.95) 20%, rgba(11, 15, 25, 0.75) 60%, rgba(11, 15, 25, 0.4) 100%),
                    url('https://images.unsplash.com/photo-1513104890138-7c749659a591?q=80&w=2070&auto=format&fit=crop');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }
            .glow-pink { box-shadow: 0 0 25px rgba(236, 72, 153, 0.45); }
            .glow-cyan { box-shadow: 0 0 20px rgba(6, 182, 212, 0.35); }
        </style>
    </head>
    <body class="hero-food-bg text-gray-100 antialiased selection:bg-pink-500 selection:text-white min-h-screen flex flex-col justify-between">

        <!-- Header -->
        <header class="w-full max-w-7xl mx-auto px-6 py-6 flex justify-between items-center relative z-10 border-b border-white/10 backdrop-blur-sm">
            <div class="flex items-center gap-3">
                <span class="text-3xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-cyan-400 font-cyber">
                    FANTASTIC
                </span>
                <span class="hidden sm:inline-block text-xs text-cyan-300 border border-cyan-500/40 px-3 py-1 rounded-full bg-cyan-950/60 font-mono">
                    ⚡ MENU PROTOCOL
                </span>
            </div>
            <nav class="flex items-center gap-4 font-mono">
                <a href="{{ url('/') }}" class="text-sm font-bold text-cyan-300 hover:text-white border border-cyan-500/50 px-5 py-2.5 rounded-xl bg-cyan-500/15 transition glow-cyan">
                    ← HOME
                </a>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="relative z-10 max-w-7xl mx-auto px-6 py-12 w-full flex-grow">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-6xl font-black tracking-tight mb-4 text-white font-cyber">
                    CYBER <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-cyan-400">MENU</span>
                </h1>
                <p class="text-gray-400 font-mono max-w-xl mx-auto text-sm">
                    Explore our high-voltage selection of engineered meals, cheese matrices, and futuristic flavors.
                </p>
            </div>

            <!-- Meals Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($meals as $meal)
                    <div class="bg-[#121826]/90 backdrop-blur-md border border-pink-500/30 rounded-2xl p-5 hover:border-pink-500 transition shadow-xl flex flex-col justify-between">
                        <div>
                            <!-- Meal Image with Click-to-Zoom Trigger -->
                            @if($meal->image)
                                <div class="overflow-hidden rounded-xl mb-4 border border-pink-500/30 shadow-[0_0_10px_rgba(236,72,153,0.2)]">
                                    <img src="{{ asset('storage/' . $meal->image) }}" 
                                         alt="{{ $meal->name }}" 
                                         class="w-full h-48 object-cover cursor-pointer hover:scale-105 transition duration-300"
                                         onclick="openModal('{{ asset('storage/' . $meal->image) }}')"
                                         title="Click to view larger image">
                                </div>
                            @else
                                <div class="w-full h-48 bg-gray-900 border border-gray-800 rounded-xl flex items-center justify-center text-xs text-gray-500 font-mono mb-4">
                                    NO IMAGE AVAILABLE
                                </div>
                            @endif

                            <div class="flex justify-between items-start mb-2">
                                <span class="text-[11px] font-bold font-mono text-cyan-400 bg-cyan-500/10 px-2.5 py-0.5 rounded-md border border-cyan-500/20">
                                    {{ $meal->category->name ?? 'General' }}
                                </span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-white mb-2 font-cyber">{{ $meal->name }}</h3>
                            <p class="text-xs text-gray-400 font-mono mb-4 leading-relaxed">
                                Prepared under high-voltage culinary protocols for maximum flavor impact.
                            </p>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-800/80">
                            <span class="text-lg font-bold font-mono text-emerald-400">${{ number_format($meal->price, 2) }}</span>
                            <span class="text-[11px] font-mono text-pink-400 bg-pink-500/10 border border-pink-500/30 px-3 py-1 rounded-lg">AVAILABLE</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 text-gray-500 font-mono">
                        No meals found in the matrix yet. Check back soon!
                    </div>
                @endforelse
            </div>
        </main>

        <!-- Image Modal Viewer Overlay -->
        <div id="imageModal" class="fixed inset-0 z-50 hidden bg-black/85 backdrop-blur-md flex items-center justify-center p-4 cursor-pointer" onclick="closeModal()">
            <div class="relative max-w-4xl w-full flex justify-center items-center" onclick="event.stopPropagation()">
                <img id="modalImage" src="" alt="Zoomed Meal View" class="max-h-[85vh] max-w-full rounded-2xl border-2 border-pink-500 shadow-[0_0_40px_rgba(236,72,153,0.6)] object-contain bg-black">
                <button onclick="closeModal()" class="absolute -top-12 right-0 text-white text-3xl font-bold hover:text-pink-400 transition font-mono bg-pink-600/30 w-10 h-10 rounded-full flex items-center justify-center border border-pink-500/50">×</button>
            </div>
        </div>

        <script>
            function openModal(imgSrc) {
                const modal = document.getElementById('imageModal');
                const modalImg = document.getElementById('modalImage');
                modalImg.src = imgSrc;
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Prevent background scrolling
            }

            function closeModal() {
                const modal = document.getElementById('imageModal');
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto'; // Restore scrolling
            }
        </script>

        <!-- Footer -->
        <footer class="relative z-10 w-full text-center py-5 text-xs text-gray-400 font-mono border-t border-white/10 bg-[#0b0f19]/90 backdrop-blur-md">
            FANTASTIC RESTAURANT SYSTEMS © 2026 // ALL RIGHTS RESERVED
        </footer>

    </body>
</html>