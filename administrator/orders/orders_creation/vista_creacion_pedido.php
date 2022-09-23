<?php
include("../../../connection.php");
?>
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
        .main_container{display:grid;grid-template-columns:1fr 1fr;grid-template-rows:1fr 1fr 100px;grid-gap:20px;}
        .order_form{background-color:#bbb;width:60%;margin:0 auto;display:flex;flex-direction:column;align-items:center;padding:10px;font-weight:bold;font-size:1.2em;height:180px;justify-content:space-evenly;grid-column-start:1;grid-column-end:3;box-shadow:5px 5px 15px 5px #333;}
        .order_input{width:60%;font-size:1em;text-align:center;border-radius:15px;}
        .query_button{background-color:beige;box-shadow:3px 3px 10px 3px #333;width:30%;font-weight:bold;font-size:1em;margin:5px;border-radius:15px;}
        .product_card{display:flex;flex-direction:column;align-items:center;background-color:#ccc;box-shadow:3px 3px 10px 3px #333;padding:10px;justify-content:space-evenly;}
        .img_product{width:200px;}
        .cant_input{width:50%;text-align:center;}
        .addToCart{background-color:beige;padding:2px;font-weight:bold;}
        .pag{grid-column-start:1;grid-column-end:3;display:flex;flex-direction:row;justify-content:space-evenly;}
        .pag_button{font-size:1.1em;padding:3px 5px;background-color:beige;box-shadow:3px 3px 10px #333;}
    </style>
    <script>
        function profile(){
            window.location.href = "../../adminprofile.php";
        }

        function logout(){
            window.location.href = "../../../main/logout.php";
        }

        function goToCart(){
            window.location.href = "cart.php";
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
                <p>Selecciona los productos y las cantidades que quieras agregar al pedido.<br>Luego puedes visitar el carrito de la compra</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
                <input type="button" class='query_button' name="send" value="Carrito" onclick="goToCart()">
            </div>
            <?php
            $tamaño_pagina = 4;
            if(isset($_GET['pagina'])){
                if($_GET['pagina'] == 1){
                    header("location:/Vetex/administrator/orders/orders_creation/vista_creacion_pedido.php");
                }else{
                    $pagina = $_GET['pagina'];
                }
            }else{
                $pagina = 1;
            }
            $empezar_desde = ($pagina - 1) * $tamaño_pagina;

            $sql1 = "SELECT * FROM imagenproducto im JOIN producto pr ON im.codProducto = pr.codProducto JOIN detalleproducto dp ON pr.codProducto = dp.codProducto WHERE estadoProducto = 'habilitado' ORDER BY producto ASC";
            $query1 = mysqli_query($adminconnection, $sql1);

            $num_filas = $query1->num_rows;

            $total_paginas = ceil($num_filas/$tamaño_pagina);

            $sql1_limite = "SELECT * FROM imagenproducto im JOIN producto pr ON im.codProducto = pr.codProducto JOIN detalleproducto dp ON pr.codProducto = dp.codProducto ORDER BY producto ASC LIMIT $empezar_desde,$tamaño_pagina";

            $query1_limite = mysqli_query($adminconnection, $sql1_limite);
            
            ?>
            <div class="main_container">
               <?php
                   while($r = $query1_limite->fetch_assoc()){
                        $cont = $r['imagen'];
                        $cod = $r['codProducto'];
                        echo "
                        <div class='product_card'>
                        <h3 align='center'>$cod</h3>
                        <img class='img_product' src='data:image/jpeg; base64, " . base64_encode($cont) . "'>
                        <h3>" . $r['producto'] . "</h3>
                        <h4>" . $r['valorProducto'] . "</h4>
                        <p>" . $r['descripcionProducto'] . "</p>

                        <form class='add_form' method='POST' action='new_order_controller.php'>
                        <input type='hidden' name='codigo' value='" . $r['codProducto'] . "'>
                        <input type='hidden' name='producto' value='" . $r['producto'] . "'>    
                        <input type='hidden' name='valor' value='" . $r['valorProducto'] . "'>    
                        <input class='cant_input' type='number' name='cantidad' value='1'>
                        <input class='addToCart' type='submit' name='send' value='Agregar'>
                        </form>
                        </div>";
                    }
                    ?>
                <div class="pag">
                    <?php
                    for($i = 1; $i<=$total_paginas; $i++){
                        echo "<a href='?pagina=" . $i . "'><input class='pag_button' type='button' value='$i'></a>";
                    }
                
                    ?>
                    
                    </div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>