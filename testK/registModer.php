<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация администратора</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="admin-registration-container">
        <h1>Регистрация администратора</h1>
        <form id="adminRegistrationForm" action="register.php" method="POST">
            <div class="form-group">
                <label for="fullName">Полное имя:</label>
                <input type="text" id="fullName" name="fullName" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="username">Логин:</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" required minlength="8">
                <small>Минимум 8 символов</small>
            </div>
            
            <div class="form-group">
                <label for="confirmPassword">Подтвердите пароль:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            
            <div class="form-group">
                <label for="adminKey">Ключ администратора:</label>
                <input type="password" id="adminKey" name="adminKey" required>
                <small>Должен быть предоставлен существующим администратором</small>
            </div>
            
            <button type="submit" class="register-btn">Зарегистрировать</button>
        </form>
    </div>

    <script src="js/scr.js"></script>
</body>
</html>