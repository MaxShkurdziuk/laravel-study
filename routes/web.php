<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('/about-us', [MainController::class, 'about'])->name('about');

Route::get('/contact-us', [MessageController::class, 'show'])->name('contact');

Route::post('/contact-us', [MessageController::class, 'store'])->name('contact_store');

Route::get('/movies/add', [FilmController::class, 'addFilm'])->name('movies.add.film');

Route::post('/movies/add', [FilmController::class, 'add'])->name('movies.add');

Route::get('/movies', [FilmController::class, 'list'])->name('movies');

Route::get('/movies/{film}', [FilmController::class, 'show'])->name('movies.show');

Route::get('/movies/{film}/edit', [FilmController::class, 'editFilm'])->name('movies.edit.film');

Route::post('/movies/{film}/edit', [FilmController::class, 'edit'])->name('movies.edit');

Route::post('/movies/{film}/delete', [FilmController::class, 'delete'])->name('movies.delete');
