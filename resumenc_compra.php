<?php
session_start(); 
require_once("class/class.php");
$tro=new Trabajo();
$tra=new Conectar;
$reg=$tra->con();
$result = mysql_query('SELECT * FROM slider')
or die(mysql_error());
$img = mysql_fetch_array($result);
mysql_free_result($result);
if (!isset($_SESSION["usuario"])){
    header("location:registro.php?nologin=false");
    
}
$_SESSION["usuario"];
if(isset($_SESSION['carrito'])){
	$compras=$_SESSION['carrito'];

}

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
   <br>
 <p align="center">Bienvenido: <?php echo $_SESSION["usuario"]; ?></p><br />
 <p align="center">Este es el resumen de su compra, verifique su pedido e ingrese sus datos</p>
   
      <br>
      <form method="post" action="final.php">
    <table width="90%"  height="90%" border="1" align="center" id="tablacarrito">
<tr align="center" style="background-color:#fff; color:#000">
  <td>&nbsp;</td>
  <td align="right">Nombre:</td>
  <td><label for="nombre"></label>
    <input type="text" name="nombre" id="nombre" size="50" value="<?php echo $_SESSION["usuario"]; ?>" required></td>
  <td>&nbsp;</td>
</tr>
<tr align="center" style="background-color:#fff; color:#000">
  <td height="39">&nbsp;</td>
  <td align="right">E-Mail:</td>
  <td><label for="email"></label>
    <input type="email"  name="email" id="email" size="50" required></td>
  <td>&nbsp;</td>
</tr>
<tr align="center" style="background-color:#000; color:#fff">
    <td width="27%" height="28" >PRODUCTO</td>
    <td width="18%" >PRECIO</td>
    <td width="37%" >CANTIDAD</td>
    <td width="18%" >TOTAL</td>
  </tr>
  <?php
  if(isset($_SESSION['carrito'])){
	  $total=0;

for($i=0;$i<=count($compras)-1;$i++){
	
	if($compras[$i]!=NULL){
	
  ?>
  <tr align="center">
    <td><?php echo $compras[$i]['nombre']; ?></td>
    <td><?php echo $compras[$i]['precio']; ?></td>
    <td><?php echo $compras[$i]['cantidad'];?></td>
    <td>
	<?php echo $compras[$i]['cantidad'] * $compras[$i]['precio'];?>
    </td>
  </tr>
  <?php
  $total= $total+($compras[$i]['cantidad'] * $compras[$i]['precio']);
}
  }
  }
  
  ?>
  <tr align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><p>&nbsp;</p>
      <p>TOTAL A PAGAR::</p></td>
    <td><p>&nbsp;</p>
    <p><?php if(isset($_SESSION['carrito'])){ echo "$ ".$total." Dolares ";}?></p>
    </td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Enviar pedido a PayPal"></td>
  </tr>
    </table>
    </form>
</div> 


<div id="footer"> 
<?
include ("footer.php");
?>
</div>
</div>