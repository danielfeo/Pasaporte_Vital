<?php
session_start();


if(isset($_SESSION['ID']))
{

	include ("../Datos/Administrador.php");
	include("Cifrado.php");
		
		$NomEmpresa="";
		$TipoUsuario=$_POST['DDL_TipoUsuario'];
		if($TipoUsuario==4){$idRol=1;}
		if($TipoUsuario==5){$idRol=2;}
		if($TipoUsuario==7){
		$idRol=3;
		$NomEmpresa=$_POST['TB_Empresa'];
		}
		
		
		
		$TipoDocumento=$_POST['DDL_TipoDocumento'];
		
		$cedula=$_POST['TB_Cedula'];
		
		$contrato=$_POST['TB_Contrato'];
		
		$nombre=utf8_decode($_POST['TB_Nombre']);
		
		$nombre2=utf8_decode($_POST['TB_Nombre2']);
		
		$apellido=utf8_decode($_POST['TB_Apellido']);
		
		$apellido2=utf8_decode($_POST['TB_Apellido2']);
		
		$email=$_POST['TB_Email'];
		
		$sexo=$_POST['DDL_Sexo'];
		
		
		$Pais=$_POST['TB_Pais'];
		
		$ciudad=utf8_decode($_POST['TB_Ciudad']);

		$etnia = $_POST['DDL_Etnia'];

		$FNacimiento=$_POST['TB_FNacimiento'];

		$Finicio=$_POST['TB_FInicio'];

		$Ffin=$_POST['TB_FFin'];

		$Usuario=utf8_decode($_POST['TB_Usuario']);

		$contra=cifrar($_POST['pwd12']);	

		
		$actividades = $_POST['postre'];
		



	
	
		$registro= registrarUsuario($cedula,$contrato,$nombre,$apellido,$email,$Usuario,$contra,$idRol,$Finicio,$Ffin, $TipoDocumento,$apellido2,$nombre2, $FNacimiento, $Pais, $ciudad, $sexo,$etnia,$TipoUsuario,$actividades,$NomEmpresa);
	
	
}
else
{
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\">";
}
?>