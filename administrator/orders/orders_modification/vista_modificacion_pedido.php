<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Modificar pedido</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .main_table{background-color:#bbb;width:50%;margin:20px auto;height:auto;min-height:150px;text-align:center;}
        .header{background-color:#a1ca4f;font-weight:bold;}
        .field{background-color:#999;}
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
            <a href='../vista_pedidos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Modificación de pedidos</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881">
                <input type="button" class="logout_button" value="Cerrar sesión">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>MODIFICACIÓN PEDIDOS</h2>
                <br>
                <p>En esta interfaz podrás encontrar un listado de los pedidos no despachados, los cuales podrás ser modificados. Puedes oprimir en el código del pedido para ver y modificar los detalles del mismo.<p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <!--Al clicar en el código del pedido, deberá redirigir a una página que muestre todo el pedido-->
                <table class="main_table">
                    <tr>
                        <td class="header">N°</td>
                        <td class="header">Código pedido</td>
                        <td class="header">Fecha pedido</td>
                        <td class="header">Cliente</td>
                    </tr>
                    <tr>
                        <td class="field">1</td>
                        <td class="field">A-000</td>
                        <td class="field">15-07-2022</td>
                        <td class="field">Juan Perez</td>
                    </tr>
                    <tr>
                        <td class="field">2</td>
                        <td class="field">A-001</td>
                        <td class="field">25-07-2022</td>
                        <td class="field">Fernando Bohorquez</td>
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