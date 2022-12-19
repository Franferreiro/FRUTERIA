<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styleindex.css">
  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">


  <title>My Website</title>
</head>

<body>

  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div>
          <a class="navbar-brand" href="index.php"><img src="./img/logogranjaa.png" alt="Logo" class="me-2" style="width: 70px" /></a>
        </div>
        <div class="brand">
          <a href="index.php">
            <h1><span>G</span>ran <span>J</span>uca</h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="#terrenos" data-after="Inicio">Terreno</a></li>
            <li><a href="#services" data-after="Reservas">Reserva</a></li>
            <li><a href="#projects" data-after="Productos">Productos</a></li>
            <li><a href="#about" data-after="Acerca de">Acerca de</a></li>
            <li><a href="#contact" data-after="Contacto">Contacto</a></li>
            <?php
            if (!empty($_SESSION)) {
              if (($_SESSION["rol"] == 1)) {
                echo "<li><a href='administrar.php' data-after='Contacto'>Admin</a></li>";
              }
            }
            if (isset($_SESSION["img"])) {
              echo "<li><a href='perfil.php' data-after='Contacto'> <img class='imgnav' src='" . $_SESSION['img'] . "' ></a></li>";
            } else {
              echo ' <li><a href="login.php" data-after="Contacto">Login</a></li>';
            }
            ?>


          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="hero">
    <div class="hero container">
      <div>
        <h1>Hola, <span></span></h1>
        <h1>Bienvenido a <span></span></h1>
        <h1>GranJuca<span></span></h1>
        <a href="#services" type="button" class="cta">Reservar</a>
      </div>
    </div>
  </section>

  <section id="services">
    <div class="services container">

      <div class="service-top">
        <h1 class="section-title">Rese<span>r</span>vas</h1>
        <p>Ven a realizar actividades y procesos relacionados con el campo y la agricultura durante una hora por 7,95 € cada integrante de tu grupo, pasa un rato entretenido y divertido con la opción de llevarte los productos con los que has interactuado en las actividades. Se aceptan reservas individuales y de grupos de hasta 5 personas. Te aportaremos el material necesario para realizar las actividades, desde la vestimenta hasta las herramientas. </p>
      </div>
      <div class="service-bottom" id="parcelas">


      </div>

    </div>
  </section>

  <section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">Prod<span>u</span>ctos</h1>
      </div>
      <div class="all-projects">



      </div>
    </div>
  </section>
  <section id="terrenos">
  <section id="services" class="terrenos">
    <div class="services container">

      <div class="service-top">
        <h1 class="section-title">Terr<span>e</span>nos</h1>
        <p>Alquila un terreno de 20 metros cuadrados por 28,95 euros al mes o de 50 metros cuadrados por 69,95 euros al mes, en el que puedes plantar las frutas y hortalizas que quieras, si quieres que los trabajadores se ocupen del cultivo el precio se incrementará un 25%, pasando a costar 36,20 euros el de 25 metros cuadrados y 87,45 euros eld e 50 metros cuadrados.  </p>
      </div>
      <div class="service-bottom" id="terrenosalquilables">


      </div>

    </div>
  </section>
  </section>

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
        <p>Somos una familia que cultiva y siembra natural y sosteniblemente los productos básicos del día a día y te invitamos a que vengas a cercionarte de primera mano de la calidad de nuestros alimentos.
          Acercate a pasar una buena experiencia recogiendo tú comida de hoy o de mañana directamente del campo y del árbol.
          Aquí te proporcionaremos las herramientas y utensilios necesarios para que saques de la tierra las patatas de tu bocadillo de tortilla para la cena o
          unos frescos tomates y lechugas recien recogidos para hacerte una ensalada.
          Si eres un fan de la fruta disponemos de una amplia variedad de árboles frutales, tú mismo podrás escoger la que más te apetezca para merendar.

        </p>
        <a href="registro.php" class="cta">Regístrate</a>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="contact container">
      <div>
        <h1 class="section-title">Información de <span>contacto</span></h1>
      </div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Teléfono</h1>
            <h2>608913499</h2>
            <h2>986212526</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>info@gmail.com</h2>
            <h2>abcd@gmail.com</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
          <div class="contact-info">
            <h1>Dirección</h1>
            <h2>Baiona,Regadas Nº19</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <section id="footer">
    <div class="footer container">
      <div class="brand">
        <h1>GranJuca</h1>
      </div>
      <h2>Tu huerto de confianza</h2>
      <div class="social-icon">
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
        </div>

      </div>
    </div>
    <p>Copyright © 2020 GranJuca. Todos los derechos reservados</p>
    </div>
  </section>
  <div class="modal" id="modreservas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-target=".bd-example-modal-lg" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="    background-image: linear-gradient(60deg, rgb(5, 88, 5) 0%, rgb(107, 91, 22) 100%);">
        <div class="modal-header" style="border:none">


        </div>
        <div class="modal-body">
          <div class="form-control" style="margin:2px; border-radius:10px; padding-top:15px;">
            <form method="$_POST">


              <div class="row" style="margin-bottom:10px;">
                <div class="col-md-2">
                  <label style="margin-top:7px;font-size: 2vh;">Fecha</label>
                </div>
                <div class="col-md-6" style="font-size: 2vh;">
                  <input type="date" name="fecha_reserva" id="fecha_reserva" value="<?php if (isset($_POST['fecha_reserva'])) echo $_POST['fecha_reserva']; ?>" style="width: 100%;">

                </div>

              </div>
              <hr>
              <div class="row" style="margin-bottom:10px;">
                <div class="col-md-2">
                  <label style="margin-top:7px;font-size: 2vh;">Horas disponibles</label>
                </div>
                <div class="col-md-6">
                  <select style="font-size: 2vh;" name='horashuerto' id="horashuerto" class='form-select' aria-label='Default select example'>
                  </select>

                </div>

              </div>




            </form>
          </div>
        </div>
        <div class="modal-footer" style="border:none">
          <button style="font-size: 2vh;" type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
          <button style="font-size: 2vh;" type="button" id="botonreserva" class="btn btn-success" onclick="realizarreserva();">Reservar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="modproductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-target=".bd-example-modal-lg" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="    background-image: linear-gradient(60deg, rgb(5, 88, 5) 0%, rgb(107, 91, 22) 100%);">
        <div class="modal-header" style="border:none">


        </div>
        <div class="modal-body">
          <div class="form-control" style="margin:2px; border-radius:10px; padding-top:15px;">
            <form method="$_POST">


              <div class="row" style="margin-bottom:10px;    align-items: center;justify-content: center;">
                <div class="col-md-2" style="    margin-right: 1vw;">
                  <label style="margin-top:7px;font-size: 2vh;">Cantidad</label>
                </div>
                <div class="col-md-2" style="font-size: 2vh;">
                  <input type="number" name="cantidad_producto" id="cantidad_producto" value="" style="width: 100%;">

                </div>
                <div class="col-md-2">
                  <label style="margin-top:7px;font-size: 2vh;">Kg</label>
                </div>

              </div>
            




            </form>
          </div>
        </div>
        <div class="modal-footer" style="border:none">
          <button style="font-size: 2vh;" type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarmodal()">Cerrar</button>
          <button style="font-size: 2vh;" type="button" id="botonreserva" class="btn btn-success" onclick="anadircarro()">Añadir al carro</button>
        </div>
      </div>
    </div>
  </div>

  <button onclick="levantarcarrito()" class="btn-flotante" style="display:none;">Compra</button>
  <div class="modal" id="modcompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-target=".bd-example-modal-lg" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="    background-image: linear-gradient(60deg, rgb(5, 88, 5) 0%, rgb(107, 91, 22) 100%);">
        <div class="modal-header" style="border:none">


        </div>
        <div class="modal-body">
          <div class="form-control" style="margin:2px; border-radius:10px; padding-top:15px;">
            <form method="$_POST" id="formcarrito">


            
            




            </form>
          </div>
        </div>
        <div class="modal-footer" style="border:none">
          <button style="font-size: 2vh;" type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarcarrito()">Cerrar</button>
          <button style="font-size: 2vh;" type="button" id="botonreserva" class="btn btn-success" onclick="realizarcompra()">Realizar compra</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="modterrenos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-target=".bd-example-modal-lg" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="    background-image: linear-gradient(60deg, rgb(5, 88, 5) 0%, rgb(107, 91, 22) 100%);">
        <div class="modal-header" style="border:none">


        </div>
        <div class="modal-body">
          <div class="form-control" style="margin:2px; border-radius:10px; padding-top:15px;">
            <form method="$_POST" id="terrenosmod">


              <div class="row" style="margin-bottom:10px;">
                <div class="col-md-2">
                  <label style="margin-top:7px;font-size: 2vh;">Fecha Inicio</label>
                </div>
                <div class="col-md-6" style="font-size: 2vh;">
                  <input type="date" name="fecha_inicio" id="fecha_inicio" value="<?php if (isset($_POST['fecha_inicio'])) echo $_POST['fecha_inicio']; ?>" style="width: 100%;">

                </div>

              </div>
              <hr>
              <div class="row" style="margin-bottom:10px;">
                <div class="col-md-2">
                  <label style="margin-top:7px;font-size: 2vh;">Fecha Inicio</label>
                </div>
                <div class="col-md-6" style="font-size: 2vh;">
                  <input type="date" name="fecha_final" id="fecha_final" value="<?php if (isset($_POST['fecha_final'])) echo $_POST['fecha_final']; ?>" style="width: 100%;">

                </div>

              </div>
              <hr>
              <div class="row" style="margin-bottom:10px;">
                <div class="col-md-2">
                  <label style="margin-top:7px;font-size: 2vh;">Tipo de cultivo</label>
                </div>
                <div class="col-md-6">
                  <select style="font-size: 2vh;" name='tipocultivo' id="tipocultivo" class='form-select' aria-label='Default select example'>
                  <option value="Yo mismo">Yo mismo</option>
                  <option value="">Con ayuda</option>
                  </select>

                </div>

              </div>




            </form>
          </div>
        </div>
        <div class="modal-footer" style="border:none">
          <button style="font-size: 2vh;" type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
          <button style="font-size: 2vh;" type="button" id="botonreserva" class="btn btn-success" onclick="haceralquiler()">Alquilar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="js/app.js"></script>
  <script src="js/jquery-3.6.2.min.js"></script>
  <script src="js/functions.js"></script>
  <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
  <script src="js/sweetalert2.all.min.js"></script>
  <script src="js/moment.js"></script>
</body>

</html>