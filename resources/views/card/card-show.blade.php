@extends('admin.layout')


@section('main-content')
    <div class="row mt-md-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="separator h2 mb-3">
                Card Details
            </div>

            <div class="px-3 my-4">
                <h1 class="text-uppercase text-center font-weight-bold display-3 mb-3">{{$card->name}}</h1>
                <p class="mb-3"> {!! $card->description !!} </p>

                <div class="row">
                    <div class="col-md-3 mr-2 mb-2">
                        <div class="card">
                            <div class="card-header">
                                Selected Currencies
                            </div>
                            <ul class="list-group list-group-flush">
                              <?php $currencies = json_decode($card->currencies); ?>
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
                              <?php $payments = json_decode($card->payments); ?>
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
                              <?php $countries = json_decode($card->countries); ?>
                              @foreach ($countries as $country)
                                <li class="list-group-item">{{$country}}</li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <!--End Of nested row -->
                <h5 class="text-uppercase font-weight-bold">pros:</h5>
                <p class="mb-3"> {!! $card->pros !!} </p>

                <h5 class="text-uppercase font-weight-bold">Cons:</h5>
                <p class="mb-3"> {!! $card->cons !!} </p>

                <h5 class="text-uppercase font-weight-bold">ease of use:</h5>
                <p class="mb-3"> {{ $card->ease }} </p>

                <h5 class="text-uppercase font-weight-bold">privacy:</h5>
                <p class="mb-3"> {{ $card->privacy }} </p>

                <h5 class="text-uppercase font-weight-bold">speed:</h5>
                <p class="mb-3"> {{ $card->speed }} </p>

                <h5 class="text-uppercase font-weight-bold">fee:</h5>
                <p class="mb-3"> {{ $card->fee}} </p>

                <h5 class="text-uppercase font-weight-bold">reputation:</h5>
                <p class="mb-3"> {{ $card->reputation}} </p>

                <h5 class="text-uppercase font-weight-bold">limit:</h5>
                <p class="mb-3"> {{ $card->limit}} </p>

                <div class="mt-3">
                    <a href="{{route('cards.edit', $card->id)}}" class="btn btn-style draw-border">Edit <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>

@endsection