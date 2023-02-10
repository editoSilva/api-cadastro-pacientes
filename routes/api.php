<?php

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

Route::prefix('v1/patients')->group(base_path('routes/api/v1/patients.php'));
Route::prefix('v1/zip_cod_query')->group(base_path('routes/api/v1/zip_cod_query.php'));



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});