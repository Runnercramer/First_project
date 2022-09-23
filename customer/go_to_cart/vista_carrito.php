<?php
include("../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Carrito</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../customer_styles.css">
    <link rel="stylesheet" href="../new_customer_styles.css">
    <style>
        .main_table{background-color:#777;text-align:center;font-weight:bold;width:90%;margin:10px auto;}
        .header{background-color:#a1ca4f;font-size:1.5em;border:1px solid black;}
        .field{background-color:#bbb;border:1px solid black;font-size:1.2em;}
        .eliminate_button{background-color:red;color:white;border:1px dashed white;font-weight:bold;}
        .contact_info{width:60%;text-align:center;margin:10px;font-size:1.2em;}
        .payment_button{display:block;background-color:lightblue;color:black;width:200px;font-weight:bold;font-size:1.5em;border-radius:15px;margin:30px auto;padding:5px;}
        .payment_button:hover{background-color:#6fbbd3}
        .payment_button:active{background-color:black;color:white;}
    </style>
    <script>
    function logout(){
        window.location.href = "../../main/logout.php";
    }

    function profile(){
        window.location.href = "../customerprofile.php";
    }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'cliente'){
        header("location:../../main/index.html");
    }

    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_cliente.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Carrito</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>CARRITO</h2>
                <p>Este es un listado con los productos que han sido agregados al carrito de la compra.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="cart_container">
                <table class='main_table'>
                    <tr>
                        <td class='header'>N°</td>
                        <td class='header'>Producto</td>
                        <td class='header'>Precio</td>
                        <td class='header'>Cantidad</td>
                        <td class='header'>Subtotal</td>
                        <td class='header'>Eliminar</td>
                    </tr>
                    <?php
                    $i = 1;
                    $total = 0;
                    foreach($_SESSION['cart'] as $indice => $producto){
                        $subtotal = $producto['valor'] * $producto['cant'];
                        echo "
                        <tr>
                        <td class='field'>$i</td>
                        <td class='field'>" . $producto['nombre'] . "</td>
                        <td class='field'>" . $producto['valor'] . "</td>
                        <td class='field'>" . $producto['cant'] . "</td>
                        <td class='field'>$subtotal</td>
                        <td class='field'><form action='../customer_orders/new_order/new_order_controller.php' method='POST'><input type='hidden' name='id' value='" . $producto['codigo'] . "'><input class='eliminate_button' type='submit' name='send' value='Eliminar'></form></td>
                        </tr>
                        ";
                        $i++;
                        $total = $total+($producto['valor'] * $producto['cant']);
                    }
                    ?>
                    <tr>
                        <td class='field' align="right" colspan="4">TOTAL</td>
                        <td class='field' align="left" colspan="2">$<?php echo $total ?></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <form action="pagar.php" method="POST">
                                <label>Correo de contacto: </label>
                                <br>
                                <input class='contact_info' type="email" name="email_contact" placeholder="La información de tu pedido se enviará al siguiente correo" required>
                            
                        </td>
                    </tr>
                </table>
                <input class="payment_button" type="submit" name="send" value="Pagar">
                </form>

            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
<?php
if(isset($_POST['send'])){
    echo "<script>alert('Has eliminado un producto');</script>";
}
?>
<?php
$adminconnection->close();
$connection->close();
?>
