<?php 
include ('connection.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$con = connection();

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);

if (!$query) {
    die("Query failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP3</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Favicon.png" type="image/x-icon">
</head>
<body>
    
    <div class="users-form">
        <form action="insert_user.php" method="POST" enctype="multipart/form-data">
            <h1>Crear Usuario</h1>
            <input type="text" name="name" placeholder="Nombre" required>
            <input type="text" name="lastname" placeholder="Apellido" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="password" placeholder="Contraseña" required>
            <input type="file" name="image_url" accept="image/*" required> 
            <input type="submit" value="Agregar usuario">
        </form>
    </div>

    <div class="users-table">
        <h2>Usuarios Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Username</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <td><?= $row['ID'] ?></td>
                    <td><img src="<?= $row['image_url'] ?>" alt="Imagen de Usuario" class="user-image" style="height: 100%; width: 100%; margin-top: 5px;"></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['lastname']) ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['password']) ?></td>
                    <td>
                        <a href="update.php?ID=<?= $row['ID'] ?>" class="users-table--edit">Editar</a>
                        <a href="delete_user.php?ID=<?= $row['ID'] ?>" class="users-table--delete">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
<footer>
    
</footer>
</html>
