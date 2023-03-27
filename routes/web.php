<?php

use App\Http\Controllers\Web\Auth\FacebookController;
use App\Http\Controllers\Web\Auth\GoogleController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Http\Request;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('login', function () {
    return view('pages.login');
});

Route::get('auth/redirect/google', [GoogleController::class, 'redirect'])->name('login.google.redirect');
Route::get('callback', [GoogleController::class, 'callback'])->name('login.google.callback');
Route::get('auth/redirect/facebook', [FacebookController::class, 'redirect'])->name('login.facebook.redirect');
Route::get('callback/facebook', [FacebookController::class, 'callback'])->name('login.facebook.callback');
