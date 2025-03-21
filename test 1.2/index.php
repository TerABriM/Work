
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
    <form action="register.php" method="post" id="panel" onsubmit="return validateForm()">
        <p>Регистрация</p>
        <input type="text" placeholder="Логин" name="login"> 
        <input type="password" id="inputField" placeholder="Пароль" name="pass">
        <input type="password" id="inputField" placeholder="Повторите пароль" name="repeatpass">
        <input type="text" placeholder="Email" name="email">
        

        <div class="checkbox-container">
            <label for="agreeCheckbox">Я согласен с условиями использования</label>
            <input type="checkbox" id="agreeCheckbox" name="agree">
        </div>
        
        <button type="submit">Зарегистрироваться</button>
    </form>

</body>
</html>
