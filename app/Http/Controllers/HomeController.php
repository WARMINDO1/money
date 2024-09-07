<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\CurrencyPair;
use App\Models\Source;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $pairs = CurrencyPair::all();
    //     $sources = Source::all();
    //     $currencies = Currency::all();
    //     return view('home', compact('pairs', 'sources', 'currencies'));
    //     // return view('home');
    // }
    public function index(Request $request)
    {

        $currencies = Currency::get();
        $pairs = CurrencyPair::get();
        $sous = Source::get();

        $currencyPairs = CurrencyPair::get();
        $pairs = CurrencyPair::all();
        $sources = Source::all();
        $currencies = Currency::all();

        // Fetch all active sources
        $activeSources = Source::where('is_final', true)->get();

        $activeSourceIds = $activeSources->pluck('id')->toArray();
        $activePairs = CurrencyPair::whereIn('id_source', $activeSourceIds)->paginate(5);
        $activeCurrencies = CurrencyPair::whereIn('id_source', $activeSourceIds)->get();


        $usedOriginCodes = CurrencyPair::pluck('origin_code_currency')->toArray();

        $filteredCurrencies = $currencies->reject(function ($currency) use ($usedOriginCodes) {
            return in_array($currency->code, $usedOriginCodes);
        });

        // $data = CurrencyPair::onlyTrashed()->restore();

        // dd($data);
        return view('home', compact('pairs', 'currencies', 'filteredCurrencies', 'sous', 'activeSources', 'activePairs', 'activeCurrencies'));
    }

    // public function getOriginAndDestination($sourceId)
    // {
    //     $currencyPairs = CurrencyPair::where('id_source', $sourceId)->get();

    //     $origins = $currencyPairs->pluck('origin_code_currency')->unique()->values();
    //     $destinations = $currencyPairs->pluck('destination_code_currency')->unique()->values();

    //     // $buyRate = $currencyPairs->where('origin_code_currency', $origins)
    //     //     ->where('destination_code_currency', $destinations)
    //     //     ->pluck('rate_buy')->first();

    //     // $buyRate = $currencyPairs->pluck('rate_buy')->first();

    //     // // Debug
    //     // dd([
    //     //     'origins' => $origins,
    //     //     'destinations' => $destinations,
    //     // ]);

    //     return response()->json([
    //         'origins' => $origins,
    //         'destinations' => $destinations,
    //         // 'buy_rate' => $buyRate,
    //     ]);
    // }

    public function getOriginAndDestination()
    {
        $activeSources = Source::where('is_final', true)->get();
        $activeSourceIds = $activeSources->pluck('id')->toArray();
        $currencyPairs = CurrencyPair::whereIn('id_source', $activeSourceIds)->get();

        $origins = $currencyPairs->pluck('origin_code_currency')->unique()->values();
        $destinations = $currencyPairs->pluck('destination_code_currency')->unique()->values();

        return response()->json([
            'origins' => $origins,
            'destinations' => $destinations,
            // 'buy_rate' => $buyRate,
        ]);
    }

    // public function getCrossRate($sourceId, $origin, $destination)
    // {
    //     $crossRateData = $this->findCrossRate($sourceId, $origin, $destination);

    //     // Memeriksa tipe data dan mengembalikan "data not found" jika masih null
    //     $crossbuyRate = is_numeric($crossRateData['buy_rate']) ? $crossRateData['buy_rate'] : "data not found";
    //     $crosssellRate = is_numeric($crossRateData['sell_rate']) ? $crossRateData['sell_rate'] : "data not found";

    //     // // Debug
    //     // dd([
    //     //     'buy_rate' => $crossbuyRate,
    //     //     'sell_rate' => $crosssellRate,
    //     // ]);

    //     return response()->json([
    //         'buy_rate' => $crossbuyRate,
    //         'sell_rate' => $crosssellRate,
    //     ]);
    // }

    // public function findCrossRate($sourceId, $origin, $destination)
    // {
    //     $currencyPairs = CurrencyPair::get();
    //     $buyRate = null;
    //     $sellRate = null;

    //     foreach ($currencyPairs as $currencyPair) {
    //         $intermediateCurrency = $currencyPair->destination_code_currency;

    //         $rate1 = $this->getBuyRate($sourceId, $origin, $intermediateCurrency);
    //         $rate2 = $this->getBuyRate($sourceId, $intermediateCurrency, $destination);

    //         $rate3 = $this->getSellRate($sourceId, $intermediateCurrency, $destination);
    //         $rate4 = $this->getSellRate($sourceId, $origin, $intermediateCurrency);

    //         if ($rate1 !== null && $rate2 !== null) {
    //             $buyRate = $rate1 * $rate2;
    //         }

    //         if ($rate3 !== null && $rate4 !== null) {
    //             $sellRate = $rate3 * $rate4;
    //         }
    //     }

    //     // Memeriksa tipe data dan mengembalikan "data not found" jika masih null
    //     $buyRate = ($buyRate !== null) ? number_format(doubleval($buyRate)) : "data not found";
    //     $sellRate = ($sellRate !== null) ? number_format(doubleval($sellRate)) : "data not found";

    //     return [
    //         'buy_rate' => $buyRate,
    //         'sell_rate' => $sellRate,
    //     ];
    // }

    // public function getBuyRate($sourceId, $origin, $destination)
    // {
    //     $buyRate = CurrencyPair::where('id_source', $sourceId)
    //         ->where('origin_code_currency', $origin)
    //         ->where('destination_code_currency', $destination)
    //         ->pluck('rate_buy')
    //         ->first();

    //     return $buyRate;
    // }

    // public function getSellRate($sourceId, $origin, $destination)
    // {
    //     $sellRate = CurrencyPair::where('id_source', $sourceId)
    //         ->where('origin_code_currency', $origin)
    //         ->where('destination_code_currency', $destination)
    //         ->pluck('rate_sell')
    //         ->first();

    //     return $sellRate;
    // }



    // public function getCrossRate($origin, $destination)
    // {
    //     $crossRateData = $this->findCrossRate($origin, $destination);

    //     // Memeriksa tipe data dan mengembalikan "data not found" jika masih null
    //     $crossbuyRate = is_numeric($crossRateData['buy_rate']) ? $crossRateData['buy_rate'] : "data not found";
    //     $crosssellRate = is_numeric($crossRateData['sell_rate']) ? $crossRateData['sell_rate'] : "data not found";

    //     // // Debug
    //     // dd([
    //     //     'buy_rate' => $crossbuyRate,
    //     //     'sell_rate' => $crosssellRate,
    //     // ]);

    //     return response()->json([
    //         'buy_rate' => $crossbuyRate,
    //         'sell_rate' => $crosssellRate,
    //     ]);
    // }

    public function findCrossRate($origin, $destination)
    {
        $currencyPairs = CurrencyPair::get();
        // $buyRate = null;
        // $sellRate = null;

        $buyRate = $this->getBuyRate($origin, $destination);
        $sellRate = $this->getSellRate($origin, $destination);

        foreach ($currencyPairs as $currencyPair) {
            $intermediateCurrency = $currencyPair->destination_code_currency;

            $rate1 = $this->getBuyRate($origin, $intermediateCurrency);
            $rate2 = $this->getBuyRate($intermediateCurrency, $destination);

            $rate3 = $this->getSellRate($intermediateCurrency, $destination);
            $rate4 = $this->getSellRate($origin, $intermediateCurrency);

            if ($rate1 !== null && $rate2 !== null) {
                $buyRate = $rate1 * $rate2;
            }

            if ($rate3 !== null && $rate4 !== null) {
                $sellRate = $rate3 * $rate4;
            }
        }

        // Memeriksa tipe data dan mengembalikan "data not found" jika masih null
        $buyRate = ($buyRate !== null) ? $buyRate : "data not found";
        $sellRate = ($sellRate !== null) ? $sellRate : "data not found";
        // $sellRate = ($sellRate !== null) ? number_format(doubleval($sellRate)) : "data not found";

        // return [
        //     'buy_rate' => $buyRate,
        //     'sell_rate' => $sellRate,
        // ];

        return response()->json([
            'buy_rate' => $buyRate,
            'sell_rate' => $sellRate,
        ]);
    }

    public function getBuyRate($origin, $destination)
    {
        $activeSources = Source::where('is_final', true)->get();
        $activeSourceIds = $activeSources->pluck('id')->toArray();

        $buyRate = CurrencyPair::where('id_source', $activeSourceIds)
            ->where('origin_code_currency', $origin)
            ->where('destination_code_currency', $destination)
            ->pluck('rate_buy')
            ->first();

        return $buyRate;
    }

    public function getSellRate($origin, $destination)
    {
        $activeSources = Source::where('is_final', true)->get();
        $activeSourceIds = $activeSources->pluck('id')->toArray();

        $sellRate = CurrencyPair::where('id_source', $activeSourceIds)
            ->where('origin_code_currency', $origin)
            ->where('destination_code_currency', $destination)
            ->pluck('rate_sell')
            ->first();

        return $sellRate;
    }

    public function about()
    {
        return view('about');
    }
}