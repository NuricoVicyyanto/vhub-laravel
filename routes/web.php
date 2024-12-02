<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatasetController;

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Route untuk semua user yang login
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/user/profile', function () {
        return view('profile.show');
    })->name('profile.show');

    Route::resource('datasets', DatasetController::class);

    Route::get('datasets/{dataset}/review', [DatasetController::class, 'review'])->name('datasets.review');
    Route::put('datasets/{dataset}/update-status', [DatasetController::class, 'updateStatus'])->name('datasets.updateStatus');

    // // Route khusus Superadmin
    // Route::middleware(['role:superadmin'])->group(function () {
    //     Route::get('/superadmin/dashboard', function () {
    //         return 'Superadmin Dashboard';
    //     })->name('profile.show');
    // });

    // // Route khusus Admin
    // Route::middleware(['role:admin'])->group(function () {
    //     Route::get('/admin/dashboard', function () {
    //         return 'Admin Dashboard';
    //     })->name('profile.show');
    // });

    // // Route khusus User
    // Route::middleware(['role:user'])->group(function () {
    //     Route::get('/user/profile', function () {
    //         return 'User Profile';
    //     })->name('profile.show');
    // });
});
