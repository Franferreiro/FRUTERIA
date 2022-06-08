<?php
require "BD_metodos.php";
require "validacion.php";

/**if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo $_POST['correo'];
}

if (isset($_POST["registrar"])) {
  $hasheada=password_hash($_POST['psw1'],PASSWORD_DEFAULT);
  registrarusuarios($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['telefono'], $hasheada);
  print_r(listarusuarios());
}**/
$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $oblig = array('nombre', 'apellidos', 'correo','telefono','psw1','psw2');
  
  foreach ($oblig as $campo) {
      if (empty($_POST[$campo])){
        $error = true;

      }else{
        $_POST['nombre']=test_input($_POST["nombre"]);
        $_POST['apellidos']=test_input($_POST["apellidos"]);
        $_POST['correo']=test_input($_POST["correo"]);
        $_POST['telefono']=test_input($_POST["telefono"]);
        $_POST['psw1']=test_input($_POST["psw1"]);
        $_POST['psw2']=test_input($_POST["ps2"]);

      }
        
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/styleindex.css">
    <link rel="stylesheet" href="css/style.css">
  <title>Registro</title>
</head>

<body>
  <header>
    <nav>
      <?php include "_navbar.php" ?>
    </nav>
  </header>
  <section class="form-register">
  <form action="" method="post">
    <h4>Registro</h4>
    <input class="controls" type="text" name="nombre" id="nombres" placeholder="Ingrese su Nombre">
    <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido">
    <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo">
    <input class="controls" type="number" name="telefono" id="telefono" placeholder="Ingrese su Teléfono">
    <input class="controls" type="password" name="psw1" id="psw" placeholder="Ingrese su Contraseña">
    <input class="controls" type="password" name="psw2" id="psw" placeholder="Repita la Contraseña">
    <input class="botons" type="submit" name="registrar" value="Registrar">
    <?php if($error){?><p style="color: red ";>Debes rellenar todos los campos</p><?php } ?>
    
  </section>
  </form>

</body>

</html>