<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Crear producto</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .main_form{background-color:#aaa;display:flex;flex-direction:column;align-items:center;font-weight:bold;padding:15px;height:500px;justify-content: space-evenly;font-size:1.5em;}
        .main_form input[type="text"], input[type="number"]{width:60%;text-align:center;font-size:0.9em;border-radius:15px;}
        input[type="file"]{font-size:0.9em;}
        input[type="submit"]{background-color:#a1ca4f;width:40%;height:35px;border-radius:15px;font-size:1em;font-weight:bold;box-shadow:3px 3px 10px 3px #333;}
    </style>
    <script>
        function profile(){
            window.location.href = "../../adminprofile.php";
        }

        function logout(){
            window.location.href = "../../main/logout.php";
        }

    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_producto.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Creación de productos</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">.
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>CREAR PRODUCTOS</h2>
                <br>
                <p>Ingresa los datos solicitados en el formulario para crear un nuevo producto</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="main_cont">
                <form class="main_form" action="new_product_controller.php" method="POST" enctype="multipart/form-data">
                    <label>Código producto</label>
                    <input type="text" name="id" placeholder="Ingrese el código de referencia del producto" required>
                    <label>Nombre</label>
                    <input type="text" name="name" placeholder="Ingrese el nombre del producto" required>
                    <label>Descripción</label>
                    <input type="text" name="description" placeholder="Ingrese una descipción del producto" required>
                    <label>Valor Unidad</label>
                    <input type="number" name="price" placeholder="Ingresa el valor de la unidad" required>
                    <label>Imágen (PNG, JPG, JPEG) máx 2Mb</label>
                    <input type="file" name="imagen">
                    <input type="submit" name="send" value="Crear producto">
                </form>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
