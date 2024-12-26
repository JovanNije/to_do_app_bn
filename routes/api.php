<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Get all tasks
Route::get('/tasks', [TaskController::class, 'index']);  // List all tasks

// Get a single task by ID
Route::get('/tasks/{task}', [TaskController::class, 'show']);  // View a single task

// Create a new task
Route::post('/tasks', [TaskController::class, 'store']);  // Add a new task

// Update an existing task by ID
Route::put('/tasks/{task}', [TaskController::class, 'update']);  // Update task

// Delete a task by ID
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);  // Delete task
