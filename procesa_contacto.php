<?php
require_once("class/class.php");
//print_r($_POST);
$tra=new Contacto();
$tra->agregar_contacto($_POST["nombre"],$_POST["correo"],$_POST["mensaje"]);
?>