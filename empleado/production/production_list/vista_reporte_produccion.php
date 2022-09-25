<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Reporte producción</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../colaborador.css">
    <style>
        .main_table{background-color:#777;text-align:center;width:90%;margin:10px auto;font-weight:bold;}
        .header{background-color:#a1ca4f;border:1px solid black;font-size:1.5em;}
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
        header("location:../../../index.html");
    }
    $id_user = $_SESSION['userinfo']['idUsuario'];
    $sql1 = "SELECT idEmpleado FROM empleado WHERE idUsuario = '$id_user'";
    $query1 = mysqli_query($connection, $sql1);
    $row = $query1->fetch_assoc();
    $id_user = $row['idEmpleado'];

    $sql2 = "SELECT * FROM produccionempleado pe LEFT JOIN produccion pr ON pe.codProduccion = pr.codProduccion JOIN productoproduccion pp ON pr.codProduccion = pp.codProduccion WHERE pe.idEmpleado = '$id_user' ORDER BY fecha DESC";
    $query2 = mysqli_query($connection, $sql2);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_produccion.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Reporte producción</h1>
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
                <h2>REPORTE PRODUCCIÓN</h2>
                <br>
                <p>Aquí obtendrás un listado con las producciones realizadas por usted</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="production_list">
                <table class="main_table">
                    <tr>
                        <td class="header">N°</td>
                        <td class="header">Fecha</td>
                        <td class="header">Producto</td>
                        <td class="header">Cantidad</td>
                    </tr>
                    <?php
                    $i = 1;
                    while($r = $query2->fetch_Assoc()){
                        echo "
                        <tr>
                            <td class='field'>$i</td>
                            <td class='field'>" . $r['fecha'] . "</td>
                            <td class='field'>" . $r['codProducto'] . "</td>
                            <td class='field'>" . $r['cantProduccion'] . "</td>
                        </tr>
                        ";
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
