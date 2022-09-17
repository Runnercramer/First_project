<?php
session_start();
include("../../../connection.php");
if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
    header("location:../../../main/index.html");
}

if(isset($_POST['send'])){
    $state =array();
    if(isset($_POST['state'])){
        $state = $_POST['state'];
    }else{
        $state = [];
    }

    print_r($state);
}
?>