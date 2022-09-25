<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Creación empleados</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .creation_form{width:80%;margin:10px auto;background-color:#aaa;display:flex;flex-direction:column;padding:10px;font-size:1.2rem;align-items:center;font-weight:bold;box-shadow:5px 5px 20px 5px #333;}
        .creation_form input[type="text"], input[type="email"]{width:60%;margin:10px;text-align:center;font-size:1rem;border-radius:15px;}
        .creation_form input[type="submit"]{width:40%;margin:10px;background-color:#85b427;font-weight:bold;height:30px;font-size:1em;box-shadow:3px 3px 10px 3px #333;border-radius:15px;}
        .creation_form input[type="submit"]:hover{background-color:#a1ca4f;}
        .creation_form input[type="submit"]:active{background-color:black;color:white;}
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
        header("location:../../../index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_empleados.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Creación de empleados</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>CREACIÓN DE EMPLEADOS</h2>
                <br>
                <p>En esta interfaz deberás ingresar la información solicitada para la creación de un empleado.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <form class="creation_form" action="coworker_creation_controller.php" method="POST">
                    <label>Cédula*</label>
                    <input type="text" name="id" placeholder="Ingresa el número de documento" >
                    <label>Nombres*</label>
                    <input type="text" name="name" placeholder="Ingresa los nombres del empleado" >
                    <label>Apellidos*</label>
                    <input type="text" name="lastname" placeholder="Ingresa el primer apellido">
                    <label>Email*</label>
                    <input type="email" name="email" placeholder="Ingresa el correo electrónico" >
                    <label>Celular*</label>
                    <input type="text" name="cellphone" placeholder="Ingresa el número de celular" >
                    <label>Cargo*</label>
                    <input type="text" name="cargo" placeholder="Ingrese el cargo asignado" >
                    <label>Labores desempeñadas*</label>
                    <input type="text" name="labores" placeholder="Labor1//Labor2//Labor3" >
                    <label>Contraseña*</label>
                    <input type="text" name="password1" placeholder="Ingrese una contraseña" >
                    <label>Verificar contraseña*</label>
                    <input type="text" name="password2" placeholder="Verifica la contraseña" >
                    <input type="submit" name="send" value="Crear">
                </form>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>