<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleindex.css">
    <link rel="stylesheet" href="css/style.css">
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
        <h1 class="section-title">Acerca <span>de</span></h1>
        <h2>Huerto tradicional y natural</h2>
        <p style="color:white">Somos una familia que cultiva y siembra natural y sosteniblemente los productos básicos del día a día y te invitamos a que vengas a cercionarte de primera mano de la calidad de nuestros alimentos.
          Acercate a pasar una buena experiencia recogiendo tú comida de hoy o de mañana directamente del campo y del árbol.
          Aquí te proporcionaremos las herramientas y utensilios necesarios para que saques de la tierra las patatas de tu bocadillo de tortilla para la cena o
          unos frescos tomates y lechugas recien recogidos para hacerte una ensalada.
          Si eres un fan de la fruta disponemos de una amplia variedad de árboles frutales, tú mismo podrás escoger la que más te apetezca para merendar.

        </p>
        <a href="registro.php" class="cta">Regístrate</a>
      </div>
    </div>
  </section>
    
</body>
</html>

<?php
?>