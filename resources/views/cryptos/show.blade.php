@extends('admin.layout')


@section('main-content')
    <div class="row mt-md-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="separator h2 my-3">
                 Details
            </div>

            <div class="row px-3 my-4">
                <div class="col-xl-7 col-lg-6 col-md-5">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="font-weight-bold">Name : </span><span class="text-uppercase">{{$crypto->currency->name}}</span></li>
                        <li class="list-group-item"><span class="font-weight-bold">Type : </span> {{$crypto->cryptoType->name}}</li>
                        <li class="list-group-item"><span class="font-weight-bold">Market Cap : </span> {{$crypto->market_cap}}</li>
                        <li class="list-group-item"><span class="font-weight-bold">Algorithm : </span> {{$crypto->algorithm}}</li>
                        <li class="list-group-item"><span class="font-weight-bold">Dominance : </span> {{$crypto->dominance}}</li>
                      </ul>
                      <div class="mt-3">
                        <a href="{{route('cryptos.edit', $crypto->id)}}" class="btn btn-info px-3">Edit <i class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
