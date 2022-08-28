<?php
include('../../connection.php');

if(isset($_GET['search_button'])){
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    $query1 = "SELECT idUsuario, nombreUsuario, primerApellido, segundoApellido FROM usuario WHERE nombreUsuario LIKE '%$search%' OR primerApellido LIKE '%$search%' OR segundoApellido LIKE '%$search%'";
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
            <a href='vista_transaccion.html'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Debe ingresar los datos solicitados</h1>
            <div class='profile'>
                <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                <input type='button' class='profile_button' value='Perfil &#9881'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>TRANSACCION</h2>
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
    $resultset1 = mysqli_query($connection, $query1);
    while($array1 = mysqli_fetch_row($resultset1)){
        echo "$array1[0] <br> $array1[1] <br> $array1[2] <br> $array1[3] <br>";
    }

    }

}
?>