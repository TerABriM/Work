<!DOCTYPE html>
<html lang="ru">
<link rel="stylesheet" href="css/tovar.css">
    <!-- В create_auction_form.php -->
<form action="create_auction.php" method="POST" enctype="multipart/form-data" class="p-3" id="auctionForm">
    <!-- CSRF защита -->
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

    <a href="main.php">назад</a>

    <div class="mb-3">
        <label class="form-label">Название товара*</label>
        <input type="text" name="title" class="form-control" required maxlength="255">
        <div class="form-text">Максимум 255 символов</div>
    </div>

    <div class="mb-3">
        <label class="form-label">Описание*</label>
        <textarea name="description" class="form-control" rows="5" required></textarea>
    </div>

    <div class="row g-2 mb-3">
        <div class="col-md-6">
            <label class="form-label">Стартовая цена (₽)*</label>
            <div class="input-group">
                <input type="number" name="start_price" class="form-control" step="0.01" min="1" required>
                <span class="input-group-text">.00</span>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Шаг ставки (₽)*</label>
            <input type="number" name="bid_step" class="form-control" value="100" min="10" required>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Дата окончания аукциона*</label>
        <input type="datetime-local" name="end_date" class="form-control" required 
               min="<?= date('Y-m-d\TH:i', strtotime('+1 day')) ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Категория*</label>
        <select name="category" class="form-select" required>
            <option value="" disabled selected>Выберите категорию</option>
            <option value="electronics">Электроника</option>
            <option value="fashion">Мода</option>
            <option value="home">Для дома</option>
            <option value="art">Искусство</option>
            <option value="other">Другое</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Изображения товара (макс. 5)*</label>
        <input type="file" name="images[]" class="form-control" multiple accept="image/*" required>
        <div class="form-text">Первое изображение будет основным. Максимальный размер файла - 5MB</div>
    </div>

    <div class="mb-3">
        <label class="form-label">Метод доставки*</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="delivery" value="courier" id="delivery1" checked>
            <label class="form-check-label" for="delivery1">
                Курьерская доставка (+300₽)
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="delivery" value="post" id="delivery2">
            <label class="form-check-label" for="delivery2">
                Почта России (+150₽)
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="delivery" value="pickup" id="delivery3">
            <label class="form-check-label" for="delivery3">
                Самовывоз (бесплатно)
            </label>
        </div>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="termsCheck" required>
        <label class="form-check-label" for="termsCheck">
            Я согласен с <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">правилами проведения аукционов</a>*
        </label>
    </div>

    <button type="submit" class="btn btn-primary w-100" href="servis.php" >Выставить на аукцион</button>
</form>

<!-- Модальное окно с правилами -->
<div class="modal fade" id="termsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Правила проведения аукционов</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Содержимое правил -->
                <p>1. Продавец обязан предоставить точное описание товара.</p>
                <p>2. Стартовая цена должна быть реальной.</p>
                <p>3. После завершения аукциона продавец обязан связаться с победителем в течение 24 часов.</p>
                <!-- И т.д. -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<script>
// Клиентская валидация
document.getElementById('auctionForm').addEventListener('submit', function(e) {
    const files = document.querySelector('input[name="images[]"]').files;
    if (files.length > 5) {
        alert('Максимальное количество изображений - 5');
        e.preventDefault();
        return false;
    }
    
    for (let i = 0; i < files.length; i++) {
        if (files[i].size > <?= $max_file_size ?>) {
            alert(`Файл ${files[i].name} слишком большой. Максимальный размер - 5MB`);
            e.preventDefault();
            return false;
        }
    }
    
    return true;
});
</script>
</html>
