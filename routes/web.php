<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashBoardController::class, 'index'])
    ->middleware('auth') // 認証が必要な場合にミドルウェアを適用
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/page1', [PageController::class, 'page1'])->name('page.page1');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
