<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca</title>
</head>
<body>

<h1>Biblioteca Digital</h1>
<p>Usuario logeado: {{ session('usuario') }}</p>

<img src="https://thumbs.dreamstime.com/z/la-educaci%C3%B3n-en-l%C3%ADnea-biblioteca-o-el-fondo-de-estanter%C3%ADa-librer%C3%ADa-con-libros-como-vector-tem%C3%A1tica-educativa-dibujos-animados-167537218.jpg" alt="Biblioteca" width="400">

<h2>Menú LIBROS</h2>
<ul>
    <li><a href="/libros/create">Registrar</a></li>
    <li><a href="#">Consulta individual</a></li>
    <li><a href="/libros">Consulta general</a></li>
    <li><a href="#">Cambiar</a></li>
    <li><a href="#">Eliminar</a></li>
</ul>

<h2>Menú PRESTAMOS</h2>
<ul>
    <li><a href="/prestamos/create">Registrar préstamo</a></li>
    <li><a href="/prestamos/devolver-index">Devolver préstamo</a></li>
    <li><a href="/prestamos/consulta">Consulta de préstamo</a></li>
    <li><a href="/prestamos">Consultas de préstamos</a></li>
</ul>

<a href="/logout">Cerrar sesión</a>

</body>
</html>