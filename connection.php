<?php
$host = "localhost";
$user = "cliente";
$password = "123456789";
$bd = "vetex";
$connection = mysqli_connect($host,$user,$password,$bd);
if($connection->error){
    echo "Hubo un error en la conexión: " . $connection->error;
}
?>