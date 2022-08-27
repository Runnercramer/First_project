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
        .header_table1{background-color:#74a118;}
        .field{}
    </style>
            <?php
            include('../../../connection.php');
            $query1 = "SELECT idUsuario, nombreUsuario, primerApellido, segundoApellido FROM usuario";
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
            echo "<table><tr class='header_table1'><td class='field'>Id Usuario</td><td class='field'>Nombre</td><td class='field'>Email</td><td class='field'>Celular</td><td class='field'>Dirección</td><td class='field'>Estado de cuenta</td></tr>";
            while($array1=mysqli_fetch_row($resultset1)){ 
                $query2 = "SELECT celular FROM celular WHERE idUsuario = '$array1[0]'";
                $resultset2 = mysqli_query($connection, $query2);
                while($array2=mysqli_fetch_row($resultset2)){
                 $query3="SELECT email FROM email WHERE idUsuario = '$array1[0]'";
                    $resultset3 = mysqli_query($connection, $query3);
                    while($array3=mysqli_fetch_row($resultset3)){
                        $query4="SELECT estadoCuenta, idCliente FROM cliente WHERE idUsuario = '$array1[0]'";
                        $resultset4 = mysqli_query($connection, $query4);
                        while($array4=mysqli_fetch_row($resultset4)){
                            $query5="SELECT direccion, ciudad, departamento FROM residencia WHERE idCliente = '$array4[1]'";
                            $resultset5 = mysqli_query($connection, $query5);
                            while($array5 = mysqli_fetch_row($resultset5)){
                              echo "<tr><td class='field'>$array1[0]</td><td class='field'>$array1[1] $array1[2] $array1[3]</td><td class='field'>$array3[0]</td><td class='field'>$array2[0]</td><td class='field'>$array5[0] $array5[1], $array5[2]</td><td class='field'>$array4[0]</td></tr>";
                            }
                        }
                    }
               }
            }
            ?>
            </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>

</body>
</html>