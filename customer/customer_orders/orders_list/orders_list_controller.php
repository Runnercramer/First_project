<?php
include('../../../connection.php');
if(isset($_GET['button'])){
    $date1 = mysqli_real_escape_string($connection, $_GET['date1']);
    $date2 = mysqli_real_escape_string($connection, $_GET['date2']);
    $id = $_SESSION['id'];
    $query1 = "SELECT codPedido, valorPedido, fecha FROM pedido WHERE idUsuario = '$id' AND fecha BETWEEN '$date1' AND '$date2'";
    

    if($date1 == "" || $date2 == ""){
        echo
        "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Listado de pedidos</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../main/estilos.css'/>
            <link rel='icon' href='../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../customer_styles.css'>
            <style>
                .error{background-color:red;color:white;text-align:center;width:60%;}
            </style>
        </head>
        <body>
            <div id='cont1'>
                <header id='enc1'>
                    <a href='orders_list.html'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1>Listado de pedidos</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                        <input type='button' class='profile_button' value='Perfil &#9881'>
                    </div>
                </header> 
                <h1 class='error'>Diligencie las 2 fechas solicitadas</h1>
                <footer id='pa2'>
                    <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
                </footer>
            </div>
        </body>
        </html>";
    }else{
    $resultados = mysqli_query($connection, $query1);
    while($array1 = $resultados->fetch_assoc()){
    echo $array1['codPedido']." ".$array1['valorPedido']." ".$array1['fecha'] . "<br>" ;
    }

    /*$query2 = "SELECT codProducto, cantidad FROM detallepedido WHERE codPedido = '$a'";
    $resultados2 = mysqli_query($connection, $query2);
    while($array2 = $resultados->fetch_assoc()){
        echo $array2['codProducto']." ".$array2['cantidad']."<br>";
    }*/
    }
}
?>