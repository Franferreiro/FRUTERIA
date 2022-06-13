<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.css" />
    <!-- Font Awesome -->
    <link href="../../pagina/Librerias/fontawesome-free-5.15.4-web/css/fontawesome.css" rel="stylesheet" />
    <link href="../../pagina/Librerias/fontawesome-free-5.15.4-web/css/brands.css" rel="stylesheet" />
    <link href="../../pagina/Librerias/fontawesome-free-5.15.4-web/css/solid.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styleindex.css">
  <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav>
      <?php include "_navbar.php" ?>
    </nav>
  </header>

    <div class="container">
        <div class="row">
            <div class="col mt-5 pt-5 mx-5 ">
                <h2>Perfil de usuario</h2>
            </div>
        </div>

        <form action="../../pagina/modelo/perfil.php" method="post">
            <div class="row pt-5">
                <div class="col-3">
                    <img src="../../Imagenes/Iconos/Logo_iWeather.png" alt="" width="100%">
                </div>
                <div class="col-9">
                    <ul class="list-group list-group-flush px-5">
                        <li class="list-group-item">Nombre: <input class="px-2 rounded" type="text" id="Usuario" name="Usuario" style="border: 0" readonly="true" value="<?php echo $_SESSION["usuario"] ?>"> </li>
                        <li class="list-group-item">Correo electrónico: <?php echo $_SESSION["email"] ?></li>
                        <li class="list-group-item">Número de teléfono: <input class="px-2 rounded" type="text" id="Telefono" name="Telefono" style="border: 0" readonly="true" value="<?php echo $_SESSION["telf"] ?>"> </li>
                        <li class="list-group-item">Dirección: <input class="px-2 rounded" type="text" style="border: 0 " id="Direccion" name="Direccion" readonly="true" value="<?php echo $_SESSION["direccion"] ?>"></li>
                        <li class="list-group-item">Referente: <input class="px-2 rounded" type="text" style="border: 0 " id="Referente" name="Referente" readonly="true" value="<?php echo $_SESSION["referente"]  ?>"></li>
                        <li class="list-group-item"> <a type="button" class="p-1 m-2" onclick="editarCampos()"><i class="fas fa-pencil-alt"></i></a>
                            <input type="submit" class="btn btn-dark " value="Guardar Cambios" name="Guardar" />
                        </li>
                    </ul>
                </div>
            </div>
        </form>

    </div>
</body>
</html>