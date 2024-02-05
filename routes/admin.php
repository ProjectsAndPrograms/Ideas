<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\CommentController;

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'can:admin']);

Route::get('/admin/users', [AdminUsersController::class , 'index'])->name('admin.users')->middleware(['auth', 'can:admin']);

Route::group(['prefix'=> '/admin', 'middleware' => ['auth', 'can:admin']] , function(){
   
    Route::post('', [AdminDashboardController::class, 'store'])->name('admin.store');
    // Route::post('/delete', [AdminDashboardController::class, 'destroy'])->name('admin.delete');
    Route::get('/{id}', [AdminDashboardController::class, 'update'])->name('admin.update');

    Route::post('/users/{id}', [AdminUsersController::class, 'destroy'])->name('admin.user.delete');
});

Route::post('/comment/{id}', [CommentController::class, 'destroy'])->middleware(['auth', 'can:admin'])->name('admin.delete.comment');