<?php
include("../../connection.php");
session_start();
if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'empleado'){
    header("location:../../main/index.html");
}

if(isset($_POST['send'])){
    $cant = mysqli_real_escape_string($connection, $_POST['cant']); 
    $product = mysqli_real_escape_string($connection, $_POST['product']);

    if($product === "0"){
        echo "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Error</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../main/estilos.css'/>
            <link rel='icon' href='../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../colaborador.css'>
            <style>
                .error{background-color:red;color:white;}
            </style>
            <script>
                function profile(){
                    window.location.href = '../coworkerprofile.php';
                }

                function logout(){
                    window.location.href = '../../main/logout.php';
                }
            </script>
        </head>
        <body>";
            if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'empleado'){
                header("location:../../main/index.html");
            }

            echo "
            <div id='cont1'>
                <header id='enc1'>
                    <a href='vista_garantias.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1 class='error'>Debe escoger un producto</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>.
                        <h3>";
                        echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);echo"</h3>
                        <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                        <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
                    </div>
                </header>  
                <section class='methods'>
                    <div class='information'>
                        <h2>ERROR</h2>
                        <br>
                        <p>Seleccione un producto de la lista desplegable.</p>
                        <br>
                        <h3>Software:</h3><p><b>SGIVT</b></p>
                        <h3>Version:</h3><p><b>1.2</b></p>
                        <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                        <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
                    </div>
                    <div>
        
                    </div>
                </section>
                <footer id='pa2'>
                    <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
                </footer>
            </div>
        </body>
        </html>";
    }else{
        $sql1 = "INSERT INTO garantia (codProducto, cantidad) VALUES ('$product', '$cant')";
        $query1 = mysqli_query($connection, $sql1);
        if($query1){
            echo "
            <!DOCTYPE html>
            <html lang='es'>
            <head>
                <title>Garantía</title>
                <meta charset='UTF-8' />
                <link rel='stylesheet' href='../../main/estilos.css'/>
                <link rel='icon' href='../../imagenes/vetex.ico'/>
                <link rel='preconnect' href='https://fonts.googleapis.com'>
                <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
                <link rel='stylesheet' href='../colaborador.css'>
                <style>
                
                </style>
                <script>
                    function profile(){
                        window.location.href = '../coworkerprofile.php';
                    }

                    function logout(){
                        window.location.href = '../../main/logout.php';
                    }
                </script>
            </head>
            <body>";
                if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'empleado'){
                    header("location:../../main/index.html");
                }

                echo "
                <div id='cont1'>
                    <header id='enc1'>
                        <a href='vista_garantias.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                        <h1>Garantía reportada</h1>
                        <div class='profile'>
                            <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>.
                            <h3>";
                            echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);echo"</h3>
                            <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                            <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
                        </div>
                    </header>  
                    <section class='methods'>
                        <div class='information'>
                            <h2>GARANTÍA</h2>
                            <br>
                            <p>El reporte ha sido realizado</p>
                            <br>
                            <h3>Software:</h3><p><b>SGIVT</b></p>
                            <h3>Version:</h3><p><b>1.2</b></p>
                            <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                            <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
                        </div>
                        <div>
            
                        </div>
                    </section>
                    <footer id='pa2'>
                        <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
                    </footer>
                </div>
            </body>
            </html>";
        }
    }
}

$connection->close();
$adminconnection->close();
?>