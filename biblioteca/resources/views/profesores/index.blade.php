<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta general de profesores</title>
</head>
<body>

<h1>Consulta general de profesores</h1>

<table border="1">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Departamento</th>
            <th>Correo</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Sexo</th>
            <th>Fecha de nacimiento</th>
        </tr>
    </thead>
    <tbody>
        @foreach($profesores as $profesor)
        <tr>
            <td>{{ $profesor->codigo }}</td>
            <td>{{ $profesor->nombre }}</td>
            <td>{{ $profesor->departamento }}</td>
            <td>{{ $profesor->correo }}</td>
            <td>{{ $profesor->direccion }}</td>
            <td>{{ $profesor->telefono }}</td>
            <td>{{ $profesor->sexo }}</td>
            <td>{{ $profesor->fecha_nacimiento }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/home-admin">Volver al menú principal</a>

</body>
</html>