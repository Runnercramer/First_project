<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Edición empleados</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
            <!--Tengo que convertir este archivo en un .php para implementar un bucle que imprima justamente los empleados existentes-->
    <style>
        .main_edition_container{display:grid;grid-template-columns:repeat(2, 1fr);background-color:#ccc;text-align:center;padding:10px;}
        .main_subcontainer{background-color:#bbb;display:grid;grid-template-rows:50px 1fr 1fr 1fr;}
        .employee{background-color:#ddd;height:auto;min-height:180px;display:grid;grid-template-columns:1fr 2fr;align-items:center;}
        .function{background-color:#ddd;display:grid;grid-template-columns:1fr 1fr;}
        .profile_img{width:100px;border-radius:50%;}
        #profile1{width:100px; height:95px;}
        .function>div{display:flex;flex-direction:column;justify-content:space-evenly;text-align:left;margin:3px;}
        .function>div>input[type="text"]{margin:5px;}

    </style>
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
            <a href='../vista_empleados.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Edición de empleados</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>EDICIÓN DE EMPLEADOS</h2>
                <br>
                <p>En esta interfaz encontrarás un listado con los empleados, su información y la capacidad de cambiar la información de los mismos.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <form action="edicion_empleado_controller.php" method="POST">
            <div class="main_edition_container">
                <div class="main_subcontainer">
                    <h2>Datos de empleados</h2>
                    <div class="employee">
                        <div class="photo">
                            <img class="profile_img" src="../../../imagenes/profile1.png" alt="Profile image" id="profile1">
                        </div>
                        <div class="info" style="text-align:left;">
                            <p>Nombre:<br>Cargo:<br>Labores desempeñadas: <br>Tipo de usuario:</p>
                        </div>
                    </div>

                    <div class="employee">
                        <div class="photo">
                            <img class="profile_img" src="../../../imagenes/profile2.png" alt="Profile image">
                        </div>
                        <div class="info" style="text-align:left;">
                            <p>Nombre:<br>Cargo:<br>Labores desempeñadas: <br>Tipo de usuario:</p>
                        </div>
                    </div>

                    <div class="employee">
                        <div class="photo">

                        </div>    
                        <div class="info" style=text-align:left;>

                        </div>
                    </div>
                </div>
                <div class="main_subcontainer">
                    <h2>¿Quieres cambiar datos?</h2>
                    <div class="function">
                        <div><p>Cargo:</p><p>Labores desempeñadas:</p><p>Tipo de usuario:</p></div>
                        <div><input type="text" name="cargo" placeholder="Ingresa un nuevo cargo"><input type="text" name="labores" placeholder="Ingresa nuevas labores"><input type="text" name="usertype" placeholder="Ingresa un tipo de usuario"></div>
                    </div>
                    <div class="function">
                        <div><p>Cargo:</p><p>Labores desempeñadas:</p><p>Tipo de usuario:</p></div>
                        <div><input type="text" name="cargo" placeholder="Ingresa un nuevo cargo"><input type="text" name="labores" placeholder="Ingresa nuevas labores"><input type="text" name="usertype" placeholder="Ingresa un tipo de usuario"></div>
                    </div>
                    <div class="function">
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </form>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
