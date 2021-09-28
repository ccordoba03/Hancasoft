<?php
//Conexion con el servidor y la base de datos
include '../ConexionDB.php';

//abrir SQL Server Authentication
$conn = sqlsrv_connect( $serverName, $connectionInfo); 

//Parametros del procedimiento dbo.InformeGeneralAprendices
$FiltroAprendices = $_GET ['term'];

$procedure_params = array ( array($FiltroAprendices, SQLSRV_PARAM_IN) );

//Cadena de SQL
$tsql_ListaAprendices = "EXECUTE dbo.ListaAprendices @FiltroAprendices=?";   
                    
$procedimiento_ListaAprendices = sqlsrv_prepare ($conn, $tsql_ListaAprendices, $procedure_params);

// Ejecuto cadena query()
$resultado_ListaAprendices  = sqlsrv_execute ($procedimiento_ListaAprendices);

if(!$resultado_ListaAprendices){
    echo "<script>alert('ERROR: no se pudo ejecutar la consulta!');</script>";
}else {

}
echo sqlsrv_errors();

$CantidadRegistros = sqlsrv_num_rows($procedimiento_ListaAprendices);
$Datos = array ($CantidadRegistros);
$Fila = 0;

while ($mostrar = sqlsrv_fetch_array ($procedimiento_ListaAprendices))
    { 
        $Nombre = $mostrar ['NoIdentificacion'] . ' - ' ;
        $Nombre = $Nombre . $mostrar ['Nombre'] . ' ' ; 
        $Nombre = $Nombre . $mostrar ['Apellidos']; 
        $Datos [$Fila] = array( "id"=>$mostrar ['IdAprendices'], 
                                "label"=>$Nombre,
                                "value"=>$mostrar ['NoIdentificacion']);
            $Fila = $Fila + 1;
    }

header('Content-Type: application/json');
echo json_encode($Datos);                           
?>