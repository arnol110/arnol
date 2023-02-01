<? 
include_once '../../controlador/sessiones.php'; 
include "../../controlador/util.php";
include_once '../../controlador/public_class.php';

$session_uso = new UserSession();
$public_class = new abiertaPublic();
$util = new Util();
$urlBase = $util->urlBase();


if (!isset($_SESSION['control']) ||$_SESSION['control'] == false) {
  header('Location: /entrar/');
}
$traer_tipo = $public_class->traer_tipo('0');
json_encode($tipo_equipo);
$cargar_dependencia = $public_class->cargar_dependencia('0');
json_encode($cargar_dependencia);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Panel - Almacen UnBosque</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<? echo $urlBase; ?>/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<? echo $urlBase; ?>/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <header>
      <? include_once '../nav_admin.php';?>
    </header>
    <div style="display: inline-block;width: 100%;text-align: center;">
      <section id="vista_opciones" class="card-panel panel_control_final">
        <div class="seccion_control_style">
        <p>Equipos Almacenados</p>
        <div id="btn_ver_frm_agregar_equipo" class="waves-effect waves-light btn-large btn_control">
            <a>
              <i class="material-icons right">add</i>Agregar Equipo
            </a>
          </div>
        <div id="ver_equipos" class="waves-effect waves-light btn-large btn_control">
            <a href="/historico_equipos/0/0/" target="_blank">
              <i class="material-icons right">add</i>Ver Equipos
            </a>
          </div>
        </div>
      </section>
      <br>
      <section id="vista_opciones_abajo" class="card-panel panel_control_final">
        <div id="btn_salir_control" style="display: inline-block;padding: 10px;float: right;">
          <a href="/control/salir/" style="background-color: #ff0000bf;"  class="waves-effect waves-light btn"><i class="material-icons left">close</i>Salir</a>
        </div>
        <br>
      </section>
      <div style="width: 100%;">
        <div style="    background: #c7c7c7b0; display: none;" id="volver_a_menu" class="card-panel panel_control_final contenedor_opciones">
          <a  class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Volver</a>
        </div>
      </div>

      <section style="display: none;" id="vista_agregar_opciones" class="card-panel panel_control_final contenedor_opciones">
        <div style="display: none;" id="div_frm_equipo">
          <h3>Agregar Equipo</h3>
          <br>
          <form id="frm_agregar_equipo" name="frm_agregar_equipo">        
            <div class="input_control doble">
              <p>Nombre</p>
              <input type="text" id="nombre_equipo" name="nombre_equipo">
            </div>
            <div class="input_control doble">
              <p>Referencia</p>
              <input type="text" id="referencia_equipo" name="referencia_equipo" step="100">
            </div>
            <div class="input_control doble">
              <p>Tipo Equipo</p>
              <select class="browser-default" id="tipo_equipo" name="tipo_equipo">
                <?

            foreach($traer_tipo as $contenidoCmb){
             ?>
             <option <?=$selected;?> id="tipo_equipo_" value="<? echo $contenidoCmb["id_tipo"]; ?>"><? echo $contenidoCmb["nombre_tipo"]; ?>
           </option>
           <?
         }
         ?>
              </select>
            </div>
            <div class="input_control doble">
              <p>Dependencia Equipo</p>
              <select class="browser-default" id="dependencia_equipo" name="dependencia_equipo">
                <?

            foreach($cargar_dependencia as $contenidoCmb){ 
             ?>
             <option id="tipo_equipo_" value="<? echo $contenidoCmb["id_dependencia"]; ?>"><? echo $contenidoCmb["nombre_dependencia"]; ?>
           </option>
           <?
         }
         ?>
              </select>
            </div>
            <div style="text-align: center;">
              <a id="btn_agregar_equipo" class="waves-effect waves-light btn">Agregar Equipo</a>
            </div>
          </form> 
          <div id="msg_div_agregar_producto" ></div>
        </div>
      </section>
    </div>
 
    <? include_once '../../vista/footer.php';?>
  </body>
  <script src="<? echo $urlBase; ?>/js/jquery3-4-1.min.js"></script>
  <script src="<? echo $urlBase; ?>/js/jquery.validate.js"></script>
  <script src="<? echo $urlBase; ?>/js/sweetalert.min.js"></script>
  <script src="<? echo $urlBase; ?>/js/materialize.js"></script>
  <script src="<? echo $urlBase; ?>/js/util.js"></script>
  <script src="<? echo $urlBase; ?>/js/control.js"></script>

           

</html>
