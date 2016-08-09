<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>YUME | TEC , Tu Solución</title>
<link href="css/estilo.css" type="text/css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
<script src="jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>  
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<!-- Sliding effect -->
	<script src="js/slide.js" type="text/javascript"></script>

</head>
<body onLoad="limipar();">
<?php
include ("header_admin.php");
?>
<?php
require_once("class/class.php");
$tra=new Contacto;
session_start();
?>
<div id="main">
	<div id="site_content">	
		<div class="sidebar_container">       
			<div class="sidebar">
				<h2>Ingresa</h2>
				<div class="sidebar_item">
               
                </div>
			</div>
		</div>
	<div id="content">
		<div class="content_item">
			
<center>
<h1>Consultas Recibidas</h1>
</center>

<table width="600" border="0" align="center">
<tr>
<td width="50" align="center" valign="top" bgcolor="#F0F0F0">#</td>
<td width="150" align="center" valign="top" bgcolor="#F0F0F0">Nombre</td>
<td width="150" align="center" valign="top" bgcolor="#F0F0F0">Email</td>
<td width="150" align="center" valign="top" bgcolor="#F0F0F0">Contacto</td>
<td width="50" align="center" valign="top" bgcolor="#F0F0F0"></td>



</tr>
<?php
$reg=$tra->get_contacto();
for ($i=0;$i<count($reg);$i++)
{
?>
<tr id="<?php echo "ide_$i";?>" style="backgound-color: #f0f0f0;" onMouseMove="cambiar('<?php echo "ide_$i";?>','#9C6')" onMouseOut="cambiar('<?php echo "ide_$i";?>','#f0f0f0');">
<td valign="top" align="center" width="50">
<?php echo $i ;?>
</td>
<td valign="top" align="center" width="150">
<?php echo $reg[$i]["nombre"];?>
</td>
<td valign="top" align="center" width="150">
<?php echo $reg[$i]["correo"];?>
</td>
<td valign="top" align="center" width="150">
<?php echo $reg[$i]["mensaje"];?>
</td>
<td align='center'><a href='borrar_consulta.php?id=<?php echo $reg[$i]["id_consulta"];?>'> Borrar </a></td>

</tr>
<?php
}
?>
</table>
</center>
			</div><!--close footer_container--> 
		</div>
	</div>
</div>
</body>
<?
include ("foot.php"); 
?>