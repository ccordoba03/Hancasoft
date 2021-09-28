<?php
//Conexion con el servidor y la base de datos
include 'ConexionDB.php';
header('Content-Type: text/html; charset=iso-8859-1');
?>

<?php
//abrir SQL Server Authentication
$conn = sqlsrv_connect( $serverName, $connectionInfo); 

//Cadena de SQL
$tsql_ListaProgramas = "EXECUTE dbo.ListaProgramas";   
                    
$procedimiento_ListaProgramas = sqlsrv_prepare ($conn, $tsql_ListaProgramas);

// Ejecuto cadena query()
$resultado_ListaProgramas = sqlsrv_execute ($procedimiento_ListaProgramas);

if(!$resultado_ListaProgramas){
    echo "<script>alert('ERROR: no se pudo ejecutar la consulta!');</script>";
}else {

}
echo sqlsrv_errors();

//consulta filtros

$ListaAprendices = null;
$ListaProgramas = null;
$ListaFicha = null;

//  isset() del boton consultar
if(isset($_POST['btnConsultar']))
{
    $ListaAprendices = $_POST ['txtAprendiz'];
    $ListaProgramas = $_POST ['txtPrograma'];
    $ListaFicha = $_POST ['txtFicha'];

    if ($ListaAprendices == '') {
    $ListaAprendices = NULL;
    }

    if ($ListaProgramas == '') {
    $ListaProgramas = NULL;
    }

    if ($ListaFicha == '') {
    $ListaFicha = NULL;
    }
}
?>

<html lang="en">
<head>
    <meta charset="iso-8859-1">
    <title>Consulta General de Aprendices</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
        $("#txtAprendiz").autocomplete({
            source: "API/ListarAprendices.php",
            });
        } );
  </script>
</head>

<body class="bodymarco">
    <div>
        <h1 class="titulonivel1">Consulta General de Aprendices<img src="imagenes/logoSena4.png" width="70" height="70" align="right"></h1>

            <section class="bodypagina">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
                <div class="sectopc">
                <table >
                    <tr>
                        <td class="tdtitle"> Aprendiz: </td>
                        <td>
                            <input id="txtAprendiz" name="txtAprendiz" class= "CasillasTextoFiltro" type="text" maxlength="50" value= '<?php echo $ListaAprendices ?>'>
                        </td>
                    </tr>

                    <tr>
                        <td class="tdtitle"> Ficha:</td>
                        <td> 
                            <input id="txtFicha" name="txtFicha"  type="text" maxlength="50" class= "CasillasTextoFiltro" value= '<?php echo $ListaFicha ?>' >
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="tdtitle"> Programa:</td>
                        <td>
                            <select class= "ListasDesplegables" name="txtPrograma" id="txtPrograma">
                                <option value="">--Todos--</option>
                                <?php
                                // consulta a la base de datos, sql nos retorna el conjunto de datos que responde a la consulta
                                $ProgramaSeleccionado = null;

                                while ($mostrar = sqlsrv_fetch_array ($procedimiento_ListaProgramas))
                                    { 
                                        if ($ListaProgramas == $mostrar ['IdPrograma']) {
                                            $ProgramaSeleccionado = "selected= 'selected'";
                                        }
                                        else { $ProgramaSeleccionado ='';
                                        }
                                ?>   
                                <option value='<?php echo $mostrar ['IdPrograma']?>'<?php echo $ProgramaSeleccionado?> > 
                                    <?php echo  $mostrar ['DescripcionPrograma'] ?> - <?php echo $mostrar ['Programa'] ?>
                                </option>
                                <?php
                                    } // cerrar cilo while
                                ?>
                            </select> 
                        </td>
                    </tr>

                </table> 
                <table class="tableboton">
                    <tr>
                        <td class="tdboton">
                            <a href= "marco.html"> 
                                <input type="button" name= 'btnRegresar' value="Regresar" id="btnRegresar" class= "boton" style="cursor: pointer"/>
                            </a>
                            <input type="submit" name= 'btnConsultar' value="Consultar" id="btnConsultar" class= "boton" style="cursor: pointer"/>
                            <img onclick="ImprimirPagina();" class="imgboton" name="Imprimir" id="Imprimir" width="23" height="23" title="Imprimir" style="cursor: pointer;" src="imagenes/Imprimir.png"/>
                            <script>
                                function ImprimirPagina () {
                                    window.print();
                                }
                            </script>
                            <img name="Excel" id="Excel" width="23" height="23" title="Exportar a Excel" style="cursor: pointer;" src="imagenes/Excel.png"/>
                        </td>
                    </tr>
                </table>
                <br><br> 

                <?php
                //  isset() del boton consultar
                if(isset($_POST['btnConsultar']))
                {
                
                    //abrir SQL Server Authentication
                    $conn = sqlsrv_connect( $serverName, $connectionInfo);  

                    //Parametros del procedimiento dbo.InformeGeneralAprendices
                    $procedure_params = array(
                        array($ListaAprendices, SQLSRV_PARAM_IN),
                        array($ListaProgramas, SQLSRV_PARAM_IN),
                        array($ListaFicha, SQLSRV_PARAM_IN)
                        );

                    //Cadena de SQL
                    $tsql = "EXECUTE dbo.InformeGeneralAprendices @ListaAprendices=?,@ListaProgramas=?,@ListaFicha=?";   
                    
                    $procedimiento = sqlsrv_prepare ($conn, $tsql, $procedure_params);
                

                    // Ejecuto cadena query()
                    $resultado = sqlsrv_execute ($procedimiento);

                    if(!$resultado){
                        echo "<script>alert('ERROR: no se pudo ejecutar la consulta!');</script>";
                    }else {

                    }
                    
                    echo sqlsrv_errors();
                ?>

                <table>
                    <tr class="trcolumnas">
                        <td>Tipo Doc.</td>
                        <td>No. Documento</td>
                        <td>Nombres</td>
                        <td>Apellidos</td>
                        <td>Direcci&oacute;n</td>
                        <td>Tel&eacute;fono</td>
                        <td>Celular</td>
                        <td>Correo</td>
                        <td>Programa</td>
                        <td>Ficha</td>
                        <td>Sede</td>
                    </tr>

                    <?php
                    // consulta a la base de datos, sql nos retorna el conjunto de datos que responde a la consulta
                    //https://www.youtube.com/watch?v=nPAp-gT5gPI
                    while ($mostrar = sqlsrv_fetch_array ($procedimiento))
                        { 
                    ?>   

                    <tr>
                        <td> <?php echo $mostrar ['TipoIdentificacion'] ?> </td>
                        <td> <?php echo $mostrar ['NoIdentificacion'] ?> </td>
                        <td> <?php echo $mostrar ['Nombre'] ?> </td>
                        <td> <?php echo $mostrar ['Apellidos'] ?> </td>
                        <td> <?php echo $mostrar ['Direccion'] ?> </td>
                        <td> <?php echo $mostrar ['Telefono'] ?> </td>
                        <td> <?php echo $mostrar ['Celular'] ?> </td>
                        <td> <?php echo $mostrar ['Correo'] ?> </td>
                        <td> <?php echo $mostrar ['Programa'] ?> </td>
                        <td> <?php echo $mostrar ['Ficha'] ?> </td>
                        <td> <?php echo $mostrar ['Sede'] ?> </td>
                    </tr>

                <?php
                        }//cerrar ciclo while
                }
                ?>
                </table>
            
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
</body>
</html>

<?php




?>