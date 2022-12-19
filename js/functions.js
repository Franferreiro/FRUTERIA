var carrito = [];

$(document).ready(function () {
  pintarhuertos();
  pintarproductos();
  pintarterrenos();
});
function pintarhuertos() {
  var parametros = {
    pulsado: "traerhuertos",
  };
  $.ajax({
    data: parametros,
    url: "tareas.php",
    type: "post",
    beforeSend: function () {
      console.log("enviando datos");
    },
    success: function (response) {
      var resultado = $.parseJSON(response);
      console.log(resultado);
      for (var i = 0; i < resultado.length; i++) {
        $("#parcelas").append(
          " <div style='background-image: url(../" +
            resultado[i]["imagen"] +
            ");' class='service-item' id='" +
            resultado[i]["Id"] +
            "'> <h2>Huerto de " +
            resultado[i]["tipo"] +
            "</h2><p>" +
            resultado[i]["descripcion"] +
            "</p><button onclick='reservar(" +
            resultado[i]["Id"] +
            "," +
            '"' +
            resultado[i]["tipo"] +
            '"' +
            ")' class='cta'>Reservar</button>  </div>"
        );
      }
    },
  });
}

function pintarproductos() {
  var parametros = {
    pulsado: "traerproductos",
  };
  $.ajax({
    data: parametros,
    url: "tareas.php",
    type: "post",
    beforeSend: function () {
      console.log("enviando datos");
    },
    success: function (response) {
      var resultado = $.parseJSON(response);
      console.log(resultado);
      for (var i = 0; i < resultado.length; i++) {
        if (resultado[i]["cantidad_disponible"] > 20) {
          $(".all-projects").append(
            ' <div class="project-item"> <div class="project-info">  <h1>' +
              resultado[i]["nombre"] +
              "</h1> <p>" +
              resultado[i]["descripcion"] +
              "</p>  <p>Precio: " +
              resultado[i]["precio"] +
              ' €/Kg</p><button name="botoncomprar' +
              resultado[i]["Id"] +
              '" class="cta" onclick="comprar(' +
              resultado[i]["Id"] +
              "," +
              resultado[i]["precio"] +
              "," +
              "'" +
              resultado[i]["nombre"] +
              "'" +
              ')">Comprar</button> </div> <div class="project-img">  <img src="' +
              resultado[i]["foto"] +
              '" alt="img"></div></div>'
          );
        }
      }
    },
  });
}
function comprar(id, precio, nombre) {
  console.log(id, precio, nombre);
  $("#modproductos").show();
  $(".modal-header").append(
    '<h5 style="color:white;font-size:2vh;"class="modal-title" id="exampleModalLabel">' +
      nombre +
      " " +
      precio +
      '€/Kg</h5><input hidden id="productosel" value="' +
      id +
      '">'
  );
}
function cerrarmodal() {
  $("#modproductos").hide();
  $(".modal-header").empty();
  $("#cantidad_producto").val("");
}

