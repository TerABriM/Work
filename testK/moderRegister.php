<?php
require_once('db.php');

// Проверяем, что запрос является POST-запросом
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die(json_encode(['status' => 'error', 'message' => 'Доступ запрещен']));
}

// Получаем данные из формы
$login = trim($_POST['login'] ?? '');
$pass = $_POST['pass'] ?? '';
$repeatpass = $_POST['repeatpass'] ?? '';
$email = trim($_POST['email'] ?? '');
$department = $_POST['department'] ?? '';
$access_code = trim($_POST['access_code'] ?? '');
$terms = isset($_POST['terms']) ? 1 : 0;
$nda = isset($_POST['nda']) ? 1 : 0;

// Проверяем, заполнены ли все обязательные поля
if (empty($login) || empty($pass) || empty($repeatpass) || empty($email) || empty($department) || empty($access_code)) {
    die(json_encode(['status' => 'error', 'message' => 'Заполните все обязательные поля']));
}

// Проверяем согласия с условиями
if (!$terms || !$nda) {
    die(json_encode(['status' => 'error', 'message' => 'Необходимо принять все условия и соглашения']));
}

// Проверяем, совпадают ли пароли
if ($pass !== $repeatpass) {
    die(json_encode(['status' => 'error', 'message' => 'Пароли не совпадают']));
}

// Проверяем минимальную длину пароля
if (strlen($pass) < 8) {
    die(json_encode(['status' => 'error', 'message' => 'Пароль должен содержать минимум 8 символов']));
}

// Проверяем корпоративный email
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@bigbazar\.com$/', $email)) {
    die(json_encode(['status' => 'error', 'message' => 'Используйте корпоративный email BigBazar']));
}

// Проверяем кодовое слово (в реальном проекте должно быть сложнее)
$valid_access_codes = ['MOD2024', 'BIGMOD', 'SECURE123']; // В реальном проекте хранить в БД или конфиге
if (!in_array($access_code, $valid_access_codes)) {
    die(json_encode(['status' => 'error', 'message' => 'Неверное кодовое слово']));
}

try {
    // Проверяем, не занят ли логин или email
    $stmt = $conn->prepare("SELECT id FROM Moderators WHERE login = ? OR email = ?");
    $stmt->bind_param("ss", $login, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die(json_encode(['status' => 'error', 'message' => 'Логин или email уже заняты']));
    }
    $stmt->close();

    // Хешируем пароль
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
    if ($hashed_pass === false) {
        throw new Exception("Ошибка при хешировании пароля");
    }

    // Вставляем данные в базу (статус по умолчанию - "на рассмотрении")
    $status = 'pending';
    $stmt = $conn->prepare("INSERT INTO Moderators (login, pass, email, department, access_code, status, created_at) 
                           VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssss", $login, $hashed_pass, $email, $department, $access_code, $status);

    if ($stmt->execute()) {
        // Логируем заявку в отдельную таблицу для админов
        $moderator_id = $stmt->insert_id;
        $stmt_log = $conn->prepare("INSERT INTO ModeratorRequests (moderator_id, department, request_date) 
                                   VALUES (?, ?, NOW())");
        $stmt_log->bind_param("is", $moderator_id, $department);
        $stmt_log->execute();
        $stmt_log->close();
        
        echo json_encode(['status' => 'success', 'message' => 'Заявка отправлена на рассмотрение']);
    } else {
        throw new Exception("Ошибка при регистрации: " . $stmt->error);
    }
    
    $stmt->close();
} catch (Exception $e) {
    // Закрываем соединение в случае ошибки
    if (isset($stmt) && $stmt instanceof mysqli_stmt) {
        $stmt->close();
    }
    die(json_encode(['status' => 'error', 'message' => $e->getMessage()]));
} finally {
    // Закрываем соединение с базой данных
    $conn->close();
}
?>