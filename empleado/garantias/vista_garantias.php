<?php
include("../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Garantías</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../main/estilos.css'/>
    <link rel='icon' href='../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../colaborador.css">
    <style>
        .main_form{height:400px;width:80%;margin:10px auto;display:flex;flex-direction:column;align-items:center;justify-content:space-evenly;font-size:1.6em;font-weight:bold;background-color:#bbb;box-shadow:5px 5px 20px 5px #333;}
        input[type="number"]{width:60%;text-align:center;font-size:0.9em;border-radius:15px;}   
        select{width:60%;font-size:0.9em;text-align:center;border-radius:15px;}   
        input[type="submit"]{background-color:#85b427;width:45%;font-size:0.9em;font-weight:bold;border-radius:15px;box-shadow:3px 3px 10px 3px #333;padding:5px;}
        input[type="submit"]:hover{background-color:#a1ca4f;}
        input[type="submit"]:active{background-color:black;color:white}       
    </style>
    <script>
        function profile(){
            window.location.href = "../coworkerprofile.php";
        }

        function logout(){
            window.location.href = "../../main/logout.php";
        }
    </script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'empleado'){
        header("location:../../main/index.html");
    }

    $sql1 = "SELECT codProducto FROM producto";
    $query1 = mysqli_query($connection, $sql1);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_empleado.php'><img id='img1' src='../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Garantías</h1>
            <div class="profile">
                <img id="profile_image" src="../../imagenes/profile.png" alt="Imagen de perfil">.
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3><?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesión" onClick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>GARANTÍAS</h2>
                <br>
                <p>En esta interfaz podrás reportar productos por garantía</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <form class="main_form" action="garantias_controller.php" method="POST">
                    <label>Producto</label>
                    <select name="product">
                        <option value="0">----------------</option>
                        <?php
                            while($r = $query1->fetch_assoc()){
                                $cod = $r['codProducto'];
                                echo "
                                <option name='$cod'>$cod</option>
                                ";
                            }
                        ?>
                    </select>
                    <label>Cantidad</label>
                    <input type="number" name="cant" placeholder="Ingrese la cantidad" required>
                    <input type="submit" name="send" value="Reportar">
                </form>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
<?php
$connection->close();
$adminconnection->close();
?>