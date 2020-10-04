@extends('layouts.cryptocutter-layout')

@section('custom-css')
    <style>
        .table th{
            font-size: .8rem;
        }
        .table td{
            font-size: .8rem;
        }
    </style>
@endsection

@section('searchbox-content')
    <!-- searchbox -->
    <div class="container-fluid searchbox px-md-5">
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-row d-flex justify-content-center">
                        <div class="input-box mr-sm-4">
                            <label><span class="text-dark font-weight-bold">Secure</span></label>
                            <input type="text" class="find" id="find1" placeholder="Search cryptocurrency">
                        </div>
                        <div class="input-box ml-sm-4">
                            <label><span class="text-dark font-weight-bold">With</span></label>
                            <input type="text" class="find" id="find2" placeholder="Search Wallet Type">
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
    <section class="container mt-5 main">
        <div class="row">
            <div class="col-sm-12 mb-4">
                <div class="">
                    <h2 class="mb-4 d-md-inline">
                        <img src="{{asset('images/') . "/" . $wallet->logo}}" class="img-fluid rounded" alt="logo" width="120px">
                        <span class="text-uppercase font-weight-bold">{{$wallet->name}}</span>
                    </h2>
                    <span class="d-inline float-sm-right my-4"><a href="{{$wallet->url}}" class="btn btn-style draw-border">Get Wallet</a></span>
                </div>
                <p class="mb-3">{!! $wallet->description !!}</p>
                <div class="row mb-5">
                    <div class="col-sm-6 mb-2">
                        <h3>Pros</h3>
                        <p>{!! $wallet->pros !!}</p>
                    </div>
                    <div class="col-sm-6">
                        <h3>Cons</h3>
                        <p>{!! $wallet->cons !!}</p>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>BTC Only</th>
                                <th>Lightning</th>
                                <th>Liquid</th>
                                <th>Security</th>
                                <th>Multi-sig</th>
                                <th>Buy crypto</th>
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
                                <td>{{$wallet->btc_only}}</td>
                                <td>{{$wallet->lightning}}</td>
                                <td>{{$wallet->liquid}}</td>
                                <td>{{$wallet->security}}</td>
                                <td>{{$wallet->multi_sig}}</td>
                                <td>{{$wallet->buy_crypto}}</td>
                                <td>{{$wallet->ease}}</td>
                                <td>{{$wallet->privacy}}</td>
                                <td>{{$wallet->speed}}</td>
                                <td>{{$wallet->fee}}</td>
                                <td>{{$wallet->reputation}}</td>
                                <td>{{$wallet->limit}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection


@section('custom-script')
    <script src="{{asset('autocomplete/jquery.auto-complete.js')}}"></script>

    <script>
        $(function(){
            $('#find1').autoComplete({
                minChars: 1,
                source: function(term, suggest){
                    term = term.toLowerCase();
                    var choices = ['Bitcoin', 'Binance Coin', 'EOS', 'Ethereum', 'Libra','Litecoin','Monero', 'Ripple', 'Tether'];
                    var suggestions = [];
                    for (i=0;i<choices.length;i++)
                        if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                    suggest(suggestions);
                }
            });

            $('#find2').autoComplete({
                minChars: 1,
                source: function(term, suggest){
                    term = term.toLowerCase();
                    var choices = ['Hardware', 'iOS', 'Android', 'Mac', 'Windows','Web'];
                    var suggestions = [];
                    for (i=0;i<choices.length;i++)
                        if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                    suggest(suggestions);
                }
            });

        });

        $('#wallet').addClass('current');
    </script>
@endsection