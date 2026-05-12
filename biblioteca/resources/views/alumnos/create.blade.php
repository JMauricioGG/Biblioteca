<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar alumno</title>
</head>
<body>

<h1>Registrar alumno</h1>

<form method="POST" action="/alumnos">
    @csrf
    
    <label>Código:</label>
    <input type="text" name="codigo" required>
    
    <br>
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    
    <br>
    <label>Carrera:</label>
    <input type="text" name="carrera">
    
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
    <button type="submit">Guardar alumno</button>
</form>

<a href="/home-admin">Volver al menú principal</a>

</body>
</html>