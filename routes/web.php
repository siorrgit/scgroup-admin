<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    Route::get('/incomplete', [OrderController::class, 'incompletes']);

    // 処方せん（完了）
    Route::get('/complete', [OrderController::class, 'completes']);

    // 処方せん - 詳細
    Route::get('/order/{id}', [OrderController::class, 'edit']);

    // 処方せん（ステータス更新）
    Route::put('/order/notify/{id}', [OrderController::class, 'notify']);
    Route::put('/order/apppay/{id}', [OrderController::class, 'apppay']);
    Route::put('/order/shoppay/{id}', [OrderController::class, 'shoppay']);
    Route::put('/order/cancel/{id}', [OrderController::class, 'cancel']);
    Route::put('/order/incomplete/{id}', [OrderController::class, 'incomplete']);

    // ユーザー
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'edit']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
    Route::put('/user/activate/{id}', [UserController::class, 'activate']);

    // 開発者用ページ
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
