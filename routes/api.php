<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

Route::get('v1/menu',[ApiController::class,'get_data_menu']);
Route::get('v1/galeri',[ApiController::class,'get_data_galeri']);
Route::get('v1/slider',[ApiController::class,'get_data_slider']);
Route::get('v1/kontak',[ApiController::class,'get_data_kontak']);
