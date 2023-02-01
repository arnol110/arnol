<?php
/*
 *  @Autor: Arnol Stiven Saavedra Diaz
 *  @Objetico: parametros de conexion
 *
 */

// desencryptar = openssl_decrypt($----, COD, KEY, 0, IV);
//encriptat = openssl_encrypt($----,COD,KEY,0,IV);

//FulL

define("KEY",hash('sha256', "unbosque_key"));
define("IV",substr(hash('sha256', "rlfragile"), 0, 16));
define("COD","AES-256-CBC");




