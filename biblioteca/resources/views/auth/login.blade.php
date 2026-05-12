<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
    <h2>Inicio de sesion</h2>

    <form action="/login" method="POST">
  @csrf

    <label>Usuario</label>
  <input type="text" name="nombre_del_usuario" required>
  
  <br>
  <label>Contraseña</label>
  <input type="password" name="contrasena"  required>
    
<button type="submit">Ingresar</button>
</form>






</body>
</html>