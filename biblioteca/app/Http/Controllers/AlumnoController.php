<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         if (!session('usuario')) return redirect('/login');
        $alumnos = DB::table('alumno')->get();
        return view('alumnos.index', compact('alumnos'));//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!session('usuario')) return redirect('/login');
        return view('alumnos.create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       DB::table('alumno')->insert([
            'codigo'    => $request->codigo,
            'nombre'    => $request->nombre,
            'carrera' => $request->carrera,
            'correo'=> $request->correo,
            'direccion'  => $request->direccion,
            'telefono' => $request->telefono,
            'sexo'      => $request->sexo,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            
        ]);

        return redirect('/home');  //
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
