<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FieldsController;
use App\Http\Controllers\Api\ListController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    Route::get('/tables/entries/orders', [OrderController::class, 'index']);
    Route::post('/tables/entries/orders', [OrderController::class, 'store']);
    Route::delete('/tables/entries/orders', [OrderController::class, 'deleteSelected']);

    Route::get('/tables/fields/orders', [FieldsController::class, 'fields']);
    Route::get('/settings/lists', [ListController::class, 'list']);


});
