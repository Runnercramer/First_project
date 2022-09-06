<?php
$host = "localhost";
$customeruser = "cliente";
$customerpassword = "123456789";
$bd = "vetex";
$connection = mysqli_connect($host,$customeruser,$customerpassword,$bd);
if($connection->error){
    echo "Hubo un error en la conexión: " . $connection->error;
}

$adminhost = "localhost";
$adminuser = "root";
$adminpassword = "runnercramer1012462271";
$admindb = "vetex";
$adminconnection = mysqli_connect($adminhost, $adminuser, $adminpassword, $admindb);
if($adminconnection->error){
    echo "Hubo un error en la conexión" . $adminconnection->error;
}
?>