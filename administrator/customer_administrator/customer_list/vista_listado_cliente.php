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
    <style>
        .main_table{background-color:#bbb;}
        .header_table1{background-color:#74a118;text-align:center;font-size:1.2em;font-weight:bold;padding:5px;}
        .field{background-color:#999;font-weight:bold;text-align:center;padding:3px;}
    </style>
            <?php
            include('../../../connection.php');
            $query1 = "SELECT * FROM usuario right join cliente on usuario.idUsuario=cliente.idUsuario join celular on usuario.idUsuario=celular.idUsuario join email on usuario.idUsuario=email.idUsuario left join residencia on cliente.idCliente=residencia.idClienteResidencia ORDER BY idCliente ASC";
            $resultset1 = mysqli_query($connection, $query1);
            $a = mysqli_num_rows($resultset1);
            ?>
</head>
<body>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_cliente_admin.html'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Se recuperaron <?php echo $a;?> resultados del listado de clientes</h1>
            <div class="profile">
                <img id="profile_image" src="../../../imagenes/profile.png" alt="Imagen de perfil">
                <input type="button" class="profile_button" value="Perfil &#9881">
            </div>
        </header>  
        <section class="methods">
            <div class="information">
                <h2>Listado de clientes</h2>
                <br>
                <p>Aquí podrás ver un listado total de los clientes, con su número de identificación, su email, su número de celular, su dirección de residencia y el estado de su cuenta.</p>
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
                <td class='header_table1'>Dirección</td>
                <td class='header_table1'>Estado de cuenta</td>
                </tr>";
                while($array1=mysqli_fetch_assoc($resultset1)){ 
                    echo
                    "<tr>
                    <td class='field'>".$array1['idCliente']."</td>
                    <td class='field'>" . $array1['idUsuario'] . "</td>
                    <td class='field'>".$array1['nombreUsuario']." ".$array1['primerApellido']." ".$array1['segundoApellido']."</td>
                    <td class='field'>".$array1['email']."</td>
                    <td class='field'>".$array1['celular']."</td>
                    <td class='field'>".$array1['direccion']."</td>
                    <td class='field'>".$array1['estadoCuenta']."</td>
                    </tr>";
                }
                echo "</table>";
            ?>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>

</body>
</html>