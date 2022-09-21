<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Transacciones</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .new_transaction_list{background-color:#bbb;box-shadow:5px 5px 15px 5px #888;display:flex;flex-direction:column;justify-content:space-evenly;}
        .transaction_form{display:flex;flex-direction:column;padding:15px;text-align:center;font-size:2em;font-weight:bold;align-items:center;justify-content:space_between;}
        .transaction_form input[type="date"]{width:60%;margin:15px;height:60px;text-align:center;font-size:1em;border-radius:15px;}
        .transaction_form input[type="date"]:focus{outline:3px dotted black;}
        .expense_button{display:block;width:40%;height:50px;margin:15px;font-size:1em;font-weight:bold;background-color:#85b427;box-shadow:5px 5px 15px 5px #333;border-radius:15px;}
        .expense_button:hover{background-color:#a1ca4f;}
        .expense_button:active{background-color:black;color:white;}
    </style>
           <script>
        function profile(){
            window.location.href = "../../adminprofile.php";
        }

        function logout(){
            window.location.href = "../../../main/logout.php";
        }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../main/index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_transaccion.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Reporte de transacciones</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerra sesión" onClick="logout()">
            </div>
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>REPORTE DE TRANSACCIONES</h2>
                <br>
                <p>Ingrese las 2 fechas solicitadas en el formulario para obtener un listado con todas las transacciones hechas.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="new_transaction_list">
                <form class="transaction_form" action="transaction_list_controller.php" method="POST">
                    <label>Fecha de inicio</label>
                    <input type="date" name="date1" placeholder="Ingrese la primera fecha" required>
                    <label>Fecha de fin</label>
                    <input type="date" name="date2" placeholder="Ingrese la segunda fecha" required>
                    <input class="expense_button" type="submit" name="send" value="Obtener reporte">
                </form>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>