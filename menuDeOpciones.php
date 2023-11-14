<?php
    include('session.php'); 
    if(!isset($_SESSION['login_user'])){ 
      header("location: vistaLogin.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu De Opciones</title>
    <link rel="stylesheet" href="maquetacionMenuDeOpciones.css">
</head>
<body>  
    <nav class="menuHorizontal">     
        <a class="titulosHorizontales">Menu</a>
        <a class="opcionesHorizontales" href="cerrarSesion.php">Cerrar Sesion.</a>
        <a class="opcionesHorizontales">Usuario: <?php echo $login_session?></a>
    </nav>
    <br>
    <nav class="menuVertical">
        <a class="titulosVerticales">Opciones</a>
        <a class="opcionesVerticales" href="vistaReinscribir.php">Reinscribirse.</a>
        <a class="opcionesVerticales" href="#calificaciones">Consultar Calificaciones.</a>
        <a class="opcionesVerticales" href="#calificaciones">Consultar Horario.</a>
    </nav>

</body>
</html>