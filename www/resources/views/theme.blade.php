@php use App\Services\CartService; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/style.css?v={{time()}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <span class="fs-2" style="color: burlywood">Студия йоги</span>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
                @guest
                    <li class="nav-item"><a href="{{route('login')}}" class="nav-link active">Войти</a></li>
                @endguest
                @auth
                    <li class="nav-item"><a href="{{route('cart')}}" class="nav-link">Корзина (<span class="cart-count">{{CartService::sum()['count']}}</span>)</a></li>{{-- статические методы вызываются через ::   --}}
                    <li class="nav-item"><a href="{{route('cabinet')}}" class="nav-link">Личный кабинет</a></li>
                    <li class="nav-item"><a href="{{route('logout')}}" class="nav-link active">Выйти</a></li>
                @endauth
            </ul>
        </a>
    </header>
</div>


<main class="container">
    @yield('content', '')
</main>

<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top"><p
            class="col-md-4 mb-0 text-body-secondary">© 2025 Company, Inc</p> <a href="/"
                                                                                 class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"
                                                                                 aria-label="Bootstrap">
            <svg class="bi me-2" width="40" height="32" aria-hidden="true">
                <use xlink:href="#bootstrap"></use>
            </svg>
        </a>
        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
        </ul>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/script.js?t={{time()}}"></script>

</body>
</html>
