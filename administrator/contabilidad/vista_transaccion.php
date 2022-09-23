<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Contabilidad</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../administrator_styles.css">
    <link rel="stylesheet" href="../new_admin_styles.css">
    <style>
        .transaction_function{display:grid;grid-template-rows:repeat(4, 1fr);background-color:#bbb;box-shadow:5px 5px 20px 5px #333;}
        .subcont1{display:flex;flex-direction:row;align-items:center;}
        .field{margin:50px auto;width:40%;height:50px;text-align:center;font-size:2em;box-shadow:5px 5px 15px 5px #888;border-radius:15px;}
        .field:focus{outline:2px solid #333;}
        .button_form{margin:50px auto;width:45px;height:45px;border-radius:50%;background-color:#a1ca4f;box-shadow:3px 3px 10px 3px #666;}
        .button_form:hover{background-color:#74a118;}
        .button_form:active{background-color:black;color:white;}
    </style>
    <script>
        function profile(){
            window.location.href = "../adminprofile.php";
        }

        function logout(){
            window.location.href = "../../main/logout.php";
        }

        function newExpense(){
            window.location.href = "new_expense/vista_nuevo_gasto.php";
        }

        function newCharge(){
            window.location.href = "new_charge/vista_nuevo_cobro.php";
        }

        function transactionList(){
            window.location.href = "transaction_list/vista_reporte_transacciones.php";
        }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../main/index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_administrador.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Contabilidad</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>TRANSACCIONES</h2>
                <br>
                <p>En esta interfaz podrás ingresar nuevos gastos, nuevos cobros, obtener un reporte completo de las transacciones en general o un reporte específico de un cliente.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="transaction_function">
                <div class="button10"><input class="button" type="button" onClick="newExpense()" value="Ingresar un gasto"></div>
                <div class="button20"><input class="button" type="button" onClick="newCharge()" value="Ingresar un cobro"></div>
                <div class="button30"><input class="button" type="button" onClick="transactionList()" value="Reporte de transacciones"></div>
                <form class="search_field" action="transaction_controller.php" method="GET">
                    <div class="subcont1">
                    <input class="field" type="search" name="search" placeholder="Buscar un cliente">
                    <input class="button_form" type="submit" name="search_button" value="&#128269">
                    </div>
                </form>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>