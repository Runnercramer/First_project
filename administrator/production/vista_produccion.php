<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Producción</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../administrator_styles.css">
    <link rel="stylesheet" href="../new_admin_styles.css">
    <style>
        .production_function{display:grid;grid-template-rows:repeat(2, 1fr);height:auto;min-height:530px;width:90%;margin:10px auto;background-color:#bbb;padding:15px;align-items:center;justify-content:center;font-size:2.5em;}
        .production_button{width:90%;height:40px;background-color:#a1ca4f;font-weight:bold;font-size:0.7em;margin-top:20px;border-radius:20px;box-shadow:3px 3px 10px 3px #333;}
        .production_button:hover{background-color:#74a118;}
        .production_button:active{background-color:black;color:white;}
        input[type="search"]{width:90%;height:30px;text-align:center;}
        input[type="submit"]{width:30px;height:30px;border-radius:50%;margin-left:45%;background-color:#a1ca4f;}
        input[type="submit"]:hover{background-color:#74a118;}
        input[type="submit"]:active{background-color:black;}
    </style>
                  <script>
        function profile(){
            window.location.href = "../adminprofile.php";
        }

        function logout(){
            window.location.href = "../../main/logout.php";
        }

        function report(){
            window.location.href="production_list/vista_reporte_produccion.php";
        }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../main/index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_administrador.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Producción</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>PRODUCCIÓN</h2>
                <br>
                <p>En esta interfaz podrás obtener un reporte de la productividad general de los empleados o de un empleado en específico.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="production_function">
                <div class="general_production">
                    <h3>Reporte general</h3>
                <input class="production_button" type="button" name="button1" value="Reporte producción" onClick="report()">
                </div>
                <div>
                    <form class="production_form" action="production_controller.php" method="GET">
                    <h3>Reporte individual</h3>
                    <input type="search" name="search" placeholder="Ingrese el nombre del empleado">
                    <input type="submit" name="send" value="&#128269">
                    </form>
                </div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>