 <!-- card -->
 <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row pt-md-5 mt-md-3 mb-5">
                    <div class="col-lg-3 col-sm-6 p-2">
                        <!-- second card -->
                        <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="far fa-credit-card fa-3x text-success"></i>
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
                                        <h3>{{ $autocomplete_card->no_of_wallet }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{route('wallet_types.create')}}"><i class="far fa-plus-square fa-2x text-primary mr-2"></i></a>
                                <a href="{{route('wallet_types.index')}}"><i class="far fa-list-alt fa-2x text-success"></i></a>
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
                                        <h3>{{ $autocomplete_card->no_of_deposit }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{route('deposits.create')}}"><i class="far fa-plus-square fa-2x text-primary mr-2"></i></a>
                                <a href="{{route('deposits.index')}}"><i class="far fa-list-alt fa-2x text-success"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 p-2">
                        <!-- eighth card -->
                        <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fab fa-btc fa-3x text-warning"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Crypto Type</h5>
                                        <h3>{{ $no_of_cryptos }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{route('crypto_types.create')}}"><i class="far fa-plus-square fa-2x text-primary mr-2"></i></a>
                                <a href="{{route('crypto_types.index')}}"><i class="far fa-list-alt fa-2x text-success"></i></a>
                            </div>
                        </div>
                    </div>

                    
                </div>

            </div>
        </div>
    </div>
</section>
<!-- end of card -->