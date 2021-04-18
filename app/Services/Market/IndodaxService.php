<?php

namespace App\Services\Market;

use GuzzleHttp\Client;

class IndodaxService
{
    public function __construct()
    {
        $this->endPoint = 'https://indodax.com/api/';
    }

     //server time
     public function getServerTime()
     {
         $client = new Client;
         $url = $this->endPoint.'server_time';
         $response = $client->request('GET', $url, [
             
         ]);
 
         $data = $response->getBody()->getContents();
         $json = json_decode($data);
 
         return $json;
     }
 
     //pairs
     public function getPairs()
     {
         $client = new Client;
         $url = $this->endPoint.'pairs';
         $response = $client->request('GET', $url, [
             
         ]);
 
         $data = $response->getBody()->getContents();
         $json = json_decode($data);
 
         return $json;
     }
 
     //price increment
     public function getPriceIncrements()
     {
         $client = new Client;
         $url = $this->endPoint.'price_increments';
         $response = $client->request('GET', $url, [
             
         ]);
 
         $data = $response->getBody()->getContents();
         $json = json_decode($data);
 
         return $json;
     }
 
     //summaries
     public function getSummaries()
     {
         $client = new Client;
         $url = $this->endPoint.'summaries';
         $response = $client->request('GET', $url, [
             
         ]);
 
         $data = $response->getBody()->getContents();
         $json = json_decode($data);
 
         return $json;
     }
 
     //ticker
     public function getTicker($pairId)
     {
         $client = new Client;
         $url = $this->endPoint.'ticker/'.$pairId;
         $response = $client->request('GET', $url, [
             
         ]);
 
         $data = $response->getBody()->getContents();
         $json = json_decode($data);
 
         return $json;
     }
 
     //ticker all
     public function getTickerAll()
     {
        $client = new Client;
        $url = $this->endPoint.'ticker_all';
        $response = $client->request('GET', $url, [
            
        ]);

        $data = $response->getBody()->getContents();
        $json = json_decode($data);

        foreach ($json->tickers as $key => $value) {

            $coint = str_replace('_idr', '', $key);
            $tickerAll[$key] = [
                'id' => $key,
                'pairs_id' => str_replace('_', '', $key),
                'symbol' => str_replace('_', '', strtoupper($key)),
                'sh' => $coint.'usdt',
                'coint' => strtoupper($coint),
                'logo_svg' => 'https://indodax.com/v2/logo/svg/color/'.
                    str_replace(['_idr', '_usdt'], '', $key).'.svg',
                'base_currency' => str_replace($coint.'_', '', $key),
                'bid' => $value->buy,
                'bid_rupiah' => "Rp " . number_format($value->buy, 2 , ',', '.'),
                'ask' => $value->sell,
                'ask_rupiah' => "Rp " . number_format($value->sell, 2 , ',', '.'),
            ];
        }

        $collection = collect($tickerAll);
        $usdt = $collection->whereIn('id', ['usdt_idr']);
        $usdt->all();

        $tickerAll = $collection->whereIn('id', ['act_idr', 'em_idr', 'vidy_idr']);
        $tickerAll->all();


        $result['usdt'] = $usdt;
        $result['tickerAll'] = $tickerAll;
 
         return $result;
     }
 
     //trades
     public function getTrades($pairId)
     {
         $client = new Client;
         $url = $this->endPoint.'trades/'.$pairId;
         $response = $client->request('GET', $url, [
             
         ]);
 
         $data = $response->getBody()->getContents();
         $json = json_decode($data);
 
         return $json;
     }
 
     //depth
     public function getDepth($pairId)
     {
         $client = new Client;
         $url = $this->endPoint.'depth/'.$pairId;
         $response = $client->request('GET', $url, [
             
         ]);
 
         $data = $response->getBody()->getContents();
         $json = json_decode($data);
 
         return $json;
     }
}