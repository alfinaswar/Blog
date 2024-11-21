<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaegoriController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::GET('/', [Controller::class, 'Beranda']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::GET('/artikel-tamu/{Kategori}', [HomeController::class, 'BeritaKategori'])->name('home.BeritaKategori');
Route::GET('/detail/{id}', [Controller::class, 'BeritaShow'])->name('home.BeritaShow');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('kategori', KaegoriController::class);
    Route::resource('users', UserController::class);
    Route::resource('post', PostController::class);
    Route::GET('/artikel-tamu', [PostController::class, 'indexTamu'])->name('post.tamu');
    Route::put('/update-status/{id}', [PostController::class, 'updateStatus'])->name('updateStatus');
    Route::put('/update-tipe/{id}', [PostController::class, 'updateTipe'])->name('post.updateTipe');
});
