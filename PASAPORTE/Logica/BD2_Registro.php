<?php
include ("Datos/Conexion.php");
function BD2($num){

				
                    $Conn = conectar2();
					if($num==1){
					$sql1="select * from localidad;";
					}
					
					if($num==2){
					$sql1="SELECT * FROM `eps` WHERE 1 ORDER BY `Nombre_Eps`;";
					}
					
					if($num==3){
					$sql1="SELECT * FROM etnia";
					}
					
					if($num==4){
					$sql1="SELECT * FROM genero";
					}
					
					if($num==5){
					$sql1="SELECT * FROM tipo_documento";
					}
					
					if($num==6){
					$sql1="SELECT * FROM pais";
					}
					if($num==7){
					$sql1="SELECT * FROM `tipo` WHERE `Id_Tipo`=7 or  `Id_Tipo`=4  or `Id_Tipo`=5";
					}
					if($num==8){
						$Conn = conectar();
					$sql1="SELECT * FROM `Habilidad` WHERE 1";
					}
					if($num==9){
						$Conn = conectar();
					$sql1="SELECT * FROM `Interes` WHERE 1";
					}
					
						
					$resultado1 = mysql_query($sql1,$Conn)or die(mysql_error());

					desconectar2($Conn);
					
	$combobit="";
    while ($fila = mysql_fetch_array($resultado1, MYSQL_NUM)) 
    {
		if($num==5){
        $combobit .=" <option value='".$fila[0]."'>". $fila[2] ."</option>"; 
		}else{
			if($num==6){
				$combobit .=" <option value='".$fila[0]."'>". $fila[1] ."</option>"; 
			}else{
				$combobit .=" <option value='".$fila[0]."'>". $fila[1] ."</option>"; 
				}
				
		}
    }
	return $combobit;
}



?>