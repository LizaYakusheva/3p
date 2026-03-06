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
<body class="min-vh-100">

<div class="container min-vh-100">
    <main class="d-flex flex-nowrap min-vh-100">

        {{--SIDEBAR--}}
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary " ><a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <div class="dropdown"><a href="#" class=" d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>Меню</strong> </a>
                    <ul class="dropdown-menu text-small shadow">
                        <li><a href="/" class="dropdown-item">Главная</a></li>
                        @guest
                            <li><a href="{{route('login')}}" class="dropdown-item">Войти</a></li>
                        @endguest
                        @auth
                            <li><a href="{{route('logout')}}" class="dropdown-item active">Выйти</a>
                            </li>
                        @endauth
                    </ul>
                    <ul class="dropdown-menu text-small shadow">
                        <li><a class="dropdown-item" href="#">Личный кабинет</a></li>
                        <li><a class="dropdown-item" href="#">Главная</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Выход</a></li>
                    </ul>
                </div>
            <hr>
                <h5>Записи клиентов</h5>
            <ul class="nav nav-pills flex-column mb-auto">
                <li><a href="{{route('cabinet')}}" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                            <use xlink:href="#speedometer2"></use>
                        </svg>
                        Записи на практики
                    </a></li>
                <li class="nav-item"><a href="{{route('events.index')}}" class="nav-link link-body-emphasis" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                            <use xlink:href="#home"></use>
                        </svg>
                        Записи на онлайн-курсы
                    </a></li>
                <li class="nav-item"><a href="{{route('ordersAdmin')}}" class="nav-link link-body-emphasis" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                            <use xlink:href="#home"></use>
                        </svg>
                        Покупки и доставка
                    </a></li>
                <hr>
                <h5>Создать новое</h5>
                <li class="nav-item"><a href="{{route('events.index')}}" class="nav-link link-body-emphasis" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                            <use xlink:href="#home"></use>
                        </svg>
                        Практики
                    </a></li>
                <li><a href="{{route('teachers.index')}}" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                            <use xlink:href="#speedometer2"></use>
                        </svg>
                        Преподаватели
                    </a></li>
                <li><a href="{{route('subscriptions.index')}}" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                            <use xlink:href="#table"></use>
                        </svg>
                        Абонементы
                    </a></li>
                <li><a href="{{route('courses.index')}}" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Онлайн-курсы
                    </a></li>
                <li><a href="{{route('products.index')}}" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Товары
                    </a></li>
            </ul>
        </div>
        {{--END SIDEBAR--}}

        {{--HEADER--}}
        <div>
            <div class="container">
                <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                    <a href="/"
                       class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                        <span class="fs-2" style="color: burlywood">Студия йоги</span>
                    </a>
                </header>
            </div>
            {{--END HEADER--}}

            {{--CONTENT--}}
            @yield('content', '')
            {{--END CONTENT--}}
        </div>
    </main>
</div>

{{--FOOTER--}}
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top"><p
            class="col-md-4 mb-0 text-body-secondary">© 2025 Company, Inc</p> <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none" aria-label="Bootstrap">
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
{{--END FOOTER--}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
