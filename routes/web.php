<?php

use App\Http\Controllers\Front;
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

Route::get('/', [Front\HomeController::class, 'index'])->name('home.index');
Route::get('category', [Front\CategoryController::class, 'index'])->name('category.index');
Route::get('category/{slug}', [Front\CategoryController::class, 'show'])->name('category.show');
Route::get('post', [Front\PostController::class, 'index'])->name('post.index');
Route::get('post-detail/{slug}', [Front\PostDetailController::class, 'index'])->name('post_detail.index');
Route::get('contact', [Front\ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [Front\ContactController::class, 'store'])->name('contact.store');
Route::get('about', [Front\AboutController::class, 'index'])->name('about.index');
Route::get('search', [Front\SearchController::class, 'index'])->name('search.index');
Route::get('tag/{slug}', [Front\TagController::class, 'index'])->name('tag.index');

