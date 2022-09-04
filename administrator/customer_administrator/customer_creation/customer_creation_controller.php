<?php
include("../../../connection.php");
session_start();
if(!isset($_SESSION['userinfo'])){
    header("location:../../../main/index.html");
}

if(isset($_POST['send'])){
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $cell = mysqli_real_escape_string($connection, $_POST['tel']);
    $id_creation = mysqli_real_escape_string($connection, $_POST['id']);
    $department = mysqli_real_escape_string($connection, $_POST['department']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $direction = mysqli_real_escape_string($connection, $_POST['direction']);
    $password1 = mysqli_real_escape_string($connection, $_POST['password1']);
    $password2 = mysqli_real_escape_string($connection, $_POST['password2']);

    if($name == "" || $lastname == "" || $email == "" || $cell == "" ||  $id_creation == "" ||  $department == "" || $city == "" || $direction == "" || $password1 == "" || $password2 == ""){
        echo 
        "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Error en la creación</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../../main/estilos.css'/>
            <link rel='icon' href='../../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../../administrator_styles.css'>
            <link rel='stylesheet' href='../../new_admin_styles.css'>
            <style>
        .error{background-color:red;color:white;display:block;margin:10px auto;}
            </style>
                     <script>
                function profile(){
                    window.location.href = '../../adminprofile.php';
                }
        
                function logout(){
                    window.location.href = '../../../main/logout.php';
                }
            </script>
        </head>
        <body>";
            if(!isset($_SESSION['userinfo'])){
                header("location:../../../main/index.html");
            }
            echo "
            <div id='cont1'>
                <header id='enc1'>
                    <a href='vista_creacion_cliente.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1>Creación de cliente</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                        <h3>";
                         echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                        echo "</h3>
                        <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                        <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()'>
                    </div>
                </header>  
                <section class='methods'>
                    <div class='information'>
                        <h2 class='error'>Los campos no pueden estar vacíos.</h2>
                        <br>
                        <p>Los campos ingresados no pueden estar vacíos</p>
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
        </html>
        ";
    }else{
        if($password1 != $password2){
            echo 
        "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Error en la creación</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../../main/estilos.css'/>
            <link rel='icon' href='../../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../../administrator_styles.css'>
            <link rel='stylesheet' href='../../new_admin_styles.css'>
            <style>
        .error{background-color:red;color:white;display:block;margin:10px auto;}
            </style>
                     <script>
                function profile(){
                    window.location.href = '../../adminprofile.php';
                }
        
                function logout(){
                    window.location.href = '../../../main/logout.php';
                }
            </script>
        </head>
        <body>";
            if(!isset($_SESSION['userinfo'])){
                header("location:../../../main/index.html");
            }
            echo "
            <div id='cont1'>
                <header id='enc1'>
                    <a href='vista_creacion_cliente.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1>Creación de cliente</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                        <h3>";
                         echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                        echo "</h3>
                        <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                        <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()'>
                    </div>
                </header>  
                <section class='methods'>
                    <div class='information'>
                        <h2 class='error'>Las contraseñas no coinciden</h2>
                        <br>
                        <p>Verifique las contraseñas.</p>
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
        </html>
        ";
        }else{
            $validation = "SELECT count(*) idUsuario FROM usuario WHERE idUsuario = '$id_creation'";
            $query_validation = mysqli_query($connection, $validation);
            $num = $query_validation->fetch_assoc();
            if($num['idUsuario'] != '0'){
                echo 
        "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Error en la creación</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../../main/estilos.css'/>
            <link rel='icon' href='../../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../../administrator_styles.css'>
            <link rel='stylesheet' href='../../new_admin_styles.css'>
            <style>
        .error{background-color:red;color:white;display:block;margin:10px auto;}
            </style>
                     <script>
                function profile(){
                    window.location.href = '../../adminprofile.php';
                }
        
                function logout(){
                    window.location.href = '../../../main/logout.php';
                }
            </script>
        </head>
        <body>";
            if(!isset($_SESSION['userinfo'])){
                header("location:../../../main/index.html");
            }
            echo "
            <div id='cont1'>
                <header id='enc1'>
                    <a href='vista_creacion_cliente.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1>Creación de cliente</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                        <h3>";
                         echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                        echo "</h3>
                        <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                        <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()'>
                    </div>
                </header>  
                <section class='methods'>
                    <div class='information'>
                        <h2 class='error'>Ya existe un usuario con ese N° de identificación.</h2>
                        <br>
                        <p>No se pudo crear el usuario</p>
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
            $crypted_password = password_hash($password1, PASSWORD_DEFAULT);

            $sql1 = "INSERT INTO usuario (nombreUsuario, apellidosUsuario, idUsuario, contraseñaUsuario, tipoUsuario) VALUES ('$name', '$lastname', '$id_creation', '$crypted_password', 'cliente')";

            $sql2 = "INSERT INTO email (idUsuario, email) VALUES ('$id_creation', '$email')";

            $sql3 = "INSERT INTO celular (idUsuario, celular) VALUES ('$id_creation', '$cell')";

            $sql4 = "INSERT INTO cliente (idUsuario, estadoCuenta) VALUES ('$id_creation', 'Al día')";

            $sql5 = "SELECT * FROM cliente WHERE idUsuario ='$id_creation'";
            

            $query1 = mysqli_query($connection, $sql1);
            $query2 = mysqli_query($connection, $sql2);
            $query3 = mysqli_query($connection, $sql3);
            $query4 = mysqli_query($connection, $sql4);

            if($query1){
                if($query2){
                    if($query3){
                        if($query4){
                            echo 
                            "<!DOCTYPE html>
                            <html lang='es'>
                            <head>
                                <title>Creación exitosa</title>
                                <meta charset='UTF-8' />
                                <link rel='stylesheet' href='../../../main/estilos.css'/>
                                <link rel='icon' href='../../../imagenes/vetex.ico'/>
                                <link rel='preconnect' href='https://fonts.googleapis.com'>
                                <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                                <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
                                <link rel='stylesheet' href='../../administrator_styles.css'>
                                <link rel='stylesheet' href='../../new_admin_styles.css'>
                                <style>
                                </style>
                                         <script>
                                    function profile(){
                                        window.location.href = '../../adminprofile.php';
                                    }
                            
                                    function logout(){
                                        window.location.href = '../../../main/logout.php';
                                    }
                                </script>
                            </head>
                            <body>";
                                if(!isset($_SESSION['userinfo'])){
                                    header("location:../../../main/index.html");
                                }
                                echo "
                                <div id='cont1'>
                                    <header id='enc1'>
                                        <a href='vista_creacion_cliente.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                                        <h1>Creación de cliente</h1>
                                        <div class='profile'>
                                            <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                                            <h3>";
                                             echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                                            echo "</h3>
                                            <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                                            <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()'>
                                        </div>
                                    </header>  
                                    <section class='methods'>
                                        <div class='information'>
                                            <h2>La creación del usuario ha sido exitosa</h2>
                                            <br>
                                       
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
                            </html>
                            ";
                        }else{echo "Hubo un error al crear la cuarta inserción";}
                    }else{echo "Hubo un error al crear la tercera inserción";}
                }else{echo "Hubo un error al crear la segunda inserción";}
            }else{echo "Hubo un error al crear la primera inserción";}


            $sql5 = "SELECT * FROM cliente WHERE idUsuario ='$id_creation'";
            $query5 = mysqli_query($connection, $sql5);
            $r = $query5->fetch_assoc();
            $c = $r['idCliente'];
            if($query5){
                $sql6 = "INSERT INTO residencia (idClienteResidencia, departamento, ciudad, direccion) VALUES ('$c', '$department', '$city', '$direction')";
                $query6 = mysqli_query($connection, $sql6);
                
            }
            }
        }
    }
}

$connection->close();
?>