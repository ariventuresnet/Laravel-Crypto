<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- fontawesome Icon -->
    <script src="https://kit.fontawesome.com/9d28b7cdc0.js" crossorigin="anonymous"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('autocomplete/jquery.auto-complete.css')}}">
    
    @yield('custom-css')

    <title>Responsible Bitcoin & Cryptocurrency knowledge & reviews</title>
</head>
<body>
    <!-- header -->
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-md nav-menu fixed-top px-md-5">
            <a href="{{ URL::to('/') }}" class="navbar-brand"><img src="{{asset('images/cryptocutter_logo.png')}}" class="img-fluid" alt="brang logo" width="200"></a>
            <button class="navbar-toggler nav-button" type="button" data-toggle="collapse" data-target="#myNavbar">
                <div class="bg-dark line1"></div>
                <div class="bg-dark line2"></div>
                <div class="bg-dark line3"></div>
            </button>
            <div class="collapse navbar-collapse justify-content-end text-uppercase font-weight-bold" id="myNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="https://t.me/thecryptocutter" class="nav-link m-2 menu-item text-primary"><i class="fab fa-telegram fa-3x"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- end of navbar -->

        <!-- wrapper -->
        <div class="container-fluid pt-md-4 px-md-5 pb-sm-3 wrapper">
            <div class="row">
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{URL::to('/')}}" class="btn btn-home px-lg-3 px-2 mb-2" id="exchange"> <span class="float-left">Exchanges</span> <span class="float-right"><i class="fab fa-stack-exchange"></i></span></a>           
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{route('cryptocard')}}" class="btn btn-home px-lg-3 px-2 mb-2" id="card"> <span class="float-left">Cards</span> <span class="float-right"><i class="far fa-credit-card"></i></span></a>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{route('cryptoloan')}}" class="btn btn-home px-lg-3 px-2 mb-2" id="loan"> <span class="float-left">Loans</span> <span class="float-right"><i class="fas fa-money-check"></i></span></a>
                </div>
                
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{route('cryptointerest.accounts')}}" class="btn btn-home px-lg-3 px-2 mb-2" id="interest"> <span class="float-left">Interest</span> <span class="float-right"><i class="fas fa-money-check-alt"></i></span></a>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{route('cryptowallet')}}" class="btn btn-home px-lg-3 px-2 mb-2" id="wallet"> <span class="float-left">Wallets</span> <span class="float-right"><i class="fas fa-wallet"></i></span></a>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="#" class="btn btn-home px-lg-3 px-2 mb-2" id="more"> <span class="float-left">More</span> <span class="float-right"><i class="fas fa-ellipsis-h"></i></span></a>
                </div>
            </div>
            <p class="text-center text-primary font-weight-bold mt-2 donate">Cryptocutter is reader-supported through donations & commissions. <a href="{{route('donate')}}">Donate now</a></p>
        </div>
        <!-- end of wrapper -->

        @yield('searchbox-content')

    </header>
    <!-- end of header -->

    @yield('main-content')


    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="{{asset('js/script.js')}}"></script>
        
    <!-- Custom Script -->
    @yield('custom-script')

    @include('analytics')
</body>
</html>