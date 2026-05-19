<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      if (!session('usuario')) return redirect('/login');
       $profesores = DB::select('SELECT * FROM profesor');
        return view('profesores.index', compact('profesores'));   //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       if (!session('usuario')) return redirect('/login');
        return view('profesores.create');  //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    DB::statement('INSERT INTO profesor
    (codigo, nombre, departamento, correo, direccion, telefono, sexo, fecha_nacimiento)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)', [
    $request->codigo,
    $request->nombre,
    $request->departamento,
    $request->correo,
    $request->direccion,
    $request->telefono,
    $request->sexo,
    $request->fecha_nacimiento,
]);
        return redirect('/home-admin');   //
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
