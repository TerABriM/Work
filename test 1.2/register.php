<?php
require_once('db.php');

// Получаем данные из формы
$login = $_POST['login'];
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatpass'];
$email = $_POST['email'];

// Проверяем, заполнены ли все поля
if (empty($login) || empty($pass) || empty($repeatpass) || empty($email)) {
    echo "Заполните все поля";
} else {
    // Проверяем, совпадают ли пароли
    if ($pass !== $repeatpass) {
        echo "Пароли не совпадают";
    } else {
        // Проверяем корректность email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Некорректный email";
        } else {
            // Проверяем, не занят ли логин или email
            $stmt = $conn->prepare("SELECT id FROM users WHERE login = ? OR email = ?");
            $stmt->bind_param("ss", $login, $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                echo "Логин или email уже заняты";
            } else {
                // Хешируем пароль
                $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

                // Вставляем данные в базу
                $stmt = $conn->prepare("INSERT INTO users (login, pass, email) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $login, $hashed_pass, $email);

                if ($stmt->execute()) {
                    echo "Успех";
                } else {
                    echo "Ошибка: " . $stmt->error;
                }
            }

            // Закрываем запрос
            $stmt->close();
        }
    }
}

// Закрываем соединение с базой данных
$conn->close();
?>
