<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Nueva Producción</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../colaborador.css">
    <style>
        .main_form{display:flex;flex-direction:column;min-height:400px;width:80%;margin:10px auto;justify-content:space-evenly;align-items:center;font-size:1.5em;font-weight:bold;background-color:#bbb;box-shadow:5px 5px 20px 5px #333;}
        .main_form input[type="number"]{width:60%;font-size:0.8em;text-align:center;border-radius:15px;}
        select{width:60%;font-size:0.8em;text-align:center;border-radius:15px;}
        input[type="submit"]{width:45%;font-size:0.8em;font-weight:bold;background-color:#85b427;padding:5px;border-radius:15px;box-shadow:3px 3px 10px 3px #333;}
        input[type="submit"]:hover{background-color:#a1ca4f;}
        input[type="submit"]:active{background-color:black;color:white;}
    </style>
    <script>
        function profile(){
            window.location.href = "../../coworkerprofile.php";
        }

        function logout(){
            window.location.href = "../../../main/logout.php";
        }

    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'empleado'){
        header("location:../../../main/index.html");
    }
    $id = $_SESSION['userinfo']['idUsuario'];
    $sql0 = "SELECT * FROM empleado WHERE idUsuario = '$id'";
    $query0 = mysqli_query($connection, $sql0);
    $result = $query0->fetch_assoc();
    $id = $result['idEmpleado'];

    $sql1 = "SELECT codProducto FROM producto";
    $query1 = mysqli_query($connection, $sql1);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_produccion.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Nueva producción</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">.
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>NUEVA PRODUCCIÓN</h2>
                <br>
                <p>Ingresa los datos solicitados para registrar tu producción</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="production_cont">
            <form class="main_form" action="new_production_controller.php" method="POST">
                <label>Producto</label> 
                <select name="product">
                    <option value="0">----------------</option>
                    <?php
                    while($r = $query1->fetch_assoc()){
                        $prod = $r['codProducto'];
                        echo "<option value='$prod'>$prod</option>";
                    }
                    ?>
                </select>
                <label>Cantidad</label>
                <input type="number" name="cant" placeholder="Ingresa la cantidad producida" required>
                <input type="submit" name="send" value="Registrar">
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
