<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Nuevo gasto</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .new_expense{background-color:#bbb;box-shadow:5px 5px 15px 5px #888;}
        .expenses_form{display:flex;flex-direction:column;padding:15px;text-align:center;font-size:2em;font-weight:bold;align-items:center;}
        .expenses_form input[type="text"], input[type="number"]{width:60%;margin:10px;height:40px;text-align:center;font-size:1em;border-radius:15px;}
        .expenses_form input[type="text"]:focus, input[type="number"]:focus{outline:3px dotted black;}
        .expense_button{display:block;width:40%;height:45px;margin:15px;font-size:1em;font-weight:bold;background-color:#85b427;box-shadow:5px 5px 15px 5px #333;border-radius:15px;}
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
            <h1>Ingreso de gastos</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>NUEVO GASTO</h2>
                <br>
                <p>Ingresa los datos solictados en el formulario para registrar un nuevo gasto.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="new_expense">
                <form class="expenses_form" action="new_expense_controller.php" method="POST">
                    <label class="text">Código Administrador</label>
                    <input type="number" name="idadmin" placeholder="Ingrese el código del administrador" required>
                    <label class="text">Valor del gasto</label>
                    <input type="text" name="price" placeholder="Ingrese el valor de la transacción" required>
                    <label class="text">Responsable del gasto</label>
                    <input type="number" name="idcoworker" placeholder="Ingrese el código del empleado" required>
                    <label class="text">Descripción</label>
                    <input type="text" name="description" placeholder="Por concepto de...">
                    <input class="expense_button" type="submit" name="send" value="Crear">
                </form>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>