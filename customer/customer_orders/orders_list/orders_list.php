<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Listado de pedidos</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../customer_styles.css">
    <link rel="stylesheet" href="../../new_customer_styles.css">
    <style>
        .order_table{width:100%;background-color:#777;font-weight:bold;text-align:center;}
        .header{background-color:#a1ca4f;font-size:1.5em;border:1px solid black;}
        .field{background-color:#bbb;font-size:1.2em;border:1px solid black;}
        .submit_button{background-color:#bbb;font-size:1em;font-weight:bold;border:1px hidden;}
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

    $id = $_SESSION['customerinfo']['idCliente'];
    $sql1 = "SELECT * FROM pedido WHERE idCliente = '$id'";
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_pedido.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Listado de pedidos</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']); ?></b></h3>
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>Listado de pedidos</h2>
                <br>
                <p>Este es un listado con los pedidos realizados por usted.<br><b>Oprima en el código de un pedido para ver los detalles del mismo.</b></p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
            <table class='order_table'>
                <tr>
                    <td class='header'>N°</td>
                    <td class='header'>Código</td>
                    <td class='header'>Fecha</td>
                    <td class='header'>Valor Pedido</td>
                </tr>
                <?php
                $query1 = mysqli_query($connection, $sql1);
                $i = 1;
                while($r = $query1->fetch_assoc()){
                    $codigo = $r['codPedido'];
                    echo "
                    <tr>
                    <td class='field'>$i</td>    
                    <td class='field'>
                    <form action='#' method='GET'>
                    <input type='hidden' name='codigo'value='$codigo'>
                    <input class='submit_button' type='submit'name='query' value='$codigo'>
                    </form>
                    </td>    
                    <td class='field'>" . $r['fechaPedido'] . "</td>
                    <td class='field'>" . $r['valorPedido'] . "</td>
                    </tr>
                ";
                $i++;
                }
                ?>
                </table>
                <br><br><br>
                <?php
                if(isset($_GET['query'])){
                    $codigo_pedido = $_GET['codigo'];
                    echo "
                    <table class='order_table'>
                    <tr> 
                    <td class='header' colspan='4'>$codigo_pedido</td>
                    </tr>
                    <tr>
                    <td class='header'>Producto</td>
                    <td class='header'>Cantidad</td>
                    <td class='header'>Valor unitario</td>
                    <td class='header'>Subtotal</td>
                    </tr>";
                    $sql2 = "SELECT * FROM pedido pe
                    JOIN detallepedido detped ON pe.codPedido = detped.codPedidoDetalle
                    JOIN producto pr ON detped.codProducto = pr.codProducto 
                    JOIN detalleproducto detpro ON pr.codProducto = detpro.codProducto WHERE codPedido = '$codigo_pedido'";
                    $query2 = mysqli_query($connection, $sql2);
                    $total = 0;
                    while($q = $query2->fetch_assoc()){
                        $valor = $q['valorProducto'];
                        $cantidad = $q['cantidad'];
                        $subtotal = $valor * $cantidad;
                        echo "
                        <tr>
                            <td class='field'>" . $q['codProducto'] . "</td>
                            <td class='field'>" . $q['cantidad'] . "</td>
                            <td class='field'>$" . $q['valorProducto'] . "</td>
                            <td class='field'>$$subtotal</td>
                        </tr>
                        ";
                        $total = $total + $subtotal;
                    }
                    echo"
                    <tr>
                    <td colspan='3' align='right' class='field'>TOTAL</td>
                    <td class='field'>$$total</td>
                    </tr>
                    </table>
                    ";
                }
                ?>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>