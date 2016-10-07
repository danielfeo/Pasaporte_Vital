<?php

include ("../Datos/Conexion.php");
$Conn = conectar();

$sql= "SELECT A.`paisNacimiento` AS valor, COUNT(*) as cantidad
FROM pasaporte_registro A, pasaporte_pasaporte B
WHERE A.`documento` = B.`documento`
AND B.`impreso` = 'SI'
GROUP BY A.`paisNacimiento` ";
$resultado = mysql_query($sql,$Conn)or die(mysql_error());


  $num = mysql_num_rows($resultado);   

# set heading	
    $data[0] = array('valor','cantidad');		
    for ($i=1; $i<($num+1); $i++)
    {

      $Conn2 = conectar2();
      $id=mysql_result($resultado, $i-1, "valor");

     $sql2= "SELECT `Nombre_Pais` FROM `pais` WHERE `Id_Pais`=$id;";
     $resultado2 = mysql_query($sql2,$Conn2)or die(mysql_error());
      $fila = mysql_fetch_assoc($resultado2);
      $valor = $fila["Nombre_Pais"];
     desconectar2($Conn2);


        $data[$i] = array($valor,
			(int) mysql_result($resultado, $i-1, "cantidad"));
    }	
    echo json_encode($data);
	desconectar($Conn);

?>