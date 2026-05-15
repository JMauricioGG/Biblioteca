<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta general de libros</title>
</head>
<body>

<h1>Consulta general de libros</h1>

<table border="1">
    <thead>
        <tr>
            <th>ISBN</th>
            <th>Título</th>
            <th>Autor(es)</th>
            <th>Editorial</th>
            <th>Año_publicacion</th>
            <th>Num_ejemplar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($libros as $libro)
        <tr>
            <td>{{ $libro->isbn }}</td>
            <td>{{ $libro->titulo }}</td>
            <td>{{ $libro->autores }}</td>
            <td>{{ $libro->editorial }}</td>
            <td>{{ $libro->anio_publicacion }}</td>
            <td>{{ $libro->num_ejemplar }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/home-empleado">Volver al menú principal</a>

</body>
</html>