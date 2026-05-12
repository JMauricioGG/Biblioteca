<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta general de empleados</title>
</head>
<body>

<h1>Consulta general de empleados</h1>

<table border="1">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Sexo</th>
            <th>Fecha de nacimiento</th>
            <th>Turno</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{ $empleado->codigo }}</td>
            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->direccion }}</td>
            <td>{{ $empleado->telefono }}</td>
            <td>{{ $empleado->sexo }}</td>
            <td>{{ $empleado->fecha_nacimiento }}</td>
            <td>{{ $empleado->turno }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/home">Volver al menú principal</a>

</body>
</html>