<?php
session_start();

if(isset($_SESSION['ID'])){
	if(isset($_SESSION['ID'])){
		$id=$_GET["id"];

						include ("Conexion.php");
                         						 	
						
						try{
						
							 $Conn = conectar();
							 $sql1="DELETE FROM pasaporte_usuario WHERE pasaporte_usuario.idUsuario='$id'";
							 $sql="DELETE FROM pasaporte_login WHERE pasaporte_login.idUsuario='$id'";
							mysql_query($sql1,$Conn);
							mysql_query($sql,$Conn);
							 desconectar($Conn);
							 
							 $Conn2 = conectar2();
							 $sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona = $row['Id_Persona'];
							 desconectar2($Conn2);
							 
							 
							 $Conn2 = conectar2();
							 $sql01 ="SELECT * FROM `actividad_acceso` WHERE Id_Persona='$idpersona' AND Id_Actividad NOT IN  (SELECT Id_Actividad FROM actividades WHERE Id_Modulo=3 )";
							 $result=mysql_query($sql01,$Conn2);
							 $row = mysql_fetch_array($result);
							 
							 if($row>0){//si el usuario esta en otro modulo
							 
								$sql011 ="DELETE FROM persona_tipo WHERE Id_Persona='$idpersona' AND (Id_Tipo=4 OR Id_Tipo=5 OR Id_Tipo=6)";
								$result=mysql_query($sql011,$Conn2);	
								
								$sqlDele ="DELETE FROM `actividad_acceso` WHERE Id_Persona='$idpersona' AND Id_Actividad IN  (SELECT Id_Actividad FROM actividades WHERE Id_Modulo=3 ) ";
								$result=mysql_query($sqlDele,$Conn2);								
							 
							 }else{// Si el usuario esta solo en modulo de pasaporte vital
								
								$sql011 ="DELETE FROM persona_tipo WHERE Id_Persona='$idpersona' AND (Id_Tipo=4 OR Id_Tipo=5 OR Id_Tipo=6)";
								$result=mysql_query($sql011,$Conn2);
								
								$sql0111 ="DELETE FROM actividad_acceso WHERE Id_Persona='$idpersona' ";
								$result=mysql_query($sql0111,$Conn2);
								
								$sql01111 ="DELETE FROM acceso WHERE Id_Persona='$idpersona'";
								$result=mysql_query($sql01111,$Conn2);
								
								
								
							 }
							 
							$id_=$_SESSION['ID'];
							$sql_cadena="SELECT CONCAT(`Id_Persona`,' ',`Cedula`,' ',`Id_TipoDocumento`,' ',`Primer_Apellido`,' ',`Segundo_Apellido`,' ',`Primer_Nombre`,' ',`Segundo_Nombre`,' ',`Fecha_Nacimiento`,' ',`Id_Pais`,' ',`Nombre_Ciudad`,' ',`Id_Genero`,' ',`Id_Etnia`) AS cadena FROM  persona  WHERE Id_Persona= '$idpersona' ;";
							$result_=mysql_query($sql_cadena,$Conn2);
							$row_ = mysql_fetch_array($result_);
							$datos=$row_[0];
							
						
							 $sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id_'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona = $row['Id_Persona'];
						
							
							$ip=$_SERVER['REMOTE_ADDR']; 
							$sql_="CALL SP_Insetar_Seguridad(3,now(),'$idpersona','persona_tipo,actividada_acceso,acceso,persona','DELETE','$datos','-','$ip'); ";
							
							//Historial
						//		$historial="INSERT INTO historial(Id_Modulo , Id_Persona, Fecha , Descripcion) VALUES (4,'$idpersona',now(), 'Elimino Usuario') ";
						//		mysql_query($historial,$Conn2)or die(mysql_error());
		
		
							mysql_query($sql_, $Conn2) or die(mysql_error());	

							 desconectar2($Conn2);
							 
							 
							 
							 
												?>	
									<script language="JavaScript" type="text/javascript">
									alert("Eliminado");
									</script>  
							<?php
							echo "<meta http-equiv=\"refresh\" content=\"0;URL=../EliminarOperario.php\">";
							}
							catch(Exception $e){
							?>	
									<script language="JavaScript" type="text/javascript">
									alert("Error al intentar acceder  al recurso, verifique sus datos he intentelo de nuevo.");
									</script>  
							<?php
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=../EliminarOperario.php\">";
							}
	}else
	{
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../EliminarOperario.php\">";
		}
}
else
{
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../EliminarOperario.php\">";
}



?>