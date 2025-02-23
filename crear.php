<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];

    if (!empty($nombre) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $pdo->prepare('INSERT INTO contactos (nombre, telefono, email, direccion) VALUES (?, ?, ?, ?)');
        $stmt->execute([$nombre, $telefono, $email, $direccion]);
        header('Location: index.php');
        exit;
    } else {
        $error = "Por favor, complete todos los campos obligatorios y asegúrese de que el email sea válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Contacto</title>
</head>
<body>
    <h1>Agregar Contacto</h1>
    <form method="post" action="">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br>
        <label>Teléfono:</label><br>
        <input type="text" name="telefono" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Dirección:</label><br>
        <textarea name="direccion"></textarea><br>
        <button type="submit">Guardar</button>
    </form>
    <?php if (isset($error)): ?>
    <p style="color:red"><?= $error ?></p>
    <?php endif; ?>
    <a href="index.php">Volver</a>
</body>
</html>
