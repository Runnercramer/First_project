<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Despachos</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../customer_styles.css">
    <link rel="stylesheet" href="../../new_customer_styles.css">
    <style>
        .transportadoras{display:grid;grid-template-columns:1fr 1fr 1fr;width:80%;margin:20px auto;}
        .trans_button{background-color:#85b427;width:50%;height:50px;font-size:1.2em;font-weight:bold;box-shadow:3px 3px 10px 3px #333;}
        .trans_button:hover{background-color:#a1ca4f;}
        .trans_button:active{background-color:black;color:white;}
        .main_table{text-align:center;background-color:#777;width:95%;margin:40px auto;box-shadow:5px 5px 15px 5px #333;}
        .header{font-size:1.4em;background-color:#a1ca4f;font-weight:bold;}
        .field{background-color:#bbb;font-size:1.2em;font-weight:bold;}
    </style>
     <script>
    function logout(){
        window.location.href = "../../../main/logout.php";
    }

    function profile(){
        window.location.href = "../../customerprofile.php";
    }

    function coord(){
        window.location.href="https://www.coordinadora.com/portafolio-de-servicios/servicios-en-linea/rastrear-guias/";
    }

    function tcc(){
        window.location.href="https://tcc.com.co/courier/mensajeria/productos-y-servicios/rastrear-envio/";
    }

    function inter(){
        window.location.href="https://www.interrapidisimo.com/sigue-tu-envio/";
    }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'cliente'){
        header("location:../../../main/index.html");
    }

    $c = $_SESSION['customerinfo']['idCliente'];
    $sql1 = "SELECT * FROM despacho de JOIN pedido pe ON de.codPedido = pe.codPedido WHERE idCliente = '$c' AND estado <> 'Entregado' ORDER BY fecha ASC";
    $query1 = mysqli_query($connection, $sql1);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../../customer_orders/vista_pedido.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Despachos</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>DESPACHOS</h2>
                <p>En esta interfaz podrás visualizar un listado de los pedidos realizados y que aún no se han entregado. Esto incluye los que ya han sido depachados desde la bodega y los que no. También puedes oprimir en los botones de las transportadoras para rastrearlas.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <div class="transportadoras">
                    <input class="trans_button" type="button" name="coord" value="Coordinadora" oncLick="coord()">
                    <input class="trans_button"  type="button" name="tcc" value="TCC" oncLick="tcc()">
                    <input class="trans_button"  type="button" name="inter" value="Interrapidisimo" oncLick="inter()">
                </div>
                <table class="main_table">
                    <tr>
                        <td class="header">N°</td>
                        <td class="header">Código de pedido</td>
                        <td class="header">Fecha de despacho</td>
                        <td class="header">Estado</td>
                        <td class="header">Código de guía</td>
                    </tr>
                    <?php
                    $i = 1;
                    while($r = $query1->fetch_assoc()){
                        echo 
                        "
                        <tr>
                            <td class='field'>" . $i . "</td>
                            <td class='field'>" . $r['codPedido'] . "</td>
                            <td class='field'>" . $r['fecha'] . "</td>
                            <td class='field'>" . $r['estado'] . "</td>
                            <td class='field'>" . $r['guia'] . "</td>
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