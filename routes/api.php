<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FaixaController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('albums', [AlbumController::class, 'index']);
Route::get('albums/search', [AlbumController::class, 'search']);
Route::post('albums', [AlbumController::class, 'store']);
Route::delete('albums/{album}', [AlbumController::class, 'destroy']);

Route::post('albums/{albumId}/faixas', [FaixaController::class, 'store']);
Route::delete('faixas/{faixa}', [FaixaController::class, 'destroy']);