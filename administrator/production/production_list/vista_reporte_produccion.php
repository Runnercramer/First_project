<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Reporte Producción</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .production_table{width:70%;margin:20px auto;background-color:#bbb;text-align:center;font-size:1.2em;}
        .header{background-color:#74a118;border:1px solid black;font-weight:bold;height:30px;}
        .field{background-color:#999;height:30px;}
    </style>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo'])){
        header("location:../../../main/index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_produccion.html'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Reporte producción</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881">
                <input type="button" class="logout_button" value="Cerrar sesión">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>REPORTE PRODUCCIÓN</h2>
                <br>
                <p>En esta interfaz obtendrás un listado de la producción general de la bodega. Puedes oprimir sobre la referencia de un producto para ver la producción de ese producto.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="production_report">
                <table class="production_table">
                    <tr>
                        <td class="header">Cód Producción</td>
                        <td class="header">Producto</td>
                        <td class="header">Cantidad</td>
                        <td class="header">Fecha</td>
                        <td class="header">Empleado</td>
                    </tr>
                    <tr>
                        <td class="field">1</td>
                        <td class="field">QCM-251</td>
                        <td class="field">982</td>
                        <td class="field">15-07-2022</td>
                        <td class="field">Ana García</td>
                    </tr>
                    <tr>
                        <td class="field">2</td>
                        <td class="field">QCM-255</td>
                        <td class="field">1026</td>
                        <td class="field">16-07-2022</td>
                        <td class="field">Ana García</td>
                    </tr>
                </table>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>