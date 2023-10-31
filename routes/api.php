<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\OrderController;
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
    return $request->user();
});

Route::get('articles', [ArticleController::class, 'index']);
Route::get('article/{id}', [ArticleController::class, 'show']);
Route::post('article', [ArticleController::class, 'store']);
Route::post('article/{id}', [ArticleController::class, 'update']);
Route::delete('article/{id}', [ArticleController::class, 'destroy']);

Route::get('orders', [OrderController::class, 'index']);
Route::get('orders/{id}', [OrderController::class, 'show']);
Route::post('orders', [OrderController::class, 'store']);
Route::post('orders/{id}', [OrderController::class, 'update']);

Route::get('invoices', [InvoicesController::class, 'index']);
Route::get('invoices/{id}', [InvoicesController::class, 'show']);
Route::post('invoices', [InvoicesController::class, 'store']);
Route::post('invoices/{id}', [InvoicesController::class, 'update']);
