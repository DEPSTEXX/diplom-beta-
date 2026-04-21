<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Внимание: DDOS Защита</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: rgba(220, 20, 60, 0.98);
            color: white;
            font-family: sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .icon {
            font-size: 80px;
            margin-bottom: 20px;
        }
        h1 {
            margin-bottom: 15px;
            font-size: 32px;
            font-weight: bold;
            text-transform: uppercase;
        }
        p {
            font-size: 20px;
            margin-bottom: 20px;
            max-width: 80%;
            line-height: 1.4;
        }
        .timer {
            background: white;
            color: crimson;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="icon">🛡️</div>
    <h1>Внимание: DDOS Защита</h1>
    <p>Ваш IP-адрес временно заблокирован из-за слишком большого количества запросов.</p>
    <div class="timer">Блокировка: 10 секунд</div>

    <script>
        // Автоматическая перезагрузка страницы через 10 секунд
        setTimeout(function() {
            window.location.reload();
        }, 10000);
    </script>
</body>
</html>
