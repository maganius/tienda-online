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
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_listado = 9;
$pageNum_listado = 0;
if (isset($_GET['pageNum_listado'])) {
  $pageNum_listado = $_GET['pageNum_listado'];
}
$startRow_listado = $pageNum_listado * $maxRows_listado;
$query_listado = "SELECT * FROM productos";
$query_limit_listado = sprintf("%s LIMIT %d, %d", $query_listado, $startRow_listado, $maxRows_listado);
$listado = mysql_query($query_limit_listado, $reg) or die(mysql_error());
$row_listado = mysql_fetch_assoc($listado);

if (isset($_GET['totalRows_listado'])) {
  $totalRows_listado = $_GET['totalRows_listado'];
} else {
  $all_listado = mysql_query($query_listado);
  $totalRows_listado = mysql_num_rows($all_listado);
}
$totalPages_listado = ceil($totalRows_listado/$maxRows_listado)-1;

$queryString_listado = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_listado") == false && 
        stristr($param, "totalRows_listado") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_listado = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_listado = sprintf("&totalRows_listado=%d%s", $totalRows_listado, $queryString_listado);
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
    <br><table width="450" border=".5" align="center">
	<?php 
	$contador=0;
	
	do { 
	if ($contador==0){
		?>
        <tr>
        <?
        }
		$contador++;
		?>
          <td><a href="detalles.php?id_producto=<?php echo $row_listado['id_producto']; ?>"><center><img src="imagenes/productos/<?php echo $row_listado['imagen']; ?>" width="50" height="50"></center></a>            
            <h6><center><?php echo $row_listado['nombre']; ?></center></h6>
            <p><center>$<?php echo $row_listado['precio']; ?><br>
            </center></p>
            <form name="form1" method="post" action="carrito.php">
              <center><input type="image" name="imageField" id="imageField" src="imagenes/comprar.png"></center>
              <input name="nombre" type="hidden" id="nombre" value="<?php echo $row_listado['nombre']; ?>">
              <input name="precio" type="hidden" id="precio" value="<?php echo $row_listado['precio']; ?>">
              <input name="cantidad" type="hidden" id="cantidad" value="1">
            </form>
            <p>             
            </p>
          <p>&nbsp;</p></td>
            <?
			if ($contador==3){
				$contador=0;
		?>
        </tr>
        <?
			}
			?>
      
      <?php } while ($row_listado = mysql_fetch_assoc($listado)); ?>
      </table>
   
  <table width="255" border="0"  align="center" >
    <tr>
      <td><?php if ($pageNum_listado > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, 0, $queryString_listado); ?>">Primero</a>
          <?php } // Show if not first page ?></td>
      <td> <?php if ($pageNum_listado > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, max(0, $pageNum_listado - 1), $queryString_listado); ?>">Anterior</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_listado < $totalPages_listado) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, min($totalPages_listado, $pageNum_listado + 1), $queryString_listado); ?>">Siguiente</a>
          <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_listado < $totalPages_listado) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, $totalPages_listado, $queryString_listado); ?>">&Uacute;ltimo</a>
          <?php } // Show if not last page ?></td>
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