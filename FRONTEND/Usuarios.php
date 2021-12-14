<?php
//Conexion con el servidor y la base de datos
include 'ConexionDB.php';
header('Content-Type: text/html; charset=iso-8859-1');
?>

<?php
//abrir SQL Server Authentication
$conn = sqlsrv_connect( $serverName, $connectionInfo); 

//Cadena de SQL
$tsql_ListaTiposIdentificacion = "EXECUTE dbo.ListaTiposIdentificacion";                   
$procedimiento_ListaTiposIdentificacion = sqlsrv_prepare ($conn, $tsql_ListaTiposIdentificacion);

$tsql_ListaProgramas = "EXECUTE dbo.ListaProgramas";                       
$procedimiento_ListaProgramas = sqlsrv_prepare ($conn, $tsql_ListaProgramas);

$tsql_ListaRoles = "EXECUTE dbo.ListaRoles";                  
$procedimiento_ListaRoles = sqlsrv_prepare ($conn, $tsql_ListaRoles);

$tsql_ListaSedes = "EXECUTE dbo.ListaSedes";                  
$procedimiento_ListaSedes = sqlsrv_prepare ($conn, $tsql_ListaSedes);

// Ejecuto cadena query()
$resultado_ListaTiposIdentificacion = sqlsrv_execute ($procedimiento_ListaTiposIdentificacion);
if(!$resultado_ListaTiposIdentificacion){
    echo "<script>alert('ERROR: no se pudo ejecutar la consulta!');</script>";
}else {
}


$resultado_ListaProgramas = sqlsrv_execute ($procedimiento_ListaProgramas);
if(!$resultado_ListaProgramas){
    echo "<script>alert('ERROR: no se pudo ejecutar la consulta!');</script>";
}else {
}

$resultado_ListaRoles = sqlsrv_execute ($procedimiento_ListaRoles);
if(!$resultado_ListaRoles){
    echo "<script>alert('ERROR: no se pudo ejecutar la consulta!');</script>";
}else {
}

$resultado_ListaSedes = sqlsrv_execute ($procedimiento_ListaSedes);
if(!$resultado_ListaSedes){
    echo "<script>alert('ERROR: no se pudo ejecutar la consulta!');</script>";
}else {
}

//consulta filtros
$ListaTiposIdentificacion = null;
$ListaNoIdentificacion = null;
$ListaNombres = null;
$ListaApellidos = null;
$ListaCorreo = null;
$ListaProgramas = null;
$ListaCargo = null;
$ListaRoles = null;
$ListaContraseña = null;
$ListaSedes = null;

?>

<html lang="en">
<head>
    <meta charset="iso-8859-1">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>

