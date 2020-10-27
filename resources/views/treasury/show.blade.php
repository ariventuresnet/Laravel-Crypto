@extends('admin.layout')


@section('main-content')
    <div class="row mt-md-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="separator h2 my-3">
                 Details
            </div>

            <div class="px-3 my-4">
                <h1 class="text-uppercase text-center font-weight-bold display-3 mb-3">{{$treasury->name}}</h1>

                <div class="row mb-3">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                Selected Countries
                            </div>
                            <ul class="list-group list-group-flush">
                              <?php $countries = json_decode($treasury->countries); ?>
                              @foreach ($countries as $country)
                                <li class="list-group-item">{{ strtoupper($country) }}</li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                    
                </div>
                
                <h5 class="text-capitalize font-weight-bold">Filings:</h5>
                <p class="mb-4"><a href="{{$treasury->filings}}">{{$treasury->filings }}</a></p> 

                <h5 class="text-capitalize font-weight-bold">Symbol:</h5>
                <p class="mb-4"> {{ $treasury->symbol }} </p>

                <h5 class="text-capitalize font-weight-bold">BTC Holdings:</h5>
                <p class="mb-4"> {{ $treasury->btc_holding }} </p>

                <div class="mt-3">
                    <a href="{{route('treasuries.edit', $treasury->id)}}" class="btn btn-style draw-border">Edit <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>

@endsection
