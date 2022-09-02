<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Historial de transacciones</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../customer_styles.css">
    <link rel="stylesheet" href="../../new_customer_styles.css">
    <style>
        .transaction_form{height:auto;min-height:530px;width:60%;margin:30px auto;display:flex;flex-direction:column;justify-content:space-evenly;align-items:center;font-weight:bold;padding:15px;background-color:#ccc;box-shadow:5px 5px 20px 5px #333;}
        .transaction_form label{font-size:2em;margin:10px;}
        .transaction_form input[type="date"]{width:60%;height:40px;font-size:1em;text-align:center;border-radius:10px;font-size:1.5em;}
        .transaction_form input[type="submit"]{height:40px;width:50%;border:1px solid black;font-size:1.5em;background-color:#74a118;font-weight:bold;box-shadow:3px 3px 10px 3px #333;}
        .transaction_form input[type="submit"]:hover{background-color:#a1ca4f;}
        .transaction_form input[type="submit"]:active{background-color:black;color:white;}
    </style>
    <script>
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
            <a href='../vista_balance.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Transacciones</h1>

            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>HISTORIAL DE TRANSACCIONES</h2>
                <br>
                <p>En esta interfaz se te solicitan 2 fechas para delimitar el intervalo de transacciones a consultar. Se deben ingresar las 2 fechas</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <form action="transaction_controller.php" method="GET">
                <div class="transaction_form">
                    <label>Fecha de inicio</label>
                    <input type="date" name="date1" required>
                    <label>Fecha final</label>
                    <input type="date" name="date2" value="" required>
                    <input type="submit" name="send" value="Consultar">
                </div>
            </form>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>