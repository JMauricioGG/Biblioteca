<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar profesor</title>
</head>
<body>

<h1>Registrar profesor</h1>

<form method="POST" action="/profesores">
    @csrf

    <label>Código:</label>
    <input type="text" name="codigo" required>
    <br>
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    <label>Departamento:</label>
    <input type="text" name="departamento">
    <br>
    <label>Correo:</label>
    <input type="text" name="correo">
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
    <button type="submit">Guardar profesor</button>
</form>

<a href="/home-admin">Volver al menú principal</a>

</body>
</html>