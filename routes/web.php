<?php

use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
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

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('do.login');
});
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.index');
    Route::get('post', [AdminPostController::class, 'index'])->name('admin.post.index');
    Route::get('post/create', [AdminPostController::class, 'create'])->name('admin.post.create');
    Route::post('post', [AdminPostController::class, 'store'])->name('admin.post.store');
    Route::get('post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin.post.edit');
    Route::put('post/{id}', [AdminPostController::class, 'update'])->name('admin.post.update');
    Route::delete('post/{id}', [AdminPostController::class, 'destroy'])->name('admin.post.destroy');

    Route::get('category', [AdminCategoryController::class, 'index'])->name('admin.category.index');
    Route::get('category/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
    Route::post('category', [AdminCategoryController::class, 'store'])->name('admin.category.store');
    Route::get('category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('category/update/{id}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
    Route::get('category/delete/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('banner', [AdminBannerController::class, 'index'])->name('admin.banner.index');
    Route::get('banner/create', [AdminBannerController::class, 'create'])->name('admin.banner.create');
    Route::post('banner', [AdminBannerController::class, 'store'])->name('admin.banner.store');
    Route::get('banner/edit/{id}', [AdminBannerController::class, 'edit'])->name('admin.banner.edit');
    Route::put('banner/{id}', [AdminBannerController::class, 'update'])->name('admin.banner.update');
    Route::delete('banner/{id}', [AdminBannerController::class, 'destroy'])->name('admin.banner.destroy');
});
