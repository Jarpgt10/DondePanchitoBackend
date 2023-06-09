<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
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
$url="http://127.0.0.1:8000/api/";
   
Route::get('/inicio', [DataController::class, 'index']);
Route::get('/ordenes', [DataController::class, 'getOrdenes']);
Route::get('/comidas', [DataController::class, 'getComidas']);
Route::post('/insertOrdenes', [DataController::class, 'insertOrdenes']);
