<?php
include("../../connection.php");
session_start();
if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'cliente'){
    header("location:../../main/index.html");
}

if(isset($_POST['send'])){

    $session_id = session_id();
    $total_pagar = 0;
    foreach($_SESSION['cart'] as $indice => $producto){

        $total_pagar = $total_pagar + ($producto['valor'] * $producto['cant']);
    }

    $id_cliente = $_SESSION['customerinfo']['idCliente'];
    $sql1 = "INSERT INTO pedido (idCliente, valorPedido, codSesion) VALUES ('$id_cliente', '$total_pagar', '$session_id')";
    $query1 = mysqli_query($connection, $sql1);
    
    foreach($_SESSION['cart'] as $indice => $producto){
        $cod = $producto['codigo'];
        $cant = $producto['cant'];
        $sql2 = "INSERT INTO detallepedido (codProducto, cantidad) VALUES ('$cod', '$cant')";
        $query2 = mysqli_query($connection, $sql2);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
</head>
<body>
    
</body>
</html>
<?php
$adminconnection->close();
$connection->close();
?>
