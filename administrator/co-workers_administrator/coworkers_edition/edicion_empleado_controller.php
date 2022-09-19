<?php


include("../../../connection.php");
//if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
 //   header("location:../../../main/index.html");
//}

if(isset($_POST['send'])){

    foreach($_POST as $clave => $valor){
        $i =1;
        if($valor != "" && $clave == "cargo$i"){
            echo $valor;
        }

        if($valor != "" && $clave == "new_labor$i"){
            echo $valor;
        }
        
        if($valor != "" && $clave == "delete_labor$i"){
            echo $valor;
        }
        $i++;
    }
}


?>