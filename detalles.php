<?php
require_once("class/class.php");
$tro=new Trabajo();
$tra=new Conectar;
$reg=$tra->con();
$result = mysql_query('SELECT * FROM slider')
or die(mysql_error());
$img = mysql_fetch_array($result);
mysql_free_result($result);
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$colname_detalle_proce = "-1";
if (isset($_GET['id_producto'])) {
  $colname_detalle_proce = $_GET['id_producto'];
}

$query_detalle_proce = sprintf("SELECT * FROM productos WHERE id_producto = %s", GetSQLValueString($colname_detalle_proce, "int"));
$detalle_proce = mysql_query($query_detalle_proce, $reg) or die(mysql_error());
$row_detalle_proce = mysql_fetch_assoc($detalle_proce);
$totalRows_detalle_proce = mysql_num_rows($detalle_proce);
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
    <table width="450" border="1" align="center">
    <tr align="center">
    	<td><form name="form1" method="post" action="carrito.php">
              <input type="image" name="imageField" id="imageField" src="imagenes/comprar.gif">
              <input name="nombre" type="hidden" id="nombre" value="<?php echo $row_detalle_proce['nombre']; ?>">
              <input name="precio" type="hidden" id="precio" value="<?php echo $row_detalle_proce['precio']; ?>">
              <input name="cantidad" type="hidden" id="cantidad" value="1">
            </form></td>
    </tr>
	  <tr>
	    <td align="center" class="producto_titulo"><p><?php echo $row_detalle_proce['nombre']; ?></p>
	      <p>&nbsp;</p></td>
	    </tr>
	  <tr>
	    <td align="center"><p><?php echo nl2br($row_detalle_proce['descripcion']); ?></p>
	      <p>&nbsp;</p></td>
	    </tr>
	  <tr>
	    <td align="center"><img src="imagenes/productos/detalle/<?php echo $row_detalle_proce['imagen']; ?>" width="200" height="200"></td>
	    </tr>
	  </table>
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