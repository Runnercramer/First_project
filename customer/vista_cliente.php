<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Cliente</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../main/estilos.css'/>
    <link rel='icon' href='../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="customer_styles.css">
    <link rel="stylesheet" href="new_customer_styles.css">
    <script>
    function logout(){
        window.location.href = "../main/logout.php";
    }

    function goToBalance(){
        window.location.href = "customer_balance/vista_balance.php";
    }

    function orders(){
        window.location.href = "customer_orders/vista_pedido.php";
    }

    function service(){
        window.location.href = "service_assessment/vista_servicio_al_cliente.php";
    }

    function goToCart(){
        window.location.href = "go_to_cart/";
    }

    function profile(){
        window.location.href = "customerprofile.php";
    }
    </script>
</head>
<body>
<?php
session_start();

if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'cliente'){
    header("location:../main/index.html");
}
?>

    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_cliente.php'><img id='img1' src='../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Bienvenid@ <?php echo $_SESSION['userinfo']['nombreUsuario'];?></h1>

            <div class="profile">
                <img id="profile_image" src="../imagenes/profile.png" alt="Imagen de perfil">
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onClick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>VETEX</h2>
                <p>Empresa constituida en el año 2019 en el área de la telefonía móvil y más específicamente en el comercio de accesorios por Juan Cortes Orosco, quién comenzó como un comerciante independiente importando accesorios para telefonía celular.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="function_cont">
                <div class="button1"><input class="button" type="button" onClick="goToBalance()" value="Balance"></div>
                <div class="button2"><input class="button" type="button" onClick="orders()" value="Pedidos"></div>
                <div class="button3"><input class="button" type="button" onClick="service()" value="Valoración servicio"></div>
                <div class="button4"><input class="button" type="button" onClick="goToCart()" value="Visitar carrito"></div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
