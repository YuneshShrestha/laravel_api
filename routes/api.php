<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
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
// Route::get('/device', [DeviceController::class, 'index']);
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('/device/{id?}', [DeviceController::class, 'showData']);
    //  ? means optional
    Route::post('/post', [DeviceController::class, 'postData']);
    Route::put('/update', [DeviceController::class, 'updateRecord']);
    Route::get('/search/{data}', [DeviceController::class, 'search']);
    Route::delete('/delete/{ids}', [DeviceController::class, 'deleteRecord']);
    Route::get('/validate', [DeviceController::class, 'validateRecord']);
    });


Route::post("/login",[UserController::class,'index']);
Route::post("/upload",[FileController::class,'index']);