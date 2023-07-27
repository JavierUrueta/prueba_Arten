<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/proveedores', [ProveedorController::class, 'vistaProveedor'])->name('proveedores.index');
Route::get('/proveedores/buscar', [ProveedorController::class, 'buscar'])->name('proveedores.buscar');
Route::get('/proveedores/busqueda-en-tiempo-real', [ProveedorController::class, 'busquedaEnTiempoReal'])->name('proveedores.busqueda-en-tiempo-real');


/*Route::get('/productos', function () {
    return view('productos');
});*/

Route::get('/productos', [ProductoController::class, 'index']);
Route::post('/crearProducto', [ProductoController::class, 'guardarProducto']);
Route::get('/borrarProducto/{id}', [ProductoController::class, 'borrarProducto']);

Route::post('/actualizarProducto/{id}', [ProductoController::class, 'editaProducto']);