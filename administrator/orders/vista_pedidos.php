<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Pedidos</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../administrator_styles.css">
    <link rel="stylesheet" href="../new_admin_styles.css">
    <style>
        .orders_function{height:auto;min-height:530px;background-color:#bbb;display:grid;grid-template-columns:repeat(2, 1fr);grid-template-rows:repeat(2, 1fr);box-shadow:5px 5px 20px 5px #333;}
        .button{font-size:1.8em;margin:100px;width:60%;}
        .order_query{display:flex;flex-direction:column;text-align:center;align-items:center;}
        label{font-size:2em;margin:25px;font-weight:bold;}
        input[type="search"]{width:70%;height:40px;text-align:center;font-size:1.2em;}
        .search_field{width:80%;display:flex;flex-direction:row;justify-content:space-around;}
        .search_input{border-radius:15px;}
        .submit_button{border-radius:50%;width:40px;height:40px;font-size:1.2em;background-color:#74a118;}
        .submit_button:hover{background-color:#a1ca4f;}
        .submit_button:active{background-color:black;color:white;}
    </style>
             <script>
        function profile(){
            window.location.href = "../adminprofile.php";
        }

        function logout(){
            window.location.href = "../../main/logout.php";
        }

        function toCreate(){
            window.location.href="orders_creation/vista_creacion_pedido.php";
        }

        function toEdit(){
            window.location.href="orders_modification/vista_modificacion_pedido.php";
        }

        function report(){
            window.location.href="orders_list/vista_reporte_pedidos.php";
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
            <h1>Pedidos</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>PEDIDOS</h2>
                <br>
                <p>En esta interfaz podrá crear un nuevo pedido, editar un pedido existente y obtener un listado completo con los pedidos realizados.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <form class="orders_function" action="orders_controller.php" method="GET">
                    <div class="order order_creation">
                        <input class="button" type="button" name="creation" value="Crear un pedido" onClick="toCreate()">
                    </div>
                    <div class="order order_modification">
                        <input class="button" type="button" name="modification" value="Modificar un pedido" onClick="toEdit()">
                    </div>
                    <div class="order order_list">
                        <input class="button" type="button" name="order_list" value="Reporte pedidos" onClick="report()">
                    </div>
                    <div class="order order_query">
                        <label>Buscar pedido</label>
                        <div class="search_field">
                        <input class='search_input' type="search" name="search" placeholder="Ingresa el nombre del cliente">
                        <input class="submit_button" type="submit" name="send" value="&#128269">
                    </div>
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