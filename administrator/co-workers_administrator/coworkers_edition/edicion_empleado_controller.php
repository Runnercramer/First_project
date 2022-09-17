<?php


include("../../../connection.php");
//if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
 //   header("location:../../../main/index.html");
//}

if(isset($_POST['send'])){
    foreach($_POST as $function => $key){
        echo $function . " " . $key . "<br>";
    }
}
?>