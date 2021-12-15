


<?php

// se modifico el flujo que adjunta el documento , hay que hacer un flujo separado para back up ,se elimino el archivo migracion de datos dado que no se pudo tomar datos por el imput de este archivo, este hace una carga asincronica y no adjunta el archivo, el flujo del archivo comienza con el archivo cargaDocumentos.php en este se sube el archivo de ecxel y con este  (migracionFuncionalidad.php)archivo que lee el ecxel y envia el query a la base de datos.EL nombre del archivo de ecxel siempre debe ser Plantilla_Migrar_Datos.xlsx

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
$nombreArchivo='C:\xampp\htdocs\FRONTEND\Documentos\Plantilla_Migrar_Datos.xlsx';
if($nombreArchivo==null){
    echo "<script>alert('Antes de hacer la migracion debe subir la plantilla de estudiantes ');

window.location.replace('cargaDocumentos.php'); 
    
    
    </script>";



} else{

   
$documento=IOFactory::load($nombreArchivo);
// conteo de hojas de documento ecxel
$totalHojas=$documento->getSheetCount();
// obtener hoja actual del documento en posicion cero
$hojaActual=$documento->getSheet(0);
//NUM FILAS
$numeroFilas=$hojaActual->getHighestDataRow();
//NUM COLUMNAS 
$letraColumnas=$hojaActual->getHighestColumn();

// recorrido de documentos 
for($indiceFila=1;$indiceFila<=$numeroFilas;$indiceFila++){


$valor=$hojaActual->getCellByColumnAndRow(1,$indiceFila);
$valorB=$hojaActual->getCellByColumnAndRow(2,$indiceFila);
$valorC=$hojaActual->getCellByColumnAndRow(3,$indiceFila);
$valord=$hojaActual->getCellByColumnAndRow(4,$indiceFila);
$valore=$hojaActual->getCellByColumnAndRow(5,$indiceFila);
$valorf=$hojaActual->getCellByColumnAndRow(6,$indiceFila);
$valorg=$hojaActual->getCellByColumnAndRow(7,$indiceFila);
$valorh=$hojaActual->getCellByColumnAndRow(8,$indiceFila);
$valori=$hojaActual->getCellByColumnAndRow(9,$indiceFila);
$valorj=$hojaActual->getCellByColumnAndRow(10,$indiceFila);
$valork=$hojaActual->getCellByColumnAndRow(11,$indiceFila);



}

//---- QUERY HACIA BASE DE DATOS---//

include 'ConexionDB.php';
//$conn = sqlsrv_connect( $serverName, $connectionInfo); 

//Cadena de SQL
$tsql_ListaProgramas="insert into Aprendices (NoIdentificacion,Nombre,Apellidos,Direccion,Telefono,Celular,Correo,Programa,Ficha) VALUES($valor,$valorB,$valorC,$valord,$valore,$valorf,$valorg,$valorh,$valori,$valorj)";   
            
//descomentar la siguiente linea cuando se ejecute
//$procedimiento_ListaProgramas = sqlsrv_prepare ($conn, $tsql_ListaProgramas);

 //Ejecuto cadena query(),descomentar la siguiente linea cuando se ejecute
//$resultado_ListaProgramas = sqlsrv_execute ($procedimiento_ListaProgramas);

//if(!$resultado_ListaProgramas){
  //  echo "<script>alert('ERROR: no se pudo ejecutar la consulta!');</script>";
//}else {
    //echo sqlsrv_errors();
    //echo 'Query enviado a base de datos';
}

//}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionalidad Migracion</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>

<body class="bodymarco">
  <div>
    <h1 class="titulonivel1">Carga de documentos para backup<img src="imagenes/logoSena4.png" width="70" height="70" align="right"></h1>
     
    <section class="bodypagina">
      <div class="sectopc">
        
    <?php 
    if($resultado_ListaProgramas==null){
      echo "<script>alert('ERROR: no se pudo ejecutar la insercion a la base de datos, para ver la informacion del archivo de click en aceptar');</script>";
  }else {
      //echo sqlsrv_errors();
      //echo 'Query enviado a base de datos';
  }
  '<br>';
  '<br>';
  '<br>';

  echo '<strong> Esta es la informacion que ingresara a la base de datos: </strong><br>
  <br>';
  for($indiceFila=1;$indiceFila<=$numeroFilas;$indiceFila++){


    $valor=$hojaActual->getCellByColumnAndRow(1,$indiceFila);
    $valorB=$hojaActual->getCellByColumnAndRow(2,$indiceFila);
    $valorC=$hojaActual->getCellByColumnAndRow(3,$indiceFila);
    $valord=$hojaActual->getCellByColumnAndRow(4,$indiceFila);
    $valore=$hojaActual->getCellByColumnAndRow(5,$indiceFila);
    $valorf=$hojaActual->getCellByColumnAndRow(6,$indiceFila);
    $valorg=$hojaActual->getCellByColumnAndRow(7,$indiceFila);
    $valorh=$hojaActual->getCellByColumnAndRow(8,$indiceFila);
    $valori=$hojaActual->getCellByColumnAndRow(9,$indiceFila);
    $valorj=$hojaActual->getCellByColumnAndRow(10,$indiceFila);
    $valork=$hojaActual->getCellByColumnAndRow(11,$indiceFila);
    
    echo $valor.'                   '.$valorB.'              '.$valorC.'              '.$valord.'             '.$valore.'             '.$valorf.'             '.$valorg.'            '.$valorh.'               '.$valori.'              '.$valorj.'           '.$valork.'<br/>';
    'lECTURA CORRECTA DE ARCHIVO DE ECXEL';
    
    }
    
    
    
    ?>
      

      
    </section>

    <footer class="footermarco"> 
      <div class="contpie">
          <p>Angie.Ricaurte / Instructor</p>
          <div>
              <p>Copyrigth&copy 2020 | <span class="span1">HAN</span><span class="span2">CAS</span><span class="span3">OFT</span></p>
          </div>
          <p> <span class="span5"> <a href="login.html">Cerrar Sesión </a></span></p>
        


      </div>
    </footer>

  </div>

</body>

</html>