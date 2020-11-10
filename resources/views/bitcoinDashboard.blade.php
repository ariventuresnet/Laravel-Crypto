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
    <style>
        header {
            height          : 30vh;
            background      :  #fff;
        }
        h4{
            color:#f2a906;
        }
    </style>
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
                        <a href="https://t.me/thecryptocutter" target="_blank" class="nav-link m-2 menu-item text-primary"><i class="fab fa-telegram fa-3x"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://twitter.com/thecryptocutter" target="_blank" class="nav-link m-2 menu-item text-primary"><i class="fab fa-twitter fa-3x"></i></a>    
                    </li>
                </ul>
            </div>
        </nav>
        <!-- end of navbar -->

        <!-- wrapper -->
        <div class="container-fluid pt-md-4 px-md-5 pb-sm-3 wrapper">
            <div class="row">
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{URL::to('/ticker')}}" class="btn btn-home px-lg-3 px-2 mb-2" id="bitcoin"> <span class="float-left">Bitcoin Dashboard</span></a>           
                </div>
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
                {{-- <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{route('cryptowallet')}}" class="btn btn-home px-lg-3 px-2 mb-2" id="wallet"> <span class="float-left">Wallets</span> <span class="float-right"><i class="fas fa-wallet"></i></span></a>
                </div> --}}
                <div class="col-6 col-sm-4 col-lg-2">
                    {{-- <a href="#" class="btn btn-home px-lg-3 px-2 mb-2" id="more"> <span class="float-left">More</span> <span class="float-right"><i class="fas fa-ellipsis-h"></i></span></a> --}}
                    <div class="dropdown">
                        <a class="btn btn-home px-lg-3 px-2 mb-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="float-left">More</span> <span class="float-right"><i class="fas fa-ellipsis-h"></i></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('cryptowallet')}}">Wallets</a>
                            <a class="dropdown-item" href="{{route('more.cryptos')}}">Cryptos</a>
                            <a class="dropdown-item" href="{{route('more.treasuries')}}">Company Treasuries</a>
                          {{-- <a class="dropdown-item" href="#">Something</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center text-primary font-weight-bold mt-2 donate">Cryptocutter is reader-supported through donations & commissions. <a href="{{route('donate')}}">Donate now</a></p>
        </div>
        <!-- end of wrapper -->


    </header>
    <!-- end of header -->

    <div class="container-fluid px-5 py-3 bg-light">
        <div class="row mb-5">
            <div class="col-md-8">
                <h4>Bitcoin (BTC) Live Price</h3>
                <span class="font-weight-bold">$</span> <span class="display-4">15387.46</span> <span class="font-weight-bold">USD</span>
                <img src="{{asset('images/chart.png')}}" alt="chart" class="img-fluid mt-3">
            </div>
            <div class="col-md-4">
                <h4>Bitcoin Market Stats</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item py-3"><span class="float-left">24hr Range</span> <span class="float-right">$ 14,838.01- $ 15,808.71</span></li>
                    <li class="list-group-item py-3"><span class="float-left">USD Per Satoshi</span> <span class="float-right">$ 0.000158234</span></li>
                    <li class="list-group-item py-3"><span class="float-left">Satoshis Per USD</span> <span class="float-right">$ 6489</span></li>
                    <li class="list-group-item py-3"><span class="float-left">24hr Volume (BTC)</span> <span class="float-right">$ 424,384.84</span></li>
                    <li class="list-group-item py-3"><span class="float-left">24hr Volume (USD)</span> <span class="float-right">$ 285.82</span></li>
                </ul>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-md-4">
                <h4>Difficulty Stats</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="float-left">Block Height</span> <span class="float-right"> 656,284</span></li>
                    <li class="list-group-item"><span class="float-left">Time Since Last Block</span> <span class="float-right">1:09</span></li>
                    <li class="list-group-item"><span class="float-left">Average Block Time</span> <span class="float-right">9:27</span></li>
                    <li class="list-group-item"><span class="float-left">Money Supply</span> <span class="float-right">18,539,237.50 BTC</span></li>
                    <li class="list-group-item"><span class="float-left">Percentage Issued</span> <span class="float-right">88.28 %</span></li>
                    <li class="list-group-item"><span class="float-left">Chain Sizd</span> <span class="float-right">351.26 GB</span></li>
                    <li class="list-group-item"><span class="float-left">Total Transactions</span> <span class="float-right">585,452,866</span></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Mining Stats</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="float-left">Difficulty</span> <span class="float-right"> 16.79 T</span></li>
                    <li class="list-group-item"><span class="float-left">Difficulty Epoch</span> <span class="float-right">325</span></li>
                    <li class="list-group-item"><span class="float-left">Estimated Difficulty Change</span> <span class="float-right">6.01 %</span></li>
                    <li class="list-group-item"><span class="float-left">Blocks To Retarget</span> <span class="float-right">929</span></li>
                    <li class="list-group-item"><span class="float-left">Estimated Retarget Date</span> <span class="float-right">Nov 17, 2020</span></li>
                    <li class="list-group-item"><span class="float-left">Last Difficulty Change</span> <span class="float-right"> -16.05 %</span></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Blockchain Stats</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="float-left">Hash Rate (24hrs)</span> <span class="float-right"> 656,284</span></li>
                    <li class="list-group-item"><span class="float-left">Block Subsidy</span> <span class="float-right">1:09</span></li>
                    <li class="list-group-item"><span class="float-left">Block Subsidy Value</span> <span class="float-right">9:27</span></li>
                    <li class="list-group-item"><span class="float-left">Blocks Mined (24hrs)</span> <span class="float-right">18,539,237.50 BTC</span></li>
                    <li class="list-group-item"><span class="float-left">Transactions (24hrs)</span> <span class="float-right">88.28 %</span></li>
                    <li class="list-group-item"><span class="float-left">Percentage SegWit (24hrs)</span> <span class="float-right">351.26 GB</span></li>
                    <li class="list-group-item"><span class="float-left">Total Fees (24hrs)</span> <span class="float-right">585,452,866</span></li>
                    <li class="list-group-item"><span class="float-left">Average Fees Per Block (24hrs)</span> <span class="float-right">585,452,866</span></li>
                    <li class="list-group-item"><span class="float-left">Total Fees vs. Reward (24hrs)</span> <span class="float-right">585,452,866</span></li>
                </ul>
            </div>
        </div>
    </div>

    <footer class="footer mt-5">
        <div class="container">
            <div class="py-4"></div>
            <hr>
            <div class="row align-items-center justify-content-md-between py-4">
                <div class="col text-md-center">
                   <span class="footer-font-size">&copy; 2020 Cryptocutter is handcrafted by <a href="https://ariventures.net" target="_blank">Ari Ventures</a>.</span> 
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="{{asset('js/script.js')}}"></script>
        
    <!-- Custom Script -->
    @yield('custom-script')

    @include('analytics')
</body>
</html>