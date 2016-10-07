<?php
include ("..//Datos/Conexion.php");

sleep(1);


   $usuario = $_REQUEST['username'];
   
		$Conn2 = conectar2();
		$sql1="SELECT usuario FROM acceso WHERE usuario='$usuario'";
		$resultado1 = mysql_query($sql1,$Conn2)or die(mysql_error());
		desconectar($Conn2);
		


   $row=mysql_fetch_array($resultado1);
   
	if(mysql_num_rows($resultado1) > 0)
        echo '<div id="Error">Usuario ya existente</div>';
    else
        echo '<div id="Success">Disponible</div>';
	
   
?>