@extends('layouts.cryptocutter-layout')

@section('custom-css')
    <style>
        .table th{
            font-size: .8rem;
        }
        .table-row{
            font-size: .8rem;
        }
    </style>
@endsection

@section('searchbox-content')
    <!-- searchbox -->
    <div class="container-fluid searchbox px-md-5 mt-2">
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-row d-flex justify-content-center">
                        <div class="input-box mr-sm-2">
                            <label><span class="text-dark font-weight-bold">BUY</span></label>
                            <input type="text" class="find" id="find1" placeholder="Search Cryptocurrency">
                        </div>
                        <div class="input-box mr-sm-2">
                            <label><span class="text-dark font-weight-bold">IN</span></label>
                            <input type="text" class="find" id="find2" placeholder="Search Country">
                        </div>
                        <div class="input-box">
                            <label><span class="text-dark font-weight-bold">WITH</span></label>
                            <input type="text" class="find" id="find3" placeholder="Search Payment Method">
                            <a href="#" class="btn search-icon"><i class="fas fa-search"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <!-- end of searchbox -->
@endsection

@section('main-content')
    <section class="container-fluid pt-md-4 pt-3 px-md-5 px-2 main">
        <div class="row">
            <div class="col-12">
                <div class="separator">
                    Top Exchanges
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Bitcoin only</th>
                            <th scope="col">Recurring Buys</th>
                            <th scope="col">Lightning</th>
                            <th scope="col">Liquid</th>
                            <th scope="col">KYC</th>
                            <th scope="col">Ease Of Use</th>
                            <th scope="col">Privacy</th>
                            <th scope="col">Speed</th>
                            <th scope="col">Fees</th>
                            <th scope="col">Reputation</th>
                            <th scope="col">Limits</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($exchanges as $exchange)
                                <tr class="table-row">
                                    <td class="td-name">
                                        <?php $name= str_replace(' ', '_', $exchange->name); ?>
                                        <a href="{{route('cryptoexchange.show', $name)}}" class="text-dark text-nowrap"> <img src="{{asset('images/') . "/" . $exchange->logo}}" class="rounded-circle" width="15%" alt="Exchange Logo"> {{$exchange->name}}</a>
                                    </td>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('custom-script')
    @include('exchange.suggestion')
@endsection