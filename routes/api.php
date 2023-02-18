<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

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



Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/update', [UserController::class, 'updateProfile']);
    Route::post('/user/photo', [UserController::class, 'updatePhoto']);
    Route::post('/transaction', [TransactionController::class, 'all']);
    Route::post('/transaction/update/{id}', [TransactionController::class, 'update']);
    Route::post('/transaction/checkout', [TransactionController::class, 'checkout']);
});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::post('/food', [FoodController::class, 'all']);

// https://ambrosia.yasya.tech/api/midtrans/callback
Route::post('/midtrans/callback', [MidtransController::class, 'callback']);