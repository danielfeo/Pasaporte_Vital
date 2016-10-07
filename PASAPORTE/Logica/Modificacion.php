
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


$cedula= $_POST['TB_Cedula'];
$_SESSION['M_Cedula']=$cedula;
$sql= "CALL SP_Modificar_uno('$cedula')";

$resultado = mysql_query($sql,$Conn)or die(mysql_error());

desconectar($Conn);
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
	
			$_SESSION['M_apellido']=$fila[2];
            $_SESSION['M_nombre']=$fila[3];
			$_SESSION['M_fecha']=$fila[4];
			$_SESSION['M_pais']=$fila[5];
			$_SESSION['M_email']=$fila[6];
			$_SESSION['M_localidad']=$fila[7];
			$_SESSION['M_estrato']=$fila[8];
			$_SESSION['M_direccion']=$fila[9];
			$_SESSION['M_telefono']=$fila[10];
			
			$_SESSION['M_celular']=$fila[11];
			$_SESSION['M_NivelEstudio']=$fila[12];
			$_SESSION['M_Enfermedad']=$fila[14];
			$_SESSION['M_Seguridad']=$fila[16];

			
			$_SESSION['M_NomAcudiente']=$fila[18];
			$_SESSION['M_TelAcudiente']=$fila[19];
			$_SESSION['M_TelCelular']=$fila[20];
			$_SESSION['M_Observaciones']=$fila[21];
				
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Modificacion_Datos.php\">";
}
else{
	$_SESSION['no']="no";
	
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Modificacion_Datos.php\">";

}




?>