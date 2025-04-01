<?php
// Настройки базы данных
$host = "localhost";
$dbname = "bigbazar";
$username = "root";
$password = "";

// Создание соединения
$conn = new mysqli($host, $username, $password, $dbname);

// Настройки загрузки файлов
$max_file_size = 5 * 1024 * 1024; // 5MB
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
?>