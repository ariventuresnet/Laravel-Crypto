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
    <section class="container-fluid pt-md-4 pt-3 px-md-5 px-2 main">
        <div class="row">
            <div class="col-12">
                <div class="separator">
                    Wallets
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">BTC Only</th>
                            <th scope="col">Lightning</th>
                            <th scope="col">Liquid</th>
                            <th scope="col">Security</th>
                            <th scope="col">Multi-sig</th>
                            <th scope="col">Buy crypto</th>
                            <th scope="col">Ease Of Use</th>
                            <th scope="col">Privacy</th>
                            <th scope="col">Speed</th>
                            <th scope="col">Fees</th>
                            <th scope="col">Reputation</th>
                            <th scope="col">Limits</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($wallets as $wallet)
                                <tr class="table-row">
                                    <td class="td-name">
                                        <?php $name= str_replace(' ', '_', $wallet->name); ?>
                                        <a href="{{route('cryptowallet.show', $name )}}" class="text-dark text-nowrap"> <img src="{{asset('images/') . "/" . $wallet->logo}}" class="rounded-circle" width="15%" alt="Logo"> {{$wallet->name}}</a>
                                    </td>
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
                            @endforeach
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
                minChars: 0,
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
                minChars: 0,
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