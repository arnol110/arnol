<?php
@session_start();

date_default_timezone_set(date_default_timezone_get());

	$_SESSION['control'] == false;
    unset($_SESSION['control']);
    
    session_destroy();
    session_regenerate_id(true);
    header('Location: /control/');
    exit;

?>