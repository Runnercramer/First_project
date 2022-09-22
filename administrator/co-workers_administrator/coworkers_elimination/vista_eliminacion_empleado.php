<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Eliminación de empleados</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .main_form{display:flex;flex-direction:column;align-items:center;background-color:#bbb;width:80%;margin:10px auto;padding:15px; font-size:1.5em;font-weight:bold;box-shadow:5px 5px 20px 5px #333;}
        .main_form input[type="text"], input[type="email"]{width:60%;margin:10px;height:25px;text-align:center;border-radius:15px;}
        select{width:60%;margin:10px;height:25px;border-radius:15px;}
        .main_form input[type="submit"]{width:40%;background-color:#a3cf4b;margin:15px;height:30px;font-weight:bold;font-size:1em;box-shadow:3px 3px 10px 3px #333;border-radius:15px;}
        select{text-align:center;}
    </style>
           <script>
        function logout(){
            window.location.href = "../../../main/logout.php";
        }
        function profile(){
            window.location.href = "../../adminprofile.php";
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
            <a href='../vista_empleados.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Eliminación de empleados</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>ELIMINACIÓN DE EMPLEADOS</h2>
                <br>
                <p>En esta interfaz podrás eliminar un empleado.<br><b>Cuidado: </b>Esto no podrá revertirse.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <form class="main_form" action="elimination_controller.php" method="POST">
                    <label>Cédula empleado</label>
                    <input type="text" name="id" placeholder="Ingrese la cédula del empleado a eliminar" required>
                    <label>Correo electrónico</label>
                    <input type="email" name="email" placeholder="Ingrese el correo electrónico del empleado" required>
                    <label>Nombre empleado</label>
                    <input type="text" name="name" placeholder="Ingrese un nombre del empleado">
                    <label>Confirmación</label>
                    <select name="confirmation" required>
                        <option value="0">---------------------</option>
                        <option value="no">No</option>
                        <option value="si">Sí</option>
                    </select>
                    <input class='delete_button' type="submit" name="send" value="Eliminar" >
                </form>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
