<?php
include("../../connection.php");
session_start();
if(!isset($_SESSION['userinfo'])){
    header("location:../../main/index.html");
}

if(isset($_GET['send'])){
    $search = mysqli_real_escape_string($adminconnection, $_GET['search']);

    if($search == ""){
        echo "
        <!DOCTYPE html>
<html lang='es'>
<head>
    <title>Error</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='../administrator_styles.css'>
    <link rel='stylesheet' href='../new_admin_styles.css'>
    <style>
        .error{background-color:red;color:white}
    </style>
    <script>
        function profile(){
            window.location.href = '../adminprofile.php';
        }

        function logout(){
            window.location.href = '../../main/logout.php';
        }

    </script>
</head>
<body>";
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../main/index.html");
    }
    echo"
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_produccion.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>El campo no puede estar vacío</h1>
            <div class='profile'>
                <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>";

                 echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);

                 echo"</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>PRODUCCIÓN</h2>
                <br>
                <p class='error'>Ingrese el campo solicitado</p>
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
    $sql1 = "SELECT * FROM usuario us JOIN empleado em ON us.idUsuario = em.idUsuario
    JOIN produccionempleado pe ON em.idEmpleado = pe.idEmpleado 
    JOIN produccion pr ON pe.codProduccion = pr.codProduccion 
    JOIN productoproduccion pp ON pr.codProduccion = pp.codProduccion
    JOIN producto ON pp.codProducto = producto.codProducto 
    WHERE nombreUsuario LIKE '%$search%' OR apellidosUsuario LIKE '%$search%' ORDER BY fecha DESC";
    $query1 = mysqli_query($adminconnection, $sql1);
    if($query1){
        $num = $query1->num_rows;
        echo"
        <!DOCTYPE html>
<html lang='es'>
<head>
    <title>Producción individual</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='../administrator_styles.css'>
    <link rel='stylesheet' href='../new_admin_styles.css'>
    <style>
        .main_table{background-color:#777;text-align:center;width:80%;margin:20px auto;font-weight:bold;}
        .header{background-color:#a1ca4f;font-size:1.5em;}
        .field{background-color:#bbb;font-size:1.2em;}
    </style>
    <script>
        function profile(){
            window.location.href = '../adminprofile.php';
        }

        function logout(){
            window.location.href = '../../main/logout.php';
        }

    </script>
</head>
<body>";
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../main/index.html");
    }
    echo"
    <div id='cont1'>
        <header id='enc1'>
            <a href='vista_produccion.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Producción individual de "; echo $_GET['search']; echo"</h1>
            <div class='profile'>
                <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>";

                 echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);

                 echo"</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>PRODUCCIÓN</h2>
                <br>
                <p>En esta interfaz podrás obtener un reporte de la productividad general del empleado solicitado</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <table class='main_table'>
                <tr>
                <td class='header'>N°</td>
                <td class='header'>Producto</td>
                <td class='header'>Cantidad</td>
                <td class='header'>Fecha</td>
                <td class='header'>Productor</td>
                </tr>";
                $i = 1;
                while($r= $query1->fetch_assoc()){
                    echo "
                    <tr>
                    <td class='field'>$i</td>
                    <td class='field'>" . $r['producto'] . "</td>
                    <td class='field'>" . $r['cantProduccion'] . "</td>
                    <td class='field'>" . $r['fecha'] . "</td>
                    <td class='field'>" . $r['nombreUsuario'] . " " . $r['apellidosUsuario'] . "</td>
                    </tr>
                    ";
                    $i++;
                }
                echo"
                </table>
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
?>