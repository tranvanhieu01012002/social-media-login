<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get("/form/{id?}", function (Request $request, $id1 = "Hieu") {
    return "Hello mr Hieu at " . $id1;
});

// Route::post("/form", function () {
//     return redirect("https://laraveldaily.com/roadmap-learning-path");
// })->name("login");


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
