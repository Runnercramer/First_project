<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Nuevo pedido</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../customer_styles.css">
    <link rel="stylesheet" href="../../new_customer_styles.css">
    <style>
        .products{background-color:lightsalmon}
    </style>
     <script>
    function logout(){
        window.location.href = "../../../main/logout.php";
    }

    function profile(){
        window.location.href = "../../customerprofile.php";
    }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'cliente'){
        header("location:../../../main/index.html");
    }
    include("../../../connection.php    ");
    $sql1 = "SELECT * FROM imagenproducto im JOIN producto pr ON im.codProducto = pr.codProducto JOIN detalleproducto dp ON pr.codProducto = dp.codProducto";
    $query1 = mysqli_query($connection, $sql1);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../../customer_orders/vista_pedido.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Nuevo pedido</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>NUEVO PEDIDO</h2>
                <p>Encontrarás un listado a la mano derecha con los productos que ofrecemos, una breve descripción y la capacidad de escoger la cantidad que requieras.</p>
                <br>
                <h3 id="main_form_button" >Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
                <form action="new_order_controller.php" method="POST">
                    <input type="submit" value="Agregar al carrito" name="add_to_cart" style="margin-top:30px;margin-left:15px;width:200px;height:40px;background-color:#a1ca4f;box-shadow:3px 3px 20px 5px black;font-weight:bold;font-size:1.2em;">
                    <input type="reset" value="Reiniciar las ordenes seleccionadas" style="margin-top:30px;margin-left:15px;width:320px;height:40px;background-color:#a1ca4f;box-shadow:3px 3px 20px 5px black;font-weight:bold;font-size:1em;">
            </div>
            <div class="main_container">
                <table class="products">
                    <?php
                    while($r = $query1->fetch_assoc()){
                        echo "
                        <tr>
                        <td>" . $r['producto'] . "</td>
                        <td>" . $r['valorProducto'] . "</td>
                        <td>" . $r['codProducto'] . "</td>
                        </tr>
                        ";
                    }
                    echo "</table>";
                    ?>
                
            </div>
            </form>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>