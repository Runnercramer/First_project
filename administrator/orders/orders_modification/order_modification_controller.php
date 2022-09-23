<?php
include("../../../connection.php");
session_start();

switch ($_POST['send']) {

    case "Modificar" :

        $codigopedido = $_POST['codigopedido'];
        $codigoproducto = $_POST['codigoproducto'];
        $cant = mysqli_real_escape_string($adminconnection, $_POST['cant']);

        if($cant > 0){
        $sql0 = "SELECT * FROM detallepedido WHERE codPedidoDetalle = '$codigopedido' AND codProducto = '$codigoproducto'";
        $query0 = mysqli_query($adminconnection, $sql0);
        if($query0){
            $sql1 = "UPDATE detallepedido SET cantidad = '$cant' WHERE codPedidoDetalle = '$codigopedido' AND codProducto = '$codigoproducto'";
            $query1 = mysqli_query($adminconnection, $sql1);
            if($query1){
                header("location:vista_modificacion_pedido.php");
            }
        }
        }
    break;

    case "Eliminar" :

        $cod_pedido = $_POST['codigopedido'];
        $cod_producto = $_POST['codigoproducto'];

        $sql2 = "DELETE FROM detallepedido WHERE codPedidoDetalle = '$cod_pedido' AND codProducto = '$cod_producto'";
        $query2 = mysqli_query($adminconnection, $sql2);

        if($query2){
            header("location:vista_modificacion_pedido.php");
        }

    break;

    }

    $connection->close();
    $adminconnection->close();
?>