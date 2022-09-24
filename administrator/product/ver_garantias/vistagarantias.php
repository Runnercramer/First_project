<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Ver Garantias</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .production_table{width:70%;margin:20px auto;background-color:#777;text-align:center;font-weight:bold;}
        .header{background-color:#a1ca4f;font-size:1.4em;border:1px solid black;}
        .field{background-color:#bbb;font-size:1.15em;border:1px solid black;}
        .production_button{background-color:#bbb;border:1px hidden;font-weight:bold;font-size:1em;}
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
        header("location:../../../main/index.html");
    }

    $sql1 = "SELECT codProducto,fecha,cantidad,idCliente FROM garantia";

    $query1 = mysqli_query($adminconnection, $sql1);

    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_producto.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Ver Garantias</h1>
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
                <h2>VER GARANTIAS</h2>
                <br>
                <p>En esta interfaz obtendrás un listado de todas las garantías relacionadas por Nombre cliente.<br><b>Puedes oprimir sobre el nombre del cliente, para ver al detalle la descripción de la garantía.</b></p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>3012157196<br>3022459827</p>
            </div>
            <div class="production_report">
                <table class="production_table">
                    <tr>
                        <td class="header">idCliente</td>
                        <td class="header">Producto</td>
                        <td class="header">Cantidad</td>
                        <td class="header">Fecha</td>
                    </tr>
                    <?php
                    while($g = $query1->fetch_assoc()){
                        echo "
                        <tr>
                        <td class='field'>" . $g['idCliente'] . "</td>             
                        <td class='field'>" . $g['codProducto'] . "</td>
                        <td class='field'>" . $g['cantidad'] . "</td>
                        <td class='field'>" . $g['fecha'] . "</td>
                        </tr>";          
                  } 
                    ?>
                </table>
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
