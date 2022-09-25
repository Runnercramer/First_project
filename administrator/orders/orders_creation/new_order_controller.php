<?php
include("../../../connection.php");
session_start();

if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
header("location:../../../index.html");
}

    switch($_POST['send']){

        case 'Agregar' :
        $cod = $_POST['codigo'];
        $name = $_POST['producto'];
        $cant = $_POST['cantidad'];
        $valor = $_POST['valor'];

        if(!isset($_SESSION['cart'])){

            $producto = array(
                'codigo' => $cod,
                'nombre' => $name,
                'cant' => $cant,
                'valor' => $valor,
            );
            $_SESSION['cart'][0] =  $producto; 
        }else{

            $id_producto = array_column($_SESSION['cart'], 'codigo');

            if(in_array($cod, $id_producto)){
                echo "<script>alert('El producto ya ha sido seleccionado');</script>";
            }else{
            
            $num_productos = count($_SESSION['cart']);

            $producto = array(
                'codigo' => $cod,
                'nombre' => $name,
                'cant' => $cant,
                'valor' => $valor,
            );
            $_SESSION['cart'][$num_productos] = $producto;
        }
    }
    

        header("location:vista_creacion_pedido.php");

        break;

        case 'Eliminar' :

            $id = $_POST['id'];

            foreach($_SESSION['cart'] as $indice => $producto){
                if($producto['codigo'] == $id){
                    unset($_SESSION['cart'][$indice]);
                }
            }
            header("location:cart.php");

            break;
        }

$adminconnection->close();
$connection->close();
?>
