<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Abonar a cuenta</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../customer_styles.css">
    <link rel="stylesheet" href="../../new_customer_styles.css">
    <style>
        .lista_saldos{width:100%;margin:10px auto;display:grid;grid-template-columns:2fr 1fr;grid-template-rows:50px 1fr 1fr 1fr;background-color:#ddd;}
        .first_column{text-align:center;}
        .second_column{text-align:center;display:flex;flex-direction:column;}
        .bills_table{background-color:#777;width:95%;text-align:center;margin:10px auto;margin-top:30px;}
        .header{background-color:#a1ca4f;font-weight:bold;font-size:1.2em;height:35px;}
        .field{background-color:#bbb;height:30px;}
        .payment_form{width:90%;margin:0 auto;background-color:#aaa;height:400px;display:flex;flex-direction:column;align-items:center;justify-content:space-around;padding:20px;margin-top:50px;font-size:1.5em;font-weight:bold;box-shadow:3px 3px 10px 3px #333;}
        .payment_form input[type="text"], input[type="number"]{width:60%;text-align:center;height:25px;margin-top:10px;margin-bottom:10px;}
        .payment_form input[type="submit"]{background-color:#a1ca4f;width:40%;height:25px;font-weight:bold;box-shadow:3px 3px 10px 3px #333;}
        .payment_form input[type="submit"]:hover{background-color:#85b427;}
        .payment_form input[type="submit"]:active{background-color:black;color:white;}
    </style>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo'])){
        header("location:../../../main/index.html");
    }
    $id = $_SESSION['customerinfo']['idCliente']; 
    $sql1 = "SELECT * FROM pedido pe JOIN cobro co ON pe.codPedido = co.codPedido JOIN transaccion tr ON co.codTransaccion = tr.codTransaccion WHERE pe.idCliente = '$id' ORDER BY fechaPedido ASC";
    $query1 = mysqli_query($connection, $sql1);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_pagos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Pagar o abonar factura</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>PAGAR O ABONAR</h2>
                <p>Selecciona la factura a la que quieres abonar</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="lista_saldos">
                <div class="first_column">
<!--Esta página se debe convertir en un PHP para que pueda procesar los datos de una consulta SQL e imprimirlos-->
                    <h2>Facturas con saldos pendientes</h2>
                    <table class="bills_table">
                        <tr>
                            <td class="header">Código pedido</td>
                            <td class="header">Valor pedido</td>
                            <td class="header">Fecha Pedido</td>
                            <td class="header">Abonos</td>
                            <td class="header">Saldo</td>
                        </tr>
                        <?php
                        while($r = $query1->fetch_assoc()){
                            $i = $r['codPedido'];
                                $sql2 = "SELECT sum(valor) FROM transaccion tr JOIN cobro co ON tr.codTransaccion = co.codTransaccion WHERE idCliente = '$id' AND codPedido = '$i'";
                                $query2 = mysqli_query($connection, $sql2);
                                $q = $query2->fetch_assoc();
                                $valor = $r['valorPedido'];
                                $abono = $q['sum(valor)'];
                                $saldo = $valor - $abono;
                                if($saldo>0){
                            echo 
                            "
                            <tr>
                                <td class='field'>" . $r['codPedido'] . "</td>
                                <td class='field'>" . $r['valorPedido'] . "</td>
                                <td class='field'>" . $r['fechaPedido'] . "</td>
                                <td class='field'>" . $q['sum(valor)'] . "</td>
                                <td class='field'>" . $saldo . "</td>
                            </tr>
                            ";
                                }       
                        }
                        //Falta validar que no imprima campos repetidos
                        $connection->close();
                        ?>
                    </table>
                </div>
                <div class="second_column">
                    <form class="payment_form" action="payment_validation.php" method="POST">
                        <label>Código del pedido</label>
                        <input type="text" name="bill" placeholder="Código del pedido">
                        <label>Valor</label>
                        <input type="number" name="amount" placeholder="Monto a pagar">
                        <label>N° Tarjeta</label>
                        <input type="text" name="card_number" placeholder="N° de tarjeta débito">
                        <input type="submit" value="Pagar" name="send">
                    </form>
                </div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>