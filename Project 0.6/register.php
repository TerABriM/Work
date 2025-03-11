<?php
require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatpass'];
$email = $_POST['email'];

if (empty($login) || empty($pass) || empty($repeatpass) || empty($email)) {
    echo "Заполните все поля";
    exit;
}

if ($pass != $repeatpass) {
    echo "Пароль не совпадает";
    exit;
}

// Проверка на уникальность логина и email
$stmt = $conn->prepare("SELECT id FROM users WHERE login = ? OR email = ?");
$stmt->bind_param("ss", $login, $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Логин или email уже зарегистрированы";
    $stmt->close();
    exit;
}

// Хеширование пароля
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

// Вставка нового пользователя
$stmt = $conn->prepare("INSERT INTO users (login, pass, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $login, $hashed_pass, $email);

if ($stmt->execute()) {
    echo "Успех";
} else {
    echo "Ошибка: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>