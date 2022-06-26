<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConfigController;

// admin
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('locale')->group(function() {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/feature', function () {
        return view('/pages/feature');
    });
    Route::get('/product', [ProductController::class, 'index'])->name('product-listing');
    Route::get('/product/detail/{id}', [ProductController::class, 'show']);
    Route::get('/order/{id}', [OrderController::class, 'order'])->name('create-order');

});

Route::get('/lang/{code}', [ConfigController::class, 'switchLang']);


Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('home-dashbaord');

    Route::get('/user', [AdminUserController::class, 'index'])->name('list-user');
    Route::get('/user/create', [AdminUserController::class, 'create'])->name('create-user');
    Route::post('/user/store', [AdminUserController::class, 'store'])->name('store-user');
    Route::get('/user/edit/{id}', [AdminUserController::class, 'edit'])->name('edit-user');
    Route::post('/user/update/{id}', [AdminUserController::class, 'update'])->name('update-user');
    Route::delete('/user/delete/{id}', [AdminUserController::class, 'delete'])->name('delete-user');

    Route::get('/category', [AdminCategoryController::class, 'index'])->name('list-category');
    Route::get('/category/create', [AdminCategoryController::class, 'create'])->name('create-category');
    Route::post('/category/store', [AdminCategoryController::class, 'store'])->name('store-category');
    Route::post('/category/edit/{id}', [AdminCategoryController::class, 'update'])->name('edit-category');
    Route::delete('/category/delete/{id}', [AdminCategoryController::class, 'delete'])->name('delete-category');


    Route::get('/product', [AdminProductController::class, 'index'])->name('list-product');
    Route::get('/product/create', [AdminProductController::class, 'create'])->name('create-product');
    Route::post('/product/store', [AdminProductController::class, 'store'])->name('store-product');
    Route::post('/product/detial/{id}', [AdminProductController::class, 'detial'])->name('detial-product');
    Route::post('/product/edit/{id}', [AdminProductController::class, 'edit'])->name('edit-product');
    Route::delete('/product/delete/{id}', [AdminProductController::class, 'destroy'])->name('delete-product');
    Route::get('/product/restore/{id}', [AdminProductController::class, 'restore'])->name('restore-product');
    
});

// Auth::routes();

Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
