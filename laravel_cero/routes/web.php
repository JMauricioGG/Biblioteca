<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;
use App\Http\Controllers\ProductoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function(){
    return "Hola, esta es mi primera ruta en laravel";
});

Route::get('/vista', function(){
return view('hola');
});

Route::get('/saludo/{nombre}', function ($nombre){
    return view('hola', compact('nombre'));
});
Route::get('/controlador/{nombre}',[SaludoController::class, 'mostrar']);

Route::get('/', function (){
return view('home');
})->name('home');

Route::get('/hola', function(){
return view('hola',['nombre'=>'Invitado']);
})->name('hola');

Route::get('/productos/crear',[ProductoController::class, 'create']);
Route::post('/productos', [ProductoController::class, 'store']);

Route::get('/productos/{id}/editar',[ProductoController::class,'edit']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);

Route::delete('/productos/{id}',[ProductoController::class, 'destroy']);
Route::get('/productos',[ProductoController::class, 'index']);