<?php
// auction_list.php
session_start();
require_once 'digDB.php';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Получаем активные аукционы, отсортированные по дате создания (новые сначала)
    $stmt = $db->prepare("
        SELECT a.*, u.username, 
               (SELECT image_path FROM auction_images WHERE auction_id = a.id LIMIT 1) as main_image
        FROM auctions a
        JOIN users u ON a.user_id = u.id
        WHERE a.status = 'active' AND a.end_date > NOW()
        ORDER BY a.created_at DESC
        LIMIT 20
    ");
    $stmt->execute();
    $auctions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Ошибка при подключении к базе данных: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BigBazar - Новые лоты</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Навигация (как в предыдущем коде) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">BigBazar</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="tovar.php">Создать аукцион</a>
                    </li>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Мой профиль</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Выйти</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Войти</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h1>Недавно выставленные лоты</h1>
                <p class="lead">Самые свежие предложения на нашем аукционе</p>
            </div>
        </div>

        <!-- Фильтры и сортировка -->
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary active">Новые</button>
                    <button type="button" class="btn btn-outline-primary">Заканчивающиеся</button>
                    <button type="button" class="btn btn-outline-primary">С высокой ставкой</button>
                </div>
            </div>
            <div class="col-md-4">
                <select class="form-select">
                    <option selected>Все категории</option>
                    <option>Электроника</option>
                    <option>Мода</option>
                    <option>Для дома</option>
                    <option>Искусство</option>
                </select>
            </div>
        </div>

        <!-- Список лотов -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php if (count($auctions) > 0): ?>
                <?php foreach ($auctions as $auction): ?>
                    <div class="col">
                        <div class="card auction-card h-100">
                            <!-- Бейдж категории -->
                            <span class="badge bg-primary badge-category">
                                <?= htmlspecialchars($this->getCategoryName($auction['category'])) ?>
                            </span>
                            
                            <!-- Основное изображение -->
                            <?php if ($auction['main_image']): ?>
                                <img src="<?= htmlspecialchars($auction['main_image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($auction['title']) ?>">
                            <?php else: ?>
                                <div class="no-image">
                                    <span>Изображение отсутствует</span>
                                </div>
                            <?php endif; ?>
                            
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($auction['title']) ?></h5>
                                <p class="card-text text-muted">
                                    Продавец: <?= htmlspecialchars($auction['username']) ?>
                                </p>
                                <p class="card-text">
                                    <?= nl2br(htmlspecialchars(mb_strimwidth($auction['description'], 0, 100, '...'))) ?>
                                </p>
                            </div>
                            
                            <div class="card-footer bg-transparent">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="price"><?= number_format($auction['current_price'], 2) ?> ₽</div>
                                        <div class="time-left">
                                            <?= $this->getTimeLeft($auction['end_date']) ?>
                                        </div>
                                    </div>
                                    <a href="auction.php?id=<?= $auction['id'] ?>" class="btn btn-primary">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info">
                        В данный момент нет активных аукционов. Будьте первым, кто <a href="tovar.php">создаст аукцион</a>!
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Пагинация -->
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Назад</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Вперед</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Подвал (как в предыдущем коде) -->
    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>BigBazar</h5>
                    <p>Лучший маркетплейс для покупки и продажи товаров.</p>
                </div>
                <div class="col-md-4">
                    <h5>Категории</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Электроника</a></li>
                        <li><a href="#" class="text-white">Мода</a></li>
                        <li><a href="#" class="text-white">Для дома</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Поддержка</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Помощь</a></li>
                        <li><a href="#" class="text-white">FAQ</a></li>
                        <li><a href="#" class="text-white">Контакты</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Динамическое обновление времени до окончания аукциона
        function updateTimeLeft() {
            document.querySelectorAll('.time-left').forEach(el => {
                const endTime = new Date(el.dataset.endTime);
                const now = new Date();
                const diff = endTime - now;
                
                if (diff <= 0) {
                    el.textContent = 'Аукцион завершен';
                    return;
                }
                
                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                
                let timeStr = '';
                if (days > 0) timeStr += `${days}д `;
                if (hours > 0) timeStr += `${hours}ч `;
                timeStr += `${minutes}м`;
                
                el.textContent = `Осталось: ${timeStr}`;
            });
        }
        
        // Обновляем каждую минуту
        updateTimeLeft();
        setInterval(updateTimeLeft, 60000);
    </script>
</body>
</html> 