<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\AddtocartController;
use App\Http\Controllers\Front\FrontCategoryController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();
Route::get('/mlogout', function () {
    Auth::logout();
    return 'logged out';
})->name('mlogout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
});

Route::get('/categoryproduct/{id}', [FrontCategoryController::class, 'categoryproduct'])->name('front.categoryproduct');
Route::get('/singleproduct/{id}', [FrontCategoryController::class, 'singleproduct'])->name('front.singleproduct');

Route::post('/product/search', [App\Http\Controllers\ProductController::class, 'search'])->name('product.search');

Route::get('/addtocart{id}', [AddtocartController::class, 'addtocart'])->name('addtocart');


Route::get('lang/{lang}', [App\Http\Controllers\HomeController::class, 'lang']);
