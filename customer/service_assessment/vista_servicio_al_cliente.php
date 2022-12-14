<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Servicio al cliente</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../customer_styles.css">
    <link rel="stylesheet" href="../new_customer_styles.css">
    <style>
        .methods{min-height:530px;height:auto;}
        .main_form{background-color:#ccc;width:60%;margin:20px auto;display:flex;flex-direction:column;padding:20px;box-shadow:10px 10px 20px 5px #aaa;}
        .main_form h3{font-size:1.8em;text-align:center;}
        .main_form label{font-size:1.4em;text-align:center;margin:5px;}
        .main_form select{width:70%;margin:5px auto;border-radius:15px;}
        .main_form input[type="text"], input[type="email"]{width:60%;height:3vh;margin:5px auto;text-align:center;border-radius:15px;}
        .main_form textarea{width:60%;height:15vh;margin:5px auto;padding:10px;border:1px solid black;text-align:center;}
        .main_form input[type="submit"]{width:50%;background-color:#a1ca4f;margin:20px auto;height:30px;font-weight:bold;font-size:1.2em;box-shadow:5px 5px 20px black;border-radius:10px;}
        .main_form input[type="submit"]:hover{background-color:#74a118;}
        .main_form input[type="submit"]:active{background-color:black;color:white;}
        select{text-align:center;}
    </style>
     <script>
    function logout(){
        window.location.href = "../../main/logout.php";
    }

    function profile(){
        window.location.href = "../customerprofile.php";
    }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'cliente'){
        header("location:../../index.html");
    }
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_cliente.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Servicio al cliente</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><b><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></b></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesi??n" onClick="logout()">
            </div>
        </header> 
        <section class="methods">
            <div class="information">
                <h2>Listado de pedidos</h2>
                <br>
                <p>Puedes radicar cualquier tipo de pregunta, queja, reclamo o sugerencia ingresando los datos solicitados en el formulario presentado a continuaci??n.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <form action="servicio_controller.php" method="POST">
            <div class="main_form">
                    <h3>Radicaci??n de PQRS</h3>
                    <label>Tipo de solicitud</label>
                    <select name="PQRS" required>
                        <option value="0">................</option>
                        <option value="question">Pregunta</option>
                        <option value="complain">Queja</option>
                        <option value="claim">Reclamo</option>
                        <option value="suggestion">Sugerencia</option>
                    </select>
                    <label>Documento del radicador</label>
                    <input type="text" name="id" placeholder="Ingresa tu n??mero de identificaci??n" required>
                    <label>Correo electr??nico</label>
                    <input type="email" name="email" placeholder="Ingresa tu correo" required>
                    <label>Celular</label>
                    <input type="text" name="cell" placeholder="Ingresa un n??mero celular de contacto" required>
                    <label>Solicitud</label>
                    <textarea name="request" placeholder="Ingresa tu solicitud" required></textarea>
                    <input type="submit" name="send" value="Radicar">
                </form>    
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Cont??ctanos<br>018000222222<br>L??nea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>