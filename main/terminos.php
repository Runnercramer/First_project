<!DOCTYPE html>
<html lang="es">
<head>
    <title>Términos y condiciones</title>
    <meta charset="UTF-8" />
    <link rel="icon" href="../imagenes/vetex.ico"/>
    <link rel="stylesheet" href="estilos.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <style>
        .accept{width:40%;background-color:green;color:white;margin:10px auto;text-align:center}
        .noaccept{width:40%;background-color:red;color:white;margin:10px auto;text-align:center}
        .form1{width:40%;margin:10px auto;text-align:center;}
    </style>
</head>
<body id="bod5">
    <div id="cont1">
    <header>
        <a href="../index.html"><img id="img1" src="../imagenes/descarga.png"></a>
        <h1>Términos y condiciones para el manejo de datos y uso de sitio Web.</h1>
    </header>
    <section id="secc10">
        <br>
        <h3>1.ACEPTACIÓN</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt ipsa eaque quidem dicta quo est autem optio omnis fugiat, tempore, voluptatem culpa architecto recusandae! Porro vel voluptas necessitatibus ullam ab! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis amet nam velit explicabo iste numquam inventore provident quibusdam consequatur architecto, magnam consequuntur assumenda sed labore saepe fugiat aliquam sequi voluptatibus? Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br>
        <br>
        <h3>2.REQUISITOS RELATIVOS AL USUARIO</h3>
        Reiciendis expedita, delectus maiores, impedit enim tempore deserunt rem optio eum maxime unde nobis! Vitae consequuntur autem, repellendus accusamus recusandae aliquid rem? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni illum nisi id libero ea optio fuga atque aspernatur necessitatibus minus veniam, alias consequuntur, deserunt itaque ad reiciendis voluptates, quas fugiat? Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br>
        <br>
        <h3>3.LICENCIA</h3>
        Dolor repellendus obcaecati nisi dolorem. Totam nisi magnam, deleniti voluptas in quos fugit, iste nesciunt mollitia eos perferendis, dolorum at laborum sed! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat tempora, nemo distinctio voluptate, deserunt architecto doloremque nulla recusandae sequi dolor eius pariatur neque maiores inventore numquam suscipit! Tempora, nemo rerum! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex voluptatem libero optio quidem modi amet tempore velit maiores consequuntur fuga, tempora error impedit fugiat dolorem eligendi tenetur explicabo reprehenderit quaerat! Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, officia cupiditate placeat earum aut temporibus velit laborum dolore dicta vero, enim, fugiat sit culpa ea veritatis deserunt repellendus itaque quisquam.lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat mollitia corrupti eum! Asperiores reprehenderit cum repellendus blanditiis aut dolore aliquid laboriosam illum, excepturi consectetur nemo odio velit nisi neque suscipit? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus at similique debitis error, aliquid harum quam asperiores velit, eos a architecto, vel maxime atque voluptatibus quia. Voluptas nobis ipsa Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, odio, similique optio praesentium nesciunt minima reprehenderit enim magni natus minus tempore laudantium, eos cum culpa.<br>
        <br>
        <h3>4.Propiedad Intelectual y Derechos Reservados</h3>
        Totam nam consectetur quas quisquam! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima velit recusandae obcaecati repellendus, praesentium sed quo nesciunt rem in quas quisquam magnam repellat dolore perspiciatis eos optio eum aperiam asperiores! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus corporis iusto similique repudiandae adipisci nemo temporibus molestiae autem, ad eligendi. Dolorum, odio distinctio fugiat accusantium eos tempora eveniet quo cumque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero earum sed illum aperiam numquam! Quo nemo deleniti ipsa eveniet nisi architecto repudiandae voluptatem debitis eius, facere sunt temporibus optio! Dolorem?
        </p>
    
    <article>
        <br>
    <form class="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p>He leído y acepto los términos y condiciones</p>
            Sí <input type="checkbox" name="terminos" value="1">
            No <input type="checkbox" name="terminos" value="0">
        <br>
        <input type="submit" name="send" value="Enviar">
    </form>
    </article>
    <?php
    error_reporting(0);
    if(isset($_POST['send'])){
        $confirmation = $_POST['terminos'];
        if($confirmation != ""){
            if($confirmation == 1){
            echo "<p class='accept'>Gracias por aceptar los términos y las condiciones</p>";
            }else{
                echo "<p class='noaccept'>Por favor, acepta los términos y las condiciones</p>";
            }
        }else{
            echo "<p class='noaccept'>Por favor selecciona si acepta o no las condiciones</p>";
        }
    }
    ?>
    </section>
    <footer>
        <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
    </footer>
    </div>
</body>
</html>