<?php
include('../connection.php');
if(isset($_POST['login'])){
    $user = mysqli_real_escape_string($connection, $_POST['user']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $query1 = "SELECT email FROM email WHERE email = '$user'";
    $query2 = "SELECT contraseñaUsuario FROM usuario WHERE contraseñaUsuario = '$password'";
    $answer1 = mysqli_query($connection, $query1);
    $answer1_1 = mysqli_fetch_row($answer1);
    $answer2 = mysqli_query($connection, $query2);
    $answer2_1 = mysqli_fetch_row($answer2);



    if($user == "" || $password == ""){
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
                    <a href='index.html'><img id='img1' src='../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                </header>  
                <h1 class='error1'>Ingrese los datos solicitados</h1>
            </div>
            <footer id='pa2'>
                <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
            </footer>
        </body>
        </html>";
    }else{
        error_reporting(0);
            if($user != $answer1_1[0] || $password != $answer2_1[0]){
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
                            <a href='index.html'><img id='img1' src='../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                        </header>  
                        <h1 class='error1'>Hubo un error en la autenticación de datos</h1>
                    </div>
                    <footer id='pa2'>
                        <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
                    </footer>
                </body>
                </html>";
            }else{
                header("location:../user/vista_usuario.php");
            } 
    }
}
?>