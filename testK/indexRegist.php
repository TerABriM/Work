<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/visual.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
<body>
    <form action="register.php" method="post" id="panel" onsubmit="return validateFormAndRedirect()">
        <div class="cen">
            <p>Регистрация</p>
        </div>    
        <input type="text" placeholder="логин" name="login"> 
        <div class="password-container">
            <input type="password" id="password" placeholder="пароль" name="pass">
            <button type="button" class="toggle-password" onclick="togglePassword('password')">
                <i class='bx bx-hide'></i>
            </button>
        </div>
        <input type="password" id="inputField" placeholder="повторить пароль" name="repeatpass">
        
        <input type="text" placeholder="email" name="email">
        <a href="word/wd.docx" target="_blank">Ознакомиться с условиями пользования</a>

        <div class="checkbox-container">
            <span class="checkbox-label">Согласиться с условиями пользования</span>
            <input type="checkbox" class="custom-checkbox" id="terms" name="terms" required>
        </div>

        <button type="submit" id="submitBtn" disabled>Зарегистрироваться</button>
        <a href="login.php">Войти в учетную запись</a>
    </form>
    <script src="js/java.js"></script>
    <script>
               function validateFormAndRedirect() {
            // Ваша существующая валидация формы
            if (validateForm()) {
                // Если форма валидна, отправляем данные
                fetch('register.php', {
                    method: 'POST',
                    body: new FormData(document.getElementById('panel'))
                })
                .then(response => {
                    if (response.ok) {
                        // Перенаправляем на другую страницу после успешной регистрации
                        window.location.href = 'main.php'; // Или любая другая страница
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
                
                return false; // Предотвращаем стандартную отправку формы
            }
            return false;
        }
        
        // Оригинальная функция validateForm (должна возвращать true/false)
        function validateForm() {
            // Ваша существующая логика валидации
            // ...
            return true; // или false в зависимости от проверок
        } 
    </script>
</body>
</html>
