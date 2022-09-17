<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Listado productos</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .main_table{background-color:#777;text-align:center;font-weight:bold;width:100%;}
        .header{background-color:#a1ca4f;border:2px solid black;font-size:1.5em;}
        .field{background-color:#bbb;border:2px solid black;font-size:1.2em;padding:10px;}
        .img_product{width:200px;}
        .pag{width:100%;display:flex;flex-direction:row;justify-content: space-evenly;padding:10px;}
        .pag_button{background-color:#a1ca4f;font-weight:bold;font-size:1.3em;padding:5px 10px;box-shadow:3px 3px 10px 3px #333;}
        .pag_button:hover{background-color:#85b427;}
        .pag_button:active{background-color:black;color:white;}
    </style>
    <script>
        function profile(){
            window.location.href = "../../adminprofile.php";
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
        header("location:../../../main/index.html");
    }

    $tamaño_pagina = 3;
    if(isset($_GET['pagina'])){
        if($_GET['pagina'] == 1){
            header("location:/Vetex/administrator/product/product_list/vista_listado_productos.php");
        }else{
            $pagina = $_GET['pagina'];
        }
    }else{
        $pagina = 1;
    }
    $empezar_desde = ($pagina - 1) * $tamaño_pagina;

    $sql1 = "SELECT * FROM imagenproducto im JOIN producto pr ON im.codProducto = pr.codProducto JOIN detalleproducto dp ON pr.codProducto = dp.codProducto ORDER BY producto ASC";
    $query1 = mysqli_query($adminconnection, $sql1);

    $num_filas = $query1->num_rows;

    $total_paginas = ceil($num_filas/$tamaño_pagina);

    $sql1_limite = "SELECT * FROM imagenproducto im JOIN producto pr ON im.codProducto = pr.codProducto JOIN detalleproducto dp ON pr.codProducto = dp.codProducto ORDER BY producto ASC LIMIT $empezar_desde,$tamaño_pagina";

    $query1_limite = mysqli_query($adminconnection, $sql1_limite);

    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_producto.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Hay <?php echo $num_filas?> resultados<br>Mostrando la página <?php echo $pagina?> de <?php echo $total_paginas?></h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">.
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>LISTA PRODUCTOS</h2>
                <br>
                <p>Un listado con los productos existentes y su estado. <br>Un producto habilitado está diponible. Uno deshabilitado está agotado.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="main_cont">
                <table class="main_table">
                    <tr>
                        <td class="header">Código</td>
                        <td class="header">Nombre</td>
                        <td class="header">Descripción</td>
                        <td class="header">Imágen</td>
                        <td class="header">Estado</td>
                    </tr>
                    <?php
                    while($r = $query1_limite->fetch_assoc()){
                        $cont = $r['imagen'];
                        echo "
                        <tr>
                        <td class='field'>" . $r['codProducto'] . "</td>
                        <td class='field'>" . $r['producto'] . "</td>
                        <td class='field'>" . $r['descripcionProducto'] . "</td>
                        <td class='field'><img class='img_product' src='data:image/jpeg; base64, " . base64_encode($cont) . "'></td>
                        <td class='field'>" . mb_strtoupper($r['estadoProducto']) . "</td>
                        </tr>
                        ";
                    }
                    ?>
                    </table>
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
