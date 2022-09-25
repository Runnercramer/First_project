<?php
include("../../../connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Reporte pedidos</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .main_table{background-color:#777;width:90%;margin:20px auto;height:auto;text-align:center;font-weight:bold;}
        .header{background-color:#a1ca4f;font-size:1.5em;border:1px solid black;}
        .field{background-color:#bbb;font-size:1.2em;border:1px solid black;}
        .report_button{background-color:#bbb;font-weight:bold;font-size:1em;border:1px hidden;}
        .pag{grid-column-start:1;grid-column-end:5;display:flex;flex-direction:row;align-items:center;justify-content:space-evenly;margin-top:30px;}
        .pag_button{background-color:beige;font-size:1.2em;font-weight:bold;padding:5px;box-shadow:3px 3px 10px 3px #333;color:black;}
        .update_field{text-align:center;border-radius:10px;width:60%;}
        .update_button{background-color:beige;font-weight:bold;border-radius:10px;box-shadow:3px 3px 15px #333;padding:2px;}
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
        header("location:../../../index.html");
    }

    $sql1 = "SELECT * FROM pedido pe JOIN cliente cl ON pe.idCliente = cl.idCliente JOIN usuario us ON cl.idUsuario = us.idUsuario ORDER BY fechaPedido DESC";
    $query1 = mysqli_query($adminconnection, $sql1);
    $tamaño_pagina = 8;
    if(isset($_GET['pagina'])){
        if($_GET['pagina'] == 1){
            header("location:/Vetex/administrator/orders/orders_list/vista_reporte_pedidos.php");
        }else{
            $pagina = $_GET['pagina'];
        }
    }else{
        $pagina = 1;
    }
    $empezar_desde = ($pagina - 1) * $tamaño_pagina;

    $num_filas = $query1->num_rows;

    $total_paginas = ceil($num_filas/$tamaño_pagina);

    $sql1_limite = "SELECT * FROM pedido pe JOIN cliente cl ON pe.idCliente = cl.idCliente JOIN usuario us ON cl.idUsuario = us.idUsuario ORDER BY fechaPedido DESC LIMIT $empezar_desde,$tamaño_pagina";

    $query1_limite = mysqli_query($adminconnection, $sql1_limite);

    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_pedidos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Reporte pedidos</h1>
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
                <h2>REPORTE PEDIDOS</h2>
                <br>
                <p>En esta interfaz obtendrás un listado con todos los pedidos realizados. Puedes oprimir en el código del pedido para ver los detalles del mismo.<br><b>Puedes actualizar el código del pedido ingresando el nuevo código en el campo y oprimineto el botón actualizar<p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <!--Al clicar en el código del pedido, deberá redirigir a una página que muestre todo el pedido-->
                <?php
                if($query3 == true && $query4 == true){
                            echo "<h3>Los datos han sido actualizados correctamente.</h3>";
                        }
                ?>
                <table class="main_table">
                    <tr>
                        <td class="header">N°</td>
                        <td class="header">Código pedido</td>
                        <td class="header">Fecha pedido</td>
                        <td class="header">Cliente</td>
                        <td class='header'>Valor</td>
                        <td class='header'>Actualizar</td>
                    </tr>
                    <?php
                    $i = 1;
                    while($r = $query1_limite->fetch_assoc()){
                        $pedido = $r['codPedido'];
                        echo "
                        <tr>
                        <td class='field'>$i</td>
                        <td class='field'>
                        <form action='#' method='GET'>
                        <input type='hidden' name='pedido' value='$pedido'>
                        <input class='report_button' type='submit' name='send' value='$pedido'>
                        </form>
                        </td>
                        <td class='field'>" . $r['fechaPedido'] . "</td>
                        <td class='field'>" . $r['nombreUsuario'] . " " . $r['apellidosUsuario'] . "</td>
                        <td class='field'>$" . $r['valorPedido'] . "</td>
                        <td class='field'>
                        <form action='#' method='POST'>
                        <input type='hidden' name='codigoactual' value='$pedido'>
                        <input class='update_field' type='text' name='codigonuevo' value='$pedido'>
                        <input class='update_button' type='submit' name='update_button' value='Actualizar'>
                        </form>
                        </td>
                        </tr>";
                        $i++;
                    }
                    ?>
                </table>

                <div class="pag">
                        <?php
                        for($i = 1; $i<=$total_paginas; $i++){
                            echo "<a href='?pagina=" . $i . "'><input class='pag_button' type='button' value='$i'></a>";
                        }
                        ?>
                    </div>
                <?php
                    if(isset($_GET['send'])){
                        $pedido = $_GET['pedido'];
                        echo "
                        <table class='main_table'>
                        <tr>
                        <td colspan='3' class='header'>$pedido</td>
                        </tr>
                        <tr>
                        <td class='header'>Producto</td>
                        <td class='header'>Cantidad</td>
                        <td class='header'>Subtotal</td>
                        </tr>";
                        $sql2 = "SELECT * FROM pedido  JOIN detallepedido  ON codPedido = codPedidoDetalle JOIN producto ON detallepedido.codProducto = producto.codProducto JOIN detalleproducto ON producto.codProducto = detalleproducto.codProducto WHERE codPedido = '$pedido'";
                        $query2 = mysqli_query($adminconnection, $sql2);
                        $total = 0;
                        while($s = $query2->fetch_assoc()){
                            $cantidad = $s['cantidad'];
                            $valor = $s['valorProducto'];
                            $subtotal = $cantidad * $valor;
                            echo "
                            <tr>
                            <td class='field'>" . $s['codProducto'] . "</td>
                            <td class='field'>" . $s['cantidad'] . "</td>
                            <td class='field'>$$subtotal</td>
                            </tr>
                            ";
                            $total = $total + $subtotal;
                        }
                        echo "
                        <tr>
                        <td colspan='2' align='right' class='field'>TOTAL</td>
                        <td align='left' class='field'>$$total</td>
                        </tr>
                        </table>";
                    }


                    if(isset($_POST['update_button'])){
                        $codigoactual = mysqli_real_escape_string($adminconnection, $_POST['codigoactual']);
                        $codigonuevo = mysqli_real_escape_string($adminconnection, $_POST['codigonuevo']);

                        $sql3 = "UPDATE pedido SET codPedido = '$codigonuevo' WHERE codPedido = '$codigoactual'";
                        $query3 = mysqli_query($adminconnection, $sql3);
                        $sql4 = "UPDATE detallepedido SET codPedidoDetalle = '$codigonuevo' WHERE codPedidoDetalle = '$codigoactual'";
                        $query4 = mysqli_query($adminconnection, $sql4);


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
