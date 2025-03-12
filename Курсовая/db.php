<?php

$servername = "trip";
$username = "root";
$password = "";
$dbname = "registerUser";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Ошибка". mysqli_connect_error());
} else {
   "Успех";
}
?>