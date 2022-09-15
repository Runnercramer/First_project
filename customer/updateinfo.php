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
    <style>
        .main_form{font-size:0.9em;background-color:#ccc;display:flex;justify-content:space-around;flex-direction:column;align-items:center;min-height:530px;height:auto;font-weight:bold;box-shadow:5px 5px 20px 5px #333;padding:10px;}
        .main_form input[type="text"], input[type="email"]{width:70%;text-align:center;height:25px;border-radius:15px;}
        .submit_button{background-color:#a1ca4f;width:45%;height:35px;font-weight:bold;border-radius:15px;font-size:1.2em;}
        .submit_button:hover{background-color:#85b427;}
        .submit_button:active{background-color:black;color:white;}
    </style>
    <script>

    function logout(){
        window.location.href = "../main/logout.php";
    }

    </script>
</head>
<body>
    <?php

    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'cliente'){
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
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="main_form">
                <label>Nombre</label>
                <input type="text" name="name" placeholder="Ingresa un nuevo nombre">
                <label>Cédula</label>
                <input type="text" name="id" placeholder="Ingresa un nuevo N° de identidad">
                <label>Email</label>
                <input type="email" name="email" placeholder="Ingresa un nuevo correo electrónico">
                <label>Celular</label>
                <input type="text" name="cell" placeholder="Ingresa un nuevo N° de celular">
                <label>Dirección de residencia</label>
                <input type="text" name="direction" placeholder="Ingresa una nueva dirección">
                <label>Ciudad</label>
                <input type="text" name="city" placeholder="Ingrese una nueva ciudad">
                <label>Departamento</label>
                <input type="text" name="departament" placeholder="Ingrese un nuevo departamento">
                <input class="submit_button" type="submit" name="send" value="Actualizar">
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