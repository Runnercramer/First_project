<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Inventario</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../administrator_styles.css">
    <link rel="stylesheet" href="../new_admin_styles.css">
    <style>
        .function_inventory{display:grid;grid-template-rows:1fr 1fr;}
    </style>
             <script>
        function profile(){
            window.location.href = '../adminprofile.php';
        }

        function logout(){
            window.location.href = '../../main/logout.php';
        }

        function newStock(){
            window.location.href = 'new_stock/vista_nuevo_inventario.php';
        }

        function stockReport(){
            window.location.href = 'stock_report/vista_reporte_inventario.php';
        }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_administrador.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Inventario</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>INVENTARIO</h2>
                <br>
                <p>En esta interfaz podrás registrar un nuevo inventario realizado y obtener infirmación de un inventario en específico.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="function_inventory">   
                <div>
                    <input class='button' type='button' name='create_stock' value='Registrar un inventario' onclick='newStock()'>
                </div>
                <div>
                    <input class='button' type='button' name='stock_report' value='Reporte inventarios' onclick='stockReport()'>
                </div> 
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>