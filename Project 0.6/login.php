 <?php
require_once('db.php');
$login = $_POST['login'];
$pass = $_POST['pass'];

if (empty($login) || empty($pass)) {
    echo "Заполните все поля";
    exit;
}

// Подключение к базе данных
$mysqli = new mysqli("localhost", "user", "pass", "db"); // Замените на реальные данные

// Проверка соединения
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

// Подготовка SQL-запроса для поиска пользователя по логину
$stmt = $mysqli->prepare("SELECT id, pass FROM users WHERE login = ?");
$stmt->bind_param("s", $login); // "s" означает string

// Выполнение запроса
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) { 
    $row = $result->fetch_assoc();
    $hashed_password = $row['pass'];

    // Проверка пароля
    if (password_verify($pass, $hashed_password)) {
        echo "Добро пожаловать, " . htmlspecialchars($row['login']);
    } else {
        echo "Неправильный логин или пароль";
    }
} else {
    echo "Пользователь не найден";
}

$stmt->close();
$mysqli->close();
?>