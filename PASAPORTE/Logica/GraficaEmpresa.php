<?php

include ("../Datos/Conexion.php");
$Conn = conectar();

$sql= "SELECT B.Empresa AS valor, COUNT(A.documento) AS cantidad FROM ServicioEmpresa A, empresavinculadatipo B WHERE B.Cedula_Delegado=A.Id_Empresa;";

$resultado = mysql_query($sql,$Conn)or die(mysql_error());


  $num = mysql_num_rows($resultado);   

# set heading	
    $data[0] = array('valor','cantidad');		
    for ($i=1; $i<($num+1); $i++)
    {
        $data[$i] = array(mysql_result($resultado, $i-1, "valor"),
			(int) mysql_result($resultado, $i-1, "cantidad"));
    }	
    echo json_encode($data);
	desconectar($Conn);

?>