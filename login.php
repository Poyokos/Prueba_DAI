<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src=js/bootstrap.js></script>
  </head>
  <body class="text-center">
    <form class="form-signin" method="POST" action="usuario.php">
      <h1 class="h3 mb-3 font-weight-normal">¡Bienvenido!</h1>
      <label for="inputUsuario" class="sr-only">Usuario</label>
      <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="pass" name ="pass" class="form-control" placeholder="Contraseña" required>
      <?php
      if (isset($_GET["failed"])) {
        echo '<h3 class="h6 mb-0 font-weight-bold">Usuario y/o contraseña invalidos</h3>';
        echo '</br>';
      }
      ?>
      <?php
      if (isset($_GET["error"])) {
        echo '<h3 class="h6 mb-0 font-weight-bold">Usuario no existe</h3>';
        echo '</br>';
      }
      ?>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <div>
        <a href="registro.php">Registrarse</a>
      </div>
    </form>
  </body>
</html>
