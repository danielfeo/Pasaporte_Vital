<?php 
session_start(); 
if(isset($_SESSION['estado'])){ 
    if ($_SESSION['estado']=="correcto" /*&&  $_SESSION['rol']== 2 || $_SESSION['rol']== 4|| $_SESSION['rol']== 3*/){ 
              
    require('fpdf.php'); 
    $pdf=new FPDF(); 
    $pdf->AddPage(); 
    $pdf->SetFont('Arial','I',12); 
      
      
    include ("Datos/Conexion.php"); 
    $Conn = conectar(); 
      
      
  //  $sql = "SELECT b.NOMBRE,a.* FROM rcn_planificacion a, rcn_usuarios b WHERE a.ID_EVENTO=$id AND a.ID_USUARIO=b.ID_USUARIO"; 
      
  //  $resultado = mysql_query($sql,$Conn); 
  /*  if (!$resultado) { 
        ?>  
            <script language="JavaScript" type="text/javascript"> 
            alert("La pagina solicitada no esta disponible, intentelo nuevamente."); 
            </script>          
            <?php 
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">"; 
          
        echo 'No se pudo ejecutar la consulta: ' . mysql_error(); 
        exit; 
    } 
    $fila= mysql_fetch_row($resultado); */
          
          
      
  /*  if(!empty($fila)){ 
      
        $cedula="Cedula: ".$fila[1]; 
        $organizador="Nombre del organizador: ".$fila[0]; 
        $actividad="Nombre de la actividad: ".$fila[3]; 
        $fecha_ejecucion="Fecha de ejecución: ".$fila[4]; 
        $hora_inicio="Hora de inicio: ".$fila[5]; 
        $hora_fin="Hora de finalización: ".$fila[6]; 
        $nom_localidad="Nombre de la localidad: ".$fila[7]; 
        $upz=utf8_decode("UPZ de la población: ").$fila[8];                                              
        $escenario ="Escenario: ".$fila[9]; 
        $igccn = "Institución, grupo, comunidad, curso, nivel: ".$fila[10];      
        $localidades_interfieren = "Localidaddes que interfieren: ".$fila[11];   
        $rango_edad = "Rango de edad: ".$fila[12];       
        $rango_edad_ficha = "Rango de edad segun la ficha: ".$fila[13];  
        $objetivo = "Objetivo especifico: ".$fila[14]; 
        $tema_pedagogico = "Temas Pedagógico: ".$fila[15];       
        $forma_programacion = "Forma de programación: ".$fila[16];   
        $hora_implementacion = "Hora de implementación: ".$fila[17];             
        $nombre_confirmo_actividad =utf8_decode("Nombre de la persona con quien se confirmó la actividad: ").$fila[18];  
        $fecha_confirmacion = "Fecha de confirmación: ".$fila[19];   
        $caracteristicas_pob = utf8_decode("Características de la población: ").$fila[20];                             
        $escenario_e ="Escenario: ".$fila[21];                             
        $material = "Material: ".$fila[22]; 
        $convocatoria = "Convocatoria: ".$fila[23];  
        $rol_comunidad = "Rol representante de la comunidad: ".$fila[24]; 
        $punto_encuentro = "Punto de encuentro: ".$fila[25];     
        $kit_material = "Kit material de riesgo: ".$fila[26]; 
        $kit_imagen = "Kit institucional: ".$fila[27]; 
        $kit_recreativo = "Kit recreativo: ".$fila[28]; 
        $kit_consumo ="Kit de consumo: ".$fila[29]; 
        $kit_recreador = "Numero de recreadores: ".$fila[30]; 
        $kit_monitor = "Numero de Monitores: ".$fila[31]; 
        $carpas = "Carpas: ".$fila[32]; 
        $sillas = "Sillas: ".$fila[33]; 
        $mesas = "Mesas: ".$fila[34]; 
        $sonido = "Sonido: ".$fila[35]; 
        $mec = "MEC: ".$fila[36]; 
        $auxiliares = "Auxiliares de enfermeria: ".$fila[37]; 
        $refrigerios = "Refrigerios: ".$fila[38]; 
        $banos = "Baños: ".$fila[39]; 
        $transporte = "Transporte: ".$fila[40]; 
        $tarima = "Tarima: ".$fila[41];      
        $cobertura_real = "Cobertura real: ".$fila[42]; 
        $descripcion = "Descripción de la cobertura: ".$fila[43]; 
        $inicial = "INICIAL: ".$fila[44]; 
        $central = "CENTRAL: ".$fila[45]; 
        $final = "FINAL: ".$fila[46];    
        $persona_concreto = "Persona con quien se concretó: ".$fila[47]; 
        $telefono = "Teléfono de la persona con quien se concretó : ".$fila[48]; 
          */
        $pdf->Image('Imagenes/boghumana.png' , 10 ,7, 55 , 28,'PNG', 'http://www.idrd.gov.co/'); 
        $pdf->MultiCell(195,7,utf8_decode("INSTITUTO DISTRITAL DE RECREACIÓN Y DEPORTE - IDRD"),0,0); 
        $pdf->MultiCell(195,7,utf8_decode("PASAPORTE VITAL"),0,0); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,"",0,2); 
		$pdf->Output();
		/*
        $pdf->MultiCell(200,7,utf8_decode($organizador),0,2); 
        $pdf->MultiCell(200,7,$cedula,0,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,"",0,2);     
        $pdf->MultiCell(200,7,utf8_decode($actividad),1,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,utf8_decode($fecha_ejecucion),0,2); 
        $pdf->MultiCell(200,7,$hora_inicio,0,2); 
        $pdf->MultiCell(200,7,utf8_decode($hora_fin),0,2); 
        $pdf->MultiCell(200,7,utf8_decode($nom_localidad),0,2); 
        $pdf->MultiCell(200,7,utf8_decode($upz),0,2);                                             
        $pdf->MultiCell(200,7,utf8_decode($escenario),0,2); 
        $pdf->MultiCell(200,7,utf8_decode($igccn),0,2);   
        $pdf->MultiCell(200,7,utf8_decode($localidades_interfieren),0,2);     
        $pdf->MultiCell(200,7,$rango_edad,0,2);       
        $pdf->MultiCell(200,7,$rango_edad_ficha,0,2);         
        $pdf->MultiCell(200,7,utf8_decode($objetivo),0,2); 
        $pdf->MultiCell(200,7,utf8_decode($tema_pedagogico),0,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,utf8_decode("ACTIVIDAD A REALIZAR"),1,2); 
        $pdf->MultiCell(200,7,"",0,2);            
        $pdf->MultiCell(200,7,utf8_decode($forma_programacion),0,2);      
        $pdf->MultiCell(200,7,utf8_decode($hora_implementacion),0,2);                 
        $pdf->MultiCell(200,7,utf8_decode($nombre_confirmo_actividad),0,2);       
        $pdf->MultiCell(200,7,utf8_decode($fecha_confirmacion),0,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,utf8_decode("ACUERDOS PARA LA EJECUCIÓN DE LA ACTIVIDAD"),1,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,utf8_decode($caracteristicas_pob),0,2); 
        $pdf->MultiCell(200,7,$escenario_e,0,2); 
        $pdf->MultiCell(200,7,$material,0,2); 
        $pdf->MultiCell(200,7,$convocatoria,0,2);         
        $pdf->MultiCell(200,7,utf8_decode($rol_comunidad),0,2); 
        $pdf->MultiCell(200,7,utf8_decode($punto_encuentro),0,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,utf8_decode("RECURSOS SOLICITADOS"),1,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,$kit_material,0,2); 
        $pdf->MultiCell(200,7,$kit_imagen,0,2); 
        $pdf->MultiCell(200,7,$kit_recreativo,0,2); 
        $pdf->MultiCell(200,7,$kit_consumo,0,2); 
        $pdf->MultiCell(200,7,$kit_recreador,0,2); 
        $pdf->MultiCell(200,7,$kit_monitor,0,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,utf8_decode("SERVICIOS DE APOYO SOLICITADOS"),1,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,$carpas,0,2); 
        $pdf->MultiCell(200,7,$sillas,0,2); 
        $pdf->MultiCell(200,7,$mesas,0,2); 
        $pdf->MultiCell(200,7,$sonido,0,2); 
        $pdf->MultiCell(200,7,$mec,0,2); 
        $pdf->MultiCell(200,7,$auxiliares,0,2); 
        $pdf->MultiCell(200,7,$refrigerios,0,2); 
        $pdf->MultiCell(200,7,utf8_decode($banos),0,2); 
        $pdf->MultiCell(200,7,$transporte,0,2); 
        $pdf->MultiCell(200,7,$tarima,0,2);           
        $pdf->MultiCell(200,7,utf8_decode($cobertura_real),0,2); 
        $pdf->MultiCell(200,7,utf8_decode($descripcion),0,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,utf8_decode("ACTIVIDAD"),1,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,utf8_decode($inicial),0,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,utf8_decode($central),0,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,utf8_decode($final),0,2); 
        $pdf->MultiCell(200,7,"",0,2); 
        $pdf->MultiCell(200,7,utf8_decode("DATOS DE LA PERSONA CON QUIEN SE CONCRETÓ LA ACTIVIDAD"),1,2); 
        $pdf->MultiCell(200,7,"",0,2);    
        $pdf->MultiCell(200,7,utf8_decode($persona_concreto),0,2); 
        $pdf->MultiCell(200,7,utf8_decode($telefono),0,2); 
          
        $pdf->Output();   
      
           
   /* } 
    else{ 
          
            ?>  
            <script language="JavaScript" type="text/javascript"> 
            alert("No se encontro ninguna coincidencia."); 
            </script>          
            <?php 
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=menuevento.php\">"; 
      
    } 
    desconectar($Conn); */
    }else
    { 
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">"; 
        } 
} 
else
{ 
  
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">"; 
} 
  
  
?> 