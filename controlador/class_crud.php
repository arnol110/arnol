<?php 

include_once 'sessiones.php';
include_once 'util.php';
include_once 'DBManejador.php';
date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d H:i:s");
$util = new Util();


class class_crud
{       

    public function __construct(){
        if (!isset($_SESSION['control']) || $_SESSION['control'] == false) {
          echo json_encode("no loginX1");
          exit();
        }
    } 

    
    public static function agregar_equipo($nombre_equipo,$referencia_equipo,$tipo_equipo,$dependencia_equipo){

        if ($nombre_equipo == "" ||
            $referencia_equipo == "" ||
            $tipo_equipo == "" ||
            $dependencia_equipo == "") {
            echo json_encode("falta");
            exit();
        }


        $conn = new DBManejador(1);
        if (is_array($conn->error)) {
        echo $conn->error[2];
        exit();
        }

        $tabla    = "equipo";
        $columnas  = "nombre_equipo,referencia_equipo,tipo_equipo,dependencia_equipo,estado_equipo";
        $campos    = ":nombre_equipo,:referencia_equipo,:tipo_equipo,:dependencia_equipo,:estado_equipo";

        $valores   = array(":nombre_equipo" => $nombre_equipo,
        ":referencia_equipo" =>$referencia_equipo,
        ":tipo_equipo" =>$tipo_equipo,
        ":dependencia_equipo" =>$dependencia_equipo,
        ":estado_equipo" => 0);

        $rs = $conn->agregar($tabla, $columnas, $campos, $valores);
      
            if ($rs == true) {
                $rs = "correcto";
            }else{
                $rs = "error";
            }


        return $rs;
        
        $conn->cerrarConexion();
       
    }


    public static function eliminar_equipo($id_equipo){

        if ($id_equipo == "") {
            echo json_encode("falta");
            exit();
        }
        
        $conn = new DBManejador(1);
        if (is_array($conn->error)) {
        echo $conn->error[2];
        exit();
        }

            $tablas    = "equipo";
            $campos    = "
            estado_equipo=:estado_equipo";
            $condicion = "id_equipo = :id_equipo";
            $valores   = array(
                ":estado_equipo" => 1,
                ":id_equipo" => $id_equipo);
            $rs = $conn->actualizar($tablas, $campos, $valores, $condicion);
        
            if (is_array($conn->error)) {
                echo json_encode($conn->error[2]);
                $conn->cerrarConexion();
                return;
            }
                
            if($rs == true){
                $rs = "correcto";
            }else{
                $rs = "mal";
            }
        
        return $rs;
        $conn->cerrarConexion();
    }

    public static function actualizar_equipo($id_equipo,$nombre_equipo,$referencia_equipo,$tipo_equipo,$dependencia_equipo){

        if ($id_equipo == "") {
            echo json_encode("falta");
            exit();
        }
        if ($nombre_equipo == "") {
            echo json_encode("falta");
            exit();
        }
        if ($referencia_equipo == "") {
            echo json_encode("falta");
            exit();
        }
        if ($tipo_equipo == "") {
            echo json_encode("falta");
            exit();
        }
        if ($dependencia_equipo == "") {
            echo json_encode("dependencia_equipo");
            exit();
        }
        
        $conn = new DBManejador(1);
        if (is_array($conn->error)) {
        echo $conn->error[2];
        exit();
        }

            $tablas    = "equipo";
            $campos    = "
            nombre_equipo=:nombre_equipo,
            referencia_equipo=:referencia_equipo,
            tipo_equipo=:tipo_equipo,
            dependencia_equipo=:dependencia_equipo";
            $condicion = "id_equipo = :id_equipo";
            $valores   = array(
                ":nombre_equipo" => $nombre_equipo,
                ":referencia_equipo" => $referencia_equipo,
                ":tipo_equipo" => $tipo_equipo,
                ":dependencia_equipo" => $dependencia_equipo,
                ":id_equipo" => $id_equipo);
            $rs = $conn->actualizar($tablas, $campos, $valores, $condicion);
        
            if (is_array($conn->error)) {
                echo json_encode($conn->error[2]);
                $conn->cerrarConexion();
                return;
            }
                
            if($rs == true){
                $rs = "correcto";
            }else{
                $rs = "mal";
            }
        
        return $rs;
        $conn->cerrarConexion();
    }


}