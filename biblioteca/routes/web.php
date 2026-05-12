<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadoController;

Route::get('/test', function () {
    try {
        DB::connection()->getPdo();
        return "Conectado correctamente a PostgreSQL";
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/login', [AuthController::class, 'index'])->withoutMiddleware(['auth']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/home', [AuthController::class, 'home']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::resource('empleados', EmpleadoController::class);



Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});


require __DIR__.'/settings.php';
