<?php
session_start();

if(isset($_SESSION['ID']))
{
	if(isset($_SESSION['ID']))
	{
		include ("../Datos/Operario.php");
		
		RegistroServicio($_POST["Cedula"],$_SESSION['ID']);
		
	}else{
    	echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";                		
	}
}
else
{
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}
?>