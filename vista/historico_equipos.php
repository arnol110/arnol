<? 
include_once '../controlador/sessiones.php'; 
include "../controlador/util.php";
include_once '../controlador/public_class.php';

$session_uso = new UserSession();
$public_class = new abiertaPublic();
$util = new Util();
$urlBase = $util->urlBase();


if (!isset($_SESSION['control']) ||$_SESSION['control'] == false) {
  header('Location: /entrar/');
}

$tipo_equipo = "";
$dependencia_equipo ="";
if (isset($_REQUEST['tipo_equipo']) ||$_REQUEST['tipo_equipo'] != "") {
  $tipo_equipo = $_REQUEST['tipo_equipo'];
}

if (isset($_REQUEST['dependencia_equipo']) ||$_REQUEST['dependencia_equipo'] != "") {
  $dependencia_equipo = $_REQUEST['dependencia_equipo'];
}


$permiso_rol = $_SESSION['rol_usuario'];

$traer_equipos = $public_class->traer_equipos($tipo_equipo,$dependencia_equipo);
json_encode($traer_equipos);


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
  <title>Almacen El Bosque</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<? echo $urlBase; ?>/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<? echo $urlBase; ?>/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <header>
    <? include_once './nav_admin.php';?>
  </header>
  <div style="display: inline-block;width: 100%;text-align: center;">

    <div style="width: 90%;display: inline-block;">
      <h4>Almacen de Equipos</h4>
      <br>
      <div class="card-panel" style="text-align: center;">
        <h5>Filtros</h5>
        <div class="input_control input_bosque" >
          <select id="filtro_tipo_equipo" name="filtro_tipo_equipo" class="browser-default" >
            <option value="0" >Todos</option>
            <?

            foreach($traer_tipo as $contenidoCmb){
              $selected  = "";
              if ($contenidoCmb["id_tipo"]==$tipo_equipo) {
               $selected  = "selected";
             } 
             ?>
             <option <?=$selected;?> id="tipo_equipo_" value="<? echo $contenidoCmb["id_tipo"]; ?>"><? echo $contenidoCmb["nombre_tipo"]; ?>
           </option>
           <?
         }
         ?>

       </select>
     </div>
     <div class="input_control input_bosque">
      <select id="filtro_dependencia" name="filtro_dependencia" class="browser-default" >
        <option value="0"   >Todos</option>
        <?
        foreach($cargar_dependencia as $contenidoCmb){
          $selected  = "";
          if ($contenidoCmb["id_dependencia"]==$dependencia_equipo) {
           $selected  = "selected";
         } 
         ?>
         <option <?=$selected;?> 
         id="tipo_equipo_" 
         value="<? echo $contenidoCmb["id_dependencia"]; ?>">
         <? echo $contenidoCmb["nombre_dependencia"]; ?>
       </option>
       <?
     }
     ?>

   </select>
 </div>
 <br><br>
 <div>
  <a onclick="aplicar_filtro();" class="waves-effect waves-light btn-large"><i class="material-icons left">search</i>Buscar</a>

</div>
</div>
<div class="card-panel">
  <table>
    <thead>
      <tr>
        <th>ID Producto</th>
        <th>Nombre</th>
        <th>Referencia</th>
        <th>Tipo Producto</th>
        <th>Dependencia</th>
        <?
          if ($permiso_rol == 1) {
            ?>
        <th style="text-align: center;">Acción</th>
        <?
           }
            ?>
      </tr>
    </thead>
    <?

    ?>
    <tbody>
      <?
      foreach($traer_equipos as $contenido_equipo){ 

        $id_equipo = $contenido_equipo["id_equipo"];
        ?>
        <tr id="columna_equipo_<?=$id_equipo;?>">
          <?
          if ($permiso_rol == 1) {
            ?>
            <td><? echo $contenido_equipo["id_equipo"]; ?></td>
            <td>
              <input type="text" id="nombre_equipo_<?=$id_equipo;?>" name="nombre_equipo_<?=$id_equipo;?>" value="<? echo $contenido_equipo["nombre_equipo"]; ?>">
            </td>
            <td>
              <input type="text" id="referencia_equipo_<?=$id_equipo;?>" name="referencia_equipo_<?=$id_equipo;?>" value="<? echo $contenido_equipo["referencia_equipo"]; ?>">
            </td>
            <td>
              <div class="input_control">
                <select id="tipo_producto_equipo_<?=$id_equipo;?>" name="tipo_producto_equipo_<?=$id_equipo;?>" class="browser-default" >
                  <option value="0" disabled="" selected="">Tipo producto</option>
                  <?
                  foreach($traer_tipo as $contenidoCmb){
                    $selected  = "";
                    if ($contenidoCmb["id_tipo"]==$contenido_equipo["tipo_equipo"]) {
                     $selected  = "selected";
                   } 
                   ?>
                   <option <?=$selected;?> id="tipo_equipo_" value="<? echo $contenidoCmb["id_tipo"]; ?>"><? echo $contenidoCmb["nombre_tipo"]; ?>
                 </option>
                 <?
               }
               ?>

             </select>
           </div>
         </td>
         <td>

          <div class="input_control">
            <select id="dependencia_producto_equipo_<?=$id_equipo;?>" name="dependencia_producto_equipo_<?=$id_equipo;?>" class="browser-default" >
              <option value="0" disabled="" selected="">Dependencia</option>

              <?
              foreach($cargar_dependencia as $contenidoCmb){
                $selected  = "";
                if ($contenidoCmb["id_dependencia"]==$contenido_equipo["dependencia_equipo"]) {
                 $selected  = "selected";
               } 
               ?>
               <option <?=$selected;?> 
               id="tipo_equipo_" 
               value="<? echo $contenidoCmb["id_dependencia"]; ?>">
               <? echo $contenidoCmb["nombre_dependencia"]; ?>
             </option>
             <?
           }
           ?>

         </select>
       </div>
     </td>
     <td style="text-align: center;">
    <i class="material-icons" style="color: #5089b9;" onclick="actualizar_equipo(<?=$id_equipo?>);">cached</i> 
    <i class="material-icons" style="color: red;" onclick="eliminar_equipo(<?=$id_equipo?>)">delete_forever</i>
  </td>
     <?
   }elseif ($permiso_rol == 2) {
    ?>
    <td><? echo $id_equipo; ?></td>
    <td><? echo $contenido_equipo["nombre_equipo"]; ?></td>
    <td><? echo $contenido_equipo["referencia_equipo"]; ?></td>
    <td><? echo $contenido_equipo["tipo_equipo"]; ?></td>
    <td><? echo $contenido_equipo["dependencia_equipo"]; ?></td>

    <?
  }
  ?>
  
</tr>
<?
}
?>
</tbody>
</table>
</div>
</div>
</div>

<? include_once '../../vista/footer.php';?>
</body>
<script src="<? echo $urlBase; ?>/js/jquery3-4-1.min.js"></script>
<script src="<? echo $urlBase; ?>/js/jquery.validate.js"></script>
<script src="<? echo $urlBase; ?>/js/sweetalert.min.js"></script>
<script src="<? echo $urlBase; ?>/js/materialize.js"></script>
<script src="<? echo $urlBase; ?>/js/util.js"></script>
<script src="<? echo $urlBase; ?>/js/init.js"></script>
<script src="<? echo $urlBase; ?>/js/control.js"></script>



</html>
