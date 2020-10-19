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
    @include('includes.cardForm')
@endsection

@section('main-content')
    <section class="container mt-5 main">
        <div class="row">
            <div class="col-sm-12 mb-4">
                <div class="">
                    <h2 class="mb-4 d-md-inline">
                        <img src="{{asset('images/') . "/" . $card->logo}}" class="img-fluid rounded" alt="logo" width="120px">
                        <span class="text-uppercase font-weight-bold">{{$card->name}}</span>
                    </h2>
                    <span class="d-inline float-sm-right my-4"><a href="{{$card->url}}" class="btn btn-success font-weight-bold px-4 py-2">Get Card</a></span>
                </div>
                <p class="mb-3">{!! $card->description !!}</p>
                <div class="row mb-5">
                    <div class="col-sm-6 mb-2">
                        <h3>Pros</h3>
                        <p>{!! $card->pros !!}</p>
                    </div>
                    <div class="col-sm-6">
                        <h3>Cons</h3>
                        <p>{!! $card->cons !!}</p>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Ease Of Use</th>
                                <th>Privacy</th>
                                <th>Speed</th>
                                <th>Fees</th>
                                <th>Reputation</th>
                                <th>Limits</th>
                                <th>Price</th>
                                <th>Delivery Fees</th>
                                <th>Coverage</th>
                                <th>Monthly Fees</th>
                                <th>ATM Fees</th>
                                <th>Monthly ATM Limit</th>
                                <th>Online Purchases</th>
                                <th>Monthly Purchases</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$card->ease}}</td>
                                <td>{{$card->privacy}}</td>
                                <td>{{$card->speed}}</td>
                                <td>{{$card->fee}}</td>
                                <td>{{$card->reputation}}</td>
                                <td>{{$card->limit}}</td>
                                <td>{{$card->price}}</td>
                                <td>{{$card->delivery_fees}}</td>
                                <td>{{$card->coverage}}</td>
                                <td>{{$card->monthly_fees}}</td>
                                <td>{{$card->atm_fees}}</td>
                                <td>{{$card->monthly_atm_limit}}</td>
                                <td>{{$card->online_purchases}}</td>
                                <td>{{$card->monthly_purchases}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection


@section('custom-script')
    @include('card.suggestion')
    <script>
        $('#card').addClass('current');
    </script>
@endsection
