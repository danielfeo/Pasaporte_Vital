<?php
session_start();

if(isset($_SESSION['ID']))
{
	if(isset($_SESSION['ID']))
	{
		include ("../Datos/Conexion.php");
		$Conn = conectar();	
		$Conn2 = conectar2();
		
		$Activos=$_POST["lbxHabilitados"];
		$Inactivos=$_POST["lbxDeshabilitados"];
		//echo count($Activos);
		if(count($Activos) == 0)
		{
	    }else
		{
			for ($i=0;$i<count($Activos);$i++) 
      	 	{
				if($Activos[$i].""=="-")
				{
					
				}else
				{
					
  
						$sql="UPDATE pasaporte_login SET estadoUsuario='ACTIVO'
WHERE idUsuario=".$Activos[$i].";"; 
						$result=mysql_query($sql,$Conn)or die(mysql_error());
						
					$id_=$_SESSION['ID'];
					$anterior='$Activos[$i]'.' INACTIVO';
					$ahora='$Activos[$i]'.' ACTIVO';
					$ip=$_SERVER['REMOTE_ADDR']; 
					$sql_="CALL SP_Insetar_Seguridad(3,CURDATE(),'$id_','pasaporte_login','UPDATE','$anterior','$ahora','$ip'); ";
				    mysql_query($sql_,$Conn2)or die(mysql_error()); 
						
				}
				
		  	}
		}
		
		if(count($Inactivos) == 0)
		{
	    }else
		{
			for ($i=0;$i<count($Inactivos);$i++) 
      	 	{
				if($Inactivos[$i].""=="-")
				{
					
				}else
				{
					
  
						$sql="UPDATE pasaporte_login SET estadoUsuario='INACTIVO'
WHERE idUsuario=".$Inactivos[$i].";"; 
						$result=mysql_query($sql,$Conn)or die(mysql_error());
						
						$id_=$_SESSION['ID'];
					$anterior='$Inactivos[$i]'.'ACTIVO ';
					$ahora='$Inactivos[$i]'.'INACTIVO ';
					$ip=$_SERVER['REMOTE_ADDR']; 
					$sql_="CALL SP_Insetar_Seguridad(3,CURDATE(),'$id_','pasaporte_login','UPDATE','$anterior','$ahora','$ip'); ";
				    mysql_query($sql_,$Conn2)or die(mysql_error()); 
				}
				
		  	}
		}
		
		desconectar($Conn);
		desconectar($Conn2);	
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=..\GestionarUsuarios.php\">";

	}else{
    	echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";                		
	}
}
else
{
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}
?>