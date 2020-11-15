<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon2.ico')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- fontawesome Icon -->
    <script src="https://kit.fontawesome.com/9d28b7cdc0.js" crossorigin="anonymous"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('autocomplete/jquery.auto-complete.css')}}">
    <style>
        body{
            color:#242424;
        }
        header {
            height          : 30vh;
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
    <title>Responsible Bitcoin & Cryptocurrency knowledge & reviews</title>
</head>
<body>
    <!-- header -->
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-md nav-menu fixed-top px-md-5">
            <a href="{{ URL::to('/') }}" class="navbar-brand"><img src="{{asset('images/cryptocutter_logo2.png')}}" class="img-fluid" alt="brang logo" width="200"></a>
            <button class="navbar-toggler nav-button" type="button" data-toggle="collapse" data-target="#myNavbar">
                <div class="bg-dark line1"></div>
                <div class="bg-dark line2"></div>
                <div class="bg-dark line3"></div>
            </button>
            <div class="collapse navbar-collapse justify-content-end text-uppercase font-weight-bold" id="myNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="https://t.me/thecryptocutter" target="_blank" class="nav-link m-2 menu-item text-primary"><i class="fab fa-telegram fa-3x"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://twitter.com/thecryptocutter" target="_blank" class="nav-link m-2 menu-item text-primary"><i class="fab fa-twitter fa-3x"></i></a>    
                    </li>
                </ul>
            </div>
        </nav>
        <!-- end of navbar -->

        <!-- wrapper -->
        <div class="container-fluid pt-md-4 px-md-5 pb-sm-3 wrapper">
            <div class="row">
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{URL::to('/ticker')}}" class="btn btn-home px-lg-3 px-2 mb-2" id="bitcoin"> <span class="float-left">Bitcoin Dashboard</span></a>           
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{URL::to('/')}}" class="btn btn-home px-lg-3 px-2 mb-2" id="exchange"> <span class="float-left">Exchanges</span> <span class="float-right"><i class="fab fa-stack-exchange"></i></span></a>           
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{route('cryptocard')}}" class="btn btn-home px-lg-3 px-2 mb-2" id="card"> <span class="float-left">Cards</span> <span class="float-right"><i class="far fa-credit-card"></i></span></a>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{route('cryptoloan')}}" class="btn btn-home px-lg-3 px-2 mb-2" id="loan"> <span class="float-left">Loans</span> <span class="float-right"><i class="fas fa-money-check"></i></span></a>
                </div>
                
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{route('cryptointerest.accounts')}}" class="btn btn-home px-lg-3 px-2 mb-2" id="interest"> <span class="float-left">Interest</span> <span class="float-right"><i class="fas fa-money-check-alt"></i></span></a>
                </div>
                {{-- <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{route('cryptowallet')}}" class="btn btn-home px-lg-3 px-2 mb-2" id="wallet"> <span class="float-left">Wallets</span> <span class="float-right"><i class="fas fa-wallet"></i></span></a>
                </div> --}}
                <div class="col-6 col-sm-4 col-lg-2">
                    {{-- <a href="#" class="btn btn-home px-lg-3 px-2 mb-2" id="more"> <span class="float-left">More</span> <span class="float-right"><i class="fas fa-ellipsis-h"></i></span></a> --}}
                    <div class="dropdown">
                        <a class="btn btn-home px-lg-3 px-2 mb-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="float-left">More</span> <span class="float-right"><i class="fas fa-ellipsis-h"></i></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('cryptowallet')}}">Wallets</a>
                            <a class="dropdown-item" href="{{route('more.cryptos')}}">Cryptos</a>
                            <a class="dropdown-item" href="{{route('more.treasuries')}}">Company Treasuries</a>
                          {{-- <a class="dropdown-item" href="#">Something</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center text-primary font-weight-bold mt-2 donate">Cryptocutter is reader-supported through donations & commissions. <a href="{{route('donate')}}">Donate now</a></p>
        </div>
        <!-- end of wrapper -->


    </header>
    <!-- end of header -->

    <div class="container-fluid px-5 py-3">
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
                    <li class="list-group-item font-weight-bold"><span class="float-left">Marekt Cap</span> <span class="float-right market-cap">{{$states['DISPLAY']['BTC']['USD']['MKTCAP']}}</span></li>
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
                    <li class="list-group-item font-weight-bold"><span class="float-left">Chain Sizd</span> <span class="float-right">{{$scraps['ChainSize']}} <span class="small font-weight-bold">GB</span></span></li>
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

    <footer class="footer mt-5">
        <div class="container">
            <div class="py-4"></div>
            <hr>
            <div class="row align-items-center justify-content-md-between py-4">
                <div class="col text-md-center">
                   <span class="footer-font-size">&copy; 2020 Cryptocutter is handcrafted by <a href="https://ariventures.net" target="_blank">Ari Ventures</a>.</span> 
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="{{asset('js/script.js')}}"></script>
        
    <!-- Custom Script -->
    @yield('custom-script')

    @include('analytics')
</body>
</html>