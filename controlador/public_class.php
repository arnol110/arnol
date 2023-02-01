<?php 

include_once 'sessiones.php';
include_once 'util.php';
include_once 'DBManejador.php';
date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d H:i:s");



class abiertaPublic
{  
    public static function registrar_usuario($nombre_usuario,$usuario_usuario,$contra_usuario,$rol_usuario){


        if ($nombre_usuario == "" ||
            $usuario_usuario == "" ||
            $contra_usuario == "" ||
            $rol_usuario == "") {

            echo json_encode("falta");
            exit();
        }

        $conn = new DBManejador(1);
        if (is_array($conn->error)) {
        echo $conn->error[2];
        exit();
        }

        $tabla    = "usuario";
        $columnas  = "nombre_usuario,user_usuario,contrasena,rol_usuario,estado";
        $campos    = ":nombre_usuario,:user_usuario,:contrasena,:rol_usuario,:estado";

        $valores   = array(":nombre_usuario" => $nombre_usuario,
        ":user_usuario" =>$usuario_usuario,
        ":contrasena" =>$contra_usuario,
        ":rol_usuario" =>$rol_usuario,
        ":estado" => 0);

        $rs = $conn->agregar($tabla, $columnas, $campos, $valores);
      
            if ($rs == true) {
                $rs = "correcto";
            }else{
                $rs = "error";
            }


        return $rs;
        
        $conn->cerrarConexion();
       
    }

    public static function cargar_roles(){
     
        $conn = new DBManejador(1);
        if (is_array($conn->error)) {
        echo $conn->error[2];
        exit();
        }

        $tabla    = "rol";
        $columnas  = "id_rol,nombre_rol";
        $condicion = "estado_rol=:estado_rol";
        $valores   = array(":estado_rol" => '0');
        $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
        if (is_array($conn->error)){
          //  
          echo $conn->error[2];
           $conn->cerrarConexion();
           return;
        }
        return $rs;
        
        $conn->cerrarConexion();
    } 
    public static function cargar_dependencia($id_dependencia){
     
        $filtros = "";
        if ($id_dependencia != "0") {
            $filtros = " AND id_dependencia='".$id_dependencia."'";
        }

        $conn = new DBManejador(1);
        if (is_array($conn->error)) {
        echo $conn->error[2];
        exit();
        }

        $tabla    = "dependencia";
        $columnas  = "id_dependencia,nombre_dependencia";
        $condicion = "estado_dependencia=:estado_dependencia ".$filtros;
        $valores   = array(":estado_dependencia" => '0');
        $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
        if (is_array($conn->error)){
          //  
          echo $conn->error[2];
           $conn->cerrarConexion();
           return;
        }
        return $rs;
        
        $conn->cerrarConexion();
    }
    public static function traer_tipo($id_tipo){
     
        $filtros = "";
        if ($id_tipo != "0") {
            $filtros = " AND id_tipo='".$id_tipo."'";
        }

        $conn = new DBManejador(1);
        if (is_array($conn->error)) {
        echo $conn->error[2];
        exit();
        }

        $tabla    = "tipo_producto";
        $columnas  = "id_tipo,nombre_tipo";
        $condicion = "estado_tipo=:estado_tipo ".$filtros;
        $valores   = array(":estado_tipo" => '0');
        $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
        if (is_array($conn->error)){
          //  
          echo $conn->error[2];
           $conn->cerrarConexion();
           return;
        }
        return $rs;
        
        $conn->cerrarConexion();
    }
    public static function traer_equipos($tipo,$dependencia){
        $filtros = "";
        if ($tipo != "0") {
            $filtros .= " AND tipo_equipo='".$tipo."'";
        }
        if ($dependencia != "0") {
            $filtros .= " AND dependencia_equipo='".$dependencia."'";
        }
    
        $conn = new DBManejador(1);
        if (is_array($conn->error)) {
        echo $conn->error[2];
        exit();
        }
        
        $tabla    = "equipo";
        $columnas  = "id_equipo,nombre_equipo,referencia_equipo,tipo_equipo,dependencia_equipo";
        $condicion = "estado_equipo=:estado_equipo ".$filtros;
        $valores   = array(":estado_equipo" => 0);
        $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
        if (is_array($conn->error)){
          //  
          echo $conn->error[2];
           $conn->cerrarConexion();
           return;
        }
        return $rs;
        
        $conn->cerrarConexion();
    }

    public static function entrar_ordenar($user_entrar,$contrasena_entrar){
        $session_uso = new UserSession();

        if ($user_entrar == "" || $contrasena_entrar == "") {
            echo json_encode("falta"); 
            exit(); 
        }

        $conn = new DBManejador(1);
        if (is_array($conn->error)) {
        echo $conn->error[2];
        exit();
        }

        $tabla    = "usuario";
        $columnas  = "id_usuario,nombre_usuario,rol_usuario";
        $condicion = "user_usuario =:usuario AND contrasena=:contrasena AND estado = 0";
        $valores   = array(":usuario" => $user_entrar,":contrasena" => $contrasena_entrar);
        $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
        if (is_array($conn->error)){
          echo $conn->error[2];
           $conn->cerrarConexion();
           return;
        }
        if(isset($rs[0]["id_usuario"])){
            $_SESSION['control'] = true;

            $_SESSION['id_usuario'] = $rs[0]["id_usuario"];
            $_SESSION['nombre_usuario'] = $rs[0]["nombre_usuario"];
            $_SESSION['rol_usuario'] = $rs[0]["rol_usuario"];

            $rs = "si";
        }else{
            $rs = "no";
        }                                                         
        return $rs;
        
        $conn->cerrarConexion();
    }
    


}