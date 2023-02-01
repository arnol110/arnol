<? 
include_once 'controlador/sessiones.php'; 
$session_uso = new UserSession();
include "controlador/util.php";
include "controlador/public_class.php";

if ($_SESSION['control'] == true) {
  header('Location: /control/');
 }
$abiertaPublic = new abiertaPublic();
$util = new Util();
$urlBase = $util->urlBase(); 

$cargar_roles = $abiertaPublic->cargar_roles('0');
json_encode($cargar_roles);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
  <title>Home - UnBosque</title>

  <!-- CSS  -->
 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <? include_once './vista/nav_admin.php'; //$urlBase. ?>
  <div style="width: 100%; display: inline-block;text-align: center;">
   <div class="card-panel" style="display: inline-block;" style="text-align: center;">
     Ya tengo usuario
     <a href="/control/" class="waves-effect waves-light btn-small"><i class="material-icons right">arrow_forward</i>Ingresar</a>
  
   </div>
   <br>
  <div class="card-panel formulario_login" style="text-align: center;">
    Registrarme
    <form id="agregar_usuario" name="agregar_usuario">
      <div class="input_control doble">
              <p>Nombre</p>
              <input type="text" id="nombre_usuario" name="nombre_usuario">
            </div>
            <div class="input_control doble">
              <p>usuario</p>
              <input type="text" id="usuario_usuario" name="usuario_usuario">
            </div> 
            <div class="input_control doble">
              <p>contraseña</p>
              <input type="text" id="contra_usuario" name="contra_usuario">
            </div> 
            <div class="input_control doble">
      <select id="rol_usuario" name="rol_usuario" class="browser-default" >
        <option value="0"   >Todos</option>
        <?
        foreach($cargar_roles as $contenidoCmb){
         
         ?>
         <option <?=$selected;?> 
         id="tipo_equipo_" 
         value="<? echo $contenidoCmb["id_rol"]; ?>">
         <? echo $contenidoCmb["nombre_rol"]; ?>
       </option>
       <?
     }
     ?>

   </select>
 </div>
    </form>
     <a id="btn_registrar_usuario" class="waves-effect waves-light btn-small"><i class="material-icons right">add</i>Registrarme!</a>
  </div>

  </div>
<? include_once 'vista/footer.php'; //$urlBase. ?>
  </body>
  <script src="./js/jquery3-4-1.min.js"></script>
  <script src="./js/jquery.validate.js"></script>
  <script src="./js/sweetalert.min.js"></script>
  <script src="./js/materialize.js"></script>
  <script src="./js/util.js"></script>
  <script src="./js/control.js"></script>

</html>
