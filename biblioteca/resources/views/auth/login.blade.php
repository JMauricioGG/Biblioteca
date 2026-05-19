<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="min-h-screen bg-gray-100 flex text-center items-centers justify-center">

  <div class="text-title mb-8">
    <h1 class="text-4xl font-medium">Sistema digital de biblioteca</h1>
  </div>
  <div class="text-justify-left bg-white rounded-xl border border-gray-200 p-8 w-full max-w-sm shadow-sm">
    <h2 class="text-lg font-medium mb-6">Inicio de sesión</h2>
    <form action="/login" method="POST">
      @csrf
      <div class="mb-4">
        <label for="usuario" class="block text-sm text-gray-500 mb-1">Usuario</label>
        <input type="text" id="usuario" name="nombre_del_usuario" class="w-full border rounded-lg px-3 py-2" required>
      </div>
      <div class="mb-6">
        <label for="contrasena" class="block text-sm text-gray-500 mb-1">Contraseña</label>
        <input type="password" id="contrasena" name="contrasena" class="w-full border rounded-lg px-3 py-2" required>
      </div>
      <button type="submit" class="w-full bg-gray-900 text-white py-2 rounded-lg font-medium hover:bg-gray-700">
        Ingresar
      </button>
    </form>
  </div>
</body>
</html>
