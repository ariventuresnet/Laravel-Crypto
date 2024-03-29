@extends('layouts.cryptocutter-layout')

@section('custom-css')
    <style>
        body{
            color:#000;
        }
        header {
            height          : 27vh;
            background      :  #fff;
        }
        h4{
            color:#f2a900;
            font-weight: bold;
        }
        li{
            font-size: .8rem;
        }
        tbody{
            font-size: .8rem;
        }
        .doller-sign{
            position: relative;
            bottom: 13px;
            font-size: 2rem;
        }
        .exception{
            border-top: none !important;
        }
    </style>
@endsection

@section('main-content')
    <!-- Main -->
    <section class="container-fluid main-content">
       
        {{-- <div class="row">
            <div class="col mb-3">
                <div style="height:62px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; text-align: right; line-height:14px; block-size:62px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; padding: 0px; margin: 0px; width: 100%;">
                    <div style="height:40px; padding:0px; margin:0px; width: 100%;">
                        <iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=light&pref_coin_id=1505&invert_hover=" width="100%" height="36px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="row mb-3">
            <div class="col px-md-4">
                <h4>Bitcoin (BTC) Live Price</h4>
                <p>
                    <span class="font-weight-bold doller-sign">$</span>
                    <span class="display-4 price">{{$scraps["currentPrice"]}}</span>
                    <span class="font-weight-bold">USD</span>
                    <!-- <span class="change-percent font-weight-bold"> (<span class="value">0.00</span>%)</span> -->
                    <!-- <img src="{{asset('images/demo-chart2.png')}}" alt="chart" class="img-fluid mt-4"> -->
                </p>
            </div>
        </div> --}}
        <div class="row mb-md-3">
            <div class="col-md-8 mb-3">
                <div class="px-md-4">
                    <h4>Bitcoin (BTC) Live Price</h4>
                    <p>
                        <span class="font-weight-bold doller-sign">$</span>
                        <span class="display-4 price">{{$scraps["currentPrice"]}}</span>
                        <span class="font-weight-bold">USD</span>
                        <!-- <span class="change-percent font-weight-bold"> (<span class="value">0.00</span>%)</span> -->
                        <!-- <img src="{{asset('images/demo-chart2.png')}}" alt="chart" class="img-fluid mt-4"> -->
                    </p>
                </div>
                <div style="height:420px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F;padding:1px;padding: 0px; margin: 0px; width: 100%;">
                    <div style="height:540px; padding:0px; margin:0px; width: 100%;">
                        <iframe src="https://widget.coinlib.io/widget?type=chart&theme=light&coin_id=859&pref_coin_id=1505" width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
                    </div>
                    <div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #FFFFFF; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Coinlib
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="px-3">Bitcoin Market Stats</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">24hr Range</span> <span class="float-right"><span class="low">{{$scraps["Range24hr"]}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">USD Per Satoshi</span> <span class="float-right">$ {{$scraps["USDPerSatoshi"]}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Satoshis Per USD</span> <span class="float-right">ⓢ {{$scraps["SatoshisPerUSD"]}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">24hr Volume (BTC)</span> <span class="float-right BtcVolume">{{$scraps["BTCVolume24hr"]}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">24hr Volume (USD)</span> <span class="float-right">{{$scraps["USDVolume24hr"]}} <span class="small font-weight-bold">B</span> </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Market Cap</span> <span class="float-right"> <span class="marketCap">{{$scraps["MarketCap"]}}</span> <span class="small font-weight-bold">B</span> </span></span></li>
                </ul>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-md-4 mb-4">
                <h4 class="px-3">Bitcoin Stats</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">BTC Inflation Rate (next 1yr)</span> <span class="float-right">{{$scraps['BtcInflationRate']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">% Supply Issued</span> <span class="float-right">{{$scraps['SupplyIssued']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">BTC Settlement Volume (24hr)</span> <span class="float-right">{{$scraps['BtcSettlementVolume']}} <span class="small font-weight-bold">B</span> </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Real Exchange Volume (24hr)</span> <span class="float-right">{{$scraps['RealExchangeVolume']}} <span class="small font-weight-bold">B</span> </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Active Addresses</span> <span class="float-right">{{$scraps['ActiveAddresses']}} <span class="small font-weight-bold">M</span> </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Mining Reward Value (24hr)</span> <span class="float-right">{{$scraps['MiningRewardValue']}} <span class="small font-weight-bold">M</span></span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">GBTC Premium</span> <span class="float-right">{{$scraps['GBTCPremium'] }} %</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">BTC Down From ATH</span> <span class="float-right">{{$scraps['BtcDownATH']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">BTC Up From Cycle Low</span> <span class="float-right">{{$scraps['BtcUpCycleLow']}}</span></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h4 class="px-3">Key Markets</h4>
                <table class="table">
                    <tbody class="font-weight-bold">
                        <tr>
                            <th class="exception">Bitcoin</th>
                            <td class="exception">$ {{ $scraps["currentPrice"] }}</td>
                            <td class='exception {{$scraps["PriceChange"][0] == "-" ?"text-danger": "text-success" }}'>{{ $scraps["PriceChange"] }}</td>
                            <td class='exception {{$scraps["PriceChange"][0] == "-" ?"text-danger": "text-success" }}'>{{ $scraps["PriceChangePCT"] }}</td>
                        </tr>
                        <tr>
                            <th>S&P 500</th>
                            <td>{{ $scraps["spPrice"] }}</td>
                            <td class='{{$scraps["spChange"][0] == "-" ?"text-danger": "text-success" }}'> {{ $scraps["spChange"] }}</td>
                            <td class='{{$scraps["spChange"][0] == "-" ?"text-danger": "text-success" }}'> {{ $scraps["spChangePCT"] }}</td>
                        </tr>
                        <tr>
                            <th>Gold</th>
                            <td>$ {{ $scraps["goldPrice"] }}</td>
                            <td class='{{$scraps["goldChange"][0] == "-" ?"text-danger": "text-success" }}'> {{ $scraps["goldChange"] }}</td>
                            <td class='{{$scraps["goldChange"][0] == "-" ?"text-danger": "text-success" }}'> {{ $scraps["goldChangePCT"] }}</td>
                        </tr>
                        <tr>
                            <th>Silver</th>
                            <td>$ {{ $scraps["silverPrice"] }}</td>
                            <td class='{{$scraps["silverChange"][0] == "-" ?"text-danger": "text-success" }}'> {{ $scraps["silverChange"] }}</td>
                            <td class='{{$scraps["silverChange"][0] == "-" ?"text-danger": "text-success" }}'> {{ $scraps["silverChangePCT"] }}</td>
                        </tr>
                        <tr>
                            <th>Euro</th>
                            <td>$ {{ $scraps["euroPrice"] }}</td>
                            <td class='{{$scraps["euroChange"][0] == "-" ?"text-danger": "text-success" }}'>{{ $scraps["euroChange"] }}</td>
                            <td class='{{$scraps["euroChange"][0] == "-" ?"text-danger": "text-success" }}'>{{ $scraps["euroChangePCT"] }}</td>
                        </tr>
                        <tr>
                            <th>Yen</th>
                            <td>¥ {{ $scraps["yenPrice"] }}</td>
                            <td class='{{$scraps["yenChange"][0] == "-" ?"text-danger": "text-success" }}'>{{ $scraps["yenChange"] }}</td>
                            <td class='{{$scraps["yenChange"][0] == "-" ?"text-danger": "text-success" }}'>{{ $scraps["yenChangePCT"] }}</td>
                        </tr>
                        <tr>
                            <th>Renminbi (CNY)</th>
                            <td>¥ {{ $scraps["renminbiPrice"] }}</td>
                            <td class='{{$scraps["renminbiChange"][0] == "-" ?"text-danger": "text-success" }}'>{{ $scraps["renminbiChange"] }}</td>
                            <td class='{{$scraps["renminbiChange"][0] == "-" ?"text-danger": "text-success" }}'>{{ $scraps["renminbiChangePCT"] }}</td>
                        </tr>
                        <tr>
                            <th>Oil (WTI)</th>
                            <td>$ {{ $scraps["oilPrice"] }}</td>
                            <td class='{{$scraps["oilChange"][0] == "-" ?"text-danger": "text-success" }}'>{{ $scraps["oilChange"] }}</td>
                            <td class='{{$scraps["oilChange"][0] == "-" ?"text-danger": "text-success" }}'>{{ $scraps["oilChangePCT"] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Bitcoin Price & ROI On This Date</h4>
                <table class="table">
                    <thead >
                        <tr>
                          <th class="exception">Date</th>
                          <th class="exception">Price</th>
                          <th class="exception text-right">ROI to Today</th>
                        </tr>
                    </thead>
                    <tbody class="font-weight-bold">
                        <tr>
                            <td>{{ $scraps["roi_date_r1"] }}</td>
                            <td>{{ $scraps["roi_price_r1"] }}</td>
                            <td class='text-right {{$scraps["roi_today_r1"][0] == "+" ?"text-success": "text-danger" }}'>{{ $scraps["roi_today_r1"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["roi_date_r2"] }}</td>
                            <td>{{ $scraps["roi_price_r2"] }}</td>
                            <td class='text-right {{$scraps["roi_today_r2"][0] == "+" ?"text-success": "text-danger" }}'>{{ $scraps["roi_today_r2"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["roi_date_r3"] }}</td>
                            <td>{{ $scraps["roi_price_r3"] }}</td>
                            <td class='text-right {{$scraps["roi_today_r3"][0] == "+" ?"text-success": "text-danger" }}'>{{ $scraps["roi_today_r3"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["roi_date_r4"] }}</td>
                            <td>{{ $scraps["roi_price_r4"] }}</td>
                            <td class='text-right {{$scraps["roi_today_r4"][0] == "+" ?"text-success": "text-danger" }}'>{{ $scraps["roi_today_r4"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["roi_date_r5"] }}</td>
                            <td>{{ $scraps["roi_price_r5"] }}</td>
                            <td class='text-right {{$scraps["roi_today_r5"][0] == "+" ?"text-success": "text-danger" }}'>{{ $scraps["roi_today_r5"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["roi_date_r6"] }}</td>
                            <td>{{ $scraps["roi_price_r6"] }}</td>
                            <td class='text-right {{$scraps["roi_today_r6"][0] == "+" ?"text-success": "text-danger" }}'>{{ $scraps["roi_today_r6"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["roi_date_r7"] }}</td>
                            <td>{{ $scraps["roi_price_r7"] }}</td>
                            <td class='text-right {{$scraps["roi_today_r7"][0] == "+" ?"text-success": "text-danger" }}'>{{ $scraps["roi_today_r7"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["roi_date_r8"] }}</td>
                            <td>{{ $scraps["roi_price_r8"] }}</td>
                            <td class='text-right {{$scraps["roi_today_r8"][0] == "+" ?"text-success": "text-danger" }}'>{{ $scraps["roi_today_r8"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["roi_date_r9"] }}</td>
                            <td>{{ $scraps["roi_price_r9"] }}</td>
                            <td class='text-right {{$scraps["roi_today_r9"][0] == "+" ?"text-success": "text-danger" }}'>{{ $scraps["roi_today_r9"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["roi_date_r10"] }}</td>
                            <td>{{ $scraps["roi_price_r10"] }}</td>
                            <td class='text-right {{$scraps["roi_today_r10"][0] == "+" ?"text-success": "text-danger" }}'>{{ $scraps["roi_today_r10"] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Bitcoin Price Closing History</h4>
                <table class="table text-right">
                    <thead>
                        <tr>
                            <th class="exception">Price</th>
                            <th class="exception">Days Above</th>
                            <th class="exception">% of Bitcoin's Life</th>
                        </tr>
                    </thead>
                    <tbody class="font-weight-bold">
                        <tr>
                            <td>{{ $scraps["price_close_r1"] }}</td>
                            <td>{{ $scraps["price_close_days_r1"] }}</td>
                            <td>{{ $scraps["price_close_per_r1"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["price_close_r2"] }}</td>
                            <td>{{ $scraps["price_close_days_r2"] }}</td>
                            <td>{{ $scraps["price_close_per_r2"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["price_close_r3"] }}</td>
                            <td>{{ $scraps["price_close_days_r3"] }}</td>
                            <td>{{ $scraps["price_close_per_r3"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["price_close_r4"] }}</td>
                            <td>{{ $scraps["price_close_days_r4"] }}</td>
                            <td>{{ $scraps["price_close_per_r4"] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Bitcoin Marketcap Closing History</h4>
                <table class="table text-right">
                    <thead>
                        <tr>
                            <th class="exception">Mcap</th>
                            <th class="exception">Days Above</th>
                            <th class="exception">% of Bitcoin's Life</th>
                        </tr>
                    </thead>
                    <tbody class="font-weight-bold">
                        <tr>
                            <td>{{ $scraps["mcap_close_r1"] }}</td>
                            <td>{{ $scraps["mcap_close_days_r1"] }}</td>
                            <td>{{ $scraps["mcap_close_per_r1"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["mcap_close_r2"] }}</td>
                            <td>{{ $scraps["mcap_close_days_r2"] }}</td>
                            <td>{{ $scraps["mcap_close_per_r2"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["mcap_close_r3"] }}</td>
                            <td>{{ $scraps["mcap_close_days_r3"] }}</td>
                            <td>{{ $scraps["mcap_close_per_r3"] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $scraps["mcap_close_r4"] }}</td>
                            <td>{{ $scraps["mcap_close_days_r4"] }}</td>
                            <td>{{ $scraps["mcap_close_per_r4"] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Bitcoin & Traditional Assets ROI</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="exception"></th>
                            <th class="exception text-right">Bitcoin</th>
                            <th class="exception text-right">Gold</th>
                            <th class="exception text-right">S&P 500</th>
                        </tr>
                    </thead>
                    <tbody class="font-weight-bold">
                        <tr>
                            <td>1 year:</td>
                            <td class="text-success text-right">{{ $scraps["firstyr_bitcoin"] }}</td>
                            <td class="text-success text-right">{{ $scraps["firstyr_gold"] }}</td>
                            <td class="text-success text-right">{{ $scraps["firstyr_sp"] }}</td>
                        </tr>
                        <tr>
                            <td>2 year:</td>
                            <td class="text-success text-right">{{ $scraps["secondyr_bitcoin"] }}</td>
                            <td class="text-success text-right">{{ $scraps["secondyr_gold"] }}</td>
                            <td class="text-success text-right">{{ $scraps["secondyr_sp"] }}</td>
                        </tr>
                        <tr>
                            <td>3 year:</td>
                            <td class="text-success text-right">{{ $scraps["thirdyr_bitcoin"] }}</td>
                            <td class="text-success text-right">{{ $scraps["thirdyr_gold"] }}</td>
                            <td class="text-success text-right">{{ $scraps["thirdyr_sp"] }}</td>
                        </tr>
                        <tr>
                            <td>4 year:</td>
                            <td class="text-success text-right">{{ $scraps["fourthyr_bitcoin"] }}</td>
                            <td class="text-success text-right">{{ $scraps["fourthyr_gold"] }}</td>
                            <td class="text-success text-right">{{ $scraps["fourthyr_sp"] }}</td>
                        </tr>
                        <tr>
                            <td>5 year:</td>
                            <td class="text-success text-right">{{ $scraps["fifthyr_bitcoin"] }}</td>
                            <td class="text-success text-right">{{ $scraps["fifthyr_gold"] }}</td>
                            <td class="text-success text-right">{{ $scraps["fifthyr_sp"] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Difficulty Stats</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Block Height</span> <span class="float-right">{{$scraps['BlockHeight']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Average Block Time</span> <span class="float-right">{{$scraps['AverageBlockTime']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Money Supply</span> <span class="float-right">{{$scraps['MoneySupply']}} <span class="small font-weight-bold">BTC</span></span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Percentage Issued</span> <span class="float-right">{{$scraps['PercentageIssued']}} %</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Chain Size</span> <span class="float-right">{{$scraps['ChainSize']}} <span class="small font-weight-bold">GB</span></span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Total Transactions</span> <span class="float-right">{{$scraps['TotalTransactions']}}</span></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h4 class="px-3">Blockchain Stats</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Hash Rate (24hrs)</span> <span class="float-right">{{$scraps['HashRate']}} <span class="small font-weight-bold">EH/s</span></span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Block Subsidy</span> <span class="float-right">{{$scraps['BlockSubsidy']}} <span class="small font-weight-bold">BTC</span></span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Block Subsidy Value</span> <span class="float-right">$ {{$scraps['BlockSubsidyValue']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Blocks Mined (24hrs)</span> <span class="float-right">{{$scraps['BlocksMined']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Transactions (24hrs)</span> <span class="float-right">{{$scraps['MiningTransactions']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Percentage SegWit (24hrs)</span> <span class="float-right">{{$scraps['PercentageSegWit']}} %</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Total Fees (24hrs)</span> <span class="float-right">{{$scraps['TotalFees']}} <span class="small font-weight-bold">BTC</span></span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Average Fees Per Block (24hrs)</span> <span class="float-right">{{$scraps['AverageFeesPerBlock']}} <span class="small font-weight-bold">BTC</span></span></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h4 class="px-3">Mining Stats</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Difficulty</span> <span class="float-right"> {{$scraps['Difficulty']}} <span class="small font-weight-bold">T</span></span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Difficulty Epoch</span> <span class="float-right">{{$scraps['DifficultyEpoch']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Estimated Difficulty Change</span> <span class="float-right">{{$scraps['EstimatedDifficultyChange']}} %</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Last Difficulty Change</span> <span class="float-right">{{$scraps['LastDifficultyChange']}} %</span></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h4 class="px-3">Mempool Stats</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Transactions</span> <span class="float-right"> {{$scraps['MempoolTransactions']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Pending Fees</span> <span class="float-right">{{$scraps['PendingFees']}} <span class="small font-weight-bold">BTC</span></span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Pending Fees Value</span> <span class="float-right">$ {{$scraps['PendingFeesValue']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Virtual Size</span> <span class="float-right">{{$scraps['VirtualSize']}} <span class="small font-weight-bold">MB</span></span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Blocks To Clear</span> <span class="float-right">{{$scraps['BlocksToClear']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Percentage RBF</span> <span class="float-right">{{$scraps['PercentageRBF']}} %</span></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h4 class="px-3">Fee Estimates</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Next Block</span> <span class="float-right"> {{$scraps['EstimateNextBlock'] }} sat/vB</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">30 Minutes</span> <span class="float-right">{{$scraps['EstimateMinutes'] }} sat/vB</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">1 Hour</span> <span class="float-right">{{$scraps['EstimateHour'] }} sat/vB</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">1 Day</span> <span class="float-right">{{$scraps['EstimateDay'] }} sat/vB</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">1 Week</span> <span class="float-right">{{$scraps['EstimateWeek'] }} sat/vB</span></li>                
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Price Indicators</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Mayer Multiple</span> <span class="float-right"> {{$scraps['MayerMultiple'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">50 Day Moving Average</span> <span class="float-right">$ {{$scraps['MovingDay50'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">100 Day Moving Average</span> <span class="float-right">$ {{$scraps['MovingDay100'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">200 Day Moving Average</span> <span class="float-right">$ {{$scraps['MovingDay200'] }}</span></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Exchange Traded Products</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">GBTC Price</span> <span class="float-right">$ {{$scraps['GBTCPrice'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">GBTC Bitcoin Per Share</span> <span class="float-right">{{$scraps['GBTCBitcoinPerShare'] }} <span class="small font-weight-bold">BTC</span> </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">GBTC Premium</span> <span class="float-right">{{$scraps['GBTCPremium'] }} %</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">QBTC.U-TO Price</span> <span class="float-right">$ {{$scraps['QBTCPrice'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">QBTC.U-TO Bitcoin Per Share</span> <span class="float-right">{{$scraps['QBTCBitcoinShare'] }} <span class="small font-weight-bold">BTC</span> </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">QBTC.U-TO Premium</span> <span class="float-right">{{$scraps['QBTCToPremium'] }} %</span></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Bitcoin vs. Gold</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Bitcoin Priced In Gold</span> <span class="float-right"> {{$scraps['BitcoinPricedInGold'] }} <span class="small font-weight-bold">OZ</span> </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Bitcoin vs Gold Market Cap</span> <span class="float-right">{{$scraps['BitcoinVsGoldMarketCap'] }} %</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Bitcoin/Gold Parity</span> <span class="float-right">$ {{$scraps['GoldParity'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Gold Price Per Ounce</span> <span class="float-right">$ {{$scraps['GoldPricePerOunce'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Gold Market Cap</span> <span class="float-right">$ {{$scraps['GoldMarketCap'] }} <span class="small font-weight-bold">T</span> </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Gold Supply In Tonnes</span> <span class="float-right">{{$scraps['GoldSupplyInTonnes'] }}</span></li>
                </ul>
            </div>

            {{-- <div class="col-md-4 mb-4">
                <h4 class="px-3">Economics</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Forward Annual Inflation</span> <span class="float-right"> {{$scraps['RealizedAnnualInflation'] - .95 }} %</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Realized Annual Inflation</span> <span class="float-right">{{$scraps['RealizedAnnualInflation'] }} %</span></li>
                </ul>
            </div> --}}

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Bitcoin Treasuries</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Companies Reporting BTC Holdings</span> <span class="float-right"> {{$scraps['CompaniesReportingBTCHoldings'] }} </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Bitcoin Held In Treasuries</span> <span class="float-right">{{$scraps['BitcoinHeldInTreasuries'] }} <span class="small font-weight-bold">BTC</span> </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Percentage Held In Treasuries</span> <span class="float-right">$ {{$scraps['PercentageHeldInTreasuries'] }} %</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Treasuries Value</span> <span class="float-right">$ {{$scraps['TreasuriesValue'] }} <span class="small font-weight-bold">B</span> </span></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Future Halvings</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Block 840,000</span> <span class="float-right"> {{$scraps['Block_1'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Block 1,050,000</span> <span class="float-right">{{$scraps['Block_2'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Block 1,260,00</span> <span class="float-right">{{$scraps['Block_3'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Block 1,470,000</span> <span class="float-right">{{$scraps['Block_4'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Block 1,680,000</span> <span class="float-right">{{$scraps['Block_5'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Block 1,890,000</span> <span class="float-right">{{$scraps['Block_6'] }}</span></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Future Bitcoin Supply</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">90% Supply</span> <span class="float-right"> {{$scraps['supply_1'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">95% Supply</span> <span class="float-right">{{$scraps['supply_2'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">99% Supply</span> <span class="float-right">{{$scraps['supply_3'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">99.9% Supply</span> <span class="float-right">{{$scraps['supply_4'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">100% Supply</span> <span class="float-right">{{$scraps['supply_5'] }}</span></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Bitcoin Nodes</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Reachable Bitcoin Nodes</span> <span class="float-right"> {{$scraps['ReachableBitcoinNodes'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Bitcoin Tor Nodes</span> <span class="float-right">{{$scraps['BitcoinTorNodes'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Percentage Tor Nodes</span> <span class="float-right">{{$scraps['PercentageTorNodes'] }}</span></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Top Bitcoin Node Versions</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Satoshi  0.20.1</span> <span class="float-right"> {{$scraps['Satoshi_1'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Satoshi  0.20.0</span> <span class="float-right">{{$scraps['Satoshi_2'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Satoshi  0.19.1</span> <span class="float-right">{{$scraps['Satoshi_4'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Satoshi  0.18.1</span> <span class="float-right">{{$scraps['Satoshi_3'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Satoshi  0.18.0</span> <span class="float-right">{{$scraps['Satoshi_5'] }}</span></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Lightning Network Stats</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Network Capacity</span> <span class="float-right"> {{$scraps['NetworkCapacity'] }} <span class="small font-weight-bold">BTC</span> </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Network Capacity Value</span> <span class="float-right">$ {{$scraps['NetworkCapacityValue'] }} <span class="small font-weight-bold">M</span> </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Number of Channels</span> <span class="float-right">{{$scraps['NumberOfChannels'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Number of Nodes</span> <span class="float-right">{{$scraps['NumberOfNodes'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Average Channel Capacity</span> <span class="float-right">{{$scraps['AverageChannelCapacity'] }} <span class="small font-weight-bold">BTC</span> </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Average Channel Capacity Value</span> <span class="float-right">$ {{$scraps['AverageChannelCapacityValue'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Average Channels Per Node</span> <span class="float-right">{{$scraps['AverageChannelsPerNode'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Average Node Capacity</span> <span class="float-right">{{$scraps['AverageNodeCapacity'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Number of Active Channels</span> <span class="float-right">{{$scraps['ActiveChannels'] }}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Number of Tor Nodes</span> <span class="float-right">{{$scraps['NumberOfTorNodes'] }}</span></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Of Main -->
@endsection
    
@section('custom-script')
<script>
    $(document).ready( function(){
        var percent = $('.change-percent .value').text();
        var updatePrice = function() {
            $.ajax({
                url : "{{url('getbtcPrice')}}",
                type: "GET",
                dataType: 'json',
                success: function(response){
                    // console.log(response);
                    $('.price').html(response.price);
                    $('.BtcVolume').html(response.btc_volume);
                    $('.marketCap').html(response.market_cap);
                },
            });
        }
        updatePrice();
        setInterval(() => {
            updatePrice();
        }, 2000);
    });
</script>
@endsection