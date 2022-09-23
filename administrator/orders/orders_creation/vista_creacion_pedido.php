<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Crear pedido</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .orders_function{background-color:#aaa;width:90%;display:flex;flex-direction:column;align-items:center;padding:10px;font-size:2em;font-weight:bold;height:auto;min-height:530px;justify-content:space-evenly;box-shadow:5px 5px 20px 5px #333;}
        input[type="text"], input[type="date"], input[type="number"]{width:60%;text-align:center;height:30px;font-size:0.7em;border-radius:15px;}
        select{width:60%;height:30px;text-align:center;border-radius:15px;}
        .button_form, input[type="submit"]{background-color:#a1ca4f;width:40%;height:30px;text-align:center;margin:10px;box-shadow:3px 3px 10px 3px #333;font-weight:bold;font-size:0.6em;border-radius:15px;}
        .button_form:hover, input[type="submit"]:hover{background-color:#74a118;}
        .button_form:active, input[type="submit"]:active{background-color:black;color:white;}
    </style>
               <script>
        function profile(){
            window.location.href = "../../adminprofile.php";
        }

        function logout(){
            window.location.href = "../../../main/logout.php";
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
            <a href='../vista_pedidos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Crear pedidos</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>CREACIÓN PEDIDOS</h2>
                <br>
                <p>Ingresa los datos solicitados en el formulario para crear un nuevo pedido.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <form class="orders_function" action="creation_orders_controller.php" method="POST">
                    <label>Cód Pedido</label>
                    <input type="text" name="idpedido" placeholder="Ingresa el código (X-XXX)" required>
                    <label>Cédula cliente</label>
                    <input type="text" name="idcliente" placeholder="Ingresa la cédula del cliente" required>
                    <label>Fecha</label>
                    <input type="date" name="date1" placeholder="Ingresa la fecha en que se realizó el pedido">
                    <label>Productos</label>
                <!--Debo transaformar este archivo en PHP, para que el listado se actualice a medida que se agreguen nuevos productos-->
                    <select name="product">
                        <option value="0">-----------------------</option>
                        <option value="QCM-255">QCM-255</option>
                        <option value="QCM-256">QCM-256</option>
                        <option value="QCM-257">QCM-257</option>
                        <option value="QCM-260">QCM-260</option>
                    </select>
                    <label>Cantidad</label>
                    <input type="number" name="cantidad" placeholder="Ingresa la cantidad">
                    <input class="button_form" type="button" name="newproduct" value="Agregar producto">
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