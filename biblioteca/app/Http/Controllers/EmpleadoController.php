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
        $empleados = DB::table('empleado')->get();
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
       DB::table('empleado')->insert([
            'codigo'    => $request->codigo,
            'nombre'    => $request->nombre,
            'direccion' => $request->direccion,
            'telefono'  => $request->telefono,
            'sexo'      => $request->sexo,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'turno'     => $request->turno,
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
