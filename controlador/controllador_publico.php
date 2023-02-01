<?php
include_once 'sessiones.php'; 
date_default_timezone_set(date_default_timezone_get());
ini_set("display_errors", '1');


include_once 'DBManejador.php';
include_once 'util.php';
include_once 'public_class.php';


$util = new Util();
$basic = new abiertaPublic();
$opcion = "";
if( isset($_POST['v0'])) $opcion  = $_POST['v0'];

switch ($opcion) {
    case 14:entrar_ordenar();break;
    case 100:registrar_usuario();break;
}
function registrar_usuario() {
    global $basic;
    $nombre_usuario = "";
    $usuario_usuario = "";
    $contra_usuario = "";
    $rol_usuario = "";

    if( isset($_POST["nombre_usuario"])) $nombre_usuario = $_POST["nombre_usuario"];

    if( isset($_POST["usuario_usuario"])) $usuario_usuario = $_POST["usuario_usuario"];

    if( isset($_POST["contra_usuario"])) $contra_usuario = $_POST["contra_usuario"];

    if( isset($_POST["rol_usuario"])) $rol_usuario = $_POST["rol_usuario"];
    
    $rs = $basic->registrar_usuario($nombre_usuario,$usuario_usuario,$contra_usuario,$rol_usuario);
    
    echo json_encode($rs);
    exit();
}
function entrar_ordenar() {
    global $basic;

    $user_entrar = "";
    $contrasena_entrar = "";
    
    if( isset($_POST["user_entrar"])) $user_entrar = $_POST["user_entrar"];
    if( isset($_POST["contrasena_entrar"])) $contrasena_entrar = $_POST["contrasena_entrar"];
   
    $rs = $basic->entrar_ordenar($user_entrar,$contrasena_entrar);
    
    echo json_encode($rs);
    exit();
}


