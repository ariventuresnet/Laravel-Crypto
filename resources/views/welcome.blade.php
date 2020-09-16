<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('images/home-title-img.jpg')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/home-style.css')}}">
    <title>CryptoCutter</title>
</head>
<body>
  
    <!-- header -->
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-md fixed-top nav-menu">
            <a href="#" class="navbar-brand text-light text-uppercase"><span class="h2 font-weight-bold">CryptoCutter</span></a>
            <button class="navbar-toggler nav-button" type="button" data-toggle="collapse" data-target="#myNavbar">
                <div class="bg-light line1"></div>
                <div class="bg-light line2"></div>
                <div class="bg-light line3"></div>
            </button>
            <div class="collapse navbar-collapse justify-content-end text-uppercase font-weight-bold" id="myNavbar">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link m-2 menu-item nav-active">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link m-2 menu-item">Mission</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link m-2 menu-item">Collection</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link m-2 menu-item">Gallery</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link m-2 menu-item">Contact</a>
                </li>
                </ul>
            </div>
        </nav>
        <!-- end of navbar -->
        
        <div class="container-fluid wrapper">
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-home text-center mr-2 mb-2 px-5 py-4">Exchanges</a >
                    <a href="#" class="btn btn-home text-center mr-2 mb-2 px-5 py-4">Loans</a >
                    <a href="#" class="btn btn-home text-center mr-2 mb-2 px-5 py-4">Cards</a >
                    <a href="#" class="btn btn-home text-center mr-2 mb-2 px-5 py-4">Wallets</a >
                    <a href="#" class="btn btn-home text-center mr-2 mb-2 px-5 py-4">Laws</a >
                    <a href="#" class="btn btn-home text-center mr-2 mb-2 px-5 py-4">Banks</a >
                </div>
            </div>
        </div>

        <!-- banner -->
        <div class="text-light text-md-right text-center banner">
            <h1 class="display-4 banner-heading">Welcome to Cryptocutter</h1>
            <p class="lead banner-par">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        </div>
        <!-- end of banner -->

        <div class="container search-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <label for="bue"><span class="text-white font-weight-bold">BUY</span></label>
                                <input type="text" class="form-control py-3" id="bue" placeholder="Search Crypto">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="in"><span class="text-white font-weight-bold">IN</span></label>
                                <input type="text" class="form-control py-3" id="in" placeholder="Search Country">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="with"><span class="text-white font-weight-bold">WITH</span></label>
                                <input type="text" class="form-control py-3" id="with" placeholder="Search Payment Method">
                            </div>
                            <div><button type="button" class="btn btn-light active search-button"><i class="fas fa-search text-danger"></i></button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </header>
    <!-- end of header -->

    <section class="p-5 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
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
                          <tr>
                            <td><a href="" class="text-dark"> Mark</a></td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <td><a href="" class="text-dark"> Jacob</a></td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <td><a href="" class="text-dark"> Larry the Bird</a></td>
                            <td>Thornton</td>
                            <td>@twitter</td>
                            <td>Larry the Bird</td>
                            <td>Thornton</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                          </tr>
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </section>

    <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>