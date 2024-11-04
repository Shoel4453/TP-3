<?php 

include ('connection.php');
$con = connection();

$ID = $_POST['ID'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$image_url = $_POST['image_url'];

$sql = "UPDATE users SET name='$name', lastname='$lastname', username='$username', password='$password', image_url='$image_url' WHERE ID ='$ID'";
$query = mysqli_query($con, $sql);

if ($query){
    Header("Location: index.php");
}

?>