<?php
// Recogemos las variables enviadas por GET

$q = "%" . $_GET['q'] . "%";

// realizamos la conexión en la BD
$conn = mysqli_connect('localhost', 'root', '1234');

echo "<tr>
<th>id</th>
<th>nombre</th>
<th>contraseña</th>
<th>email</th>
<th>tipo de usuario</th>
<th>Administrar</th>
</tr>";
// imprimir los datos de cada fila
while ($row = $result->fetch_assoc()) {

    if (isset($_SESSION['logged']) && $_SESSION['usertype'] == 'admin') {
        if ($row['usertype'] == 'admin') {
            $user1 = 'admin';
            $user2 = 'user';
        } else {
            $user1 = 'user';
            $user2 = 'admin';
        }
        $selector = "<select name='usertype'>
        <option name='usertype' value='" . $user1 . "'>" . $user1 . "</option>
        <option name='usertype' value='" . $user2 . "'>" . $user2 . "</option>
        </select>";
    }

    echo "<tr> <form action='update-user.php' method='post'>
               <td>" . "<input name='id' hidden value='" . $row['id'] . "'>" . $row['id'] . "</td>" .
        "<td>" . "<input name='name' value='" . $row['name'] . "'>" . "</td>" .
        "<td>" . "<input name='password' value='" . $row['password'] . "'>" . "</td>" .
        "<td>" . "<input name='email' value='" . $row['email'] . "'>" . "</td>
              <td>" .
        $selector
        .
        "</td> 
              <td> <input class='mod' type='submit' name='edit' value='Modificar'>
                   <input class='mod' type='submit' name='delete' value='Eliminar'>
              </form> 
              </tr>";
}

$conn->close();

?>
