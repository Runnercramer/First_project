<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Edición empleados</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .main_table{background-color:#777;text-align:center;width:100%;font-weight:bold;}
        .header{background-color:#a1ca4f;font-size:1.4em;}
        .field{background-color:#bbb;font-size:1.2em;}
        .img_user{width:150px;border-radius:50%;}
        .button{width:30%;}
        .update_button{width:40%;margin:15px auto;background-color:beige;font-size:0.9em;font-weight:bold;border-radius:15px;}
        .test_field{display:flex;flex-direction:column;height:100%;}
        .function_form{display:flex;flex-direction:column;align-items:center;}
    </style>
       <script>
        function logout(){
            window.location.href = "../../../main/logout.php";
        }
        function profile(){
            window.location.href = "../../adminprofile.php";
        }   
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../index.html");
    }
    $sql1 = "SELECT * FROM empleado em JOIN usuario us ON em.idUsuario = us.idUsuario LEFT JOIN imagenusuario iu ON us.idUsuario = iu.idUsuario";
    $query1 = mysqli_query($adminconnection, $sql1);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_empleados.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Edición de empleados</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>EDICIÓN DE EMPLEADOS</h2>
                <br>
                <p>En esta interfaz encontrarás un listado con los empleados, su información y la capacidad de cambiar la información de los mismos.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="main_edition_container">
                <form action="edicion_empleado_controller.php" method="POST" enctype="multipart/form-data">
                <table class="main_table">
                    <tr>
                        <td class="header">Nombre</td>
                        <td class="header">Foto</td>
                        <td class="header">Cargo</td>
                        <td class="header">Labores</td>
                        <td class="header">Modificar</td>                   
                    </tr>
                    <?php
                    while($r = $query1->fetch_assoc()){
                        $cont = $r['imagen'];
                        $id_empleado = $r['idEmpleado'];
                        $sql2 = "SELECT * FROM labdesempeñadas ld JOIN empleado em ON ld.idEmpleadoLab = em.idEmpleado WHERE idEmpleado = '$id_empleado'";
                        $query2 = mysqli_query($adminconnection, $sql2);
                        echo "
                        <tr>
                        <td class='field'>" . $r['nombreUsuario'] . " " . $r['apellidosUsuario'] . "</td>
                        <td class='field'><img class='img_user' src='data:" . $r['tipoImagen'] . "; base64, " . base64_encode($cont) . "'></td>
                        <td class='field'>" . $r['cargo'] . "</td>
                        <td class='field'>"; 
                        while($q = $query2->fetch_assoc()){
                            echo $q['labordesempeñada'] . "<br>";
                        }
                         echo"</td>
                        <td class='field test_field'>
                        <form class='function_form' action='edicion_empleado_controller.php' method='POST'>
                        <input type='hidden' name='id' value='$id_empleado'>
                        <label>Cambiar cargo: <input type='text' name='cargo' placeholder='Ingresa nuevo cargo'></label>
                        <label>Agregar labor: <input type='text' name='new_labor' placeholder='Ingresa una nueva labor'></label>
                        <label>Eliminar labor: <input type='text' name='delete_labor' placeholder='Elimina una labor'></label>
                        <input class='update_button' type='submit' name='send' value='Actualizar'>
                        </form>
                        </td>
                        </tr>
                        ";
                    }
                    ?>
                    </table>  
                    <input class="button" type="submit" name="send" value="Cambiar">
                </form> 
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
<?php
$adminconnection->close();
$connection->close();
?>