<?php
require_once("class/class.php");
//print_r($_POST);
$tra=new Usuarios();
$tra->agregar_usuario($_POST["nickname"],$_POST["nombre"],$_POST["apellido"],$_POST["pais"],$_POST["ciudad"],$_POST["contrasena"],$_POST["correo"]);
?>
