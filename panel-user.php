<?php
session_start();
include 'conn.php';

// $user1 = '';
// $user2 = '';
// $selector = '';

// if (isset($_SESSION['logged']) && $_SESSION['usertype'] == 'admin') {
//     $sql = 'SELECT * FROM registros';
// } elseif ($_SESSION['usertype'] == 'user') {
//     $user = $_SESSION['name'];
//     $sql = "SELECT * FROM registros WHERE name = '$user'";
//     $selector = 'user';
// }

$id = $_SESSION['id'];
$tipo_usuario = $_SESSION['tipo_usuario'];

// valor por defecto, usuario
$sql = "SELECT * FROM empleados WHERE id = $id";

// admin
if ($tipo_usuario == 'admin') $sql = "SELECT * FROM empleados";
if ($tipo_usuario == 'colaborador') $sql = "SELECT * FROM empleados WHERE tipo_usuario NOT IN 'admin'";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla con base de datos</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            /* display: flex; */
            flex-direction: column;
            text-align: center;
            align-items: center;
            /* justify-content: center;º */
            /* padding: 50px; */
            margin: 100px;
            /* font-size: 40px; */

            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 0%, rgba(175, 28, 94, 1) 74%);
        }

        p {
            color: white;
        }

        h1 {
            color: white;
        }

        .centro {
            display: flex;
            justify-content: center;
        }

        table {
            width: 900px;
            border-collapse: collapse;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            font-size: 1.5rem;
        }

        th,
        td {
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;

        }

        th {
            text-align: left;
            background-color: #55608f;
            /* width: 200px; */
            cursor: default;
        }

        td {
            position: relative;
            cursor: default;
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }


        select {
            background-color: transparent;
            color: white;
        }

        input {
            border: none;
            outline: none;
            background-color: transparent;
            color: white;
            font-size: 1rem;
        }

        .mod {
            display: flex;
            cursor: pointer;
            /* border: 1px solid black; */
            background-color: rgb(12, 50, 80);
            color: white;
            background-color: transparent;
            font-size: 1rem;
        }

        button {
            font-size: 18px;
            margin-top: 30px;
            background: rgba(146, 142, 138, 0.5);
            width: 200px;
            height: 45px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        button:hover {
            font-size: 18px;
            margin-top: 30px;
            background: rgba(146, 142, 138, 1);
            width: 200px;
            height: 45px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition-delay: 0.2s;
            color: white;
            border: 1px solid rgba(32, 192, 255, 1);
        }

        option {
            /* background-color: transparent; */
            color: black;
            font-size: 1rem;
        }

        select {
            font-size: 1rem;
        }

        .search {
            border: 1px solid blanchedalmond;
            color: white;
        }
    </style>
</head>

<body>
    <div>
        <div class="container">
            <form action="">
                <input class="search" type="text" name="users" onkeyup="showUser(this.value)">
            </form>
            <div id="display">Los datos de la persona se mostrarán aquí...</div>
        </div>

        <h1>Tabla de los usuarios de la BD</h1>
        <div class="centro">
            <table>

                <?php

                if ($result->num_rows > 0) include 'tabla.php';
                ?>
            </table>
        </div>
        <a href="pag-principal.php">
            <button>Página Principal</button>
        </a>

    </div>

</body>

<script>
    function showUser(text) {
        let display = document.getElementById('display');


        // si el input está vacio, el div también se vacia
        if (text == '') {
            display.innerHTML = '';
            return;


        } else {
            let ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    display.innerHTML = this.responseText;
                }
            };
            ajax.open ('GET', 'panel-user.php?q=' + text, true);
            ajax.send();
        }
    }
</script>

</html>