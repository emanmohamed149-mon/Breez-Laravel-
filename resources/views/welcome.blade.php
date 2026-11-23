<!DOCTYPE html>
<html lang="en" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FANTASTIC // Cyberpunk Restaurant</title>
        <!-- Fonts: Orbitron for titles, Space Mono for text -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=orbitron:400,900|space-mono:400,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Space Mono', monospace; }
            .font-cyber { font-family: 'Orbitron', sans-serif; }
            
            /* High-End Food & Neon Cinematic Background */
            .hero-food-bg {
                background-image: 
                    linear-gradient(to right, rgba(11, 15, 25, 0.95) 20%, rgba(11, 15, 25, 0.75) 60%, rgba(11, 15, 25, 0.4) 100%),
                    url('https://images.unsplash.com/photo-1513104890138-7c749659a591?q=80&w=2070&auto=format&fit=crop');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }

            .glow-pink {
                box-shadow: 0 0 25px rgba(236, 72, 153, 0.45);
            }
            .glow-pink:hover {
                box-shadow: 0 0 35px rgba(236, 72, 153, 0.75);
            }
            .glow-cyan {
                box-shadow: 0 0 20px rgba(6, 182, 212, 0.35);
            }
        </style>
    </head>
    <body class="hero-food-bg text-gray-100 antialiased selection:bg-pink-500 selection:text-white min-h-screen flex flex-col justify-between">

        <!-- Header / Nav -->
        <header class="w-full max-w-7xl mx-auto px-6 py-6 flex justify-between items-center relative z-10 border-b border-white/10 backdrop-blur-sm">
            <div class="flex items-center gap-3">
                <span class="text-3xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-cyan-400 font-cyber">
                    FANTASTIC
                </span>
                <span class="hidden sm:inline-block text-xs text-cyan-300 border border-cyan-500/40 px-3 py-1 rounded-full bg-cyan-950/60 font-mono">
                    ⚡ FUTURE OF DINING
                </span>
            </div>
            
            @if (Route::has('login'))
                <nav class="flex items-center gap-4 font-mono">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-bold text-cyan-300 hover:text-white border border-cyan-500/50 px-5 py-2.5 rounded-xl bg-cyan-500/15 transition glow-cyan">
                            // CONTROL PANEL →
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-pink-400 px-3 py-2 transition">
                            Login
                        </a>
                       
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Main Hero Section -->
        <main class="relative z-10 max-w-7xl mx-auto px-6 py-16 w-full grid grid-cols-1 lg:grid-cols-12 gap-12 items-center flex-grow">
            
            <!-- Creative Marketing Content -->
            <div class="lg:col-span-7 text-left">
                <div class="inline-flex items-center gap-2 mb-6 border border-pink-500/40 bg-pink-950/70 text-pink-300 text-xs font-bold px-4 py-2 rounded-full font-mono">
                    <span class="w-2 h-2 rounded-full bg-pink-500 animate-ping"></span>
                    KITCHEN MATRIX ONLINE // HIGH-OCTANE FLAVORS
                </div>
                
                <h1 class="text-5xl md:text-7xl font-black tracking-tight mb-6 text-white leading-none font-cyber">
                    TASTE THE <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-purple-400 to-cyan-400">FUTURE</span>
                    <br>IN EVERY BITE!
                </h1>
                
                <p class="text-gray-200 text-lg md:text-xl max-w-2xl mb-10 leading-relaxed font-mono bg-[#0b0f19]/60 p-5 rounded-2xl border-l-4 border-cyan-400 backdrop-blur-md">
                    At <strong class="text-pink-400 font-cyber">FANTASTIC</strong>, we don't just serve fast food—we engineer complete culinary experiences combining melted mozzarella, sizzling spices, and next-gen restaurant management.
                </p>
                
                <div class="flex flex-wrap gap-4 font-mono">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-pink-600 to-purple-600 hover:from-pink-500 hover:to-purple-500 text-white font-bold px-8 py-4 rounded-2xl transition glow-pink text-sm tracking-widest uppercase">
                            Access Admin Dashboard →
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-gradient-to-r from-pink-600 to-purple-600 hover:from-pink-500 hover:to-purple-500 text-white font-bold px-8 py-4 rounded-2xl transition glow-pink text-sm tracking-widest uppercase">
                            Initialize Management →
                        </a>
                    @endauth
                    
                    <!-- Public Menu Button for Customers -->
                    <a href="{{ route('public.menu') }}" class="text-sm font-bold text-cyan-300 hover:text-white border border-cyan-400/50 px-8 py-4 rounded-2xl bg-[#0b0f19]/80 hover:bg-cyan-500/20 transition glow-cyan backdrop-blur-md tracking-widest uppercase">
                        Explore Menu 🍕
                    </a>
                </div>
            </div>

            <!-- Showcase Food Cards -->
            <div class="lg:col-span-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-5">
                <!-- Card 1 -->
                <div class="bg-[#121826]/90 backdrop-blur-md border border-pink-500/30 rounded-2xl p-4 flex items-center gap-4 hover:border-pink-500 transition shadow-xl">
                    <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?q=80&w=400&auto=format&fit=crop" alt="Pizza" class="w-24 h-24 rounded-xl object-cover border border-pink-500/40 shrink-0">
                    <div>
                        <span class="text-[11px] font-bold font-mono text-pink-400 bg-pink-500/10 px-2.5 py-0.5 rounded-md">TOP SELLER 🔥</span>
                        <h3 class="text-lg font-bold text-white mt-1 font-cyber">Neon Cheese Pizza</h3>
                        <p class="text-xs text-gray-400 mt-1 font-mono">Crispy crust with melted synthetic mozzarella matrix.</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-[#121826]/90 backdrop-blur-md border border-cyan-500/30 rounded-2xl p-4 flex items-center gap-4 hover:border-cyan-500 transition shadow-xl">
                    <img src="https://images.unsplash.com/photo-1626777552726-4a6b54c97e46?q=80&w=400&auto=format&fit=crop" alt="Chicken Wrap" class="w-24 h-24 rounded-xl object-cover border border-cyan-500/40 shrink-0">
                    <div>
                        <span class="text-[11px] font-bold font-mono text-cyan-400 bg-cyan-500/10 px-2.5 py-0.5 rounded-md">NEW PROTOCOL ⚡</span>
                        <h3 class="text-lg font-bold text-white mt-1 font-cyber">Cyber Chicken Roll</h3>
                        <p class="text-xs text-gray-400 mt-1 font-mono">Spiced grilled chicken wrapped in high-voltage tortilla.</p>
                    </div>
                </div>
            </div>

        </main>

        <!-- Footer -->
        <footer class="relative z-10 w-full text-center py-5 text-xs text-gray-400 font-mono border-t border-white/10 bg-[#0b0f19]/90 backdrop-blur-md">
            FANTASTIC RESTAURANT SYSTEMS © 2026 // ALL RIGHTS RESERVED
        </footer>

    </body>
</html>