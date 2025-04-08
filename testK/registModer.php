<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация администратора</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* styles.css */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    color: #333;
}

.admin-registration-container {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    padding: 30px;
    width: 100%;
    max-width: 500px;
    box-sizing: border-box;
}

h1 {
    color: #2c3e50;
    text-align: center;
    margin-bottom: 30px;
    font-size: 24px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #2c3e50;
}

input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

input:focus {
    border-color: #3498db;
    outline: none;
    box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
}

small {
    display: block;
    margin-top: 5px;
    color: #7f8c8d;
    font-size: 12px;
}

.register-btn {
    width: 100%;
    padding: 12px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s;
}

.register-btn:hover {
    background-color: #2980b9;
}

/* Валидация */
input:invalid {
    border-color: #e74c3c;
}

input:valid {
    border-color: #2ecc71;
}

/* Адаптивность */
@media (max-width: 600px) {
    .admin-registration-container {
        padding: 20px;
        margin: 20px;
    }
    
    h1 {
        font-size: 20px;
    }
}
</style>

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