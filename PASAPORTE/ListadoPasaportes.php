<?php
session_start();
if(isset($_SESSION['ID'])){
	$vector = $_SESSION['permisos'];
			if(isset($_SESSION['ID'])&&$vector[9]==1){
				
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
    height:600px;
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
	
  
	                                  
  
  
    

  <div></div>
   <div id="Menu_principal" >
		<ul class="menu">
            <li><a href="Index.php">INICIO</a></li>
          	<li><a href="ayuda.php">AYUDA</a></li>
        
                    <li><a href="Menu.php"><span>MENÚ</span></a>
                        
                    </li>
                    
                    <li><a href="Logica/Cerrar_sesion.php">CERRAR SESIÓN</a>
        </li>
			
		</ul>
  </div>
  
   
  <div id="site_contentidrd">

                       <div id="templatemo_header_3">
                          <br> 
						    <div class="dochead">
                	<span class="dhead">Listado Pasaportes</span>
                </div><br> <br> <br> <br>  <br>  
                           <div id="iframe"><br> <br> <br> 
                           <table width="100%" border="1" id="customers">
							<tr>
                            
							<th>Apellidos</th>
                            <th>Nombres</th>
							<th>Documento</th>
							<th>Fecha Expedicion</th>
                            <th>Supercade</th>
                            <th>Entregado</th>
							</tr>
  <?php
					include ("Datos/Conexion.php");
			$Conn = conectar();
					  
						
						$sql="SELECT A.documento, A.apellidos,A.nombres,B.fechaExpedicion,B.supercade,B.impreso FROM pasaporte_registro A, pasaporte_pasaporte B WHERE A.documento=B.documento ORDER BY B.fechaExpedicion DESC"; 
					    $result=mysql_query($sql); 
						$numero=mysql_num_rows($result);
					    if($result!=NULL){ 
					    if(mysql_num_rows($result)>0){ 
						$var=1;
						
							 	$sql22="SELECT count( * ) as valor , `impreso` FROM pasaporte_registro A, pasaporte_pasaporte B WHERE A.documento = B.documento GROUP BY `impreso` "; 
								$result22=mysql_query($sql22);
								while($row22=mysql_fetch_array($result22))
								{
								
										if($row22['impreso']=='SI') $si=$row22['valor'];
										if($row22['impreso']=='NO') $no=$row22['valor'];
									
								}
						
						echo "<br><b>Pasaportes entregados:".$si."</b>";
						echo "<br>Por internet no entregados:".$no;
						eCHO "<br>Total registros:".$numero;
					    while($row=mysql_fetch_array($result)){ 
						if($var % 2==0){
						    echo "<tr class=\"alt\">";
						}else{
							echo "<tr align=\"center\">";
							}
					    
						
						echo "<td>".$row['apellidos']."</td><td>".$row['nombres']."</td><td >".$row['documento']."</td><td>".$row['fechaExpedicion']."</td><td>".$row['supercade']."</td><td>".$row['impreso']."</td>";	
						echo "</tr>";
						$var++;
					     } 
						 
						
						 }else{ 
						 
  ?>
<div id="dialog-message" title="Búsqueda Fallida" >
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
 No hay ninguna coincidencia en la búsqueda.
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