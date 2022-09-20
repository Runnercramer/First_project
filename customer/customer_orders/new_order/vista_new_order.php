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
        .methods{grid-template-columns:2fr 7fr;}
        .main_container{display:grid;grid-template-columns:1fr 1fr;grid-template-rows:1fr 1fr;grid-gap:10px;}
        .product_card{background-color:#bbb;display:flex;flex-direction:column;justify-content:space-evenly;padding:5px;}
        .product_card>form{display:inherit;flex-direction:inherit;justify-content:inherit;}
        .img_product{width:35%;margin:0 auto;}
        .cant_input{text-align:center;}
    </style>
     <script>
        let cart = {};
    function logout(){
        window.location.href = "../../../main/logout.php";
    }

    function profile(){
        window.location.href = "../../customerprofile.php";
    }

    function visitCart(){
        window.location.href="../../go_to_cart/vista_carrito.php";
    }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'cliente'){
        header("location:../../../main/index.html");
    }
    include("../../../connection.php");

    $tamaño_pagina = 4;
    if(isset($_GET['pagina'])){
        if($_GET['pagina'] == 1){
            header("location:/Vetex/customer/customer_orders/new_order/vista_new_order.php");
        }else{
            $pagina = $_GET['pagina'];
        }
    }else{
        $pagina = 1;
    }
    $empezar_desde = ($pagina - 1) * $tamaño_pagina;

    $sql1 = "SELECT * FROM imagenproducto im JOIN producto pr ON im.codProducto = pr.codProducto JOIN detalleproducto dp ON pr.codProducto = dp.codProducto ORDER BY producto ASC";
    $query1 = mysqli_query($connection, $sql1);

    $num_filas = $query1->num_rows;

    $total_paginas = ceil($num_filas/$tamaño_pagina);

    $sql1_limite = "SELECT * FROM imagenproducto im JOIN producto pr ON im.codProducto = pr.codProducto JOIN detalleproducto dp ON pr.codProducto = dp.codProducto ORDER BY producto ASC LIMIT $empezar_desde,$tamaño_pagina";

    $query1_limite = mysqli_query($connection, $sql1_limite);
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
                <br>
                <p>Encontrarás un listado a la mano derecha con los productos que ofrecemos, una breve descripción y la capacidad de escoger la cantidad que requieras.</p>
                <br>
                <h3 id="main_form_button" >Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
                <form action="new_order_controller.php" method="POST">
                    <input type="button" value="Carrito &#128722" name="add" onclick="visitCart()" style="margin-top:30px;margin-left:15px;width:200px;height:40px;background-color:beige;box-shadow:3px 3px 20px 5px black;font-weight:bold;font-size:1.2em;">
            </div>
            <div class="main_container">
                <?php
                    while($r = $query1_limite->fetch_assoc()){
                        $cont = $r['imagen'];
                        $cod = $r['codProducto'];
                        echo "
                        <div class='product_card'>
                        <h3 align='center'>$cod</h3>
                        <img class='img_product' src='data:image/jpeg; base64, " . base64_encode($cont) . "'>
                        <h3>" . $r['producto'] . "</h43>
                        <h4>" . $r['valorProducto'] . "</h4>
                        <p>" . $r['descripcionProducto'] . "</p>

                        <form method='POST' action='new_order_controller.php'>
                        <input type='hidden' name='codigo' value='" . $r['codProducto'] . "'>
                        <input type='hidden' name='producto' value='" . $r['producto'] . "'>    
                        <input type='hidden' name='valor' value='" . $r['valorProducto'] . "'>    
                        <input class='cant_input' type='number' name='cantidad' value='1'>
                        <input type='submit' name='send' value='Agregar' >
                        </div>
                        </form>
                        ";
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
            </form>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>