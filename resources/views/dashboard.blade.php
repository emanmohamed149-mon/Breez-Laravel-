<x-app-layout>
    <div class="py-12 bg-[#0b0f19] min-h-screen text-gray-100 font-mono">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Cyber Header Banner -->
            <div class="mb-8 p-6 bg-[#121826] border border-pink-500/30 rounded-2xl shadow-[0_0_20px_rgba(236,72,153,0.15)] flex flex-col md:flex-row justify-between items-center gap-4 relative overflow-hidden">
                <div class="absolute inset-0 opacity-20 bg-cover bg-center pointer-events-none" style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?q=80&w=2070&auto=format&fit=crop');"></div>
                <div class="relative z-10">
                    <span class="text-xs text-cyan-400 bg-cyan-950/50 border border-cyan-800 px-3 py-1 rounded-full uppercase tracking-widest">
                        // KITCHEN MATRIX ONLINE
                    </span>
                    <h2 class="text-3xl font-black text-white mt-2 tracking-wide font-title">
                        WELCOME BACK, <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-cyan-400">{{ Auth::user()->name }}</span>
                    </h2>
                </div>
                <div class="flex gap-3 relative z-10">
                    <a href="{{ route('categories.index') }}" class="px-5 py-2.5 rounded-xl bg-cyan-500/10 border border-cyan-500/40 text-cyan-300 hover:bg-cyan-500/20 transition text-sm shadow-[0_0_10px_rgba(6,182,212,0.2)]">
                        Manage Categories →
                    </a>
                    <a href="{{ route('meals.index') }}" class="px-5 py-2.5 rounded-xl bg-pink-500/10 border border-pink-500/40 text-pink-300 hover:bg-pink-500/20 transition text-sm shadow-[0_0_10px_rgba(236,72,153,0.2)]">
                        Manage Cyber Meals →
                    </a>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-[#121826] border border-gray-800 hover:border-cyan-500/50 transition rounded-2xl p-6 shadow-xl relative overflow-hidden group">
                    <p class="text-xs text-gray-400 uppercase tracking-widest mb-1">System Status</p>
                    <h3 class="text-2xl font-black text-cyan-400">ONLINE 100%</h3>
                    <div class="mt-4 w-full bg-gray-900 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-cyan-400 h-full w-full shadow-[0_0_8px_rgba(6,182,212,0.8)]"></div>
                    </div>
                </div>

                <div class="bg-[#121826] border border-gray-800 hover:border-pink-500/50 transition rounded-2xl p-6 shadow-xl relative overflow-hidden group">
                    <p class="text-xs text-gray-400 uppercase tracking-widest mb-1">Active Database</p>
                    <h3 class="text-2xl font-black text-pink-500">LARA_RESTAURANT</h3>
                    <div class="mt-4 w-full bg-gray-900 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-pink-500 h-full w-3/4 shadow-[0_0_8px_rgba(236,72,153,0.8)]"></div>
                    </div>
                </div>

                <div class="bg-[#121826] border border-gray-800 hover:border-purple-500/50 transition rounded-2xl p-6 shadow-xl relative overflow-hidden group">
                    <p class="text-xs text-gray-400 uppercase tracking-widest mb-1">Security Level</p>
                    <h3 class="text-2xl font-black text-purple-400">ADMIN PROTOCOL</h3>
                    <div class="mt-4 w-full bg-gray-900 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-purple-400 h-full w-full shadow-[0_0_8px_rgba(168,85,247,0.8)]"></div>
                    </div>
                </div>
            </div>

            <!-- Featured Food Banner Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Card With Food Vibe 1 -->
                <div class="bg-[#121826] border border-pink-500/30 rounded-2xl p-6 relative overflow-hidden group shadow-[0_0_15px_rgba(236,72,153,0.1)] flex flex-col justify-between h-64">
                    <div class="absolute inset-0 opacity-30 bg-cover bg-center transition duration-500 group-hover:scale-105" style="background-image: url('https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?q=80&w=1000&auto=format&fit=crop');"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0b0f19] via-[#0b0f19]/60 to-transparent"></div>
                    
                    <div class="relative z-10">
                        <span class="text-xs text-pink-400 bg-pink-950/80 px-2.5 py-1 rounded-md border border-pink-500/40">HOT SIGNATURE</span>
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold text-white mb-1">Cyber Cheesy Pizza</h3>
                        <p class="text-gray-300 text-sm mb-4">Melted synthetic mozzarella and rich tomato matrix.</p>
                        <a href="{{ route('meals.index') }}" class="inline-block text-xs font-bold text-cyan-400 hover:text-cyan-300 uppercase tracking-wider">→ View in Menu</a>
                    </div>
                </div>

                <!-- Card With Food Vibe 2 -->
                <div class="bg-[#121826] border border-cyan-500/30 rounded-2xl p-6 relative overflow-hidden group shadow-[0_0_15px_rgba(6,182,212,0.1)] flex flex-col justify-between h-64">
                    <div class="absolute inset-0 opacity-30 bg-cover bg-center transition duration-500 group-hover:scale-105" style="background-image: url('https://images.unsplash.com/photo-1626777552726-4a6b54c97e46?q=80&w=1000&auto=format&fit=crop');"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0b0f19] via-[#0b0f19]/60 to-transparent"></div>
                    
                    <div class="relative z-10">
                        <span class="text-xs text-cyan-400 bg-cyan-950/80 px-2.5 py-1 rounded-md border border-cyan-500/40">CRISPY WRAP</span>
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold text-white mb-1">Neon Chicken Roll</h3>
                        <p class="text-gray-300 text-sm mb-4">Grilled spices wrapped in high-voltage tortilla.</p>
                        <a href="{{ route('meals.index') }}" class="inline-block text-xs font-bold text-pink-400 hover:text-pink-300 uppercase tracking-wider">→ View in Menu</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>