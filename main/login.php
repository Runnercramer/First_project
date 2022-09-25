<?php
include('../connection.php');
if(isset($_POST['login'])){
    error_reporting(0);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $query1 = "SELECT * FROM email WHERE email = '$email'";
    $answer1 = mysqli_query($connection, $query1);
    $answer1_1 = mysqli_fetch_assoc($answer1);
    $c = $answer1_1['idUsuario'];

    $query2 = "SELECT * FROM usuario WHERE idUsuario = '$c'";
    $answer2 = mysqli_query($connection, $query2);
    $answer2_1 = mysqli_fetch_assoc($answer2);
    $hash = $answer2_1['contraseñaUsuario'];

    $query3 = "SELECT * FROM cliente WHERE idUsuario = '$c'";
    $answer3 = mysqli_query($connection, $query3);
    $answer3_1 = mysqli_fetch_assoc($answer3);
    $d = $answer3_1['idCliente'];

    $queryn = "SELECT * FROM celular WHERE idUsuario = '$c'";
    $answern = mysqli_query($connection, $queryn);
    $answern_1 = mysqli_fetch_assoc($answern);

    $queryp = "SELECT * FROM residencia WHERE idClienteResidencia = '$d'";
    $answerp = mysqli_query($connection, $queryp);
    $answerp_1 = mysqli_fetch_assoc($answerp);

    if($email == "" || $password == ""){
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
                    <a href='../index.html'><img id='img1' src='../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                </header>  
                <h1 class='error1'>Ingrese los datos solicitados</h1>
            </div>
            <footer id='pa2'>
                <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
            </footer>
        </body>
        </html>";
    }else{
       // error_reporting(0);
            if(password_verify($password, $hash) === false){
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
                            <a href='../index.html'><img id='img1' src='../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                        </header>  
                        <h1 class='error1'>Hubo un error en la autenticación de datos</h1>
                    </div>
                    <footer id='pa2'>
                        <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
                    </footer>
                </body>
                </html>";
            }else{
                session_start();

                $_SESSION['useremail'] = $answer1_1;
                $_SESSION['userinfo'] = $answer2_1;
                $_SESSION['customerinfo'] = $answer3_1;
                $_SESSION['usercell'] = $answern_1;
                $_SESSION['userdir'] = $answerp_1;
                $_SESSION['password']['pass'] = $password;

              //  header("location:../customer/vista_cliente.php");
                if($_SESSION['userinfo']['tipoUsuario'] == 'cliente'){

                    header("location:../customer/vista_cliente.php");
                    
                }else if($_SESSION['userinfo']['tipoUsuario'] == 'administrador'){

                    header("location:../administrator/vista_administrador.php");

                }else if($_SESSION['userinfo']['tipoUsuario'] == 'empleado'){

                    header("location:../empleado/vista_empleado.php");
                }
                
            } 
        }
    $connection->close();
    $adminconnection->close();
}

?>