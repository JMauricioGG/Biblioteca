<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de préstamos</title>
</head>
<body>

<h1>Consulta de préstamos</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo solicitante</th>
            <th>Código solicitante</th>
            <th>ISBN</th>
            <th>Ejemplar</th>
            <th>Fecha préstamo</th>
            <th>Fecha límite</th>
            <th>Fecha devolución</th>
            <th>Estatus</th>
            <th>Multa</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($prestamos as $prestamo)
        <tr>
            <td>{{ $prestamo->id }}</td>
            <td>{{ $prestamo->tipo_solicitante }}</td>
            <td>{{ $prestamo->codigo_solicitante }}</td>
            <td>{{ $prestamo->isbn }}</td>
            <td>{{ $prestamo->num_ejemplar }}</td>
            <td>{{ $prestamo->fecha_prestamo }}</td>
            <td>{{ $prestamo->fecha_limite }}</td>
            <td>{{ $prestamo->fecha_devolucion ?? 'Pendiente' }}</td>
            <td>{{ $prestamo->estatus }}</td>
            <td>{{ $prestamo->multa }}</td>
            <td>
                @if($prestamo->estatus == 'prestado')
                    <a href="/prestamos/{{ $prestamo->id }}/devolver">Devolver</a>
                @else
                    Ya entregado
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/home-empleado">Volver al menú principal</a>

</body>
</html>