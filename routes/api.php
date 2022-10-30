<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FilmController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\GenreController;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/sign-up', [UserController::class, 'signUp']);
Route::post('/sign-in', [AuthController::class, 'signIn']);

Route::get('/movies/{film}', [FilmController::class, 'show']);
Route::get('/movies', [FilmController::class, 'list']);

Route::get('/genres', [GenreController::class, 'list']);

Route::get('/actors', [ActorController::class, 'list']);

Route::group(['prefix' => '/movies', 'middleware' => ['auth:api']], function () {
    Route::post('', [FilmController::class, 'create'])->middleware('can:create,'. Film::class);
    Route::put('/{film}', [FilmController::class, 'edit'])->middleware('can:edit,film');
    Route::delete('/{film}', [FilmController::class, 'delete'])->middleware('can:delete,film');
});
