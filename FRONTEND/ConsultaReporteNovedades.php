<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <title>Consulta Reporte de Novedades</title>
</head>

    <h1 class="titulonivel1">Consulta Reporte de Novedades<img src="imagenes/logoSena4.png" width="70" height="70" align="right"></h1>

<section class="bodypagina">

    <body class="bodymarco">    
           
        <main class="sectopc">
                        
            <div>
                           
                <form action="">


                <div style="float:left">   
                     
                    <table>
                             
                        <tr>
                            <td class="tdtitle">Fecha Inicial:</td>
                            <td>
                                <input type="date">
                            </td> 
                        </tr>
                        <tr>
                            <td class="tdtitle">Aprendiz:</td>
                            <td>
                                <input id="txtAprendiz" name="txtAprendiz" class= "CasillasTextoFiltro" type="text" maxlength="50" value="" />
                                <select class= "ListasDesplegables" name="Aprendiz1" id="Aprendiz1">
                                    <option value="">--Seleccione--</option>
                                </select> 
                            </td> 
                        </tr>
                        <tr>
                            <td class="tdtitle"> Ficha:</td>
                            <td> 
                                <input id="txtFicha" name="txtFicha"  type="text" maxlength="50" class= "CasillasTextoFiltro">
                            </td>
                        </tr>
                        <tr>
                            <td class="tdtitle"> Tipo de Falta:</td>
                            <td>
                                <select class= "ListasDesplegables" name="TipoFalta" id="TipoFalta">
                                    <option value="">--Todos--</option>
                                </select> 
                            </td>
                        </tr>
                        <br>
                    </table>
                <br>
            </div>

            <br>
            <div>
            <table border>
                <tr>
                    <td class="tdtitle">Fecha Inicial:</td>
                    <td>
                        <input type="date">
                    </td> 
                </tr>
                <tr>
                    <td class="tdtitle"> Programa:</td>
                    <td>
                        <select class= "ListasDesplegables" name="Programa1" id="Programa1">
                             <option value="">--Todos--</option>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td class="tdtitle"> Tipo de Novedad:</td>
                    <td>
                        <select class= "ListasDesplegables" name="TipoNovedad" id="TipoNovedad">
                            <option value="">--Todos--</option>
                        </select> 
                    </td>
                </tr>           
                <tr>
                    <td class="tdtitle"> Tipo de Llamado:</td>
                    <td>
                        <select class= "ListasDesplegables" name="TipoLlamado" id="TipoLlamado">
                            <option value="">--Todos--</option>
                        </select> 
                    </td>
                </tr>           
                                
            </table>
            </div>

            <br>
            
            <table class="tableboton">
                <tr>
                    <td class="tdboton">
                        <a href= "marco.html"> <input type="button" value="Regresar" class="boton" style="cursor: pointer"/></a>
                        <input type="button" value="Consultar" class="boton" style="cursor: pointer"/>
                        <img class="imgboton" name="Imprimir" class="Imprimir" width="23" height="23" title="Imprimir" style="cursor: pointer;" src="imagenes/Imprimir.png"/>
                        <img name="Excel" class="Excel" width="23" height="23" title="Exportar a Excel" style="cursor: pointer;" src="imagenes/Excel.png"/>
                    </td>
                </tr>
            </table>
                    </form>
            <table>
                <tr class="trcolumnas">
                    <th>Tipo Doc.</th>
                    <th>No. Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Programa</th>
                    <th>Ficha</th>
                    <th>Trimestre</th>
                    <th>Sede</th>
                    <th>Id Reporte</th>
                    <th>Novedad</th>
                    <th>Falta</th>
                    <th>Llamado Atención</th>
                    <th>Reporte Novedad</th>
                    <th>Fecha</th>
                    <th>Observaciones</th>
                    <th>Documentos</th>
                    <th>Observación</th>
                </tr>
                <tr>
                    <td>CC</td>
                    <td>1023909387</td>
                    <td>Angie Hjeraldine</td>
                    <td>Ricaurte Porras</td>
                    <td>ADSI</td>
                    <td>1234567</td>
                    <td>IV</td>
                    <td>CEET</td>
                    <td>1964701</td>
                    <td>Incumplimiento Actividades</td>
                    <td>BAJA</td>
                    <td>Académico</td>
                    <td>Verbal</td>
                    <td>22/01/201</td>
                    <td> <a href="">VER</a></td>
                    <td><a href="">VER</a></td>
                    <td> <a href="">VER</a></td>
                </tr>
            </table>  

        </main>

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
            
    </body>
</html>