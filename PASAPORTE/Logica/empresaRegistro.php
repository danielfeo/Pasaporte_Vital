<?php
session_start();

if(isset($_SESSION['ID']))
{
	if(isset($_SESSION['ID']))
	{
		include ("../Datos/Administrador.php");
		$idRol=0;	
		$TipoEmpresa=$_POST['DDL_TipoEmpresa'];
		$NomEmpresa=$_POST['TB_NomEmpresa'];
		$Nit=$_POST['TB_Nit'];
		$NomDelegado=$_POST['TB_NomDelegado'];
		$ApeDelegado=$_POST['TB_ApeDelegado'];		
		$Email=$_POST['TB_Email'];
		$Direccion=$_POST['TB_Direccion'];
		$Telefono=$_POST['TB_Telefono'];
		$Descripcion= $_POST['TB_Descripcion'];
		$FechaInicio=$_POST['TB_Inicio'];
		
$registro=registrarEmpresa($TipoEmpresa,$NomEmpresa,$Nit,$NomDelegado,$ApeDelegado,$Email,$Direccion,$Telefono,$FechaInicio,$Descripcion);

	}else{
    	echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";                		
	}
}
else
{
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}
?>