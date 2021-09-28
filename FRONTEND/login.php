<html>
<head>
    <meta charset="UTF-8">
    <title>Login - Sena CEET</title>
    <link rel="stylesheet" href="css/estilos_login.css" type="text/css">       
</head>
<body>
    <div class="bodylogin">
        <div class="margenlogin">
            <img src="Imagenes/Sena CEET.png" alt title="Sena CEET" style="width: 1000; height: 150;"> 
            <br> <h1 class="tituloproyecto">Seguimiento de Novedades Académicas y Disciplinarias <br> del Aprendiz </h1>
        </div> 
        <br>

        <div class="ingresologin">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
            <fieldset>
                <h2>Ingreso</h2>
                <table>
                    <tr>
                        <td style="width: 120; height: 30;"> <p class="pnegrilla"><span class="span4">Usuario:</span></p></td>
                        <td width:"1000"><input type="text" name="usuario" id="usuario" size="30" maxlength="50" style="width: 330; height: 25;"> </td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td style="width: 120; height: 30;"> <p class="pnegrilla"><span class="span4">Contraseña:</span></p></td>
                        <td width:"1000"><input type="password" name="contraseña" id="contraseña" size="30" maxlength="50" style="width: 330; height: 25;"></td>
                    </tr>
                </table>
                        
                <p class="pnegrilla"> <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/request_change_key.html"><span class="span4">Olvide mi contraseña</span></a></p>

                <div class="buttoncenter">
                    <input type="submit" name="login" id= "login" value="Ingresar" class="boton"/>
                </div>
            </fieldset>
            </form>
        </div>
        <br> 
        <br>
        
        <footer class="footer"> 
            <div class="contpie">
                <p>Servicio Nacional de Aprendizaje SENA - Centro de Electricidad, Electrónica y Telecomunicaciones <br>
                Carerra 30 No. 17B - 25 Sur, Bogotá D.C.  PBX (571) 5960050 <br> Soporte, Diseño y Desarrollo: Hancasoft SAS
                - Hancasoftsas@gmail.com</p> <br>
                <div>
                    <p>Copyrigth&copy 2020 | <span class="span1">HAN</span><span class="span2">CAS</span><span class="span3">OFT</span></p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>

<?php

// 1. Conexion con el servidor y la base de datos
include 'ConexionDB.php';

// 2. isset() del boton login
if(isset($_POST['login'])){
                         
/* Connect using SQL Server Authentication. */  
$conn = sqlsrv_connect( $serverName, $connectionInfo);  

// 3. Variables $_POST[]

$usuario = $_POST['usuario'];
$clave = $_POST['contraseña']; // La función MD5($_POST['clave']) estará encriptando lo ingresado para comparar con lo guardado

if($usuario == "" || $clave == null){ // Validamos que ningún campo quede vacío
    echo "<script>alert('Error: usuario y/o clave vacíos!!');</script>"; // Se utiliza Javascript dentro de PHP
}else{

// 4. Cadena de SQL
$tsql = "SELECT Correo, Password FROM Usuarios WHERE Correo = '$usuario' AND Password = '$clave'"; 

// 5. Ejecuto cadena query()

$consulta = sqlsrv_query( $conn, $tsql);

if(!$consulta){
    echo "<script>alert('ERROR: no se pudo ejecutar la consulta!');</script>";
}else{
 
// 6. Cuento registros obtenidos del select. 
// Como el nombre de usuario en la clave primaria no debería de haber mas de un registro con el mismo nombre.

$filas = sqlsrv_has_rows($consulta);
 

// 7. Comparo cantidad de registros encontrados
if($filas == false){
    echo "<script>alert('Error: usuario y/o clave incorrectos!!');</script>";
}else{
    header('location:marco.html'); // Si está todo correcto redirigimos a otra página
            }

        }
    }
}

// 8. liberar los recursos de la consulta. sqlsrv_free_stmt( $consulta);  sqlsrv_close( $conn);  */  

?>
