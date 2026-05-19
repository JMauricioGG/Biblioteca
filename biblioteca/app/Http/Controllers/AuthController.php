<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AuthController extends Controller
{
   public function index(){

   return view('auth.login');
   } //

   public function login(Request $request)
   {
   $usuario = DB::select('SELECT * FROM usuario WHERE nombre_del_usuario = ? AND contrasena = ?', [
    $request->nombre_del_usuario,
    $request->contrasena,
]);
$usuario = $usuario[0] ?? null;

    if ($usuario) {
        session(['usuario' => $usuario->nombre_del_usuario]);
        
        if ($usuario->nombre_del_usuario == 'administrador') {
            return redirect('/home-admin');
        } else {
            return redirect('/home-empleado');
        }
    }

    return back()->with('error', 'Usuario o contraseña incorrectos');
    }
public function homeAdmin()
    {
        if (!session('usuario')) {
            return redirect('/login');
        }
        return view('auth.home-admin');
    }
public function homeEmpleado()
    {
        if (!session('usuario')) {
            return redirect('/login');
        }
        return view('auth.home-empleado');
    }


    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }


   }
