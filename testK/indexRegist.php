
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/css/visual.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <form action="register.php" method="post" id="panel" onsubmit="return validateForm()">
        <div class="cen">
            <p>Регистрация</p>
        </div>    
        <input type="text" placeholder="Логин" name="login"> 
        <input type="password" id="inputField" placeholder="Пароль" name="pass">
        <input type="password" id="inputField" placeholder="Повторите пароль" name="repeatpass">
        <input type="text" placeholder="Email" name="email">
        <a href="word/wd.docx" target="_blank">Ознакомиться с условиями пользования</a>

        <div class="checkbox-container">
            <span class="checkbox-label">Согласен с условиями</span>
            <input type="checkbox" class="custom-checkbox" id="terms" name="terms" required>
        </div>

        <button type="submit" id="submitBtn" disabled>Зарегистрироваться</button>
        <a href="php/login.php" >Уже есть учетная запись </a>

    </form>
    <script src="/js/java.js"></script>
</body>
</html>
