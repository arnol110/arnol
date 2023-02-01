<? 
include_once '../../controlador/sessiones.php'; 
include "../../controlador/util.php";
include_once '../../controlador/public_class.php';

$session_uso = new UserSession();
$public_class = new abiertaPublic();
$util = new Util();
$urlBase = $util->urlBase();

if (isset($_SESSION['control']) ||$_SESSION['control'] == true) {
  header('Location: /control/');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Login - Almacen Unbosque</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<? echo $urlBase; ?>/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<? echo $urlBase; ?>/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <header>
      <? include_once '../../vista/nav_admin.php';?>
    </header>
      <section style="width: 100%;
      display: inline-block;
      text-align: center;">
        <div class="card-panel" style="    width: 300px;
        display: inline-block;">
          <h2 class="nombre_dona_crea">Entrar</h2>
          <form id="frm_entrar_control">
          <div class="input_control">
            <p>Usuario</p>
            <input type="text" id="user_entrar" name="user_entrar">
          </div>
          <div class="input_control">
            <p>Contraseña</p>
            <input type="password" id="contrasena_entrar" name="contrasena_entrar">
          </div>
          <br>
          <div id="msg_div_entrar_ordenar"></div>
          <div style="text-align: center;">
              <a id="btn_entrar_ordenar" class="waves-effect waves-light btn">Entrar</a>
          </div>
          </form>
        </div>
        
      </section>
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
