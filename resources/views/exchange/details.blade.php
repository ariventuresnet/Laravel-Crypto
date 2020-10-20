@extends('layouts.cryptocutter-layout')

@section('searchbox-content')
    <!-- searchbox -->
    <div class="container-fluid searchbox px-md-5 mt-2">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('exchanges.search')}}" method="POST">
                <form id="search-form">
                    @csrf
                    <div class="form-row d-flex justify-content-center">
                        <div class="input-box mr-sm-2">
                            <label><span class="text-dark font-weight-bold">BUY</span></label>
                            <input type="text" name="currency" id="find1" placeholder="Search Cryptocurrency">
                        </div>
                        <div class="input-box mr-sm-2">
                            <label><span class="text-dark font-weight-bold">IN</span></label>
                            <input type="text" name="country" id="find2" placeholder="Search Country">
                        </div>
                        <div class="input-box">
                            <label><span class="text-dark font-weight-bold">WITH</span></label>
                            <input type="text" name="payment_method" id="find3" placeholder="Search Payment Method">
                            <button type="submit" class="btn search-icon"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of searchbox -->
@endsection

@section('main-content')
    <section class="container mt-5 main">
        <div class="row">
            <div class="col-sm-12 mb-4">
                <div class="">
                    <h2 class="mb-4 d-md-inline">
                        <img src="{{asset('images/') . "/" . $exchange->logo}}" class="img-fluid rounded" alt="logo" width="120px">
                        <span class="text-uppercase font-weight-bold">{{$exchange->name}}</span>
                    </h2>
                    {{-- <span class="d-inline float-sm-right my-4"><a href="{{$exchange->url}}" class="btn btn-style draw-border">Buy Crypto</a></span> --}}
                    <span class="d-inline float-sm-right my-4"><a href="{{$exchange->url}}" class="btn btn-success font-weight-bold px-4 py-2">Buy Crypto</a></span>
                </div>
                <p class="mb-3">{!! $exchange->description !!}</p>
                <div class="row mb-5">
                    <div class="col-sm-6 mb-2">
                        <h3>Pros</h3>
                        <p>{!! $exchange->pros !!}</p>
                    </div>
                    <div class="col-sm-6">
                        <h3>Cons</h3>
                        <p>{!! $exchange->cons !!}</p>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Bitcoin only</th>
                                <th>Recurring Buys</th>
                                <th>Lightning</th>
                                <th>Liquid</th>
                                <th>KYC</th>
                                <th>Ease Of Use</th>
                                <th>Privacy</th>
                                <th>Speed</th>
                                <th>Fees</th>
                                <th>Reputation</th>
                                <th>Limits</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$exchange->bitcoin_only}}</td>
                                <td>{{$exchange->recurring_buys}}</td>
                                <td>{{$exchange->lightning}}</td>
                                <td>{{$exchange->liquid}}</td>
                                <td>{{$exchange->kyc}}</td>
                                <td>{{$exchange->ease}}</td>
                                <td>{{$exchange->privacy}}</td>
                                <td>{{$exchange->speed}}</td>
                                <td>{{$exchange->fee}}</td>
                                <td>{{$exchange->reputation}}</td>
                                <td>{{$exchange->limit}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection


@section('custom-script')
    @include('exchange.suggestion')
    <script>
        $('#exchange').addClass('current');
    </script>
@endsection