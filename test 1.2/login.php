<?php
require_once('db.php');

// Получаем данные из формы
$login = $_POST['login'];
$pass = $_POST['pass'];

// Проверяем, заполнены ли все поля
if (empty($login) || empty($pass)) {
    echo "Заполните все поля";
} else {
    // Используем подготовленные выражения для защиты от SQL-инъекций
    $sql = "SELECT * FROM `Users` WHERE login = ? AND pass = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Привязываем параметры к запросу
        $stmt->bind_param("ss", $login, $pass);

        // Выполняем запрос
        $stmt->execute();

        // Получаем результат
        $result = $stmt->get_result();

        // Проверяем, есть ли результаты
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Добро пожаловать, " . $row['login'];
            }
        } else {
            echo "Нет такого пользователя";
        }

        // Закрываем запрос
        $stmt->close();
    } else {
        echo "Ошибка подготовки запроса";
    }
}

// Закрываем соединение с базой данных
$conn->close();
?>