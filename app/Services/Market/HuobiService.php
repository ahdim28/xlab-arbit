<?php

namespace App\Services\Market;

use GuzzleHttp\Client;

class HuobiService
{
    private $indodax;

    public function __construct(
        IndodaxService $indodax
    )
    {
        $this->indodax = $indodax;

        $this->endPoint = 'https://api.huobi.pro/';
    }

    //ticker
    public function getTicker()
    {
        $client = new Client;
        $url = $this->endPoint.'market/tickers';
        $response = $client->request('GET', $url, [
            
        ]);

        $data = $response->getBody()->getContents();
        $json = json_decode($data);

        $bid = $this->indodax->getTickerAll()['usdt']['usdt_idr']['bid'];
        $ask = $this->indodax->getTickerAll()['usdt']['usdt_idr']['ask'];

        foreach ($json->data as $key => $value) {

            $ticker[$value->symbol] = [
                'symbol' => strtoupper($value->symbol),
                'bid' => $value->bid,
                'bid_indodax' => $bid * $value->bid,
                'bid_rupiah' => "Rp " . number_format($bid * $value->bid, 2 , ',', '.'),
                'ask' => $value->ask,
                'ask_indodax' => $ask * $value->ask,
                'ask_rupiah' => "Rp " . number_format($ask * $value->ask, 2 , ',', '.'),
            ];
        }

        $collection = collect($ticker);
        $ticker = $collection->whereIn('symbol', ['ACTUSDT', 'EMUSDT', 'VIDYUSDT']);
        $ticker->all();

        $result['tickers'] = $ticker;

        return $result;
    }
}