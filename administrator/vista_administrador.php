<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Administrador</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../main/estilos.css'/>
    <link rel='icon' href='../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="administrator_styles.css">
    <link rel="stylesheet" href="new_admin_styles.css">
    <style>
        .button7{grid-column-start:1; grid-column-end:2;}
    </style>
    <script>
        function profile(){
            window.location.href = "adminprofile.php";
        }

        function logout(){
            window.location.href = "../main/logout.php";
        }

        function customers(){
            window.location.href = "customer_administrator/vista_cliente_admin.php";
        }

        function contabilidad(){
            window.location.href = "contabilidad/vista_transaccion.php";
        }

        function despachos(){
            window.location.href = "despachos/vista_despachos.php";
        }

        function coworkers(){
            window.location.href = "co-workers_administrator/vista_empleados.php";
        }

        function stock(){
            window.location.href = "inventario/vista_inventario.php";
        }

        function orders(){
            window.location.href = "orders/vista_pedidos.php";
        }

        function production(){
            window.location.href = "production/vista_produccion.php";
        }

        function producto(){
            window.location.href="product/vista_producto.php";
        }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../main/index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_administrador.php'><img id='img1' src='../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Bienvenid@ <?php echo $_SESSION['userinfo']['nombreUsuario']?></h1>
            <div class="profile">
                <img id="profile_image" src="../imagenes/profile.png" alt="Imagen de perfil">.
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>VETEX</h2>
                <br>
                <p>Empresa constituida en el año 2019 en el área de la telefonía móvil y más específicamente en el comercio de accesorios por Juan Cortes Orosco, quién comenzó como un comerciante independiente importando accesorios para telefonía celular.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="function_cont">
                <div class="button1"><input class="button" type="button" onClick="customers()" value="Clientes"></div>
                <div class="button2"><input class="button" type="button" onClick="contabilidad()" value="Contabilidad"></div>
                <div class="button3"><input class="button" type="button" onClick="despachos()" value="Despachos"></div>
                <div class="button4"><input class="button" type="button" onClick="coworkers()" value="Empleados"></div>
                <div class="button5"><input class="button" type="button" onClick="stock()" value="Inventario"></div>
                <div class="button6"><input class="button" type="button" onClick="orders()" value="Pedidos"></div>
                <div class="button7"><input class="button" type="button" onClick="production()" value="Producción"></div>
                <div class="button8"><input class="button" type="button" onClick="producto()" value="Producto"></div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
