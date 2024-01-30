<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\api\SupplementController;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
    return $request->user();
});
    Route:: apiResource('/roles',RoleController::class);
});

Route::apiResource('/users',UserController::class);
Route::post('/login',[AuthController::class,'LoginUser']);
Route::post('/SignUp',[AuthController::class,'SignUp']);

Route::post('/AddSupplement',[SupplementController::class,'store']);
Route::get('/GetSupplement',[SupplementController::class,'getSupplements']);
Route::get('/GetUsers',[UserController::class,'getusers']);
Route::get('/GetResponsables',[UserController::class,'getresponsables']);