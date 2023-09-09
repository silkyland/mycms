<?php

use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('post', [AdminPostController::class, 'index'])->name('post.index');
    Route::get('post/create', [AdminPostController::class, 'create'])->name('post.create');
    Route::post('post', [AdminPostController::class, 'store'])->name('post.store');
    Route::get('post/edit/{id}', [AdminPostController::class, 'edit'])->name('post.edit');
    Route::put('post/{id}', [AdminPostController::class, 'update'])->name('post.update');
    Route::delete('post/{id}', [AdminPostController::class, 'destroy'])->name('post.destroy');

    Route::get('category', [AdminCategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [AdminCategoryController::class, 'create'])->name('category.create');
    Route::post('category', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/{id}', [AdminCategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{id}', [AdminCategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('banner', [AdminBannerController::class, 'index'])->name('banner.index');
    Route::get('banner/create', [AdminBannerController::class, 'create'])->name('banner.create');
    Route::post('banner', [AdminBannerController::class, 'store'])->name('banner.store');
    Route::get('banner/edit/{id}', [AdminBannerController::class, 'edit'])->name('banner.edit');
    Route::put('banner/{id}', [AdminBannerController::class, 'update'])->name('banner.update');
    Route::delete('banner/{id}', [AdminBannerController::class, 'destroy'])->name('banner.destroy');
});
