<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Жалобы на пользователей | BigBazar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
        }
        .admin-container {
            max-width: 1000px;
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
        .complaints-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-filter {
            display: flex;
            gap: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #3498db;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .status {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }
        .status-active {
            background-color: #d4edda;
            color: #155724;
        }
        .status-banned {
            background-color: #f8d7da;
            color: #721c24;
        }
        .status-warning {
            background-color: #fff3cd;
            color: #856404;
        }
        .complaint-count {
            display: inline-block;
            min-width: 20px;
            padding: 2px 6px;
            background-color: #e74c3c;
            color: white;
            border-radius: 10px;
            font-size: 12px;
            text-align: center;
        }
        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }
        .btn-warn {
            background-color: #ffc107;
            color: #212529;
        }
        .btn-ban {
            background-color: #dc3545;
            color: white;
        }
        .btn-details {
            background-color: #17a2b8;
            color: white;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Пользователи с жалобами</h1>
        
        <div class="complaints-header">
            <h3>Всего пользователей с жалобами: <span class="complaint-count">15</span></h3>
            <div class="search-filter">
                <input type="text" placeholder="Поиск пользователя...">
                <select>
                    <option>Все статусы</option>
                    <option>Активные</option>
                    <option>В предупреждении</option>
                    <option>Заблокированные</option>
                </select>
                <select>
                    <option>Сортировка по кол-ву жалоб</option>
                    <option>Сортировка по дате регистрации</option>
                    <option>Сортировка по алфавиту</option>
                </select>
            </div>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Пользователь</th>
                    <th>Статус</th>
                    <th>Жалобы</th>
                    <th>Последняя жалоба</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="user-info">
                            <div class="avatar">ИК</div>
                            <div>
                                <div>Иван Козлов</div>
                                <div style="font-size: 12px; color: #6c757d;">@ivan_kozlov</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="status status-warning">Предупреждение</span></td>
                    <td><span class="complaint-count">8</span></td>
                    <td>12.05.2023</td>
                    <td>
                        <button class="action-btn btn-details">Детали</button>
                        <button class="action-btn btn-warn">Предупредить</button>
                        <button class="action-btn btn-ban">Бан</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="user-info">
                            <div class="avatar">АС</div>
                            <div>
                                <div>Анна Смирнова</div>
                                <div style="font-size: 12px; color: #6c757d;">@anna_smirnova</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="status status-active">Активен</span></td>
                    <td><span class="complaint-count">5</span></td>
                    <td>05.05.2023</td>
                    <td>
                        <button class="action-btn btn-details">Детали</button>
                        <button class="action-btn btn-warn">Предупредить</button>
                        <button class="action-btn btn-ban">Бан</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="user-info">
                            <div class="avatar">ПМ</div>
                            <div>
                                <div>Петр Морозов</div>
                                <div style="font-size: 12px; color: #6c757d;">@petr_morozov</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="status status-banned">Заблокирован</span></td>
                    <td><span class="complaint-count">12</span></td>
                    <td>28.04.2023</td>
                    <td>
                        <button class="action-btn btn-details">Детали</button>
                        <button class="action-btn btn-warn">Разблокировать</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="user-info">
                            <div class="avatar">ОЛ</div>
                            <div>
                                <div>Ольга Лебедева</div>
                                <div style="font-size: 12px; color: #6c757d;">@olga_lebed</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="status status-active">Активен</span></td>
                    <td><span class="complaint-count">3</span></td>
                    <td>02.05.2023</td>
                    <td>
                        <button class="action-btn btn-details">Детали</button>
                        <button class="action-btn btn-warn">Предупредить</button>
                        <button class="action-btn btn-ban">Бан</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="user-info">
                            <div class="avatar">ДК</div>
                            <div>
                                <div>Дмитрий Кузнецов</div>
                                <div style="font-size: 12px; color: #6c757d;">@dkuznetsov</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="status status-warning">Предупреждение</span></td>
                    <td><span class="complaint-count">6</span></td>
                    <td>10.05.2023</td>
                    <td>
                        <button class="action-btn btn-details">Детали</button>
                        <button class="action-btn btn-warn">Предупредить</button>
                        <button class="action-btn btn-ban">Бан</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>