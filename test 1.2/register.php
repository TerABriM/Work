<?php
require_once('db.php');

// Проверяем, что запрос является POST-запросом
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Доступ запрещен");
}

// Получаем данные из формы
$login = trim($_POST['login'] ?? '');
$pass = $_POST['pass'] ?? '';
$repeatpass = $_POST['repeatpass'] ?? '';
$email = trim($_POST['email'] ?? '');

// Проверяем, заполнены ли все поля
if (empty($login) || empty($pass) || empty($repeatpass) || empty($email)) {
    die("Заполните все поля");
}

// Проверяем, совпадают ли пароли
if ($pass !== $repeatpass) {
    die("Пароли не совпадают");
}

// Проверяем корректность email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Некорректный email");
}

// Проверяем минимальную длину пароля
if (strlen($pass) < 8) {
    die("Пароль должен содержать минимум 8 символов");
}

try {
    // Проверяем, не занят ли логин или email
    $stmt = $conn->prepare("SELECT id FROM User WHERE login = ? OR email = ?");
    $stmt->bind_param("ss", $login, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die("Логин или email уже заняты");
    }
    $stmt->close();

    // Хешируем пароль
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
    if ($hashed_pass === false) {
        throw new Exception("Ошибка при хешировании пароля");
    }

    // Вставляем данные в базу
    $stmt = $conn->prepare("INSERT INTO User (login, pass, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $login, $hashed_pass, $email);

    if ($stmt->execute()) {
        echo "Успешная регистрация";
    } else {
        throw new Exception("Ошибка при регистрации: " . $stmt->error);
    }
    
    $stmt->close();
} catch (Exception $e) {
    // Закрываем соединение в случае ошибки
    if (isset($stmt) && $stmt instanceof mysqli_stmt) {
        $stmt->close();
    }
    die($e->getMessage());
} finally {
    // Закрываем соединение с базой данных
    $conn->close();
}

?>