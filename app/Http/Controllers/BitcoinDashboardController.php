<?php

namespace App\Http\Controllers;

use App\WebScrape;
use Illuminate\Http\Request;
use Goutte\Client;
use Exception;

class BitcoinDashboardController extends Controller
{
    private $states = [];
    private $caseBitcoinStates = [];
    private $cbstates = [];
    
    public function index(){
        
        //Web Scrap from bitbo
        $scraps = $this->web_scrap();
        return view('cryptocurrency')->with('scraps', $scraps);
    }

    public function web_scrap(){
        $goutteClient = new Client();

        $bitbo = $goutteClient->request('GET', 'https://bitbo.io/');
        $casebitcoin = $goutteClient->request('GET', 'https://casebitcoin.com/');
        $cb_data = $goutteClient->request('GET', 'https://casebitcoin.com/charts');

        $bitbo->filter('.stat .value')->each(function ($item) {
            array_push($this->states, $item->text());
        });
        $CurrentPrice  = $bitbo->filter('.amount')->text();
        $sign = $bitbo->filter('.plus-minus')->text();
        array_push($this->states, $CurrentPrice);
        array_push($this->states, $sign);


        //scrape data from casebitcoin
        $page  = $casebitcoin->filter('.qb_itemset');
        for($i = 0 ; $i < 18 ; $i++){
            if($i <= 7){
                array_push( $this->caseBitcoinStates, $page->eq($i)->filter('.qbi_content1')->text() );
                array_push( $this->caseBitcoinStates, $page->eq($i)->filter('.qbi_content2')->text() );
                array_push( $this->caseBitcoinStates, $page->eq($i)->filter('.qbi_change')->text() );
            }
            else{
                array_push( $this->caseBitcoinStates, $page->eq($i)->filter('.qbi_content_big')->text() );
            }
            
        }

        //scrape data from casebitcoin charts
        $cb_data->filter('.cbst_datum')->each(function ($item) {
            array_push( $this->cbstates, $item->text() );
        });

        try {

            $result = $this->makeResult();
            return $result;
          
        } catch (Exception $e) {
            //fetch store data
            $webState = WebScrape::select('state')->where('id', '1')->first();
            $result = json_decode($webState->state, true);
            return $result;
        }

    }

