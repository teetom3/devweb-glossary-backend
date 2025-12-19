<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\DefinitionController;
use App\Http\Controllers\API\TermController;
use App\Http\Controllers\API\VoteController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Categories (public)
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);

// Terms (public read)
Route::get('/terms', [TermController::class, 'index']);
Route::get('/terms/{slug}', [TermController::class, 'show']);

// Definitions (public read)
Route::get('/definitions', [DefinitionController::class, 'index']);
Route::get('/definitions/{id}', [DefinitionController::class, 'show']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Terms (create/update/delete - admin only, checked in controller)
    Route::post('/terms', [TermController::class, 'store']);
    Route::put('/terms/{id}', [TermController::class, 'update']);
    Route::delete('/terms/{id}', [TermController::class, 'destroy']);

    // Definitions (create/update/delete)
    Route::post('/definitions', [DefinitionController::class, 'store']);
    Route::put('/definitions/{id}', [DefinitionController::class, 'update']);
    Route::delete('/definitions/{id}', [DefinitionController::class, 'destroy']);
    Route::patch('/definitions/{id}/approve', [DefinitionController::class, 'approve']);
    Route::get('/my-definitions', [DefinitionController::class, 'myDefinitions']);
    Route::get('/pending-definitions', [DefinitionController::class, 'pending']);

    // Voting
    Route::post('/definitions/{id}/vote', [VoteController::class, 'vote']);
    Route::get('/definitions/{id}/my-vote', [VoteController::class, 'getUserVote']);
});
