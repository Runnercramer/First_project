<?php
include("../../connection.php");
session_start();
$a = $_SESSION['userinfo']['idUsuario'];
$query = mysqli_query($adminconnection, "SELECT * FROM administrador WHERE idUsuario = '$a'");
$r = $query->fetch_assoc();
$_SESSION['adminuser'] = $r;
$idadmin = $_SESSION['adminuser']['idAdmin'];
if(!isset($_SESSION['userinfo'])){
    header("location:../../main/index.html");
}

if(isset($_POST['send'])){
    $creationdate = mysqli_real_escape_string($adminconnection, $_POST['creationdate']);
    $encargado = mysqli_real_escape_string($adminconnection, $_POST['encargado']);
    $searchdate = mysqli_real_escape_string($adminconnection, $_POST['searchdate']);
    $togetdate = mysqli_real_escape_string($adminconnection, $_POST['togetdate']);

    if($creationdate != "" && $encargado != "" && $searchdate == "" && $togetdate == ""){
        $sql1 = "INSERT INTO inventario (idAdmin, fecha, encargado) VALUES ('$idadmin', '$creationdate', '$encargado')";
        $query1 = mysqli_query($adminconnection, $sql1);
        if($query1){}
    }else if($creationdate == "" && $encargado == "" && $searchdate != "" && $togetdate == ""){

    }else if($creationdate == "" && $encargado == "" && $searchdate == "" && $togetdate != "")
}
?>