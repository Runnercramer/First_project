<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Reporte pedidos</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .main_table{background-color:#bbb;width:80%;margin:20px auto;height:auto;text-align:center;font-weight:bold;}
        .header{background-color:#a1ca4f;font-size:1.5em;}
        .field{background-color:#999;font-size:1.2em;}
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

    $sql1 = "SELECT * FROM pedido pe JOIN cliente cl ON pe.idCliente = cl.idCliente JOIN usuario us ON cl.idUsuario = us.idUsuario ORDER BY fechaPedido DESC";
    $query1 = mysqli_query($adminconnection, $sql1);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_pedidos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Reporte pedidos</h1>
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
                <h2>REPORTE PEDIDOS</h2>
                <br>
                <p>En esta interfaz obtendrás un listado con todos los pedidos realizados. Puedes oprimir en el código del pedido para ver los detalles del mismo.<p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <!--Al clicar en el código del pedido, deberá redirigir a una página que muestre todo el pedido-->
                <table class="main_table">
                    <tr>
                        <td class="header">N°</td>
                        <td class="header">Código pedido</td>
                        <td class="header">Fecha pedido</td>
                        <td class="header">Cliente</td>
                        <td class='header'>Valor</td>
                    </tr>
                    <?php
                    $i = 1;
                    while($r = $query1->fetch_assoc()){
                        echo "
                        <tr>
                        <td class='field'>$i</td>
                        <td class='field'>" . $r['codPedido'] . "</td>
                        <td class='field'>" . $r['fechaPedido'] . "</td>
                        <td class='field'>" . $r['nombreUsuario'] . " " . $r['apellidosUsuario'] . "</td>
                        <td class='field'>$" . $r['valorPedido'] . "</td>
                        </tr>";
                        $i++;
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