function anadircarro() {
  var cantidad = $("#cantidad_producto").val();
  var id = $("#productosel").val();
  if (cantidad > 20 || cantidad < 0 || cantidad == "") {
    Swal.fire({
      position: "center",
      icon: "warning",
      title: "La cantidad debe ser superior a 0 y menor a 20 Kg",
    });
  } else {
    var parametros = {
      pulsado: "consultarproducto",
      id: id,
    };
    $.ajax({
      data: parametros,
      url: "tareas.php",
      type: "post",
      beforeSend: function () {
        console.log("enviando datos");
      },
      success: function (response) {
        var resultado = $.parseJSON(response);
        console.log(resultado);
        var total = cantidad * resultado[0]["precio"];
        var producto = {
          id: resultado[0]["Id"],
          nombre: resultado[0]["nombre"],
          cantidad: cantidad,
          precio: resultado[0]["precio"],
          total: total,
        };
        if (carrito.length == 0) {
          carrito.push(producto);
          cerrarmodal();
          $(".btn-flotante").css("display", "block");
        } else {
          console.log(producto["id"]);

          var index = carrito.findIndex((fruta) => fruta.id == producto["id"]);

          if (index == -1) {
            console.log(index);
            carrito.push(producto);
            cerrarmodal();
          } else {
            nuevacantidad =
              parseInt(carrito[index]["cantidad"]) +
              parseInt(producto["cantidad"]);
            nuevototal = carrito[index]["total"] + producto["total"];
            carrito[index] = {
              id: resultado[0]["Id"],
              nombre: resultado[0]["nombre"],
              cantidad: nuevacantidad,
              precio: resultado[0]["precio"],
              total: nuevototal,
            };

            cerrarmodal();
            $(".btn-flotante").css("display", "block");
          }
        }
      },
    });
  }
}
function levantarcarrito() {
  var tota = 0;
  $("#formcarrito").empty();

  $("#modcompra").show();
  $(".modal-header").append(
    '<h5 style="color:white;font-size:2vh;"class="modal-title" id="exampleModalLabel">Productos en el carro</h5>'
  );
  for (i = 0; i < carrito.length; i++) {
    if (carrito[i] == "") {
    } else {
      tota = tota + carrito[i]["total"];
    }
  }

  for (i = 0; i < carrito.length; i++) {
    if (carrito[i] == "") {
    } else {
      $("#formcarrito").append(
        ' <div class="row" style="margin-bottom:10px;    align-items: center;justify-content: center;" id="prod' +
          carrito[i]["id"] +
          '"><div class="col-md-2"> <label id="' +
          carrito[i]["cantidad"] +
          '" style="margin-top:7px;font-size: 2vh;">' +
          carrito[i]["cantidad"] +
          'Kg</label> </div>   <div class="col-md-4" style="    margin-right: 1vw;">  <label id="' +
          carrito[i]["nombre"] +
          '" style="margin-top:7px;font-size: 2vh;">' +
          carrito[i]["nombre"] +
          "-" +
          carrito[i]["precio"] +
          '€/Kg</label></div>    <div class="col-md-2" style="font-size: 2vh;"> <label id="' +
          carrito[i]["total"] +
          '" style="margin-top:7px;font-size: 2vh;">' +
          carrito[i]["total"].toFixed(2) +
          ' €</label></div>  <div class="col-md-2" style="font-size: 2vh;"> <button style="font-size: 2vh;width: 50%;background-color: #ab7c15;" type="button" id="botonreserva"  onclick="quitarproducto(' +
          carrito[i]["id"] +
          ')">X</button></div><hr></div>'
      );
    }
  }
  $("#formcarrito").append(
    '<div class="row" style="margin-bottom:10px;    align-items: center;justify-content: center;"><div class="col-md-2"></div><div class="col-md-6"><label  style="margin-top:7px;font-size: 2vh;">Total:</label></div><div class="col-md-2"><label id="total" style="margin-top:7px;font-size: 2vh;">' +
      tota.toFixed(2) +
      "€</label></div>"
  );
}
function cerrarcarrito() {
  $("#modcompra").hide();
  $(".modal-header").empty();
}
function quitarproducto(id) {
  $("#prod" + id).remove();
  var index = carrito.findIndex((fruta) => fruta.id == id);
  carrito[index] = "";
  nuevototal = 0;
  for (i = 0; i < carrito.length; i++) {
    if (carrito[i] == "") {
    } else {
      nuevototal += carrito[i]["total"];
    }
  }

  $("#total").text(nuevototal + "€");
}

