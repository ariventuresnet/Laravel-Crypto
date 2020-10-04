@extends('admin.layout')


@section('main-content')
    <div class="row mt-md-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="separator h2 my-3">
                Loan Details
            </div>

            <div class="px-3 my-4">
                <h1 class="text-uppercase text-center font-weight-bold display-3 mb-3">{{$loan->name}}</h1>
                <p class="mb-3"> {!! $loan->description !!} </p>

                <div class="row mb-3">
                    <div class="col-md-3 mr-2 mb-2">
                        <div class="card">
                            <div class="card-header">
                                Selected Currencies
                            </div>
                            <ul class="list-group list-group-flush">
                              <?php $currencies = json_decode($loan->currencies); ?>
                              @foreach ($currencies as $currency)
                                <li class="list-group-item">{{$currency}}</li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mr-2 mb-2">
                        <div class="card">
                            <div class="card-header">
                                Selected collaterals
                            </div>
                            <ul class="list-group list-group-flush">
                              <?php $collaterals = json_decode($loan->collaterals); ?>
                              @foreach ($collaterals as $collateral)
                                <li class="list-group-item">{{$collateral}}</li>
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
                              <?php $countries = json_decode($loan->countries); ?>
                              @foreach ($countries as $country)
                                <li class="list-group-item">{{$country}}</li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <!--End Of nested row -->
                <h5 class="text-capitalize font-weight-bold">pros:</h5>
                <p class="mb-3"> {!! $loan->pros !!} </p>

                <h5 class="text-capitalize font-weight-bold">Cons:</h5>
                <p class="mb-3"> {!! $loan->cons !!} </p>

                <h5 class="text-capitalize font-weight-bold">Btc Only:</h5>
                <p class="mb-3"> {{ $loan->btc_only }} </p>

                <h5 class="text-capitalize font-weight-bold">Fiat Loan:</h5>
                <p class="mb-3"> {{ $loan->fiat_loan }} </p>

                <h5 class="text-capitalize font-weight-bold">Crypto Loan:</h5>
                <p class="mb-3"> {{ $loan->crypto_loan }} </p>

                <h5 class="text-capitalize font-weight-bold">Term:</h5>
                <p class="mb-3"> {{ $loan->term }} </p>

                <h5 class="text-capitalize font-weight-bold">Interest:</h5>
                <p class="mb-3"> {{ $loan->interest }} </p>

                <h5 class="text-capitalize font-weight-bold">ease of use:</h5>
                <p class="mb-3"> {{ $loan->ease }} </p>

                <h5 class="text-capitalize font-weight-bold">privacy:</h5>
                <p class="mb-3"> {{ $loan->privacy }} </p>

                <h5 class="text-capitalize font-weight-bold">speed:</h5>
                <p class="mb-3"> {{ $loan->speed }} </p>

                <h5 class="text-capitalize font-weight-bold">fee:</h5>
                <p class="mb-3"> {{ $loan->fee}} </p>

                <h5 class="text-capitalize font-weight-bold">reputation:</h5>
                <p class="mb-3"> {{ $loan->reputation}} </p>

                <h5 class="text-capitalize font-weight-bold">limit:</h5>
                <p class="mb-3"> {{ $loan->limit}} </p>

                <div class="mt-3">
                    <a href="{{route('loans.edit', $loan->id)}}" class="btn btn-style draw-border">Edit <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>

@endsection