
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laboratoriofinal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de usuarios</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="table-container">
        <?php
        if ($result->num_rows > 0) {
            echo "<h2>Listado de usuarios registrados en nuestra web</h2>";
            echo "<table>";
            echo "<tr><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Email</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>".$row['primer_apellido']."</td>";
                echo "<td>".$row['segundo_apellido']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<h2>No hay usuarios registrados.</h2>";
        }
        ?>
    </div>
</body>
</html>
