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
        $prestamos = DB::select('SELECT * FROM prestamo');
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

        DB::statement('INSERT INTO prestamo
            (tipo_solicitante, codigo_solicitante, isbn, num_ejemplar, fecha_prestamo, fecha_limite, estatus, multa)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->tipo_solicitante,
            $request->codigo_solicitante,
            $request->isbn,
            $request->num_ejemplar,
            $fecha_prestamo,
            $fecha_limite,
            'prestado',
            0,
        ]);

        return redirect('/home-empleado');
    }

    public function devolver(string $id)
    {
        if (!session('usuario')) return redirect('/login');
        $resultado = DB::select('SELECT * FROM prestamo WHERE id = ?', [$id]);
        $prestamo = $resultado[0] ?? null;
        return view('prestamos.devolver', compact('prestamo'));
    }

    public function devolverIndex()
    {
        if (!session('usuario')) return redirect('/login');
        $prestamos = DB::select('SELECT * FROM prestamo WHERE estatus = ?', ['prestado']);
        return view('prestamos.devolver-index', compact('prestamos'));
    }

    public function procesarDevolucion(Request $request, string $id)
    {
        $resultado = DB::select('SELECT * FROM prestamo WHERE id = ?', [$id]);
        $prestamo = $resultado[0] ?? null;

        $fecha_devolucion = Carbon::parse($request->fecha_devolucion);
        $fecha_limite = Carbon::parse($prestamo->fecha_limite);

        $multa = 0;
        if ($fecha_devolucion->gt($fecha_limite)) {
            $dias_retraso = $fecha_limite->diffInDays($fecha_devolucion);
            $tarifa = $prestamo->tipo_solicitante == 'maestro' ? 10 : 5;
            $multa = $dias_retraso * $tarifa;
        }

        DB::statement('UPDATE prestamo SET fecha_devolucion = ?, estatus = ?, multa = ? WHERE id = ?', [
            $fecha_devolucion,
            'entregado',
            $multa,
            $id,
        ]);

        if ($multa > 0) {
            if ($prestamo->tipo_solicitante == 'maestro') {
                $resultado = DB::select('SELECT * FROM profesor WHERE codigo = ?', [$prestamo->codigo_solicitante]);
                $solicitante = $resultado[0] ?? null;
            } else {
                $resultado = DB::select('SELECT * FROM alumno WHERE codigo = ?', [$prestamo->codigo_solicitante]);
                $solicitante = $resultado[0] ?? null;
            }

            $resultado = DB::select('SELECT * FROM libro WHERE isbn = ? AND num_ejemplar = ?', [
                $prestamo->isbn,
                $prestamo->num_ejemplar,
            ]);
            $libro = $resultado[0] ?? null;

          $pdf = Pdf::loadView('prestamos.multa', compact('prestamo', 'solicitante', 'libro', 'multa', 'fecha_devolucion'));

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