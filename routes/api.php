<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('register',[Api\AuthApiController::class,'register']);
Route::post('login',[Api\AuthApiController::class,'login']);
Route::get('logout',[Api\AuthApiController::class,'logout'])->middleware('auth:sanctum');
Route::get('profile',[Api\AuthApiController::class,'profile'])->middleware('auth:sanctum');
Route::apiResource('/maintext', Api\MaintextApiController::class);
Route::apiResource('/catalog', Api\CatalogApiController::class);
