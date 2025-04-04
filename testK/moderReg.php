<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация модератора</title>
    <link rel="stylesheet" href="css/visual.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        form {
            max-width: 450px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .cen {
            text-align: center;
            margin-bottom: 25px;
        }
        .cen p {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .password-container {
            position: relative;
            margin-bottom: 15px;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 10px;
            background: none;
            border: none;
            cursor: pointer;
            color: #7f8c8d;
        }
        a {
            color: #3498db;
            text-decoration: none;
            display: block;
            margin: 10px 0;
            font-size: 14px;
        }
        .checkbox-container {
            display: flex;
            align-items: center;
            margin: 15px 0;
        }
        .checkbox-label {
            margin-left: 10px;
            font-size: 14px;
        }
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #2980b9;
        }
        button[type="submit"]:disabled {
            background-color: #bdc3c7;
            cursor: not-allowed;
        }
        .moderator-badge {
            background-color: #e74c3c;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <form action="register_moderator.php" method="post" id="panel" onsubmit="return validateFormAndRedirect()">
        <div class="cen">
            <p>Регистрация модератора <span class="moderator-badge">MOD</span></p>
        </div>    
        
        <input type="text" placeholder="Придумайте логин" name="login" required>
        
        <div class="password-container">
            <input type="password" id="password" placeholder="Придумайте пароль" name="pass" required minlength="8">
            <button type="button" class="toggle-password" onclick="togglePassword('password')">
                <i class='bx bx-hide'></i>
            </button>
        </div>
        
        <input type="password" id="repeatpass" placeholder="Повторите пароль" name="repeatpass" required>
        
        <input type="email" placeholder="Корпоративный email" name="email" required pattern="[a-zA-Z0-9._%+-]+@bigbazar\.com$" title="Используйте корпоративный email BigBazar">
        
        <select name="department" required>
            <option value="" disabled selected>Выберите отдел</option>
            <option value="content">Контент-модерация</option>
            <option value="users">Модерация пользователей</option>
            <option value="support">Техподдержка</option>
            <option value="security">Безопасность</option>
        </select>
        
        <input type="text" placeholder="Кодовое слово (выдано администратором)" name="access_code" required>
        
        <a href="word/moderator_policy.docx" target="_blank">Политика модерации BigBazar</a>
        
        <div class="checkbox-container">
            <input type="checkbox" class="custom-checkbox" id="terms" name="terms" required>
            <span class="checkbox-label">Я согласен с политикой конфиденциальности и правилами модерации</span>
        </div>
        
        <div class="checkbox-container">
            <input type="checkbox" class="custom-checkbox" id="nda" name="nda" required>
            <span class="checkbox-label">Я принимаю условия соглашения о неразглашении (NDA)</span>
        </div>
        
        <button type="submit" id="submitBtn">Отправить заявку</button>
        <a href="admin_login.php">Уже есть доступ? Войти</a>
    </form>
    
    <script src="js/java.js"></script>
    <script>
        function validateFormAndRedirect() {
            if (validateModeratorForm()) {
                fetch('register_moderator.php', {
                    method: 'POST',
                    body: new FormData(document.getElementById('panel'))
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = 'moderator_pending.php';
                    } else {
                        alert('Ошибка при отправке заявки');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Произошла ошибка при отправке данных');
                });
                return false;
            }
            return false;
        }
        
        function validateModeratorForm() {
            const password = document.getElementById('password').value;
            const repeatpass = document.getElementById('repeatpass').value;
            
            if (password !== repeatpass) {
                alert('Пароли не совпадают!');
                return false;
            }
            
            if (password.length < 8) {
                alert('Пароль должен содержать минимум 8 символов');
                return false;
            }
            
            return true;
        }
        
        function togglePassword(id) {
            const input = document.getElementById(id);
            const icon = input.nextElementSibling.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bx-hide', 'bx-show');
            } else {
                input.type = 'password';
                icon.classList.replace('bx-show', 'bx-hide');
            }
        }
        
        // Валидация email на соответствие корпоративному домену
        document.querySelector('input[name="email"]').addEventListener('blur', function() {
            if (!this.value.endsWith('@bigbazar.com')) {
                this.setCustomValidity('Используйте корпоративный email BigBazar');
            } else {
                this.setCustomValidity('');
            }
        });
    </script>
</body>
</html>
