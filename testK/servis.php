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
    <style>
        .slider-container {
            max-width: 800px;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            height: 400px;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slider-nav {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .slider-dot {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        .slider-dot.active {
            background-color: #007bff;
            transform: scale(1.2);
        }

        .slider-dot:hover {
            background-color: #0056b3;
        }

        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px 15px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            font-size: 18px;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo"> <a href="main.php">ВірВazar</a></div>
        <nav>
            <a href="profil.php">Мой профиль</a>
            <a href="contact.php">Контакты</a>
        </nav>
        <div>
            <a href="#">Поиск</a>
        </div>
    </header>

    <div class="slider-container">
        <div class="slider">
            <div class="slide">
                <img src="img/slide1.jpg" alt="Slide 1">
            </div>
            <div class="slide">
                <img src="img/slide2.jpg" alt="Slide 2">
            </div>
            <div class="slide">
                <img src="img/slide3.jpg" alt="Slide 3">
            </div>
            <div class="slide">
                <img src="img/slide4.jpg" alt="Slide 4">
            </div>
        </div>
        <button class="slider-arrow prev">❮</button>
        <button class="slider-arrow next">❯</button>
        <div class="slider-nav">
            <div class="slider-dot active">1</div>
            <div class="slider-dot">2</div>
            <div class="slider-dot">3</div>
            <div class="slider-dot">4</div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.querySelector('.slider');
            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.slider-dot');
            const prevBtn = document.querySelector('.prev');
            const nextBtn = document.querySelector('.next');
            
            let currentSlide = 0;
            const slideCount = slides.length;
            let slideInterval;

            function updateSlider() {
                slider.style.transform = `translateX(-${currentSlide * 100}%)`;
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSlide);
                });
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slideCount;
                updateSlider();
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + slideCount) % slideCount;
                updateSlider();
            }

            function startSlideShow() {
                slideInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
            }

            function stopSlideShow() {
                clearInterval(slideInterval);
            }

            // Event listeners
            nextBtn.addEventListener('click', () => {
                stopSlideShow();
                nextSlide();
                startSlideShow();
            });

            prevBtn.addEventListener('click', () => {
                stopSlideShow();
                prevSlide();
                startSlideShow();
            });

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    stopSlideShow();
                    currentSlide = index;
                    updateSlider();
                    startSlideShow();
                });
            });

            // Start the slideshow
            startSlideShow();

            // Pause slideshow when hovering over slider
            slider.addEventListener('mouseenter', stopSlideShow);
            slider.addEventListener('mouseleave', startSlideShow);
        });
    </script>
    
    <script src="js/script.js"></script>
</body>
</html>