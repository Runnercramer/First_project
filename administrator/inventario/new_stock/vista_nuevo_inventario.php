<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Nuevo inventario</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .stock_form{width:80%;margin:10px auto;display:flex;flex-direction:column;height:350px;align-items:center;justify-content:space-evenly;font-weight:bold;font-size:1.5em;padding:10px;background-color:#bbb;box-shadow:5px 5px 20px 5px #333;}
        .stock_input{width: 60%;text-align:center;font-size:1em;border-radius:15px;}
        .stock_button{background-color:beige;width:40%;font-size:1em;font-weight:bold;border-radius:15px;padding:5px;box-shadow:3px 3px 15px 3px #333;}
        .stock_button:hover{background-color:blanchedalmond;}
        .stock_button:active{background-color:lightsalmon;}
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
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../main/index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_inventario.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Nuevo inventario</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>NUEVO INVENTARIO</h2>
                <br>
                <p>Ingresa la información solicitada para ingresar un nuevo inventario.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>   
                <form class='stock_form' action='new_stock_controller.php' method='POST'>
                    <label>Administrador</label>
                    <input class='stock_input' type='number' name='admin' placeholder='Ingresa el código del administrador' required>
                    <label>Encargado</label>
                    <input class='stock_input' type='text' name='encargado' placeholder='Quien realiza el inventario' required>
                    <input class='stock_button' type='submit' name='send' value='Crear'>
                </form>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>