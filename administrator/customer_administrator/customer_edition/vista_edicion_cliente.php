<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Edición de clientes</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .methods{grid-template-columns:repeat(3, 1fr);}
        .current_data{background-color:#999;text-align:center;font-size:1.2em;font-weight:bold;box-shadow:3px 3px 10px #333;}
        .new_data{background-color:#999;text-align:center;font-size:1.2em;font-weight:bold;box-shadow:3px 3px 10px #333;}
        .datacont{display:flex;flex-direction:column;padding:15px;}
        .datacont input[type="text"], input[type="email"]{width:60%;margin:5px auto;text-align:center;}
        .datacont input[type="submit"]{width:40%;height:30px;margin:10px auto;font-weight:bold;background-color:#74a118;}
        .datacont input[type="submit"]:hover{background-color:#a1ca4f;}
        .datacont input[type="submit"]:active{background-color:black;color:white;}
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
    if(!isset($_SESSION['userinfo'])){
        header("location:../../../main/index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_cliente_admin.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Edición de clientes</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>EDICION DE CLIENTES</h2>
                <br>
                <p>Aquí deberás diligenciar los campos que se vayan a actualizar. Sólo necesitas ingresar los datos que se quieran cambiar, tanto los actuales como los nuevos.<br><b>CUIDADO: </b> Para editar un cliente, este debe confirmar los campos a través del correo.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="current_data">
                <form action="edit_cust_admin_controller.php" method="POST">
                <div class="datacont">
                    <h2>Datos actuales</h2>
                    <br>
                    <h4>Sólo ingresa los datos a actualizar</h4>
                    <br>
                    <label>Nombres</label>
                    <input type="text" name="name" placeholder="Ingrese los nombres del usuario">
                    <label>Primer Apellido</label>
                    <input type="text" name="lastname1" placeholder="Ingresa el primer apellido">
                    <label>Segundo Apellido</label>
                    <input type="text" name="lastname2" placeholder="Ingresa el segundo apellido">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Ingresa el correo del usuario"
                    <label>Celular</label>
                    <input type="text" name="tel" placeholder="Ingresa el número de celular">
                    <label>Número de identificación</label>
                    <input type="text" name="id" placeholder="Ingresa el número de identificación">
                    <label>Departamento</label>
                    <input type="text" name="department" placeholder="Ingresa el departamento de residencia">
                    <label>Ciudad</label>
                    <input type="text" name="city" placeholder="Ingresa la ciudad de residencia">
                    <label>Dirección</label>
                    <input type="text" name="direction" placeholder="Ingresa la dirección de residencia">
                    <label>Contraseña</label>
                    <input type="text" name="password1" placeholder="Ingrese una contraseña">
                    <label>Confirme la contraseña</label>
                    <input type="text" name="password2" placeholder="Ingrese de nuevo la contraseña">
               </div>
            </div>
            <div class="new_data">
                <div class="datacont">
                    <h2>Datos nuevos</h2>
                    <br>
                    <h4>Sólo ingresa los datos a actualizar</h4>
                    <br>
                    <label>Nombres</label>
                    <input type="text" name="name" placeholder="Ingrese los nombres del usuario">
                    <label>Primer Apellido</label>
                    <input type="text" name="lastname1" placeholder="Ingresa el primer apellido">
                    <label>Segundo Apellido</label>
                    <input type="text" name="lastname2" placeholder="Ingresa el segundo apellido">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Ingresa el correo del usuario"
                    <label>Celular</label>
                    <input type="text" name="tel" placeholder="Ingresa el número de celular">
                    <label>Número de identificación</label>
                    <input type="text" name="id" placeholder="Ingresa el número de identificación">
                    <label>Departamento</label>
                    <input type="text" name="department" placeholder="Ingresa el departamento de residencia">
                    <label>Ciudad</label>
                    <input type="text" name="city" placeholder="Ingresa la ciudad de residencia">
                    <label>Dirección</label>
                    <input type="text" name="direction" placeholder="Ingresa la dirección de residencia">
                    <label>Contraseña</label>
                    <input type="text" name="password1" placeholder="Ingrese una contraseña">
                    <label>Confirme la contraseña</label>
                    <input type="text" name="password2" placeholder="Ingrese de nuevo la contraseña">
                    <input type="submit" name="send" value="Cambiar datos">
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