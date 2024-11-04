<?php 
include ('connection.php');
$con = connection();

$ID = $_GET['ID'];
$sql = "SELECT * FROM users WHERE ID = '$ID'";
$query = mysqli_query($con, $sql);
$user = mysqli_fetch_array($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $image_url = $_FILES['image_url']['name'];
    $image_tmp = $_FILES['image_url']['tmp_name'];

    if ($image_url) {
        move_uploaded_file($image_tmp, "uploads/$image_url");
        $image_url = "uploads/$image_url";
    } else {
        $image_url = $user['image_url'];
    }

    $sql = "UPDATE users SET name='$name', lastname='$lastname', username='$username', password='$password', image_url='$image_url' WHERE ID='$ID'";
    mysqli_query($con, $sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="users-form">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1>Actualizar Usuario</h1>
            <input type="text" name="name" value="<?= $user['name'] ?>" required>
            <input type="text" name="lastname" value="<?= $user['lastname'] ?>" required>
            <input type="text" name="username" value="<?= $user['username'] ?>" required>
            <input type="text" name="password" value="<?= $user['password'] ?>" required>
            <input type="file" name="image_url" accept="uploads/*">
            <input type="submit" value="Actualizar Usuario">
        </form>
    </div>
</body>
</html>
</div>