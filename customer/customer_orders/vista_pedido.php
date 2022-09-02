<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Pedido</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../customer_styles.css">
    <link rel="stylesheet" href="../new_customer_styles.css">
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo'])){
        header("location:../../main/index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_cliente.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Pedidos</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>PEDIDOS</h2>
                <p>En esta interfaz tienes acceso al listado de los pedidos realizados, el estado de los despachos recientes , podrás realizar un nuevo pedido o actualizar un pedido realizado con un plazo máximo de <b>2 días hábiles</b> despues de realizado.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="function_cont">
                <div class="button1"><input class="button" type="button" onClick="" value="Listado de pedidos"></div>
                <div class="button2"><input class="button" type="button" onClick="" value="Estado de despachos"></div>
                <div class="button3"><input class="button" type="button" onClick="" value="Nuevo pedido"></div>
                <div class="button4"><input class="button" type="button" onClick="" value="Actualizar pedido"></div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>