    private function makeResult(){
        $output = [];
        $output["Range24hr"] = str_replace('-', ' - ', $this->states[0]);
        $output["USDPerSatoshi"] = str_replace('$', '', $this->states[1]);
        $output["SatoshisPerUSD"] = str_replace('ⓢ', '', $this->states[2]);
        $output["BTCVolume24hr"] = $this->states[3];
        $output["USDVolume24hr"] = str_replace( array( "$", "B" ), '', $this->states[4]);
        $output["MarketCap"] = str_replace( array( "$", "B" ), '', $this->states[5]);
        $output["BlockHeight"] = $this->states[6];
        $output["TimeSinceLastBlock"] = "null";
        $output["AverageBlockTime"] = $this->states[8];
        $output["MoneySupply"] = str_replace('BTC', '', $this->states[9]);
        $output["PercentageIssued"] = str_replace('%', '', $this->states[10]);
        $output["ChainSize"] = str_replace('GB', '', $this->states[11]);
        $output["TotalTransactions"] = $this->states[12];
        $output["Difficulty"] = str_replace('T', '', $this->states[13]);
        $output["DifficultyEpoch"] = $this->states[14];
        $output["EstimatedDifficultyChange"] = str_replace('%', '', $this->states[15]);
        $output["BlocksToRetarget"] = "null";
        $output["EstimatedRetargetDate"] = "null";
        $output["LastDifficultyChange"] = str_replace('%', '', $this->states[18]);
        $output["HashRate"] = str_replace('EH/s', '', $this->states[19]);
        $output["BlockSubsidy"] = str_replace('BTC', '', $this->states[20]);
        $output["BlockSubsidyValue"] = str_replace('$', '', $this->states[21]);
        $output["BlocksMined"] = $this->states[22];
        $output["MiningTransactions"] = $this->states[23];
        $output["PercentageSegWit"] = str_replace('%', '', $this->states[24]);
        $output["TotalFees"] = str_replace('BTC', '', $this->states[25]);
        $output["AverageFeesPerBlock"] = str_replace('BTC', '', $this->states[26]);
        $output["TotalFeesVsReward"] = str_replace('%', '', $this->states[27]);

        $output["MempoolTransactions"] = $this->states[28];
        $output["PendingFees"] = str_replace('BTC', '', $this->states[29]);
        $output["PendingFeesValue"] = str_replace('$', '', $this->states[30]);
        $output["VirtualSize"] = str_replace('MB', '', $this->states[31]);
        $output["BlocksToClear"] = $this->states[32];
        $output["PercentageRBF"] = str_replace('%', '', $this->states[33]);

        $output["EstimateNextBlock"] = str_replace('sat/vB', '', $this->states[34]);
        $output["EstimateMinutes"] = str_replace('sat/vB', '', $this->states[35]);
        $output["EstimateHour"] = str_replace('sat/vB', '', $this->states[36]);
        $output["EstimateDay"] = str_replace('sat/vB', '', $this->states[37]);
        $output["EstimateWeek"] = str_replace('sat/vB', '', $this->states[38]);

        $output["MayerMultiple"] = $this->states[39];
        $output["MovingDay50"] = str_replace('$', '', $this->states[40]);
        $output["MovingDay100"] = str_replace('$', '', $this->states[41]);
        $output["MovingDay200"] = str_replace('$', '', $this->states[42]);

        $output["GBTCPrice"] = str_replace('$', '', $this->states[43]);
        $output["GBTCBitcoinPerShare"] = str_replace('BTC', '', $this->states[44]);
        $output["GBTCPremium"] = str_replace('%', '', $this->states[45]);
        $output["QBTCPrice"] = str_replace('$', '', $this->states[46]);
        $output["QBTCBitcoinShare"] = str_replace('BTC', '', $this->states[47]);
        $output["QBTCToPremium"] = str_replace('%', '', $this->states[48]);

        $output["BitcoinPricedInGold"] = str_replace('OZ', '', $this->states[49]);
        $output["BitcoinVsGoldMarketCap"] = str_replace('%', '', $this->states[50]);
        $output["GoldParity"] = str_replace('$', '', $this->states[51]);
        $output["GoldPricePerOunce"] = str_replace('$', '', $this->states[52]);
        $output["GoldMarketCap"] = str_replace(array( "$", "T" ), '', $this->states[53]);
        $output["GoldSupplyInTonnes"] = $this->states[54];

        $output["ForwardAnnualInflation"] = "null";
        $output["RealizedAnnualInflation"] = str_replace('%', '', $this->states[56]);

        $output["CompaniesReportingBTCHoldings"] = $this->states[57];
        $output["BitcoinHeldInTreasuries"] = str_replace('BTC', '', $this->states[58]);
        $output["PercentageHeldInTreasuries"] = str_replace('%', '', $this->states[59]);
        $output["TreasuriesValue"] = str_replace(array( "$", "B" ), '', $this->states[60]);

        $output["Block_1"] = $this->states[61];
        $output["Block_2"] = $this->states[62];
        $output["Block_3"] = $this->states[63];
        $output["Block_4"] = $this->states[64];
        $output["Block_5"] = $this->states[65];
        $output["Block_6"] = $this->states[66];

        $output["supply_1"] = $this->states[67];
        $output["supply_2"] = $this->states[68];
        $output["supply_3"] = $this->states[69];
        $output["supply_4"] = $this->states[70];
        $output["supply_5"] = $this->states[71];

        $output["ReachableBitcoinNodes"] = $this->states[72];
        $output["BitcoinTorNodes"] = $this->states[73];
        $output["PercentageTorNodes"] = str_replace('%', '', $this->states[74]);

        $output["Satoshi_1"] = str_replace('(', ' (', $this->states[75]);
        $output["Satoshi_2"] = str_replace('(', ' (', $this->states[76]);
        $output["Satoshi_3"] = str_replace('(', ' (', $this->states[77]);
        $output["Satoshi_4"] = str_replace('(', ' (', $this->states[78]);
        $output["Satoshi_5"] = str_replace('(', ' (', $this->states[79]);

        $output["NetworkCapacity"] = str_replace('BTC', '', $this->states[80]);
        $output["NetworkCapacityValue"] = str_replace(array( "$", "M" ), '', $this->states[81]);
        $output["NumberOfChannels"] = $this->states[82];
        $output["NumberOfNodes"] = $this->states[83];
        $output["AverageChannelCapacity"] = str_replace('BTC', '', $this->states[84]);
        $output["AverageChannelCapacityValue"] = str_replace('$', '', $this->states[85]);
        $output["AverageChannelsPerNode"] = $this->states[86];
        $output["AverageNodeCapacity"] = $this->states[87];
        $output["ActiveChannels"] = $this->states[88];
        $output["NumberOfTorNodes"] = $this->states[89];
        $output['currentPrice'] = $this->states[90];
        $output['sign'] = $this->states[91];

        //casebitcoin
        $output['CaseBitcoinPrice']  = str_replace( array( '📈', '📉' ), '', $this->caseBitcoinStates[0]);
        $output['PriceChange'] = str_replace('$', ' $', $this->caseBitcoinStates[1]);
        $output['PriceChangePCT'] = $this->caseBitcoinStates[2];
        $output['spPrice']  = str_replace( array('📈', '📉' ), '', $this->caseBitcoinStates[3]);
        $output['spChange'] = str_replace('$', ' $', $this->caseBitcoinStates[4]);
        $output['spChangePCT'] = $this->caseBitcoinStates[5];
        $output['goldPrice']  = str_replace( array( '$', '📈', '📉' ), '', $this->caseBitcoinStates[6]);
        $output['goldChange'] = str_replace('$', ' $', $this->caseBitcoinStates[7]);
        $output['goldChangePCT'] = $this->caseBitcoinStates[8];
        $output['silverPrice']  = str_replace( array( '$', '📈', '📉' ), '', $this->caseBitcoinStates[9]);
        $output['silverChange'] = str_replace('$', ' $', $this->caseBitcoinStates[10]);
        $output['silverChangePCT'] = $this->caseBitcoinStates[11];
        $output['euroPrice']  = str_replace( array( '$', '📈', '📉' ), '', $this->caseBitcoinStates[12]);
        $output['euroChange'] = str_replace('$', ' $', $this->caseBitcoinStates[13]);
        $output['euroChangePCT'] = $this->caseBitcoinStates[14];
        $output['yenPrice']  = str_replace( array( '¥', '📈', '📉' ), '', $this->caseBitcoinStates[15]);
        $output['yenChange'] = str_replace('¥', ' ¥', $this->caseBitcoinStates[16]);
        $output['yenChangePCT'] = $this->caseBitcoinStates[17];
        $output['renminbiPrice']  = str_replace( array( '¥', '📈', '📉' ), '', $this->caseBitcoinStates[18]);
        $output['renminbiChange'] = str_replace('¥', ' ¥', $this->caseBitcoinStates[19]);
        $output['renminbiChangePCT'] = $this->caseBitcoinStates[20];
        $output['oilPrice']  = str_replace( array( '$', '📈', '📉' ), '', $this->caseBitcoinStates[21]);
        $output['oilChange'] = str_replace('$', ' $', $this->caseBitcoinStates[22]);
        $output['oilChangePCT'] = $this->caseBitcoinStates[23];

        //coinbaseBitcoin
        $output['BtcInflationRate'] = str_replace('%', ' %', $this->caseBitcoinStates[25]);
        $output['SupplyIssued'] = str_replace('%', ' %', $this->caseBitcoinStates[26]);
        $output['BtcSettlementVolume'] = str_replace('B', '', $this->caseBitcoinStates[27]);
        $output['RealExchangeVolume'] = str_replace('B', '', $this->caseBitcoinStates[28]);
        $output['ActiveAddresses'] = str_replace('M', '', $this->caseBitcoinStates[29]);
        $output['MiningRewardValue'] = str_replace('M', '', $this->caseBitcoinStates[30]);
        $output['BtcDownATH'] = str_replace('%', ' %', $this->caseBitcoinStates[32]);
        $output['BtcUpCycleLow'] = str_replace('%', ' %', $this->caseBitcoinStates[33]);
        
        $output["firstyr_bitcoin"] = $this->cbstates[5];
        $output["firstyr_gold"] = $this->cbstates[6];
        $output["firstyr_sp"] = $this->cbstates[7];
        $output["secondyr_bitcoin"] = $this->cbstates[9];
        $output["secondyr_gold"] = $this->cbstates[10];
        $output["secondyr_sp"] = $this->cbstates[11];
        $output["thirdyr_bitcoin"] = $this->cbstates[13];
        $output["thirdyr_gold"] = $this->cbstates[14];
        $output["thirdyr_sp"] = $this->cbstates[15];
        $output["fourthyr_bitcoin"] = $this->cbstates[17];
        $output["fourthyr_gold"] = $this->cbstates[18];
        $output["fourthyr_sp"] = $this->cbstates[19];
        $output["fifthyr_bitcoin"] = $this->cbstates[21];
        $output["fifthyr_gold"] = $this->cbstates[22];
        $output["fifthyr_sp"] = $this->cbstates[23];

        $output["mcap_close_r1"] = $this->cbstates[27];
        $output["mcap_close_days_r1"] = $this->cbstates[28];
        $output["mcap_close_per_r1"] = $this->cbstates[29];
        $output["mcap_close_r2"] = $this->cbstates[30];
        $output["mcap_close_days_r2"] = $this->cbstates[31];
        $output["mcap_close_per_r2"] = $this->cbstates[32];
        $output["mcap_close_r3"] = $this->cbstates[33];
        $output["mcap_close_days_r3"] = $this->cbstates[34];
        $output["mcap_close_per_r3"] = $this->cbstates[35];
        $output["mcap_close_r4"] = $this->cbstates[36];
        $output["mcap_close_days_r4"] = $this->cbstates[37];
        $output["mcap_close_per_r4"] = $this->cbstates[38];
        $output["mcap_close_r5"] = $this->cbstates[39];
        $output["mcap_close_days_r5"] = $this->cbstates[40];
        $output["mcap_close_per_r5"] = $this->cbstates[41];

        $output["price_close_r1"] = $this->cbstates[45];
        $output["price_close_days_r1"] = $this->cbstates[46];
        $output["price_close_per_r1"] = $this->cbstates[47];
        $output["price_close_r2"] = $this->cbstates[48];
        $output["price_close_days_r2"] = $this->cbstates[49];
        $output["price_close_per_r2"] = $this->cbstates[50];
        $output["price_close_r3"] = $this->cbstates[51];
        $output["price_close_days_r3"] = $this->cbstates[52];
        $output["price_close_per_r3"] = $this->cbstates[53];
        $output["price_close_r4"] = $this->cbstates[54];
        $output["price_close_days_r4"] = $this->cbstates[55];
        $output["price_close_per_r4"] = $this->cbstates[56];
        $output["price_close_r5"] = $this->cbstates[57];
        $output["price_close_days_r5"] = $this->cbstates[58];
        $output["price_close_per_r5"] = $this->cbstates[59];

        $output["roi_date_r1"] = $this->cbstates[66];
        $output["roi_price_r1"] = $this->cbstates[67];
        $output["roi_today_r1"] = $this->cbstates[68];
        $output["roi_date_r2"] = $this->cbstates[69];
        $output["roi_price_r2"] = $this->cbstates[70];
        $output["roi_today_r2"] = $this->cbstates[71];
        $output["roi_date_r3"] = $this->cbstates[72];
        $output["roi_price_r3"] = $this->cbstates[73];
        $output["roi_today_r3"] = $this->cbstates[74];
        $output["roi_date_r4"] = $this->cbstates[75];
        $output["roi_price_r4"] = $this->cbstates[76];
        $output["roi_today_r4"] = $this->cbstates[77];
        $output["roi_date_r5"] = $this->cbstates[78];
        $output["roi_price_r5"] = $this->cbstates[79];
        $output["roi_today_r5"] = $this->cbstates[80];
        $output["roi_date_r6"] = $this->cbstates[81];
        $output["roi_price_r6"] = $this->cbstates[82];
        $output["roi_today_r6"] = $this->cbstates[83];
        $output["roi_date_r7"] = $this->cbstates[84];
        $output["roi_price_r7"] = $this->cbstates[85];
        $output["roi_today_r7"] = $this->cbstates[86];
        $output["roi_date_r8"] = $this->cbstates[87];
        $output["roi_price_r8"] = $this->cbstates[88];
        $output["roi_today_r8"] = $this->cbstates[89];
        $output["roi_date_r9"] = $this->cbstates[90];
        $output["roi_price_r9"] = $this->cbstates[91];
        $output["roi_today_r9"] = $this->cbstates[92];
        $output["roi_date_r10"] = $this->cbstates[93];
        $output["roi_price_r10"] = $this->cbstates[94];
        $output["roi_today_r10"] = $this->cbstates[95];


        return $output;
    }

    public function currentStatus(){
        $goutteClient = new Client();

        $bitbo = $goutteClient->request('GET', 'https://bitbo.io/');
        $CurrentPrice  = $bitbo->filter('.amount')->text();
        $btc_volume = $bitbo->filter('.stat .value')->eq(3)->text();
        $marketCap = str_replace( array( "$", "B" ), '', $bitbo->filter('.stat .value')->eq(5)->text());
        // return $CurrentPrice;
        // var_dump($CurrentPrice);
        return response()->json(["price"=>$CurrentPrice, "btc_volume"=>$btc_volume, "market_cap"=>$marketCap]);
    }

    public function storeState(){
        $scraps = $this->web_scrap();

        $data["state"] = json_encode($scraps);

        // store data
        // $res = WebScrape::create($data);
        //update data
        $web = WebScrape::find(1);
        $res = $web->update($data);
        if($res){
            return "Data successfully stored";
        }
        else{
            return "Data not stored";
        }
        
    }
}
