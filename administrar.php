<?php
require "BD_metodos.php";
session_start();

$listaparcelas = listarparcelas();

echo "<br> <br><br><br>";
print_r($listaparcelas);




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
    <div class="container d-flex flex-column">
        <div class="row" style="width:100% ;">
            <div class="col-8 m-auto p-5">

                <table class="table table-success table-striped ">
                    <thead>
                        <tr>

                            <th scope="col">Id</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Metros</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        for ($i = 0; $i < count($listaparcelas); $i++) {

                            echo "  <tr>
                     
                        <td>" . $listaparcelas[$i]["Id"] . "</td>
                        <td>" . $listaparcelas[$i]["tipo"] . "</td>
                        <td>" . $listaparcelas[$i]["precio"] . "</td>
                        <td>" . $listaparcelas[$i]["metros"] . "</td>
                        <td>" . $listaparcelas[$i]["descripcion"] . "</td>
                        <td> <input type='checkbox' name='" . $listaparcelas[$i]["Id"] . "'></td>
                    </tr>";
                        }


                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <form action="" style="width:100% ;">
            <div class="row" style="width:100% ;">

                <div class="col-6 p-5 m-auto d-flex justify-content-around">
                    <button type="button" class="btn btn-success px-4" style="font-size: 20px;">Borrar</button>
                    <button type="button" class="btn btn-success px-4" style="font-size: 20px;">Modificar</button>
                    <!-- Button trigger modal -->

                    <button type="button" class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#anadirModal" style="font-size: 20px;">
                        Añadir
                    </button>
                    <button type="button" class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#borrarModal" style="font-size: 20px;">
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
                                        <input type="text" class="fs-2 form-control" placeholder="Tipo de huerto">

                                    </div>
                                    <div class="col-6 m-auto mb-3">
                                        <input type="text" class="fs-2 form-control" placeholder="Precio">
                                    </div>
                                    <div class="col-6 m-auto mb-3 ">
                                        <input type="text" class="fs-2 form-control" placeholder="Metros cuadrados">
                                    </div>
                                    <div class="col-8 m-auto mb-3">
                                        <div class="input-group">
                                            <span class="fs-2 input-group-text">Descripción</span>
                                            <textarea class="fs-2 form-control" aria-label="With textarea"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="fs-2 btn btn-secondary mx-3" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="fs-2 btn btn-primary mx-3" name="anadir">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="borrarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " style="max-width: 1200px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="modal-footer">
                                        <button type="button" class="fs-2 btn btn-secondary mx-3" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="fs-2 btn btn-primary mx-3" name="anadir">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </form>
        <div class="row" style="width:100% ;">
            <div class="col-8 m-auto p-5">

                <table class="table table-success table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>







</body>
<!-- Separate Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<!--Jquery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</html>