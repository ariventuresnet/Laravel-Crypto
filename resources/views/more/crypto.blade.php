@extends('layouts.cryptocutter-layout')

@section('searchbox-content')
    <!-- searchbox -->
    <div class="container-fluid searchbox px-md-5 mt-2">
        <div class="row">
            <div class="col-md-12">
                <form id="search-form">
                    <div class="form-row d-flex justify-content-center">
                        <div class="input-box mr-sm-4">
                            <label><span class="text-dark font-weight-bold">Name</span></label>
                            <input type="text" name="name" id="find1" placeholder="search name">
                        </div>
                        <div class="input-box ml-sm-4">
                            <label><span class="text-dark font-weight-bold">Type</span></label>
                            <input type="text" name="type" id="find2" placeholder="search type">
                            <button id="search" class="btn search-icon"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <!-- end of searchbox -->
@endsection

@section('main-content')
    <section class="container-fluid py-md-4 pt-3 px-md-5 px-2 main">
        <div class="row">
            <div class="col-12">
                <div class="separator">
                    Cryptos
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Market Cap</th>
                            <th scope="col">Algorithm</th>
                            <th scope="col">Dominance</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($cryptos as $crypto)
                                <tr>
                                    <td class="font-weight-bold">{{$crypto->currency->name}}</td>
                                    <td>{{$crypto->cryptoType->name}}</td>
                                    <td>{{$crypto->market_cap}}</td>
                                    <td>{{$crypto->algorithm}}</td>
                                    <td>{{$crypto->dominance}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('custom-script')
    @include('cryptos.suggestion')
    @include('cryptos.ajax_request')
@endsection