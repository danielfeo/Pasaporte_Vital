
<?php
session_start();
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="../js/apprise.js"></script>
<link rel="stylesheet" href="../css/apprise.css" type="text/css" />
<script>
				function preguntar() {
				  apprise('¿Color rojo?', {'verify':true}, function(r) {
					if(r) { <?php
        		//echo "<meta http-equiv=\"refresh\" content=\"0;URL=../menu.php\">";	?>
					} else {
					  document.getElementById("colores").style.backgroundColor='#FF0';
					}
				  });
				}
				</script>
                
<?php
include ("../Datos/Conexion.php");
$Conn = conectar();
$Conn2 = conectar2();


$cedula= $_POST['TB_Cedula'];


$sql= "CALL SP_renovacion('$cedula')";
$sql_ = "CALL SP_Insetar_Historial(3,'$cedula','CURDATE()','Ha solicitado su carnet'); ";
$res= mysql_query($sql_, $Conn2) or die(mysql_error());	


$resultado = mysql_query($sql,$Conn)or die(mysql_error());

desconectar($Conn);
desconectar($Conn2);
if (!$resultado) {
	?> 
        <script language="JavaScript" type="text/javascript">
		alert("La pagina solicitada no esta disponible, intentelo nuevamente.");
		</script>         
		<?php
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
	
    echo 'No se pudo ejecutar la consulta: ' . mysql_error();
    exit;
}
$fila= mysql_fetch_row($resultado);
	
	

if(!empty($fila)){

            $_SESSION['R_nombre']=$fila[3];
			$_SESSION['R_cedula']=$fila[0];
			$_SESSION['R_apellido']=$fila[2];	
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Renovacion_Pasaporte.php\">";
}
else{
	$_SESSION['no']="no";
	
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Renovacion_Pasaporte.php\">";

}




?>