<?php
include("../../../connection.php");
session_start();
if(!isset($_SESSION['userinfo'])){
    header("location:../../../main/index.html");
}

if(isset($_POST['send'])){
    $id = mysqli_real_escape_string($adminconnection, $_POST['id']);
    $name = mysqli_real_escape_string($adminconnection, $_POST['name']);
    $lastname = mysqli_real_escape_string($adminconnection, $_POST['lastname']);
    $email = mysqli_real_escape_string($adminconnection, $_POST['email']);
    $cell = mysqli_real_escape_string($adminconnection, $_POST['cellphone']);
    $cargo = mysqli_real_escape_string($adminconnection, $_POST['cargo']);
    $labores = mysqli_real_escape_string($adminconnection, $_POST['labores']);
    $password1 = mysqli_real_escape_string($adminconnection, $_POST['password1']);
    $password2 = mysqli_real_escape_string($adminconnection, $_POST['password2']);

    if($id == "" || $name == "" || $lastname == "" || $email == "" || $cell == "" || $cargo == "" || $labores == "" || $password1 == "" || $password2 == ""){
        echo "
        <!DOCTYPE html>
<html lang='es'>
<head>
    <title>Error</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='../../administrator_styles.css'>
    <link rel='stylesheet' href='../../new_admin_styles.css'>
    <style>
        .error{background-color:red;color:white}
    </style>
    <script>
        function logout(){
            window.location.href = '../../../main/logout.php';
        }
        function profile(){
            window.location.href = '../../adminprofile.php';
        }   
    </script>
</head>
<body>";
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header('location:../../../main/index.html');
    }
    echo "
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_empleados.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1 class='error'>No pueden haber campos vacíos</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>";
                echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                echo"</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>CREACIÓN DE EMPLEADOS</h2>
                <br>
                <p>Debe ingresar los datos solicitados para la creación del empleado</p>
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
            echo "
            <!DOCTYPE html>
    <html lang='es'>
    <head>
        <title>Error</title>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='../../../main/estilos.css'/>
        <link rel='icon' href='../../../imagenes/vetex.ico'/>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
        <link rel='stylesheet' href='../../administrator_styles.css'>
        <link rel='stylesheet' href='../../new_admin_styles.css'>
        <style>
            .error{background-color:red;color:white}
        </style>
        <script>
            function logout(){
                window.location.href = '../../../main/logout.php';
            }
            function profile(){
                window.location.href = '../../adminprofile.php';
            }   
        </script>
    </head>
    <body>";
        if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
            header('location:../../../main/index.html');
        }
        echo "
        <div id='cont1'>
            <header id='enc1'>
                <a href='../vista_empleados.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                <h1 class='error'>Las contraseñas no coinciden</h1>
                <div class='profile'>
                    <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                    <h3>";
                    echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                    echo"</h3>
                    <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                    <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
                </div>
            </header>  
            <section class='methods'>
                <div class='information'>
                    <h2>CREACIÓN DE EMPLEADOS</h2>
                    <br>
                    <p>Las 2 contraseñas ingresadas deben coincidir</p>
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
            $sql0 = "SELECT count(*) idUsuario FROM usuario WHERE idUsuario = '$id'";
            $query0 = mysqli_query($adminconnection, $sql0);
            $array = $query0->fetch_assoc();
            if($array['idUsuario'] != '0'){
                echo "
            <!DOCTYPE html>
    <html lang='es'>
    <head>
        <title>Error</title>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='../../../main/estilos.css'/>
        <link rel='icon' href='../../../imagenes/vetex.ico'/>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
        <link rel='stylesheet' href='../../administrator_styles.css'>
        <link rel='stylesheet' href='../../new_admin_styles.css'>
        <style>
            .error{background-color:red;color:white}
        </style>
        <script>
            function logout(){
                window.location.href = '../../../main/logout.php';
            }
            function profile(){
                window.location.href = '../../adminprofile.php';
            }   
        </script>
    </head>
    <body>";
        if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
            header('location:../../../main/index.html');
        }
        echo "
        <div id='cont1'>
            <header id='enc1'>
                <a href='../vista_empleados.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                <h1 class='error'>Ya existe un usuario registrado con este número de documento</h1>
                <div class='profile'>
                    <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                    <h3>";
                    echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                    echo"</h3>
                    <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                    <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
                </div>
            </header>  
            <section class='methods'>
                <div class='information'>
                    <h2>CREACIÓN DE EMPLEADOS</h2>
                    <br>
                    <p>Verifique que la cédula suministrada no haya sido usada para crear una cuenta.</p>
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
            $crypted_password = password_hash($password1, PASSWORD_DEFAULT);
            $sql1 = "INSERT INTO usuario (idUsuario, nombreUsuario, apellidosUsuario, contraseñaUsuario, tipoUsuario) VALUES ('$id', '$name', '$lastname', '$crypted_password', 'empleado')";
            $sql2 = "INSERT INTO email (idUsuario, email) VALUES ('$id', '$email')";
            $sql3 = "INSERT INTO celular (idUsuario, celular) VALUES ('$id', '$cell')";
            $sql4 = "INSERT INTO empleado (idUsuario, cargo) VALUES ('$id', '$cargo')";
            $sql5 = "SELECT * FROM empleado WHERE idUsuario = '$id'";

            $query1 = mysqli_query($adminconnection, $sql1);
            $query2 = mysqli_query($adminconnection, $sql2);
            $query3 = mysqli_query($adminconnection, $sql3);
            $query4 = mysqli_query($adminconnection, $sql4);
            $query5 = mysqli_query($adminconnection, $sql5);
            $array5 = $query5->fetch_assoc();
            $idempleado = $array5['idEmpleado'];
            $sql6 = "INSERT INTO labdesempeñadas (idEmpleado, labordesempeñada) VALUES ('$idempleado', '$labores')";
            $query6 = mysqli_query($adminconnection, $sql6);
        
            if($query1){
                if($query2){
                    if($query3){
                        if($query4){
                            if($query6){
                                echo "
                                <!DOCTYPE html>
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
            function logout(){
                window.location.href = '../../../main/logout.php';
            }
            function profile(){
                window.location.href = '../../adminprofile.php';
            }   
        </script>
    </head>
    <body>";
        if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
            header('location:../../../main/index.html');
        }
        echo "
        <div id='cont1'>
            <header id='enc1'>
                <a href='../vista_empleados.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                <h1 class='error'>El empleado ha sido ingresado correctamente</h1>
                <div class='profile'>
                    <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                    <h3>";
                    echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                    echo"</h3>
                    <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                    <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
                </div>
            </header>  
            <section class='methods'>
                <div class='information'>
                    <h2>CREACIÓN DE EMPLEADOS</h2>
                    <br>
                    <p>Consulta exitosa</p>
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
                            }else{echo "Hubo un error en la sexta inserción";}
                        }else{echo "Hubo un error en la cuarta inserción";}
                    }else{echo "Hubo un error en la tercera inserción";}
                }else{echo "Hubo un error en la segunda inserción";}
            }else{echo "Hubo un error en la primera inserción";}
            }
        }
    }
}

$adminconnection->close();
?>