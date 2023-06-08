<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{UserController, NearestLocation};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login',[UserController::class,'loginUser']);
Route::post('register',[UserController::class,'RegisterUser']);


Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::get('user',[UserController::class,'userDetails']);
    Route::get('location/{param}',[NearestLocation::class,'nearestLocation']);
    Route::post('location',[NearestLocation::class,'nearest_location']);
    Route::get('logout',[UserController::class,'logout']);
});
