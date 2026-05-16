<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<tittle>Editar producto</tittle>
</head>
<body>
    <h1>Editar producto</h1>
    @if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

    
    <form action="/productos/{{ $producto->id }}" method="POST">
@csrf
@method('PUT')

<label>Nombre:</label><br>
<input type="text" name="nombre" value="{{ $producto->nombre }}" required><br><br>

<label>Precio:</label><br>
<input type="number" name="precio" step="0.01"  value="{{ $producto->precio }}" required><br><br>
    
<button type="submit">Actualizar</button>
</form>
<br>
<a href="/productos">Volver</a>
</body>
</html>