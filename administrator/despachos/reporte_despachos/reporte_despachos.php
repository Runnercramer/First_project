<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Reporte despachos</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .main_form{width:90%;margin:10px auto;background-color:#aaa;display:flex;flex-direction:column;padding:15px;font-size:1.5rem;font-weight:bold;align-items:center;box-shadow:5px 5px 20px 5px #333;}
        .subcontainer{width:70%;display:flex;flex-direction:column;align-items:center;}
        .subcontainer label{margin:10px;}
        .subcontainer input[type="date"], input[type="search"]{width:80%;margin:10px;height:30px;text-align:center;font-size:1rem;border-radius:15px;}
        .main_button{background-color:#74a118;width:40%;height:30px;text-align:center;font-weight:bold;margin:15px;font-size:1.2rem;box-shadow:3px 3px 10px 3px #333;border-radius:15px;}
        .main_button:hover{background-color:#a1ca4f;}
        .main_button:active{background-color:black;color:white;}
    </style>
             <script>
        function profile(){
            window.location.href = "../../adminprofile.php";
        }

        function logout(){
            window.location.href = "../../../main/logout.phps";
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
            <h1>Reporte despachos</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h>REPORTE DESPACHOS</h2>
                <br>
                <p>En esta interfaz podrás obtener el reporte de los despachos en general si ingresas las 2 fechas solicitadas o un listado de los despachos relacionados a un cliente.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <form class="main_form" action="reporte_despacho_controller.php" method="GET">
                    <div class="subcontainer">
                        <h3>Reporte general</h3>
                        <label>Fecha de inicio</label>
                        <input type="date" name="date1" placeholder="Ingresa la primera fecha">
                        <label>Fecha de fin</label>
                        <input type="date" name="date2" placeholder="Ingresa la segunda fecha">
                    </div>
                    <br>
                    <div class="subcontainer">
                        <h3>Reporte individual</h3>
                    <label>Nombre del cliente</label>
                    <input type="search" name="search" placeholder="Ingresa el nombre del cliente">
                    <input class="main_button" type="submit" name="send" value="Generar reporte">
                    </div>
                </form>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>