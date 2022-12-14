<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Modificar pedido</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .main_table{background-color:#777;width:80%;margin:20px auto;height:auto;text-align:center;font-weight:bold;}
        .header{background-color:#a1ca4f;font-size:1.5em;border:1px solid black;}
        .field{background-color:#bbb;font-size:1.2em;border:1px solid black;}
        .update_button{background-color:#bbb;font-weight:bold;font-size:1em;border:1px hidden;}
        .modification_button{background-color:lightblue;width:45%;font-weight:bold;border:1px solid black;color:black;}
        .elimination_button{background-color:red;width:45%;font-weight:bold;border:1px solid white;color:white;}
        .cant_modification{width:50%;margin:5px 0;text-align:center;}
        .pag{grid-column-start:1;grid-column-end:5;display:flex;flex-direction:row;align-items:center;justify-content:space-evenly;margin-top:25px;}
        .pag_button{background-color:beige;font-size:1.2em;font-weight:bold;padding:5px;box-shadow:3px 3px 10px 3px #333;color:black;}
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

    //La siguiente consulta me permite obtener registros que no est??n dentro de la segunda consulta
    $sql1 = "SELECT * FROM pedido pe JOIN cliente cl ON pe.idCliente = cl.idCliente JOIN usuario us ON cl.idUsuario = us.idUsuario WHERE pe.codPedido NOT IN (SELECT de.codPedido FROM despacho de)";
    $query1 = mysqli_query($adminconnection, $sql1);

    $tama??o_pagina = 5;
                if(isset($_GET['pagina'])){
                    if($_GET['pagina'] == 1){
                        header("location:/Vetex/administrator/orders/oreders_modification/vista_modificacion_pedido.php");
                    }else{
                        $pagina = $_GET['pagina'];
                    }
                }else{
                    $pagina = 1;
                }
                $empezar_desde = ($pagina - 1) * $tama??o_pagina;

                $num_filas = $query1->num_rows;

                $total_paginas = ceil($num_filas/$tama??o_pagina);

                $sql1_limite = "SELECT * FROM pedido pe JOIN cliente cl ON pe.idCliente = cl.idCliente JOIN usuario us ON cl.idUsuario = us.idUsuario WHERE pe.codPedido NOT IN (SELECT de.codPedido FROM despacho de) ORDER BY fechaPedido DESC LIMIT $empezar_desde,$tama??o_pagina";

                $query1_limite = mysqli_query($adminconnection, $sql1_limite);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_pedidos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Modificaci??n de pedidos</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesi??n" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>MODIFICACI??N PEDIDOS</h2>
                <br>
                <p>En esta interfaz podr??s encontrar un listado de los pedidos no despachados, los cuales podr??n ser modificados. Puedes oprimir en el c??digo del pedido para ver y modificar los detalles del mismo.<p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <!--Al clicar en el c??digo del pedido, deber?? redirigir a una p??gina que muestre todo el pedido-->
                <table class="main_table">
                    <tr>
                        <td class="header">N??</td>
                        <td class="header">C??digo pedido</td>
                        <td class="header">Fecha pedido</td>
                        <td class="header">Cliente</td>
                    </tr>
                    <?php
                    $i = 1;
                    while($r = $query1_limite->fetch_assoc()){
                        $codigo_pedido = $r['codPedido'];
                        echo "
                        <tr>
                        <td class='field'>$i</td>
                        <td class='field'>
                        <form action='#' method='GET'>
                        <input type='hidden' name='codigopedido' value='$codigo_pedido'>
                        <input class='update_button' type='submit' name='send' value='$codigo_pedido'>
                        </form>
                        </td>
                        <td class='field'>" . $r['fechaPedido'] . "</td>
                        <td class='field'>" . $r['nombreUsuario'] . " " . $r['apellidosUsuario'] . "</td>
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
                    $codigopedido = $_GET['codigopedido'];

                    $sql2 = "SELECT * FROM detallepedido detped JOIN pedido pe ON detped.codPedidoDetalle = pe.codPedido WHERE codPedidoDetalle = '$codigopedido'";
                    $query2 = mysqli_query($adminconnection, $sql2);

                    echo "<table class='main_table'>
                    <tr>
                    <td colspan='4' class='header'>$codigopedido</td>
                    </tr>
                    <tr>
                    <td class='header'>Producto</td>
                    <td class='header'>Cantidad</td>
                    <td class='header'>Modificar</td>
                    <td class='header'>Eliminar</td>
                    </tr>";
                    while($q = $query2->fetch_assoc()){
                        $codigo_producto = $q['codProducto'];
                        $cod_pedido = $q['codPedido'];
                        $cant = $q['cantidad'];
                        echo "
                        <tr>
                        <td class='field'>" . $q['codProducto'] . "</td>
                        <td class='field'>" . $q['cantidad'] . "</td>
                        <td class='field'>
                        <form action='order_modification_controller.php' method='POST'>
                        <input type='hidden' name='codigopedido' value='$cod_pedido'>
                        <input type='hidden' name='codigoproducto' value='$codigo_producto'>
                        <input class='cant_modification' type='number' name='cant' value='$cant'>
                        <input class='modification_button' type='submit' name='send' value='Modificar'>
                        </form>
                        </td>
                        <td class='field'>
                        <form action='order_modification_controller.php' method='POST'>
                        <input type='hidden' name='codigopedido' value='$cod_pedido'>
                        <input type='hidden' name='codigoproducto' value='$codigo_producto'>
                        <input class='elimination_button' type='submit' name='send' value='Eliminar'>
                        </form>
                        </td>    
                        </tr>
                        ";
                    }
                    echo "</table>";
                }
                ?>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Cont??ctanos<br>018000222222<br>L??nea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
<?php
$adminconnection->close();
$connection->close();
?>
