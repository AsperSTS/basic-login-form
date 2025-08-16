<?php
   $conexionBaseDeDatos = new mysqli("localhost", "root", "", "sesion");
    session_start();
    $revisarUsuario = $_SESSION['login_user'];
    $consultaSql = "SELECT usuario from cuenta where usuario = '$revisarUsuario'";
    $sentencia = $conexionBaseDeDatos->query($consultaSql);
    $row = $sentencia->fetch_assoc();
    $login_session = $row['usuario'];
    ?>