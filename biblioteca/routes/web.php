<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;

Route::get('/test', function () {
    try {
        DB::connection()->getPdo();
        return "Conectado correctamente a PostgreSQL";
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
});
Route::redirect('/', '/login');
Route::get('/login', [AuthController::class, 'index'])->withoutMiddleware(['auth']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/home-admin', [AuthController::class, 'homeAdmin']);
Route::get('/home-empleado', [AuthController::class, 'homeEmpleado']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::resource('empleados', EmpleadoController::class);
Route::resource('alumnos', AlumnoController::class);
Route::resource('profesores', ProfesorController::class);
Route::resource('libros', LibroController::class);

Route::get('/prestamos/devolver-index', [PrestamoController::class, 'devolverIndex']);
Route::get('/prestamos/{id}/devolver', [PrestamoController::class, 'devolver']);
Route::post('/prestamos/{id}/devolver', [PrestamoController::class, 'procesarDevolucion']);

Route::resource('prestamos', PrestamoController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});


require __DIR__.'/settings.php';