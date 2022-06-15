<?php
require "BD_metodos.php";
require "huerto.php";
session_start();
$listaparcelas=listarparcelas();

if (isset($_POST['buscartipo'])){
    $parcelaselec=buscarparcelaportipo($_POST['tipohuerto']);
    $huerto= new huerto($parcelaselec[0]['Id'],$parcelaselec[0]['tipo'],$parcelaselec[0]['precio'],$parcelaselec[0]['metros'],$parcelaselec[0]['imagen'],$parcelaselec[0]['descripcion']);
print_r($huerto);
echo "lalala";


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
    <link rel="stylesheet" href="css/style.css">
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
          <img src="./img/food-960070__340.jpg" alt="img">
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
        <h1 class="section-title">Acerca <span>de</span></h1>
        <h2>Huerto tradicional y natural</h2>
        <p style="color:white">Somos una familia que cultiva y siembra natural y sosteniblemente los productos básicos del día a día y te invitamos a que vengas a cercionarte de primera mano de la calidad de nuestros alimentos.
          Acercate a pasar una buena experiencia recogiendo tú comida de hoy o de mañana directamente del campo y del árbol.
          Aquí te proporcionaremos las herramientas y utensilios necesarios para que saques de la tierra las patatas de tu bocadillo de tortilla para la cena o
          unos frescos tomates y lechugas recien recogidos para hacerte una ensalada.
          Si eres un fan de la fruta disponemos de una amplia variedad de árboles frutales, tú mismo podrás escoger la que más te apetezca para merendar.

        </p>
        <a href="registro.php" class="cta">Regístrate</a>
       
      </section>
      </div>
    </div>
   
 
    
</body>
</html>

<?php
?>