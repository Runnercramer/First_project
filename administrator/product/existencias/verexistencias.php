<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Actualziar Existencias</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
    .stock_form{width:80%;margin:10px auto;display:flex;flex-direction:column;height:350px;align-items:center;justify-content:space-evenly;font-weight:bold;font-size:1.5em;padding:10px;background-color:#bbb;box-shadow:5px 5px 20px 5px #333;}
        .stock_input{width: 60%;text-align:center;font-size:1em;border-radius:15px;}
        .stock_button{background-color:beige;width:40%;font-size:1em;font-weight:bold;border-radius:15px;padding:5px;box-shadow:3px 3px 15px 3px #333;}
        .stock_button:hover{background-color:blanchedalmond;}
        .stock_button:active{background-color:lightsalmon;}
    </style>
    <script>
        function profile(){
            window.location.href = "../../adminprofile.php";
        }

        function logout(){
            window.location.href = "../../../main/logout.php";
        }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../index.html");
    }

    $sql1 = "SELECT codProducto,fecha,cantidad,idCliente FROM garantia";

    $query1 = mysqli_query($adminconnection, $sql1);

    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_producto.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Actualizar Existencias</h1>
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
                <h2>ACTUALIZAR EXISTENCIAS</h2>
                <br>
                <p>En esta interfaz puedes actualizar las existencias de los productos habilitados.<br><b>Puedes relacionar la cantidad de ingreso y oprimir el boten "Actualizar".</b></p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>3012157196<br>3022459827</p>
            </div>
            <div>
            <form class='stock_form' action='#' method='POST'>
            <label>Producto</label> 
                    <select name='producto' class='stock_input'>
                    <option value='0'>----------------</option>
                    <?php 
                    $sql0 = "SELECT * FROM producto pr JOIN detalleproducto detpro ON pr.codProducto = detpro.codProducto";
                    $query0 = mysqli_query($connection, $sql0);
                    while($m = $query0->fetch_assoc()){
                        $codigoproducto = $m['codProducto'];
                        echo "
                        <option value='$codigoproducto'>$codigoproducto</option>
                        ";
                    }
                    ?>
                    </select>
                    <label>Cantidad</label>
                    <input class='stock_input' type='number' name='cant' placeholder='Ingresa la cantidad' required>
                    <input class='stock_button' type='submit' name='send' value='Actualizar'>
                </form>
            </div>
            <?php
            if(isset($_POST['send'])){
                $cod = mysqli_real_escape_string($adminconnection, $_POST['producto']);
                $cant = mysqli_real_escape_string($adminconnection, $_POST['cant']);

                $sql1 = "SELECT * FROM detalleproducto";
                $query1 = mysqli_query($connection, $sql1);
                while($e =$query1->fetch_assoc()){
                    $existencia = $e['existencias'];
                    $total = $existencia + $cant;
                    $producto = $e['codProducto'];

                $sql2 = "update detalleproducto set existencias = '$total' where codProducto = '$producto'";
                $query2 = mysqli_query($connection, $sql2);
                }
            }            
            ?>
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