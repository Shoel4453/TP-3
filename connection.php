<?php
function connection() {
    $host = 'mysql-sho3l.alwaysdata.net'; 
    $user = 'sho3l'; 
    $password = '46135807Jo'; 
    $database = 'sho3l_tp3';

    // Crear conexión
    $con = mysqli_connect($host, $user, $password, $database);

    // Verificar conexión
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $con;
}
?>
