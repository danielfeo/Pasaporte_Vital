<?php
session_start();

if(isset($_SESSION['ID']))
{
		include ("../Datos/Administrador.php");
		include("Cifrado.php");
	
		$TipoUsuario=$_POST['DDL_TipoUsuario'];
		if($TipoUsuario==4){$idRol=1;}
		if($TipoUsuario==5){$idRol=2;}
		
		
		$cedula=$_POST['TB_Cedula'];
		$contrato=$_POST['TB_Contrato'];
		$email=$_POST['TB_Email'];
		$Finicio=$_POST['TB_FInicio'];
		$Ffin=$_POST['TB_FFin'];
		
	
		
		$actividades = $_POST['postre'];
		
							

		
		$registro=registrarActividades($cedula,$contrato,$idRol,$Finicio,$Ffin,$TipoUsuario,$actividades,$email);
	
	
}
else
{
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\">";
}
?>