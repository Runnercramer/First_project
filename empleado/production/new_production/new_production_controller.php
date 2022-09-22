<?php
include("../../../connection.php");
session_start();
if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'empleado'){
    header("location:../../../main/index.html");
}

if(isset($_POST['send'])){
    $cant = mysqli_real_escape_string($connection, $_POST['cant']);
    $product = $_POST['product'];

    $id_user = $_SESSION['userinfo']['idUsuario'];
    $sql0 = "SELECT idEmpleado FROM empleado WHERE idUsuario = '$id_user'";
    $query0 = mysqli_query($connection, $sql0);
    $row = $query0->fetch_assoc();
    $id_user = $row['idEmpleado'];

    if($product === "0"){
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
            <link rel='stylesheet' href='../../colaborador.css'>
            <style>
                .error{background-color:red;color:white;}
            </style>
            <script>
                function profile(){
                    window.location.href = '../../coworkerprofile.php';
                }

                function logout(){
                    window.location.href = '../../../main/logout.php';
                }
            </script>
        </head>
        <body>";

            if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'empleado'){
                header("location:../../../main/index.html");
            }

            echo "
            <div id='cont1'>
                <header id='enc1'>
                    <a href='vista_nueva_produccion.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1 class='error'>Debe seleccionar un producto</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>.
                        <h3>";
                         echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                         echo "
                         </h3>
                        <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                        <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
                    </div>
                </header>  
                <section class='methods'>
                    <div class='information'>
                        <h2>ERROR</h2>
                        <br>
                        <p>Debes escoger un producto del listado</p>
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
        $sql1 = "INSERT INTO produccion (cantProduccion) VALUES ('$cant')";
        $query1 = mysqli_query($connection, $sql1);

        $sql2 = "SELECT * FROM produccion ORDER BY codProduccion DESC";
        $query2 = mysqli_query($connection, $sql2);
        $r = $query2->fetch_assoc();
        $cod_produccion = $r['codProduccion'];

        $sql3 = "INSERT INTO productoproduccion (codProduccion, codProducto) VALUES ('$cod_produccion', '$product')";
        $query3 = mysqli_query($connection, $sql3);

        $sql4 = "INSERT INTO produccionempleado (idEmpleado, codProduccion) VALUES ('$id_user', '$cod_produccion')";
        $query4 = mysqli_query($connection, $sql4);
        
        if($query1){
            if($query2){
                if($query3){
                    if($query4){
                        echo "
                        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Consulta exitosa</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../../main/estilos.css'/>
            <link rel='icon' href='../../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../../colaborador.css'>
            <style>
            </style>
            <script>
                function profile(){
                    window.location.href = '../../coworkerprofile.php';
                }

                function logout(){
                    window.location.href = '../../../main/logout.php';
                }
            </script>
        </head>
        <body>";

            if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'empleado'){
                header("location:../../../main/index.html");
            }

            echo "
            <div id='cont1'>
                <header id='enc1'>
                    <a href='vista_nueva_produccion.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1>El registro ha sido exitoso</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>.
                        <h3>";
                         echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                         echo "
                         </h3>
                        <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                        <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
                    </div>
                </header>  
                <section class='methods'>
                    <div class='information'>
                        <h2>REGISTRO PRODUCCIÓN</h2>
                        <br>
                        <p>La consulta ha sido exitosa</p>
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
                    }else{echo "Error en la cuarta conulta";}
                }else{echo "Error en la tercera conulta";}
            }else{echo "Error en la segunda conulta";}
        }else{echo "Error en la primera conulta";}
    }
}

$adminconnection->close();
$connection->close();
?>
