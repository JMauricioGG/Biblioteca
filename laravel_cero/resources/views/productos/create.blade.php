<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar producto</title>
</head>
<body>

    <h1>Agregar producto</h1>

    @if ($errors->any())
    <div style="background:#f8d7da; color:#721c24; padding:10px; margin-bottom:10px">
    <ul style="color:red;">
@foreach ($errors->all() as $error)
<li>{{  $error }}</li>
@endforeach
@endif
    </ul>
    </div>
    <form action="/productos" method="POST">
        @csrf

        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Precio:</label><br>
        <input type="number" name="precio" step="0.01" required><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="/productos">Volver</a>

</body>
</html>
