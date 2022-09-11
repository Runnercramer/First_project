<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Listado de pedidos</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../customer_styles.css">
    <link rel="stylesheet" href="../../new_customer_styles.css">
    <style>
        .dates_form{width:60%;margin:0 auto;padding:20px 0;}
        .list_text{width:60%;font-size:3em;display:block;margin:10px auto;text-align:center;font-weight:bold;}
        .date{display:block;width:40%;font-size:2em;margin:10px auto;box-shadow:2px 2px 10px black;}
        .list_button{width:30%;display:block;margin:50px auto;font-size:1.5em;border:1px solid black;background-color:#85b427;padding:5px;box-shadow:5px 5px 20px 5px black;font-weight:bold;}
        .list_button:hover{background-color:#a1ca4f}
        .list_button:active{background-color:black;color:white}
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
            <a href='../vista_pedido.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Listado de pedidos</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>Listado de pedidos</h2>
                <br>
                <p>Seleccione una fecha de inicio y una fecha de fin para obtener un listado  de los pedidos realizados en el intervalo escogido.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="dates_form">
                <form action="orders_list_controller.php" method="GET">
                    <label class="list_text">Fecha de inicio</label>
                    <input class="date" type="date" name="date1" placeholder="Escoge la primera fecha" required>
                    <label class="list_text">Fecha de fin</label>
                    <input class="date" type="date" name="date2" placeholder="Escoge la segunda fecha" required>
                    <input class="list_button" type="submit" name="button" value="Consultar"> 
                </form>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>