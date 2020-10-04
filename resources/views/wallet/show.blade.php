@extends('admin.layout')


@section('main-content')
    <div class="row mt-md-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="separator h2 my-3">
                Wallet Details
            </div>

            <div class="px-3 my-4">
                <h1 class="text-uppercase text-center font-weight-bold display-3 mb-3">{{$wallet->name}}</h1>
                <p class="mb-3"> {!! $wallet->description !!} </p>

                <div class="row mb-3">
                    <div class="col-md-3 mr-2 mb-2">
                        <div class="card">
                            <div class="card-header">
                                Selected Currencies
                            </div>
                            <ul class="list-group list-group-flush">
                              <?php $currencies = json_decode($wallet->currencies); ?>
                              @foreach ($currencies as $currency)
                                <li class="list-group-item">{{$currency}}</li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mr-2 mb-2">
                        <div class="card">
                            <div class="card-header">
                                Selected Types
                            </div>
                            <ul class="list-group list-group-flush">
                              <?php $types = json_decode($wallet->type); ?>
                              @foreach ($types as $type)
                                <li class="list-group-item">{{$type}}</li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <!--End Of nested row -->
                <h5 class="text-capitalize font-weight-bold">pros:</h5>
                <p class="mb-3"> {!! $wallet->pros !!} </p>

                <h5 class="text-capitalize font-weight-bold">Cons:</h5>
                <p class="mb-3"> {!! $wallet->cons !!} </p>

                <h5 class="text-capitalize font-weight-bold">Btc Only:</h5>
                <p class="mb-3"> {{ $wallet->btc_only }} </p>

                <h5 class="text-capitalize font-weight-bold">Lightning:</h5>
                <p class="mb-3"> {{ $wallet->lightning }} </p>

                <h5 class="text-capitalize font-weight-bold">Liquid:</h5>
                <p class="mb-3"> {{ $wallet->liquid }} </p>

                <h5 class="text-capitalize font-weight-bold">Security:</h5>
                <p class="mb-3"> {{ $wallet->security }} </p>

                <h5 class="text-capitalize font-weight-bold">Multi-sig:</h5>
                <p class="mb-3"> {{ $wallet->multi_sig }} </p>

                <h5 class="text-capitalize font-weight-bold">Buy crypto:</h5>
                <p class="mb-3"> {{ $wallet->buy_crypto }} </p>

                <h5 class="text-capitalize font-weight-bold">ease of use:</h5>
                <p class="mb-3"> {{ $wallet->ease }} </p>

                <h5 class="text-capitalize font-weight-bold">privacy:</h5>
                <p class="mb-3"> {{ $wallet->privacy }} </p>

                <h5 class="text-capitalize font-weight-bold">speed:</h5>
                <p class="mb-3"> {{ $wallet->speed }} </p>

                <h5 class="text-capitalize font-weight-bold">fee:</h5>
                <p class="mb-3"> {{ $wallet->fee}} </p>

                <h5 class="text-capitalize font-weight-bold">reputation:</h5>
                <p class="mb-3"> {{ $wallet->reputation}} </p>

                <h5 class="text-capitalize font-weight-bold">limit:</h5>
                <p class="mb-3"> {{ $wallet->limit}} </p>

                <div class="mt-3">
                    <a href="{{route('wallets.edit', $wallet->id)}}" class="btn btn-style draw-border">Edit <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>

@endsection