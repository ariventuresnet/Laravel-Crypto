<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CryptoCompareController extends Controller
{
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
}
