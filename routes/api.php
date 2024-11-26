<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// TODO
Route::get('/example', [PageController::class, 'example'])->name('example');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
