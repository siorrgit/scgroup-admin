<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/order', [OrderController::class, 'index'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    // Home
    Route::get('/', function () {
        return view('home');
    });

    // 店舗
    Route::get('/shop', [ShopController::class, 'index']);
    Route::get('/shop/{id}', [ShopController::class, 'edit']);
    Route::get('/shop/add', [ShopController::class, 'create']);
    Route::post('/shop/add', [ShopController::class, 'store']);
    Route::put('/shop/{id}', [ShopController::class, 'update']);

    // 処方せん（未完了）
    // Route::get('/incomplete', [RecipeController::class, 'index']);
    // Route::get('/incomplete/{id}', [RecipeController::class, 'edit']);
    // Route::put('/incomplete/{id}', [RecipeController::class, 'update']);

    // 処方せん（完了）
    // Route::get('/complete', [RecipeController::class, 'index']);
    // Route::get('/complete/{id}', [RecipeController::class, 'edit']);
    // Route::put('/complete/{id}', [RecipeController::class, 'update']);

    // ユーザー
    // Route::get('/user', [UserController::class, 'index']);
    // Route::get('/user/{id}', [UserController::class, 'edit']);

    // 開発者用ページ
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
