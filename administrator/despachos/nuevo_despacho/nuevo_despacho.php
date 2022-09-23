<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Creación despachos</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .main_form{margin:10px auto;width:90%;background-color:#aaa; display:flex;flex-direction:column;align-items:center;justify-content:space-evenly;padding:10px;font-size:2em;font-weight:bold;box-shadow:5px 5px 20px 5px #333;}
        .main_form input[type="text"], input[type="number"], input[type="date"]{width:65%;margin:15px;height:40px;text-align:center;font-size:0.7em;border-radius:15px;}
        .main_form input[type="submit"]{width:45%;background-color:#74a118;font-weight:bold;text-align:center;height:40px;margin:15px;font-size:0.6em;box-shadow:3px 3px 10px 3px #333;border-radius:15px;}
        .main_form input[type="submit"]:hover{background-color:#a1ca4f;}
        .main_form input[type="submit"]:active{background-color:black;color:white;}
    </style>
             <script>
        function profile(){
            window.location.href = "../../adminprofile.php";
        }

        function logout(){
            window.location.href = "../../../main/logout.php";
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
            <a href='../vista_despachos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Creación de despacho</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>CREACIóN DESPACHOS</h2>
                <br>
                <p>Ingresa la información solicitada en este formulario para registrar un nuevo despacho.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <form class="main_form" action="nuevo_despacho_controller.php" method="POST">
                    <label>Código de pedido</label>
                    <input type="text" name="codpedido" placeholder="Ingresa el código del pedido 'X-XXX'" required>
                    <label>Empleado encargado del despacho</label>
                    <input type="number" name="idempleado" placeholder="Ingresa el código del empleado" required>
                    <label>Fecha del envío</label>
                    <input type="date" name="date" required>
                    <label>Transportadora</label>
                    <input type="text" name="empresa" placeholder="Empresa transportadora" required>
                    <label>Guía</label>
                    <input type="text" name="guia" placeholder="Ingresa el N° de guia" required>
                    <input type="submit" name="send" value="Crear despacho">
                </form>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>