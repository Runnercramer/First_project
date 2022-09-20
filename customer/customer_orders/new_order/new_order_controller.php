<?php
include("../../../connection.php");
session_start();

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
            $num_productos = count($_SESSION['cart']);

            $producto = array(
                'codigo' => $cod,
                'nombre' => $name,
                'cant' => $cant,
                'valor' => $valor,
            );
            $_SESSION['cart'][$num_productos] = $producto;
        }

        header("location:vista_new_order.php");

        break;

        case 'Eliminar' :

            $id = $_POST['id'];

            foreach($_SESSION['cart'] as $indice => $producto){
                if($producto['codigo'] == $id){
                    unset($_SESSION['cart'][$indice]);
                }
            }
            header("location:../../go_to_cart/vista_carrito.php");

            break;
        }
?>