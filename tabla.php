<?php
// Recogemos las variables enviadas por GET

// $q = "%" . $_GET['q'] . "%";

// realizamos la conexión en la BD
$conn = mysqli_connect('localhost', 'root', '1234');

echo "<tr>
<th>id</th>
<th>nombre</th>
<th>contraseña</th>
<th>email</th>
<th>estado</th>
</tr>";
// imprimir los datos de cada fila
while ($row = $result->fetch_assoc()) {

    $estado = $row['estado'];

    if (isset($_SESSION['logged']) && $_SESSION['tipo_usuario'] == 'admin') {
        if ($row['tipo_usuario'] == 'admin') {
            $user1 = 'admin';
            $user2 = 'user';
        } else {
            $user1 = 'user';
            $user2 = 'admin';
        }
        $selector = "<select name='tipo_usuario'>
        <option name='usertype' value='" . $user1 . "'>" . $user1 . "</option>
        <option name='usertype' value='" . $user2 . "'>" . $user2 . "</option>
        </select>";
    }

    $fila = "<tr>";
        if ($estado == 'verificado') {
            $fila = "<tr style='background-color: green;' >";
        }
        echo $fila;

    echo "$fila <form action='update-user.php' method='post'>
               <td>" . "<input name='id' hidden value='" . $row['id'] . "'>" . $row['id'] . "</td>" .
        "<td>" . "<input name='name' value='" . $row['nombre'] . "'>" . "</td>" .
        "<td>" . "<input name='password' value='" . $row['password'] . "'>" . "</td>" .
        "<td>" . "<input name='email' value='" . $row['email'] . "'>" . "</td>".
        "<td>" . "<input name='email' value='" . $row['estado'] . "'>" . "</td>
              <td>";
        if(isset($selector)) echo $selector;
        
        "</td> 
              </tr>";
}

$conn->close();

?>
