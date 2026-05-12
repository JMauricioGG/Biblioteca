<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta general de alumnos</title>
</head>
<body>

<h1>Consulta general de alumnos</h1>

<table border="1">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Carrera</th>
            <th>Correo</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Sexo</th>
            <th>Fecha de nacimiento</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->codigo }}</td>
            <td>{{ $alumno->nombre }}</td>
            <td>{{ $alumno->carrera }}</td>
            <td>{{ $alumno->correo }}</td>
            <td>{{ $alumno->direccion }}</td>
            <td>{{ $alumno->telefono }}</td>
            <td>{{ $alumno->sexo }}</td>
            <td>{{ $alumno->fecha_nacimiento }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/home-admin">Volver al menú principal</a>

</body>
</html>