<?php
session_start();

		include ("../Datos/Operario.php");
			
		$tipoDocumento=$_POST['DDL_Documento'];
		$numDocumento=$_POST['TB_Documento'];
		$apellidos=$_POST['TB_Apelldios'];
		$apellido_dos=$_POST['TB_Apelldios_2'];
		$nombres=$_POST['TB_Nombres'];
		$nombres_2=$_POST['TB_Nombres_2'];

		$diaNacimiento=$_POST['DDL_Dia'];
		$mesNacimiento=$_POST['DDL_Mes'];
		$añoNacimiento=$_POST['DDL_Anio'];
		
		if($mesNacimiento == 'ENERO'){ $mesNacimiento = '1';}
		if($mesNacimiento == 'FEBRERO'){ $mesNacimiento = '2';}
		if($mesNacimiento == 'MARZO'){ $mesNacimiento = '3';}
		if($mesNacimiento == 'ABRIL'){ $mesNacimiento = '4';}
		if($mesNacimiento == 'MAYO'){ $mesNacimiento = '5';}
		if($mesNacimiento == 'JUNIO'){ $mesNacimiento = '6';}
		if($mesNacimiento == 'JULIO'){ $mesNacimiento = '7';}
		if($mesNacimiento == 'AGOSTO'){ $mesNacimiento = '8';}
		if($mesNacimiento == 'SEPTIEMBRE'){ $mesNacimiento = '9';}
		if($mesNacimiento == 'OCTUBRE'){ $mesNacimiento = '10';}
		if($mesNacimiento == 'NOVIEMBRE'){ $mesNacimiento = '11';}
		if($mesNacimiento == 'DICIEMBRE'){ $mesNacimiento = '12';}
		
		$fechaNacimiento = $añoNacimiento . '-' . $mesNacimiento . '-' . $diaNacimiento;
		
		$paisNacimiento=$_POST['TB_Pais'];
		$ciudad = $_POST['TB_Ciudad'];
		$email=$_POST['TB_Email'];
		$localidad=$_POST['DDL_Localidad'];
		$estrato=$_POST['DDL_Estrato'];
		$direccion=$_POST['TB_Direccion'];
		$telFijo=$_POST['TB_Telefono'];
		$telCelular=$_POST['TB_Celular'];
		$nivelEstudios=$_POST['DDL_Educacion'];
		$pensionado=$_POST['DDL_Pensionado'];
		$enfermedad=$_POST['DDL_Enfermedad'];
		
		
		
		$actividadesInteres	= $_POST['DDL_Interes'];		
		$tipoSeguridad=$_POST['DDL_Seguro'];
		$descripcionSeguridad=$_POST['TB_SeguroDescripcion'];
		$etnia = $_POST['DDL_Etnia'];
		$contactoNom=$_POST['TB_NomContacto'];
		$contactoTel=$_POST['TB_TelContacto'];
		$contactoCel=$_POST['TB_CelContacto'];
		$observaciones=$_POST['TB_Observaciones'];
		$supercade=$_POST['DDL_Cade'];
		$sexo=$_POST['DDL_Sexo'];
		$año= date("Y"); 
		$DDL_Habilidad=$_POST['DDL_Habilidad'];


		$pregunta1="0";
		$pregunta2="0";
		$pregunta3="0";
		$pregunta4="0";
		
		if(isset($_SESSION['ID'])){
		$pregunta1=$_POST['ddlPregunta1'];
		$pregunta2=$_POST['ddlPregunta2'];
		$pregunta3=$_POST['ddlPregunta3'];
		$pregunta4=$_POST['ddlPregunta4'];
		}
		 $verr=$año-$añoNacimiento;
		 

	
if(($sexo==1&&$año-$añoNacimiento>=60)||($sexo==2&&$año-$añoNacimiento>=55)||$pensionado=='SI'){

		$registro=registrarPasaporte($tipoDocumento,$numDocumento,$apellidos,$nombres,$fechaNacimiento,$paisNacimiento,$email,$localidad,
		$estrato,$direccion,$telFijo,$telCelular,$nivelEstudios,$pensionado,$enfermedad,$actividadesInteres,$tipoSeguridad,$descripcionSeguridad,
		$contactoNom,$contactoTel,$contactoCel,$observaciones,$supercade,$sexo,$apellido_dos,$nombres_2 ,$ciudad , $etnia ,$pregunta1,$pregunta2,$pregunta3,$pregunta4,$DDL_Habilidad);

		
}else{
	?>	
					<script language="JavaScript" type="text/javascript">
					alert("Debe ser adulto mayor o pensionado para adquirir el pasaporte.");
					</script>  
									
					<?php
					 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Registro.php\">";
	}
?>