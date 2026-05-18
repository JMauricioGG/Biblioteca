<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PrestamoController extends Controller
{
    public function index()
    {
        if (!session('usuario')) return redirect('/login');
        $prestamos = DB::table('prestamo')->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        if (!session('usuario')) return redirect('/login');
        return view('prestamos.create');
    }

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

        return redirect('/home-empleado');
    }

    public function devolver(string $id)
    {
        if (!session('usuario')) return redirect('/login');
        $prestamo = DB::table('prestamo')->where('id', $id)->first();
        return view('prestamos.devolver', compact('prestamo'));
    }
public function devolverIndex()
{
    if (!session('usuario')) return redirect('/login');
    $prestamos = DB::table('prestamo')->where('estatus', 'prestado')->get();
    return view('prestamos.devolver-index', compact('prestamos'));
}
    public function procesarDevolucion(Request $request, string $id)
    {
        $prestamo = DB::table('prestamo')->where('id', $id)->first();
        $fecha_devolucion = Carbon::parse($request->fecha_devolucion);
        $fecha_limite = Carbon::parse($prestamo->fecha_limite);

        $multa = 0;
        if ($fecha_devolucion->gt($fecha_limite)) {
           $dias_retraso = $fecha_limite->diffInDays($fecha_devolucion);
            $tarifa = $prestamo->tipo_solicitante == 'maestro' ? 10 : 5;
            $multa = $dias_retraso * $tarifa;
        }

        DB::table('prestamo')->where('id', $id)->update([
            'fecha_devolucion' => $fecha_devolucion,
            'estatus'          => 'entregado',
            'multa'            => $multa,
        ]);

        if ($multa > 0) {
            if ($prestamo->tipo_solicitante == 'maestro') {
                $solicitante = DB::table('profesor')->where('codigo', $prestamo->codigo_solicitante)->first();
            } else {
                $solicitante = DB::table('alumno')->where('codigo', $prestamo->codigo_solicitante)->first();
            }

            $libro = DB::table('libro')
                ->where('isbn', $prestamo->isbn)
                ->where('num_ejemplar', $prestamo->num_ejemplar)
                ->first();

            $pdf = Pdf::loadView('prestamos.multa', compact('prestamo', 'solicitante', 'libro', 'multa'));

            Mail::send('prestamos.correo', compact('solicitante', 'multa'), function($message) use ($solicitante, $pdf) {
                $message->to($solicitante->correo)
                        ->subject('Multa por retraso - Biblioteca Digital')
                        ->attachData($pdf->output(), 'multa.pdf');
            });
        }

        return redirect('/prestamos');
    }

    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}