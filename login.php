<?php
require "BD_metodos.php";
print_r(comprobarusuarios());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_POST['correo'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="form-register">
        <form action="login.php" method="post">
        <h4>Inicio</h4>
    
      
        <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo">
        <input class="controls" type="password" name="contraseña" id="contraseña" placeholder="Ingrese su Contraseña">
      
        <input class="botons" name="boton" type="submit" value="Inicio">
    </form>
      </section>
    
</body>
</html>