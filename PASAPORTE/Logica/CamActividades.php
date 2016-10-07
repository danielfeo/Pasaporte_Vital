<?php
session_start();

if(isset($_SESSION['ID']))
{
		include ("../Datos/CambioActi.php");
		
			$cedula=$_POST['CT_ID2'];
			$actividades = $_POST['postre'];
			
		$registro = Modificar($cedula,$actividades);
	
}
else
{
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\">";
}
?>