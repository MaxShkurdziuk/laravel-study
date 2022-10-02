<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => '/movies', 'as' => 'movies.', 'middleware' => 'auth'], function () {
    Route::get('/add', [FilmController::class, 'addFilm'])->name('add.film');
    Route::post('/add', [FilmController::class, 'add'])->name('add');
    Route::get('', [FilmController::class, 'list'])->name('list');

    Route::group(['prefix' => '/{film}/edit'], function () {
        Route::get('', [FilmController::class, 'editFilm'])->name('edit.film');
        Route::post('', [FilmController::class, 'edit'])->name('edit');
    });
    Route::get('/{film}', [FilmController::class, 'show'])->name('show');
    Route::post('/{film}/delete', [FilmController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => '/genres', 'as' => 'genres.', 'middleware' => 'auth'], function () {
    Route::get('/add', [GenreController::class, 'addGenre'])->name('add.genre');
    Route::post('/add', [GenreController::class, 'add'])->name('add');
    Route::get('', [GenreController::class, 'list'])->name('list');

    Route::group(['prefix' => '/{genre}/edit'], function () {
        Route::get('', [GenreController::class, 'editGenre'])->name('edit.genre');
        Route::post('', [GenreController::class, 'edit'])->name('edit');
    });
    Route::get('/{genre}', [GenreController::class, 'show'])->name('show');
    Route::post('/{genre}/delete', [GenreController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => '/actors', 'as' => 'actors.', 'middleware' => 'auth'], function () {
    Route::get('/add', [ActorController::class, 'addActor'])->name('add.actor');
    Route::post('/add', [ActorController::class, 'add'])->name('add');
    Route::get('', [ActorController::class, 'list'])->name('list');

    Route::group(['prefix' => '/{actor}/edit'], function () {
        Route::get('', [ActorController::class, 'editActor'])->name('edit.actor');
        Route::post('', [ActorController::class, 'edit'])->name('edit');
    });
    Route::get('/{actor}', [ActorController::class, 'show'])->name('show');
    Route::post('/{actor}/delete', [ActorController::class, 'delete'])->name('delete');
});

Route::get('/sign-up', [UserController::class, 'signUpForm'])->name('sign-up.form');
Route::post('/sign-up', [UserController::class, 'signUp'])->name('sign-up');

Route::get('/verify-email/{id}/{hash}', [UserController::class, 'verifyEmail'])->name('verify.email');

Route::get('/sign-in', [AuthController::class, 'signInForm'])->name('login');
Route::post('/sign-in', [AuthController::class, 'signIn'])->name('sign-in');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
