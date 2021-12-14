<?php
//Conexion con el servidor y la base de datos
include 'ConexionDB.php';
header('Content-Type: text/html; charset=iso-8859-1');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar Actas</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>

<body class="bodymarco">

<div>
    <h1 class="titulonivel1">Adjuntar Documentos<img src="imagenes/logoSena4.png" width="70" height="70" align="right"></h1>
    <section class="bodypagina">
    <div class="sectopc">
        <table >
            <tr>
                <form action="AdjuntarDocumentos.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="files"/>                  
                <input type="submit" name="enviar" class="boton" tyle="cursor: pointer"/>
                </form>
            </tr><br>
        </table> 

        <table class="tableboton">
            <tr>
                <td class="tdboton">
                    <a href= "marco.html"> 
                        <input type="button" name= 'btnRegresar' value="Regresar" id="btnRegresar" class= "boton" style="cursor: pointer"/>
                    </a>
                </td>
            </tr>
            <?php
            if(isset($_POST['enviar'])){
                echo '<p>Nombre del documento: '.$_FILES['files']['name'].'</p>';

                $tipo = explode(".",$_FILES['files']['name']);
                $dir = 'Documentos/';
                if (isset($_FILES['files']['tmp_name'])) {

                    if ($tipo[1] == 'docx'){
                        if (!copy($_FILES['files']['tmp_name'], $dir.$_FILES['files']['name']))
                        echo "<script>alert('Error al Subir el Archivo');</script>";
                        else echo "<script>alert('Se ha subido correctamente el Archivo');</script>";
                    } // window.location.replace('recibe.php')
                    
                    else {
                        echo "<script>alert('El Archivo que se intenta subir NO es de tipo Word.');</script>";
                    }
                }  
            }   
            ?>
        </table>
    </div>  
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


