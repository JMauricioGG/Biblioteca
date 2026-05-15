<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      if (!session('usuario')) return redirect('/login');
        $libros = DB::table('libro')->get();
        return view('libros.index', compact('libros'));  //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      if (!session('usuario')) return redirect('/login');
        return view('libros.create');   //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('libro')->insert([
            'isbn'            => $request->isbn,
            'titulo'          => $request->titulo,
            'autores'         => $request->autores,
            'editorial'       => $request->editorial,
            'anio_publicacion' => $request->anio_publicacion,
            'num_ejemplar'    => $request->num_ejemplar,
        ]);
        return redirect('/home-empleado'); //
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
