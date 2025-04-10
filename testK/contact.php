<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/still.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>ВірВazar</title>
    <style>
        .frame {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .info {
            margin: 20px 0;
        }

        .info p {
            margin: 10px 0;
            font-size: 16px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            transition: transform 0.3s;
        }

        .social-icon:hover {
            transform: scale(1.2);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo"><a href="main.php">ВірВazar</a></div>
        <nav>
            <a href="profil.php">Мой профиль</a>
            <a href="servis.php">Услуги</a>
            <a href="contact.php">Контакты</a>
        </nav>
        <div>
            <a href="#">Поиск</a>
        </div>
    </header>

    <div class="frame">
        <h1>Контактная информация</h1>
        
        <div class="info">
            <p><strong>ФИО:</strong> Иванов Иван Иванович</p>
            <p><strong>Почта:</strong> example@email.com</p>
            <p><strong>Адрес:</strong> г. Москва, ул. Примерная, д. 1</p>
        </div>
        
        <div class="social-icons">
            <a href="https://t.me/your_telegram" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" alt="Telegram" class="social-icon">
            </a>
            <a href="https://wa.me/your_whatsapp" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" class="social-icon">
            </a>
            <a href="https://vk.com/your_vk" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/VK.com-logo.svg" alt="VKontakte" class="social-icon">
            </a>
        </div>
    </div>
</body>
</html>