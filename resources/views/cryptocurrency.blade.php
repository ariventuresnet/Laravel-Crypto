@extends('layouts.cryptocutter-layout')

@section('custom-css')
    <style>
        body{
            color:#242424;
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
    </style>
@endsection

@section('main-content')
    <div class="container-fluid px-5">
        <div class="row mb-5">
            <div class="col-md-8">
                <h4>Bitcoin (BTC) Live Price</h3>
                <?php $change24h = (float) $states['DISPLAY']['BTC']['USD']['CHANGEPCT24HOUR'];  ?>
                <span class="font-weight-bold">$</span> <span class="display-4 price">{{$states['RAW']['BTC']['USD']['PRICE']}}</span> <span class="font-weight-bold {{$change24h > 0 ? 'text-success' : 'text-danger'}}"> ({{$change24h}}%)</span>
                <img src="{{asset('images/demo-chart2.png')}}" alt="chart" class="img-fluid mt-4">
            </div>
            <div class="col-md-4">
                <h4 class="px-3">Bitcoin Market Stats</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">24hr Range</span> <span class="float-right"><span class="low">{{$states['DISPLAY']['BTC']['USD']['LOWDAY']}}</span> - <span class="high">{{$states['DISPLAY']['BTC']['USD']['HIGHDAY']}}</span> </span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">USD Per Satoshi</span> <span class="float-right">$ {{$scraps["USDPerSatoshi"]}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Satoshis Per USD</span> <span class="float-right">ⓢ {{$scraps["SatoshisPerUSD"]}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">24hr Volume (BTC)</span> <span class="float-right btc-volumn">{{$states['DISPLAY']['BTC']['USD']['TOTALVOLUME24H']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">24hr Volume (USD)</span> <span class="float-right usd-volumn">{{$states['DISPLAY']['BTC']['USD']['TOTALVOLUME24HTO']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Top Tier Volumn</span> <span class="float-right tier-volumn">{{$states['DISPLAY']['BTC']['USD']['TOTALTOPTIERVOLUME24HTO']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Market Cap</span> <span class="float-right market-cap">{{$states['DISPLAY']['BTC']['USD']['MKTCAP']}}</span></li>
                </ul>
            </div>
        </div>

        <div class="row pt-3">
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
                <h4 class="px-3">Mining Stats</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Difficulty</span> <span class="float-right"> {{$scraps['Difficulty']}} <span class="small font-weight-bold">T</span></span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Difficulty Epoch</span> <span class="float-right">{{$scraps['DifficultyEpoch']}}</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Estimated Difficulty Change</span> <span class="float-right">{{$scraps['EstimatedDifficultyChange']}} %</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Last Difficulty Change</span> <span class="float-right">{{$scraps['LastDifficultyChange']}} %</span></li>
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

            <div class="col-md-4 mb-4">
                <h4 class="px-3">Economics</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold"><span class="float-left">Forward Annual Inflation</span> <span class="float-right"> {{$scraps['RealizedAnnualInflation'] - .95 }} %</span></li>
                    <li class="list-group-item font-weight-bold"><span class="float-left">Realized Annual Inflation</span> <span class="float-right">{{$scraps['RealizedAnnualInflation'] }} %</span></li>
                </ul>
            </div>

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
    </div>
@endsection