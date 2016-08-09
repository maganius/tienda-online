<?php 
require_once("class/class.php");
$tro=new Trabajo();
$tra=new Conectar;
$reg=$tra->con();
$result = mysql_query('SELECT * FROM slider')
or die(mysql_error());
$img = mysql_fetch_array($result);
mysql_free_result($result);
 
?>


<link rel="stylesheet" href="css/estilo.css"type="text/css"  />
<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
<script src="jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>  
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
function comparar_contra() {
	var contra1 = document.getElementById('contra1').value;
	var contra2 = document.getElementById('contra2').value;

	if (contra1 != contra2) {
		alert('Las contraseñas no coinciden');
	} 
}
</script>
<?
include ("login.php");
?>
<br>
<br>
<div id="contenedor"> 
   <?
include ("head.php");
?>

 <?
include ("slider.php");
?>
<br> 

<div id="contenido"> 
<p align="center"><h3>Registro de usuarios.</h3></p>
<center>
<form action="procesa_registro.php" method="post">
<table width="300" border="1">
  <tr>
    <td height="30" align="right">Usuario:</td>
    <td align="left"><input type="text" name="nickname" required /></td>
  </tr>
  <tr>
    <td height="30" align="right">Nombre:</td>
    <td align="left"><input type="text" name="nombre" required /></td>
  </tr> 
	<tr>
    <td height="30"  align="right">Apellido:</td>
    <td align="left"><input type="text" name="apellido"  required/></td>
  </tr>
<tr>
    <td height="30" align="right">Pais:</td>
    <td align="left">
    <select name="pais">
    <option name="pais" value="Mexico">Mexico</option>
   
    </select></td>
  </tr>
  <tr>
    <td height="30" align="right">Estado:</td>
    <td align="left">
    <select name="ciudad">
	<option name="ciudad" value="Aguascalientes"> Aguascalientes </ option> 
	<option name="ciudad" value="Baja california"> Baja California </ option>
	<option name="ciudad" value="Baja California Sur"> Baja California Sur </ option> 
	<option name="ciudad" value="Campeche"> Campeche </ option> 
	<option name="ciudad" value="Chiapas"> Chiapas </ option> 
	<option name="ciudad" value="Chihuahua"> Chihuahua </ option> 
	<option name="ciudad" value="Coahuila"> Coahuila</ option> 
	<option name="ciudad" value="Colima"> Colima </ option> 
	<option name="ciudad" value="Distrito Federal"> Distrito Federal </ option> 
	<option name="ciudad" value="Durango">  Durango </ option> 
	<option name="ciudad" value="Guanajuato"> Guanajuato </ option> 
	<option name="ciudad" value="Guerrero"> Guerrero </ option> 
	<option name="ciudad" value="Hidalgo"> Hidalgo </ option> 
	<option name="ciudad" value="jalisco">Jalisco </ option> 
	<option name="ciudad" value="Mexico"> México </ option> 
	<option name="ciudad" value="Michoacan"> Michoacan</ option> 
	<option name="ciudad" value="Morelos"> Morelos </ option> 
	<option name="ciudad" value="Nayarit"> Nayarit </ option> 
	<option name="ciudad" value="Nuevo Leon"> Nuevo León </ option> 
	<option name="ciudad" value="Oaxaca"> Oaxaca </ option> 
	<option name="ciudad" value="Puebla">  Puebla </ option> 
	<option name="ciudad" value="Queretaro"> Querétaro</ option> 
	<option name="ciudad" value="Quintana Roo"> Quintana Roo </ option> 
	<option name="ciudad" value ="San Luis Potosí" > San Luis Potosí </ option> 
	<option name="ciudad" value="Sinaloa"> Sinaloa </ option> 
	<option name="ciudad" value="Sonora"> Sonora </ option> 
	<option name="ciudad" value="Tabasco"> Tabasco </ option> 
	<option name="ciudad" value ="Tamaulipas"> Tamaulipas </ option> 
	<option name="ciudad" value="Tlaxcala"> Tlaxcala </ option> 
	<option name="ciudad" value="Veracruz"> Veracruz</ option> 
	<option name="ciudad" value="Yucatan"> Yucatán < / option> 
	<option name="ciudad" value="Zacatecas"> Zacatecas </ option> 
   </select>
   </td>
  </tr>
   <tr>
    <td height="30" align="right">Correo:</td>
    <td align="left">  <input type="email"  name="correo" id="email" required></td>
  </tr>
  
  <tr>
    <td height="30" align="right">Contrase&ntilde;a:</td>
    <td align="left"><input type="password" name="contrasena" id="contra1" required  /></td>
  </tr>
  <tr>
    <td height="30"  align="right">Repetir Contrase&ntilde;a:</td>
    <td align="left"><input type="password" name="contrasena_vali"  id="contra2" onChange="javascript:comparar_contra(this.form)"/></td>
  </tr>
  
  
</table> 
</center>
<hr /><p align="center"><input type="submit" name="registrar" value="Registrate"   /><hr />
</form></div> 
<div id="right"> 
<?
include ("sidebar.php");
?>
</div>

<div id="footer"> 
<?
include ("footer.php");
?>
</div>
</div>