<body class="bodymarco">
    <div>
        
        <h1 class="titulonivel1">Usuarios <img src="imagenes/logoSena4.png" width="70" height="70" align="right"></h1>

        <section class="bodypagina">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 

        <p> <b> <u>Informaci&oacute;n Personal</u> </b>
        <br>

        <table>
            <tr>
                <td class="tdtitle"> Tipo de Identificaci&oacute;n: </td>
                <td>
                    <select class= "ListasDesplegables" name="TxtTipoIdentificacion" id="TxtTipoIdentificacion">
                        <?php
                            $TipoIdentificacionSeleccionado = null;

                            while ($mostrar = sqlsrv_fetch_array ($procedimiento_ListaTiposIdentificacion))
                                    { 
                                        if ($ListaTiposIdentificacion == $mostrar ['IdTipoIdentificacion']) {
                                            $TipoIdentificacionSeleccionado = "selected= 'selected'";
                                        }
                                        else { $TipoIdentificacionSeleccionado ='';
                                        }
                        ?>
                        <option value='<?php echo $mostrar ['IdTipoIdentificacion']?>'<?php echo $TipoIdentificacionSeleccionado?> > 
                            <?php echo $mostrar ['TipoIdentificacion'] ?> 
                        </option>
                        <?php
                            } // cerrar cilo while
                        ?>
                    </select> 
                </td>
            </tr><br>
        
            <tr>
                <td class="tdtitle"> No. Identificaci&oacute;n: </td>
                <td> 
                    <input id="TxtNoIdentificacion" name="TxtNoIdentificacion" type="text"  class="CasillasTextoFiltro">
                </td>
            </tr>  

            <tr>
                <td class="tdtitle">Nombres Completos: </td>
                <td> 
                    <input id="TxtNombres" name="TxtNombres" type="text" size="20" maxlength="30" style="width: 300; height: 30;">
                </td>
            </tr> 

            <tr>
                <td class="tdtitle">Apellidos Completos:</td>
                <td> 
                    <input id="TxtApellidos" name="TxtApellidos" type="text" size="20" maxlength="30" style="width: 300; height: 30;">
                </td>
            </tr> 

            <tr>
                <td class="tdtitle">Correo Electr&oacute;nico:</td>
                <td> 
                    <input id="TxtCorreo" name="TxtCorreo" type="text" size="20" maxlength="30" style="width: 300; height: 30;">
                </td>
            </tr> 
        </table>

        
        <p> <b> <u>Datos Acad&eacute;micos</u> </b>
        <br><br>
        
        <table>

            <tr>
                <td class="tdtitle">Programa Acad&eacute;mico: </td>
                <td> 
                    <select class= "ListasDesplegables" name="TxtPrograma" id="TxtPrograma">
                        <?php
                            // consulta a la base de datos, sql nos retorna el conjunto de datos que responde a la consulta
                            $TipoProgramaSeleccionado = null;

                                while ($mostrar = sqlsrv_fetch_array ($procedimiento_ListaProgramas))
                                    { 
                                        if ($ListaProgramas == $mostrar ['IdPrograma']) {
                                            $TipoProgramaSeleccionado = "selected= 'selected'";
                                        }
                                        else { $TipoProgramaSeleccionado ='';
                                        }
                            ?>   
                                <option value='<?php echo $mostrar ['IdPrograma']?>'<?php echo $TipoProgramaSeleccionado?> > 
                                    <?php echo $mostrar ['DescripcionPrograma'] ?> 
                                </option>
                                <?php
                                    } // cerrar cilo while
                                ?>
                    </select> 
                </td>
            </tr>
            
            <tr>
                <td class="tdtitle">Cargo:</td>
                <td> 
                    <input id="TxtCargo" name="TxtCargo" type="text" size="20" maxlength="30" style="width: 300; height: 30;">
                </td>
            </tr> 

            <tr>
                <td class="tdtitle">Rol:</td>
                <td> 
                    <select class= "ListasDesplegables" name="TxtRol" id="TxtRol">
                        <?php
                            // consulta a la base de datos, sql nos retorna el conjunto de datos que responde a la consulta
                            $TipoRolSeleccionado = null;

                                while ($mostrar = sqlsrv_fetch_array ($procedimiento_ListaRoles))
                                    { 
                                        if ($ListaRoles == $mostrar ['IdRoles']) {
                                            $TipoRolSeleccionado = "selected= 'selected'";
                                        }
                                        else { $TipoRolSeleccionado ='';
                                        }
                            ?>   
                                <option value='<?php echo $mostrar ['IdRoles']?>'<?php echo $TipoRolSeleccionado?> > 
                                    <?php echo $mostrar ['Rol'] ?> 
                                </option>
                                <?php
                                    } // cerrar cilo while
                                ?>
                    </select> 
                </td>
            </tr> 
            
            <tr>
                <td class="tdtitle">Contrase&ntilde;a:</td>
                <td> 
                <input id="TxtContraseña" name="TxtContraseña" type="text" size="20" maxlength="30" style="width: 300; height: 30;">
                </td>
            </tr> 

            <tr>
                <td class="tdtitle"> Sede:</td>
                <td>
                <select class= "ListasDesplegables" name="TxtSede" id="TxtSede">
                    <?php
                        // consulta a la base de datos, sql nos retorna el conjunto de datos que responde a la consulta
                        $TipoSedeSeleccionado = null;

                                while ($mostrar = sqlsrv_fetch_array ($procedimiento_ListaSedes))
                                    { 
                                        if ($ListaSedes == $mostrar ['IdSedes']) {
                                            $TipoSedeSeleccionado = "selected= 'selected'";
                                        }
                                        else { $TipoSedeSeleccionado ='';
                                        }
                    ?>   
                                <option value='<?php echo $mostrar ['IdSedes']?>'<?php echo $TipoSedeSeleccionado?> > 
                                    <?php echo $mostrar ['Sede'] ?> 
                                </option>
                                <?php
                                    } // cerrar cilo while
                                ?>
                    </select>                     
                </td>
            </tr>
        
        </table>

        </p>
                <a href= "marco.html"> <input type="button" value="Regresar" class="boton" style="cursor: pointer"/></a>    
                <input type="submit" name="btnGuardar" value="Guardar" class="boton" style="cursor: pointer"/>
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
    $ListaTiposIdentificacion = $_POST['TxtTipoIdentificacion'];
    $ListaNoIdentificacion = $_POST['TxtNoIdentificacion'];
    $ListaNombres = $_POST['TxtNombres'];
    $ListaApellidos = $_POST['TxtApellidos'];
    $ListaCorreo = $_POST['TxtCorreo'];
    $ListaProgramas = $_POST['TxtPrograma'];
    $ListaCargo = $_POST['TxtCargo'];
    $ListaRoles = $_POST['TxtRol'];
    $ListaContraseña = $_POST['TxtContraseña'];
    $ListaSedes = $_POST['TxtSede'];    

    // Cadena de SQL
    $btnGuardar = "INSERT INTO dbo.Usuarios (IdTipoIdentificacion,NoIdentificacion,Nombre,Apellidos,Correo,IdPrograma,Cargo,IdRoles,Password,IdSedes) VALUES ($ListaTiposIdentificacion,'$ListaNoIdentificacion','$ListaNombres','$ListaApellidos','$ListaCorreo',$ListaProgramas,'$ListaCargo',$ListaRoles,'$ListaContraseña',$ListaSedes) ";

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