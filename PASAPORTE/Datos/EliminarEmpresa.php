<?php
session_start();

if(isset($_SESSION['ID'])){
	if(isset($_SESSION['ID'])){
		$id=$_GET["id"];


						include ("Conexion.php");
                         
						 	
						
						try{
						    $Conn = conectar();
							$sql1="DELETE FROM empresavinculadatipo WHERE empresavinculadatipo.`Cedula_Delegado`='$id'";
							mysql_query($sql1,$Conn);
							desconectar($Conn);
							
							 $Conn2 = conectar2();
							 $sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona = $row['Id_Persona'];
							 desconectar2($Conn2);
							
								$Conn2 = conectar2();
								$sql011 ="DELETE FROM persona_tipo WHERE Id_Persona='$idpersona' AND Id_Tipo=7";
								$result=mysql_query($sql011,$Conn2);
								
								$sql0111 ="DELETE FROM actividad_acceso WHERE Id_Persona='$idpersona' ";
								$result=mysql_query($sql0111,$Conn2);
								
								$sql01111 ="DELETE FROM acceso WHERE Id_Persona='$idpersona' ";
								$result=mysql_query($sql01111,$Conn2);
								
							
							
												?>	
									<script language="JavaScript" type="text/javascript">
									alert("Empresa Eliminada");
									</script>  
							<?php
							echo "<meta http-equiv=\"refresh\" content=\"0;URL=../EliminarEmpresas.php\">";
							}
							catch(Exception $e){
							?>	
									<script language="JavaScript" type="text/javascript">
									alert("Error al intentar acceder  al recurso, verifique sus datos he intentelo de nuevo.");
									</script>  
							<?php
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=../EliminarEmpresas.php\">";
							}
	}else
	{
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../EliminarEmpresas.php\">";
		}
}
else
{

		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../EliminarOperario.php\">";
}


	
	


?>