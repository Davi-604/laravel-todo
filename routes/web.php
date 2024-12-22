<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/singin', [AuthController::class, 'singin'])->name('auth.singin');
Route::post('/singin', [AuthController::class, 'singin_action'])->name('auth.singin_action');
Route::get('/singup', [AuthController::class, 'singup'])->name('auth.singup');
Route::post('/singup', [AuthController::class, 'singup_action'])->name('auth.singup_action');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/task/new', [TaskController::class, 'create'])->name('task.create');
    Route::post('/task/new', [TaskController::class, 'store'])->name('task.store');
    Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('/task/edit/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::get('/task/delete/{id}', [TaskController::class, 'delete'])->name('task.delete');
    Route::get('/task/delete/{id}', [TaskController::class, 'delete'])->name('task.delete');

    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/new', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/new', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::post('/ajax/task/update', [AjaxController::class, 'update_task'])->name('ajax.update_task');
});
