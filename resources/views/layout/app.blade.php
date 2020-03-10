<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mafaaza</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
</head>
<body>
    <!-- Nav -->
    @php
        $cart = Session::get('cart');
    @endphp
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">Mafaaza</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @if (!Auth::check())
                        <li class="nav-item mr-2">
                            <a href="{{ route('purchase') }}" class="btn btn-info">
                                Purchase
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('view.cart') }}">CART
                                @if ($cart !== null)
                                    @if (count($cart) > 0)
                                        {{ count($cart) }}
                                    @else 
                                        0
                                    @endif
                                @else 
                                    0
                                @endif
                            </a>
                        </li>
                    @else
                        <li class="nav-item mr-2">
                            <a href="{{ route('list.order.admin') }}" class="btn btn-info">Orders</a>
                        </li> 
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <section class="container">
        @yield('content')
    </section>
    

    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>