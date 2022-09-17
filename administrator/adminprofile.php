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

    function updateProfile(){
        window.location.href="updateinfo.php";
    }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../main/index.html");
    }
    ?>
    <div id="cont1">
        <header>
            <a href="vista_administrador.php"><img id="img1" src="../imagenes/descarga.png" alt="Logotipo de Vetex"></a>
            <h1>Perfil</h1>
        </header>
        <section class="main_section">
            <div class="info">
                <h2>PERFIL</h2>
                <br>
                <p>En esta interfaz, podrás verificar tus datos existentes y podrás modificarlos cuando quieras.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="data">
                <img src="../imagenes/profile.png" alt="Imágen de perfil" class="profile_img">
                <p><b>Nombre: </b><?php echo $_SESSION['userinfo']['nombreUsuario'] . " " . $_SESSION['userinfo']['apellidosUsuario'];?></p>
                <p><b>Cédula: </b><?php echo $_SESSION['userinfo']['idUsuario'];?></p>
                <p><b>Email: </b><?php echo $_SESSION['useremail']['email'];?></p>
                <p><b>Celular: </b><?php echo $_SESSION['usercell']['celular'];?></p>
                <p><b>Tipo de usuario: </b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></p>
                <p><b>Contraseña: </b><?php echo $_SESSION['password']['pass'];;?></p>
            </div>
            <div class="function">
                <input class="profile_update" type="button" name="modify" value="Actualizar datos" onclick="updateProfile()">
                <input class="logout_button" type="button" name="logout" value="Cerrar sesión" onclick="logout()">
            </div>
        </section>
        <footer>
            <p id="pa1">Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
        </footer>
    </div>
</body>
</html>