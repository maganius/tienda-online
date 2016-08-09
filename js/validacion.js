function limpiar()
{
	document.form.reset();
	docuemnt.form.usuario.focus();
}
function valida_contacto()
{
	var form=document.form;
	if(form.nombre.value==0)
	{
		document.getElementById("valor").innerHTML="<font color='#ff0000'>No haz ingresado tu nombre.</font>";
	form.nombre.value="";
	form.nombre.focus();
	return false;
	}else
	{
		document.getElementById("valor").innerHTML="";
		
	}
	if(form.correo.value==0)
	{
		document.getElementById("valor").innerHTML="<font color='#ff0000'>No has ingresado  tu email.</font>";
	form.correo.value="";
	form.correo.focus();
	return false;
	}else
	{
		document.getElementById("valor").innerHTML="";
	}
	if(form.mensaje.value==0)
	{
		document.getElementById("valor").innerHTML="<font color='#ff0000'>No has ingresado  tu consulta.</font>";
	form.mensaje.value="";
	form.mensaje.focus();
	return false;
	}else
	{
		document.getElementById("valor").innerHTML="";
	}	
	form.submit();
}