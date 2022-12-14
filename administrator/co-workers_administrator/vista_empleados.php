<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Empleados</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../administrator_styles.css">
    <link rel="stylesheet" href="../new_admin_styles.css">
    <style>
        .function_container{display:grid;grid-template-columns:1fr 1fr;grid-template-rows:1fr 1fr;align-items:center;justify-content:center;}
        .button{width:70%;height:80px;}
    </style>
    <script>
    function logout(){
        window.location.href = "../../main/logout.php";
    }
    function profile(){
        window.location.href = "../adminprofile.php";
    }

    function report(){
        window.location.href="coworkers_list/vista_lista_empleado.php";
    }

    function toCreate(){
        window.location.href="coworkers_creation/vista_creacion_empleado.php";
    }

    function toUpdate(){
        window.location.href="coworkers_edition/vista_edicion_empleado.php";
    }

    function toEliminate(){
        window.location.href="coworkers_elimination/vista_eliminacion_empleado.php";
    }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_administrador.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Empleados</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesi??n" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>EMPLEADOS</h2>
                <br>
                <p>En esta interfaz podr??s obtener un listado con todos los empleados activos, modificar , crear o eliminar empleados.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="function_container">
                <div class="subcont1">
                    <input type="button" value="Listado empleados" class="button" onClick="report()">
                </div>
                <div class="subcont2">
                    <input type="button" class="button" value="Crear empleado" onClick="toCreate()">
                </div>
                <div class="subcont3">
                    <input type="button" class="button" value="Edici??n empleado" onClick="toUpdate()">
                </div>
                <div class="subcont4">
                    <input type="button" class="button" value="Eliminar empleado" onclick="toEliminate()">
                </div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Cont??ctanos<br>018000222222<br>L??nea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
