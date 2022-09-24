<?php
include("../../connection.php");
session_start();
if(isset($_GET['search_button'])){
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    $query1 = "SELECT * FROM usuario us RIGHT JOIN cliente cl ON us.idUsuario = cl.idUsuario WHERE nombreUsuario LIKE '%$search%' OR apellidosUsuario LIKE '%$search%' ORDER BY nombreUsuario ASC"; 
    $resultset1 = mysqli_query($adminconnection, $query1);
    $a = mysqli_num_rows($resultset1);

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
            window.location.href = '../adminprofile.php';
        }

        function logout(){
            window.location.href = '../../main/logout.php';
        }
    </script>
</head>
<body>
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_cliente_admin.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Debe ingresar los datos solicitados</h1>
            <div class='profile'>
                <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>CLIENTES</h2>
                <br>
                <p>El campo de búsqueda no puede estar vacío</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <h2 class='error'>Debe ingresar un nombre para la búsqueda</h2>
            </div>";
    }else{
    echo
    "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <title>Clientes</title>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='../../main/estilos.css'/>
        <link rel='icon' href='../../imagenes/vetex.ico'/>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
        <link rel='stylesheet' href='../administrator_styles.css'>
        <link rel='stylesheet' href='../new_admin_styles.css'>  
        <style>
        .table1{border:1px solid black;background-color:#777; width:70%;margin:10px auto;text-align:center;box-shadow:5px 5px 20px 5px #666;}
        .header{border:2px solid black;background-color:#86b32e;height:30px;font-size:1.7em;font-weight:bold;}
        .field{background-color:#bbb;font-size:1.5em;border:2px solid black;}
        </style>
        <script>
        function profile(){
            window.location.href = '../adminprofile.php';
        }

        function logout(){
            window.location.href = '../../main/logout.php';
        }
    </script>
</head>
<body>
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_cliente_admin.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Los resultados asociados a su búsqueda corresponden a: $a resultados</h1>
            <div class='profile'>
                <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>";
                echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);
                
                echo"</h3>
                <h3>";
                echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                echo"</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>CLIENTES</h2>
                <br>
                <p>En esta interfaz se presenta un listado en el que se especifica los nombres de los usuarios relacionados a la búsqueda que tienen un estado de cuenta definido.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>";
                echo 
                "<table class='table1'>
                    <tr>
                        <td class='header'>Id Usuario</td>
                        <td class='header'>Nombre</td>
                        <td class='header'>Estado de Cuenta</td>
                    </tr>";
                    while($array1 = mysqli_fetch_assoc($resultset1)){
                        $id = $array1['idUsuario'];
                        $query2 = "SELECT estadoCuenta FROM cliente WHERE idUsuario = '$id'";
                        $resultset2 = mysqli_query($adminconnection, $query2);
                        while($array2 = mysqli_fetch_assoc($resultset2)){
                            echo "<tr>
                            <td class='field'>" . $array1['idUsuario'] . "</td>
                            <td class='field'>" . $array1['nombreUsuario'] . " " . $array1['apellidosUsuario'] . "</td>
                            <td class='field'>" . $array2['estadoCuenta'] . "</td>
                            </tr>";
                        }
                    }
           echo  "</table>
               </div>";

    }
}

$adminconnection->close();
$connection->close();
?>
