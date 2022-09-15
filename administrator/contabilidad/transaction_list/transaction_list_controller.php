<?php
include("../../../connection.php");
session_start();
if(!isset($_SESSION['userinfo'])){
    header("location:../../../main/index.html");
}

if(isset($_POST['send'])){
    $date1 = mysqli_real_escape_string($adminconnection, $_POST['date1']);
    $date2 = mysqli_real_escape_string($adminconnection, $_POST['date2']);

    if($date1 == "" || $date2 == ""){
        echo 
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
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../main/index.html");
    }
    
    echo "<div id='cont1'>
        <header id='enc1'>
            <a href='vista_reporte_transacciones.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1 class='error'>Los campos no deben estar vacíos.</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>";
                 echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                 echo "</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>Error en la inserción</h2>
                <br>
                <p>Ingrese las fechas solicitadas para obtener el reporte.</p>
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
</html>";
    }else{
        $sql1 = "SELECT * FROM transaccion tr JOIN cobro co ON tr.codTransaccion = co.codTransaccion WHERE fecha BETWEEN '$date1' AND '$date2' ORDER BY fecha DESC";
        $sql2 = "SELECT * FROM transaccion tr JOIN gasto ga ON tr.codTransaccion = ga.codTransaccion WHERE fecha BETWEEN '$date1' AND '$date2' ORDER BY fecha DESC";
        $query1 = mysqli_query($adminconnection, $sql1);
        $query2 = mysqli_query($adminconnection, $sql2);
        echo 
        "
        <!DOCTYPE html>
<html lang='es'>
<head>
    <title>Trnsacciones</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='../../administrator_styles.css'>
    <link rel='stylesheet' href='../../new_admin_styles.css'>
    <style>
    .list_section{display:grid;grid-template-columns:1fr 1fr;grid-gap:5px;}
    .subtitle{text-align:center;font-size:2em;margin-bottom:25px;}
    .table{background-color:#777;text-align:center;width:100%;}
    .header{font-size:1.4em;font-weight:bold;background-color:#a1ca4f;}
    .field{background-color:#bbb;font-size:1.2em;font-weight:bold;}
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
    
    echo "<div id='cont1'>
        <header id='enc1'>
            <a href='vista_reporte_transacciones.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Reporte transacciones</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <h3>";
                 echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                 echo "</h3>
                <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
            </div>
        </header>  
        <section class='methods'>
            <div class='information'>
                <h2>Reporte de transacciones</h2>
                <br>
                <p>En las 2 tablas se detallan los gastos y los cobros realizados.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class='list_section'>
                <div>
                <h2 class='subtitle'>Cobros</h2>
                <table class='table'>
                <tr>
                <td class='header'>Cód</td>
                <td class='header'>Valor</td>
                <td class='header'>Fecha</td>
                <td class='header'>Pedido</td>
                <td class='header'>Cliente</td>
                </tr>";
                while($r = $query1->fetch_assoc()){
                    echo "
                    <tr>
                    <td class='field'>" . $r['codTransaccion'] . "</td>
                    <td class='field'>" . $r['valor'] . "</td>
                    <td class='field'>" . $r['fecha'] . "</td>
                    <td class='field'>" . $r['codPedido'] . "</td>
                    <td class='field'>" . $r['idCliente'] . "</td>
                    </tr>";
                }
                echo "
                </table>
                </div>
                <div>
                <h2 class='subtitle'>Gastos</h2>
                <table class='table'>
                <tr>
                <td class='header'>Cód</td>
                <td class='header'>Valor</td>
                <td class='header'>Fecha</td>
                <td class='header'>Encargado</td>
                <td class='header'>Descripción</td>
                </tr>";
                while($q = $query2->fetch_assoc()){
                    echo 
                    "
                    <tr>
                    <td class='field'>" . $q['codTransaccion'] . "</td>
                    <td class='field'>" . $q['valor'] . "</td>
                    <td class='field'>" . $q['fecha'] . "</td>
                    <td class='field'>" . $q['empleado'] . "</td>
                    <td class='field'>" . $q['descripcion'] . "</td>
                    </tr>
                    ";
                }
                echo"
                </table>
                </div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>";
    }
}

$adminconnection->close();
?>