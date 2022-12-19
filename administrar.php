<?php
require "BD_metodos.php";




session_start();

$listaparcelas = listarparcelas();
$listarproductos=listarproductos();
$listaterrenos=traerterrenos();


if (isset($_POST['añadirhuerto'])) {
    añadirrhuerto($_POST['tipohuertoañadir'], $_POST['preciohuertoañadir'], $_POST['metroshuertoañadir'], $_POST['imagenhuertoañadir'], $_POST['descripcionhuertoañadir']);
    header('Location:administrar.php');
}

if (isset($_POST['borrarhuerto'])) {
    borrarrhuerto($_POST['huertoseleccionado']);
    header('Location:administrar.php');
}
if (isset($_POST['huertoseleccionado']) && isset($_POST['modificarhuerto'])) {
    $huertoporid = buscarparcelaporid($_POST['huertoseleccionado']);
   
}
if (isset($_POST['guardarcambios'])){
    modificarhuerto($_POST['idhuertomodificar'],$_POST['tipohuertomodificar'], $_POST['preciohuertomodificar'],$_POST['metroshuertomodificar'], $_POST['imagenhuertomodificar'], $_POST['descripcionhuertomodificar']);
    header('Location:administrar.php');
}
//-----------------

if (isset($_POST['añadirproducto'])) {
    añadirproducto($_POST['nombreproductoañadir'], $_POST['tipoproductoañadir'], $_POST['fotoproductoañadir'], $_POST['precioproductoañadir'], $_POST['cantidadproductoañadir'], $_POST['descripcionproductoañadir']);
    header('Location:administrar.php');
}
if (isset($_POST['borrarproducto'])) {
    borrarrproducto($_POST['productoseleccionado']);
    header('Location:administrar.php');
}
if (isset($_POST['productoseleccionado']) && isset($_POST['modificarproducto'])) {
    $productoporid = obtenerproducto($_POST['productoseleccionado']);
   
}
if (isset($_POST['guardarcambiosproducto'])){
    modificarproducto($_POST['idproductomodificar'],$_POST['nombreproductomodificar'],$_POST['imagenproductomodificar'], $_POST['precioproductomodificar'],$_POST['cantidadproductomodificar'], $_POST['descripcionproductomodificar']);
    header('Location:administrar.php');
}
//-----------------
if (isset($_POST['añadirterreno'])) {
    añadirterreno($_POST['tamañoterrenoañadir'], $_POST['precioterrenoañadir'], $_POST['fototerrenoañadir'], $_POST['estadoterrenoañadir']);
    header('Location:administrar.php');
}
if (isset($_POST['borrarterreno'])) {
    borrarrterreno($_POST['terrenoseleccionado']);
    header('Location:administrar.php');
}
if (isset($_POST['terrenoseleccionado']) && isset($_POST['modificarterreno'])) {
    $terrenoporid = obtenerterreno($_POST['terrenoseleccionado']);
   
}
if (isset($_POST['guardarcambiosterreno'])){
    modificarterreno($_POST['idterrenomodificar'],$_POST['tamañoterrenomodificar'],$_POST['precioterrenomodificar'],$_POST['fototerrenomodificar'], $_POST['estadoterrenomodificar']);
    header('Location:administrar.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.css" />
    <link rel="stylesheet" href="css/styleindex.css">
    <link rel="stylesheet" href="css/styleperfil.css">
</head>

<body>
    <header>
        <nav>
            <?php include "_navbar.php" ?>
        </nav>
    </header>
    <form action="" style="width:100% ;" method="post">
        <div class="container d-flex flex-column">
            <div class="row" style="width:100% ;margin-top: 50px;">
                <div class="col-8 m-auto p-5">
                    <?php if (isset($_POST['huertoseleccionado']) && isset($_POST['modificarhuerto'])) {
                        echo "
                    <div class='col-6 m-auto mb-3 '>
                    <input type='text' class='fs-2 form-control' name='tipohuertomodificar' placeholder='Tipo de huerto' value='".$huertoporid[0]['tipo']."'>
                    <input type='text' class='fs-2 form-control' name='idhuertomodificar' placeholder='Tipo de huerto' value= '".$huertoporid[0]['Id']."'  hidden>
        
                </div>
                <div class='col-6 m-auto mb-3'>
                    <input type='text' class='fs-2 form-control' name='preciohuertomodificar' placeholder='Precio' value=' ".$huertoporid[0]['precio']." '>
                </div>
                <div class='col-6 m-auto mb-3 '>
                    <input type='text' class='fs-2 form-control' name='metroshuertomodificar' placeholder='Metros cuadrados' value='".$huertoporid[0]['metros']." '>
                </div>
                <div class='col-6 m-auto mb-3 '>
                    <input type='text' class='fs-2 form-control' name='imagenhuertomodificar' placeholder='Imagen' value=' ".$huertoporid[0]['imagen']." '>
                </div>
                <div class='col-8 m-auto mb-3'>
                    <div class='input-group'>
                        <span class='fs-2 input-group-text'>Descripción</span>
                        <textarea class='fs-2 form-control' name='descripcionhuertomodificar' aria-label='With textarea'>".$huertoporid[0]['descripcion']."</textarea>
                    </div>
                </div>
                <button type='submit' name='guardarcambios' class='btn btn-success px-4' style='font-size: 20px;'>
                Guardar cambios
            </button>
                    
                    ";
                    } else {
                        echo "
                    <table class='table table-success table-striped '>
                    <thead>
                        <tr>

                            <th scope='col'>Id</th>
                            <th scope='col'>Tipo</th>
                            <th scope='col'>Precio</th>
                            <th scope='col'>Metros</th>
                            <th scope='col'>Descripción</th>
                            <th scope='col'>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>

                    ";
                        for ($i = 0; $i < count($listaparcelas); $i++) {

                            echo "  <tr>
                     
                        <td>" . $listaparcelas[$i]["Id"] . "</td>
                        <td>" . $listaparcelas[$i]["tipo"] . "</td>
                        <td>" . $listaparcelas[$i]["precio"] . "</td>
                        <td>" . $listaparcelas[$i]["metros"] . "</td>
                        <td>" . $listaparcelas[$i]["descripcion"] . "</td>
                        <td> <input type='radio' name='huertoseleccionado' value='" . $listaparcelas[$i]["Id"] . "'></td>
                    </tr>";
                        }
                        echo "
                            </tbody>
                            </table>";
                    }


                    ?>


                </div>
            </div>
            

            <div class="row" style="width:100% ;">

                <div class="col-6 p-5 m-auto d-flex justify-content-around">

                    <button type="submit" class="btn btn-success px-4" name="modificarhuerto" style="font-size: 20px;">Modificar</button>
                    <!-- Button trigger modal -->

                    <button type="button" class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#anadirModal" style="font-size: 20px;">
                        Añadir
                    </button>
                    <button type="submit" name="borrarhuerto" class="btn btn-success px-4" style="font-size: 20px;">
                        Borrar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="anadirModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " style="max-width: 1200px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="col-6 m-auto mb-3 ">
                                        <input type="text" class="fs-2 form-control" name="tipohuertoañadir" placeholder="Tipo de huerto">

                                    </div>
                                    <div class="col-6 m-auto mb-3">
                                        <input type="text" class="fs-2 form-control" name="preciohuertoañadir" placeholder="Precio">
                                    </div>
                                    <div class="col-6 m-auto mb-3 ">
                                        <input type="text" class="fs-2 form-control" name="metroshuertoañadir" placeholder="Metros cuadrados">
                                    </div>
                                    <div class="col-6 m-auto mb-3 ">
                                        <input type="text" class="fs-2 form-control" name="imagenhuertoañadir" placeholder="Imagen">
                                    </div>
                                    <div class="col-8 m-auto mb-3">
                                        <div class="input-group">
                                            <span class="fs-2 input-group-text">Descripción</span>
                                            <textarea class="fs-2 form-control" name="descripcionhuertoañadir" aria-label="With textarea"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="fs-2 btn btn-secondary mx-3" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="fs-2 btn btn-primary mx-3" name="añadirhuerto">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            
            </div>
            <div class="row" style="width:100% ;">
                <div class="col-8 m-auto p-5">
                    <?php if (isset($_POST['productoseleccionado']) && isset($_POST['modificarproducto'])) {
                        echo "
                    <div class='col-6 m-auto mb-3 '>
                    <input type='text' class='fs-2 form-control' name='nombreproductomodificar' placeholder='Tipo de huerto' value='".$productoporid[0]['nombre']."'>
                    <input type='text' class='fs-2 form-control' name='idproductomodificar' placeholder='Tipo de huerto' value= '".$productoporid[0]['Id']."'  hidden>
        
                </div>
                <div class='col-6 m-auto mb-3'>
                    <input type='text' class='fs-2 form-control' name='imagenproductomodificar' placeholder='Foto' value=' ".$productoporid[0]['foto']." '>
                </div>
                <div class='col-6 m-auto mb-3 '>
                    <input type='text' class='fs-2 form-control' name='precioproductomodificar' placeholder='Precio' value='".$productoporid[0]['precio']." '>
                </div>
                <div class='col-6 m-auto mb-3 '>
                    <input type='text' class='fs-2 form-control' name='cantidadproductomodificar' placeholder='Cantidad' value=' ".$productoporid[0]['cantidad_disponible']." '>
                </div>
                <div class='col-8 m-auto mb-3'>
                    <div class='input-group'>
                        <span class='fs-2 input-group-text'>Descripción</span>
                        <textarea class='fs-2 form-control' name='descripcionproductomodificar' aria-label='With textarea'>".$productoporid[0]['descripcion']."</textarea>
                    </div>
                </div>
                <button type='submit' name='guardarcambiosproducto' class='btn btn-success px-4' style='font-size: 20px;'>
                Guardar cambios
            </button>
                    
                    ";
                    } else {
                        echo "
                    <table class='table table-success table-striped '>
                    <thead>
                        <tr>

                            <th scope='col'>Id</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Tipo</th>
                            <th scope='col'>Foto</th>
                            <th scope='col'>Precio</th>
                            <th scope='col'>Cantidad</th>
                            <th scope='col'>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>

                    ";
                        for ($i = 0; $i < count($listarproductos); $i++) {

                            echo "  <tr>
                     
                        <td>" . $listarproductos[$i]["Id"] . "</td>
                        <td>" . $listarproductos[$i]["nombre"] . "</td>
                        <td>" . $listarproductos[$i]["tipo"] . "</td>
                        <td>" . $listarproductos[$i]["precio"] . "</td>
                        <td>" . $listarproductos[$i]["cantidad_disponible"] . "</td>
                        <td>" . $listarproductos[$i]["descripcion"] . "</td>
                        <td> <input type='radio' name='productoseleccionado' value='" . $listarproductos[$i]["Id"] . "'></td>
                    </tr>";
                        }
                        echo "
                            </tbody>
                            </table>";
                    }


                    ?>


                </div>
            </div>
            

            <div class="row" style="width:100% ;">

                <div class="col-6 p-5 m-auto d-flex justify-content-around">

                    <button type="submit" class="btn btn-success px-4" name="modificarproducto" style="font-size: 20px;">Modificar</button>
                    <!-- Button trigger modal -->

                    <button type="button" class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#productoModal" style="font-size: 20px;">
                        Añadir
                    </button>
                    <button type="submit" name="borrarproducto" class="btn btn-success px-4" style="font-size: 20px;">
                        Borrar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="productoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " style="max-width: 1200px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="col-6 m-auto mb-3 ">
                                        <input type="text" class="fs-2 form-control" name="nombreproductoañadir" placeholder="Nombre">

                                    </div>
                                    <div class="col-6 m-auto mb-3">
                                        <input type="text" class="fs-2 form-control" name="tipoproductoañadir" placeholder="Tipo">
                                    </div>
                                    <div class="col-6 m-auto mb-3 ">
                                        <input type="text" class="fs-2 form-control" name="fotoproductoañadir" placeholder="Foto">
                                    </div>
                                    <div class="col-6 m-auto mb-3 ">
                                        <input type="text" class="fs-2 form-control" name="precioproductoañadir" placeholder="Precio">
                                    </div>
                                    <div class="col-6 m-auto mb-3 ">
                                        <input type="text" class="fs-2 form-control" name="cantidadproductoañadir" placeholder="Cantidad">
                                    </div>
                                    <div class="col-8 m-auto mb-3">
                                        <div class="input-group">
                                            <span class="fs-2 input-group-text">Descripción</span>
                                            <textarea class="fs-2 form-control" name="descripcionproductoañadir" aria-label="With textarea"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="fs-2 btn btn-secondary mx-3" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="fs-2 btn btn-primary mx-3" name="añadirproducto">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            
            </div>
            <div class="row" style="width:100% ;">
                <div class="col-8 m-auto p-5">
                    <?php if (isset($_POST['terrenoseleccionado']) && isset($_POST['modificarterreno'])) {
                        echo "
                    <div class='col-6 m-auto mb-3 '>
                    <input type='text' class='fs-2 form-control' name='tamañoterrenomodificar' placeholder='Tamaño' value='".$terrenoporid[0]['tamaño']."'>
                    <input type='text' class='fs-2 form-control' name='idterrenomodificar' placeholder='idterreno' value= '".$terrenoporid[0]['Id']."'  hidden>
        
                </div>
                <div class='col-6 m-auto mb-3'>
                    <input type='text' class='fs-2 form-control' name='precioterrenomodificar' placeholder='Precio' value=' ".$terrenoporid[0]['precio']." '>
                </div>
                <div class='col-6 m-auto mb-3 '>
                    <input type='text' class='fs-2 form-control' name='fototerrenomodificar' placeholder='Foto' value='".$terrenoporid[0]['foto']." '>
                </div>
                <div class='col-6 m-auto mb-3 '>
                    <input type='text' class='fs-2 form-control' name='estadoterrenomodificar' placeholder='Estado' value=' ".$terrenoporid[0]['estado']." '>
                </div>
               
                <button type='submit' name='guardarcambiosterreno' class='btn btn-success px-4' style='font-size: 20px;'>
                Guardar cambios
            </button>
                    
                    ";
                    } else {
                        echo "
                    <table class='table table-success table-striped '>
                    <thead>
                        <tr>

                            <th scope='col'>Id</th> 
                            <th scope='col'>Tamaño</th>                           
                            <th scope='col'>Precio</th>
                            <th scope='col'>Estado</th>
                            <th scope='col'>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>

                    ";
                        for ($i = 0; $i < count($listaterrenos); $i++) {

                            echo "  <tr>
                     
                        <td>" . $listaterrenos[$i]["Id"] . "</td>
                        <td>" . $listaterrenos[$i]["tamaño"] . "</td>
                        <td>" . $listaterrenos[$i]["precio"] . "</td>
                        <td>" . $listaterrenos[$i]["estado"] . "</td>
                        
                        <td> <input type='radio' name='terrenoseleccionado' value='" . $listaterrenos[$i]["Id"] . "'></td>
                    </tr>";
                        }
                        echo "
                            </tbody>
                            </table>";
                    }


                    ?>


                </div>
            </div>
            

            <div class="row" style="width:100% ;">

                <div class="col-6 p-5 m-auto d-flex justify-content-around">

                    <button type="submit" class="btn btn-success px-4" name="modificarterreno" style="font-size: 20px;">Modificar</button>
                    <!-- Button trigger modal -->

                    <button type="button" class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#terrenoModal" style="font-size: 20px;">
                        Añadir
                    </button>
                    <button type="submit" name="borrarterreno" class="btn btn-success px-4" style="font-size: 20px;">
                        Borrar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="terrenoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " style="max-width: 1200px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Añadir terreno</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="col-6 m-auto mb-3 ">
                                        <input type="number" class="fs-2 form-control" name="tamañoterrenoañadir" placeholder="Tamaño">

                                    </div>
                                    <div class="col-6 m-auto mb-3">
                                        <input type="text" class="fs-2 form-control" name="precioterrenoañadir" placeholder="Precio">
                                    </div>
                                    <div class="col-6 m-auto mb-3 ">
                                        <input type="text" class="fs-2 form-control" name="fototerrenoañadir" placeholder="Foto">
                                    </div>
                                    <div class="col-6 m-auto mb-3 ">
                                        <input type="text" class="fs-2 form-control" name="estadoterrenoañadir" placeholder="Estado">
                                    </div>
                                   
                                    
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="fs-2 btn btn-secondary mx-3" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="fs-2 btn btn-primary mx-3" name="añadirterreno">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            
            </div>
    </form>







</body>
<!-- Separate Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<!--Jquery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</html>