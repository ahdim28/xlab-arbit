<?php

namespace App\Http\Controllers;

use App\Services\Market\HuobiService;
use App\Services\Market\IndodaxService;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    private $serviceIndodax, $serviceHuobi;

    public function __construct(
        IndodaxService $serviceIndodax,
        HuobiService $serviceHuobi
    )
    {
        $this->serviceIndodax = $serviceIndodax;
        $this->serviceHuobi = $serviceHuobi;
    }

    public function index(Request $request)
    {
        $data['indodax'] = $this->serviceIndodax->getTickerAll();
        $data['huobi'] = $this->serviceHuobi->getTicker();

        return view('market.index', compact('data'), [
            'title' => 'Market',
            'breadcrumbs' => [
                'Market' => ''
            ],
        ]);
    }

    public function draw(Request $request)
    {
        $indodax = $this->serviceIndodax->getTickerAll();
        $huobi = $this->serviceHuobi->getTicker();

        return response()->json([
            'indodax' => $indodax,
            'huobi' => $huobi,
        ], 200);
    }
}
