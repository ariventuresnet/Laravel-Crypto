@extends('admin.layout')


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
                              <?php $currencies = json_decode($exchange->currencies); ?>
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
                              <?php $payments = json_decode($exchange->payments); ?>
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
                              <?php $countries = json_decode($exchange->countries); ?>
                              @foreach ($countries as $country)
                                <li class="list-group-item">{{$country}}</li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <!--End Of nested row -->
                <h5 class="text-capitalize font-weight-bold">pros:</h5>
                <p class="mb-3"> {!! $exchange->pros !!} </p>

                <h5 class="text-capitalize font-weight-bold">Cons:</h5>
                <p class="mb-3"> {!! $exchange->cons !!} </p>

                <h5 class="text-capitalize font-weight-bold">ease of use:</h5>
                <p class="mb-3"> {{ $exchange->ease }} </p>

                <h5 class="text-capitalize font-weight-bold">privacy:</h5>
                <p class="mb-3"> {{ $exchange->privacy }} </p>

                <h5 class="text-capitalize font-weight-bold">speed:</h5>
                <p class="mb-3"> {{ $exchange->speed }} </p>

                <h5 class="text-capitalize font-weight-bold">fee:</h5>
                <p class="mb-3"> {{ $exchange->fee}} </p>

                <h5 class="text-capitalize font-weight-bold">reputation:</h5>
                <p class="mb-3"> {{ $exchange->reputation}} </p>

                <h5 class="text-capitalize font-weight-bold">limit:</h5>
                <p class="mb-3"> {{ $exchange->limit}} </p>

                <h5 class="text-capitalize font-weight-bold">Bitcoin Only:</h5>
                <p class="mb-3"> {{ $exchange->bitcoin_only}} </p>

                <h5 class="text-capitalize font-weight-bold">recurring buys:</h5>
                <p class="mb-3"> {{ $exchange->recurring_buys}} </p>

                <h5 class="text-capitalize font-weight-bold">lightning:</h5>
                <p class="mb-3"> {{ $exchange->lightning}} </p>

                <h5 class="text-capitalize font-weight-bold">liquid:</h5>
                <p class="mb-3"> {{ $exchange->liquid}} </p>

                <h5 class="text-capitalize font-weight-bold">kyc:</h5>
                <p class="mb-3"> {{ $exchange->kyc}} </p>

                <div class="mt-3">
                    <a href="{{route('exchanges.edit', $exchange->id)}}" class="btn btn-style draw-border">Edit <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>

@endsection
