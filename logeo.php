<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
<style>
     body {
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,212,255,1) 0%, rgba(175,28,94,1) 74%);
    }
    p {
        color: white;
    }
</style>
</head>
<body id="body" class="cuerpo">
    <div id="background"></div>
<?php
session_start();
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    // Recibimos las variables del form
    $user = $_POST['nombre'];
    // $username = $_POST['username'];
    $password = $_POST['password'];

    
    // Hacemos la query para buscar si existe un usuario con estos datos
    $sql = "SELECT * FROM Empleados WHERE nombre = '$user' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       echo '<p>Has iniciado sesión con éxito</p>';
       echo "<p>Bienvenido $user.";
       echo '<a href="panel-user.php">
       <button>Panel de Usuario</button>
    </a>';

       $_SESSION['logged'] = true;
       while ($row = $result->fetch_assoc()) {
        // Creamos una array $row con los resultados de la query del usuario
        $_SESSION['id'] = $row['id']; // Primary key
        $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
        $_SESSION['nombre'] = $row['nombre'];
        }
    } else {
        // En caso de login incrrecto:
        header('Location: login-form.php?fallo=true');
    }
}
?>
</body>
</html>