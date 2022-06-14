<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\Food;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'categories' => Category::all()->map(fn($category) => [
            'id' => $category->id,
            'name' => $category->ctname,
            'description' => $category->ctdescription
        ])
    ]);
});

Route::get('foods/{id}', function($id) {
    $category = Category::find($id)->food;
    return Inertia::render('Menu', [
        'categories' => $category->map(fn($categories) => [
            'title' => $categories->fbname,
            'price' => $categories->fbprice,
            'url' => $categories->image_url()
        ]),
        'title' => Category::find($id)
    ]);
});

Route::middleware(['auth', 'verified', 'checkrole'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            return Inertia::render('Dashboard', [
                'foods' => Food::all()->count(),
                'categories' => Category::all()->count()
            ]);
        })->name('dashboard');
    });
    Route::controller(FoodController::class)->prefix('food')->group(function (){
        Route::get('/', 'index')->name('food');
        Route::get('/create', 'create');
        Route::post('/', 'store');
        Route::get('{id}/delete/', 'destroy');
        Route::get('{id}/edit/', 'edit');
        Route::post('/update/{id}', 'update');
    });

    Route::controller(CategoriesController::class)->prefix('category')->group(function (){
        Route::get('/', 'index')->name('categories');
        Route::get('/create', 'create');
        Route::post('/', 'store');
        Route::get('{id}/edit', 'edit');
        Route::get('{id}/delete', 'destroy');
        Route::post('/update/{id}', 'update');
    });
});

require __DIR__.'/auth.php';
