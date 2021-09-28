<?php
//Conexion con el servidor y la base de datos
include 'ConexionDB.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>

<body class="bodymarco">
    <div>
        
        <h1 class="titulonivel1">Usuarios <img src="imagenes/logoSena4.png" width="70" height="70" align="right"></h1>

        <section class="bodypagina">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
            <table >
                <tr>
                    <td class="tdtitle"> Usuario: </td>
                    <td>
                        <input id="txtUsuario" name="txtUsuario" class= "CasillasTextoFiltro" type="text" maxlength="50" value="" />
                        <select class= "ListasDesplegables" name="Aprendiz1" id="Aprendiz1">
                            <option value="">--Seleccione--</option>
                        </select> 
                    </td>
                </tr>
            </table> 

            <table class="tableboton">
                <tr>
                    <td class="tdboton">
                        <input type="button" value="Consultar" id="btnConsultar" class= "boton" style="cursor: pointer"/>
                    </td>
                </tr>
            </table>

        <p> <b> <u>Información Personal</u> </b>
        <br>

        <table>
            <tr>
                <td class="tdtitle"> Tipo de Identificación: </td>
                <td>
                    <select name="devices" style="width: 300; height: 30;">
                        <option value="Cedula de Ciudadanía">Cedula de Ciudadanía</option>
                        <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                        <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                    </select> 
                </td>
            </tr><br>
        
            <tr>
                <td class="tdtitle"> No. Identificación: </td>
                <td> <input type="text" name="Documento de Identidad" size="20" maxlength="30" style="width: 300; height: 30;"></td>
            </tr>  

            <tr>
                <td class="tdtitle">Nombres Completos: </td>
                <td> <input type="text" name="Nombres Completos" size="20" maxlength="30" style="width: 300; height: 30;"></td>
            </tr> 

            <tr>
                <td class="tdtitle">Apellidos Completos:</td>
                <td> <input type="text" name="Apellidos Completos" size="20" maxlength="30" style="width: 300; height: 30;"></td>
            </tr> 

            <tr>
                <td class="tdtitle">Correo Electrónico:</td>
                <td> <input type="text" name="email" size="20" maxlength="30" style="width: 300; height: 30;"/></label> </td>
            </tr> 


        </table>

        
        <p> <b> <u>Datos Académicos</u> </b>
        <br><br>
        
        <table>

            <tr>
                <td class="tdtitle">Programa Académico: </td>
                <td> 
                    <select name="Programa Académico" size="5" multiple="multiple" size="20" maxlength="30" style="width: 300; height: 90;">
                        <option value="Análisis y Desarrollo de Sistemas de Información">Análisis y Desarrollo de Sistemas de Información</option>
                        <option value="Diseño e Integración Multimedia">Diseño e Integración Multimedia</option>
                        <option value="Gestión de Redes de Datos">Gestión de Redes de Datos</option>
                        <option value="Instalación de Redes">Instalación de Redes</option>
                        <option value="Mantenimiento de Equipos de Cómputo">Mantenimiento de Equipos de Cómputo</option>
                        <option value="Producción Multimedia">Producción Multimedia</option>
                        <option value="Programación de Software">Programación de Software</option>
                        <option value="Sistemas" selected="select">Sistemas</option>
                    </select> </td>
            </tr>
            
            <tr>
                <td class="tdtitle">Cargo:</td>
                <td> <input type="text" name="Cargo" size="20" maxlength="30" style="width: 300; height: 30;"></td>
            </tr> 

            <tr>
                <td class="tdtitle">Rol:</td>
                <td> <select name="sede" style="width: 300; height: 30;">
                    <option value="Lider Sede">Lider Sede </option>
                    <option value="Bienestar">Bienestar</option>
                    <option value="Coordinador">Coordinador</option>
                    <option value="Relaciones Corporativas">Relaciones Corporativas</option>
                    <option value="Administrador">Administrador</option>
                </select> </td>
            </tr> 
            
            <tr>
                <td class="tdtitle">Contraseña:</td>
                <td> <input type="text" name="Contraseña" size="20" maxlength="30" style="width: 300; height: 30;"></td>
            </tr> 

            <tr>
                <td class="tdtitle"> Sede:</td>
                <td>
                    <select name="sede" style="width: 300; height: 30;">
                        <option value="CEET">CEET</option>
                        <option value="CORPOUNIVERSITEC">CORPOUNIVERSITEC</option>
                        <option value="ISES">ISES</option>
                    </select> 
                </td>
            </tr>
        
        </table>

        </p>
                <a href= "marco.html"> <input type="button" value="Regresar" class="boton" style="cursor: pointer"/></a>    
                <input type="button" value="Guardar" class="boton" style="cursor: pointer"/>
        </form>
        </section>

        <footer class="footermarco"> 
            <div class="contpie">
                <p>Angie.Ricaurte / Instructor</p>
                <div>
                    <p>Copyrigth&copy 2020 | <span class="span1">HAN</span><span class="span2">CAS</span><span class="span3">OFT</span></p>
                </div>
                <p> <span class="span5"> <a href="login.php">Cerrar Sesión </a></span></p>
            </div>
        </footer>

    </div>
</body>
</html>