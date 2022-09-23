<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Reporte Producción</title>
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

    $sql1 = "SELECT * FROM usuario us JOIN empleado em ON us.idUsuario = em.idUsuario
    JOIN produccionempleado pe ON em.idEmpleado = pe.idEmpleado 
    JOIN produccion pr ON pe.codProduccion = pr.codProduccion 
    JOIN productoproduccion pp ON pr.codProduccion = pp.codProduccion
    JOIN producto ON pp.codProducto = producto.codProducto 
    ORDER BY pp.codProduccion ASC";
    $query1 = mysqli_query($adminconnection, $sql1);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_produccion.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Reporte producción</h1>
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
                <h2>REPORTE PRODUCCIÓN</h2>
                <br>
                <p>En esta interfaz obtendrás un listado de la producción general de la bodega.<br><b>Puedes oprimir sobre la referencia de un producto para ver la producción de ese producto.</b></p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="production_report">
                <table class="production_table">
                    <tr>
                        <td class="header">Cód Producción</td>
                        <td class="header">Producto</td>
                        <td class="header">Cantidad</td>
                    </tr>
                    <?php
                    while($r = $query1->fetch_assoc()){
                        $producto = $r['codProducto'];
                        echo "
                        <tr>
                        <td class='field'>" . $r['codProduccion'] . "</td>
                        <td class='field'>
                        <form action='#' method='GET'>
                        <input type='hidden' name='producto' value='$producto'>
                        <input class='production_button' type='submit' name='send' value='$producto'>
                        </form>
                        </td>
                        <td class='field'>" . $r['cantProduccion'] . "</td>
                        </tr>";
                    }
                    ?>
                </table>
                <br><br><br>
                <?php
                if(isset($_GET['send'])){
                    $codigo_producto = $_GET['producto'];
                    $sql2 = "SELECT * FROM usuario us JOIN empleado em ON us.idUsuario = em.idUsuario
                    JOIN produccionempleado pe ON em.idEmpleado = pe.idEmpleado 
                    JOIN produccion pr ON pe.codProduccion = pr.codProduccion 
                    JOIN productoproduccion pp ON pr.codProduccion = pp.codProduccion
                    JOIN producto ON pp.codProducto = producto.codProducto WHERE pp.codProducto = '$codigo_producto'
                    ORDER BY fecha DESC";
                    $query2 = mysqli_query($connection, $sql2);
                    echo "
                    <table class='production_table'>
                    <tr><td colspan='3' class='header'>$codigo_producto</td></tr>
                    <tr>
                    <td class='header'>Código Producción</td>
                    <td class='header'>Fecha</td>
                    <td class='header'>Empleado</td>
                    </tr>";
                    while($q = $query2->fetch_assoc()){
                        echo "
                        <tr>
                        <td class='field'>" . $q['codProduccion'] . "</td>
                        <td class='field'>" . $q['fecha'] . "</td>
                        <td class='field'>" . $q['nombreUsuario'] . " " . $q['apellidosUsuario'] . "</td>
                        </tr>
                        ";
                    }
                    echo"
                    </table>
                    ";
                }
                ?>
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
