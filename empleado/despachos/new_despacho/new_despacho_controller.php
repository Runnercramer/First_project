<?php
include("../../../connection.php");
session_start();

if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'empleado'){
    header("location../../../main/index.html");
}

if(isset($_POST['send'])){
    $cod_pedido = mysqli_real_escape_string($connection, $_POST['cod_pedido']);
    $date = mysqli_real_escape_string($connection, $_POST['date']);
    $trans = mysqli_real_escape_string($connection, $_POST['trans']); 
    $guia = mysqli_real_escape_string($connection, $_POST['guia']); 
    
    $rastreo = $trans . " - " . $guia;

    $id_user = $_SESSION['userinfo']['idUsuario'];
    $sql0 = "SELECT idEmpleado FROM empleado WHERE idUsuario = '$id_user'";
    $query0 = mysqli_query($connection, $sql0);
    $row = $query0->fetch_assoc();
    $id_user = $row['idEmpleado'];

    $sql1 = "SELECT * FROM pedido WHERE codPedido = '$cod_pedido'";
    $query1 = mysqli_query($connection, $sql1);
    $num = $query1->num_rows;

    if($num = 0){
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
                    <a href='vista_new_despacho.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1 class='error'>El código del pedido no existe</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                        <h3>";
                         echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                         echo"</h3>
                        <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()''>
                        <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()''>
                    </div>
                </header>  
                <section class='methods'>
                    <div class='information'>
                        <h2>ERROR</h2>
                        <br>
                        <p>Verifique el código del pedido. <br><b>Debe seguir el formato XX-XXX<b/></p>
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
        if($date != ""){
        $sql2 = "INSERT INTO despacho (codPedido, encargado, fecha, estado, guia) VALUES ('$cod_pedido', '$id_user', '$date', 'En camino', '$rastreo')";
        $query2 = mysqli_query($connection, $sql2);
            if($query2){
                echo "
                <!DOCTYPE html>
                <html lang='es'>
                <head>
                    <title>Despacho registrado</title>
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
                            <a href='vista_new_despacho.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                            <h1 class='error'>El despacho ha sido registrado eitosamente</h1>
                            <div class='profile'>
                                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                                <h3>";
                                echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                                echo"</h3>
                                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()''>
                                <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()''>
                            </div>
                        </header>  
                        <section class='methods'>
                            <div class='information'>
                                <h2CONSULTA EXITOSA</h2>
                                <br>
                                <p>El despacho ha sido registrado</p>
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

$connection->close();
$adminconnection->close();
?>