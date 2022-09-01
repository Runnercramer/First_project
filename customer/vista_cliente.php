<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Cliente</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../main/estilos.css'/>
    <link rel='icon' href='../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="customer_styles.css">
    <style>
    </style>
</head>
<body>
<?php
session_start();

if(!isset($_SESSION['userinfo'])){
    header("location:../main/index.html");
}
?>

    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_cliente.php'><img id='img1' src='../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Bienvenid@ <?php echo $_SESSION['userinfo']['nombreUsuario'];?></h1>
            <div class="profile">
                <img id="profile_image" src="../imagenes/profile.png" alt="Imagen de perfil">
                <h2><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></h2>
                <!--Debo relacionar el botón hacia la interfaz del perfil-->
                <input type="button" class="profile_button" value="Perfil &#9881">
                <input type="button" class="profile_button" value="Cerrar sesión">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>VETEX</h2>
                <p>Empresa constituida en el año 2019 en el área de la telefonía móvil y más específicamente en el comercio de accesorios por Juan Cortes Orosco, quién comenzó como un comerciante independiente importando accesorios para telefonía celular.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="function_cont">
                <div class="button1"><input class="button" type="button" onClick="saludar()" value="Balance"></div>
                <div class="button2"><input class="button" type="button" onClick="despedir()" value="Pedidos"></div>
                <div class="button3"><input class="button" type="button" onClick="edad()" value="Valoración servicio"></div>
                <div class="button4"><input class="button" type="button" onClick="nombre()" value="Visitar carrito"></div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
