<?php
session_start();
if(isset($_SESSION['ID'])){
	$vector = $_SESSION['permisos'];
			if(isset($_SESSION['ID'])&&$vector[11]==1){
				$_SESSION['actualizacion']=0;
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
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>


<body>
  
  
<div id="main">
    <div id="logo"> <a id="" href="http://www.bogota.gov.co/"><img src="../style/bogota.png" width="119" height="21"></a>    </div>
	<div id="encabezado"></div>
	
 

<script>
	
	function Solo_Numerico(variable){
			Numer=parseInt(variable);
			if (isNaN(Numer)){
				return "";
			}
			return Numer;
		}
	function ValNumero(Control){
			Control.value=Solo_Numerico(Control.value);
		}
	
	function tipoDocumento(){
		var indice = document.formularioRegistro.DDL_Documento.selectedIndex
		return indice
		}
	
</script>	    
  
		

  <div></div>
  <div id="Menu_principal">
	<ul class="menu">
           <li><a href="Index.php">INICIO</a></li>
          	<li><a href="ayuda.php">AYUDA</a></li>
        
                    <li><a href="Menu.php"><span>MEN&Uacute;</span></a>
                        
                    </li>
                    
                    <li><a href="Logica/Cerrar_sesion.php">CERRAR SESI&Oacute;N</a>
        </li>
          <?php 
		  if($_SESSION['actualizacion']==0)
		  {
			$resultado[0]="";
			$resultado[1]="";
			$resultado[2]="";
			$resultado[3]="";
			$resultado[4]="";
			$resultado[5]="";
			$resultado[6]="";
		   }
			if(isset($_SESSION['estado'])){	
				if ($_SESSION['estado']=="correcto"){
					?>
                    <li><a href="Menu.php"><span>MENÚ</span></a>
                        <ul class="menu-hover">
                           <?php if($_SESSION['rol']==1)
						{?>
                        <li><a href="consultarpasaporte.php" >Consultar Pasaportes</a></li>						
                        <li><a href="SupervisionOperario.php">Supervision Operario</a></li> 
                        <li><a href="ConsultarOperario.php"  >Consultar Operarios</a></li>
                        <li><a href="numeroregistros.php"    >Registros Pasaporte</a></li>
                        
                        <li><a href="GestionarUsuarios.php"  >Gestionar Usuarios</a></li>
                        <li><a href="listadopasaportes.php"  >Listado Pasaportes</a></li>
                        <li><a href="eliminaroperario.php"   >Eliminar Operarios</a></li>
                        <li><a href="registrousuarios.php"   >Registro Usuarios</a></li>
                        <li><a href="eliminarempresas.php"   >Eliminar Empresas</a></li>
                        <li><a href="Registroempresa.php"    >Regsitro Empresa</a></li>
                        <li><a href="Exportarexcel.php"      >Reporte Excel</a></li>                        <li><a href="Reportes.php"           >Reportes</a></li>
                        
                        
                        
						<?php 													
							} ?>
                            <?php if($_SESSION['rol']==2)
						{?> 
                        <li><a href="RenovacionUsuario.php"> Renovar Pasaporte</a></li>
                        <li><a href="internetusuario.php">Usuario Internet</a></li>
                        <li><a href="modificacion_datos.php">Modificar Datos</a></li>
                        <li><a href="consultarpasaporte.php"> Consultar</a></li>
                        <li><a href="registro.php"> Registro</a></li>
							<?php 													
							} ?>
                        </ul>
                    </li>
                    
                    <?php
				}
				}else{
					}
			
							?>
        </li>
	</ul>
  </div>
 
  <p>&nbsp;</p>
  <div id="site_contentidrd">

                       <div id="templatemo_header_3">
                         <center>
						  <h1>&nbsp;</h1>
                         </center>
                         
                         <div id="panel_registro">
                           <form id="formularioConsultar" name="formularioRegistro"  method="POST" action="Consultarpasaporte.php"> 
                           <table width="100%" border="0">
                           <tr>
                                <td width="27%" height="60" >&nbsp;</td>
                                <td width="54%" ><label><h1>CONSULTA DE DATOS - PASAPORTE VITAL&nbsp;</h1></label></td>
                                <td width="19%" >&nbsp;</td>
                             </tr>
                            </table>
                            
						    <table width="100%" height="84" border="0">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                              <tr>
                                <td width="35%" height="15" align="right" ><h3 align="right">INGRESE EL NUMERO DE CEDULA:</h3></td>
                                <td width="52%" >
                                  <p><span id="sprytextfield1">
                                    <label for="TB_Cedula"></label>
                                    <input type="text" size="40" maxlength="10" name="TB_Cedula" id="textarea"/>
                                  <span class="textfieldRequiredMsg">*</span></span></p>
                                  <p>
                                    
                                  </p>
                                <td width="13%" > </td>
                              </tr>
                              <tr>
                                <td></td>
                                <td align="center"><input type="submit" name="B_Consultar" id="B_Consultar" value="Consultar" class="button medium red" /></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><br /></td>
                                <td></td>
                                <td></td>
                             </tr>
                              <?php
                             
								include ("Datos/Operario.php");
								
								if( $_POST )
								{
									$_SESSION['actualizacion']=1;
									
								$resultado= consultar($_POST["TB_Cedula"]);
								
								}
							  ?>
                             <tr>
                                <td><label><h6 align="right">Id Pasaporte:</h6></label></td>
                                <td><label><h4 align="left"><?php echo $resultado[0];?></h4></label></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><label><h6 align="right">Documento:</h6></label></td>
                                <td><label><h4 align="left"><?php echo $resultado[1];?></h4></label></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><label><h6 align="right">Apellidos:</h6></label></td>
                                <td><label><h4 align="left"><?php echo $resultado[2];?></h4></label></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><label><h6 align="right">Nombres:</h6></label></td>
                                <td><label><h4 align="left"><?php echo $resultado[3];?></h4></label></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><label><h6 align="right">Fecha de Nacimiento:</h6></label></td>
                                <td><label><h4 align="left"><?php echo $resultado[4];?></h4></label></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><label><h6 align="right">Fecha de Expedici&oacute;n:</h6></label></td>
                                <td><label><h4 align="left"><?php echo $resultado[5];?></h4></label></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><label><h6 align="right">Hora de Expedici&oacute;n:</h6></label></td>
                                <td><label><h4 align="left"><?php echo $resultado[6];$_SESSION['actualizacion']=0;?></h4></label></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             
                                 
                             
                            </table>
						 </form>
							
				         </div><div id="panel_registro_pie"></div>
                         
                          <?php
                          
						  ?>
               <br><br><br><br><br>        
    </div>  
    
    
     
    </div>
 
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
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