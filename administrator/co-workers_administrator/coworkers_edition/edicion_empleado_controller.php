<?php
error_reporting(0);
include("../../../connection.php");
session_start();
if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
    header("location:../../../main/index.html");
}

if(isset($_POST['send'])){
    $id = mysqli_real_escape_string($adminconnection, $_POST['id']);
    $cargo = mysqli_real_escape_string($adminconnection, $_POST['cargo']);
    $new_labor = mysqli_real_escape_string($adminconnection, $_POST['new_labor']);
    $delete_labor = mysqli_real_escape_string($adminconnection, $_POST['delete_labor']);

    $query1;
    $query2;
    $query3;
    if($cargo != ""){
        $sql1 = "UPDATE empleado SET cargo = '$cargo' WHERE idEmpleado = '$id'";
        $query1 = mysqli_query($adminconnection, $sql1);
    }

    if($new_labor != ""){
        $sql2 = "INSERT INTO labdesempeñadas (idEmpleadoLab, labordesempeñada) VALUES ('$id', '$new_labor')";
        $query2 = mysqli_query($adminconnection, $sql2);
    }

    if($delete_labor != ""){
        $sql3 = "DELETE FROM labdesempeñadas WHERE idEmpleadoLab = '$id' AND labordesempeñada = '$delete_labor'";
        $query3 = mysqli_query($adminconnection, $sql3);
    }


    if($query1 == true || $query2 == true || $query3 == true){
        echo "
        
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <title>Edición empleados</title>
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
            header("location:../../../main/index.html");
        }
        echo"
        <div id='cont1'>
            <header id='enc1'>
                <a href='vista_edicion_empleado.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                <h1>Edición de empleados exitosa</h1>
                <div class='profile'>
                    <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                    <h3>";
                    echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                    echo"</h3>
                    <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                    <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()''>
                </div>
            </header>  
            <section class='methods'>
                <div class='information'>
                    <h2>EDICIÓN DE EMPLEADOS</h2>
                    <br>
                    <p>Los cambios se han aplicado correctamente</p>
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
        echo "
        
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Edición empleados</title>
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
                header("location:../../../main/index.html");
            }
            echo"
            <div id='cont1'>
                <header id='enc1'>
                    <a href='vista_edicion_empleado.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1>Edición de empleados fallida</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                        <h3>";
                        echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                        echo"</h3>
                        <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                        <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()''>
                    </div>
                </header>  
                <section class='methods'>
                    <div class='information'>
                        <h2>EDICIÓN DE EMPLEADOS</h2>
                        <br>
                        <p>No se han actualizado los datos</p>
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
?>
