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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/venta/obtener', 'App\Http\Controllers\VentaController@index');
Route::get('/venta/obtenerPorID/{ID}', 'App\Http\Controllers\VentaController@obtenerByID');
Route::post('/venta/crear', 'App\Http\Controllers\VentaController@store');
Route::put('/venta/actualizar/{ID}', 'App\Http\Controllers\VentaController@update');

Route::get('/detalle-venta/obtenerPorID/{ID}', 'App\Http\Controllers\VentaDetalleController@obtenerByID');
Route::post('/detalle-venta/crear', 'App\Http\Controllers\VentaDetalleController@store');
Route::put('/detalle-venta/actualizar', 'App\Http\Controllers\VentaDetalleController@update');
Route::delete('/detalle-venta/eliminar', 'App\Http\Controllers\VentaDetalleController@destroy');