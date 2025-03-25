<?php
require_once('db.php');

// Получаем данные из формы
$login = $_POST['login'] ?? '';
$pass = $_POST['pass'] ?? '';

// Проверяем, заполнены ли все поля
if (empty($login) || empty($pass)) {
    die("Заполните все поля");
}

try {
    // Используем подготовленные выражения для защиты от SQL-инъекций
    $sql = "SELECT * FROM `User` WHERE login = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        throw new Exception("Ошибка подготовки запроса");
    }

    // Привязываем параметры к запросу (только логин)
    $stmt->bind_param("s", $login);

    // Выполняем запрос
    if (!$stmt->execute()) {
        throw new Exception("Ошибка выполнения запроса");
    }

    // Получаем результат
    $result = $stmt->get_result();

    // Проверяем, есть ли пользователь
    if ($result->num_rows === 0) {
        die("Нет такого пользователя");
    }

    // Получаем данные пользователя
    $user = $result->fetch_assoc();
    
    // Проверяем пароль (предполагая, что он хранится в хэшированном виде)
    if (password_verify($pass, $user['pass'])) {
        echo "Добро пожаловать, " . htmlspecialchars($user['login']);
    } else {
        echo "Неверный пароль";
    }

    // Закрываем запрос
    $stmt->close();
} catch (Exception $e) {
    die("Ошибка: " . $e->getMessage());
} finally {
    // Закрываем соединение с базой данных
    if (isset($conn)) {
        $conn->close();
    }
}
?>
