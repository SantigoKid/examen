<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registro de usuario</title>
  <style>
    form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      margin-bottom: 10px;
      padding: 5px;
      border-radius: 5px;
      border: none;
      box-shadow: 0 0 3px gray;
      width: 300px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>
  <h2>LOGEO de usuario</h2>
  <form action="logeo.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>


    <input type="submit" value="login">
  </form>
</body>
</html>