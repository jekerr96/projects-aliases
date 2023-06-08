<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Алиасы</title>
    <link rel="stylesheet" href="/css/style.css?{{ filemtime(public_path('css/style.css')) }}">
</head>
<body>
    @if ($login)
        <div class="content-container" style="margin-top: 32px; margin-bottom: 32px;">
            Привет, <strong>{{ $login }}</strong>!
        </div>
    @endif
    <div id="app"></div>
    <script src="/js/app.js"></script>
</body>
</html>
