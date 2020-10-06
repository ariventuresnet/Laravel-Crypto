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
                        <div class="input-box mr-2">
                            <label><span class="text-dark font-weight-bold">USE</span></label>
                            <input type="text" class="find" id="find1" placeholder="Search Cryptocurrency">
                        </div>
                        <div class="input-box mr-2">
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
                    var choices = [['Australia', 'au'], ['Austria', 'at'], ['Brasil', 'br'], ['Bulgaria', 'bg'], ['Canada', 'ca'], ['China', 'cn'], ['Czech Republic', 'cz'], ['Denmark', 'dk'], ['Finland', 'fi'], ['France', 'fr'], ['Germany', 'de'], ['Hungary', 'hu'], ['India', 'in'], ['Italy', 'it'], ['Japan', 'ja'], ['Netherlands', 'nl'], ['Norway', 'no'], ['Portugal', 'pt'], ['Romania', 'ro'], ['Russia', 'ru'], ['Spain', 'es'], ['Swiss', 'ch'], ['Turkey', 'tr'], ['USA', 'us']];
                    var suggestions = [];
                    for (i=0;i<choices.length;i++)
                        if (~(choices[i][0]+' '+choices[i][1]).toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                    suggest(suggestions);
                },
                renderItem: function (item, search){
                    search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
                    var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
                    return '<div class="autocomplete-suggestion" data-langname="'+item[0]+'" data-lang="'+item[1]+'" data-val="'+search+'"><img src="https://thecryptocutter.com/autocomplete/img/'+item[1]+'.png"> '+item[0].replace(re, "<b>$1</b>")+'</div>';
                },
                onSelect: function(e, term, item){
                    console.log('Item "'+item.data('langname')+' ('+item.data('lang')+')" selected by '+(e.type == 'keydown' ? 'pressing enter or tab' : 'mouse click')+'.');
                    $('#find2').val(item.data('langname')+' ('+item.data('lang')+')');
                }
            });

            $('#find3').autoComplete({
                minChars: 0,
                source: function(term, suggest){
                    term = term.toLowerCase();
                    var choices = ['Cash', 'Bank transfer', 'Credit card', 'Debit card', 'Ach tranfer'];
                    var suggestions = [];
                    for (i=0;i<choices.length;i++)
                        if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                    suggest(suggestions);
                }
            });

        });

        $('#card').addClass('current');
    </script>
@endsection