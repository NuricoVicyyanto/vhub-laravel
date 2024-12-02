<?php

use App\Http\Controllers\Api\DatasetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('datasets')->group(function () {
    Route::get('/', [DatasetController::class, 'index']); // Get all datasets
    Route::get('{id}', [DatasetController::class, 'show']); // Get a specific dataset
});
