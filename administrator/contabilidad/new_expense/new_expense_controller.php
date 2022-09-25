<?php
include("../../../connection.php");
session_start();
if(!isset($_SESSION['userinfo'])){
        header("location:../../../index.html");
}

if(isset($_POST['send'])){
    $idadmin = mysqli_real_escape_string($adminconnection, $_POST['idadmin']);
    $price = mysqli_real_escape_string($adminconnection, $_POST['price']);
    $idcoworker = mysqli_real_escape_string($adminconnection, $_POST['idcoworker']);
    $description = mysqli_real_escape_string($adminconnection, $_POST['description']);

    if($idadmin == "" || $price == "" || $idcoworker == "" || $description == ""){
        echo 
        "
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
        .error{background-color:red;color:white;}
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
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../index.html");
    }
    
    echo "<div id='cont1'>
        <header id='enc1'>
            <a href='vista_nuevo_gasto.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Ingreso de gastos</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>";
                 echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                 echo "</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2 class='error'>Ingrese los datos solicitados</h2>
                <br>
                <p>Ingresa los datos solictados en el formulario para registrar un nuevo gasto.</p>
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
        $sql1 = "INSERT INTO transaccion (idAdmin, valor) VALUES ('$idadmin', '$price')";
        $query1 = mysqli_query($adminconnection, $sql1);

        $sql2 = "SELECT * FROM transaccion ORDER BY codTransaccion DESC";
        $query2 = mysqli_query($adminconnection, $sql2);
        $r = $query2->fetch_assoc();

        $c = $r['codTransaccion'];

        $sql3 = "INSERT INTO gasto (codTransaccion, idAdmin, empleado, descripcion) VALUES ('$c', '$idadmin', '$idcoworker', '$description')";
        $query3 = mysqli_query($adminconnection, $sql3);

        if($query3){
            echo 
        "
        <!DOCTYPE html>
<html lang='es'>
<head>
    <title>Creación de gasto</title>
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
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../index.html");
    }
    
    echo "<div id='cont1'>
        <header id='enc1'>
            <a href='vista_nuevo_gasto.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>El gasto ha sido ingresado correctamente</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>";
                 echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                 echo "</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>Creación exitosa</h2>
                <br>
                <p>El gasto ha sido registrado</p>
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
            echo 
        "
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
        .error{background-color:red;color:white;}
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
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../index.html");
    }
    
    echo "<div id='cont1'>
        <header id='enc1'>
            <a href='vista_nuevo_gasto.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1 class='error'>Ocurrió un error</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>";
                 echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                 echo "</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>Error en la inserción</h2>
                <br>
                <p>Actualmente tenemos un problema</p>
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
$adminconnection->close();
$connection->close();
?>
