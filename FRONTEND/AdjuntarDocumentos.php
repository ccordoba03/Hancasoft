<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adjuntar Documentos</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>

<body class="bodymarco">
    <div>
        <h1 class="titulonivel1">Adjuntar Documentos<img src="imagenes/logoSena4.png" width="70" height="70" align="right"></h1>

            <section class="bodypagina">
                <div class="sectopc">
                <form>
                <table >
                    <tr>
                        <td class="tdtitle"> Aprendiz: </td>
                        <td>
                            <input id="txtAprendiz" name="txtAprendiz" class= "CasillasTextoFiltro" type="text" maxlength="50" value="" />
                            <select class= "ListasDesplegables" name="Aprendiz1" id="Aprendiz1">
                                <option value="">--Seleccione--</option>
                            </select> 
                        </td>
                    </tr><br>
                </table> 

                <table class="tableboton">
                    <tr>
                        <td class="tdboton">
                            <a href= "marco.html"> 
                                <input type="button" name= 'btnRegresar' value="Regresar" id="btnRegresar" class= "boton" style="cursor: pointer"/>
                            </a>
                            <input type="submit" value="Consultar" class="boton" style="cursor: pointer"/>
                        </td>
                    </tr>
                </table>

                <br><br> 
                <table>
                    <tr class="trcolumnas">
                        <td>Id Reporte</td>
                        <td>Tipo Novedad</td>
                        <td>Tipo Falta</td>
                        <td>Llamado Atención</td>
                        <td>Reporte de Novedad</td>
                        <td>Fecha Reporte</td>
                        <td>Documentos</td>
                        <td>Adjuntar Documentos</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Académico</td>
                        <td>Baja</td>
                        <td>Verbal</td>
                        <td>Incumplimiento Actividades</td>
                        <td>30/01/2021</td>
                        <td>Ver</td>
                        <td>
                            <input name="" id="Adjdocumentos" type="file"/>
                        </td>
                    </tr>
                </table>

                <table class="tableboton">
                    <tr>
                        <td class="tdboton">
                            <input type="button" value="Guardar" class="boton" style="cursor: pointer"/>
                        </td>
                    </tr>
                </table>
            
            </div>
               
                
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
        </form>
    </div>
</body>
</html>