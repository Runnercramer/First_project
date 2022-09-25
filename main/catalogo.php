<?php
include("../connection.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="icon" href="../imagenes/vetex.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <style>
        .main_container{width:90%;background-color:#eee;min-height:530px;margin:15px auto;display:grid;grid-template-columns:2fr 7fr;grid-template-rows:400px 150px;}
        .login_form{width:90%;margin:10px auto;background-color:#aaa;display:flex;flex-direction:column;height:auto;min-height:400px;padding:10px;align-items:center;justify-content:space-evenly;box-shadow:5px 5px 20px 5px #333;grid-row-start:1;grid-row-end:3;}
        .login_form input[type='email'], input[type='password']{width:60%;font-size:1em;padding:5px;text-align:center;border-radius:15px;height:35px;}
        .login_form input[type="button"], input[type="submit"]{background-color:#a1ca4f;font-weight:bold;font-size:1em;padding:3px;box-shadow:3px 3px 10px 3px #333;color:black;border-radius:15px;}
        .products_form{display:grid;grid-template-columns:repeat(4, 1fr);grid-template-rows:450px 100px;}
        .product_card{background-color:#aaa;display:flex;flex-direction:column;align-items:center;justify-content:space-evenly;padding:5px;margin:10px;box-shadow:3px 3px 10px 3px #333;}
        .img_product{width:230px;}
        .pag{grid-column-start:1;grid-column-end:5;display:flex;flex-direction:row;align-items:center;justify-content:space-evenly;margin-top:30px;}
        .pag_button{background-color:beige;font-size:1.2em;font-weight:bold;padding:5px;box-shadow:3px 3px 10px 3px #333;color:black;}
    </style>
</head>
<body>
<?php
    $sql1 = "SELECT * FROM producto JOIN detalleproducto ON producto.codProducto = detalleproducto.codProducto WHERE estadoProducto = 'habilitado'";
    $query1 = mysqli_query($connection, $sql1);
?>
    <div id="cont1">
        <header>
            <a href="../index.html"><img id="img1" src="../imagenes/descarga.png" alt="Logotipo de Vetex"></a>
            <h1>Calidad a los mejores precios</h1><br><h1>Catálogo</h1>
        </header>
            <div class='main_container'> 
                    <form action='login.php' method='POST' class='login_form'>
                        <h2>¿Tienes una cuenta?</h2>
                        <input type="email" name="email" placeholder="Correo electrónico">
                        <input type="password" name="password" placeholder="Contraseña">
                        <input type="submit" name="login" value="Iniciar sesión">
                        <a href="recovery.html">
                        ¿Olvidaste tu contraseña?</a>
                        <a href="user_creation.html" style="text-decoration:none; color:black;">
                        <input type="button" name="newaccount" value="Crear nueva cuenta"></a>
                    </form>
                <?php
                $tamaño_pagina = 4;
                if(isset($_GET['pagina'])){
                    if($_GET['pagina'] == 1){
                        header("location:/Vetex/main/catalogo.php");
                    }else{
                        $pagina = $_GET['pagina'];
                    }
                }else{
                    $pagina = 1;
                }
                $empezar_desde = ($pagina - 1) * $tamaño_pagina;

                $sql1 = "SELECT * FROM imagenproducto im JOIN producto pr ON im.codProducto = pr.codProducto JOIN detalleproducto dp ON pr.codProducto = dp.codProducto WHERE estadoProducto = 'habilitado' ORDER BY producto ASC";
                $query1 = mysqli_query($connection, $sql1);

                $num_filas = $query1->num_rows;

                $total_paginas = ceil($num_filas/$tamaño_pagina);

                $sql1_limite = "SELECT * FROM imagenproducto im JOIN producto pr ON im.codProducto = pr.codProducto JOIN detalleproducto dp ON pr.codProducto = dp.codProducto WHERE estadoProducto = 'habilitado' ORDER BY producto ASC LIMIT $empezar_desde,$tamaño_pagina";

                $query1_limite = mysqli_query($connection, $sql1_limite);
                
                ?>
                <div class='products_form'>
                 <?php
                   while($r = $query1_limite->fetch_assoc()){
                        $cont = $r['imagen'];
                        $cod = $r['codProducto'];
                        echo "
                        <div class='product_card'>
                        <h3 align='center'>$cod</h3>
                        <img class='img_product' src='data:image/jpeg; base64, " . base64_encode($cont) . "'>
                        <h3>" . $r['producto'] . "</h3>
                        <h4>" . $r['valorProducto'] . "</h4>
                        <p>" . $r['descripcionProducto'] . "</p>
                        </div>";
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
            </div>    
        <footer>
            <p id="pa1">Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
        </footer>
    </div>
</body>
</html>
