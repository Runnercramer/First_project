<?php
include("../../../connection.php");
session_start();

switch ($_POST['send']) {

    case "Modificar" :

        $codigopedido = $_POST['codigopedido'];
        $codigoproducto = $_POST['codigoproducto'];
        $cant = mysqli_real_escape_string($adminconnection, $_POST['cant']);

        if($cant > 0){
        $sql0 = "SELECT * FROM detallepedido JOIN pedido ON codPedidoDetalle = codPedido WHERE codPedidoDetalle = '$codigopedido' AND codProducto = '$codigoproducto'";
        $query0 = mysqli_query($adminconnection, $sql0);

        if($query0){
            $sql1 = "UPDATE detallepedido SET cantidad = '$cant' WHERE codPedidoDetalle = '$codigopedido' AND codProducto = '$codigoproducto'";
            $query1 = mysqli_query($adminconnection, $sql1);

            if($query1){
                $sql_updated = "SELECT * FROM detallepedido JOIN producto ON detallepedido.codProducto = producto.codProducto JOIN detalleproducto ON producto.codProducto = detalleproducto.codProducto WHERE codPedidoDetalle = '$codigopedido'";

                $query_updated = mysqli_query($adminconnection, $sql_updated);
                $total = 0;
                while($updated_array = $query_updated->fetch_assoc()){
                    $cantidad = $updated_array['cantidad'];
                    $valor = $updated_array['valorProducto'];
                    $subtotal = $valor * $cantidad;
                    $total = $total + $subtotal;
                }
                $sql_execute = "UPDATE pedido SET valorPedido = '$total' WHERE codPedido = '$codigopedido'";
                $query_execute = mysqli_query($adminconnection, $sql_execute);

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
            $sql_updated = "SELECT * FROM detallepedido JOIN producto ON detallepedido.codProducto = producto.codProducto JOIN detalleproducto ON producto.codProducto = detalleproducto.codProducto WHERE codPedidoDetalle = '$cod_pedido'";

                $query_updated = mysqli_query($adminconnection, $sql_updated);
                $total = 0;
                while($updated_array = $query_updated->fetch_assoc()){
                    $cantidad = $updated_array['cantidad'];
                    $valor = $updated_array['valorProducto'];
                    $subtotal = $valor * $cantidad;
                    $total = $total + $subtotal;
                }
                $sql_execute = "UPDATE pedido SET valorPedido = '$total' WHERE codPedido = '$cod_pedido'";
                $query_execute = mysqli_query($adminconnection, $sql_execute);
            header("location:vista_modificacion_pedido.php");
        }

    break;

    }

    $connection->close();
    $adminconnection->close();
?>