<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Balance</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../customer_styles.css">
    <link rel="stylesheet" href="../new_customer_styles.css">
    <script>
    function logout(){
        window.location.href = "../../main/logout.php";
    }

    function transactions(){
        window.location.href = "transactions/vista_transaccion.php";
    }

    function payments(){
        window.location.href = "payments/vista_pagos.php";
    }

    function profile(){
        window.location.href = "../customerprofile.php";
    }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo'])){
        header("location:../../main/index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_cliente.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Balance</h1>
            
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']); ?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onClick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>TRANSACCIONES</h2>
                <br>
                <p>En esta interfaz puedes ver un historial de tus transacciones y podrás hacer pagos y abonos a tu cuenta</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="transaction_cont">
                <div class="button1"><input class="button" type="button" onClick="transactions()" value="Historial de transacciones"></div>
                <div class="button2"><input class="button" type="button" onClick="payments()" value="Pagos y abonos"></div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>