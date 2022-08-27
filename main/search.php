<?php
include("../connection.php");
if(isset($_GET['button1'])){
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    $query1 = "SELECT codProducto, producto FROM producto WHERE producto LIKE '%$search%'"; 
    $resultset1 = mysqli_query($connection, $query1);
    //La función num_rows nos permite obtener la cantidad de filas resultado en un resultset
    $a = mysqli_num_rows($resultset1);
    echo
    "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <title>Búsqueda</title>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='estilos.css'/>
        <link rel='icon' href='../imagenes/vetex.ico'/>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
        <style>
            .table{width:60%;border:1px solid black;;margin:50px auto;font-size:1.5em;font-weight:600;text-align:center;}
            .enc1{background-color:#85b427;padding:5px;}
            .field1{backround-color:aliceblue;padding:2px;}
        </style
    </head>
    <body>
        <div id='cont1'>
            <header id='enc1'>
                <a href='index.html'><img id='img1' src='../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                <h1>Los resultados asociados a su búsqueda corresponden a: $a resultados</h1>
            </header>  
        </div>";

    //El ciclo while nos permite recorrer todas las filas que se encuntran en el array resultado del resultset
    echo "<table class='table' border=1><tr><td class='enc1'>Código del Producto</td><td class='enc1'>Nombre del producto</td><td class='enc1'>Valor del producto</td></tr>";
    while($array1 = mysqli_fetch_row($resultset1)){
        $query2 = "SELECT valorProducto FROM detalleproducto WHERE codProducto = '$array1[0]'";
        $resultset2 = mysqli_query($connection, $query2);
        while($array2 = mysqli_fetch_row($resultset2)){
            echo 
            "<tr><td class='field1'>$array1[0]</td><td class='field1'>$array1[1]</td><td class='field1'>$$array2[0]</td></tr>";
        }
    }
    echo "</table>";
    echo "<footer id='pa2'>
            <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
        </footer>
    </body>
    </html>";
}
?>