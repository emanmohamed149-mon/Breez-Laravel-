<x-app-layout>
    <div class="py-12 bg-[#0b0f19] min-h-screen text-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header & Back -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-cyan-400">
                    // EDIT CYBER MEAL
                </h2>
                <a href="{{ route('meals.index') }}" class="text-sm font-mono text-pink-500 hover:underline">← BACK TO MEALS</a>
            </div>

            <!-- Edit Form Card -->
            <div class="bg-[#121826] border border-pink-500/30 rounded-2xl p-8 shadow-[0_0_20px_rgba(236,72,153,0.15)]">
                <form action="{{ route('meals.update', $meal->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <!-- Name -->
                        <div>
                            <label class="block text-xs font-mono text-gray-400 mb-2 uppercase">Meal Name</label>
                            <input type="text" name="name" value="{{ old('name', $meal->name) }}" class="w-full bg-[#0b0f19] border border-gray-800 text-white rounded-xl px-4 py-3 focus:border-pink-500 focus:ring-1 focus:ring-pink-500" required>
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block text-xs font-mono text-gray-400 mb-2 uppercase">Price ($)</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price', $meal->price) }}" class="w-full bg-[#0b0f19] border border-gray-800 text-white rounded-xl px-4 py-3 focus:border-pink-500 focus:ring-1 focus:ring-pink-500" required>
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-xs font-mono text-gray-400 mb-2 uppercase">Category</label>
                            <select name="category_id" class="w-full bg-[#0b0f19] border border-gray-800 text-white rounded-xl px-4 py-3 focus:border-pink-500 focus:ring-1 focus:ring-pink-500" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $meal->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Current Image Preview -->
                        <div>
                            <label class="block text-xs font-mono text-gray-400 mb-2 uppercase">Current Image</label>
                            @if($meal->image)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $meal->image) }}" alt="{{ $meal->name }}" class="w-24 h-24 object-cover rounded-xl border border-pink-500/40 shadow-md">
                                </div>
                            @else
                                <p class="text-xs text-gray-500 font-mono mb-3">No image uploaded.</p>
                            @endif
                            <label class="block text-xs font-mono text-gray-400 mb-2 uppercase">Change Image (Optional)</label>
                            <input type="file" name="image" class="w-full bg-[#0b0f19] border border-gray-800 text-gray-400 rounded-xl px-4 py-2.5 file:mr-4 file:py-1 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-cyan-500/10 file:text-cyan-400 hover:file:bg-cyan-500/20">
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end gap-4">
                        <a href="{{ route('meals.index') }}" class="px-6 py-3 rounded-xl border border-gray-700 text-gray-300 hover:bg-gray-800 font-mono text-sm transition">Cancel</a>
                        <button type="submit" class="bg-gradient-to-r from-pink-600 to-purple-600 hover:from-pink-500 hover:to-purple-500 text-white font-bold px-8 py-3 rounded-xl transition shadow-[0_0_15px_rgba(236,72,153,0.4)] font-mono text-sm uppercase">Update Meal</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>