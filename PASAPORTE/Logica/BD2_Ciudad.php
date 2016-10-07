<?php
include ("../Datos/Conexion.php");
$Conn = conectar2();
$sql1="SELECT * FROM ciudad WHERE Id_Pais=".$_GET['id'];
$resultado1 = mysql_query($sql1,$Conn)or die(mysql_error());
desconectar2($Conn);

if($_GET['id']!=41){
echo "<input type=\"text\" name='TB_Ciudad' id='TB_Ciudad' title=\"Ingrese el segundo apellido del usuario\" maxlength=\"30\" />";
}else{
echo "<select name='TB_Ciudad' id='TB_Ciudad'>";
while ($fila = mysql_fetch_array($resultado1)) {
    echo "<option value='" . utf8_encode($fila[1]) . "'>" . utf8_encode($fila[1]) . "</option>";
}
echo "</select>";

}



?>