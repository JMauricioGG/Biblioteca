<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<tittle>Mi web Laravel</tittle>
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}"
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<header>
<h2>Mi web</h2>
<nav>
    <a href="{{ route('home') }}">Inicio</a> |
    <a href="{{ route('hola') }}">Saludo</a>
</nav>
</header>
<main style="padding:20px">
    @yield('content')
</main>

<footer style=""background:#eee; padding:10px; text-align:center">
c 2026 - Laravel desde cero
</footer>
</body>


</html>