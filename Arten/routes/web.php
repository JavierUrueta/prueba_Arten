<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

// Rutas de ProveedorController
Route::get('/proveedores', [ProveedorController::class, 'vistaProveedor'])->name('proveedores.index')->middleware('auth');
Route::get('/proveedores/buscar', [ProveedorController::class, 'buscar'])->name('proveedores.buscar')->middleware('auth');
Route::get('/proveedores/busqueda-en-tiempo-real', [ProveedorController::class, 'busquedaEnTiempoReal'])->name('proveedores.busqueda-en-tiempo-real')->middleware('auth');

// Rutas de ProductoController
Route::get('/productos', [ProductoController::class, 'index'])->middleware('auth');
Route::post('/crearProducto', [ProductoController::class, 'guardarProducto'])->middleware('auth');
Route::get('/borrarProducto/{id}', [ProductoController::class, 'borrarProducto'])->middleware('auth');

Route::post('/actualizarProducto/{id}', [ProductoController::class, 'editaProducto'])->middleware('auth');
