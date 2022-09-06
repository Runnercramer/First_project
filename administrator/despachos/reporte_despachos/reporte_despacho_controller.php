<?php
include("../../../connection.php");
session_start();
if(!isset($_SESSION['userinfo'])){
    header("location:../../../main/index.html");
}

if(isset($_GET['send'])){
    $date1 = mysqli_real_escape_string($adminconnection, $_GET['date1']);
    $date2 = mysqli_real_escape_string($adminconnection, $_GET['date2']);
    $search = mysqli_real_escape_string($adminconnection, $_GET['search']);


    if($date1 != "" && $date2 != "" && $search == ""){
        $sql1 = "SELECT * FROM despacho WHERE fecha BETWEEN '$date1' AND '$date2' ORDER BY fecha DESC";
        $query1 = mysqli_query($adminconnection, $sql1);


        echo
        "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Reporte general</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../../main/estilos.css'/>
            <link rel='icon' href='../../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../../administrator_styles.css'>
            <link rel='stylesheet' href='../../new_admin_styles.css'>
            <style>
                .main_table{background-color:#777;width:100%;text-align:center;font-weight:bold;}
                .header{background-color:#a1ca4f;font-size:1.5em;}
                .field{background-color:#bbb;font-size:1.2em;}
            </style>
                     <script>
                function profile(){
                    window.location.href = '../../adminprofile.php';
                }
        
                function logout(){
                    window.location.href = '../../../main/logout.php';
                }
            </script>
        </head>
        <body>";
            if(!isset($_SESSION['userinfo'])){
                header("location:../../../main/index.html");
            }
            echo "
            <div id='cont1'>
                <header id='enc1'>
                    <a href='reporte_despachos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1>Reporte general</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                        <h3>"; 
                        echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                        echo "</h3>
                        <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                        <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()''>
                    </div>
                </header>  
                <section class='methods'>
                    <div class='information'>
                        <h2>REPORTE DESPACHOS</h2>
                        <br>
                        <p>Este es un reporte general de los últimos despachos realizados entre $date1 y $date2</p>
                        <br>
                        <h3>Software:</h3><p><b>SGIVT</b></p>
                        <h3>Version:</h3><p><b>1.2</b></p>
                        <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                        <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
                    </div>
                    <div>
                    <table class='main_table'>
                    </tr>
                    <td class='header'>Código despacho</td>
                    <td class='header'>Código pedido</td>
                    <td class='header'>Encargado</td>
                    <td class='header'>Fecha</td>
                    <td class='header'>Estado</td>
                    <td class='header'>Guia</td>
                    </tr>";
                    while($r = $query1->fetch_assoc()){
                        echo "
                        <tr>
                        <td class='field'>" . $r['codDespacho'] . "</td>
                        <td class='field'>" . $r['codPedido'] . "</td>
                        <td class='field'>" . $r['encargado'] . "</td>
                        <td class='field'>" . $r['fecha'] . "</td>
                        <td class='field'>" . $r['estado'] . "</td>
                        <td class='field'>" . $r['guia'] . "</td>
                        </tr>
                        ";
                    }
                    echo"
                    </table>
                    </div>
                </section>
                <footer id='pa2'>
                    <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
                </footer>
            </div>
        </body>
        </html>
                "; 
    }else if($search != "" && $date1 == "" && $date2 == ""){
        $sql2 = "SELECT * FROM usuario us JOIN cliente cl ON us.idUsuario = cl.idUsuario JOIN pedido pe ON cl.idCliente = pe.idCliente JOIN despacho de ON pe.codPedido = de.codPedido WHERE nombreUsuario LIKE '%$search%' OR apellidosUsuario LIKE '%$search%' ORDER BY fecha DESC";
        $query2 = mysqli_query($adminconnection, $sql2);
        echo "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Reporte individual</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../../main/estilos.css'/>
            <link rel='icon' href='../../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../../administrator_styles.css'>
            <link rel='stylesheet' href='../../new_admin_styles.css'>
            <style>
                .main_table{background-color:#777;width:100%;text-align:center;font-weight:bold;}
                .header{background-color:#a1ca4f;font-size:1.5em;}
                .field{background-color:#bbb;font-size:1.2em;}
            </style>
                     <script>
                function profile(){
                    window.location.href = '../../adminprofile.php';
                }
        
                function logout(){
                    window.location.href = '../../../main/logout.php';
                }
            </script>
        </head>
        <body>";
            if(!isset($_SESSION['userinfo'])){
                header("location:../../../main/index.html");
            }
            echo "
            <div id='cont1'>
                <header id='enc1'>
                    <a href='reporte_despachos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1>Reporte individual</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                        <h3>"; 
                        echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                        echo "</h3>
                        <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                        <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()''>
                    </div>
                </header>  
                <section class='methods'>
                    <div class='information'>
                        <h2>REPORTE DESPACHOS</h2>
                        <br>
                        <p>Este es un reporte individual de los despachos realizados a "; echo $search;
                        echo "</p>
                        <br>
                        <h3>Software:</h3><p><b>SGIVT</b></p>
                        <h3>Version:</h3><p><b>1.2</b></p>
                        <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                        <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
                    </div>
                    <div>
                    <table class='main_table'>
                    </tr>
                    <td class='header'>Código despacho</td>
                    <td class='header'>Código pedido</td>
                    <td class='header'>Encargado</td>
                    <td class='header'>Fecha</td>
                    <td class='header'>Estado</td>
                    <td class='header'>Guia</td>
                    </tr>";
                    while($q = $query2->fetch_assoc()){
                        echo "
                        <tr>
                        <td class='field'>" . $q['codDespacho'] . "</td>
                        <td class='field'>" . $q['codPedido'] . "</td>
                        <td class='field'>" . $q['encargado'] . "</td>
                        <td class='field'>" . $q['fecha'] . "</td>
                        <td class='field'>" . $q['estado'] . "</td>
                        <td class='field'>" . $q['guia'] . "</td>
                        </tr>
                        ";
                    }
                    echo"
                    </table>
                    </div>
                </section>
                <footer id='pa2'>
                    <p><b>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</b></p>
                </footer>
            </div>
        </body>
        </html>
        ";
    }else{
        echo
        "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <title>Error</title>
            <meta charset='UTF-8' />
            <link rel='stylesheet' href='../../../main/estilos.css'/>
            <link rel='icon' href='../../../imagenes/vetex.ico'/>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../../administrator_styles.css'>
            <link rel='stylesheet' href='../../new_admin_styles.css'>
            <style>
                .main_table{background-color:#777;width:100%;text-align:center;font-weight:bold;}
                .header{background-color:#a1ca4f;font-size:1.5em;}
                .field{background-color:#bbb;font-size:1.2em;}
            </style>
                     <script>
                function profile(){
                    window.location.href = '../../adminprofile.php';
                }
        
                function logout(){
                    window.location.href = '../../../main/logout.php';
                }
            </script>
        </head>
        <body>";
            if(!isset($_SESSION['userinfo'])){
                header("location:../../../main/index.html");
            }
            echo "
            <div id='cont1'>
                <header id='enc1'>
                    <a href='reporte_despachos.php'><img id='img1' src='../../../imagenes/descarga.png' alt='Logotipo de Vetex'></a>
                    <h1>Error en la consulta</h1>
                    <div class='profile'>
                        <img id='profile_image' src='../../../imagenes/profile.png' alt='Imagen de perfil'>
                        <h3>"; 
                        echo mb_strtoupper($_SESSION['userinfo']['tipoUsuario']);
                        echo "</h3>
                        <input type='button' class='profile_button' value='Perfil &#9881' onclick='profile()'>
                        <input type='button' class='logout_button' value='Cerrar sesión' onclick='logout()''>
                    </div>
                </header>  
                <section class='methods'>
                    <div class='information'>
                        <h2>Error en la consulta</h2>
                        <br>
                        <p>Ingrese las 2 fechas o el nombre de un cliente</p>
                        <br>
                        <h3>Software:</h3><p><b>SGIVT</b></p>
                        <h3>Version:</h3><p><b>1.2</b></p>
                        <h3>Desarrolladores:</h3><p>Jean Cuesta<br>Cristian Vargas</p>
                        <h3>Contactos:</h3><p>301xxx xx xx<br>3022459827</p>
                    </div>
                    <div>
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

$adminconnection->close();
?>