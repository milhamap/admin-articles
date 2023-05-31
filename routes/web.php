<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthenticationController;

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

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/login', [AuthenticationController::class, 'loginPage'])->name('login.page');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');


Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [PostController::class, 'slug'])->middleware('auth');
Route::resource('/dashboard/posts', PostController::class)->middleware('auth');
Route::get('/dashboard/categories/checkSlug', [CategoryController::class, 'slug'])->middleware('auth');
Route::resource('/dashboard/categories', CategoryController::class)->middleware('auth');
Route::get('/dashboard/tags/checkSlug', [TagController::class, 'slug'])->middleware('auth');
Route::resource('/dashboard/tags', TagController::class)->middleware('auth');
