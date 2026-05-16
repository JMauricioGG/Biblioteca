<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaludoController extends Controller
{
    public function mostrar($nombre)
    {
        return view('hola', compact('nombre'));
    }
}
