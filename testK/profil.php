<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BigBazar - Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/prof.css">
</head>
<body>
    <!-- Навигационная панель -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="main.php">BigBazar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Войти</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <!-- Боковая панель -->
            <div class="col-md-3 mb-4">
                <div class="sidebar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h5 class="mb-3">Главная</h5>
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">название лота</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">цена лота</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">коммер лота</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">пиковая цена</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">полночь уставный писемую цену</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">метод доставки</a>
                                </li>
                            </ul>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <h5 class="mb-3">Ваши лоты</h5>
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">отложенные лоты</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">список желаний</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">доставка</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">настройки</a>
                                </li>
                            </ul>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <h5 class="mb-3">Контакты</h5>
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">поддержка</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Основное содержимое -->
            <div class="col-md-9">
                <div class="main-content">
                    <h2 class="mb-4">Популярные лоты</h2>
                    
                    <div class="row">
                        <!-- Пример карточки лота -->
                        <div class="col-md-4">
                            <div class="card lot-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Лот">
                                <div class="card-body">
                                    <h5 class="card-title">Название лота</h5>
                                    <p class="card-text">Описание лота и основные характеристики.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-primary fw-bold">1 499 ₽</span>
                                        <button class="btn btn-sm btn-outline-primary">В корзину</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Еще одна карточка -->
                        <div class="col-md-4">
                            <div class="card lot-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Лот">
                                <div class="card-body">
                                    <h5 class="card-title">Другой лот</h5>
                                    <p class="card-text">Еще одно описание товара с характеристиками.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-primary fw-bold">2 999 ₽</span>
                                        <button class="btn btn-sm btn-outline-primary">В корзину</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- И еще одна -->
                        <div class="col-md-4">
                            <div class="card lot-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Лот">
                                <div class="card-body">
                                    <h5 class="card-title">Премиум лот</h5>
                                    <p class="card-text">Эксклюзивный товар высшего качества.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-primary fw-bold">9 999 ₽</span>
                                        <button class="btn btn-sm btn-outline-primary">В корзину</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <h3 class="mb-3">Пиковая цена</h3>
                        <div class="alert alert-info">
                            Текущая пиковая цена: <strong>5 000 ₽</strong>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <h3 class="mb-3">Методы доставки</h3>
                        <ul class="list-group">
                            <li class="list-group-item">Курьерская доставка - 300 ₽</li>
                            <li class="list-group-item">Почта России - 150 ₽</li>
                            <li class="list-group-item">Самовывоз - бесплатно</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Подвал -->
    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>BigBazar</h5>
                    <p>Лучший маркетплейс для покупки и продажи товаров.</p>
                </div>
                <div class="col-md-3">
                    <h5>Контакты</h5>
                    <ul class="list-unstyled">
                        <li>Телефон: +7 (123) 456-7890</li>
                        <li>Email: support@bigbazar.ru</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Поддержка</h5>

                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Помощь</a></li>
                        <li><a href="#" class="text-white">FAQ</a></li>
                        <li><a href="#" class="text-white">Обратная связь</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>