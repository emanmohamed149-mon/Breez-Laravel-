<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MealController;
use App\Models\Meal;
use App\Models\Category;

Route::get('/', function () {
    return view('welcome');
});

// راوت المنيو العام للزبائن (متاح للجميع بدون تسجيل دخول)
Route::get('/menu', function () {
    $meals = Meal::with('category')->get();
    $categories = Category::all();
    return view('menu', compact('meals', 'categories'));
})->name('public.menu');

// البروفايل للمستخدم المسجل
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// عمليات الأقسام والوجبات (محمية)
Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class)
        ->only(['index', 'store', 'destroy']);

    // تم إضافة edit و update هنا عشان زرار التعديل يشتغل صح
    Route::resource('meals', MealController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy']);
});

// حماية الداشبورد للأدمن فقط بناءً على الـ true/false (is_admin)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';