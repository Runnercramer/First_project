<?php
include('../connection.php');
include('../main/login.php');
$query1 = "SELECT idUsuario FROM email WHERE email = '$user'";
$consulta1 = mysqli_query($connection, $query1);


//$query2 = "SELECT nombre FROM usuario WHERE idUsuario = '$array1[\'idUsuario\']'";

?>