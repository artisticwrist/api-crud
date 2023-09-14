<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PersonController;

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

Route::get('/', [PersonController::class, 'index']);

Route::post('/', [PersonController::class, 'create']);

Route::get('/{user_id}', [PersonController::class, 'read']);

Route::PUT('/{user_id}', [PersonController::class, 'update']);

Route::delete('/{user_id}', [PersonController::class, 'destroy']);