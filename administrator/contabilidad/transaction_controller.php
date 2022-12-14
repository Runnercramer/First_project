<?php
include('../../connection.php');
session_start();
if(!isset($_SESSION['userinfo'])){
    header("location:../../index.html");
}
if(isset($_GET['search_button'])){
    $search = mysqli_real_escape_string($adminconnection, $_GET['search']);
   $query1 = "SELECT * FROM usuario JOIN cliente ON usuario.idUsuario = cliente.idUsuario WHERE usuario.nombreUsuario LIKE '%$search%' OR usuario.apellidosUsuario LIKE '%$search%' ORDER BY nombreUsuario ASC";
    if($search == ""){
        echo "
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
        <link rel='stylesheet' href='../administrator_styles.css'>
        <link rel='stylesheet' href='../new_admin_styles.css'>
        <style>
        .error{background-color:red;color:white;width:80%;margin:20px auto;text-align:center;font-size:2.5em;}
        </style>
        <script>
        function profile(){
            window.location.href = ''../adminprofile.php;
        }

        function logout(){
            window.location.href='../../main/logout.php';
        }
    </script>
</head>
<body>";
if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
    header("location:../../index.html");
}
    echo "<div id='cont1'>
        <header id='enc1'>
            <a href='vista_transaccion.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Debe ingresar los datos solicitados</h1>
            <div class='profile'>
                <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>";
                echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);
                echo "</h3>
                <h3>";
                echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                echo "</h3><input type='button' class='profile_button' value='Perfil &#9881' onclick'profile()'>
                <input type='button' class='logout_button' value='Cerrar sesi??n' onclick'logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>TRANSACCION</h2>
                <br>
                <p>El campo de b??squeda no puede estar vac??o</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <h2 class='error'>Debe ingresar un nombre para la b??squeda</h2>
            </div>";
    }else{
    $resultset1 = mysqli_query($adminconnection, $query1);
    $num = mysqli_num_rows($resultset1);
        echo
        "<!DOCTYPE html>
        <html lang='es'>
        <head>
        <title>Transacciones</title>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='../../main/estilos.css'/>
        <link rel='icon' href='../../imagenes/vetex.ico'/>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
        <link rel='stylesheet' href='../administrator_styles.css'>
        <link rel='stylesheet' href='../new_admin_styles.css'>
        <style>
        .main_table{background-color:#777;border:1px solid black;}
        .header{background-color:#a1ca4f;font-size:1.5em;text-align:center;font-weight:bold;padding:5px;width:300px;border:2px solid black;}
        .field{background-color:#bbb;font-size:1.2em;text-align:center;padding:5px;font-weight:bold;border:2px solid black;}
        </style>
        <script>
        function profile(){
            window.location.href = '../adminprofile.php';
        }

        function logout(){
            window.location.href='../../main/logout.php';
        }
    </script>
        </head>
        <body>";
        if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
            header("location:../../index.html");
        }
            echo "<div id='cont1'>
                <header id='enc1'>
                    <a href='vista_transaccion.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1>La b??squeda obtuvo $num resultados</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                        <h3>";
                        echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);                        
                        echo "</h3>
                        <h3>";
                        echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);                        
                        echo "</h3><input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                        <input type='button' class='logout_button' value='Cerrar sesi??n' onclick'logout()'>
                    </div>
                </header>  
            <section class='methods'>
                <div class='information'>
                    <h2>TRANSACCION</h2>
                    <br>
                    <p>Este es el listado de los clientes relacionados con la b??squeda</p>
                    <br>
                    <h3>Software:</h3><p><b>SGIVT</b></p>
                    <h3>Version:</h3><p><b>1.2</b></p>
                    <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                    <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
                </div>
                <div>";
      
    echo "<table class='main_table'><tr'>
    <td class='header'> Id Usuario</td>
    <td class='header'>Nombre</td>
    <td class='header'>Estado de cuenta</td>
    </tr>";
    while($array1 = mysqli_fetch_assoc($resultset1)){
        echo "<tr>
                <td class='field'>" . $array1['idUsuario'] . "</td>
                <td class='field'>" . $array1['nombreUsuario'] . " " . $array1['apellidosUsuario'] . "</td>
                <td class='field'>".$array1['estadoCuenta']."</td>
                </tr>";
    }
    echo "</table></div>";
    }

}

$adminconnection->close();
$connection->close();
?>
