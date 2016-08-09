<?php
require_once("class/class.php");
session_start();
$tra=new Trabajo();
?>
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Bienvendio a Tienda</h1>
				<h2>Tienda especializada en articulos informaticos</h2>		
				<p class="grey">Gracias por visitarnos, si aun no es miembro puede <a href='registro.php'>registrarse</a> en este panel.Y si ya es miembro puede entrar con sus datos correspondientes!</p>
				
			</div>
			<div class="left">
<?php
if ( ! empty($_SESSION["usuario"]) ) {
	echo '<a href="cerrar_sesion.php">Cerrar Sesion</a> ';
	} else {
	echo '
	<form class="clearfix" action="autentificar.php" method="post">
	<h1>Miembros</h1>
	<label class="grey" for="log">Usuario:</label>
	<input class="field" type="text" name="log" id="log" value="" size="23" />
	<label class="grey" for="pwd">Contraseña:</label>
	<input class="field" type="password" name="pwd" id="pwd" size="23" />
	<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Recordarme</label>
        <div class="clear"></div>
	<input type="submit" name="submit" value="Entrar" class="bt_login" />
	<a class="lost-pwd" href="#">¿A perdido su contraseña?</a>
	</form>
';
	}
?>
</div>
	</div>
		</div> <!-- /login -->	
<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li>Hola <?php if (!isset($_SESSION["usuario"])) {
			echo "Invitado";}else {echo $_SESSION["usuario"];} ?></li>
			<li class="sep">|</li>
			<li id="toggle">
        <a id="open" class="open" href="#"><?php if (!isset($_SESSION["usuario"])) {
      echo "Entrar";}else {echo "Salir"; } ?></a>
        <a id="close" style="display: none;" class="close" href="#">Cerrar Panel</a>      
      </li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div>

	
