<?php
    $mysqli = new mysqli("localhost","root","","login");
        $sql_statement = "SELECT usuario,contrasena FROM cuenta WHERE usuario = '" . $_POST['Usuario'] ."'" . "AND contrasena = '" . $_POST['Contrasena'] ."'";
        $result = $mysqli -> prepare($sql_statement);
        $result -> execute();
        $result -> store_result();
        if ($result -> num_rows == 1)
        {
          $result -> close();
          $_SESSION["Usuario"] = $_POST["Usuario"];
          echo "<h1>Bienvenido</h1>";
        }else
        {
          $result -> close();
          header("Location: index.php"); 
        }
      $mysqli -> close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="../css/maquetacionCompleto.css">
</head>
<body>
    
</body>
</html>