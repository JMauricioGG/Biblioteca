<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar libro</title>
</head>
<body>

<h1>Registrar libro</h1>

<form method="POST" action="/libros">
    @csrf

    <label>ISBN:</label>
    <input type="text" name="isbn" required>
    <br>
    <label>Título:</label>
    <input type="text" name="titulo" required>
    <br>
    <label>Autores:</label>
    <input type="text" name="autores">
    <br>
    <label>Editorial:</label>
    <input type="text" name="editorial">
    <br>
    <label>Año de publicación:</label>
    <input type="number" name="anio_publicacion">
    <br>
    <label>Número de ejemplar:</label>
    <input type="number" name="num_ejemplar">
    <br>
    <button type="submit">Guardar libro</button>
</form>

<a href="/home-empleado">Volver al menú principal</a>

</body>
</html>