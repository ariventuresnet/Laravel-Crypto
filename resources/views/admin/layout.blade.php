<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- fontawesome Icon -->
    <script src="https://kit.fontawesome.com/9d28b7cdc0.js" crossorigin="anonymous"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- External Css File -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('custom-stylesheet')

    <title>Admin Dashboard</title>
</head>
<body>

    <!-- navbar -->
    <div class="navbar navbar-expand-md navbar-light">
        
        <button type="button" class="navbar-toggler bg-light ml-auto mb-2" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="myNavbar">
            <div class="container-fluid">
                <div class="row">
                    <!-- sidebar -->
                    <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">  <!--'sidebar' is not a bootstrap class-->
                        <a href="{{route('dashboard')}}" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">Cryptocutter</a>   <!--'bottom-border' is not a bootstrap class-->
                        <div class="bottom-border pb-3">
                        <img src="{{asset('images/admin.jpeg')}}" width="50" class="rounded-circle mr-3">
                            <a href="#" class="text-white">Helen Smith</a>
                        </div>

                        <ul class="navbar-nav flex-column mt-3">
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2  current"> <i class="fas fa-home fa-lg text-light mr-3"></i>Dashboard</a></li> <!--'sidebar-link' is not a bootstrap class-->
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-user fa-lg text-light mr-3"></i>Profile</a></li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" data-toggle="collapse" data-target="#exchanges"><i class="fab fa-stack-exchange fa-lg text-light mr-3"></i>Exchange&nbsp; <i class="fas fa-sort-down fa-2x"></i></a>
                                <ul id="exchanges" class="collapse">
                                    <li><a class="btn text-white mb-2 border border-danger" href="{{route('exchanges.create')}}">Add Exchange</a></li>
                                    <li><a class="btn text-white mb-2 border border-success" href="{{route('exchanges.index')}}">View Exchange</a></li>
                                </ul>
                            </li> 
                            
                            <li class="nav-item">
                                <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" data-toggle="collapse" data-target="#cards"><i class="far fa-credit-card fa-lg text-light mr-3"></i>Card&nbsp; <i class="fas fa-sort-down fa-2x"></i></a>
                                <ul id="cards" class="collapse">
                                    <li><a class="btn text-white mb-2 px-3 border-danger" href="{{route('cards.create')}}">Add Card</a></li>
                                    <li><a class="btn text-white mb-2 border-success" href="{{route('cards.index')}}">View Card</a></li>
                                </ul>
                            </li> 

                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-chart-line fa-lg text-light mr-3"></i>Analytics</a></li> 
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-chart-bar fa-lg text-light mr-3"></i>Charts</a></li> 
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-table fa-lg text-light mr-3"></i>Tabels</a></li> 
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-wrench fa-lg text-light mr-3"></i>Settings</a></li> 
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-file-alt fa-lg text-light mr-3"></i>Documentation</a></li> 
                        </ul>
  
                    </div>
                    <!-- end of sidebar -->

                    <!-- top-nav -->
                    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">     <!--'top-navbar' is not a bootstrap class-->
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="text-light text-uppercase mb-0">Dashboard</h4>
                            </div>
                            <div class="col-md-5">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control search-input" placeholder="Search...">   <!--'search-input' is not a bootstrap class-->
                                        <button type="button" class="btn btn-light active search-button"><i class="fas fa-search text-danger"></i></button>   <!--'search-button' is not a bootstrap class-->
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <ul class="navbar-nav">
                                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-comments fa-lg text-muted"></i></a></li> <!--'icon-parent' and 'icon-bullet' are not a bootstrap class-->
                                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-bell fa-lg text-muted"></i></a></li> <!--'icon-parent' and 'icon-bullet' are not a bootstrap class-->
                                    <li class="nav-item ml-md-auto"><a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-sign-out-alt fa-lg text-danger"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end of top-nav -->
                </div>
            </div>
        </div>
    </div>
    <!-- end of navbar -->

    <!-- modal -->
    <div class="modal fade" id="sign-out">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Want to leave?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Press logout to leave 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- end of modal -->
        
    @yield('main-content')


    @yield('footer')
    
    



    <!-- jQuery, Popper js, Bootstrap -->
    {{-- <script src="{{asset('docsupport/jquery-3.2.1.min.js')}}" type="text/javascript"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Optional JavaScript -->
    @yield('custom-script')
</body>
</html>