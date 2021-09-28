<?php
//Conexion con el servidor y la base de datos
include 'ConexionDB.php';
header('Content-Type: text/html; charset=iso-8859-1');
?>

<?php
//abrir SQL Server Authentication
$conn = sqlsrv_connect( $serverName, $connectionInfo); 

//Cadena de SQL
$tsql_ListaTipoNovedad = "EXECUTE dbo.ListaTipoNovedad";   
                    
$procedimiento_ListaTipoNovedad = sqlsrv_prepare ($conn, $tsql_ListaTipoNovedad);

$tsql_ListaTipoFalta = "EXECUTE dbo.ListaTipoFalta";   
                    
$procedimiento_ListaTipoFalta = sqlsrv_prepare ($conn, $tsql_ListaTipoFalta);

$tsql_ListaTipoLlamados = "EXECUTE dbo.ListaTipoLlamados";   
                    
$procedimiento_ListaTipoLlamados = sqlsrv_prepare ($conn, $tsql_ListaTipoLlamados);

// Ejecuto cadena query()
$resultado_ListaTipoNovedad = sqlsrv_execute ($procedimiento_ListaTipoNovedad);

if(!$resultado_ListaTipoNovedad){
    echo "<script>alert('ERROR: no se pudo ejecutar la consulta!');</script>";
}else {

}
echo sqlsrv_errors();

$resultado_ListaTipoFalta = sqlsrv_execute ($procedimiento_ListaTipoFalta);

if(!$resultado_ListaTipoFalta){
    echo "<script>alert('ERROR: no se pudo ejecutar la consulta!');</script>";
}else {

}

$resultado_ListaTipoLlamados = sqlsrv_execute ($procedimiento_ListaTipoLlamados);

if(!$resultado_ListaTipoLlamados){
    echo "<script>alert('ERROR: no se pudo ejecutar la consulta!');</script>";
}else {

}

//consulta filtros
$ListaAprendices = null;
$ListaTipoNovedad = null;
$ListaTipoFalta = null;
$ListaTipoLlamados = null;
$ListaTrimestre = null;
$ListaDescripcionReporte = null;

?>

<html lang="en">
<head>
    <meta charset="iso-8859-1">
    <title>Reporte Novedades</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
        $("#txtAprendiz").autocomplete({
            source: "API/ListarAprendices.php",
            select: function( event, ui ) {
                document.getElementById ("txtIdAprendiz").value=ui.item.id;
                }
            });
        } );
    </script>
</head>

