<?php

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

Route::get('/contact-us', [MessageController::class, 'show'])->name('contact');

Route::post('/contact-us', [MessageController::class, 'store'])->name('contact_store');

Route::get('/about-us', [MainController::class, 'about'])->name('about');
