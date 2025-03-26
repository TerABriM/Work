<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/still.css">
    <link rel="stylesheet" href="css/styl.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title><?php echo htmlspecialchars('ВірВazar', ENT_QUOTES, 'UTF-8'); ?></title>
</head>
<body>
    <header>
        <div><?php echo 'ВірВazar'; ?></div>
        <nav>
            <a href="index.php">Главная</a>
            <a href="servis.php">Услуги</a>
        </nav>
    </header>
    
    <section class="html"> 
        <div class="frame">
            <div class="content">
                <?php
                // Массив социальных сетей с иконками
                $socialLinks = [
                    [
                        'icon' => 'bxl-discord-alt',
                        'url'  => '#', // Замените на реальные ссылки
                        'title' => 'Discord'
                    ],
                    [
                        'icon' => 'bxl-telegram',
                        'url'  => '#',
                        'title' => 'Telegram'
                    ],
                    [
                        'icon' => 'bxl-whatsapp',
                        'url'  => '#',
                        'title' => 'WhatsApp'
                    ]
                ];
                
                // Выводим иконки социальных сетей
                foreach ($socialLinks as $social) {
                    echo '<a href="' . htmlspecialchars($social['url'], ENT_QUOTES, 'UTF-8') . '" 
                          title="' . htmlspecialchars($social['title'], ENT_QUOTES, 'UTF-8') . '">
                          <i class="bx ' . htmlspecialchars($social['icon'], ENT_QUOTES, 'UTF-8') . '"></i></a>';
                }
                ?>
            </div>
        </div>
    </section>

</body>
</html>
