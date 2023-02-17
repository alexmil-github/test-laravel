<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<header>
    Шапка
{{--    <a href="{{ route('login') }}">Войти</a>--}}
    <a href="/login">Войти</a>
    <hr>
</header>

@yield('content')

<footer>
    <hr>
    Подвал
</footer>


</body>
</html>
