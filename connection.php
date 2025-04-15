<?php

$connection= new mysqli("localhost","root","","proyecto");
if($connection->connect_error){
    die("Error de conexión: ".$connection->connect_error);
}
$connection->set_charset("utf8");

?>