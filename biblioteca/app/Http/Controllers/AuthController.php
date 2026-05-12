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
   $usuario = DB::table('usuario')
   ->where('nombre_del_usuario', $request->nombre_del_usuario)
   ->where('contrasena', $request->contrasena)
   ->first();

 if ($usuario) {
            session(['usuario' => $usuario->nombre_del_usuario]);
            return redirect('/home');
        }

        return back()->with('error', 'Usuario o contraseña incorrectos');
    }
public function home()
    {
        if (!session('usuario')) {
            return redirect('/login');
        }
        return view('auth.home');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }


   }
