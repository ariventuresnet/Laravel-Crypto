<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- fontawesome Icon -->
    <script src="https://kit.fontawesome.com/9d28b7cdc0.js" crossorigin="anonymous"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    {{-- test --}}

    <title>Cryptocutter</title>
</head>
<body>
    <!-- header -->
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-md nav-menu fixed-top px-md-5">
            <a href="#" class="navbar-brand"><img src="{{asset('images/cryptocutter_logo.png')}}" class="img-fluid" alt="brang logo" width="200"></a>
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
        <div class="container-fluid  px-lg-5 pt-md-4 py-lg-5 wrapper">
            <div class="row px-2">
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="#" class="btn btn-home px-lg-3 px-2 mb-2"> <span class="float-left">Exchanges</span> <span class="float-right"><i class="fab fa-stack-exchange"></i></span></a>           
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="#" class="btn btn-home px-lg-3 px-2 mb-2"> <span class="float-left">Loans</span> <span class="float-right"><i class="fas fa-money-check-alt"></i></span></a>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="#" class="btn btn-home px-lg-3 px-2 mb-2"> <span class="float-left">Cards</span> <span class="float-right"><i class="far fa-credit-card"></i></span></a>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="#" class="btn btn-home px-lg-3 px-2 mb-2"> <span class="float-left">Wallets</span> <span class="float-right"><i class="fas fa-wallet"></i></span></a>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="#" class="btn btn-home px-lg-3 px-2 mb-2"> <span class="float-left">Laws</span> <span class="float-right"><i class="fas fa-university"></i></i></span></a>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="#" class="btn btn-home px-lg-3 px-2 mb-2"> <span class="float-left">Banks</span> <span class="float-right"><i class="fas fa-money-check"></i></span></a>
                </div>
            </div>
        </div>
        <!-- end of wrapper -->

        <!-- cryptocurrency search -->
        <div class="container-fluid crypto-search px-md-5">
            <div class="row">
                <div class="col-md-12">
                    <form>
                        <div class="form-row d-flex justify-content-center">
                            <div class="search_box mr-2">
                                <label><span class="text-dark font-weight-bold">BUY</span></label>
                                <input type="text" placeholder="Search Crypto">
                            </div>
                            <div class="search_box mr-2">
                                <label><span class="text-dark font-weight-bold">IN</span></label>
                                <input type="text" placeholder="Search Country">
                            </div>
                            <div class="search_box">
                                <label><span class="text-dark font-weight-bold">WITH</span></label>
                                <input type="text" placeholder="Search Payment Method">
                                <button type="button" class="btn"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <!-- end of cryptocurrency search -->

    </header>
    <!-- end of header -->

    <section class="container-fluid mt-5">
        <div class="row px-5">
            <div class="col-md-12">
                <div class="separator">
                    Top Exchanges
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="">
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Ease Of Use</th>
                            <th scope="col">Privacy</th>
                            <th scope="col">Speed</th>
                            <th scope="col">Fees</th>
                            <th scope="col">Reputation</th>
                            <th scope="col">Limits</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($exchanges as $exchange)
                                <tr class="exchange-row">
                                    <td class="exchange-logo">
                                        <a href="{{route('cryptocurrency.show', $exchange->id)}}" class="text-dark text-nowrap"> <img src="{{asset('images/') . "/" . $exchange->logo}}" class="rounded-circle" width="25%" alt="Exchange Logo"> {{$exchange->name}}</a>
                                    </td>
                                    <td>{{$exchange->ease}}</td>
                                    <td>{{$exchange->privacy}}</td>
                                    <td>{{$exchange->speed}}</td>
                                    <td>{{$exchange->fee}}</td>
                                    <td>{{$exchange->reputation}}</td>
                                    <td>{{$exchange->limit}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- Custom Script -->
    {{-- <script src="{{asset('js/script.js')}}"></script> --}}
    <script>
        $(document).ready(function(){
            $('.nav-button').click(function(){
                $('.nav-button').toggleClass('change');
            });

        });
    </script>

</body>
</html>