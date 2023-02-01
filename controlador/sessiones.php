<?php
  
class UserSession{

    public function __construct(){
        session_set_cookie_params(60*60*24*14);
        session_start();
    }

    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}


/*
class Session{

    private $session = NULL;
    
    public function __construct($session_name){

        session_set_cookie_params(60*60*24*14);
        session_start();

        if(!isset($_SESSION[$session_name])){
            $_SESSION[$session_name] = NULL;
            //echo "Sesión $session_name creada";
        }
        //echo "Sesión $session_name ya existe";
        
        $this->session = $session_name;
    }

    public function setValue($value){
        $_SESSION[$this->session] = $value;
    }

    public function getValue(){
        return $_SESSION[$this->session];
    }
}
*/
?>