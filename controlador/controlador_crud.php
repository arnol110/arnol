<?php
include_once 'sessiones.php'; 
$session_uso = new UserSession();
date_default_timezone_set(date_default_timezone_get());
ini_set("display_errors", '1');

include_once 'DBManejador.php';
include_once 'util.php';
include_once 'public_class.php';
include_once 'class_crud.php';

    
if (!isset($_SESSION['control']) || $_SESSION['control'] == false) {
    echo json_encode("no login");
    exit();
}


$util = new Util();
$basic = new abiertaPublic();
$class_crud = new class_crud();
$opcion = "";
if( isset($_POST['v0'])) $opcion  = $_POST['v0'];

switch ($opcion) {
    case 99:actualizar_equipo();break;
    case 100:eliminar_equipo();break;
    case 101:agregar_equipo();break;
}
function agregar_equipo() {
    global $class_crud;
    
    $nombre_equipo = "";
    $referencia_equipo = "";
    $tipo_equipo = "";
    $dependencia_equipo = "";

    if( isset($_POST["nombre_equipo"])) $nombre_equipo = $_POST["nombre_equipo"];
    if( isset($_POST["referencia_equipo"])) $referencia_equipo = $_POST["referencia_equipo"];
    if( isset($_POST["tipo_equipo"])) $tipo_equipo = $_POST["tipo_equipo"];
    if( isset($_POST["dependencia_equipo"])) $dependencia_equipo = $_POST["dependencia_equipo"];


    $rs = $class_crud->agregar_equipo($nombre_equipo,$referencia_equipo,$tipo_equipo,$dependencia_equipo);
    
    echo json_encode($rs);
    exit();
}
function eliminar_equipo() {
    global $class_crud;
    
    $id_equipo="";
    if( isset($_POST["id_equipo"])) $id_equipo = $_POST["id_equipo"];
    $rs = $class_crud->eliminar_equipo($id_equipo);
    
    echo json_encode($rs);
    exit();
}
function actualizar_equipo() {
    global $class_crud;
    
    $id_equipo="";
    $nombre_equipo="";
    $referencia_equipo="";
    $tipo_equipo ="";
    $dependencia_equipo ="";
    

    if( isset($_POST["id_equipo"])) $id_equipo = $_POST["id_equipo"];
    if( isset($_POST["nombre_equipo"])) $nombre_equipo = $_POST["nombre_equipo"];
    if( isset($_POST["referencia_equipo"])) $referencia_equipo = $_POST["referencia_equipo"];
    if( isset($_POST["tipo_equipo"])) $tipo_equipo = $_POST["tipo_equipo"];
    if( isset($_POST["dependencia_equipo"])) $dependencia_equipo = $_POST["dependencia_equipo"];

    $rs = $class_crud->actualizar_equipo($id_equipo,$nombre_equipo,$referencia_equipo,$tipo_equipo,$dependencia_equipo);
    
    echo json_encode($rs);
    exit();
}
function cambiar_contrasena() {
    global $class_crud;
    $contrasena_actual = "";
    $contrasena_nueva = "";


    if( isset($_POST['contrasena_actual'])) $contrasena_actual = $_POST['contrasena_actual'];
    if( isset($_POST["contrasena_nueva"])) $contrasena_nueva = $_POST["contrasena_nueva"];

    $rs = $class_crud->cambiar_contrasena($contrasena_actual,$contrasena_nueva);
    
    echo json_encode($rs);
    exit();
}



