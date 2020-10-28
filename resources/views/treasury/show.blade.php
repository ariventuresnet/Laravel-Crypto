@extends('admin.layout')


@section('main-content')
    <div class="row mt-md-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="separator h2 my-3">
                 Details
            </div>

            {{-- <div class="px-3 my-4">
                <h1 class="text-uppercase text-center font-weight-bold display-3 mb-3">{{$treasury->name}}</h1>

                <div class="row mb-3">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <span class="font-weight-bold">Selected Countries</span>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $treasury->country->name }}</li>
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
                    <a href="{{route('treasuries.edit', $treasury->id)}}" class="btn btn-info px-3">Edit <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div> --}}

            <div class="row px-3 my-4">
                <div class="col-xl-7 col-lg-6 col-md-5">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="font-weight-bold">Name : </span><span class="text-uppercase">{{$treasury->name}}</span></li>
                        <li class="list-group-item"><span class="font-weight-bold">Country : </span> {{$treasury->country->name}}</li>
                        <li class="list-group-item"><span class="font-weight-bold">Filings : </span> {{$treasury->filings}}</li>
                        <li class="list-group-item"><span class="font-weight-bold">Symbol : </span> {{$treasury->symbol }}</li>
                        <li class="list-group-item"><span class="font-weight-bold">BTC Holdings : </span> {{$treasury->btc_holding}}</li>
                      </ul>
                      <div class="mt-3">
                        <a href="{{route('treasuries.edit', $treasury->id)}}" class="btn btn-info px-3">Edit <i class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
