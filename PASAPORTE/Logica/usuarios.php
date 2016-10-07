<?php 


if ( isset($_POST['TB_Documento']) && !empty($_POST['TB_Documento'])){
$documento = $_POST['TB_Documento'];
/*

	$usuarios_db = array("casa", "magdalena", "maria", "marta", "milena", "mili", "monica");
	$palabra="casa";

	$documento = $_POST['TB_Documento'];

	

	//if (in_array($nombre, $usuarios_db)) {
		if ($palabra==$documento) {

		echo 0;

	}

	else{

		echo 1;

	}*/
	
	include ("../Datos/Conexion.php");
	$Conn1 = conectar();
	$query = "Call SP_ConsultarUsuario('".$documento."');";
	$results = mysql_query($query ,$Conn1) or die('ok');
	desconectar($Conn1);
	if(mysql_num_rows(@$results) > 0)
		echo 0;
	else
		echo 1;

}



?>