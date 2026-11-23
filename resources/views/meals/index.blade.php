<x-app-layout>
    <div class="py-12 bg-[#0b0f19] min-h-screen text-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header & Back -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-cyan-400">
                    // CYBER MEALS MANAGEMENT
                </h2>
                <a href="{{ route('dashboard') }}" class="text-sm font-mono text-pink-500 hover:underline">← BACK TO DASHBOARD</a>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-pink-950/50 border border-pink-500 text-pink-300 px-4 py-3 rounded-xl shadow-[0_0_15px_rgba(236,72,153,0.2)]">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Add Meal Card with Image Upload -->
            <div class="bg-[#121826] border border-pink-500/30 rounded-2xl p-6 mb-8 shadow-[0_0_15px_rgba(236,72,153,0.1)]">
                <h3 class="text-lg font-bold text-white mb-4">Add New Cyber Meal</h3>
                <form action="{{ route('meals.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                        <input type="text" name="name" placeholder="Meal Name" class="bg-[#0b0f19] border border-gray-800 text-white rounded-xl px-4 py-3 focus:border-pink-500 focus:ring-1 focus:ring-pink-500" required>
                        <input type="number" step="0.01" name="price" placeholder="Price ($)" class="bg-[#0b0f19] border border-gray-800 text-white rounded-xl px-4 py-3 focus:border-pink-500 focus:ring-1 focus:ring-pink-500" required>
                        <select name="category_id" class="bg-[#0b0f19] border border-gray-800 text-white rounded-xl px-4 py-3 focus:border-pink-500 focus:ring-1 focus:ring-pink-500" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <input type="file" name="image" class="bg-[#0b0f19] border border-gray-800 text-gray-400 rounded-xl px-4 py-2.5 file:mr-4 file:py-1 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-pink-500/10 file:text-pink-400 hover:file:bg-pink-500/20">
                    </div>
                    <button type="submit" class="bg-pink-600 hover:bg-pink-500 text-white font-bold px-8 py-3 rounded-xl transition shadow-[0_0_15px_rgba(236,72,153,0.4)]">Add Meal with Image</button>
                </form>
            </div>

            <!-- Meals Table with Images -->
            <div class="bg-[#121826] border border-gray-800 rounded-2xl p-6 shadow-xl overflow-hidden">
                <h3 class="text-lg font-bold text-white mb-4">Active Menu Meals</h3>
                <table class="min-w-full divide-y divide-gray-800">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-mono text-gray-400 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-mono text-gray-400 uppercase tracking-wider">Meal Name</th>
                            <th class="px-6 py-3 text-left text-xs font-mono text-gray-400 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 text-left text-xs font-mono text-gray-400 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 text-right text-xs font-mono text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800/60">
                        @forelse($meals as $meal)
                            <tr class="hover:bg-gray-900/40 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($meal->image)
                                        <img src="{{ asset('storage/' . $meal->image) }}" alt="{{ $meal->name }}" class="w-12 h-12 object-cover rounded-xl border border-pink-500/30 shadow-[0_0_8px_rgba(236,72,153,0.3)]">
                                    @else
                                        <div class="w-12 h-12 bg-gray-900 border border-gray-800 rounded-xl flex items-center justify-center text-[10px] text-gray-500 font-mono">NO IMG</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-white">{{ $meal->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-cyan-400">{{ $meal->category->name ?? 'No Category' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-emerald-400">${{ $meal->price }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center justify-end gap-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('meals.edit', $meal->id) }}" class="text-cyan-400 hover:text-cyan-300 font-mono text-xs uppercase tracking-wider bg-cyan-500/10 px-3 py-1.5 rounded-lg border border-cyan-500/20 transition">Edit</a>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('meals.destroy', $meal->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this meal?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-pink-500 hover:text-pink-400 font-mono text-xs uppercase tracking-wider bg-pink-500/10 px-3 py-1.5 rounded-lg border border-pink-500/20 transition">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500 font-mono">No meals added to the menu yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>