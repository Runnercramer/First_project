<?php
$host = "localhost";
$customeruser = "cliente";
$customerpassword = "123456789";
$bd = "vetex";
$connection = mysqli_connect($host,$customeruser,$customerpassword,$bd);
if($connection->error){
    echo "Hubo un error en la conexión: " . $connection->error;
}

$adminuser = "root";
$adminpassword = "runnercramer1012462271";
?>