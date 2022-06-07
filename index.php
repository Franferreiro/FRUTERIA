<?php
session_start();
/*echo "<br><br><br><br><br>";*/
/*echo $_SESSION["user"];*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styleindex.css">
  
  <title>My Website</title>
</head>

<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div>
          <a class="navbar-brand" href=""
            ><img
              src="./img/logogranjaa.png"
              alt="Logo"
              class="me-2"
              style="width: 70px"
          /></a>
        </div>
        <div class="brand">
          <a href="#hero">
            <h1><span>G</span>ran <span>J</span>uca</h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="#hero" data-after="Inicio">Inicio</a></li>
            <li><a href="#services" data-after="Reservas">Reservar</a></li>
            <li><a href="#projects" data-after="Productos">Productos</a></li>
            <li><a href="#about" data-after="Acerca de">Acerca de</a></li>
            <li><a href="#contact" data-after="Contacto">Contacto</a></li>
            <?php
            if(isset($_SESSION["img"])){
              echo "<li><a href='perfil.php' data-after='Contacto'>".$_SESSION['img']."</a></li>";

            }else{
              echo' <li><a href="login.php" data-after="Contacto">Login</a></li>';
            }
            ?>
         
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>Hola, <span></span></h1>
        <h1>Bienvenido a  <span></span></h1>
        <h1>GranJuca<span></span></h1>
        <a href="#services" type="button" class="cta">Reservar</a>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->

  <!-- Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Rese<span>r</span>vas</h1>
        <p>Ven a recoger las frutas y vegetales directamente del árboly del huerto, escoge tú mismo el que más te guste y comprueba de primera mano que es fresco y libre de conservantes</p>
      </div>
      <div class="service-bottom">
        <div class="service-item" id="huertotomate">
         
          <h2>Huerto de tomates</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item"  id="huertocebolla">
        
          <h2>Huerto de cebollas</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item " id="huertopatata">
         
          <h2>Huerto de patatas</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item"  id="huertolechuga">
         
          <h2>Huerto de lechugas</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
      
        <div class="service-item"  id="frutales">
         
          <h2>Finca de frutales</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        
      </div>
    </div>
  </section>
  <!-- End Service Section -->

  <!-- Projects Section -->
  <section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">Prod<span>u</span>ctos</h1>
      </div>
      <div class="all-projects">
        <div class="project-item">
          <div class="project-info">
            <h1>Patata</h1>
            <h2>Patata kennebec</h2>
            
            <p>Especialmente indicada para cocer, asar o utilizar en guisos
            </p>
            <p>Precio:2.60 €/Kg</p>
            <h2>Patata Monalisa</h2>
            <p>Son patatas “todoterreno”, ya sea fritas, porque absorben poco aceite; cocidas, ya que no se rompen, o asadas.</p>
            <p>Precio:2.30 €/Kg</p>
          </div>
          <div class="project-img">
            <img src="./img/patatas.webp" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Tomate </h1>
           
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/tomatoes-5356__340.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Lechuga </h1>
           
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/green-salad-1533956__340.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Cebolla </h1>
           
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/onion-3540502__340.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Manzana</h1>
            
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/apples-2788599__340.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Pera</h1>
            
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/pera-1534494__480.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Uva</h1>
            
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/uvas-1057433822-170667a.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Higo</h1>
            
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/figs-751__340.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Melocotón</h1>
            
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/peaches-3529802__340.webp" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Ciruela</h1>
            
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/ciruela-71690__340.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Naranja</h1>
            
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/oranges-1117628__340.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Cereza</h1>
            
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/cherries-598170__340.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Limón</h1>
            
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/lemon-1117568__340.jpg" alt="img">
          </div>
        </div>


      </div>
    </div>
  </section>
  <!-- End Projects Section -->

  <!-- About Section -->
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
  <!-- End About Section -->

  <!-- Contact Section -->
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
  <!-- End Contact Section -->

  <!-- Footer -->
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
  <!-- End Footer -->
  <script src="js/app.js"></script>
</body>

</html>