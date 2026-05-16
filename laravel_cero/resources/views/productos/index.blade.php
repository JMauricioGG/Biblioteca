<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>
<body>

    <h1>Lista de productos</h1>
@if(session('success'))
    <div style="background:#d4edda; color:#155724; padding:10px; margin-bottom:10px;">
        {{ session('success') }}
    </div>
@endif
    <a href="/productos/crear"> Agregar producto</a>
    <ul>
        @foreach ($productos as $producto)
            <li>
                {{ $producto->nombre }} - ${{ $producto->precio }}
           <a href="/productos/{{ $producto->id }}/editar"> Editar</a>
        
           <form action="/productos/{{ $producto->id }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                Eliminar</button>
        </form>  
        </li>
      
</div>

        @endforeach
   
    </ul>
  <div style="margin-top:5px;">
    {{ $productos->links() }}
</body>
</html>
