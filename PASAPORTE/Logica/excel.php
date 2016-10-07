<?php

session_start();

if(isset($_SESSION['ID']))
{
	if(isset($_SESSION['ID']))
	{
		
		$fInicio=$_POST['datepicker'];
		$fFin=$_POST['datepicker1'];
		
		include ("../Datos/Conexion.php");
		$Conn = conectar();



	

	
$sql = "SELECT A.*, B.fechaExpedicion, B.horaExpedicion , B.impreso FROM pasaporte_registro A, pasaporte_pasaporte B  WHERE  A.documento=B.documento AND B.fechaExpedicion BETWEEN '".$fInicio."' AND '".$fFin."' ORDER BY A.apellidos;";

	
$result =mysql_query($sql);
	
$file_ending = "xls";
	
 
	
//header info for browser
	
header("Content-Type: application/xls");
	
header("Content-Disposition: attachment; filename=Reoprte_pasaporte_".date("Y-m-d")."_".date('is').".xls");
	
header("Pragma: no-cache");
	
header("Expires: 0");
	
 
	
/*******Start of Formatting for Excel*******/
	
//define separator (defines columns in excel & tabs in word)
	
$sep = "\t"; //tabbed character
	
 
	
//start of printing column names as names of MySQL fields
	
for ($i = 0; $i < mysql_num_fields($result); $i++) {
	
echo mysql_field_name($result,$i) . "\t";
	
}
	
print("\n");
	
//end of printing column names
	
 
	
//start while loop to get data
	
    while($row = mysql_fetch_row($result))
	
    {
	
        $schema_insert = "";
	
        for($j=0; $j<mysql_num_fields($result);$j++)
	
        {
	
            if(!isset($row[$j]))
	
                $schema_insert .= "NULL".$sep;
	
            elseif ($row[$j] != "")
	
                $schema_insert .= "$row[$j]".$sep;
	
            else
	
                $schema_insert .= "".$sep;
	
        }
	
        $schema_insert = str_replace($sep."$", "", $schema_insert);
	
 $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
	
        $schema_insert .= "\t";
	
        print(trim($schema_insert));

        print "\n";
    }  
desconectar($Conn);

	}else{
    	echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";                		
	}
}
else
{
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}



?>
