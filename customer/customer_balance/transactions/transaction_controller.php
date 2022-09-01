<?php
include('../../../connection.php');

if(isset($_GET['send'])){

    $date1 = mysqli_real_escape_string($connection, $_GET['date1']);
    $date2 = mysqli_real_escape_string($connection, $_GET['date2']);

    if($date1 == "" || $date2 == ""){
        echo "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Error</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../../main/estilos.css'/>
            <link rel='icon' href='../../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <style>
            .error1{background-color:red;color:white;display:block;margin:20px auto;width:50%;text-align:center;font-size:3rem;}
            </style
        </head>
        <body>
            <div id='cont1'>
                <header id='enc1'>
                    <a href='vista_transaccion.html'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                </header>  
                <h1 class='error1'>Debe ingresar las 2 fechas para la consulta.</h1>
            </div>
            <footer id='pa2'>
                <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
            </footer>
        </body>
        </html>
        ";
    }else{
        if($date1 > $date2){
            echo "
            <!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Error</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../../main/estilos.css'/>
            <link rel='icon' href='../../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <style>
            .error1{background-color:red;color:white;display:block;margin:20px auto;width:50%;text-align:center;font-size:3rem;}
            </style
        </head>
        <body>
            <div id='cont1'>
                <header id='enc1'>
                    <a href='vista_transaccion.html'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                </header>  
                <h1 class='error1'>La segunda fecha debe ser una fecha posterior a la primera.</h1>
            </div>
            <footer id='pa2'>
                <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
            </footer>
        </body>
        </html>
            ";
        }else{
            echo "
            <!DOCTYPE html>
<html lang='es'>
<head>
    <title>Historial de transacciones</title>
    <meta charset='UTF-8' />
    <link rel='stylesheet' href='../../../main/estilos.css'/>
    <link rel='icon' href='../../../imagenes/vetex.ico'/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='../../customer_styles.css'>
    <style>
    .report_table{background-color:#ccc;width:80%;margin:20px auto;height:200px;font-size:1.5em;text-align:center;}
    .header{background-color:#a1ca4f;border:1px solid black;font-weight:bold;}
    .field{background-color:#aaa;border:1px solid black;}
    </style>
</head>
<body>
    <div id='cont1'>
        <header id='enc1'>
            <a href='../vista_balance.html'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
            <h1>Reporte de transacciones</h1>
            <div class='profile'>
                <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                <input type='button' class='profile_button' value='Perfil &#9881'>
            </div>
        </header> 
        <section class='methods'>
            <div class='information'>
                <h2>HISTORIAL DE TRANSACCIONES</h2>
                <br>
                <p>Este es un reporte de los pagos que has realizado entre las fechas solicitadas.</p>
                <br>
                <h3>Software:</h3><p><b>SGIVT</b></p>
                <h3>Version:</h3><p><b>1.2</b></p>
                <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
            </div>
                <div>
                    <table class='report_table'>
                        <tr>
                            <td class='header'>N°</td>
                            <td class='header'>Cobrador</td>
                            <td class='header'>Código Pedido</td>
                            <td class='header'>Valor</td>
                            <td class='header'>Fecha</td>
                        </tr>
                        ";
                        //$session = $_SESSION['idusuario'];
                        $query1 = "SELECT * FROM transaccion tr JOIN cobro co ON tr.codTransaccion = co.codTransaccion /*WHERE idUsuario = '$session' */";
                        $ejecucion1 = mysqli_query($connection, $query1);
                        $i = 1;
                        while($r = $ejecucion1->fetch_assoc()){
                            echo "<tr><td class='field'>$i</td><td class='field'>" . $r['cobrador'] . "</td><td class='field'>" . $r['codPedido'] . "</td><td class='field'>" . $r['valor'] . "</td><td class='field'>" . $r['fecha'] . "</td></tr>";
                            $i++;
                        }
                "</table>
                </div>
        </section>
        <footer id='pa2'>
            <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
        </footer>
    </div>
</body>
</html>
            ";
        }
    }

}
?>