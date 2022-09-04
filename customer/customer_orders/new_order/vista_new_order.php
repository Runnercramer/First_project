<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Nuevo pedido</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../customer_styles.css">
    <link rel="stylesheet" href="../../new_customer_styles.css">
    <style>
        .methods{grid-template-columns:5fr 13fr;min-height:530px;height:auto;}
        .main_container{border:1px solid black;display:grid;grid-template-columns:2fr 2fr 1fr;padding:5px;grid-gap:5px;grid-template-rows:repeat(37, 1fr);margin-left:30px;margin-right:30px;background-color:#999;}
        .products{border:1px solid black;background-color:#ccc;}
        .description{border:1px solid black;background-color:#aaa;line-height:1.5em;padding:5px;}
        .choose{border:1px solid black;background-color:#ccc;padding:5px;display:flex;flex-direction:column;font-weight:bold;}
        .img{max-width:65%;margin:5px auto;display:block;}
        .choose>label{margin:10px auto;}
        .choose>a{text-decoration:none;color:blue;}
        .choose>a:hover{text-decoration:underline;color:rgb(62, 62, 233);}
        .choose input[type="number"]{width:70%;margin:10px auto;}
    </style>
     <script>
    function logout(){
        window.location.href = "../../../main/logout.php";
    }

    function profile(){
        window.location.href = "../../customerprofile.php";
    }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo'])){
        header("location:../../../main/index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../../customer_orders/vista_pedido.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Nuevo pedido</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>NUEVO PEDIDO</h2>
                <p>Encontrarás un listado a la mano derecha con los productos que ofrecemos, una breve descripción y la capacidad de escoger la cantidad que requieras.</p>
                <br>
                <h3 id="main_form_button" >Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
                <form action="new_order_controller.php" method="POST">
                    <input type="submit" value="Agregar al carrito" name="add_to_cart" style="margin-top:30px;margin-left:15px;width:200px;height:40px;background-color:#a1ca4f;box-shadow:3px 3px 20px 5px black;font-weight:bold;font-size:1.2em;">
                    <input type="reset" value="Reiniciar las ordenes seleccionadas" style="margin-top:30px;margin-left:15px;width:320px;height:40px;background-color:#a1ca4f;box-shadow:3px 3px 20px 5px black;font-weight:bold;font-size:1em;">
            </div>
            <div class="main_container">
                <div class="products">
                    <img class="img" src="../../../imagenes/img9.jpg">
                </div>
                <div class="description">
                    <h3>Cargador CM-109</h3>
                    <br>
                    <p><b>USB-C</b><br><b>Potencia:</b> 18W<br>1 puerto USB tipo C<br><b>Temperatura de trabajo:</b> -10°C-50°C</p>
                    <p><b>Precio: </b>$9500</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img10.jpg">
                </div>
                <div class="description">
                    <h3>Cargador CM-110</h3>
                    <br>   
                    <p>Entrada de 100-240v a una frecuencia de 50Hz o 60Hz<br>Salida de 2.4A a 5v<br>1 puerto USB<br><b>Temperatura de trabajo</b>:-10°C-50°C</p>
                    <p><b>Precio: </b>$4500</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check2">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant2">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img11.jpg">
                </div>
                <div class="description">
                    <h3>Cargador CM-103</h3>
                    <br>
                    <p><b>Entrada:</b> 100-240v, 50-60Hz<br><b>Salida:</b>2.4A 5v DC<br>2puertos USB<br>Función carga rápida sin mensajes<br><b>Temperatura de trabajo:</b>-10°C-50°C</p>
                    <p><b>Precio: </b>$6000</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img6.jpg">
                </div>
                <div class="description">
                    <h3>Cargador QCM-255</h3>
                    <br>
                    <p><b>Entrada: </b>100-240v, 50-60Hz<br><b>Salida: </b>3.1A 5v DC<br>1puerto USB<br>Función carga rápida<br>Función mototurbo<br>Función Xiaomi Rápida y Super carga rápida<br><b>Temperatura de trabajo: </b>-10°C-50°C</p>
                    <p><b>Precio: </b>$7500</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img12.jpg">
                </div>
                <div class="description">
                    <h3>Cargador QCM-251</h3>
                    <br>
                    <p><b>Entrada: </b> 100-240v, 50-60Hz<br><b>Salida: </b>3.4A 5v DC<br>1 puerto USB<br>Función carga rápida<br>Función mototurbo<br>Función Xiaomi rápida<br><b>Temperatura de trabajo: </b>-10°C-50°C</p>
                    <p><b>Precio: </b>$10200</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img13.jpg">
                </div>
                <div class="description">
                    <h3>Cargador QCM-256</h3>
                    <br>
                    <p><b>Entrada: </b>100-240v, 50-60Hz<br><b>Salida: </b>3.1A 5v DC<br>1 puerto USB<br>Función carga rápida<br>Función mototurbo<br>Función Xiaomi rápida<br><b>Temperatura de trabajo: </b>-10°C-50°C</p>
                    <p><b>Precio: </b>$8500</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img14.jpg">
                </div>
                <div class="description">
                    <h3>Cargador QCM-257</h3>
                    <br>
                    <p><b>Entrada: </b>100-240v, 50-60Hz<br><b>Salida: </b>4.1A 5v DC<br>1 puerto USB<br>Función carga rápida<br>Función mototurbo<br>Función Xiaomi rápida<br><b>Temperatura de trabajo: </b>-10°C-50°C</p>
                    <p><b>Precio: </b>$5200</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img15.jpg">
                </div>
                <div class="description">
                    <h3>Cargador QCM-260</h3>
                    <br>
                    <p id="anc9"><b>QCM-260</b><br><b>Entrada: </b>100-240v, 50-60Hz<br><b>Salida: </b>3.1A 5v DC<br>1 puerto USB<br>Función carga rápida<br>Función mototurbo<br>Función Xiaomi rápida<br><b>Temperatura de trabajo: </b>-10°C-50°C</p>
                    <p><b>Precio: </b>$9000</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img2.jpg">
                </div>
                <div class="description">
                    <h3>Cargador QCM-261</h3>
                    <br>
                    <p><b>Entrada: </b>100-240v, 50-60Hz<br><b>Salida: </b>3A 5v DC<br>1 puerto USB<br>Función Súper carga rápida<br><b>Temperatura de trabajo: </b>-10°C-50°C</p>
                    <p><b>Precio: </b>$8500</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img16.jpg">
                </div>
                <div class="description">
                    <h3>Powerbank YP-701</h3>
                    <br>
                    <p><b>8000 mAh</b><br>Pantalla LCD<br>1 puerto USB<br>Entrada tipo iphone<br>Entrada de v8</p>
                    <p><b>Precio: </b>$28000</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img17.jpg">
                </div>
                <div class="description">
                    <h3>Powerbank YP-702</h3>
                    <br>
                    <p><b>12000 mAh</b><br>Pantalla LCD<br>1 puerto USB<br>Entrada tipo iphone<br>Entrada de v8<br>Entrada tipo C</p>
                    <p><b>Precio: </b>$35000</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img19.jpg">
                </div>
                <div class="description">
                    <h3>Powerbank YP-707</h3>
                    <br>
                    <p><b>10000 mAh</b><br>Pantalla LCD<br>2 puertos USB<br>Entrada tipo C</p>
                    <p><b>Precio: </b>$40000</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img20.jpg">
                </div>
                <div class="description">
                    <h3>Powerbank YP-709</h3>
                    <br>
                    <p><b>10000 mAh</b><br>1 puerto USB<br>Entrada tipo c<br>Entrada de v8</p>
                    <p><b>Precio: </b>$45000</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img8.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-401</h3>
                    <br>
                    <p><b>Salida: </b>3.1A (Max)<br>1 metro<br>Recubierto en TPE<br>Función Carga rápida<br>Transferencia de datos<br><b>Iphone, TC, V8</b></p>
                    <p><b>Precio: </b>$4200</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img21.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-406</h3>
                    <br>
                    <p><b>Salida: </b>3.1A (Max)<br>1 metro<br>Recubierto en cordón<br>Función Carga rápida<br>Transferencia de datos<br><b>Iphone, TC, V8</b></p>
                    <p><b>Precio: </b>$4600</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img22.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-409</h3>
                    <br>
                    <p><b>Salida: </b>3.1A (Max)<br>1 metro<br>Recubierto en nilon<br>Función Carga rápida<br>Transferencia de datos<br>Indicador LED de carga<br><b>Iphone, TC</b></p>
                    <p><b>Precio: </b>$5000</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img23.jpg">
                </div>
                <div class="description">
                    <h3>Cable sc-410</h3>
                    <br>
                    <p>><b>Salida: </b>3.1A (Max)<br>1 metro<br>Recubierto en cordón<br>Función Carga rápida<br>Transferencia de datos<br><b>Iphone, TC, V(</b></p>
                    <p><b>Precio: </b>$4000/p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img24.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-415</h3>
                    <br>
                    <p><b>Salida: </b>3.1A (Max)<br>1 metro<br>Recubierto en silicón anti-anudado<br>Función Carga rápida<br>Transferencia de datos<br><b>Iphone, TC, V8</b></p>
                    <p><b>Precio: </b>$4500</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img25.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-417</h3>
                    <br>
                    <p><b>Salida: </b>3.4A (Max)<br>1.2 metros<br>Recubierto en nilon<br>Función Carga rápida<br>Transferencia de datos<br><b>3 en 1 anti-anudado</b></p>
                    <p><b>Precio: </b>$5000</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.html#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img26.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-419</h3>
                    <br>
                    <p><b>Salida: </b>3.4A (Max)<br>2 metros<br>Recubierto en cordón<br>Función Carga rápida<br>Transferencia de datos<br><b>Iphone, TC, V8</b></p>
                    <p><b>Precio: </b>$6200</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img27.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-420</h3>
                    <br>
                    <p><b>Salida: </b>3.4A (Max)<br>1 metro<br>Recubierto en nilon<br>Función Carga rápida<br>Transferencia de datos<br>Indicador LED de carga<br><b>TC, V8</b></p>
                    <p><b>Precio: </b>$5400</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img28.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-421</h3>
                    <br>
                    <p><b>Salida: </b>3.4A (Max)<br>1 metro<br>Recubierto en TPE<br>Función Carga rápida<br>Transferencia de datos<br><b>Iphone, V8</b></p>
                    <p><b>Precio: </b>$4500</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img29.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-423</h3>
                    <br>
                    <p><b>Salida: </b>3.4A (Max)<br>1.2 metros<br>Recubierto en nilon<br>Función Carga rápida<br>Transferencia de datos<br>Indicador LED de carga<br><b>3 en 1 anti-anudado</b></p>
                    <p><b>Precio: </b>$4900</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>


                <div class="products">
                    <img class="img" src="../../../imagenes/img4.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-425</h3>
                    <br>
                    <p><b>Salida: </b>3.1A (Max)<br>1 metro<br>Recubierto en TPE<br>Función Carga rápida<br>Transferencia de datos<br><b>Iphone, TC, V8</b></p>
                    <p><b>Precio: </b>$5400</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>

                
                <div class="products">
                    <img class="img" src="../../../imagenes/img30.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-426</h3>
                    <br>
                    <p>1 metro<br>Recubierto en TPE<br>Función Carga rápida para Iphone<br>Conexión de Iphone a tipo C</p>
                    <p><b>Precio: </b>$5950</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>

                
                <div class="products">
                    <img class="img" src="../../../imagenes/img31.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-427</h3>
                    <br>
                    <p>1 metro<br>Recubierto en TPE<br>Función Carga rápida<br><b>Puerto USB a Iphone</b></p>
                    <p><b>Precio: </b>$4500</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>

                
                <div class="products">
                    <img class="img" src="../../../imagenes/img32.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-428</h3>
                    <br>
                    <p><b>Salida: </b>5A 3.6v (Max)<br>1 metro<br>Recubierto en cordón<br>Función Carga rápida para Iphone<br>Transferencia de datos<br><b>Tipo C a Iphone</b></p>
                    <p><b>Precio: </b>$5000</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>

                
                <div class="products">
                    <img class="img" src="../../../imagenes/img33.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-429</h3>
                    <br>
                    <p><b>Salida: </b>5A 3v(Max)<br>1 metro<br>Recubierto en cordón<br>Función Carga rápida<br>Transferencia de datos<br><b>Tipo C a tipo C</b></p>
                    <p><b>Precio: </b>$4250</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div>    


                <div class="products">
                    <img class="img" src="../../../imagenes/img34.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-430</h3>
                    <br>
                    <p><b>Salida: </b>3.4A (Max)<br>1 metro<br>Recubierto en silicón<br>Función Carga rápida<br>Transferencia de datos<br><b>V8, TC</b></p>
                    <p><b>Precio: </b>$6200</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div> 


                <div class="products">
                    <img class="img" src="../../../imagenes/img35.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-431</h3>
                    <br>
                    <p><b>Salida: </b>5A (Max)<br>1 metro<br>Recubierto en TPE<br>Función Carga rápida<br>Transferencia de datos<br><b>Iphone, V8, TC</b></p>
                    <p><b>Precio: </b>$6500</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div> 


                <div class="products">
                    <img class="img" src="../../../imagenes/img36.jpg">
                </div>
                <div class="description">
                    <h3>Cable SC-432</h3>
                    <br>
                    <p><b>Salida: </b>5A (Max)<br>2 metro<br>Recubierto en TPE<br>Función Carga rápida<br>Transferencia de datos<br><b>V8, TC</b></p>
                    <p><b>Precio: </b>$6500</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div> 


                <div class="products">
                    <img class="img" src="../../../imagenes/img37.jpg">
                </div>
                <div class="description">
                    <h3>Auriculares EH-510</h3>
                    <br>
                    <p>Auriculares de <b>70 cm</b> tipo earpods</p>
                    <p><b>Precio: </b>$5300</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div> 


                <div class="products">
                    <img class="img" src="../../../imagenes/img38.jpg">
                </div>
                <div class="description">
                    <h3>Auriculares EH-511</h3>
                    <br>
                    <p>Auriculares de <b>80 cm</b><br>Cabeza en TPE<br><b>Supér bajo</b></p>
                    <p><b>Precio: </b>$5800</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div> 


                <div class="products">
                    <img class="img" src="../../../imagenes/img39.jpg">
                </div>
                <div class="description">
                    <h3>Auriculares EH-512</h3>
                    <br>
                    <p>Auriculares de <b>100 cm</b><br>Hecho de un derivado de poliestireno<br><b>Conecotr universal</b></p>
                    <p><b>Precio: </b>$6200</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div> 


                <div class="products">
                    <img class="img" src="../../../imagenes/img40.jpg">
                </div>
                <div class="description">
                    <h3>Airpod TWS-1302</h3>
                    <br>
                    <p>Airpod por <b>unidad</b><br>Portabilidad y confiabilidad<br><b>6 horas</b> de duración<br>Base de carga en acero recubierto de TPE</p>
                    <p><b>Precio: </b>$22000/p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div> 


                <div class="products">
                    <img class="img" src="../../../imagenes/img5.jpg">
                </div>
                <div class="description">
                    <h3>Airpods TWS-1303</h3>
                    <br>
                    <p>Par de airpods<br>Batería de alta duración<br>Hasta <b>8 horas</b> de uso continuo<br>8 horas de uso interrumpido<br>Base de carga en titanio</p>
                    <p><b>Precio: </b>$65000</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div> 


                <div class="products">
                    <img class="img" src="../../../imagenes/img41.jpg">
                </div>
                <div class="description">
                    <h3>Airpods TWS-1304</h3>
                    <br>
                    <p>Par de airpods<br>Base en TPE<br><b>6 horas</b> de uso continuo</p>
                    <p><b>Precio: </b>$45000</p>
                </div>
                <div class="choose">
                    <label>¿Quieres este producto?</label>
                    <input type="checkbox" name="check1">
                    <label>¿Cuántos quieres?</label>
                    <input type="number" name="cant1">
                    <label>¿Terminaste?</label><a href="vista_new_order.php#main_form_button">Vuelve para agregar al carrito</a>
                </div> 
            </div>
            </form>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>