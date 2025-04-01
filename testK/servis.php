<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/still.css">
    <link rel="stylesheet" href="css/styl.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ВірВazar</title>
</head>
<body>
    <header>
        <div>ВірВazar</div>
        <nav>
            <a href="profil.php">Мой профиль</a>
            <a href="index.php">Главная</a>
            <a href="servis.php">Контакты</a>
        </nav>
        <div>
            <a href="#">Поиск</a>
        </div>
    </header>
    
    <section class="senter">
        <div class="blockSlider" id="blockSlider">
            <div class="FullArea">
                <div class="imagesArea">
                    <?php
                    // Массив изображений для слайдера
                    $sliderImages = [
                        "",
                        "",
                        "",
                        ""
                    ];
                    
                    foreach ($sliderImages as $image) {
                        echo '<img class="imageSlider" src="'.$image.'" alt="">';
                    }
                    ?>
                </div>
                
                <div class="pointsAreaSize">
                    <?php
                    // Создаем точки для навигации
                    for ($i = 0; $i < count($sliderImages); $i++) {
                        echo '<span class="point"></span>';
                    }
                    ?>
                </div>
                
                <div class="btnsAreaSize">
                    <div class="blockArrow" id="leftBtn"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                    <div class="blockArrow" id="rightBtn"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </section>

    <section>
                    Стать аукционером
    </section>
    
    <script src="js/script.js"></script>
</body>
</html>