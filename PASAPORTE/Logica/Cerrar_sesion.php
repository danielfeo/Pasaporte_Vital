 <?php
  session_start();
  
 // $_SESSION['estado']="correcto";
		//	$id=$_SESSION['id'];
		//	$nom=$_SESSION['nombre'];
		$rol=$_SESSION['rol'];
		$rol=1;
			include ("../Datos/Conexion.php");
			$Conn = conectar();
			$accion="Cerro Sesion";
			$id=$_SESSION['ID'];
			$nombre=$_SESSION['NombreUsuario'];	
			$sql= "CALL SP_RegistrarLogin('$id','$rol','$nombre','$accion','--')";
		
			
			mysql_query($sql,$Conn)or die(mysql_error());
			
			desconectar($Conn);

 ?>


<script type="text/javascript">
    window.close();
</script> 