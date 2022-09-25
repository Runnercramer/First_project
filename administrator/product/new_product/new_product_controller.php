<?php
include("../../../connection.php");
session_start();
if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
    header("location:../../../index.html");
}
if(isset($_POST['send'])){
    $id = mysqli_real_escape_string($adminconnection, $_POST['id']);
    $name = mysqli_real_escape_string($adminconnection, $_POST['name']);
    $desciption = mysqli_real_escape_string($adminconnection, $_POST['description']);
    $price = mysqli_real_escape_string($adminconnection, $_POST['price']);

    $nombreimagen = $_FILES['imagen']['name'];
    $tipoimagen = $_FILES['imagen']['type'];
    $tamañoimagen = $_FILES['imagen']['size'];


    if($tamañoimagen < 2000000){
        if($tipoimagen == "image/jpeg" || $tipoimagen == "image/jpg" || $tipoimagen == "image/png"){

            $destinoimagen = $_SERVER['DOCUMENT_ROOT'] . '/Vetex/imagenes/';
            move_uploaded_file($_FILES['imagen']['tmp_name'], $destinoimagen.$nombreimagen);

            $archivoobjetivo = fopen($destinoimagen . $nombreimagen, "r+");
            $contenido = fread($archivoobjetivo, $tamañoimagen);
            $contenido = addslashes($contenido);
            fclose($archivoobjetivo);

            $sql1 = "INSERT INTO producto (codProducto, producto, descripcionProducto, estadoProducto) VALUES ('$id', '$name', '$desciption', 'habilitado')";
            $sql2 = "INSERT INTO detalleproducto (codProducto, valorProducto, existencias) VALUES ('$id', '$price', '0')";
            $sql3 = "INSERT INTO imagenproducto (codProducto, imagen, tipoImagen) VALUES ('$id', '$contenido', '$tipoimagen')";

            $query1 = mysqli_query($adminconnection, $sql1);
            $query2 = mysqli_query($adminconnection, $sql2);
            $query3 = mysqli_query($adminconnection, $sql3);


            if($query1){
                if($query2){
                    if($query3){
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
                            <link rel='stylesheet' href=''../../administrator_styles.css'>
                            <link rel='stylesheet' href='../../new_admin_styles.css'>
                            <style>

                            </style>
                            <script>
                                function profile(){
                                    window.location.href = '../../adminprofile.php';
                                }

                                function logout(){
                                    window.location.href = '../../main/logout.php';
                                }

                            </script>
                        </head>
                        <body>";

                            if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
                                header("location:../../../index.html");
                            }
                            echo"
                            <div id='cont1'>
                                <header id='enc1'>
                                    <a href='vista_nuevo_producto.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                                    <h1>Creación de productos</h1>
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
                                        <h2>Creación exitosa</h2>
                                        <br>
                                        <p>El producto ha sido creado exitosamente.</p>
                                        <br>
                                        <h3>Software:</h3><p><b>SGIVT</b></p>
                                        <h3>Version:</h3><p><b>1.2</b></p>
                                        <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                                        <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
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
                            <link rel='stylesheet' href=''../../administrator_styles.css'>
                            <link rel='stylesheet' href='../../new_admin_styles.css'>
                            <style>
                                    .error{background-color:red;color:white;}
                            </style>
                            <script>
                                function profile(){
                                    window.location.href = '../../adminprofile.php';
                                }

                                function logout(){
                                    window.location.href = '../../main/logout.php';
                                }

                            </script>
                        </head>
                        <body>";

                            if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
                                header("location:../../../index.html");
                            }
                            echo"
                            <div id='cont1'>
                                <header id='enc1'>
                                    <a href='vista_nuevo_producto.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                                    <h1 class='error'>Tipo de imagen incorrecto</h1>
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
                                        <h2>Error al crear el producto</h2>
                                        <br>
                                        <p>La imagen solo puede ser de tipo JPEG, JPG o PNG</p>
                                        <br>
                                        <h3>Software:</h3><p><b>SGIVT</b></p>
                                        <h3>Version:</h3><p><b>1.2</b></p>
                                        <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                                        <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
                                    </div>

                                </section>
                                <footer id='pa2'>
                                    <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
                                </footer>
                            </div>
                        </body>
                        </html>";
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
                    <link rel='stylesheet' href=''../../administrator_styles.css'>
                    <link rel='stylesheet' href='../../new_admin_styles.css'>
                    <style>
                        .error{background-color:red;color:white;}
                    </style>
                    <script>
                        function profile(){
                            window.location.href = '../../adminprofile.php';
                        }
                
                        function logout(){
                            window.location.href = '../../main/logout.php';
                        }
                
                    </script>
                </head>
                <body>";
                
                    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
                        header("location:../../../index.html");
                    }
                    echo"
                    <div id='cont1'>
                        <header id='enc1'>
                            <a href='vista_nuevo_producto.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                            <h1 class='error'>Tamaño incorrecto de imágen</h1>
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
                                <h2>Error al crear el producto</h2>
                                <br>
                                <p>La imágen no debe superar los 2 Mb de tamaño</p>
                                <br>
                                <h3>Software:</h3><p><b>SGIVT</b></p>
                                <h3>Version:</h3><p><b>1.2</b></p>
                                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
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
$adminconnection->close();
$connection->close();
?>
