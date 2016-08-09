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
Tienda Online fue desarrollada en febrero de 2014 Por xxrimoxx con la iniciativa de ofrecer el servicio de venta  de productos a todas las personas.
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

    