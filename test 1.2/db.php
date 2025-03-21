<?php

$servername = "locolhost";
$username = "root";
$password = "";
$dbname = "register_user";

$conn = mysqli_connect('localhost', 'root', '', 'register_user');

if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
 else {
   "Успех";
}

?>