
<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "store";
$connect = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    echo "Connection Fail: " . mysqli_connect_errno();
}