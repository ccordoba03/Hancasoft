
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <title>Migración de Datos</title>
</head>
<body class="bodymarco">
    <div>
        <h1 class="titulonivel1">Migración de Datos<img src="imagenes/logoSena4.png" width="70" height="70" align="right"></h1>
    </div>
    <section class="bodypagina">
        <div class="sectopc">
        <a class="vinculo" id="Plantilla" href="Documentos/Plantilla_Migrar_Datos.xlsx" click="Click_DescargaArchivo"> Descargar Plantilla Aprendices</a>
        <br>
        <table >
            <tr>
                <td class="tdtitle"> Migrar: </td>
                <td>
                    <select class= "ListasDesplegables" name="Migracion" id="migración">
                        <option value="">--Seleccione--</option>
                        <option value="">Aprendices</option>
                        <option value="">Backup</option>
                    </select> 
                </td>
            </tr><br>
            <tr>
                <td class="tdtitle"> Adjuntar Documentos: </td>
                <td>
                    <input name="" id="Adjdocumentos" type="file"/>
                </td>
            </tr><br>
        </table> 
        
        <table class="tableboton">
            <tr>
                <td class="tdboton">
                    <a href= "marco.html"> <input type="submit" value="Regresar" class="boton" style="cursor: pointer"/></a>
                    <input type="submit" value="Migrar" class="boton" style="cursor: pointer"/>
                    <input type="submit" value="Back Up" class="boton" style="cursor: pointer"/>
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
</body>
</html>