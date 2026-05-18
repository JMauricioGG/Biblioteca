<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar préstamo</title>
</head>
<body>

<h1>Registrar préstamo</h1>

<form method="POST" action="/prestamos">
    @csrf

    <label>Tipo de solicitante:</label>
    <select name="tipo_solicitante">
        <option value="maestro">Maestro</option>
        <option value="alumno">Alumno</option>
    </select>
    <br>
    <label>Código del solicitante:</label>
    <input type="text" name="codigo_solicitante" required>
    <br>
    <label>ISBN del libro:</label>
    <input type="text" name="isbn" required>
    <br>
    <label>Número de ejemplar:</label>
    <input type="number" name="num_ejemplar" required>
    <br>
    <label>Fecha de préstamo:</label>
    <input type="date" name="fecha_prestamo" required>
    <br>
    <button type="submit">Guardar préstamo</button>
</form>

<a href="/home-empleado">Volver al menú principal</a>

</body>
</html>