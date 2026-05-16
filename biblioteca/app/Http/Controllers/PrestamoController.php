<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       if (!session('usuario')) return redirect('/login');
        $prestamos = DB::table('prestamo')->get();
        return view('prestamos.index', compact('prestamos'));  //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      if (!session('usuario')) return redirect('/login');
        return view('prestamos.create');  //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $fecha_prestamo = Carbon::parse($request->fecha_prestamo);
        $fecha_limite = $fecha_prestamo->copy()->addDays(7);

        DB::table('prestamo')->insert([
            'tipo_solicitante'   => $request->tipo_solicitante,
            'codigo_solicitante' => $request->codigo_solicitante,
            'isbn'               => $request->isbn,
            'num_ejemplar'       => $request->num_ejemplar,
            'fecha_prestamo'     => $fecha_prestamo,
            'fecha_limite'       => $fecha_limite,
            'estatus'            => 'prestado',
            'multa'              => 0,
        ]);

        return redirect('/home-empleado'); //
    }
  public function devolver(string $id)
    {
        if (!session('usuario')) return redirect('/login');
        $prestamo = DB::table('prestamo')->where('id', $id)->first();
        return view('prestamos.devolver', compact('prestamo'));
    }
 public function procesarDevolucion(Request $request, string $id)
    {
        $prestamo = DB::table('prestamo')->where('id', $id)->first();
        $fecha_devolucion = Carbon::parse($request->fecha_devolucion);
        $fecha_limite = Carbon::parse($prestamo->fecha_limite);

        $multa = 0;
        if ($fecha_devolucion->gt($fecha_limite)) {
            $dias_retraso = $fecha_devolucion->diffInDays($fecha_limite);
            $tarifa = $prestamo->tipo_solicitante == 'maestro' ? 10 : 5;
            $multa = $dias_retraso * $tarifa;
        }

        DB::table('prestamo')->where('id', $id)->update([
            'fecha_devolucion' => $fecha_devolucion,
            'estatus'          => 'entregado',
            'multa'            => $multa,
        ]);

        return redirect('/home-empleado');
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
