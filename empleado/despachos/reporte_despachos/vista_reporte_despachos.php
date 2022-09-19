<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Reporte despachos</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../colaborador.css">
    <style>
        .main_table{width:100%;background-color:#777;font-weight:bold;text-align:center;}
        .header{background-color:#a1ca4f;font-size:1.5em;border:1px solid black;}
        .field{background-color:#bbb;font-size:1.2em;border:1px solid black;}
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

    $id_user = $_SESSION['userinfo']['idUsuario'];
    $sql1 = "SELECT idEmpleado FROM empleado WHERE idUsuario = '$id_user'";
    $query1 = mysqli_query($connection, $sql1);
    $row = $query1->fetch_assoc();
    $id_user = $row['idEmpleado'];

    $sql2 = "SELECT * FROM despacho de JOIN pedido pe ON de.codPedido = pe.codPedido JOIN cliente cl ON pe.idCliente = cl.idCliente JOIN usuario us ON cl.idUsuario = us.idUsuario WHERE encargado = '$id_user' ORDER BY fecha DESC";
    $query2 = mysqli_query($connection, $sql2);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_despachos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Reporte despachos</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">.
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>REPORTE DESPACHOS</h2>
                <br>
                <p>Este es un listado de los despachos enviados por usted con su respectivo estado.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <table class="main_table">
                    <tr>
                        <td class="header">Código</td>
                        <td class="header">Fecha pedido</td>
                        <td class="header">Cliente</td>
                        <td class="header">Guia</td>
                        <td class="header">Fecha despacho</td>
                        <td class="header">Estado</td>
                    </tr>
                    <?php
                    while($r = $query2->fetch_assoc()){
                        echo "
                        <tr>
                        <td class='field'>" . $r['codPedido'] . "</td>    
                        <td class='field'>" . $r['fechaPedido'] . "</td>    
                        <td class='field'>" . $r['nombreUsuario'] . " " . $r['apellidosUsuario'] . "</td>    
                        <td class='field'>" . $r['guia'] . "</td>    
                        <td class='field'>" . $r['fecha'] . "</td>
                        <td class='field'>" . $r['estado'] . "</td>    
                        </tr>  
                        ";
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