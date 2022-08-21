<?php
include('../connection.php');
//Hacer validación para evitar SQL INJECTION
if(isset($_POST['send'])){
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $name1 = mysqli_real_escape_string($connection, $_POST['first_lname']);
    $name2 = mysqli_real_escape_string($connection, $_POST['second_lname']); //not required
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $cell = mysqli_real_escape_string($connection, $_POST['cellphone']); //not required
    $password1= mysqli_real_escape_string($connection, $_POST['password1']);
    $password2 = mysqli_real_escape_string($connection, $_POST['password2']);

    if($name == "" || $name1 == "" || $id == "" || $email == "" || $password1 == "" || $password2 == ""){
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
                    <a href='user_creation.html'><img id='img1' src='../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                </header>  
                <h1 class='error1'>Debe ingresar los campos solicitados</h1>
            </div>
            <footer id='pa2'>
                <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
            </footer>
        </body>
        </html>";
    }else{
        if($password1 != $password2){
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
                        <a href='user_creation.html'><img id='img1' src='../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    </header>  
                    <h1 class='error1'>Las contraseñas no coinciden</h1>
                </div>
                <footer id='pa2'>
                    <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
                </footer>
            </body>
            </html>";
        }else{
            //
            $query4 = "SELECT count(*) idUsuario FROM usuario WHERE idUsuario = '$id'";
            $resultados = mysqli_query($connection, $query4);
            $pruebas = $resultados->fetch_assoc();
           if($pruebas["idUsuario"] != '0'){
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
                            <a href='user_creation.html'><img id='img1' src='../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                        </header>  
                        <h1 class='error1'>Ya existe un usuario con la cédula ingresada</h1>
                    </div>
                    <footer id='pa2'>
                        <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
                    </footer>
                </body>
                </html>";
            }else{
            $query1 = "INSERT INTO usuario (idUsuario, nombreUsuario, primerApellido, segundoApellido, contraseñaUsuario) VALUES ('$id', '$name', '$name1', '$name2', '$password1')";
            $query2 = "INSERT INTO celular (idUsuario, celular) VALUES ('$id', '$cell')";
            $query3 = "INSERT INTO email (idUsuario, email) VALUES ('$id', '$email')";

            $insertion1 = mysqli_query($connection, $query1);
            $insertion2 = mysqli_query($connection, $query2);
            $insertion3 = mysqli_query($connection, $query3);

            if($insertion1){
                if($insertion2){
                    if($insertion3){
                        echo 
                        "<!DOCTYPE html>
                        <html lang='es'>
                        <head>
                            <title>Creación exitosa</title>
                            <meta charset='UTF-8' />
                            <link rel='stylesheet' href='estilos.css'/>
                            <link rel='icon' href='../imagenes/vetex.ico'/>
                            <link rel='preconnect' href='https://fonts.googleapis.com'>
                            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
                            <style>
                            .correcto1{background-color:green;color:black;display:block;margin:20px auto;width:50%;text-align:center;font-size:3rem;}
                            </style
                        </head>
                        <body>
                            <div id='cont1'>
                                <header id='enc1'>
                                    <a href='index.html'><img id='img1' src='../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                                </header>  
                                <h1 class='correcto1'>El usuario ha sido creado exitosamente</h1>
                            </div>
                            <footer id='pa2'>
                                <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
                            </footer>
                        </body>
                        </html>
                        ";
                    }else{echo "Hubo un error al crear la tercera inserción";}
                }else{echo "Hubo un error al crear la segunsa inserción";}
            }else{echo "Hubo un error al crear la primera inserción";}
            }
        }
    }
}
?>