<?php
include("../../../connection.php");
session_start();
if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
    header("location:../../../index.html");
}

if(isset($_POST['send'])){

    $session_id = session_id();
    $total_pagar = 0;
    foreach($_SESSION['cart'] as $indice => $producto){

        $total_pagar = $total_pagar + ($producto['valor'] * $producto['cant']);
    }

    $id_cliente = mysqli_real_escape_string($adminconnection, $_POST['idcliente']);
    $cod_pedido = mysqli_real_escape_string($adminconnection, $_POST['codpedido']);
    $sql1 = "INSERT INTO pedido (codPedido, idCliente, valorPedido, codSesion) VALUES ('$cod_pedido', '$id_cliente', '$total_pagar', '$session_id')";
    $query1 = mysqli_query($adminconnection, $sql1);
    
    foreach($_SESSION['cart'] as $indice => $producto){
        $cod = $producto['codigo'];
        $cant = $producto['cant'];
        $sql2 = "INSERT INTO detallepedido (codPedidoDetalle, codProducto, cantidad) VALUES ('$cod_pedido', '$cod', '$cant')";
        $query2 = mysqli_query($adminconnection, $sql2);
    }
}
if($query1){
    unset($_SESSION['cart']);
}
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Pago</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
    </style>
    <script>
    function logout(){
        window.location.href = "../../../main/logout.php";
    }

    function profile(){
        window.location.href = "../../adminprofile.php";
    }
    </script>
</head>
<body>
    <?php
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../index.html");
    }

    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_pedidos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Pedido creado</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>EXITO EN LA CREACIÓN</h2>
                <br>
                <p>El pedido ha sido creado exitosamente. Se enviará una notificación al correo del cliente relacionado para confirmar el pedido realizado.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
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
