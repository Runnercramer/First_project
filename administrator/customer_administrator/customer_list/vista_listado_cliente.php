<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Listado de clientes</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../../administrator_styles.css">
    <link rel="stylesheet" href="../../new_admin_styles.css">
    <style>
        .main_table{background-color:#777;width:100%;text-align:center;}
        .header_table1{background-color:#a1ca4f;font-size:1.5em;font-weight:bold;bordeR:1px solid black;}
        .field{background-color:#bbb;font-weight:bold;font-size:1.2em;border:1px solid black;}
        .pag{grid-column-start:1;grid-column-end:5;display:flex;flex-direction:row;align-items:center;justify-content:space-evenly;}
        .pag_button{background-color:beige;font-size:1.2em;font-weight:bold;padding:5px;box-shadow:3px 3px 10px 3px #333;color:black;margin:30px auto;}
    </style>
            <?php
            include('../../../connection.php');
            $sql2 = "SELECT * FROM usuario join cliente on usuario.idUsuario=cliente.idUsuario join celular on usuario.idUsuario=celular.idUsuario join email on usuario.idUsuario=email.idUsuario join residencia on cliente.idCliente=residencia.idClienteResidencia ORDER BY idCliente ASC";
            $query2 = mysqli_query($adminconnection, $sql2);
            $a = mysqli_num_rows($query2);
            ?>
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
    if(!isset($_SESSION['userinfo']) || $_SESSION['userinfo']['tipoUsuario'] != 'administrador'){
        header("location:../../../index.html");
    }
    ?>
    <?php
                $tama??o_pagina = 10;
                if(isset($_GET['pagina'])){
                    if($_GET['pagina'] == 1){
                        header("location:/Vetex/administrator/customer_administrator/customer_list/vista_listado_cliente.php");
                    }else{
                        $pagina = $_GET['pagina'];
                    }
                }else{
                    $pagina = 1;
                }
                $empezar_desde = ($pagina - 1) * $tama??o_pagina;

                $num_filas = $query2->num_rows;

                $total_paginas = ceil($num_filas/$tama??o_pagina);

                $sql2_limite = "SELECT * FROM usuario 
                join cliente 
                on usuario.idUsuario=cliente.idUsuario 
                join celular 
                on usuario.idUsuario=celular.idUsuario 
                join email 
                on usuario.idUsuario=email.idUsuario 
                join residencia 
                on cliente.idCliente=residencia.idClienteResidencia 
                ORDER BY idCliente ASC LIMIT $empezar_desde,$tama??o_pagina";

                $query2_limite = mysqli_query($adminconnection, $sql2_limite);
                
                ?>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_cliente_admin.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Se recuperaron <?php echo $a;?> resultados del listado de clientes</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <h3> <?php echo mb_strtoupper($_SESSION['userinfo']['nombreUsuario']);?></h3>
                <h3> <?php echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);?></h3>
                <input type="button" class="profile_button" value="Perfil &#9881" onclick="profile()">
                <input type="button" class="logout_button" value="Cerrar sesi??n" onclick="logout()">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>Listado de clientes</h2>
                <br>
                <p>Aqu?? podr??s ver un listado total de los clientes, con su n??mero de identificaci??n, su email, su n??mero de celular, su direcci??n de residencia y el estado de su cuenta.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
            <div class="list">
            <?php
                echo "<table class='main_table'>
                <tr>
                <td class='header_table1'>Id Cliente</td>
                <td class='header_table1'>Id Usuario</td>
                <td class='header_table1'>Nombre</td>
                <td class='header_table1'>Email</td>
                <td class='header_table1'>Celular</td>
                <td class='header_table1'>Direcci??n</td>
                <td class='header_table1'>Estado de cuenta</td>
                </tr>";
                while($array1=mysqli_fetch_assoc($query2_limite)){ 
                    echo
                    "<tr>
                    <td class='field'>".$array1['idCliente']."</td>
                    <td class='field'>" . $array1['idUsuario'] . "</td>
                    <td class='field'>" . $array1['nombreUsuario'] . " " . $array1['apellidosUsuario'] . "</td>
                    <td class='field'>".$array1['email']."</td>
                    <td class='field'>".$array1['celular']."</td>
                    <td class='field'>".$array1['direccion']. " " . $array1['ciudad'] . ", " . $array1['departamento'] . "</td>
                    <td class='field'>".$array1['estadoCuenta']."</td>
                    </tr>";
                }
                echo "</table>";
            ?>
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
            <p><b>Cont??ctanos<br>018000222222<br>L??nea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>

</body>
</html>
<?php
$adminconnection->close();
$connection->close();
?>
