<?php

use App\Http\Controllers\HomeController;
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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::any("/hello", function (Request $request) {
    if ($request->isMethod("GET")) {
        return response()->json(["status" => "success"]);
    }
    return response()->json(["status" => "fail"]);
});

Route::apiResource('/cars', HomeController::class);

Route::fallback(function () {
    return response(['error' => true, 'error-msg' => "Not found"], 404);
});
// issus cac return 405