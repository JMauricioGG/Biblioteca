<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolver préstamo</title>
</head>
<body>

<h1>Devolver préstamo</h1>

<p><strong>ID préstamo:</strong> {{ $prestamo->id }}</p>
<p><strong>Tipo solicitante:</strong> {{ $prestamo->tipo_solicitante }}</p>
<p><strong>Código solicitante:</strong> {{ $prestamo->codigo_solicitante }}</p>
<p><strong>ISBN:</strong> {{ $prestamo->isbn }}</p>
<p><strong>Ejemplar:</strong> {{ $prestamo->num_ejemplar }}</p>
<p><strong>Fecha préstamo:</strong> {{ $prestamo->fecha_prestamo }}</p>
<p><strong>Fecha límite:</strong> {{ $prestamo->fecha_limite }}</p>

<form method="POST" action="/prestamos/{{ $prestamo->id }}/devolver">
    @csrf

    <label>Fecha de devolución:</label>
    <input type="date" name="fecha_devolucion" required>
    <br><br>
    <button type="submit">Procesar devolución</button>
</form>

<a href="/prestamos">Volver a préstamos</a>

</body>
</html>