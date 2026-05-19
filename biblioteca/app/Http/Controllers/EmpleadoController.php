<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!session('usuario')) {
            return redirect('/login');
        }
      $empleados = DB::select('SELECT * FROM empleado');
        return view('empleados.index', compact('empleados')); //
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!session('usuario')) {
            return redirect('/login');
        }
        return view('empleados.create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       DB::statement('INSERT INTO empleado
    (codigo, nombre, direccion, telefono, sexo, fecha_nacimiento, turno)
    VALUES (?, ?, ?, ?, ?, ?, ?)', [
    $request->codigo,
    $request->nombre,
    $request->direccion,
    $request->telefono,
    $request->sexo,
    $request->fecha_nacimiento,
    $request->turno,
]);

        return redirect('/home-admin'); //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
