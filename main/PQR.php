<!DOCTYPE html>
<html lang="es">
<head>
    <title>PQRS</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="estilos.css"/>
    <link rel="icon" href="../imagenes/vetex.ico"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <style>
        .main_container{display:grid;grid-template-columns:1fr 1fr;width:90%;background-color:#ddd;margin:15px auto;height:auto;min-height:550px;}
        .sample_container{display:flex;flex-direction:column;align-items:center;justify-content:space-evenly;padding:10px;font-weight:bold;}
        .sample_image{max-width:400px;border-radius:20px;border:2px dashed black;}
        .sample_image:hover{border:2px dotted black;}
        .sample_image:active{border:2px solid black;}
        .main_form{background-color:#aaa;width:85%;margin:20px auto;height:auto;min-height:550px;padding:15px;font-size:1.2em;font-weight:bold;display:flex;flex-direction:column;align-items:center;justify-content:space-evenly;box-shadow:5px 5px 20px 5px #333;}
        .main_form input[type="text"], input[type="email"]{width:60%;text-align:center;font-size:0.9em;border-radius:15px;}
        select{width:60%;text-align:center;border-radius:15px;font-size:0.9em;}
        input[type="submit"], input[type="reset"]{background-color:beige;width:40%;font-weight:bold;font-size:1em;border-radius:15px;box-shadow:3px 3px 10px 3px #333;}
    </style>
</head>
<body>
    <div id="cont1">
        <header id="enc1">
            <a href="index.html"><img id="img1" src="../imagenes/descarga.png" alt="Logotipo de Vetex"></a>
            <h1 id="tit1">Peticiones, Quejas, Reclamos o Sugerencias</h1>
        </header>
        <section class="main_container">
                <div class="sample_container">
                <a href="catalogo.php"><img class='sample_image' id="img100" src="../imagenes/img9.jpg"></a>
                    <h2>Información Importante</h2>
                    <p>Acorde a los artículos 5, 6 y 12 de la Ley 1581 de 2012, a continuación, le informamos que recolectaremos datos sensibles. Usted no está obligado a compartir estos datos, por lo tanto, si no quiere compartir datos sensibles, recuerde que puede escalar su PQRSF de forma anónima. Los datos sensibles son recolectados por nuestra entidad con fines netamente estadísticos, con el fin de elaborar planes de acción y procurar una mejora continua en la atención al ciudadano y las políticas de participación ciudadana. Si oprime el botón "Enviar", está autorizando el tratamiento de estos datos.</p>
                </div>
                <div>
                <form class="main_form" action="#" method="POST">
                <h2>INFORMACIÓN DEL SOLICITANTE</h2>
                <label>Seleccione Tipo de Solicitud a radicar</label>
                    <select name="type">
                        <option value="0">-----------------</option>
                        <option value="pregunta">Pregunta</option>
                        <option value="queja">Queja</option>
                        <option value="reclamo">Reclamo</option>
                        <option value="sugenrecia">Sugerencia</option>
                    </select> 
                <label>Correo</label>
                <input type="email" name="email" placeholder="Ingresa un correo de contacto">
                <label>Número</label>
                <input type="text" name="tipo" required placeholder="Número de identificación">
                <label>Nombres</label>
                <input type="text" name="name" required placeholder="Nombres">
                <label>Apellidos</label>
                <input type="text" name="lastname" required placeholder="Apellidos"> 
                <label>Solicitud</label>
                <textarea name="solicitud"></textarea>    
                <input type="submit" value="Ingresar" name="send">
                <input type="reset" value="Borrar">
                </form>   
            </div>
            <?php
            if(isset($_POST['send'])){
                
            }
            ?>
        </section>
        <footer id="pa2">
            <p>Contáctanos<br>018000222222<br>Línea gratuita nacional<br>3014568137</p>
        </footer>
    </div>
</body>
</html>