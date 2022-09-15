<?php
include("../../connection.php");
session_start();
if(!isset($_SESSION['userinfo'])){
    header("location:../../main/index.hrml");
}

if(isset($_POST['send'])){
    $type = mysqli_real_escape_string($connection, $_POST['PQRS']);
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $cell = mysqli_real_escape_string($connection, $_POST['cell']);
    $request = mysqli_real_escape_string($connection, $_POST['request']);

    if($type == "0"){
        echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Servicio al cliente</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='../customer_styles.css'>
    <link rel='stylesheet' href='../new_customer_styles.css'>
    <style>
        select{text-align:center;}
    </style>
    <script>
    function logout(){
        window.location.href = '../../main/logout.php';
    }

    function profile(){
        window.location.href = '../customerprofile.php';
    }
    </script>
</head>
<body>";

    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'cliente'){
        header('location:../../main/index.html');
    }
 
    echo "
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_servicio_al_cliente.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Servicio al cliente</h1>
            <div class='profile'>
                <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3><b>";
                
                echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);

                echo "/b></h3>
                <input type=?button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header> 
        <section class='methods'>
            <div class='information'>
                <h2>Listado de pedidos</h2>
                <br>
                <p>Puedes radicar cualquier tipo de pregunta, queja, reclamo o sugerencia ingresando los datos solicitados en el formulario presentado a continuación.</p>
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
        $c = $_SESSION['customerinfo']['idCliente'];
        $final = $request . "<br>" . $email . " " . $cell;
        $sql1 = "INSERT INTO pqrs (tipoSolicitud, idCliente, solicitud, estadoSolicitud) VALUES ('$type', '$c', '$final', 'Por responder')";
        $query1 = mysqli_query($connection, $sql1);
        if($query1){
         echo 
         "
         <!DOCTYPE html>
<html lang='es'>
<head>
    <title>Servicio al cliente</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='../customer_styles.css'>
    <link rel='stylesheet' href='../new_customer_styles.css'>
    <style>
        select{text-align:center;}
    </style>
    <script>
    function logout(){
        window.location.href = '../../main/logout.php';
    }

    function profile(){
        window.location.href = '../customerprofile.php';
    }
    </script>
</head>
<body>
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_servicio_al_cliente.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Su petición ha sido enviada correctamente.</h1>
            <div class='profile'>
                <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3><b>";
                
                echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);

                echo "/b></h3>
                <input type=?button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header> 
        <section class='methods'>
            <div class='information'>
                <h2>Listado de pedidos</h2>
                <br>
                <p>Nos comunicaremos contigo por el correo y celular suministrados tan pronto tengamos una respuesta.</p>
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
            echo 
         "
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
    <link rel='stylesheet' href='../customer_styles.css'>
    <link rel='stylesheet' href='../new_customer_styles.css'>
    <style>
        select{text-align:center;}
    </style>
    <script>
    function logout(){
        window.location.href='../../main/logout.php';
    }
    function profile(){
        window.location.href = '../customerprofile.php';
    }
    </script>
</head>
<body>
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_servicio_al_cliente.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Hubo un error al crear la solicitud.</h1>
            <div class='profile'>
                <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3><b>";
                
                echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);

                echo "/b></h3>
                <input type=?button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header> 
        <section class='methods'>
            <div class='information'>
                <h2>Listado de pedidos</h2>
                <br>
                <p>Hubo un erro al crear la solicitud. Por favor comuniquese a los correos o líneas de contacto.</p>
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