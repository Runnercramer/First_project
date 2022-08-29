<?php
include("../../connection.php");
if(isset($_GET['search_button'])){
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    $query1 = "SELECT idUsuario, nombreUsuario, primerApellido, segundoApellido FROM usuario WHERE nombreUsuario LIKE '%$search%'"; 
    $resultset1 = mysqli_query($connection, $query1);
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
        <style>
        .error{background-color:red;color:white;width:80%;margin:20px auto;text-align:center;font-size:2.5em;}
        </style>
</head>
<body>
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_cliente_admin.html'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Debe ingresar los datos solicitados</h1>
            <div class='profile'>
                <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                <input type='button' class='profile_button' value='Perfil &#9881'>
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
        <style>
        .table1{border:1px solid black;background-color:#aaa; width:70%;margin:10px auto;text-align:center;box-shadow:5px 5px 20px 5px #666;}
        .header{border:1px solid black;background-color:#86b32e;height:30px;font-size:1.7em;font-weight:bold;}
        .field{background-color:#ccc;font-size:1.5em;}
        </style>
</head>
<body>
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_cliente_admin.html'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Los resultados asociados a su búsqueda corresponden a: $a resultados</h1>
            <div class='profile'>
                <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                <input type='button' class='profile_button' value='Perfil &#9881'>
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
                    while($array1 = mysqli_fetch_row($resultset1)){
                        $query2 = "SELECT estadoCuenta FROM cliente WHERE idUsuario = '$array1[0]'";
                        $resultset2 = mysqli_query($connection, $query2);
                        while($array2 = mysqli_fetch_row($resultset2)){
                            echo "<tr><td class='field'>$array1[0]</td><td class='field'>$array1[1] $array1[2] $array1[3]</td><td class='field'>$array2[0]</td></tr>";
                        }
                    }
           echo  "</table>
               </div>";

    }
}
?>