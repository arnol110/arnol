function obtenerNumerosString(string) {
  var tmp = string.split("");
  var map = tmp.map(function(current) {
    if (!isNaN(parseInt(current))) {
      return current;
    }
  });

  var numbers = map.filter(function(value) {
    return value != undefined;
  });

  return numbers.join("");
}
var sonido = new Audio();
  sonido.src="/sonido";


function URLactual2() {
     var protocolo = window.location.protocol;
    var  host = window.location.host;
      carpetaRaiz = "/";
 
   var url = protocolo + "//" + host + carpetaRaiz;
    return url;
}
function URLactual() {
    var protocolo = window.location.protocol;
	var  host = window.location;

   var url =  host/*+ carpetaRaiz*/;
    return url;
}

function deshabilitaRetroceso() {
    window.location.hash = "no-back-button";
    window.location.hash = "Again-No-back-button" //chrome
    window.onhashchange = function () {
        window.location.hash = "no-back-button";
    };
}

var table;
function esJson(json) {
    var r = false;
    try {
        JSON.parse(json);
        r = true;
    } catch (e) {
        r = false;
    }
    return r;
}

function dlgAlert(pos,nombre, error, cerrar) {
    if ($("#alert_box").length > 0) {
        return;
    }
    var titulo = "";
    var msg = [];
    msg[1] = {tipo: "success", mensaje: "Equipo Actualizado Correctamente."};
    msg[2] = {tipo: "info", mensaje: "No pueden existir campos vacíos."};
    msg[3] = {tipo: "success", mensaje: "Has eliminado el equipo correctamente."};
    msg[4] = {tipo: "success", mensaje: "Has Agregado un Equipo Correctamente."};
    msg[5] = {tipo: "success", mensaje: "Has Agregado un usuario Correctamente."};
    
    msg[99] = {tipo: "error", mensaje: "Ha ocurrido un error, por favor intentelo mas tarde!."};
    switch (msg[pos].tipo) {
        case "success":
            titulo = "Correcto!";
            break;
        case "info":
            titulo = "Aviso!";
            break;
        case "warning":
            titulo = "Advertencia!";
            break;
        case "error":
            titulo = "Error!";
            break;
    }
    swal(titulo, msg[pos].mensaje, msg[pos].tipo).then((value) => {
        if (typeof cerrar == "function") {
            cerrar();
        }
    });
}

function validar_email( email ) 
{
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}

function validar_solo_numero( input ) 
{
    var regex = /^[0-9]{5,15}$/;
    return regex.test(input) ? true : false;
}

function validar_solo_texto( input ) 
{
    var regex = /^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/;
    return regex.test(input) ? true : false;
}



function dlgConfirm(msg, respuesta) {
    if ($("#alert_box").length > 0) {
        return;
    }
    swal({
        title: "¿Estas seguro?",
        text: msg,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        //respuesta(willDelete);
        console.log(respuesta(willDelete));
    });
}

function dlgCargando(str) {
    if (str == "close") {
        $("#dlgCargando").remove();
        return;
    }
    if ($("#dlgCargando").length > 0) {
        return;
    }
    $("body").after(
            '<div id="dlgCargando" style="width:  100%;height:  100%;position:  fixed;z-index: 10000;top:  0;background: rgba(1,1,1,0.3);">' +
            '                       <div class="preloader-wrapper big active center" style="position: absolute; right: 46%; left: 46%; top: 35%; z-index: 10001;">' +
            '                           <div class="spinner-layer spinner-green-only">' +
            '                               <div class="circle-clipper left">' +
            '                                   <div class="circle"></div>' +
            '                               </div>' +
            '                  <div class="gap-patch">' +
            '                     <div class="circle"></div>' +
            '                 </div>' +
            '                   <div class="circle-clipper right">' +
            '                <div class="circle"></div>' +
            '            </div>' +
            '        </div>' +
            '    </div>' +
            '</div>'
            );
}


function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}


//Metodo para hacer peticiones ajax
function peticion(url, parametros, type, dataType, success, error, async) {
    dlgCargando("show");
    setTimeout(function(){
    if (typeof async === "undefined") {
        async = true;
    }
    $.ajax({
        url: url,
        type: type,
        contentType: false,
        dataType: dataType,
        data: parametros,
        async: async,
        global: true,
        ifModified: false,
        processData: false,
        cache: false,
        //beforeSend: function (objeto) {
        
        //},
        //complete: function (objeto, exito) {
        //    dlgCargando("close"); 
            //$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
        //},
        success: function (datos) {
            success(datos);
            dlgCargando("close");
        },
        error: function (objeto, quepaso, otroobj) {
            error(objeto, quepaso, otroobj);
        },
    });
    }, 150);
}

function sizeIconos(obj) {
    var file = obj.files[0];
    if (file) {
        var fileSize = file.size;
        fileSize = (Math.round(file.size / 1024)).toString();
        return fileSize;
    }
    return 0;
}

function setCssTextStyle(el, style, value) {
  var result = el.style.cssText.match(new RegExp("(?:[;\\s]|^)(" +
      style.replace("-", "\\-") + "\\s*:(.*?)(;|$))")),
    idx;
  if (result) {
    idx = result.index + result[0].indexOf(result[1]);
    el.style.cssText = el.style.cssText.substring(0, idx) +
      style + ": " + value + ";" +
      el.style.cssText.substring(idx + result[1].length);
  } else {
    el.style.cssText += " " + style + ": " + value + ";";
  }
}

function soloNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "0123456789";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }


