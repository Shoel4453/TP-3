<?php 

include ('connection.php');
$con = connection();

$ID = null;
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$image_url = $_FILES['image_url']['name']; 
$image_tmp = $_FILES['image_url']['tmp_name']; 

move_uploaded_file($image_tmp, "uploads/$image_url");
$image_url = "uploads/$image_url";

$sql = "INSERT INTO users (name, lastname, username, password, image_url) VALUES ('$name', '$lastname', '$username', '$password', '$image_url')";
$query = mysqli_query($con, $sql);

if($query){
    header("Location: index.php");
}

?>
