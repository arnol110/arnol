<?php

class Util {

    public function __construct() {
        
    }
    
    public function validarMXEmail($str){
      $result = (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
      
      if ($result){
        list($user, $domain) =  explode('@', $str);
        
        $result = checkdnsrr($domain, 'MX');
      }
     if($result == "1"){
         
            return "1";
    
     }else{
            return "0";
     }
    }

    public function myUrlEncodeA($string) {
        $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
        $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
        return str_replace($entities, $replacements, urlencode($string));
    }


    public function crearcarpeta($destino) {
        $flag = false;
        if (!file_exists($destino)) {
           $flag = mkdir($destino, 0777, true);
        }
        return $flag;
    }

    // $archicvo = yo.gif
    // imgUrls/1/

    


    public function urlActual() {
           if(isset($_SERVER['HTTPS'])){
           $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
       }
       else{
           $protocol = 'http';
       }
        $url= $_SERVER["REQUEST_URI"];
       return $protocol . "://" . $_SERVER['HTTP_HOST'].$url;

    }
    public function urlBase() {
           if(isset($_SERVER['HTTPS'])){
           $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
       }
       else{
           $protocol = 'http';
       }
       return $protocol . "://" . $_SERVER['HTTP_HOST'];

    }
    public function subirArchivo($archivo, $destino,$nombre) {
        if (isset($archivo['name'])) {

            
            //$archivo['name'] = $nombre;
            $tipo = $archivo['type'];
            $img_extencion_save = substr($tipo, 6);
            $tamano = $archivo['size'];
            $tmp = $archivo['tmp_name'];
            $ruta = $destino . $nombre;

            if (!file_exists($destino)) {
                mkdir($destino, 0777, true);
            }
            if (move_uploaded_file($tmp, $ruta)) {
                return "correcto";
            } else {
                //error al consultar
                return "0";
            }
        } else {
            return "0";
        }
    }

    public function eliminarArchivo($dest, $arch) {
        if (file_exists($dest . $arch)) {
            unlink($dest . $arch);
        }
    }
    public function verificarTexto($text){
        $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ\s]+$/";
        if(preg_match($patron_texto,$text)){
            return true;
        }else{
            return false;
        }
    }

}
?>