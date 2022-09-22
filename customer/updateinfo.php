<?php
session_start();
include("../connection.php");
if(!isset($_SESSION['userinfo'])){
    header("location:../main/index.html");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="icon" href="../imagenes/vetex.ico">
    <link rel="stylesheet" href="../main/estilos.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../profile_styles.css">
    <style>
        .main_form{font-size:0.9em;background-color:#ccc;display:flex;justify-content:space-around;flex-direction:column;align-items:center;min-height:700px;height:auto;font-weight:bold;box-shadow:5px 5px 20px 5px #333;padding:10px;}
        .main_form input[type="text"], input[type="email"]{width:70%;text-align:center;height:25px;border-radius:15px;}
        .submit_button{background-color:#a1ca4f;width:45%;height:35px;font-weight:bold;border-radius:15px;font-size:1.2em;}
        .submit_button:hover{background-color:#85b427;}
        .submit_button:active{background-color:black;color:white;}
    </style>
    <script>

    function logout(){
        window.location.href = "../main/logout.php";
    }

    </script>
</head>
<body>
    <?php

    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'cliente'){
        header("location:../main/index.html");
    }
    ?>
    <div id="cont1">
        <header>
            <a href="customerprofile.php"><img id="img1" src="../imagenes/descarga.png" alt="Logotipo de Vetex"></a>
            <h1>Actualización de Perfil<br>
            <?php if(isset($_POST['send'])){
            echo "Datos actualizados correctamente";
            }?>
            </h1>
        </header>
        <section class="main_section">
            <div class="info">
                <h2>ACTUALIZACIÓN DE PERFIL</h2>
                <br>
                <p>Ingresa los campos que quieras actualizar</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="main_form" enctype="multipart/form-data">
                <label>Foto 2Mb (PNG, JPG, JPEG)</label>
                <input type="file" name='photo'>
                <label>Nombre</label>
                <input type="text" name="name" placeholder="Ingresa un nuevo nombre">
                <label>Apellidos</label>
                <input type="text" name="lastname" placeholder="Ingresa nuevos apellidos">
                <label>Cédula</label>
                <input type="text" name="id" placeholder="Ingresa un nuevo N° de identidad">
                <label>Email</label>
                <input type="email" name="email" placeholder="Ingresa un nuevo correo electrónico">
                <label>Celular</label>
                <input type="text" name="cell" placeholder="Ingresa un nuevo N° de celular">
                <label>Dirección de residencia</label>
                <input type="text" name="direction" placeholder="Ingresa una nueva dirección">
                <label>Ciudad</label>
                <input type="text" name="city" placeholder="Ingrese una nueva ciudad">
                <label>Departamento</label>
                <input type="text" name="department" placeholder="Ingrese un nuevo departamento">
                <label>Contraseña</label>
                <input type="text" name="password1" placeholder="Ingrese una contraseña">
                <label>Verificar contraseña</label>
                <input type="text" name="password2" placeholder="Verifique la contraseña">
                <input class="submit_button" type="submit" name="send" value="Actualizar">
            </form>
            </div>
            <?php
            
            if(isset($_POST['send'])){
                $name = mysqli_real_escape_string($connection, $_POST['name']);
                $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
                $id = mysqli_real_escape_string($connection, $_POST['id']);
                $email = mysqli_real_escape_string($connection, $_POST['email']);
                $cell = mysqli_real_escape_string($connection, $_POST['cell']);
                $direction = mysqli_real_escape_string($connection, $_POST['direction']);
                $city = mysqli_real_escape_string($connection, $_POST['city']);
                $department = mysqli_real_escape_string($connection, $_POST['department']);
                $password1 = mysqli_real_escape_string($connection, $_POST['password1']);
                $password2 = mysqli_real_escape_string($connection, $_POST['password2']);


                if(isset($_FILES['photo'])){
                    $nombreimagen = $_FILES['photo']['name'];
                    $tipoimagen = $_FILES['photo']['type'];
                    $tamañoimagen = $_FILES['photo']['size'];
    
                    if($tamañoimagen <2000000){
                        if($tipoimagen == "image/jpeg" || $tipoimagen == "image/jpg" || $tipoimagen == "image/png"){
    
                        $destinoimagen = $_SERVER['DOCUMENT_ROOT'] . '/Vetex/imagenes/';
                        move_uploaded_file($_FILES['imagen']['tmp_name'], $destinoimagen.$nombreimagen);
    
                        $archivoobjetivo = fopen($destinoimagen . $nombreimagen, "r+");
                        $contenido = fread($archivoobjetivo, $tamañoimagen);
                        $contenido = addslashes($contenido);
                        fclose($archivoobjetivo);
    
                        $id_usuario = $_SESSION['userinfo']['idUsuario'];
                        $sql2 = "SELECT * FROM imagenusuario WHERE idUsuario = '$id_usuario'";
                        $query2 = mysqli_query($connection, $sql2);
                        $row = $query2->num_rows;
    
                        if($row == 0){
                            $sql3 = "INSERT INTO imagenusuario (idUsuario, imagen, tipoImagen) VALUES ('$id_usuario', '$contenido', '$tipoimagen')";
                            $query3 = mysqli_query($connection, $sql3);
                        }else{
                            $sql3 = "UPDATE imagenusuario SET imagen = '$contenido' WHERE idUsuario = '$id_usuario'";
                            $sql4 = "UPDATE imagenusuario SET tipoImagen = '$tipoimagen' WHERE idUsuario = '$id_usuario'";
                            $query3 = mysqli_query($connection, $sql3);
                            $query4 = mysqli_query($connection, $sql4);
                        }
    
                            }else{echo "<h3>La imágen sólo puede ser tipo JPG, JPEG o PNG</h3>";}
                        }else{echo "<h3>La imágen no puede ser de más de 2 Mb</h3>";}
                    }



                $session_id = $_SESSION['userinfo']['idUsuario'];
                $session_customer_id = $_SESSION['customerinfo']['idCliente'];
                if($name != ""){
                    $sql1 = "UPDATE usuario SET nombreUsuario = '$name' WHERE idUsuario = '$session_id'";
                    $query =mysqli_query($connection, $sql1);
                }

                if($lastname != ""){
                    $sql1 = "UPDATE usuario SET apellidosUsuario = '$lastname' WHERE idUsuario = '$session_id'";
                    $query =mysqli_query($connection, $sql1);
                }

                if($id != ""){
                    $sql1 = "UPDATE usuario SET idUsaurio = '$id' WHERE idUsuario = '$session_id'";
                    $query =mysqli_query($connection, $sql1);
                }

                if($email != ""){
                    $sql1 = "UPDATE email SET email = '$email' WHERE idUsuario = '$session_id'";
                    $query =mysqli_query($connection, $sql1);
                }

                if($cell != ""){
                    $sql1 = "UPDATE celular SET celular = '$cell' WHERE idUsuario = '$session_id'";
                    $query =mysqli_query($connection, $sql1);
                }

                if($direction != ""){
                    $sql1 = "UPDATE residencia SET direccion = '$direction' WHERE idClienteResidencia = '$session_customer_id'";
                    $query =mysqli_query($connection, $sql1);
                }

                if($city != ""){
                    $sql1 = "UPDATE residencia SET ciudad = '$city' WHERE idClienteResidencia = '$session_customer_id'";
                    $query =mysqli_query($connection, $sql1);
                }

                if($department != ""){
                    $sql1 = "UPDATE residencia SET departamento = '$department' WHERE idClienteResidencia = '$session_customer_id'";
                    $query =mysqli_query($connection, $sql1);
                }

                if($password1 != "" && $password2 != ""){
                    if($password1 == $password2){
                    $crypted_password = password_hash($password1, PASSWORD_DEFAULT);
                    $sql1 = "UPDATE usuario SET contraseñaUsuario = '$crypted_password' WHERE idUsuario = '$session_id'";
                    $query =mysqli_query($connection, $sql1);
                    }
                }
            }?>
            <div class="function">
                <input class="logout_button" type="button" name="logout" value="Cerrar sesión" onClick="logout()">
            </div>
        </section>
        <footer>
            <p id="pa1">Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
        </footer>
    </div>
</body>
</html>