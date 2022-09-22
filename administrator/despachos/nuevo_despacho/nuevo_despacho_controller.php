<?php
include("../../../connection.php");
session_start();
if(!isset($_SESSION['userinfo'])){
    header("location:../../../main/index.html");
}

if(isset($_POST['send'])){
    $codpedido = mysqli_real_escape_string($adminconnection, $_POST['codpedido']);
    $idempleado = mysqli_real_escape_string($adminconnection, $_POST['idempleado']);
    $date = mysqli_real_escape_string($adminconnection, $_POST['date']);
    $empresa = mysqli_real_escape_string($adminconnection, $_POST['empresa']);
    $guia = mysqli_real_escape_string($adminconnection, $_POST['guia']);

    $trans = $empresa . "-" . $guia;

    if($codpedido == "" || $idempleado == "" || $date == "" || $trans == ""){
        echo "
        <!DOCTYPE html>
<html lang='es'>
<head>
    <title>Error</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='../../administrator_styles.css'>
    <link rel='stylesheet' href='../../new_admin_styles.css'>
    <style>
        .error{background-color:red;color:white;}
    </style>
             <script>
        function profile(){
            window.location.href = '../../adminprofile.php';
        }

        function logout(){
            window.location.href = '../../../main/logout.php';
        }
    </script>
</head>
<body>";
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../main/index.html");
    }
    echo "
    <div id='cont1'>
        <header id='enc1'>
            <a href='nuevo_despacho.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1 class='error'>Los campos no pueden estar vacíos</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>"; echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                
                echo "</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()''>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>CREACIóN DESPACHOS</h2>
                <br>
                <p>Debes ingresar todos los campos solicitados.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
        ";
    }else{
        $sql0 = "SELECT * FROM pedido WHERE codPedido = '$codpedido'";
        $query0 = mysqli_query($adminconnection, $sql0);
        $num_rows = $query0->num_rows;
        if($num_rows > 0){
        $sql1 = "INSERT INTO despacho (codPedido, encargado, fecha, estado, guia) VALUES ('$codpedido', '$idempleado', '$date', 'En camino', '$trans')";
        $query1 = mysqli_query($adminconnection, $sql1);
        if($query1){
            echo
            "
        <!DOCTYPE html>
<html lang='es'>
<head>
    <title>Creación desapcho</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='../../administrator_styles.css'>
    <link rel='stylesheet' href='../../new_admin_styles.css'>
    <style>
    </style>
             <script>
        function profile(){
            window.location.href = '../../adminprofile.php';
        }

        function logout(){
            window.location.href = '../../../main/logout.php';
        }
    </script>
</head>
<body>";
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../main/index.html");
    }
    echo "
    <div id='cont1'>
        <header id='enc1'>
            <a href='nuevo_despacho.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>El despacho ha sido ingresado exitosamente</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>"; echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                
                echo "</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()''>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>CREACIÓN DESPACHOS</h2>
                <br>
                <p>La cosnsulta ha sido exitosa.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
        ";
        }else{
            "
        <!DOCTYPE html>
<html lang='es'>
<head>
    <title>Error</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='../../administrator_styles.css'>
    <link rel='stylesheet' href='../../new_admin_styles.css'>
    <style>
        .error{background-color:red;color:white;}
    </style>
             <script>
        function profile(){
            window.location.href = '../../adminprofile.php';
        }

        function logout(){
            window.location.href = '../../../main/logout.php';
        }
    </script>
</head>
<body>";

    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../main/index.html");
    }
    echo "
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_despachos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1 class='error'>Hubo un error al ingresar los datos</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>"; echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                
                echo "</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()''>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>CREACIóN DESPACHOS</h2>
                <br>
                <p>Error en la consulta</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
        ";
        }
    }else{
        "
        <!DOCTYPE html>
<html lang='es'>
<head>
    <title>Error</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='../../administrator_styles.css'>
    <link rel='stylesheet' href='../../new_admin_styles.css'>
    <style>
        .error{background-color:red;color:white;}
    </style>
             <script>
        function profile(){
            window.location.href = '../../adminprofile.php';
        }

        function logout(){
            window.location.href = '../../../main/logout.php';
        }
    </script>
</head>
<body>";

    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../main/index.html");
    }
    echo "
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_despachos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1 class='error'>Verifique la existencia del pedido ingresado</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>"; echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                
                echo "</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()''>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>CREACIÓN DESPACHOS</h2>
                <br>
                <p>El pedido ingresado no existe</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
        ";
    }
    }
}
$connection->close();
$adminconnection->close();
$connection->close();
?>
