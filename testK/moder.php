<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель BigBazar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
        }
        .admin-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            margin-top: 0;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        .stats-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            flex: 1;
            min-width: 200px;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid #3498db;
        }
        .stat-card h3 {
            margin-top: 0;
            color: #2c3e50;
            font-size: 16px;
        }
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #3498db;
        }
        hr {
            border: 0;
            height: 1px;
            background: #eee;
            margin: 20px 0;
        }
        .user-actions {
            margin-top: 20px;
        }
        .user-actions ul {
            list-style-type: none;
            padding: 0;
        }
        .user-actions li {
            padding: 10px 15px;
            margin-bottom: 5px;
            background: #f8f9fa;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .user-actions li:hover {
            background: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>BigBazar</h1>
        
        <div class="stats-section">
            <div class="stat-card">
                <h3>Главная</h3>
                <div class="stat-value">1,245</div>
                <div>имя полы-ля</div>
            </div>
            
            <div class="stat-card">
                <h3>Услуги</h3>
                <div class="stat-value">843</div>
                <div>кол-во приоб-ых лотов</div>
            </div>
            
            <div class="stat-card">
                <h3>Контакты</h3>
                <div class="stat-value">Активен</div>
                <div>статус полы-ля</div>
                <div style="margin-top: 10px; color: #e74c3c;">кол-то жалоб: 12</div>
            </div>
        </div>
        
        <hr>
        
        <div class="user-actions">
            <h2>Список пользователей</h2>
            <ul>
                <li>черный список</li>
                <li>настройки</li>
            </ul>
        </div>
    </div>
</body>
</html>