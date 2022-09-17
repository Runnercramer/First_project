<?php
include("../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Usuarios</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../administrator_styles.css">
    <link rel="stylesheet" href="../new_admin_styles.css">
    <style>
        .main_table{width:100%;background-color:#777;text-align:center;font-weight:bold;}
        .header{background-color:#a1ca4f;font-size:1.5em;border:1px solid black;padding:3px}
        .field{background-color:#bbb;font-size:1.2em;border:1px solid black;padding:3px;}
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
        header("location:../../main/index.html");
    }
    $sql1 = "SELECT * FROM email em JOIN usuario us ON em.idUsuario = us.idUsuario JOIN celular ce ON us.idUsuario = ce.idUsuario ORDER BY tipoUsuario ASC";
    $query1 = mysqli_query($adminconnection, $sql1);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_administrador.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Usuarios</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">.
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>USUARIOS</h2>
                <br>
                <p>Este es un listado de todos los usuarios del aplicativo registrados a día de hoy.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <table class="main_table">
                    <tr>
                        <td class="header">N°</td>
                        <td class="header">Nombre</td>
                        <td class="header">Cédula</td>
                        <td class="header">Correo</td>
                        <td class="header">Celular</td>
                        <td class="header">Tipo</td>
                    </tr>
                    <?php
                    $i = 1;
                    while($r = $query1->fetch_assoc()){
                        echo "
                        <tr>
                        <td class='field'>$i</td>
                        <td class='field'>" . $r['nombreUsuario'] . " " . $r['apellidosUsuario'] . "</td>
                        <td class='field'>" . $r['idUsuario'] . "</td>
                        <td class='field'>" . $r['email'] . "</td>
                        <td class='field'>" . $r['celular'] . "</td>
                        <td class='field'>" . mb_strtoupper($r['tipoUsuario']) . "</td>
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
