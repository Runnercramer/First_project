<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Reporte inventarios</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .main_table{background-color:#777;width:100%;font-weight:bold;text-align:center;}
        .header{background-color:#a1ca4f;font-size:1.5em;border:1px solid black;}
        .field{background-color:#bbb;border:1px solid black;font-size:1.2em;}
        .child_table{width:60%;margin:30px auto;background-color:#777;font-weight:bold;text-align:center;}
        .child_header{background-color:#a1ca4f;font-size:1.2em;border:1px solid black;}
        .child_field{background-color:#bbb;border:1px solid black;font-size:1em;}
        .stock_button{font-weight:bold;font-size:1em;background-color:#bbb;border:1px hidden;width:50%;}
        .pag{grid-column-start:1;grid-column-end:5;display:flex;flex-direction:row;align-items:center;justify-content:space-evenly;margin-top:30px;}
        .pag_button{background-color:beige;font-size:1.2em;font-weight:bold;padding:5px;box-shadow:3px 3px 10px 3px #333;color:black;}
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
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../index.html");
    }
    $sql1 = "SELECT * FROM inventario inv JOIN administrador ad ON inv.idAdmin = ad.idAdmin JOIN usuario us ON ad.idUsuario = us.idUsuario ORDER BY fecha DESC";
    $query1 = mysqli_query($adminconnection, $sql1);

    $tamaño_pagina = 5;
    if(isset($_GET['pagina'])){
        if($_GET['pagina'] == 1){
            header("location:/Vetex/administrator/inventario/stock_report/vista_reporte_inventario.php");
        }else{
            $pagina = $_GET['pagina'];
        }
    }else{
        $pagina = 1;
    }
    $empezar_desde = ($pagina - 1) * $tamaño_pagina;

    $num_filas = $query1->num_rows;

    $total_paginas = ceil($num_filas/$tamaño_pagina);

    $sql1_limite = "SELECT * FROM inventario inv JOIN administrador ad ON inv.idAdmin = ad.idAdmin JOIN usuario us ON ad.idUsuario = us.idUsuario ORDER BY fecha DESC LIMIT $empezar_desde,$tamaño_pagina";

    $query1_limite = mysqli_query($adminconnection, $sql1_limite);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_inventario.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Reporte inventarios</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>LISTA INVENTARIOS</h2>
                <br>
                <p>Este es un listado con los inventarios realizados.<br><b>Oprime en el código de un inventario para obtener detalles del mismo.</b></p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>   
                <table class='main_table'>
                    <tr>
                        <td class='header'>Código</td>
                        <td class='header'>Fecha</td>
                        <td class='header'>Administrador</td>
                        <td class='header'>Encargado</td>
                    </tr>
                    <?php
                    while($r = $query1_limite->fetch_assoc()){
                        $inventario = $r['codInventario'];
                        $date = $r['fecha'];
                        echo "
                        <tr>
                        <td class='field'>
                        <form action='#' method='GET'>
                        <input type='hidden' name='inventario' value='$inventario'>
                        <input type='hidden' name='date' value='$date'>
                        <input class='stock_button' type='submit' name='send' value='$inventario'>
                        </form>
                        </td>
                        <td class='field'>$date</td>
                        <td class='field'>" . $r['nombreUsuario'] . " " . $r['apellidosUsuario'] . "</td>
                        <td class='field'>" . $r['encargado'] . "</td>
                        </tr>
                        ";
                    }
                    ?>
                </table>
                <?php
                if(isset($_GET['send'])){
                    $cod_inv = $_GET['inventario'];
                    $date = $_GET['date'];
                    $sql2 = "SELECT * FROM detalleinventario WHERE codInventario = '$cod_inv'";
                    $query2 = mysqli_query($adminconnection, $sql2);
                    echo "
                    <table class='child_table'>
                    <tr>
                    <td colspan='2' class='child_header'>Inventario N° $cod_inv // $date</td>
                    </tr>
                    <tr>
                    <td class='child_header'>Producto</td>
                    <td class='child_header'>Cantidad</td>
                    </tr>";
                    while($s = $query2->fetch_assoc()){
                        echo "
                        <tr>
                        <td class='child_field'>" . $s['codProducto'] . "</td>
                        <td class='child_field'>" . $s['existencias'] . "</td>
                        </tr>
                        ";
                    }                    
                    echo"
                    </table>
                    ";
                }
                ?>
                    <div class="pag">
                        <?php
                        for($i = 1; $i<=$total_paginas; $i++){
                            echo "<a href='?pagina=" . $i . "'><input class='pag_button' type='button' value='$i'></a>";
                        }
                        ?>
                    </div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>