function reservar(id, tipo) {
  $("#modreservas").show();
  $(".modal-header").append(
    '<h5 style="color:white;font-size:2vh;"class="modal-title" id="exampleModalLabel">Reservar en el Huerto de ' +
      tipo +
      '</h5><input hidden id="parcelasel" value="' +
      id +
      '">'
  );
  $("#fecha_reserva").change(function () {
    $("#horashuerto").empty();

    var parametros = {
      pulsado: "comprobarhoras",
      dia: $("#fecha_reserva").val(),
      id: id,
    };
    $.ajax({
      data: parametros,
      url: "tareas.php",
      type: "post",
      beforeSend: function () {
        console.log("enviando datos");
      },
      success: function (response) {
        var resultado = $.parseJSON(response);
        console.log(resultado);
        for (var i = 18; i < 21; i++) {
          var bandera = false;
          for (j = 0; j < resultado.length; j++) {
            if (resultado[j][0] == i) {
              bandera = true;
            }
          }
          if (bandera == false) {
            $("#horashuerto").append(
              "<option value=" + i + ">" + i + ":00</option>"
            );
          }
        }
        if ($("#horashuerto > option").length == 0) {
          $("#horashuerto").append(
            "<option >No hay horas disponibles este dia</option>"
          );
        }
      },
    });
  });
}
function realizarreserva() {
  fecha = $("#fecha_reserva").val();
  hora = $("#horashuerto :selected").val();

  if (fecha == "" || isNaN(hora) == true) {
    Swal.fire({
      position: "center",
      icon: "warning",
      title: "Debes escoger una fecha y una hora!",
    });
  } else {
    var parametros = {
      pulsado: "traersesion",
    };
    $.ajax({
      data: parametros,
      url: "tareas.php",
      type: "post",
      beforeSend: function () {
        console.log("enviando datos");
      },
      success: function (response) {
        var resultado = $.parseJSON(response);
        if (resultado == "") {
          window.location.href = "login.php";
        } else {
          var idsesion = resultado["id"];

          var parametros = {
            pulsado: "insertarreserva",
            idusuario: idsesion,
            fecha: fecha,
            hora: hora,
            idparcela: $("#parcelasel").val(),
          };
          $.ajax({
            data: parametros,
            url: "tareas.php",
            type: "post",
            beforeSend: function () {
              console.log("enviando datos");
            },
            success: function (response) {
              Swal.fire({
                position: "center",
                icon: "success",
                title: "Reserva realizada",
              }).then(function () {
                location.reload();
              });
            },
          });
        }
      },
    });
  }
}
function realizarcompra() {
  var parametros = {
    pulsado: "traersesion",
  };
  $.ajax({
    data: parametros,
    url: "tareas.php",
    type: "post",
    beforeSend: function () {
      console.log("enviando datos");
    },
    success: function (response) {
      var resultado = $.parseJSON(response);
      if (resultado == "") {
        window.location.href = "login.php";
      } else {
        var idsesion = resultado["id"];

        total = $("#total")
          .text()
          .substring(0, $("#total").text().length - 1);
        console.log(total);
        if (total == 0) {
          Swal.fire({
            position: "center",
            icon: "warning",
            title: "No has seleccionado ningún producto",
          }).then(function () {
            location.reload();
          });
        } else {
          var parametros = {
            pulsado: "realizarcompra",
            idusuario: idsesion,
            total: total,
          };
          $.ajax({
            data: parametros,
            url: "tareas.php",
            type: "post",
            beforeSend: function () {
              console.log("enviando datos");
            },
            success: function (response) {
              var resultado = $.parseJSON(response);
              for (i = 0; i < carrito.length; i++) {
                if (carrito[i] == "") {
                } else {
                  idproducto = carrito[i]["id"];
                  cantidadproducto = carrito[i]["cantidad"];
                  var parametros = {
                    pulsado: "insertarproductopedido",
                    idproducto: idproducto,
                    cantidadproducto: cantidadproducto,
                  };
                  $.ajax({
                    data: parametros,
                    url: "tareas.php",
                    type: "post",
                    beforeSend: function () {
                      console.log("enviando datos");
                    },
                    success: function (response) {
                      var resultado = $.parseJSON(response);
                      Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Compra realizada",
                      }).then(function () {
                        location.reload();
                      });
                    },
                  });
                }
              }
            },
          });
        }
      }
    },
  });
}

