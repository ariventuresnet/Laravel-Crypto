<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class CryptoCompareController extends Controller
{   
    private $states = [];

    public function getBTCPrice()
    {
        $manager = app('cryptocurrencies.manager');
        /** @var CryptocomparePriceGateway $priceGateway */
        $priceGateway = $manager->getGateway('price');
        // $historyGateway = $manager->getGateway('historical');

        //parameters passed to the method are defined in accordance with the Cryptocompare documentation of endpoint
        $parameters = [
            'fsym' => 'BTC',
            'tsym' => 'USD',
        ];
        $result = $priceGateway->getSingleSymbolPrice($parameters);
        // $result = $historyGateway->getHistoricalDaily($parameters);
        // return $result;
        return view('bitcoinDashboard');
    }

    // public function get_data(){
    //     $goutteClient = new Client();

    //     $page = $goutteClient->request('GET', 'https://www.worldometers.info/coronavirus/');
    //     $bd_page = $goutteClient->request('GET', 'https://www.worldometers.info/coronavirus/country/bangladesh/');
    //     // $total = $page->filter('.maincounter-number')->text();

    //     $page->filter('.maincounter-number')->each(function ($item) {
    //         // dump($item->text());
    //         // echo $item->text() . "<br>";
    //         array_push($this->states, $item->text());
    //     });

    //     $bd_page->filter('.maincounter-number')->each( function ($item) {
    //         array_push($this->bd_states, $item->text());
    //     });

    //     // return $this->states;
    //     $result = $this->makeResult();
    //     return response()->json($result);
    // }

    // private function makeResult(){
    //     $output = [];
    //     $output["total_case"] = $this->states[0];
    //     $output["death"] = $this->states[1];
    //     $output["recover"] = $this->states[2];
    //     $output["bd_total_case"] = $this->bd_states[0];
    //     $output["bd_death"] = $this->bd_states[1];
    //     $output["bd_recover"] = $this->bd_states[2];
    //     return $output;
    // }

    public function get_data(){
        $goutteClient = new Client();

        $page = $goutteClient->request('GET', 'https://bitbo.io/');
        // $value = $page->filter('.stat .value')->text();

        $page->filter('.stat .value')->each(function ($item) {
            // echo $item->text() . "<br>";
            array_push($this->states, $item->text());
        });
        $result = $this->makeResult();
        return response()->json($result);

    }

    private function makeResult(){
        $output = [];
        $output["24hr Range"] = str_replace('-', ' - ', $this->states[0]);
        $output["USD Per Satoshi"] = str_replace('$', '', $this->states[1]);
        $output["Satoshis Per USD"] = str_replace('ⓢ', '', $this->states[2]);
        $output["24hr Volume BTC"] = $this->states[3];
        $output["24hr Volume USD"] = str_replace( array( "$", "B" ), '', $this->states[4]);
        $output["Market Cap"] = str_replace( array( "$", "B" ), '', $this->states[5]);
        $output["Block Height"] = $this->states[6];
        $output["Time Since Last Block"] = "null";
        $output["Average Block Time"] = $this->states[8];
        $output["Money Supply"] = str_replace('BTC', '', $this->states[9]);
        $output["Percentage Issued"] = str_replace('%', '', $this->states[10]);
        $output["Chain Size"] = str_replace('GB', '', $this->states[11]);
        $output["Total Transactions"] = $this->states[12];
        $output["Difficulty"] = str_replace('T', '', $this->states[13]);
        $output["Difficulty Epoch"] = $this->states[14];
        $output["Estimated Difficulty Change"] = str_replace('%', '', $this->states[15]);
        $output["Blocks To Retarget"] = "null";
        $output["Estimated Retarget Date"] = "null";
        $output["Last Difficulty Change"] = str_replace('%', '', $this->states[18]);
        $output["Hash Rate"] = str_replace('EH/s', '', $this->states[19]);
        $output["Block Subsidy"] = str_replace('BTC', '', $this->states[20]);
        $output["Block Subsidy Value"] = str_replace('$', '', $this->states[21]);
        $output["Blocks Mined"] = $this->states[22];
        $output["Mining Transactions"] = $this->states[23];
        $output["Percentage SegWit"] = str_replace('%', '', $this->states[24]);
        $output["Total Fees"] = str_replace('BTC', '', $this->states[25]);
        $output["Average Fees Per Block"] = str_replace('BTC', '', $this->states[26]);
        $output["Total Fees vs Reward"] = str_replace('%', '', $this->states[27]);

        $output["Mempool Transactions"] = $this->states[28];
        $output["Pending Fees"] = str_replace('BTC', '', $this->states[29]);
        $output["Pending Fees Value"] = str_replace('$', '', $this->states[30]);
        $output["Virtual Size"] = str_replace('MB', '', $this->states[31]);
        $output["Blocks To Clear"] = $this->states[32];
        $output["Percentage RBF"] = str_replace('%', '', $this->states[33]);

        $output["Estimate Next Block"] = str_replace('sat/vB', '', $this->states[34]);
        $output["Estimate Minutes"] = str_replace('sat/vB', '', $this->states[35]);
        $output["Estimate Hour"] = str_replace('sat/vB', '', $this->states[36]);
        $output["Estimate Day"] = str_replace('sat/vB', '', $this->states[37]);
        $output["Estimate Week"] = str_replace('sat/vB', '', $this->states[38]);

        $output["Mayer Multiple"] = $this->states[39];
        $output["50 Day Moving"] = str_replace('$', '', $this->states[40]);
        $output["100 Day Moving"] = str_replace('$', '', $this->states[41]);
        $output["200 Day Moving"] = str_replace('$', '', $this->states[42]);

        $output["GBTC Price"] = str_replace('$', '', $this->states[43]);
        $output["GBTC Bitcoin Per Share"] = str_replace('BTC', '', $this->states[44]);
        $output["GBTC Premium"] = str_replace('%', '', $this->states[45]);
        $output["QBTC Price"] = str_replace('$', '', $this->states[46]);
        $output["QBTC Bitcoin Share"] = str_replace('BTC', '', $this->states[47]);
        $output["QBTC Premium"] = str_replace('%', '', $this->states[48]);

        $output["Bitcoin Priced In Gold"] = str_replace('OZ', '', $this->states[49]);
        $output["Bitcoin vs Gold Market Cap"] = str_replace('%', '', $this->states[50]);
        $output["Gold Parity"] = str_replace('$', '', $this->states[51]);
        $output["Gold Price Per Ounce"] = str_replace('$', '', $this->states[52]);
        $output["Gold Market Cap"] = str_replace(array( "$", "T" ), '', $this->states[53]);
        $output["Gold Supply In Tonnes"] = $this->states[54];

        $output["Forward Annual Inflation"] = "null";
        $output["GRealized Annual Inflation"] = str_replace('%', '', $this->states[56]);

        $output["Companies Reporting BTC Holdings"] = $this->states[57];
        $output["Bitcoin Held In Treasuries"] = str_replace('BTC', '', $this->states[58]);
        $output["Percentage Held In Treasuries"] = str_replace('%', '', $this->states[59]);
        $output["Treasuries Value"] = str_replace(array( "$", "B" ), '', $this->states[60]);

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

        $output["Reachable Bitcoin Nodes"] = $this->states[72];
        $output["Bitcoin Tor Nodes"] = $this->states[73];
        $output["Percentage Tor Nodes"] = str_replace('%', '', $this->states[74]);

        $output["Satoshi_1"] = str_replace('(', ' (', $this->states[75]);
        $output["Satoshi_2"] = str_replace('(', ' (', $this->states[76]);
        $output["Satoshi_3"] = str_replace('(', ' (', $this->states[77]);
        $output["Satoshi_4"] = str_replace('(', ' (', $this->states[78]);
        $output["Satoshi_5"] = str_replace('(', ' (', $this->states[79]);

        $output["Network Capacity"] = str_replace('BTC', '', $this->states[80]);
        $output["Network Capacity Value"] = str_replace(array( "$", "M" ), '', $this->states[81]);
        $output["Number of Channels"] = $this->states[82];
        $output["Number of Nodes"] = $this->states[83];
        $output["Average Channel Capacity"] = str_replace('BTC', '', $this->states[84]);
        $output["Average Channel Capacity Value"] = str_replace('$', '', $this->states[85]);
        $output["Average Channels Per Node"] = $this->states[86];
        $output["Average Node Capacity"] = $this->states[87];
        $output["Active Channels"] = $this->states[88];
        $output["Number of Tor Nodes"] = $this->states[89];
        

        return $output;
    }


    
}
