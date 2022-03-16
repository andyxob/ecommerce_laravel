<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>@yield("title") </title>
</head>
<body>
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="{{route('index')}}"
       class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Laravel ecommerce</span>
    </a>

    <ul class="nav nav-pills">

        <li class="nav-item"><a href="{{route("index")}}" class="nav-link @if(Route::currentRouteNamed('index')) active @endif" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="{{route("categories")}}" class="nav-link @if(Route::currentRouteNamed('categor*')) active @endif">Categories</a></li>
        <li class="nav-item"><a href="{{route("basket")}}" class="nav-link @if(Route::currentRouteNamed('basket*')) active @endif">Basket</a></li>
        @guest
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
        @endguest

        @auth

            @if(Auth::user()->is_admin==1)
                <a class="nav-link" href="{{route('orders')}}">Admin page</a>

            @else
                <li class="nav-item"><a href="{{route('person.orders.index')}}" class="nav-link">My orders</a></li>
            @endif
            <li class="">
                <a id="" class="" href="{{route('index')}}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="nav-item">
                    <a class="nav-item href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endauth

    </ul>
</header>

<div class="container">
    @if(session()->has('success'))
        <p class="alert alert-success">{{session()->get('success')}}</p>
    @endif

    @yield('content')
</div>

<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">© 2022 Galiorka Inc.</p>

    <a href="{{route('index')}}"
       class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
    </a>

    <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="{{route("index")}}" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="{{route("categories")}}" class="nav-link">Categories</a></li>
        <li class="nav-item"><a href="{{route("basket")}}" class="nav-link">Basket</a></li>
        @guest
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
        @endguest

        @auth

            @if(Auth::user()->isAdmin())
                <a class="nav-link" href="{{route('orders')}}">Admin page</a>
            @else
                <li class="nav-item"><a href="{{route('person.orders.index')}}" class="nav-link">My orders</a></li>
            @endif

            <li class="">
                <a id="" class="" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="nav-item">
                    <a class="" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endauth

    </ul>
</footer>
</body>
</html>
