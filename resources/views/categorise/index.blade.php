<x-app-layout>
    <div class="py-12 bg-[#0b0f19] min-h-screen text-gray-100 font-mono">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <span class="text-xs text-cyan-400 bg-cyan-950/50 border border-cyan-800 px-3 py-1 rounded-full uppercase tracking-widest">
                        // DIRECTORY CONTROL
                    </span>
                    <h2 class="text-3xl font-black text-white mt-2 font-title tracking-wide">
                        CATEGORIES PROTOCOL
                    </h2>
                </div>
                <a href="{{ route('dashboard') }}" class="text-sm text-pink-500 hover:text-pink-400 border border-pink-500/30 px-4 py-2 rounded-xl bg-pink-500/10 transition shadow-[0_0_10px_rgba(236,72,153,0.2)]">
                    ← BACK TO DASHBOARD
                </a>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-pink-950/50 border border-pink-500 text-pink-300 px-4 py-3 rounded-xl shadow-[0_0_15px_rgba(236,72,153,0.2)]">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Add Category Card -->
            <div class="bg-[#121826] border border-cyan-500/30 rounded-2xl p-6 mb-8 shadow-[0_0_20px_rgba(6,182,212,0.1)]">
                <h3 class="text-lg font-bold text-white mb-4">Add New Cyber Category</h3>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="flex flex-col md:flex-row gap-4">
                        <input type="text" name="name" placeholder="Category Name (e.g., Burgers, Drinks)" class="flex-1 bg-[#0b0f19] border border-gray-800 text-white rounded-xl px-4 py-3 focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 outline-none transition" required>
                        <button type="submit" class="bg-cyan-600 hover:bg-cyan-500 text-white font-bold px-8 py-3 rounded-xl transition shadow-[0_0_15px_rgba(6,182,212,0.4)] tracking-widest uppercase text-sm">
                            Initialize Category
                        </button>
                    </div>
                </form>
            </div>

            <!-- Categories Table / List -->
            <div class="bg-[#121826] border border-gray-800 rounded-2xl p-6 shadow-xl">
                <h3 class="text-lg font-bold text-white mb-4">Active Categories Matrix</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-800">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-mono text-gray-400 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-mono text-gray-400 uppercase tracking-wider">Category Name</th>
                                <th class="px-6 py-3 text-right text-xs font-mono text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800/60">
                            @forelse($categories as $category)
                                <tr class="hover:bg-gray-900/40 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-cyan-400">#0{{ $category->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-white">{{ $category->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Purge this category?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-pink-500 hover:text-pink-400 text-xs uppercase tracking-wider bg-pink-500/10 px-3 py-1.5 rounded-lg border border-pink-500/20 transition">
                                                Purge / Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">No categories found in the matrix.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>