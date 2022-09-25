<?php
include("../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>PQRS</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../administrator_styles.css">
    <link rel="stylesheet" href="../new_admin_styles.css">
    <style>
        .pqr_table{width:100%;margin:20px auto;background-color:#777;text-align:center;font-weight:bold;}
        .header{background-color:#a1ca4f;font-size:1.4em;border:1px solid black;}
        .field{background-color:#bbb;font-size:1.15em;border:1px solid black;padding:2px;}
        .update_field{border-radius:15px;text-align:center;}
        .update_button{background-color:beige;font-weight:bold;padding:2px;}
    </style>
    <script>
        function profile(){
            window.location.href = "../adminprofile.php";
        }

        function logout(){
            window.location.href = "../../main/logout.php";
        }

    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../index.html");
    }
    $sql1 = "SELECT * FROM usuario us JOIN cliente cl ON us.idUsuario = cl.idUsuario JOIN pqrs pq ON cl.idCliente = pq.idCliente JOIN email em ON us.idUsuario = em.idUsuario JOIN celular ce ON us.idUsuario = ce.idUsuario";
    $query1 = mysqli_query($adminconnection,$sql1);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_administrador.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>PQRS</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">.
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>Listado PQRS</h2>
                <br>
                <p>En este módulo podrás ver un listado de todos los PQRS que los clientes han realacionado detalladamente.<br><b>Puedes actualizar el estado de la solicitud.</b></p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="function_pqr">
            <table class="pqr_table">
                    <tr>
                        <td class='header'>Código</td>
                        <td class="header">Nombre</td>
                        <td class="header">Email</td>
                        <td class="header">Tipo de solicitud</td>
                        <td class="header">Solicitud</td>
                        <td class="header">Fecha</td>
                        <td class="header">Estado</td>
                        <td class="header">Actualizar</td>
                    </tr>
                    <?php
                    while($p = $query1->fetch_assoc()){
                        $codigo_solicitud = $p['idSolicitud'];
                        echo "
                        <tr>
                        <td class='field'>$codigo_solicitud</td>
                        <td class='field'>" . $p['nombreUsuario'] . " " . $p['apellidosUsuario'] . "</td>
                        <td class='field'>" . $p['email'] . "</td>
                        <td class='field'>" . mb_strtoupper($p['tipoSolicitud']) . "</td>
                        <td class='field'>" . $p['solicitud'] . "</td>
                        <td class='field'>" . $p['fecha'] . "</td>
                        <td class='field'>" . mb_strtoupper($p['estadoSolicitud']) . "</td>
                        <td class='field'>
                        <form action='#' method='GET'>
                        <input type='hidden' name='codigo' value='$codigo_solicitud'>
                        <input class='update_field' type='text' name='state' value='" . $p['estadoSolicitud'] . "'>
                        <input class='update_button' type='submit' name='send' value='Actualizar'>
                        </form>
                        </td>
                        </tr>";
                    }
                    ?>
                </table>
                <?php
                if(isset($_GET['send'])){

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

