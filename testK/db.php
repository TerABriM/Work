<?php
// register.php

// Подключение к базе данных
$servername = "localhost";
$username = "root";  // стандартный пользователь XAMPP
$password = "";      // стандартный пароль XAMPP
$dbname = "registeruser"; // имя вашей базы данных

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 else {
   "Успех";
}

?>