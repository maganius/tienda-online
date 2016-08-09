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
<script type"text/javascript" language="javascript" src="js/validacion.js"></script>
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
<center>
<form name="form" action="procesa_contacto.php" method="post">

<table width="400" alig="center">
<tr>
<td width="center" align="center" colspan="2">

<h3>Contáctenos, será un placer atenderle.</h3>                
</td>
</tr>
<tr>
<td valign="top" align="right">
Nombre:
</td>
<td valign="top" align="left">
<input type="text" name="nombre">
</td>
</tr>
<tr>
<td valign="top" align="right">
Correo:
</td>
<td valign="top" align="left">
<input type="text" name="correo">
</td>
</tr>
<tr>
<td valign="top" align="right">
Mensaje:
</td>
<td valign="top" align="left">
<textarea  name="mensaje" cols="40" rows="10"></textarea>
</td>
</tr>
<tr>
<td valign="top" width="400" align="center" colspan="4">
<hr />
<div id="valor"></div>
<input type="button" value="Enviar Mensaje" title"Enviar Mensaje" onClick="valida_contacto();">
<hr />
</td>
</tr>
</table>
</form>
<center>
</div> 
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
