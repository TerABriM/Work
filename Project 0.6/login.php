<?php
require_once('db.php');
$login = $_POST['login'];
$pass = $_POST['pass'];

$mysqli = new mysqli("user", "pass", "db.php");

// Проверка соединения
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

// Подготовка SQL-запроса для поиска пользователя по логину
$stmt = $mysqli->prepare("SELECT id, password FROM users WHERE login = ?");
$stmt->bind_param("s", $login); // "s" означает string

// Выполнение запроса
$stmt->execute();
$result = $stmt->get_result();

if (empty($login) || empty($pass))
{
    echo "Заполните все поля";
} else {
    $sql = "SELECT * FROM `Users` WHERE login = '$login' AND pass = '$pass'";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo " Добро пожаловать" .$row['login'];
        }
    } else {
       echo "Нет такого";
    }
}
?>