<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Multa</title>
</head>
<body>

<p>Estimado/a {{ $solicitante->nombre }},</p>

<p>Le informamos que tiene una multa pendiente por retraso en la devolución de un libro.</p>

<p><strong>Monto a pagar: ${{ $multa }}</strong></p>

<p>Adjunto encontrará el reporte detallado en PDF.</p>

<p>Atentamente,<br>Biblioteca Digital</p>

</body>
</html>