<body class="bodymarco">
    <div>
        <h1 class="titulonivel1">Reporte de Novedades<img src="imagenes/logoSena4.png" width="70" height="70" align="right"></h1>

            <section class="bodypagina">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
                <div class="sectopc">
                <table>
                    <tr>
                        <td class="tdtitle"> Aprendiz: </td>
                        <td>
                            <input id="txtAprendiz" name="txtAprendiz" class= "CasillasTextoFiltro" type="text" maxlength="50" value= '<?php echo $ListaAprendices ?>'>
                            <input id="txtIdAprendiz" name="txtIdAprendiz" type="hidden"> 
                        </td>
                    </tr>
                    <tr>
                        <td class="tdtitle"> Tipo de Novedad:</td>
                        <td>
                            <select class= "ListasDesplegables" name="TxtTipoNovedad" id="TxtTipoNovedad">
                                <?php
                                // consulta a la base de datos, sql nos retorna el conjunto de datos que responde a la consulta
                                $TipoNovedadSeleccionado = null;

                                while ($mostrar = sqlsrv_fetch_array ($procedimiento_ListaTipoNovedad))
                                    { 
                                        if ($ListaTipoNovedad == $mostrar ['IdNovedades']) {
                                            $TipoNovedadSeleccionado = "selected= 'selected'";
                                        }
                                        else { $TipoNovedadSeleccionado ='';
                                        }
                                ?>   
                                <option value='<?php echo $mostrar ['IdNovedades']?>'<?php echo $TipoNovedadSeleccionado?> > 
                                    <?php echo $mostrar ['Novedad'] ?> 
                                </option>
                                <?php
                                    } // cerrar cilo while
                                ?>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td class="tdtitle"> Tipo de Falta:</td>
                        <td>
                            <select class= "ListasDesplegables" name="TxtTipoFalta" id="TxtTipoFalta">
                            <?php
                                // consulta a la base de datos, sql nos retorna el conjunto de datos que responde a la consulta
                                $TipoFaltaSeleccionado = null;

                                while ($mostrar = sqlsrv_fetch_array ($procedimiento_ListaTipoFalta))
                                    { 
                                        if ($ListaTipoFalta == $mostrar ['IdFaltas']) {
                                            $TipoFaltaSeleccionado = "selected= 'selected'";
                                        }
                                        else { $TipoFaltaSeleccionado ='';
                                        }
                                ?>   
                                <option value='<?php echo $mostrar ['IdFaltas']?>'<?php echo $TipoFaltaSeleccionado?> > 
                                    <?php echo $mostrar ['Falta'] ?> 
                                </option>
                                <?php
                                    } // cerrar cilo while
                                ?>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td class="tdtitle"> Tipo de Llamado:</td>
                        <td>
                            <select class= "ListasDesplegables" name="TxtTipoLlamados" id="TxtTipoLlamados">
                            <?php
                                // consulta a la base de datos, sql nos retorna el conjunto de datos que responde a la consulta
                                $TipoLlamadosSeleccionado = null;

                                while ($mostrar = sqlsrv_fetch_array ($procedimiento_ListaTipoLlamados))
                                    { 
                                        if ($ListaTipoLlamados == $mostrar ['IdLlamados']) {
                                            $TipoLlamadosSeleccionado = "selected= 'selected'";
                                        }
                                        else { $TipoLlamadosSeleccionado ='';
                                        }
                                ?>   
                                <option value='<?php echo $mostrar ['IdLlamados']?>'<?php echo $TipoLlamadosSeleccionado?> > 
                                    <?php echo $mostrar ['LlamadoAtencion'] ?> 
                                </option>
                                <?php
                                    } // cerrar cilo while
                                ?>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td class="tdtitle"> Trimestre:</td>
                        <td> 
                            <input id="TxtTrimestre" name="TxtTrimestre"  type="number" maxlength="50" class= "CasillasTextoFiltro" min="1" max="9">
                        </td>
                    </tr>
                    <tr>
                        <td class="tdtitle"> Descripci&oacute;n del Reporte:</td>
                        <td> 
                            <textarea name="TxtDescripcionReporte" id="TxtDescripcionReporte" cols="70" rows="10"></textarea>
                        </td>
                    </tr>
                </table> 
                
                <table class="tableboton">
                    <tr>
                        <td class="tdboton">
                            <a href= "marco.html"> <input type="button" value="Regresar" class="boton" style="cursor: pointer"/></a>
                            <input type="submit" name="btnGuardar" value="Guardar" class="boton" style="cursor: pointer"/>
                        </td>
                    </tr>
                </table>
                <br><br> 
                
            </div>
            </form>  
            </section>

            <footer class="footermarco"> 
                <div class="contpie">
                    <p>Angie.Ricaurte / Instructor</p>
                    <div>
                        <p>Copyrigth&copy 2020 | <span class="span1">HAN</span><span class="span2">CAS</span><span class="span3">OFT</span></p>
                    </div>
                    <p> <span class="span5"> <a href="login.php">Cerrar Sesi&oacute;n </a></span></p>
                </div>
            </footer>
    </div>

    <?php
    // isset() del boton Guardar
        if (isset ($_POST ['btnGuardar'])) {

    // Variables $_POST[]
            $ListaAprendices1 = $_POST['txtIdAprendiz'];
            $ListaTipoNovedad1 = $_POST['TxtTipoNovedad'];
            $ListaTipoFalta1 = $_POST['TxtTipoFalta'];
            $ListaTipoLlamados1 = $_POST['TxtTipoLlamados'];
            $ListaTrimestre1 = $_POST['TxtTrimestre'];
            $ListaDescripcionReporte1 = $_POST['TxtDescripcionReporte'];   

    // Cadena de SQL
            $btnGuardar = "INSERT INTO ReportesNovedades(IdAprendices,IdNovedades,IdFaltas,IdLlamados,Trimestre,DescripcionReporte) VALUES ($ListaAprendices1,$ListaTipoNovedad1,$ListaTipoFalta1,$ListaTipoLlamados1,'$ListaTrimestre1','$ListaDescripcionReporte1') ";

    //Ejecuto cadena query()
            $ejecutar = sqlsrv_query($conn, $btnGuardar);

            if($ejecutar){
                echo "<script>alert('Creado correctamente');</script>"; 
            }
            else {
                echo "<script>alert('Error al generar');</script>"; 
            }
        }
    ?>
</body>
</html>