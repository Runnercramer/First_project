<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Nuevo despacho</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../colaborador.css">
    <style>
        .main_form{width:80%;background-color:#bbb;margin:10px auto;display:flex;flex-direction:column;align-items:center;justify-content:space-evenly;font-size:1.5em;font-weight:bold;height:450px;box-shadow:5px 5px 20px 5px #333;}
        .main_form input[type="text"], input[type="date"]{width:60%;text-align:center;font-size:0.9em;border-radius:15px;}
        input[type="submit"]{width:45%;font-size:0.9em;background-color:#85b427;border-radius:15px;box-shadow:3px 3px 10px 3px #333;font-weight:inherit;}
        input[type="submit"]:hover{background-color:#a1ca4f;}
        input[type="submit"]:active{background-color:black;color:white;}
    </style>
    <script>
        function profile(){
            window.location.href = "../../coworkerprofile.php";
        }

        function logout(){
            window.location.href = "../../../main/logout.php";
        }

    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'empleado'){
        header("location:../../../index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_despachos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Nuevo despacho</h1>
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
                <h2>NUEVO DESPACHO</h2>
                <br>
                <p>Ingresa la información del formulario para registrar el despacho realizado.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <form class="main_form" action="new_despacho_controller.php" method="POST">
                    <label>Código del pedido</label>
                    <input type="text" name="cod_pedido" placeholder="Ingresa el código del pedido XX-XXX" required>
                    <label>Fecha del envío</label>
                    <input type="date" name="date">
                    <label>Transportadora</label>
                    <input type="text" name="trans" placeholder="Empresa transportadora" required>
                    <label>Guía</label>
                    <input type="text" name="guia" placeholder="Ingresa el N° de guía" required>
                    <input type="submit" name="send" value="Crear">
                </form>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>