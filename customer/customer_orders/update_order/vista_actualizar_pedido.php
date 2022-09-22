<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Actualizar pedido</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../customer_styles.css">
    <link rel="stylesheet" href="../../new_customer_styles.css">
    <style>
        .update_list{background-color:#777;font-weight:bold;text-align:center;width:100%;}
        .header{background-color:#a1ca4f;font-size:1.5em;border:1px solid black;}
        .field{background-color:#bbb;font-size:1.2em;border:1px solid black;}
        .query_button{background-color:inherit;border:1px solid #bbb;font-size:1em;font-weight:bold;}
        .eliminate_button{background-color:red;color:white;border:1px solid white;font-weight:bold;}
        .agregar_producto{margin:30px auto;width:60%;background-color:#bbb;display:flex;flex-direction:row;justify-content:space-evenly;padding:10px;font-weight:bold;align-items:center;box-shadow:3px 3px 10px 3px #333;}
        .agregar_producto input[type="number"], select{height:30px;}
        .agregar_producto input[type="submit"]{background-color:beige;font-size:1em;font-weight:bold;padding:3px;}
        .error{background-color:red;color:white;text-align:center;}
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
    $sql1 = "SELECT * FROM pedido WHERE codPedido NOT IN (SELECT codPedido FROM despacho) AND idCliente = '$id' ORDER BY fechaPedido DESC";
    $query1 = mysqli_query($connection, $sql1);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_pedido.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Actualizar pedido</h1>
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
                <h2>ACTUALIZAR PEDIDOS</h2>
                <br>
                <p>Este es un listado con los pedidos no despachados, podrás actualizarlos.<br><b>Oprime en el código del pedido que quieras actualizar</b></p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <table class="update_list">
                    <tr>
                        <td class="header">N°</td>
                        <td class="header">Código</td>
                        <td class="header">Fecha</td>
                        <td class="header">Valor</td>
                    </tr>
                    <?php
                    $i = 1;
                    while($r = $query1->fetch_assoc()){
                        echo "
                        <tr>
                        <td class='field'>$i</td>
                        <td class='field'>
                        <form action='#' method='GET'>
                        <input type='hidden' name='codigo' value='" . $r['codPedido'] . "'>
                        <input class='query_button' type='submit' name='send' value='" . $r['codPedido'] . "'>
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
                if(isset($_GET['send'])){
                    $cod = $_GET['codigo'];
                    $sql2 = "SELECT * FROM 
                    detallepedido dp JOIN producto pr 
                    ON dp.codProducto = pr.codProducto 
                    JOIN detalleproducto detpro 
                    ON pr.codProducto = detpro.codProducto
                    WHERE codPedidoDetalle = '$cod'";
                    $query2 = mysqli_query($connection, $sql2);
                    echo "
                    <table class='update_list'>
                    <tr>
                    <td class='header'>Pedido</td>
                    <td class='header'>Producto</td>
                    <td class='header'>Cantidad</td>
                    <td class='header'>Subtotal</td>
                    <td class='header'>Funcionalidad</td>
                    </tr>
                    ";
                    $total =0;
                    while($q = $query2->fetch_assoc()){
                        $subtotal = $q['cantidad'] * $q['valorProducto'];
                        echo "
                        <tr>
                        <td class='field'>" . $q['codPedidoDetalle'] . "</td>
                        <td class='field'>" . $q['producto'] . "</td>
                        <td class='field'>" . $q['cantidad'] . "</td>
                        <td class='field'>$$subtotal</td>
                        <td class='field'>
                        <form action='#' method='POST'>
                            <input type='hidden' name='pedido' value='" . $q['codPedidoDetalle'] . "'>
                            <input type='hidden' name='codigo' value='" . $q['codProducto'] . "'>
                            <input class='eliminate_button' type='submit' name='send' value='Eliminar'>
                        </form>
                        </td>
                        </tr>
                        ";
                        $total = $total + $subtotal;
                    }
                    echo "
                    <tr>
                    <td class='field' style='text-align:right;' colspan='3'>TOTAL</td>
                    <td colspan='2' style='text-align:left;'  class='field'>$$total</td>
                    </tr>
                    </table>";

                    echo "
                    <h2 align='center'style='margin-top:20px;'>Agregar producto</h2>
                    <form class='agregar_producto' action='#' method='POST'>
                    <label>Producto</label> 
                    <select name='producto'>
                    <option value='0'>----------------</option>";
                    $sql0 = "SELECT * FROM producto pr JOIN detalleproducto detpro ON pr.codProducto = detpro.codProducto";
                    $query0 = mysqli_query($connection, $sql0);
                    while($m = $query0->fetch_assoc()){
                        $codigoproducto = $m['codProducto'];
                        echo "
                        <option value='$codigoproducto'>$codigoproducto</option>
                        ";
                    }
                    echo"
                    </select>
                    <label>Cantidad</label>
                    <input type='number' name='cantidad' value='1'>
                    <input type='submit' name='agregar_producto' value='Agregar'>
                    </form>
                    ";
                }

                if(isset($_POST['agregar_producto'])){
                    $producto = $_POST['producto'];
                    $cantidad_producto = mysqli_real_escape_string($connection, $_POST['cantidad']);

                    if($producto == "0"){
                        echo "<h4 class='error'>Por favor, selecciona un producto</h4>";
                    }else{
                        $id_customer = $_SESSION['customerinfo']['idCliente'];
                        $sql = "SELECT * FROM pedido WHERE idCliente = '$id_customer' ORDER BY fechaPedido DESC";
                        $query = mysqli_query($connection, $sql);
                        $b = $query->fetch_assoc();
                        $codigoPedido = $b['codPedido'];
                        $sqln = "INSERT INTO detallepedido (codPedidoDetalle, codProducto, cantidad) VALUES ('$codigoPedido', '$producto', '$cantidad_producto')";
                        $queryn = mysqli_query($connection, $sqln);


                        $sql10 = "SELECT * FROM 
                        detallepedido dp JOIN producto pr 
                        ON dp.codProducto = pr.codProducto 
                        JOIN detalleproducto detpro 
                        ON pr.codProducto = detpro.codProducto
                        WHERE codPedidoDetalle = '$codigoPedido'";
                        $query10 = mysqli_query($connection, $sql10);
                        $total = 0;
                        while($c = $query10->fetch_assoc()){
                            $total = $total + $c['valorProducto'] * $c['cantidad'];
                        }
                        $sql11 = "UPDATE pedido SET valorPedido = '$total' WHERE codPedido = '$codigoPedido'";
                        $query11 = mysqli_query($connection, $sql11);


                    }
                }
                ?>

        <?php
        if(isset($_POST['send'])){
            $cod = $_POST['codigo'];
            $pedido = $_POST['pedido'];
            $sql3 = "DELETE FROM detallepedido WHERE codProducto= '$cod'";
            $query3 = mysqli_query($adminconnection, $sql3);
            $sql4 = "SELECT * FROM 
                    detallepedido dp JOIN producto pr 
                    ON dp.codProducto = pr.codProducto 
                    JOIN detalleproducto detpro 
                    ON pr.codProducto = detpro.codProducto
                    WHERE codPedidoDetalle = '$pedido'";
            $query4 = mysqli_query($connection, $sql4);
            $total = 0;
            while($s = $query4->fetch_assoc()){
                $total = $total + $s['valorProducto'] * $s['cantidad'];
            }
                $sql5 = "UPDATE pedido SET valorPedido = '$total' WHERE codPedido = '$pedido'";
                $query5 = mysqli_query($connection, $sql5);

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
<?php
$adminconnection->close();
$connection->close();
?>
