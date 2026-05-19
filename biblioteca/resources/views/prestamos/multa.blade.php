<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Multa - Biblioteca Digital</title>
</head>
<body>

<h1>Biblioteca Digital</h1>
<h2>Reporte de Multa</h2>

<p><strong>Nombre:</strong> {{ $solicitante->nombre }}</p>
<p><strong>Correo:</strong> {{ $solicitante->correo }}</p>

<h3>Datos del libro</h3>
<p><strong>ISBN:</strong> {{ $libro->isbn }}</p>
<p><strong>Título:</strong> {{ $libro->titulo }}</p>
<p><strong>Ejemplar:</strong> {{ $libro->num_ejemplar }}</p>

<h3>Datos del préstamo</h3>
<p><strong>Fecha préstamo:</strong> {{ $prestamo->fecha_prestamo }}</p>
<p><strong>Fecha límite:</strong> {{ $prestamo->fecha_limite }}</p>
<p><strong>Fecha devolución:</strong> {{ $fecha_devolucion->format('Y-m-d') }}</p>

<h3>Multa a pagar: ${{ $multa }}</h3>

</body>
</html>
