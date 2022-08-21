<?php
include('../connection.php');
if(isset($_POST['send'])){
    $user = mysqli_real_escape_string($connection, $_POST['email']);
    $query1 = "SELECT email FROM email WHERE email = '$user'";
    $resultset = mysqli_query($connection, $query1);
    $array1 = mysqli_fetch_row($resultset);
    error_reporting(0);
    if($array1[0] == $user){
        //Ejecutar el envío de recuperación de contraseña
        echo "El correo si existe";
    }else{
        echo
        "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Error</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='estilos.css'/>
            <link rel='icon' href='../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <style>
            .error1{background-color:red;color:white;display:block;margin:20px auto;width:50%;text-align:center;font-size:3rem;}
            </style
        </head>
        <body>
            <div id='cont1'>
                <header id='enc1'>
                    <a href='recovery.html'><img id='img1' src='../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                </header>  
                <h1 class='error1'>El correo ingresado no está registrado</h1>
            </div>
            <footer id='pa2'>
                <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
            </footer>
        </body>
        </html>";
        }
}
?>