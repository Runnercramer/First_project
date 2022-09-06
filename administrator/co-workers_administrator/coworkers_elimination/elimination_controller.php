<?php
include('../../../connection.php');
session_start();
if(!isset($_SESSION['userinfo'])){
    header("location:../../../main/index.html");
}

if(isset($_POST['send'])){
    $id = mysqli_real_escape_string($adminconnection, $_POST['id']);
    $email = mysqli_real_escape_string($adminconnection, $_POST['email']);
    $type = mysqli_real_escape_string($adminconnection, $_POST['cargo']);
    $cargo = mb_strtolower($type);
    $confirmation = mysqli_real_escape_string($adminconnection, $_POST['confirmation']);

    if($id == "" || $email == "" || $type == ""){
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
    <link rel='stylesheet' href=''../../new_admin_styles.css'>
    <style>
        .error{background-color:red;color:white;}
    </style>
           <script>
        function logout(){
            window.location.href = '../../../main/logout.php';
        }
        function profile(){
            window.location.href ='../../adminprofile.php';
        }   
    </script>
</head>
<body>";

    if(!isset($_SESSION['userinfo'])){
        header('location:../../../main/index.html');
    }
    echo "
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_eliminacion_empleado.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1 class='error'>Error en la eliminación</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>"; 
                echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                echo"</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()''>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>ELIMINACIÓN DE EMPLEADOS</h2>
                <br>
                <p>No pueden haber campos vacíos</p>
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
        if($confirmation === "0"){
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
    <link rel='stylesheet' href=''../../new_admin_styles.css'>
    <style>
        .error{background-color:red;color:white;}
    </style>
           <script>
        function logout(){
            window.location.href = '../../../main/logout.php';
        }
        function profile(){
            window.location.href ='../../adminprofile.php';
        }   
    </script>
</head>
<body>";

    if(!isset($_SESSION['userinfo'])){
        header('location:../../../main/index.html');
    }
    echo "
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_eliminacion_empleado.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1 class='error'>Debe confirmar la eliminación</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>"; 
                echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                echo"</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()''>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>ELIMINACIÓN DE EMPLEADOS</h2>
                <br>
                <p>Despliegue la lista para confirmar la eliminación.</p>
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
        }else if($confirmation === "no"){
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
    <link rel='stylesheet' href=''../../new_admin_styles.css'>
    <style>
        .error{background-color:red;color:white;}
    </style>
           <script>
        function logout(){
            window.location.href = '../../../main/logout.php';
        }
        function profile(){
            window.location.href ='../../adminprofile.php';
        }   
    </script>
</head>
<body>";

    if(!isset($_SESSION['userinfo'])){
        header('location:../../../main/index.html');
    }
    echo "
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_eliminacion_empleado.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1 class='error'>El usuario no se eliminóS</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>"; 
                echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                echo"</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()''>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>ELIMINACIÓN DE EMPLEADOS</h2>
                <br>
                <p>El empleado no ha sido eliminado. Debe escoger <i><b>Sí</b></i></p>
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
            $sql1 = "SELECT * FROM email WHERE email = '$email'";
            $sql2 = "SELECT * FROM usuario WHERE idUsuario = '$id'";
            $query1 = mysqli_query($adminconnection, $sql1);
            $query2 = mysqli_query($adminconnection, $sql2);
            if($query1 && $query2){
            $array1 = $query1->fetch_assoc();
            $array2 = $query2->fetch_assoc();
            $a = $array1['email'];
            $b = $array2['idUsuario'];
            $c = $array2['tipoUsuario'];
                if($email == $a && $id == $b && $cargo == $c){
                    $sql3 = "DELETE FROM usuario WHERE idUsuario = '$id' AND tipoUsuario = '$cargo'";
                    $query3 = mysqli_query($adminconnection, $sql3);
                        if($query3){
                            echo "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Eliminación exitosa</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../../main/estilos.css'/>
            <link rel='icon' href='../../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../../administrator_styles.css'>
            <link rel='stylesheet' href=''../../new_admin_styles.css'>
            <style>
            </style>
                <script>
                function logout(){
                    window.location.href = '../../../main/logout.php';
                }
                function profile(){
                    window.location.href ='../../adminprofile.php';
                }   
            </script>
        </head>
<body>";

    if(!isset($_SESSION['userinfo'])){
        header('location:../../../main/index.html');
    }
    echo "
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_eliminacion_empleado.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>La eliminación ha sido exitosa</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>"; 
                echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                echo"</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()''>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>ELIMINACIÓN DE EMPLEADOS</h2>
                <br>
                <p>El empleado con nombre " . $array2['nombreUsuario'] . " " . $array2['apellidosUsuario'] . " ha sido eliminado exitosamente</p>
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
                        }
                }
            }else{
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
    <link rel='stylesheet' href=''../../new_admin_styles.css'>
    <style>
        .error{background-color:red;color:white;}
    </style>
           <script>
        function logout(){
            window.location.href = '../../../main/logout.php';
        }
        function profile(){
            window.location.href ='../../adminprofile.php';
        }   
    </script>
</head>
<body>";

    if(!isset($_SESSION['userinfo'])){
        header('location:../../../main/index.html');
    }
    echo "
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_eliminacion_empleado.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1 class='error'>Hubo un error al ejecutar la consulta</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>"; 
                echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                echo"</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()''>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>ELIMINACIÓN DE EMPLEADOS</h2>
                <br>
                <p>Ocurrió un error al ejecutar la consulta</p>
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
            }
        }
    }
}

$adminconnection->close();
?>