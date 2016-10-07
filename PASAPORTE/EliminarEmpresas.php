<?php
session_start();
if(isset($_SESSION['ID'])){
	$vector = $_SESSION['permisos'];
			if(isset($_SESSION['ID'])&&$vector[6]==1){
				
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
  
    
  <div id="site_contentidrd">

                       <div id="templatemo_header_3">
                          <br> <br>  
                          <br> 
                         <center>
						  <h1><font color="#FF0000" size="6">.: ELIMINAR EMPRESA:.</font></h1>
					     </center>
						   
					     <p>&nbsp;</p>
					     <p><br>  
                         <div id="iframe">
                           <table width="100%" border="1" id="customers">
							<tr>
							<th>Empresa</th>
							<th>C&eacute;dula</th>
							<th>Nombre Delgado</th>
                            <th>Apellido Delegado</th>
                            <th>Fecha</th>
							<th>Eliminar</th>
                     		</tr>
  <?php
					include ("Datos/Conexion.php");
			$Conn = conectar();
					  
					  
					    $sql="SELECT * FROM empresavinculadatipo";   
					 
					  
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
						
						echo "<td >".$row['Empresa']."</td><td>".$row['Cedula_Delegado']."</td><td>".$row['NomDelegado']."</td><td>".$row['ApeDelegado']."</td><td>".$row['Fecha']."</td>";					
						
						echo "<td><a href='Datos/EliminarEmpresa.php?id=".$row['Cedula_Delegado']."'>Eliminar</a></td>";
						echo "</tr>";
						$var++;
					     } 
						 }else{ 
						 
  ?>
<div id="dialog-message" title="B�squeda Fallida" >
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
 No hay ninguna coincidencia en la b&uacute;squeda.
  </p>
  
</div><?php
						 } 
						 mysql_free_result($result); 
						 } 
						 desconectar($Conn);
					
					?>
 

</table>
</div>                          
                           
						     <br><br><br><br><br>
					     </p>
    </div>    
					   
					   

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