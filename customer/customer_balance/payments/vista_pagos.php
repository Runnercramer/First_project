<?php
include('../../../connection.php');
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Pagos y abonos</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../customer_styles.css">
    <link rel="stylesheet" href="../../new_customer_styles.css">
    <style>
        .methods{grid-template-columns:2fr 7fr;min-height:530px;height:auto;}
        .payment_form{width:95%;margin:30px auto;padding:15px;box-shadow:5px 5px 20px 5px #666;display:grid;grid-template-columns:3fr 1fr;}
        .payment_table{background-color:#777;margin:5px auto;text-align:center;box-shadow:3px 3px 15px 5px gray;font-weight:bold;}
        td{padding:3px;background-color:#ccc;border:1px solid black;}
        .header_table{background-color:#a1ca4f;font-size:1.1em;font-weight:bold;border:1px solid black;}
        .payment_button{display:block;background-color:#a1ca4f;height:40px;;margin:150px auto;padding:5px;box-shadow:5px 5px 20px 5px black;font-size:1.2em;font-weight:bold;border-radius: 15px;}
        .payment_button:hover{background-color:#74a118;}
        .payment_button:active{background-color:black;color:white;}
    </style>
    <script>
    function logout(){
        window.location.href = "../../../main/logout.php";
    }

    function toPay(){
        window.location.href = "abonar_factura.php";
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
    $sql1 = "SELECT * FROM pedido pe JOIN cobro co ON pe.codPedido = co.codPedido JOIN transaccion tr ON co.codTransaccion = tr.codTransaccion WHERE pe.idCliente = '$id' ORDER BY fechaPedido ASC";
    $query1 = mysqli_query($connection, $sql1);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_balance.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Pagos y abonos realizados</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']); ?></b></h3>
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onClick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>PAGOS Y ABONOS</h2>
                <p>En esta interfaz obtendrás un listado acerca de todos los pedidos que no han sido cancelados en su totalidad. Se relacionarán los abonos a los respectivos pedidos y se podrán hacer pagos o abonos a <b>x</b> pedido.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="payment_form">
                <div class="payment_table">
                    <table>
                        <tr>
                            <td class="header_table">Código de pedido</td>
                            <td class="header_table">Valor del Pedido</td>
                            <td class="header_table">Fecha del pedido</td>
                            <td class="header_table">Valor pago/abono</td>
                            <td class="header_table">Fecha pago/abono</td>
                            <td class="header_table">Saldo</td>
                        </tr>
                        <?php
                            while($r = $query1->fetch_assoc()){
                                echo 
                                "
                                <tr>
                                <td class='field'>" . $r['codPedido'] . "</td>
                                <td class='field'>" . $r['valorPedido'] . "</td>
                                <td class='field'>" . $r['fechaPedido'] . "</td>
                                <td class='field'>" . $r['valor'] . "</td>
                                <td class='field'>" . $r['fecha'] . "</td>";
                                $cont = $r['valorPedido'] - $r['valor'];
                                echo "<td class='field'>" . $cont . "</td>
                                </tr>
                                ";
                            }
                            $connection->close();
                        ?>
                    </table>
                </div>
                <div class="payment_button1">
                    <input class="payment_button" type="button" name="payment_check" onClick="toPay()" value="Abonar a factura">
                </div>
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
