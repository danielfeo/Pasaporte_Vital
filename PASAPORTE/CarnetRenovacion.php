<?php
session_start();	
if(!empty($_SESSION['id2'])){	
	$id =$_SESSION['id2'];
}else{
	$id = $_GET['id'];
	}
	$_SESSION['id2']=null;
			include ("Datos/Conexion.php");
			require('fpdf.php');			
			$sql2="CALL SP_Carnet('$id');";
			$Conn2 = conectar();	
			$resultado2 = mysql_query($sql2,$Conn2)or die(mysql_error());
		    $row2=mysql_fetch_row($resultado2);	
			$pasaporte= $row2[0];
			$nombre= $row2[1];
			$apellido= $row2[2];
			desconectar($Conn2);
			$sql3="UPDATE pasaporte_pasaporte SET Renovacion= Renovacion + 1 WHERE documento='$id';";
			$Conn3 = conectar();	
			$resultado3 = mysql_query($sql3,$Conn3)or die(mysql_error());
			desconectar($Conn3);			
	$pdf = new FPDF('L', 'cm', array(5.5,8.7));
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',10);
	$pdf->SetMargins( 0,  0 , 0);
	$pdf->SetAutoPageBreak(true,0); 	
    $pdf->MultiCell(7,2.7,"",0,2);
	$pdf->MultiCell(8.4,0.5,"     ".utf8_decode($nombre." ".$apellido),0,2);
	$pdf->MultiCell(8.4,0.5,"     C.C: ".$id."          N. ".$pasaporte,0,2);
	$pdf->Output();
?>

