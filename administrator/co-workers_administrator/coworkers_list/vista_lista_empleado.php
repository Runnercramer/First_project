<?php
include("../../../connection.php");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Listado empleados</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .main_table{background-color:#777;width:80%;text-align:center;font-weight:bold;margin:15px auto;}
        .header{background-color:#85b427;font-size:1.5em;border:1px solid black;}
        .field{background-color:#bbb;font-size:1.2em;border:1px solid black;}
        .pag{grid-column-start:1;grid-column-end:5;display:flex;flex-direction:row;align-items:center;justify-content:space-evenly;margin-top:30px;}
        .pag_button{background-color:beige;font-size:1.2em;font-weight:bold;padding:5px;box-shadow:3px 3px 10px 3px #333;color:black;}
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

    $sql1 = "SELECT * FROM usuario us JOIN empleado em ON us.idUsuario = em.idUsuario";
    $query1 = mysqli_query($adminconnection, $sql1);

    $tamaño_pagina = 5;
    if(isset($_GET['pagina'])){
        if($_GET['pagina'] == 1){
            header("location:/Vetex/administrator/co-workers_administrator/coworkers_list/vista_lista_empleado.php");
        }else{
            $pagina = $_GET['pagina'];
        }
    }else{
        $pagina = 1;
    }
    $empezar_desde = ($pagina - 1) * $tamaño_pagina;

    $num_filas = $query1->num_rows;

    $total_paginas = ceil($num_filas/$tamaño_pagina);

    $sql1_limite = "SELECT * FROM usuario us JOIN empleado em ON us.idUsuario = em.idUsuario LIMIT $empezar_desde,$tamaño_pagina";

    $query1_limite = mysqli_query($adminconnection, $sql1_limite);
    ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_empleados.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Lista de empleados</h1>
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
                <h2>LISTADO DE EMPLEADOS</h2>
                <br>
                <p>En esta interfaz obtendrás una lista con los datos generales de cada empleado.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div>
                <table class="main_table">
                    <tr>
                        <td class="header">N°</td>
                        <td class="header">Id Usuario</td>
                        <td class="header">Nombre</td>
                        <td class="header">Cargo</td>
                        <td class="header">Labores desempeñadas</td>
                    </tr>
                    <?php
                    $i = 1;
                    while($r = $query1_limite->fetch_assoc()){
                        $id_empleado = $r['idEmpleado'];
                        $sql2 = "SELECT * FROM labdesempeñadas ld JOIN empleado em ON ld.idEmpleadoLab = em.idEmpleado WHERE idEmpleado = '$id_empleado'";
                        $query2 = mysqli_query($adminconnection, $sql2);
                        echo "<tr>
                        <td class='field'>$i</td>
                        <td class='field'>" . $r['idUsuario'] . "</td>
                        <td class='field'>" . $r['nombreUsuario'] . " " . $r['apellidosUsuario'] . "</td>
                        <td class='field'>" . $r['cargo'] . "</td>
                        <td class='field'>";
                        while($q = $query2->fetch_assoc()){
                            echo $q['labordesempeñada'] . "<br>";
                        }
                        echo"</td>
                        </tr>";
                        $i++;
                    }
                    ?>
                </table>
                <div class="pag">
                        <?php
                        for($i = 1; $i<=$total_paginas; $i++){
                            echo "<a href='?pagina=" . $i . "'><input class='pag_button' type='button' value='$i'></a>";
                        }
                        ?>
                    </div>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
<?php
$adminconnection->close();
$connection->close();
?>
