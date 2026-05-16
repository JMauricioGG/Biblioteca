<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(8); // trae todo de la BD
        return view('productos.index', compact('productos'));
    }

public function create()
{
    return view('productos.create');
}
public function store(Request $request)
{
   $request->validate([
    'nombre' =>'required|min:3',
    'precio'=>'required|numeric|min:1'
   ]);
    Producto::create([
        'nombre' => $request->nombre,
        'precio' => $request->precio
    ]);
 return redirect('/productos')->with('success', 'Producto agregado correctamente');
}
public function edit($id)
{
    $producto = Producto::findOrFail($id);
    return view('productos.edit', compact('producto'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'nombre'=>'required|min:3',
        'precio'=>'required|numeric|min:1'
    ]);
    $producto = Producto::findOrFail($id);
    $producto->update([
        'nombre'=> $request->nombre,
        'precio' => $request->precio
    ]);
return redirect('/productos')->with('success','Producto actualizado correctamente');
}
public function destroy($id)
{
    $producto=Producto::findOrFail($id);
    $producto->delete();

    return redirect('/productos')->with('success','Producto eliminado correctamente');
    
}

}