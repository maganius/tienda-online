 <style type="text/css">
.error{
    color: red;
    font-weight: bold;
    margin: 10px;
    text-align: center;
}
</style>
<?php
require_once("class/class.php");
$tra=new Conectar;
$reg=$tra->con();
if( ($_POST[log] == ' ') or ($_POST[pwd] == ' ') )
{
Header("Location: login.php");
}else{
$usuarios=mysql_query("SELECT * FROM usuario WHERE nickname='$_POST[log]' and contrasena='$_POST[pwd]'");
if($usuario_ok = mysql_fetch_array($usuarios))
{
session_register("usuario");
session_register("idusuario"); 
session_register("rango");
session_register("carrito");
$_SESSION[usuario] = $usuario_ok["nickname"]; 
$_SESSION[idusuario] = $usuario_ok["idusuario"];
$_SESSION[rango] = $usuario_ok["rango"];  
$_SESSION[carrito] = $usuario_ok["carrito"]; 
 
Header("Location: index.php"); 
}else{
echo '<div class="error">El usuario ingresado no existe.</div>';
}
}
?>
