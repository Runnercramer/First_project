<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Producto</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../administrator_styles.css">
    <link rel="stylesheet" href="../new_admin_styles.css">
    <style>
        .function_cont{display:grid;grid-template-rows:1fr 1fr; grid-template-columns:1fr 1fr}
        .button{width:80%;}
    </style>
    <script>
        function profile(){
            window.location.href = "../adminprofile.php";
        }

        function logout(){
            window.location.href = "../../main/logout.php";
        }

        function listadoProductos(){
            window.location.href= "product_list/vista_listado_productos.php";
        }

        function nuevoProducto(){
            window.location.href= "new_product/vista_nuevo_producto.php";
        }

        function habilitarProducto(){
            window.location.href= "enable_product/vista_habilitar.php";
        }

        function deshabilitarProducto(){
            window.location.href= "disable_product/vista_deshabilitar.php";
        }
        function vergarantias(){
            window.location.href= "ver_garantias/vistagarantias.php";
        }
        function actualizarexistencias(){
            window.location.href= "existencias/verexistencias.php";
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
            <h1>Productos</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">.
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>Productos</h2>
                <br>
                <p>En este módulo podrás ver un listado con todos los productos existentes, crear un nuevo producto, habilitar o deshabilitar productos existentes.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="function_cont">
                <div class="button1"><input class="button" type="button" value="Listado de productos" onclick="listadoProductos()"></div>
                <div class="button2"><input class="button" type="button" value="Crear producto" onclick="nuevoProducto()"></div>
                <div class="button3"><input class="button" type="button" value="Habilitar producto" onclick="habilitarProducto()"></div>
                <div class="button4"><input class="button" type="button" value="Deshabilitar producto" onclick="deshabilitarProducto()"></div>
                <div class="button5"><input class="button" type="button" value="Ver Garantias" onclick="vergarantias()"></div>
                <div class="button6"><input class="button" type="button" value="Actualizar Existencias" onclick="actualizarexistencias()"></div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
