
let urlBase = URLactual2();

$("#btn_agregar_equipo").on('click', function() {

    
    let urlController = "../../controlador/controlador_crud.php";
    let parametrosAll = new FormData();

    let other_data = $("#frm_agregar_equipo").serializeArray();
    $.each(other_data, function (key, input) {
    parametrosAll.append(input.name,input.value);
    });


    parametrosAll.append("v0", "101");
  
        peticion(urlController, parametrosAll, "POST", "JSON",
        function (result) {

            if (result == "falta") {
               dlgAlert(2);
               }
            
            if (result == "correcto") {
                dlgAlert(5);
                $("#frm_agregar_equipo")[0].reset();
            }
        },
        alert
        , false);

});

$("#btn_registrar_usuario").on('click', function() {

    
    let urlController = "../../controlador/controllador_publico.php";
    let parametrosAll = new FormData();

    let other_data = $("#agregar_usuario").serializeArray();
    $.each(other_data, function (key, input) {
    parametrosAll.append(input.name,input.value);
    });


    parametrosAll.append("v0", "100");
  
        peticion(urlController, parametrosAll, "POST", "JSON",
        function (result) {

            if (result == "falta") {
               dlgAlert(2);
               }
            
            if (result == "correcto") {
                dlgAlert(5);
                $("#agregar_usuario")[0].reset();
            }
        },
        alert
        , false);

});

$("#btn_registrarme_almacen").on('click', function() {

    
    let urlController = "../../controlador/controlador_crud.php";
    let parametrosAll = new FormData();

    let other_data = $("#frm_agregar_equipo").serializeArray();
    $.each(other_data, function (key, input) {
    parametrosAll.append(input.name,input.value);
    });


    parametrosAll.append("v0", "101");
  
        peticion(urlController, parametrosAll, "POST", "JSON",
        function (result) {

            if (result == "falta") {
                let msg = "Debes llenar todos los campos";
                mensajeValidacionUtil("msg_div_agregar_producto",msg,"nombre_producto");
            }
            
            if (result == "correcto") {
                dlgAlert(4);
                $("#msg_div_agregar_equipo").html("");
                $("#frm_agregar_equipo")[0].reset();
            }
        },
        alert
        , false);

});

function eliminar_equipo(id_equipo) {
    let urlController = "../../../controlador/controlador_crud.php";
    let parametrosAll = new FormData();

    if (id_equipo == "") {
      dlgAlert(2);
    throw "exit";
    }

    parametrosAll.append("v0", "100");
    parametrosAll.append("id_equipo", id_equipo);
  
        peticion(urlController, parametrosAll, "POST", "JSON",
        function (result) {

            if (result == "falta") {
               dlgAlert(2);
             }
            
            if (result == "correcto") {
              $("#columna_equipo_"+id_equipo).hide();
              dlgAlert(3);
            }
        },
        alert
        , false);
}
function actualizar_equipo(id_equipo) {
    let urlController = "../../../controlador/controlador_crud.php";
    let parametrosAll = new FormData();

    nombre_equipo = $("#nombre_equipo_"+id_equipo).val();
    referencia_equipo = $("#referencia_equipo_"+id_equipo).val();
    tipo_equipo = $("#tipo_producto_equipo_"+id_equipo).val();
    dependencia_equipo = $("#dependencia_producto_equipo_"+id_equipo).val();
    

    if (nombre_equipo == "" ||
     referencia_equipo== "" ||
     tipo_equipo== "" ||
     dependencia_equipo== ""
     ) {
      dlgAlert(2);
    throw "exit";
    }

    parametrosAll.append("v0", "99");
    parametrosAll.append("id_equipo", id_equipo);
    parametrosAll.append("nombre_equipo", nombre_equipo);
    parametrosAll.append("referencia_equipo", referencia_equipo);
    parametrosAll.append("tipo_equipo", tipo_equipo);
    parametrosAll.append("dependencia_equipo", dependencia_equipo);

  
        peticion(urlController, parametrosAll, "POST", "JSON",
        function (result) {

            if (result == "falta") {
               dlgAlert(2);
             }
            
            if (result == "correcto") {
              dlgAlert(1);
            }
        },
        alert
        , false);
}

function aplicar_filtro(){

  filtro_tipo_equipo = $("#filtro_tipo_equipo").val();
  filtro_dependencia = $("#filtro_dependencia").val();
  
  window.location="/historico_equipos/"+filtro_tipo_equipo+"/"+filtro_dependencia+"/";
}


$( "#ver_equipos" ).on('click', function() {

              window.location="/historico_equipos/0/0/";
          
});




$( "#btn_entrar_ordenar" ).on('click', function() {

    let urlController = "../../controlador/controllador_publico.php";
    let parametrosAll = new FormData();

    let other_data = $("#frm_entrar_control").serializeArray();
    $.each(other_data, function (key, input) {
    parametrosAll.append(input.name,input.value);
    });

    parametrosAll.append("v0", "14");
  
        peticion(urlController, parametrosAll, "POST", "JSON",
        function (result) {

            if (result == "falta") {
                dlgAlert(2);
              }
           
            if (result == "si") {
              window.location="/control/";
            }
        },
        alert
        , false);
});


$("#btn_ver_frm_agregar_equipo").on('click', function() {
  ocultar_vista_y_opciones();
  $("#frm_agregar_equipo")[0].reset();
  $("#vista_agregar_opciones").show();
  $("#div_frm_equipo").show();
  $("#volver_a_menu").show();
});

$("#volver_a_menu").on('click', function() {
  ocultar_vista_y_opciones();
  $("#volver_a_menu").hide();
  $("#vista_opciones").show();
  $("#vista_opciones_abajo").show();
});

function ocultar_vista_y_opciones() {
  $("#vista_opciones_abajo").hide();
  $("#div_frm_agregar_tipo").hide();
  $("#vista_opciones").hide();
  $("#volver_a_menu").hide();
  $("#vista_agregar_opciones").hide();

  
}
  

       