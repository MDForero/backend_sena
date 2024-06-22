<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OrderController;
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



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    if ($request->user()->token) {
        $request->user()->tokens()->delete();
    }
    return response()->json([
        'user' => $request->user(),
        'token' => $request->user()->createToken('API TOKEN')->plainTextToken
    ]);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('articles', [ArticleController::class, 'index']);
    Route::get('article/{id}', [ArticleController::class, 'show']);
    Route::post('article', [ArticleController::class, 'store']);
    Route::post('article/{id}', [ArticleController::class, 'update']);
    Route::delete('article/{id}', [ArticleController::class, 'destroy']);

    // rutas de ordenes y facturas
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/{id}', [OrderController::class, 'show']);
    Route::post('orders', [OrderController::class, 'store']);
    Route::post('orders/{id}', [OrderController::class, 'update']);

    Route::get('invoices', [InvoicesController::class, 'index']);
    Route::get('invoices/{id}', [InvoicesController::class, 'show']);
    Route::post('invoices', [InvoicesController::class, 'store']);
    Route::post('invoices/{id}', [InvoicesController::class, 'update']);

    Route::get('users', [UserController::class, 'index']);
    Route::post('user-register', [UserController::class, 'store']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::post('users/{id}', [UserController::class, 'update']);

    Route::get('materials', [MaterialController::class, 'index']);
    Route::get('materials/{id}', [MaterialController::class, 'show']);
    Route::post('materials', [MaterialController::class, 'create']);
    Route::post('materials/{id}', [MaterialController::class, 'update']);
});
