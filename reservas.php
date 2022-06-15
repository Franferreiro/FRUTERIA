<?php
require "BD_metodos.php";
require "huerto.php";
session_start();
$listaparcelas=listarparcelas();
$huerto;
if (isset($_POST['buscartipo'])){
    $parcelaselec=buscarparcelaportipo($_POST['tipohuerto']);
    $huerto= new huerto($parcelaselec[0]['Id'],$parcelaselec[0]['tipo'],$parcelaselec[0]['precio'],$parcelaselec[0]['metros'],$parcelaselec[0]['imagen'],$parcelaselec[0]['descripcion']);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.css" />

    <link rel="stylesheet" href="css/styleindex.css">

    <link rel="stylesheet" href="css/styleperfil.css">
</head>
<body style="color:white">
<header>
        <nav>
            <?php include "_navbar.php" ?>
        </nav>
    </header>
  
    <section id="about">
        
    <div class="about container">
    
      <div class="col-left">
        <div class="about-img">
          <img src="<?php if (isset($_POST['buscartipo'])){ echo $huerto->imagen; }else echo 'img/tomatoes-5356__340.jpg' ?>" alt="img">
        </div>
      </div>
      <div class="col-right">
        <form action="reservas.php" method="post" >
      <div class='col-6'>
        <div class="row">
      <div class='col-8'>


        <select name='tipohuerto' class='form-select' aria-label='Default select example'>           
      
        <?php
        for($i=0;$i<sizeof($listaparcelas);$i++){
         echo "<option value='".$listaparcelas[$i]['tipo']."'>Huerto de ".$listaparcelas[$i]['tipo']."</option>";  
        }
        ?>      
        </select>
        </div>  
        <div class="col-4">
        <input type="submit" value="Buscar" class="btn btn-outline-success" name="buscartipo"> 
        </div> 
        </div>  
        
        </div>
        
        <div class="col-6">
            <input type="date">
        </div>
        </form>
        <h1 class="section-title"><?php if (isset($_POST['buscartipo'])){ echo "Huerto de ".$huerto->tipo; }else echo 'Huerto de tomates' ?></h1>
        
        <p style="color:white"><?php if (isset($_POST['buscartipo'])){ echo $huerto->descripcion; }else echo 'Puede que sea su brillante color, su delicioso sabor o su sorprende versatilidad, pero lo cierto es que nuestros tomates son un alimento con mucho «sex appeal». Escoge una de nuestras variedades, la que más te guste. Nosotros te proporcionamos las herramientas y utensilios necesarios para la actividad.' ?>
        </p>
        <h2 style="color:black" >Precio: <?php if (isset($_POST['buscartipo'])){ echo $huerto->precio; }else echo '4' ?> €</h2>
        <h2 style="color:black" >M²: <?php if (isset($_POST['buscartipo'])){ echo $huerto->metros; }else echo '400' ?></h2>
        
        <a href="registro.php" class="cta">Reservar</a>
       
      </section>
      </div>
    </div>
   
 
    
</body>
</html>

<?php

?>