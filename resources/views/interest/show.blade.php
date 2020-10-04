@extends('admin.layout')


@section('main-content')
    <div class="row mt-md-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="separator h2 my-3">
                Interest Details
            </div>

            <div class="px-3 my-4">
                <h1 class="text-uppercase text-center font-weight-bold display-3 mb-3">{{$interest->name}}</h1>
                <p class="mb-3"> {!! $interest->description !!} </p>

                <div class="row mb-3">
                    <div class="col-md-3 mr-2 mb-2">
                        <div class="card">
                            <div class="card-header">
                                Selected Deposits
                            </div>
                            <ul class="list-group list-group-flush">
                              <?php $deposits = json_decode($interest->deposits); ?>
                              @foreach ($deposits as $deposit)
                                <li class="list-group-item">{{$deposit}}</li>
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
                              <?php $countries = json_decode($interest->countries); ?>
                              @foreach ($countries as $country)
                                <li class="list-group-item">{{$country}}</li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <!--End Of nested row -->
                <h5 class="text-capitalize font-weight-bold">pros:</h5>
                <p class="mb-3"> {!! $interest->pros !!} </p>

                <h5 class="text-capitalize font-weight-bold">Cons:</h5>
                <p class="mb-3"> {!! $interest->cons !!} </p>

                <h5 class="text-capitalize font-weight-bold">Btc Only:</h5>
                <p class="mb-3"> {{ $interest->btc_only }} </p>

                <h5 class="text-capitalize font-weight-bold">Term:</h5>
                <p class="mb-3"> {{ $interest->term }} </p>

                <h5 class="text-capitalize font-weight-bold">Interest:</h5>
                <p class="mb-3"> {{ $interest->interest }} </p>

                <h5 class="text-capitalize font-weight-bold">ease of use:</h5>
                <p class="mb-3"> {{ $interest->ease }} </p>

                <h5 class="text-capitalize font-weight-bold">privacy:</h5>
                <p class="mb-3"> {{ $interest->privacy }} </p>

                <h5 class="text-capitalize font-weight-bold">speed:</h5>
                <p class="mb-3"> {{ $interest->speed }} </p>

                <h5 class="text-capitalize font-weight-bold">fee:</h5>
                <p class="mb-3"> {{ $interest->fee}} </p>

                <h5 class="text-capitalize font-weight-bold">reputation:</h5>
                <p class="mb-3"> {{ $interest->reputation}} </p>

                <h5 class="text-capitalize font-weight-bold">limit:</h5>
                <p class="mb-3"> {{ $interest->limit}} </p>

                <div class="mt-3">
                    <a href="{{route('interests.edit', $interest->id)}}" class="btn btn-style draw-border">Edit <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>

@endsection