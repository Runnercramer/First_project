<?php
session_start();
include("../connection.php");
if(!isset($_SESSION['userinfo'])){
    header("location:../main/index.html");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="icon" href="../imagenes/vetex.ico">
    <link rel="stylesheet" href="../main/estilos.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../profile_styles.css">
    <script>

    function logout(){
        window.location.href = "../main/logout.php";
    }

    </script>
</head>
<body>
    <?php

    if(!isset($_SESSION['userinfo'])){
        header("location:../main/index.html");
    }
    include("../main/login.php");
    ?>
    <div id="cont1">
        <header>
            <a href="vista_cliente.php"><img id="img1" src="../imagenes/descarga.png" alt="Logotipo de Vetex"></a>
            <h1>Actualización de Perfil</h1>
        </header>
        <section class="main_section">
            <div class="info">
                <h2>ACTUALIZACIÓN DE PERFIL</h2>
                <br>
                <p>Ingresa los campos que quieras actualizar</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <h3>Ingresa sólo los datos a actualizar</h3>
                <label>Nombre</label>
                <input type="text" name="name" placeholder="Ingresa un nuevo nombre">
                <label>Cédula</label>
                <input type="text" name="id" placeholder="Ingresa un nuevo N° de identidad">
                <label>Email</label>
                <input type="text" name="email" placeholder="Ingresa un nuevo correo electrónico">
                <label>Celular</label>
                <input type="text" name="cell" placeholder="Ingresa un nuevo N° de celular">
                <label>Dirección de residencia</label>
                <input type="text" name="direction" placeholder="Ingresa una nueva dirección">
            </form>
            </div>
            <div class="function">
                <input class="logout_button" type="button" name="logout" value="Cerrar sesión" onClick="logout()">
            </div>
        </section>
        <footer>
            <p id="pa1">Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
        </footer>
    </div>
</body>
</html>