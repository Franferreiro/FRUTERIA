<?php
require "BD_metodos.php";
session_start();

if (isset($_POST["Guardar"])) {
  
    $_SESSION["user"] = $_POST["Usuario"];
    $_SESSION["telefono"] = $_POST["Telefono"];
    $_SESSION["apellido"] = $_POST["Apellido"];
    $_SESSION["correo"] = $_POST["Correo"];
   


  
  modificarperfil($_SESSION["id"], $_SESSION["user"], $_SESSION["apellido"], $_SESSION["correo"], $_SESSION["telefono"]);
  insertarhistorico($_SESSION["id"],"Modificación");
  
}
if (isset($_POST["Cerrar"])) {
   session_destroy();
   header('Location: index.php');
      
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.css" />
   
    <link href="../../pagina/Librerias/fontawesome-free-5.15.4-web/css/fontawesome.css" rel="stylesheet" />
    <link href="../../pagina/Librerias/fontawesome-free-5.15.4-web/css/brands.css" rel="stylesheet" />
    <link href="../../pagina/Librerias/fontawesome-free-5.15.4-web/css/solid.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styleindex.css">
    <link rel="stylesheet" href="css/styleperfil.css">

    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <?php include "_navbar.php" ?>
        </nav>
    </header>

    <div class="container">

        <div class="row ">
            <div class="col">
                <form action="perfil.php" method="post">
                    <div class="row pt-5">
                        <div class="col-5">
                            <img src="img/anonimo.png" alt="" width="100%">
                        </div>
                        <div class="col-7">
                            <ul class="list-group list-group-flush px-5">
                                <li class="list-group-item">Nombre: <input class="px-2 rounded" type="text" id="Usuario" name="Usuario" style="border: 0" readonly="true" value="<?php echo $_SESSION["user"] ?>"> </li>
                                <li class="list-group-item">Apellido: <input class="px-2 rounded" type="text" id="Apellido" name="Apellido" style="border: 0" readonly="true" value="<?php echo $_SESSION["apellido"] ?>"> </li>
                                <li class="list-group-item">Correo electrónico: <input class="px-2 rounded" type="text" id="Correo" name="Correo" style="border: 0" readonly="true" value="<?php echo $_SESSION["correo"] ?>"> </li>
                                <li class="list-group-item">Número de teléfono: <input class="px-2 rounded" type="text" id="Telefono" name="Telefono" style="border: 0" readonly="true" value="<?php echo $_SESSION["telefono"] ?>"> </li>                                
                                <li class="list-group-item">
                                <a type="button" class="btn btn-dark " onclick="editarCampos()">Editar</a>
                                <input type="submit" class="btn btn-dark " value="Guardar Cambios" name="Guardar" />
                                <input type="submit" class="btn btn-dark " value="Cerrar sesión" name="Cerrar" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
</body>
<script src="js/jquery-3.6.0.min.js"></script>
<script>
    var editable = false;

    function editarCampos() {
        console.log("editando")
        if (editable == false) {
            $("#Usuario").prop('readonly', false);
            $("#Usuario").css('border', '1px solid black');
            $("#Correo").prop('readonly', false);
            $("#Correo").css('border', '1px solid black');
            $("#Telefono").prop('readonly', false);
            $("#Telefono").css('border', '1px solid black');
            $("#Apellido").prop('readonly', false);
            $("#Apellido").css('border', '1px solid black');
            editable = true;
        } else {
            $("#Usuario").prop('readonly', true);
            $("#Usuario").css('border', '0px solid black');
            $("#Correo").prop('readonly', true);
            $("#Correo").css('border', '0px solid black');
            $("#Telefono").prop('readonly', true);
            $("#Telefono").css('border', '0px solid black');
            $("#Apellido").prop('readonly', true);
            $("#Apellido").css('border', '0px solid black');
            editable = false;
        }
    }
</script>

</html>