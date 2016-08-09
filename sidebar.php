<div class="box"> 
	<div id="widget">
		<div id="titulo_widget">Categorias</div>
		<?php

$categoria=$tro->get_categorias();
for ($i=0;$i<sizeof($categoria);$i++)
{
?>
		<div id="contenido_widget"><a href="?cat=<?php echo $categoria[$i]["id_cat"];?>" title="<?php echo $categoria[$i]["nombre"];?>"><?php echo $categoria[$i]["nombre"];?></a>
</div>
<?php
}
?>		
	</div>
<div id="separador_widget"></div>
<div id="widget">
		<div id="titulo_widget">Productos Nuevos</div>
		<?php
		$pro=$tro->get_ultimos_10_productos();
for ($i=0;$i<sizeof($pro);$i++)
{
	$texto=str_replace(" ","-",$pro[$i]["nombre"]);
?>
		<div id="contenido_widget"><a href="<?php echo $texto. "p".$pro[$i]["id_producto"].".html"?>" title="<?php echo $pro[$i]["nombre"];?>"><?php echo Conectar::corta_palabra($pro[$i]["nombre"],20);?>...</a></div>
<?php
}

?>		</div>
</div> 