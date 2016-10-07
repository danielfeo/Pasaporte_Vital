<?php
session_start();

if(isset($_SESSION['ID']))
{
	if(isset($_SESSION['ID']))
	{
		include ("../Datos/Operario.php");
		$resultado= consultar($_POST["TB_Cedula"]);
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Consulta.php?resultado\">";
		//echo $resultado[0];

	}else{
    	echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";                		
	}
}
else
{
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}
?>