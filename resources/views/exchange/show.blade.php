@extends('admin.layout');

@section('main-content')
    <div class="row mt-md-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="separator h2 mb-3">
                Exchange Details
            </div>

            <div class="px-3 my-4">
                <h1 class="text-uppercase text-center font-weight-bold display-3 mb-3">{{$exchange->name}}</h1>
                <p class="mb-3"> {!! $exchange->description !!} </p>

                <div class="row">
                    <div class="col-md-3 mr-2 mb-2">
                        <div class="card">
                            <div class="card-header">
                                Selected Currencies
                            </div>
                            <ul class="list-group list-group-flush">
                              <?php $currencies = unserialize($exchange->currencies); ?>
                              @foreach ($currencies as $currency)
                                <li class="list-group-item">{{$currency}}</li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mr-2 mb-2">
                        <div class="card">
                            <div class="card-header">
                                Payment methods
                            </div>
                            <ul class="list-group list-group-flush">
                              <?php $payments = unserialize($exchange->payments); ?>
                              @foreach ($payments as $payment)
                                <li class="list-group-item">{{$payment}}</li>
                              @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 mr-2 mb-2">
                        <div class="card">
                            <div class="card-header">
                                Selected Countries
                            </div>
                            <ul class="list-group list-group-flush">
                              <?php $countries = unserialize($exchange->countries); ?>
                              @foreach ($countries as $country)
                                <li class="list-group-item">{{$country}}</li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <!--End Of nested row -->
                <h4 class="text-uppercase">pros:</h4>
                <p class="mb-3"> {!! $exchange->pros !!} </p>

                <h4 class="text-uppercase">Cons:</h4>
                <p class="mb-3"> {!! $exchange->cons !!} </p>

                <h4 class="text-uppercase">ease of use:</h4>
                <p class="mb-3"> {{ $exchange->ease }} </p>

                <h4 class="text-uppercase">privacy:</h4>
                <p class="mb-3"> {{ $exchange->privacy }} </p>

                <h4 class="text-uppercase">speed:</h4>
                <p class="mb-3"> {{ $exchange->speed }} </p>

                <h4 class="text-uppercase">fee:</h4>
                <p class="mb-3"> {{ $exchange->fee}} </p>

                <h4 class="text-uppercase">reputation:</h4>
                <p class="mb-3"> {{ $exchange->reputation}} </p>

                <h4 class="text-uppercase">limit:</h4>
                <p class="mb-3"> {{ $exchange->limit}} </p>
            </div>
        </div>
    </div>

@endsection