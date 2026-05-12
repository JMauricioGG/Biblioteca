<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar empleado</title>
</head>
<body>

<h1>Registrar empleado</h1>

<form method="POST" action="/empleados">
    @csrf

    <label>Código:</label>
    <input type="number" name="codigo" required>
    <br>
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    <label>Dirección:</label>
    <input type="text" name="direccion">
    <br>
    <label>Teléfono:</label>
    <input type="text" name="telefono">
    <br>
    <label>Sexo:</label>
    <input type="text" name="sexo" maxlength="1">
    <br>
    <label>Fecha de nacimiento:</label>
    <input type="date" name="fecha_nacimiento">
    <br>
    <label>Turno:</label>
    <input type="text" name="turno">
    <br>
    <button type="submit">Guardar empleado</button>
</form>

<a href="/home">Volver al menu principal</a>

</body>
</html>