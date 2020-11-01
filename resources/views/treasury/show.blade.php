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
