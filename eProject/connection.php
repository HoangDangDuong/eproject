<?php
$host= "localhost";

$username="root";

$password = "";

$db_name = "jenkinson_sea_life";
// 
$conn = mysqli_connect($host, $username, $password, $db_name);
if (!$conn) {
    echo "Connection failed!";
}
?>