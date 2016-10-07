<?php
session_start();
if(isset($_SESSION['ID'])){
	$vector = $_SESSION['permisos'];
			if(isset($_SESSION['ID'])&&$vector[2]==1){
				
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="" xml:lang="en"><head><title>Pasaporte Vital</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><!-- **** stylesheet **** --><link rel="stylesheet" type="text/css" href="style.css">

<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
body {
	background-image: url(../style/white_leather.png);
}
</style>

<style>
#iframe
    {
    overflow:auto;
    width:700px;
    height:200px;
    }
#customers
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:100%;
border-collapse:collapse;
}
#customers td, #customers th 
{
	
font-size:1em;
border:1px solid #C00;
padding:3px 7px 2px 7px;
}
#customers th 
{
font-size:1.1em;
text-align:center;
padding-top:5px;
padding-bottom:4px;
background-color:#FF3300;
color:#ffffff;
}
#customers tr.alt td 
{
color:#000000;
text-align:center;
background-color:#F6CECE;
}
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/apprise.js"></script>
<link rel="stylesheet" href="css/apprise.css" type="text/css" />

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
 <script>
  $(function() {
    $( "#dialog-message" ).dialog({
      modal: true, 
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }	
    });
  });
 

  </script>
</head>
<body>

<div id="main">
    <div id="logo"> <a id="" href="http://www.bogota.gov.co/"><img src="../style/bogota.png" width="119" height="21"></a>    </div>
	<div id="encabezado"></div>
	
  
	       <?php 
			if(isset($_SESSION['rol'])){
				}	
			else{?>
				<div id="visor">
				<img src="imagenes/prueba.png" href="" width="961" height="280" align="absbottom" longdesc="12345"  title="PASAPORTE VITAL"/>
                </div>
			 <?php	
				}	
			?>                                   
  
  
    
    

  <div></div>
  <div id="Menu_principal" >
		<ul class="menu">
            <li><a href="Index.php">INICIO</a></li>
          	<li><a href="ayuda.php">AYUDA</a></li>
        
                    <li><a href="Menu.php"><span>MEN&Uacute;</span></a>
                        
                    </li>
                    
                    <li><a href="Logica/Cerrar_sesion.php">CERRAR SESI&Oacute;N</a>
        </li>
			
		</ul>
  </div>
  
  <p>&nbsp;</p>
  <div id="site_contentidrd">

                       <div id="templatemo_header_3">
                          <br> <br>  
                          <br> 
                         <center>
						  <h1><font color="#FF0000" size="6">.: ELIMINAR OPERARIO:.</font></h1>
					     </center>
						   
					     <p>&nbsp;</p>
						 <form id="form1" method="post" action="EliminarOperario.php">
						  <center>
						     <p>C&eacute;dula.
								<input type="text" name="CT_ID" id="CT_ID" />
				               <input type="submit" name="BT_Ver" id="BT_Ver" value="BUSCAR USUARIO" />
						     </p>
					         <p>&nbsp;</p>
                          </center>
					     </form>
						   <p><br>  
                           <div id="iframe">
                           <table width="100%" border="1" id="customers">
							<tr>
							<th>C&eacute;dula</th>
							<th>N&ordm; Contrato</th>
							<th>Nombre</th>
							
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Elinimar</th>
							</tr>
  <?php
					include ("Datos/Conexion.php");
			$Conn = conectar2();
					  
					  if(!empty($_POST['CT_ID'])){
						$id=$_POST['CT_ID'];
					    $sql="SELECT   A.`Id_Persona` ,  A.`Cedula`, A.`Primer_Nombre` ,A.`Primer_Apellido` , A.`Segundo_Apellido` , B.`Id_Tipo`  FROM  persona A, persona_tipo B  WHERE A.`Id_Persona`=B.`Id_Persona` AND A.`Cedula`='$id' AND (B.`Id_Tipo`=4 OR B.`Id_Tipo`=5)";   
					  }else{						
						$sql="SELECT   A.`Id_Persona` ,  A.`Cedula`, A.`Primer_Nombre` ,A.`Primer_Apellido` , A.`Segundo_Apellido` , B.`Id_Tipo`  FROM  persona A, persona_tipo B  WHERE A.`Id_Persona`=B.`Id_Persona` AND (B.`Id_Tipo`=4 OR B.`Id_Tipo`=5)"; 
				      }
					  
					    $result=mysql_query($sql); 
					    if($result!=NULL){ 
					    if(mysql_num_rows($result)>0){ 
						$var=1;
					    while($row=mysql_fetch_array($result)){ 
						if($var % 2==0){
						    echo "<tr class=\"alt\">";
						}else{
							echo "<tr align=\"center\">";
							}
					    
						if($row['Id_Tipo']==4){
						$usuar="Administrador";
						}
						if($row['Id_Tipo']==5){
						$usuar="Operario";
						}
						echo "<td >".$row['Cedula']."</td><td>".$row['Primer_Nombre']."</td><td>".$row['Primer_Apellido']."</td><td>".$row['Segundo_Apellido']."</td><td>".$usuar."</td>";					
						echo "<td><a href='Datos/Eliminar.php?id=".$row['Cedula']."'>Eliminar</a></td>";
						echo "</tr>";
						$var++;
					     } 
						 }else{ 
						 
  ?>
<div id="dialog-message" title="B�squeda Fallida" >
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
 No hay ninguna coincidencia en la b�squeda.
  </p>
  
</div><?php
						 } 
						 mysql_free_result($result); 
						 } 
						 desconectar($Conn);
					
					?>
 

</table>
</div>                          
                           
						     <br>
					     </p>
    </div>    
					   
					   

<br><br><br><br><br><br>
</div>

</div>
</body></html>


<?php				
				
				
				
				
				}else
				{
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://idrd.gov.co/SIM/\">";
					}	
	
	}else
				{
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://idrd.gov.co/SIM/\">";
					}	
	

?>
