<?php 
session_start();

if(isset($_SESSION['ID']))
{
	
		include ("../Datos/Administrador.php");
		$CActual= $_POST["TB_CActual"];
		$CNueva= $_POST["TB_CNueva"];
		$CNueva2= $_POST["TB_CNueva2"];		
	
	if($CNueva===$CNueva2){
       
	cambiocontra($CActual,$CNueva);
	}
	
	else{
                              ?>
                              <script language="JavaScript" type="text/javascript">        
                                           alert("La nueva clave no coincide..");
			     </script>         	   	
			     <?php
	   	echo "<meta http-equiv=\"refresh\" content=\"0;URL=../cambiocontra.php\">";
	}
}
else
{
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}
?>