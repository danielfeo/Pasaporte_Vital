<?php
session_start();


		include ("../Datos/Operario.php");
			
		
		$apellidos=$_POST['TB_Apelldios'];
		$nombres=$_POST['TB_Nombres'];
		$fechaNacimiento=$_POST['TB_Fecha'];
		$paisNacimiento=$_POST['TB_Pais'];
		$email=$_POST['TB_Email'];
		$localidad=$_POST['DDL_Localidad'];
		$estrato=$_POST['DDL_Estrato'];
		$direccion=$_POST['TB_Direccion'];
		$telFijo=$_POST['TB_Telefono'];
		$telCelular=$_POST['TB_Celular'];
		$nivelEstudios=$_POST['DDL_Educacion'];
		$enfermedad=$_POST['DDL_Enfermedad'];
		$descripcionSeguridad=$_POST['TB_SeguroDescripcion'];
		
		$contactoNom=$_POST['TB_NomContacto'];
		$contactoTel=$_POST['TB_TelContacto'];
		$contactoCel=$_POST['TB_CelContacto'];
		$observaciones=$_POST['TB_Observaciones'];
		

$registro=MofificarPasaporte($apellidos,$nombres,$fechaNacimiento,$paisNacimiento,$email,$localidad,$estrato,$direccion,$telFijo,$telCelular,$nivelEstudios,$enfermedad,$descripcionSeguridad,$contactoNom,$contactoTel,$contactoCel,$observaciones);



?>