<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Inventario</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../administrator_styles.css">
    <link rel="stylesheet" href="../new_admin_styles.css">
    <style>
        .form_inventory{display:grid;grid-template-columns:3fr 2fr;padding:10px;background-color:#bbb;box-shadow:5px 5px 20px 5px #333;}
        .stock_date, .inventory_dates{display:flex;flex-direction:column;align-items:center;padding:10px;font-size:1.5em;}
        .inventory_table{border:1px solid black;width:80%;text-align:center;margin:20px auto;font-size:0.80em;background-color:#999;}
        .field{border:2px solid black;}
        .header{font-weight:bold;background-color:#a1ca4f;border:2px solid black;}
        label{font-weight:bold;margin:10px;}
        input[type="date"], input[type="text"]{width:60%;height:25px;text-align:center;margin:15px;}
        input[type="submit"]{background-color:#a1ca4f;width:40%;height:25px;font-weight:bold;margin:20px;box-shadow:3px 3px 10px 3px #333;}
        input[type="submit"]:hover{background-color:#74a118;}
        input[type="submit"]:active{background-color:black;color:white;}
    </style>
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
            <h1>Inventario</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>INVENTARIO</h2>
                <br>
                <p>En esta interfaz se presenta un listado con las fechas de los inventarios realizados, al escoger una fecha, obtendrás un listado con todos los productos y sus existencias para ese día.<br>Tambien podrás ver un inventario actualizado a día de hoy o hasta el día deseado.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="function_inventory">    
                <form class="form_inventory" action="stock_controller.php" method="POST"> 
                <div class="inventory_dates">
                    <h3 class="subtitle">Inventarios</h3>
                    <label>Ingresar nuevo inventario</label>
                    <input type="date" name="date1">
                    <label>Encargado</label>
                    <input type="text" name="encargado" placeholder="Nombre de quien realiza el inventario">
                    <label>Supervisor</label>
                    <input type="text" name="supervisor" placeholder="Nombre de quien supervisa">
                    <table class="inventory_table">
                        <tr>
                           <td class="header">N°</td> 
                           <td class="header">Fecha</td> 
                           <td class="header">Encargado</td>
                           <td class="header">Supervisor</td>
                        </tr>
                        <tr>
                            <td class="field">1</td> 
                            <td class="field">05-07-2021</td> 
                            <td class="field">Marta Bulevar</td>
                            <td class="field">Juan Moreno</td>
                        </tr>
                    </table>

                </div>
                <div class="stock_date">
                    <h3>Obtener inventario</h3>
                    <input type="date" name="date2"><br><br><br>
                    <h3 class="subtitle">Existencias</h3>
                    <label>Fecha de existencias</label>
                    <input type="date" name="date3">
                    <input type="submit" name="send" value="Consultar">
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