function pintarterrenos() {
  var parametros = {
    pulsado: "traerterrenos",
  };
  $.ajax({
    data: parametros,
    url: "tareas.php",
    type: "post",
    beforeSend: function () {
      console.log("enviando datos");
    },
    success: function (response) {
      var resultado = $.parseJSON(response);
      console.log(resultado);
      var grandes = 0;
      var pequeños = 0;
      for (var i = 0; i < resultado.length; i++) {
        if(resultado[i]["estado"]=="libre")
        $("#terrenosalquilables").append(
          " <div style='background-image: url(../" +
            resultado[i]["foto"] +
            ");' class='service-item' id='" +
            resultado[i]["Id"] +
            "'> <h2>Terreno de  " +
            resultado[i]["tamaño"] +
            " metros cuadrados</h2><p>" +
            "Terrenos de "+resultado[i]["tamaño"]+" metros cuadrados por "+resultado[i]["precio"]+" euros al mes" +
            "</p><button onclick='alquilar("+resultado[i]["Id"]+","+resultado[i]["tamaño"]+","+resultado[i]["precio"]+")' "+
           "class='cta'>Alquilar</button>  </div>"
        );
        }
     


      
      }
    })
  }

  function alquilar(id,tamaño,coste){
    precio=0;
    $("#modterrenos").show()
    $(".modal-header").append(
      '<h5 style="color:white;font-size:2vh;"class="modal-title" id="exampleModalLabel">' +
       'Terreno de '+tamaño+' metros cuadrados </h5><input hidden id="terrenosel" value="' +
        id +
        '">'
    );
   
    $("#fecha_final").change(function () {
      if($("#fecha_inicio").val()!=""){
        $("#paraborrar").remove()
        var fecha1 = moment($("#fecha_inicio").val());
        var fecha2 = moment($("#fecha_final").val())
        dias=fecha2.diff(fecha1, 'days');
        meses=dias/30;
     
          console.log($("#tipocultivo :selected").val())
         
         if($("#tipocultivo :selected").val()=="Yo mismo"){
          console.log(coste)
          console.log(meses)
          precio=coste*meses;
          console.log("kk")

         }else{
          console.log("alala")
          precio1=(coste*meses)
          precio2=precio1*(25/100)
          precio=precio1+precio2
         }
        
         
          
          $("#terrenosmod").append(' <div id="paraborrar"class="row" style="margin-bottom:10px;">'+
'<div class="col-md-2">'+
  '<label style="margin-top:7px;font-size: 2vh;">Precio</label>'+
'</div> <div class="col-md-2">'+
'<label id="precioterreno"style="margin-top:7px;font-size: 2vh;">'+precio.toFixed(2)+' €</label>'+
'</div>')

        



      }
    })
    $("#tipocultivo").on('change',function () {
      if($("#fecha_inicio").val()=="" || $("#fecha_final").val()==""){

      }else{
      if($("#tipocultivo :selected").val()=="Yo mismo"){
        precio=coste*meses;
        $("#precioterreno").text(precio.toFixed(2)+"€")
      }else{
        precio1=(coste*meses)
        precio2=precio1*(25/100)
        precio=precio1+precio2
        $("#precioterreno").text(precio.toFixed(2)+"€")
      }
    }

    

    })

  }
  function haceralquiler(){
    var fecha1 = moment($("#fecha_inicio").val());
    var fecha2 = moment($("#fecha_final").val())
    dias=fecha2.diff(fecha1, 'days');
    meses=dias/30;

console.log(fecha2.diff(fecha1, 'days'), ' dias de diferencia');
if( $("#precioterreno").text()==""){
  Swal.fire({
    position: "center",
    icon: "warning",
    title: "Debes escoger la fecha de inicio y de fin",
  })

}else if(meses<1){
  Swal.fire({
    position: "center",
    icon: "warning",
    title: "Debes escoger un período mínimo de alquiler de un mes",
  })

}else{
  var parametros = {
    pulsado: "traersesion",
  };
  $.ajax({
    data: parametros,
    url: "tareas.php",
    type: "post",
    beforeSend: function () {
      console.log("enviando datos");
    },
    success: function (response) {
      var resultado = $.parseJSON(response);
      if (resultado == "") {
        window.location.href = "login.php";
      } else {
        var parametros = {
          pulsado: "realizaralquiler",
          id:$("#terrenosel").val(),
          idusuario:resultado["id"],
        fechainicio:$("#fecha_inicio").val(),
        fechafinal:$("#fecha_final").val(),

      
        };
        $.ajax({
          data: parametros,
          url: "tareas.php",
          type: "post",
          beforeSend: function () {
            console.log("enviando datos");
          },
          success: function (response) {
            var resultado = $.parseJSON(response);
            Swal.fire({
              position: "center",
              icon: "success",
              title: "Terreno alquilado",
            }).then(function () {
              location.reload();
            });
          }})

      }}})
  
  

}

  }