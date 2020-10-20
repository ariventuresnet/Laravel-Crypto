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
    @include('includes.exchangeForm')
@endsection

@section('main-content')
    <section class="container-fluid px-md-5 px-2 mb-4 main">
        <div class="row py-md-4 py-3 border-bottom">
            <div class="col">
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

    @include('exchange.post')
@endsection


@section('custom-script')
    @include('exchange.suggestion')
    @include('exchange.ajax_request')
@endsection