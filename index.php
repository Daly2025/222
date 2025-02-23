<?php
require 'db.php';

// Leer contactos
$stmt = $pdo->query('SELECT * FROM `contactos`');
$contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda de Contactos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Lista de Contactos</h1>
    <a href="crear.php" class="button">Agregar Contacto</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Fecha de Creación</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($contactos as $contacto): ?>
        <tr>
            <td><?= $contacto['id'] ?></td>
            <td><?= htmlspecialchars($contacto['nombre']) ?></td>
            <td><?= htmlspecialchars($contacto['telefono']) ?></td>
            <td><?= htmlspecialchars($contacto['email']) ?></td>
            <td><?= htmlspecialchars($contacto['direccion']) ?></td>
            <td><?= $contacto['fecha_creacion'] ?></td>
            <td>
                <a href="editar.php?id=<?= $contacto['id'] ?>" class="button edit">Editar</a>
                <a href="eliminar.php?id=<?= $contacto['id'] ?>" onclick="return confirm('¿Estás seguro?')" class="button delete">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>




