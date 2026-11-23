<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::with('category')->latest()->get();
        $categories = Category::all();
        return view('meals.index', compact('meals', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('meals', 'public');
        }

        Meal::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('meals.index')->with('success', 'Meal added successfully!');
    }

    // دالة عرض صفحة التعديل
    public function edit(Meal $meal)
    {
        $categories = Category::all();
        return view('meals.edit', compact('meal', 'categories'));
    }

    // دالة تحديث البيانات في الداتا بيز
    public function update(Request $request, Meal $meal)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $meal->image;
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا وجدت
            if ($meal->image) {
                Storage::disk('public')->delete($meal->image);
            }
            $imagePath = $request->file('image')->store('meals', 'public');
        }

        $meal->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('meals.index')->with('success', 'Meal updated successfully!');
    }

    public function destroy(Meal $meal)
    {
        if ($meal->image) {
            Storage::disk('public')->delete($meal->image);
        }
        $meal->delete();

        return redirect()->route('meals.index')->with('success', 'Meal deleted successfully!');
    }
}