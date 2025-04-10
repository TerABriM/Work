<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="css/visual.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>    

<body>
    <form action="login.php" method= "post" id="panel" >
        <p>Вход</p>
        <input type="text" placeholder= "login" name= "login"> 

        <div class="password-container">
            <input type="password" id="password" placeholder="Пароль" name="pass">
            <button type="button" class="toggle-password" onclick="togglePassword('password')">
                <i class='bx bx-hide'></i>
            </button>
        </div>
        
        <button type="submit"> Войти </button>
        <a href="indexRegist.php" >Создать новую учетную запись аккаунт </a>
    </form>
    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const toggleButton = passwordInput.nextElementSibling;
            const icon = toggleButton.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bx-hide');
                icon.classList.add('bx-show');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bx-show');
                icon.classList.add('bx-hide');
            }
        }
    </script>
</body>
</html>