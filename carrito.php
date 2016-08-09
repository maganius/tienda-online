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
if(!isset($_SESSION["usuario"])){

if (isset($_POST['log'])){
$nickname=$_POST['log'];
$contrasena=$_POST['pwd'];
$valido=true;
 $consulta2="SELECT * FROM usuario where nickname='$nickname' AND contrasena='$contrasena'";
         $result=mysql_query($consulta2) or die (mysql_error());
         $filasn= mysql_num_rows($result);
         if ($filasn<=0 || isset($_GET['nologin']) ){
             
             $valido=false;
         }else{
        $rowsresult=mysql_fetch_array($result);          
        $_SESSION['idusuario']= $rowsresult['idusuario'];
             $valido=true;
             //guardamos en sesion el carnet del usuario ya que ese es el identificados en la base de datos
             $_SESSION["usuario"]=$nickname;
             header("location:carrito.php?login=true");
				echo '<script type=\"text/javascript\">alert(\"Gracias Por Registrarse\");</script>';

         }
}

	}else{
		$_SESSION["usuario"];
		
		}


if ( isset($_SESSION['carrito']) || isset($_POST['nombre'])){
			
	if(isset ($_SESSION['carrito'])){
		$compras=$_SESSION['carrito'];
		if(isset($_POST['nombre'])){
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];
		$duplicado=-1;
			for($i=0;$i<=count($compras)-1;$i++){
				if($nombre==$compras[$i]['nombre']){
					$duplicado=$i;

				}
			}

if($duplicado != -1){
	$cantidad_nueva = $compras[$duplicado]['cantidad'] + $cantidad;
		$compras[$duplicado]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad_nueva);
}else {
		$compras[]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad);
}
				}
}else {
	$nombre=$_POST['nombre'];
	$precio=$_POST['precio'];
	$cantidad=$_POST['cantidad'];
	$compras[]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad);
}
if(isset($_POST['cantidadactualizada'])){
	$id=$_POST['id'];
	$contador_cant=$_POST['cantidadactualizada'];
	if($contador_cant<1){
		$compras[$id]=NULL;
	}else{
		$compras[$id]['cantidad']=$contador_cant;
		}
}
if(isset($_POST['id2'])){
	$id=$_POST['id2'];
	$compras[$id]=NULL;

}
$_SESSION['carrito']=$compras;

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
    <table width="700"  height="90%"border="1" align="center" id="tablacarrito">
<tr align="center" style="background-color:#000; color:#fff">
    <td width="27%">PRODUCTO</td>
    <td width="18%">PRECIO</td>
    <td width="37%">CANTIDAD</td>
    <td width="18%">TOTAL</td>
  </tr>
  <?php
  if(isset($_SESSION['carrito'])){
	  $total=0;

for($i=0;$i<=count($compras)-1;$i++){
	
	if($compras[$i]!=NULL){

	
  ?>
  <tr align="center">
    <td required><?php echo $compras[$i]['nombre']; ?></td>
    <td><?php echo $compras[$i]['precio']; ?></td>
    <td>
      <form name="form1" method="post" action="">
      <input type="hidden" name="id" id="id" value="<?php echo $i;?>" >
      <input type="text" name="cantidadactualizada" value="<?php echo $compras[$i]['cantidad'];?>"  size="2" required>
      <span id="toolTipBox" width="200"></span>
        <input type="image" name="actualizar" id="actualizar" src="imagenes/actualizar.gif" onmouseover="toolTip('Presione para actualizar su pedido',this)">
      </form></td>
    <td>
	<form method="post" action=""><?php echo $compras[$i]['cantidad'] * $compras[$i]['precio'];?>
    <span id="toolTipBox" width="200"></span>
       <input name="id2" type="hidden" id="id2" value="<?php echo $i;?>"> 
               <input type="image" name="imageField" id="imageField" src="imagenes/delete.png" onmouseover="toolTip('Presione para eliminar su pedido',this)"></form></td>
  </tr>
  <?php
  $total= $total+($compras[$i]['cantidad'] * $compras[$i]['precio']);
}
  }
  }else{
    echo "No hay productos en el carrito";
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
    <td><form name="form2" method="post" action="resumenc_compra.php">
      <input type="submit" name="button" id="button" value="Enviar Pedido">
    </form></td>
  </tr>
    </table>
</div> 


<div id="footer"> 
<?
include ("footer.php");
?>
</div>
</div>