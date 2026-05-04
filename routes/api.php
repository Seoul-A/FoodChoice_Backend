<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\RecommendationController;
use App\Http\Controllers\Api\PreferenceController;
use App\Http\Controllers\Api\Admin\AdminFoodController;
use App\Http\Controllers\Api\Admin\AdminTagController;

// ── PUBLIC ROUTES (tanpa token) ────────────────────────────
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// ── PROTECTED ROUTES (butuh token) ────────────────────────
Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Onboarding
    Route::post('onboarding', [PreferenceController::class, 'onboarding']);

    // Tags
    Route::get('/tags', [TagController::class, 'index']);

    // Foods
    Route::get('/foods', [FoodController::class, 'index']);
    Route::get('/foods/{id}', [FoodController::class, 'show']);

    // Like
    Route::post('/foods/{id}/like', [LikeController::class, 'toggle']);

    // Recomendation
    Route::get('/recommendations', [RecommendationController::class, 'index']);

    // User Preferences
    Route::get('/preferences', [PreferenceController::class, 'index']);
    Route::put('/preferences', [PreferenceController::class, 'update']);

    // Admin Routes
    Route::middleware('admin')->prefix('admin')->group(function () {

        // Admin Food CRUD
        Route::apiResource('foods', AdminFoodController::class);

        // Admin Tag
        Route::post('tags', [AdminTagController::class, 'store']);
        Route::delete('tags/{id}', [AdminTagController::class, 'destroy']);
    });
});