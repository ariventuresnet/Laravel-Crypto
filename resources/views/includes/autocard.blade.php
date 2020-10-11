 <!-- card -->
 <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row pt-md-5 mt-md-3 mb-5">
                    
                    <div class="col-lg-3 col-sm-6 p-2">
                        <!-- first card -->
                        <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-coins fa-3x text-warning"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Currency</h5>
                                        <h3>{{ $autocomplete_card->no_of_currency }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{route('currencies.create')}}"><i class="far fa-plus-square fa-2x text-primary mr-2"></i></a>
                                <a href="{{route('currencies.index')}}"><i class="far fa-list-alt fa-2x text-success"></i></a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 col-sm-6 p-2">
                        <!-- second card -->
                        <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-globe-americas fa-3x text-success"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Country</h5>
                                        <h3>{{ $autocomplete_card->no_of_country }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{route('countries.create')}}"><i class="far fa-plus-square fa-2x text-primary mr-2"></i></a>
                                <a href="{{route('countries.index')}}"><i class="far fa-list-alt fa-2x text-success"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6 p-2">
                        <!-- third card -->
                        <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-money-check fa-3x text-primary"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Payment</h5>
                                        <h3>{{ $autocomplete_card->no_of_payment_method }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{route('payments.create')}}"><i class="far fa-plus-square fa-2x text-primary mr-2"></i></a>
                                <a href="{{route('payments.index')}}"><i class="far fa-list-alt fa-2x text-success"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 p-2">
                        <!-- forth card -->
                        <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="far fa-credit-card fa-3x text-success"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Card Method</h5>
                                        <h3>5</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#"><i class="far fa-plus-square fa-2x text-primary mr-2"></i></a>
                                <a href="#"><i class="far fa-list-alt fa-2x text-success"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 p-2">
                        <!-- fifth card -->
                        <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fab fa-cc-diners-club fa-3x text-info"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Collateral</h5>
                                        <h3>{{ $autocomplete_card->no_of_collateral }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{route('collaterals.create')}}"><i class="far fa-plus-square fa-2x text-primary mr-2"></i></a>
                                <a href="{{route('collaterals.index')}}"><i class="far fa-list-alt fa-2x text-success"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 p-2">
                        <!-- sixth card -->
                        <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fab fa-google-wallet fa-3x text-danger"></i>
                                    <div class="text-right text-secondary">
                                        <h5>wallet</h5>
                                        <h3>5</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#"><i class="far fa-plus-square fa-2x text-primary mr-2"></i></a>
                                <a href="#"><i class="far fa-list-alt fa-2x text-success"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 p-2">
                        <!-- seventh card -->
                        <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-money-check-alt fa-3x text-success"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Deposit</h5>
                                        <h3>5</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#"><i class="far fa-plus-square fa-2x text-primary mr-2"></i></a>
                                <a href="#"><i class="far fa-list-alt fa-2x text-success"></i></a>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</section>
<!-- end of card -->