<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca</title>
</head>
<body>

<h1>Biblioteca Sistema</h1>
<p>Usuario logeado: {{ session('usuario') }}</p>

<img src="https://thumbs.dreamstime.com/z/la-educaci%C3%B3n-en-l%C3%ADnea-biblioteca-o-el-fondo-de-estanter%C3%ADa-librer%C3%ADa-con-libros-como-vector-tem%C3%A1tica-educativa-dibujos-animados-167537218.jpg" alt="Biblioteca" width="400">

<h2>Menú EMPLEADOS</h2>
<ul>
    <li><a href="/empleados/create">Registrar</a></li>
    <li><a href="#">Consulta individual</a></li>
    <li><a href="/empleados">Consulta general</a></li>
    <li><a href="#">Cambiar</a></li>
    <li><a href="#">Eliminar</a></li>
</ul>
<h2>Menu ALUMNOS</h2>
<ul>
    <li><a href="/alumnos/create">Registrar</a></li>
    <li><a href="#">Consulta individual</a></li>
    <li><a href="/alumnos">Consulta general</a></li>
    <li><a href="#">Cambiar</a></li>
    <li><a href="#">Eliminar</a></li>
</ul>
<h2>Menú PROFESORES</h2>
<ul>
    <li><a href="/profesores/create">Registrar</a></li>
    <li><a href="#">Consulta individual</a></li>
    <li><a href="/profesores">Consulta general</a></li>
    <li><a href="#">Cambiar</a></li>
    <li><a href="#">Eliminar</a></li>
</ul>
<a href="/logout">Cerrar sesión</a>

</body>
</html>