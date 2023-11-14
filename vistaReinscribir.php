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
    <title>Formulario De Reinscripcion.</title>
    <link rel="stylesheet" href="maquetacionReinscripciones.css">
</head>
<body>
    <nav class="menuHorizontal">     
        <a class="opcionesHorizontales" href="menuDeOpciones.php">Volver Al Menu.</a>
        <a class="opcionesHorizontales" href="cerrarSesion.php">Cerrar Sesion.</a>
        <a class="opcionesHorizontales">Usuario: <?php echo $login_session?></a>
    </nav>
    <div class="formularioReinscripcion">
        <h2>Login</h2><br><br>
    <form action="controlador.php" method="POST">
            <p>Nombre: </p><br>
            <input type="text" name="nombre" placeholder="Nombre.." required><br><br>
            <p>Especialidad:</p><br>  
            <input type="text" name="especialidad" placeholder="Especialidad..." required><br><br>
            <p>Semestre:</p><br>
            <input type="text" name="semestre" placeholder="Semestre..." required><br><br>
            <p>Numero De Control:</p><br>
            <input type="text" name="numeroControl" placeholder="Numero de control..." max="15" required><br><br>
            <input type="submit" value="Registrar" > 
    </form>
    </div>
    
</body>
</html>