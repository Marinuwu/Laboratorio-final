<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Formulario de registro</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="group">
    <form method="POST" action="">
    <h2>Formulario de registro</h2> 
    <label for="nombre">Nombre<span><em>(requerido)<em></span></label>
    <input type="text" name="nombre" class="form-input" required/>

    <label for="primer_apellido">Primer Apellido<span><em>(requerido)<em></span></label>
    <input type="text" name="primer_apellido" class="form-input" required/>

    <label for="segundo_apellido">Segundo Apellido<span><em>(requerido)<em></span></label>
    <input type="text" name="segundo_apellido" class="form-input" required/>

    <label for="email">Email<span><em>(requerido)<em></span></label>
    <input type="email" name="email" class="form-input" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+" required/>

    <label for="password">Contraseña<span><em>(requerido)<em></span></label>
    <input type="password" name="password" class="form-input" pattern="^.{4,8}$" required/>

    <input class="form-btn" name="submit" type="submit" value="Login"/>
    </form>
</div>

<?php
#comprobacion del envio del form y conexion con la bd
if ($_POST) {
    $nombre = $_POST['nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "laboratoriofinal";



    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
     # Verificar si el correo electrónico ya existe en la base de datos
    $existingUserQuery = "SELECT email FROM usuarios WHERE email = '$email'";
    $result = $conn->query($existingUserQuery);
    if ($result->num_rows > 0) {
        echo "Correo electrónico ya existente";
    } else {
        $sql = "INSERT INTO usuarios (nombre, primer_apellido, segundo_apellido, email, password)
        VALUES ('$nombre', '$primer_apellido', '$segundo_apellido', '$email', '$password')";




if ($conn->query($sql) === TRUE) {
    echo "Registro completado con éxito";
    echo "<a href='Listado.php'><br>Listado de usuarios registrados</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
}
?>
</body>
</html>
