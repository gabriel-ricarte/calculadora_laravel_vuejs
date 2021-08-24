<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CalculadoraController;
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

Route::get('soma/valor_um/{valor_um}/valor_dois/{valor_dois}',[CalculadoraController::class,'soma']);
Route::get('subtrai/valor_um/{valor_um}/valor_dois/{valor_dois}',[CalculadoraController::class,'subtrai']);
Route::get('multiplica/valor_um/{valor_um}/valor_dois/{valor_dois}',[CalculadoraController::class,'multiplica']);
Route::get('divide/valor_um/{valor_um}/valor_dois/{valor_dois}',[CalculadoraController::class,'divide']);

