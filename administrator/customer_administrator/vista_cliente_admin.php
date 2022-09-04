<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Clientes</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../administrator_styles.css">
    <link rel="stylesheet" href="../new_admin_styles.css">
    <style>
        .methods{min-height:530px;height:auto;}
        .customer_admin_function{display:grid;grid-template-columns:repeat(2, 1fr);grid-template-rows:150px 1fr 1fr;}
        .search_field{grid-column-start:1;grid-column-end:3;background-color:aquamarine;}
        .subcont1{margin:50px auto;width:50%;display:flex;flex-direction:row;justify-content:space-between;align-items:center;}
        .field{border:1px solid black;width:65%;height:50px;text-align:center;font-size:2em;box-shadow:5px 5px 10px 5px #555;}
        .field:focus{border:3px dotted black;}
        .button_form{width:45px;height:45px;border-radius:50px;font-size:1.5em;background-color:#a1ca4f;box-shadow:5px 5px 10px #666;}
        .button_form:hover{background-color:#86b32e;}
        .button_div1{background-color:lightgoldenrodyellow;grid-column-start:1;grid-column-end:3;}
    </style>
             <script>
        function profile(){
            window.location.href = "../adminprofile.php";
        }

        function logout(){
            window.location.href = "../../main/logout.php";
        }

        function toCreate(){
            window.location.href = "customer_creation/vista_creacion_cliente.php";
        }

        function toModify(){
            window.location.href = "customer_edition/vista_edicion_cliente.php";
        }

        function customerList(){
            window.location.href = "customer_list/vista_listado_cliente.php";
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
            <a href='../vista_administrador.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Clientes</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>CLIENTES</h2>
                <br>
                <p>En esta interfaz podrás agregar un cliente. consultar los clientes existentes y editar la información no sensible de los mismos.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="customer_admin_function">
                <form class="search_field" action="customer_admin_controller.php" method="GET">
                    <div class="subcont1">
                    <input class="field" type="search" name="search" placeholder="Buscar un cliente">
                    <input class="button_form" type="submit" name="search_button" value="&#128269">
                    </div>
                </form>
                <div class="button1"><input class="button" type="button" onClick="toCreate()" value="Crear un cliente"></div>
                <div class="button2"><input class="button" type="button" onClick="toModify()" value="Editar un cliente"></div>
                <div class="button_div1">
                    <div class="button10"><input class="button" type="button" onClick="customerList()" value="Listado de clientes"></div>
                </div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>