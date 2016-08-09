<?php
//*************************CONECTAR*******************************
class Conectar
{
	public static function con()
	{
		$conexion=mysql_connect("localhost","root","");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("tienda");
		return $conexion;
		
	}
	public static function corta_palabra($palabra,$num)
	{
		$largo=strlen($palabra);
		$cadena=substr($palabra,0,$num);
		return $cadena;
	}
}
//*********************FIN CONEXION***********************************
//*************************USUARIOS***********************************
class Usuarios  
	{
	private $usuario;
	
		public function __construct()
	{
		$this->usuario=array();
	}
	public function get_usuario()
	{
		$sql="select * from usuario order by idusuario asc";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res)) 
		{
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}
	public function agregar_usuario($nickname,$nombre,$apellido,$pais,$ciudad,$contrasena,$correo)
	{
	$fecha= $fecha = date("1").", "." ".date("j")." ".date("F")." ".date("Y");
	$sql="insert into usuario values (null,'$nickname','$nombre','$apellido','$pais','$ciudad','$correo','$contrasena','$fecha','1','0')";
	$res=mysql_query($sql,Conectar::con());
	echo "<script type'text/javascript'>
	alert('Usuario agregado con èxito');
	window.location='registro.php';
	</script>";
	}
	public function get_usuario_por_id($id)
	{
	$sql=" select * from usuario where idusuario=$id";
	$res=mysql_query($sql,Conectar::con());
	while ($reg=mysql_fetch_assoc($res))
	{
		$this->usuario[]=$reg;	
	}
		return $this->usuario;
	}
	public function editar_usuario($nickname,$nombre,$apellido,$pais,$ciudad,$contrasena,$correo,$id)
	{
		$sql="update usuario set nickname='$nickname',nombre='$nombre',apellido='$apellido',pais='$pais',ciudad='$ciudad',contrasena='$contrasena',correo='$correo',rango='$rango',baneo='$baneo', where idusuario=$id";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type'text/javascript'>
	alert('Datos de usuario editados con èxito');
	window.location='registro.php';
	</script>";
		}
		public function eliminar_usuario($id)
		{
			$sql="delete from usuario where idusuario=$id";
			$reg=mysql_query($sql,Conectar::con());
			echo "<script type='text/javascript'>
			alert('Datos del usuario eliminados con èxito');
			window.location='registro.php';
			</script>";
		}
}
//******************************FIN USUARIOS**************************
//*****************************CONTACTO*****************************
class Contacto 
	{
	private $contacto;
	
		public function __construct()
	{
		$this->contacto=array();
	}
	public function get_contacto()
	{
		$sql="select * from contacto order by idcontacto asc";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res)) 
		{
			$this->contacto[]=$reg;
		}
			return $this->contacto;
	}
	public function agregar_contacto($nombre,$correo,$mensaje)
	{
	$fecha= $fecha = date("1").", "." ".date("j")." ".date("F")." ".date("Y");
	$sql="insert into contacto values (null,'$nombre','$correo','$mensaje','$fecha')";
	$res=mysql_query($sql,Conectar::con());
	echo "<script type'text/javascript'>
	alert('Gracias espera respuesta via email.');
	window.location='contacto.php';
	</script>";
	}
	public function get_contacto_por_id($id)
	{
	$sql=" select * from contacto where idcontacto=$id";
	$res=mysql_query($sql,Conectar::con());
	while ($reg=mysql_fetch_assoc($res))
	{
		$this->contacto[]=$reg;	
	}
		return $this->contacto;
	}
	public function editar_consulta($nombre,$telefono,$email,$consulta,$id)
	{
		$sql="update usuarios set nombre='$nombre',telefono='$telefono',email='$email',consulta='$consulta' where id_consulta=$id";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type'text/javascript'>
	alert('Datos de consulta editados');
	window.location='crear_consulta.php';
	</script>";
		}
		public function eliminar_consulta($id)
		{
			$sql="delete from consultas where id_consulta=$id";
			$reg=mysql_query($sql,Conectar::con());
			echo "<script type='text/javascript'>
			alert('Consulta eliminada con èxito');
			window.location='consultas.php';
			</script>";
		}
}
//*****************************FIN CONTACTO*****************************
//******************************Clase Trabajo**************************
class Trabajo 
{
	private $cat;
	private $ultimos;

		public function __construct()
	{
		$this->cat=array();
		$this->ultimos=array();
	}
	public function get_categorias()
	{
		$sql="select * from categorias order by nombre asc";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res)) 
		{
			$this->cat[]=$reg;
		}
			return $this->cat;
	}
	public function agregar_categoria($categoria)
	{
	$sql="insert into categorias values (null,'$nombre','$contiene')";
	$res=mysql_query($sql,Conectar::con());
	echo "<script type'text/javascript'>
	alert('categoria agregada con exito.');
	window.location='agregar_categoria.php';
	</script>";
	}
public function get_ultimos_10_productos()
{
$sql="select * from productos order by id_producto desc limit 10";
$res=mysql_query($sql,Conectar::con());
while($reg=mysql_fetch_assoc($res))
{
	$this->ultimos[]=$reg;
}
	return $this->ultimos;
}

}
?>