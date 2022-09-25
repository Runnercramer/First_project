<?php
include("../../../connection.php");
session_start();
if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
    header("location:../../../index.html");
}

if(isset($_POST['send'])){
    $admin = mysqli_real_escape_string($adminconnection, $_POST['admin']);
    $encargado = mysqli_real_escape_string($adminconnection, $_POST['encargado']); 

    $sql1 = "SELECT * FROM administrador WHERE idAdmin = '$admin'";
    $query1 = mysqli_query($adminconnection, $sql1);
    $num_rows = $query1->num_rows;
    if($num_rows > 0){
        $sql2 = "SELECT * FROM detalleproducto";
        $query2 = mysqli_query($adminconnection, $sql2);
        $sql3 = "INSERT INTO inventario (idAdmin, encargado) VALUES ('$admin', '$encargado')";
        $query3 = mysqli_query($adminconnection, $sql3);
        $sql0 = "SELECT codInventario FROM inventario ORDER BY codInventario DESC";
        $query0 = mysqli_query($adminconnection, $sql0);
        $array = $query0->fetch_assoc();
        $codInventario = $array['codInventario'];
        while($array2 = $query2->fetch_assoc()){
            $cod_producto = $array2['codProducto'];
            $existencias = $array2['existencias'];
            $sql4 = "INSERT INTO detalleinventario (codInventario, codProducto, existencias) VALUES ('$codInventario', '$cod_producto', '$existencias')";
            $query4 = mysqli_query($adminconnection, $sql4);
        }
         echo "
         <!DOCTYPE html>
<html lang='es'>
<head>
    <title>Creación inventario</title>
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
    echo"
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_nuevo_inventario.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>El inventario ha sido registrado exitosamente</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>";
                 echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);
                 echo"</h3>
                <h3>";
                 echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                 echo"</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>EXITO</h2>
                <br>
                <p>Se ha registrado exitosamente el inventario</p>
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
    echo"
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_nuevo_inventario.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>El administrador no coincide</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>";
                 echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);
                 echo"</h3>
                <h3>";
                 echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                 echo"</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2 class='error'>El administrador no existe</h2>
                <br>
                <p>Verifique el código del administrador</p>
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
$connection->close();
$adminconnection->close();
?>