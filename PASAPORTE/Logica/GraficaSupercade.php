<?php

include ("../Datos/Conexion.php");
$Conn = conectar();

$sql= "SELECT A.`supercade` AS valor, COUNT(*) as cantidad
FROM pasaporte_registro A, pasaporte_pasaporte B
WHERE A.`documento` = B.`documento`
AND B.`impreso` = 'SI' and A.`supercade` != \"\"
GROUP BY A.`supercade`
";

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