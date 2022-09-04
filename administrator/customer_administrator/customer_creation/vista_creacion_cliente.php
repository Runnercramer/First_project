<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Creación de clientes</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .customer_creation{width:70%;margin:10px auto;border:1px solid black;background-color:#ccc;display:flex;flex-direction:column;text-align:center;box-shadow:5px 5px 20px 5px #555;padding:10px;font-size:1.2em;font-weight:bold;}
        .customer_creation input[type="text"], input[type="email"]{width:60%;margin:5px auto;height:25px;text-align:center;}
        .customer_creation select{width:65%;margin:5px auto;height:25px;text-align:center;}
        .customer_creation input[type="submit"]{width:50%;margin:10px auto;padding:5px;background-color:#a1ca4f;font-size:1.2em;font-weight:bold;box-shadow:3px 3px 10px #222;}
        .customer_creation input[type="submit"]:hover{background-color:#74a118}
        .customer_creation input[type="submit"]:active{background-color:black;color:white;}
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
            <h1>Creación de cliente</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>CREACIÓN DE CLIENTES</h2>
                <br>
                <p>Aquí deberás diligenciar le formulario con la información solicitada para crear un nuevo cliente. <br><b>Cuidado: </b>El cliente debe validar la información ingresada desde su correo electrónico.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <form  class="customer_creation" action="customer_creation_controller.php" method="POST" class="main_form">
                    <label>Nombres</label>
                    <input type="text" name="name" placeholder="Ingrese los nombres del usuario" required>
                    <label>Apellidos</label>
                    <input type="text" name="lastname" placeholder="Ingresa los apellidos" required>
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Ingresa el correo del usuario" required>
                    <label>Celular</label>
                    <input type="text" name="tel" placeholder="Ingresa el número de celular" required>
                    <label>Tipo de identificación</label>
                    <select name="id_type">
                        <option value="0">------------------------------------------</option>
                        <option value="cc">Cédula de ciudadanía</option>
                        <option value="nit">NIT</option>
                        <option value="ce">Cédula de extranjería</option>
                    </select>
                    <label>Número de identificación</label>
                    <input type="text" name="id" placeholder="Ingresa el número de identificación" required>
                    <label>Departamento</label>
                    <input type="text" name="department" placeholder="Ingresa el departamento de residencia" required>
                    <label>Ciudad</label>
                    <input type="text" name="city" placeholder="Ingresa la ciudad de residencia" required>
                    <label>Dirección</label>
                    <input type="text" name="direction" placeholder="Ingresa la dirección de residencia" required>
                    <label>Contraseña</label>
                    <input type="text" name="password1" placeholder="Ingrese una contraseña" required>
                    <label>Confirme la contraseña</label>
                    <input type="text" name="password2" placeholder="Ingrese de nuevo la contraseña" required>
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