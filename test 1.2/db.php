<?php

$servername = "locolhost";
$username = "root";
$password = "";
$dbname = "registerUser";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Ошибка". mysqli_connect_error());
} else {
   "Успех";
}

http://127.0.0.1:5500/subfolder/register.php
?>