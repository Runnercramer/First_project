<?php
include('../../../connection.php');
session_start();
if(!isset($_SESSION['userinfo'])){
    header("location:../../../main/index.html");
}
if(isset($_GET['button'])){
    $date1 = mysqli_real_escape_string($connection, $_GET['date1']);
    $date2 = mysqli_real_escape_string($connection, $_GET['date2']);
    $id = $_SESSION['customerinfo']['idCliente'];
    $query1 = "SELECT * FROM pedido pe 
    JOIN detallepedido de ON pe.codPedido = de.codPedidoDetalle 
    JOIN producto pr ON de.codProducto = pr.codProducto 
    JOIN detalleproducto dp ON pr.codProducto = dp.codProducto 
    WHERE idCliente = '$id' AND fechaPedido BETWEEN '$date1' AND '$date2' ORDER BY fechaPedido DESC";
    
    if($date1 == "" || $date2 == ""){
        echo
        "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Error</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../main/estilos.css'/>
            <link rel='icon' href='../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../customer_styles.css'>
            <link rel='stylesheet' href='../../new_customer_styles.css'>
            <style>
                .error{background-color:red;color:white;text-align:center;width:60%;}
            </style>
            <script>
            function logout(){
                window.location.href = '../../main/logout.php';
            }

            function profile(){
                window.location.href = '../../customerprofile.php';
            }
            </script>
        </head>
        <body>
            <div id='cont1'>
                <header id='enc1'>
                    <a href='orders_list.html'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1>Listado de pedidos</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../imagenes/profile.png' alt='Imagen de perfil'>
                        <h3><b>";
                         echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); 
                          echo "</b></h3>
                        <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                        <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
                    </div>
                </header> 
                <h1 class='error'>Diligencie las 2 fechas solicitadas</h1>
                <footer id='pa2'>
                    <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
                </footer>
            </div>
        </body>
        </html>";
    }else{
        echo 
        "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Listado de pedidos</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../../main/estilos.css'/>
            <link rel='icon' href='../../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../../customer_styles.css'>
            <link rel='stylesheet' href='../../new_customer_styles.css'>
            <style>
            .order_table{background-color:#666;text-align:center;width:100%;}
            .header{background-color:#a1ca4f;font-weight:bold;font-size:1.5em;}
            .field{font-size:1.2em;background-color:#bbb;font-weight:bold;}
            </style>
            <script>
            function profile(){
                window.location.href='../../customerprofile.php';
            }
            function logout(){
                window.location.href = '../../../main/logout.php';
            }
            </script>
        </head>
        <body>
            <div id='cont1'>
                <header id='enc1'>
                    <a href='orders_list.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1>Listado de pedidos</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                        <h3><b>";
                         echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); 
                          echo "</b></h3>
                        <input type='button' class='profile_button' value='Perfil &#9881' onclick=''>
                        <input type='button' class='logout_button' value='Cerrar sesión' onClick='logout()'>
                    </div>
                </header> 
                <section class='methods'>
                    <div class='information'>
                        <h2>Listado de pedidos</h2>
                        <br>
                        <p>Este es un listado de los pedidos realizados por usted, en dónde se encuentran relacionados con el producto solicitado y sus cantidades.</p>
                        <br>
                        <h3>Software:</h3><p><b>SGIVT</b></p>
                        <h3>Version:</h3><p><b>1.2</b></p>
                        <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                        <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
                    </div>
                    <div>
                    <table class='order_table'>
                    <tr>
                        <td class='header'>N°</td>
                        <td class='header'>Código</td>
                        <td class='header'>Valor Pedido</td>
                        <td class='header'>Fecha</td>
                        <td class='header'>Código Producto</td>
                        <td class='header'>Cant</td>
                        <td class='header'>Valor Productos</td>
                    </tr>";
                    $resultados = mysqli_query($connection, $query1);
                    $i = 1;
                    while($array1 = $resultados->fetch_assoc()){
                        $cant = $array1['cantidad'];
                        $price = $array1['valorProducto'];
                        $subtotal = $cant * $price;
                    echo 
                    "
                    <tr>
                        <td class='field'>$i</td>
                        <td class='field'>" . $array1['codPedido'] . "</td>
                        <td class='field'>$" . $array1['valorPedido'] . "</td>
                        <td class='field'>" . $array1['fechaPedido'] . "</td>
                        <td class='field'>" . $array1['codProducto'] . "</td>
                        <td class='field'>" . $array1['cantidad'] . "</td>
                        <td class='field'>$" . $subtotal . "</td>
                    </tr>
                    ";
                    $i++;
                    }
                    echo "
                    </table>
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
$connection->close();
?>