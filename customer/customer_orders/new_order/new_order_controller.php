<?php
include("../../../connection.php");
session_start();
if(isset($_POST['send'])){
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
}
?>