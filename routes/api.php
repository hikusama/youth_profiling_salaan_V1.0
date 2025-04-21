<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SupabaseSyncController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('supabase', SupabaseSyncController::class);
Route::apiResource('posts', PostController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/supabase', [SupabaseSyncController::class, 'fetch']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');;
// Route::get('/post', function () {
//     return 'API';
// });

