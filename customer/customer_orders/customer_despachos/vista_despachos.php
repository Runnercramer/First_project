<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Despachos</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../customer_styles.css">
    <link rel="stylesheet" href="../../new_customer_styles.css">
    <style>
        .main_table{border:2px solid black;text-align:center;background-color:#aaa;margin:30px auto;}
        .main_table td{padding:3px;background-color:#ddd;}
        .table_title{font-weight:bold;}
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
            <a href='../../customer_orders/vista_pedido.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Despachos</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>DESPACHOS</h2>
                <p>En esta interfaz podrás visualizar un listado de los pedidos realizados y que aún no se han entregado. Esto incluye los que ya han sido depachados desde la bodega y los que no.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <table class="main_table">
                    <tr>
                        <td class="table_title">Código despacho</td>
                        <td class="table_title">Código de pedido</td>
                        <td class="table_title">Fecha de despacho</td>
                        <td class="table_title">Estado del despacho</td>
                        <td class="table_title">Código de guía</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>A-000</td>
                        <td>25-07-2022</td>
                        <td>Entregado</td>
                        <td>biwdawbuifs19861sef</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>A-001</td>
                        <td>30-07-2022</td>
                        <td>En camino</td>
                        <td>bausbciaseb19s84g16x</td>
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