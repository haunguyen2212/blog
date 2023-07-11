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
Route::get('post', [Front\PostController::class, 'index'])->name('post.index');
Route::get('post-detail/{id}', [Front\PostDetailController::class, 'index'])->name('post_detail.index');

