<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\CurrencyPair;
use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $currencyPairs = CurrencyPair::get();
        $pairs = CurrencyPair::all();
        $sources = Source::all();
        $currencies = Currency::all();
        // Fetch all active sources
        $activeSources = Source::where('is_final', true)->get();

        // Fetch all currency pairs
        $activePairs = CurrencyPair::where('status', true)->get();
        return view('dashboard', compact('sources', 'pairs', 'sources', 'currencies', 'activeSources', 'activePairs'));
    }

    public function getOriginAndDestination($sourceId)
    {
        $currencyPairs = CurrencyPair::where('id_source', $sourceId)->get();

        $origins = $currencyPairs->pluck('origin_code_currency')->unique()->values();
        $destinations = $currencyPairs->pluck('destination_code_currency')->unique()->values();

        // $buyRate = $currencyPairs->where('origin_code_currency', $origins)
        //     ->where('destination_code_currency', $destinations)
        //     ->pluck('rate_buy')->first();

        // $buyRate = $currencyPairs->pluck('rate_buy')->first();

        return response()->json([
            'origins' => $origins,
            'destinations' => $destinations,
            // 'buy_rate' => $buyRate,
        ]);
    }

    public function getCrossRate($sourceId, $origin, $destination)
    {
        $crossRateData = $this->findCrossRate($sourceId, $origin, $destination);
        $crossbuyRate = $crossRateData['buy_rate'];
        $crosssellRate = $crossRateData['sell_rate'];

        $buyRate = $this->getBuyRate($sourceId, $origin, $destination);
        $sellRate = $this->getSellRate($sourceId, $origin, $destination);


        // if ($crossRateData !== null) {
        return response()->json([
            'buy_rate' => $crossbuyRate,
            'sell_rate' => $crosssellRate,
            // 'cross_rate' => $formattedCrossRate,
        ]);
        // } else {
        //     return response()->json([
        //         'buy_rate' => "kosong bang",
        //         'sell_rate' => $formattedBuyRate,
        //         // 'cross_rate' => null,
        //     ]);
        // }
    }

    public function findCrossRate($sourceId, $origin, $destination)
    {
        // $currencyPairs = CurrencyPair::where('id_source', $sourceId)->get();
        $currencyPairs = CurrencyPair::get();
        $buyRate = $this->getBuyRate($sourceId, $origin, $destination);
        $sellRate = $this->getSellRate($sourceId, $origin, $destination);

        // $buyRate = null;
        // $sellRate = null;

        foreach ($currencyPairs as $currencyPair) {
            $intermediateCurrency = $currencyPair->destination_code_currency;

            $rate1 = $this->getBuyRate($sourceId, $origin, $intermediateCurrency);
            $rate2 = $this->getBuyRate($sourceId, $intermediateCurrency, $destination);

            $rate3 = $this->getSellRate($sourceId, $intermediateCurrency, $destination);
            $rate4 = $this->getSellRate($sourceId, $origin, $intermediateCurrency);

            if ($rate1 !== null && $rate2 !== null) {
                // if ($buyRate === null) {
                $buyRate = $rate1 * $rate2;
                // } else {

                // }
            }

            if ($rate3 !== null && $rate4 !== null) {
                $sellRate = $rate3 * $rate4;
            }

            // Mengganti null dengan teks "data not found" jika buyRate atau sellRate masih null
            $buyRate = ($buyRate !== null) ? $buyRate : "data not found";
            $sellRate = ($sellRate !== null) ? $sellRate : "data not found";
        }



        // foreach ($currencyPairs as $currencyPair) {
        //     $intermediateCurrency = $currencyPair->destination_code_currency;

        //     $rate1 = $this->getBuyRate($sourceId, $origin, $intermediateCurrency);
        //     $rate2 = $this->getBuyRate($sourceId, $intermediateCurrency, $destination);

        //     $rate3 = $this->getSellRate($sourceId, $intermediateCurrency, $destination);
        //     $rate4 = $this->getSellRate($sourceId, $origin, $intermediateCurrency);

        //     if ($rate1 !== null && $rate2 !== null) {
        //         // Kalkulasi cross rate untuk buy rate
        //         // if ($buyRate !== null) {
        //         $buyRate = $rate1 * $rate2;
        //         // } else {
        //         //     $buyRate *= $rate1 * $rate2;
        //         // }
        //         // } else if ($rate1 !== null && $rate2 !== null) {
        //         //     $buyRate = "kosong bang";
        //     }

        //     // if ($rate1 === null && $rate2 === null) {
        //     // }

        //     if ($rate3 !== null && $rate4 !== null) {
        //         // Kalkulasi cross rate untuk sell rate
        //         if ($sellRate !== null) {
        //             $sellRate = $rate3 * $rate4;
        //         } else {
        //             $sellRate *= $rate3 * $rate4;
        //         }
        //         // } else {
        //         //     return 'Pairing unaviable';
        //     }
        // }

        // foreach ($currencyPairs as $currencyPair) {
        //     $intermediateCurrency = $currencyPair->destination_code_currency;

        //     $rateBuy1 = $this->getBuyRate($sourceId, $origin, $intermediateCurrency);
        //     $rateBuy2 = $this->getBuyRate($sourceId, $intermediateCurrency, $destination);

        //     $rateSell1 = $this->getSellRate($sourceId, $intermediateCurrency, $destination);
        //     $rateSell2 = $this->getSellRate($sourceId, $origin, $intermediateCurrency);

        //     if ($rateBuy1 !== null && $rateBuy2 !== null) {
        //         // Kalkulasi cross rate untuk buy rate
        //         $crossRateBuy = $rateBuy1 * $rateBuy2;

        //         // Kalkulasi cross rate melalui intermediate currency
        //         if ($buyRate === null) {
        //             $buyRate = $crossRateBuy;
        //         } else {
        //             $buyRate = max($buyRate, $crossRateBuy);
        //         }
        //     }

        //     if ($rateSell1 !== null && $rateSell2 !== null) {
        //         // Kalkulasi cross rate untuk sell rate
        //         $crossRateSell = $rateSell1 * $rateSell2;

        //         // Kalkulasi cross rate melalui intermediate currency
        //         if ($sellRate === null) {
        //             $sellRate = $crossRateSell;
        //         } else {
        //             $sellRate = min($sellRate, $crossRateSell);
        //         }
        //     }
        // }

        $formattedCrossBuy = number_format(doubleval($buyRate));
        $formattedCrossSell = number_format(doubleval($sellRate));


        // Memeriksa tipe data dan menerapkan number_format hanya jika nilai bukan "data not found"
        $formattedCrossBuy = is_numeric($buyRate) ? number_format(doubleval($buyRate)) : $buyRate;
        $formattedCrossSell = is_numeric($sellRate) ? number_format(doubleval($sellRate)) : $sellRate;

        return [
            'buy_rate' => $formattedCrossBuy,
            'sell_rate' => $formattedCrossSell,
        ];
    }

    // public function findCrossRate($sourceId, $origin, $destination)
    // {
    //     $currencyPairs = CurrencyPair::where('id_source', $sourceId)->get();
    //     $buyRate = $this->getBuyRate($sourceId, $origin, $destination);
    //     $sellRate = $this->getSellRate($sourceId, $origin, $destination);

    //     foreach ($currencyPairs as $currencyPair) {
    //         $intermediateCurrency = $currencyPair->destination_code_currency;

    //         $rate1 = $this->getBuyRate($sourceId, $origin, $intermediateCurrency);
    //         $rate2 = $this->getBuyRate($sourceId, $intermediateCurrency, $destination);

    //         $rate3 = $this->getSellRate($sourceId, $intermediateCurrency, $destination);
    //         $rate4 = $this->getSellRate($sourceId, $origin, $intermediateCurrency);

    //         if ($rate1 !== null && $rate2 !== null) {
    //             $buyRate = $rate1 * $rate2;
    //         } else {
    //             $buyRate = "Kosong nih bang";
    //         }

    //         if ($rate3 !== null && $rate4 !== null) {
    //             $sellRate = $rate3 * $rate4;
    //         }
    //     }

    //     // Mengganti null dengan teks "data not found" jika buyRate atau sellRate masih null
    //     $buyRate = ($buyRate !== null) ? $buyRate : "data not found";
    //     $sellRate = ($sellRate !== null) ? $sellRate : "data not found";

    //     return [
    //         'buy_rate' => $buyRate,
    //         'sell_rate' => $sellRate,
    //     ];
    // }

    // public function findCrossRate($sourceId, $origin, $destination)
    // {
    //     $currencyPairs = CurrencyPair::where('id_source', $sourceId)->get();
    //     $buyRate = $this->getBuyRate($sourceId, $origin, $destination);
    //     $sellRate = $this->getSellRate($sourceId, $origin, $destination);

    //     $buyRateSet = false; // Menandakan apakah buyRate telah diisi atau tidak
    //     $sellRateSet = false; // Menandakan apakah sellRate telah diisi atau tidak

    //     foreach ($currencyPairs as $currencyPair) {
    //         $intermediateCurrency = $currencyPair->destination_code_currency;

    //         $rate1 = $this->getBuyRate($sourceId, $origin, $intermediateCurrency);
    //         $rate2 = $this->getBuyRate($sourceId, $intermediateCurrency, $destination);

    //         $rate3 = $this->getSellRate($sourceId, $intermediateCurrency, $destination);
    //         $rate4 = $this->getSellRate($sourceId, $origin, $intermediateCurrency);

    //         if ($rate1 !== null && $rate2 !== null && !$buyRateSet) {
    //             $buyRate = $rate1 * $rate2;
    //             $buyRateSet = true; // Set buyRate telah diisi
    //         }

    //         if ($rate3 !== null && $rate4 !== null && !$sellRateSet) {
    //             $sellRate = $rate3 * $rate4;
    //             $sellRateSet = true; // Set sellRate telah diisi
    //         }

    //         // Keluar dari loop jika kedua nilai sudah diisi
    //         if ($buyRateSet && $sellRateSet) {
    //             break;
    //         }
    //     }

    //     // Mengganti null dengan teks "data not found" jika buyRate atau sellRate masih null
    //     $buyRate = ($buyRate !== null) ? $buyRate : "data not found";
    //     $sellRate = ($sellRate !== null) ? $sellRate : "data not found";

    //     return [
    //         'buy_rate' => $buyRate,
    //         'sell_rate' => $sellRate,
    //     ];
    // }




    // public function getCrossRate($sourceId, $origin, $destination)
    // {
    //     $crossRateData = $this->findCrossRate($sourceId, $origin, $destination);
    //     $crossbuyRate = $crossRateData['buy_rate'];
    //     $crosssellRate = $crossRateData['sell_rate'];

    //     $buyRate = $this->getBuyRate($sourceId, $origin, $destination);
    //     $sellRate = $this->getSellRate($sourceId, $origin, $destination);

    //     $formattedCrossBuy = number_format(doubleval($crossbuyRate));
    //     $formattedCrossSell = number_format(doubleval($crosssellRate));

    //     $formattedBuyRate = number_format(doubleval($buyRate));
    //     $formattedSellRate = number_format(doubleval($sellRate));

    //     if ($crossRateData !== null) {
    //         return response()->json([
    //             'buy_rate' => $crossbuyRate,
    //             'sell_rate' => $crosssellRate,
    //         ]);
    //     } else {
    //         return response()->json([
    //             'buy_rate' => $buyRate !== null ? $buyRate : 'Cross rate data not available.',
    //             'sell_rate' => $sellRate !== null ? $sellRate : 'Cross rate data not available.',
    //         ]);
    //     }
    // }

    // public function findCrossRate($sourceId, $origin, $destination)
    // {
    //     $currencyPairs = CurrencyPair::where('id_source', $sourceId)->get();
    //     $buyRate = 1; // Inisialisasi ke nilai 1 (atau nilai awal lainnya)
    //     $sellRate = 1; // Inisialisasi ke nilai 1 (atau nilai awal lainnya)

    //     foreach ($currencyPairs as $currencyPair) {
    //         $intermediateCurrency = $currencyPair->destination_code_currency;

    //         $rate1 = $this->getBuyRate($sourceId, $origin, $intermediateCurrency);
    //         $rate2 = $this->getBuyRate($sourceId, $intermediateCurrency, $destination);

    //         $rate3 = $this->getSellRate($sourceId, $intermediateCurrency, $destination);
    //         $rate4 = $this->getSellRate($sourceId, $origin, $intermediateCurrency);

    //         if ($rate1 !== null && $rate2 !== null) {
    //             // Kalkulasi cross rate untuk buy rate
    //             if ($buyRate === null) {
    //                 $buyRate *= $rate1 * $rate2;
    //             }
    //         }

    //         if ($rate3 !== null && $rate4 !== null) {
    //             // Kalkulasi cross rate untuk sell rate
    //             if ($sellRate === null) {
    //                 $sellRate *= $rate3 * $rate4;
    //             }
    //         }
    //     }

    //     return [
    //         'buy_rate' => $buyRate,
    //         'sell_rate' => $sellRate,
    //     ];
    // }



    // public function findCrossRate($sourceId, $origin, $destination)
    // {
    //     $currencyPairs = CurrencyPair::where('id_source', $sourceId)->get();
    //     $buyRate = $this->getBuyRate($sourceId, $origin, $destination);
    //     $sellRate = $this->getSellRate($sourceId, $origin, $destination);

    //     foreach ($currencyPairs as $currencyPair) {
    //         $intermediateCurrency = $currencyPair->destination_code_currency;

    //         $rateBuy1 = $this->getBuyRate($sourceId, $origin, $intermediateCurrency);
    //         $rateBuy2 = $this->getBuyRate($sourceId, $intermediateCurrency, $destination);

    //         $rateSell1 = $this->getSellRate($sourceId, $intermediateCurrency, $destination);
    //         $rateSell2 = $this->getSellRate($sourceId, $origin, $intermediateCurrency);

    //         // Inisialisasi array untuk menyimpan semua rateBuy
    //         $rateBuyArray = [];

    //         if ($rateBuy1 !== null) {
    //             $rateBuyArray[] = $rateBuy1;
    //         }

    //         if ($rateBuy2 !== null) {
    //             $rateBuyArray[] = $rateBuy2;
    //         }

    //         // Periksa jika ada lebih dari 2 rateBuy
    //         if (count($rateBuyArray) >= 2) {
    //             // Kalkulasi cross rate untuk buy rate
    //             $crossRateBuy = array_product($rateBuyArray);

    //             // Kalkulasi cross rate melalui intermediate currency
    //             if ($buyRate === null) {
    //                 $buyRate = $crossRateBuy;
    //             } else {
    //                 $buyRate = max($buyRate, $crossRateBuy);
    //             }
    //         }

    //         // Inisialisasi array untuk menyimpan semua rateSell
    //         $rateSellArray = [];

    //         if ($rateSell1 !== null) {
    //             $rateSellArray[] = $rateSell1;
    //         }

    //         if ($rateSell2 !== null) {
    //             $rateSellArray[] = $rateSell2;
    //         }

    //         // Periksa jika ada lebih dari 2 rateSell
    //         if (count($rateSellArray) >= 2) {
    //             // Kalkulasi cross rate untuk sell rate
    //             $crossRateSell = array_product($rateSellArray);

    //             // Kalkulasi cross rate melalui intermediate currency
    //             if ($sellRate === null) {
    //                 $sellRate = $crossRateSell;
    //             } else {
    //                 $sellRate = min($sellRate, $crossRateSell);
    //             }
    //         }
    //     }

    //     return [
    //         'buy_rate' => $buyRate,
    //         'sell_rate' => $sellRate,
    //     ];
    // }

    // public function findCrossRate($sourceId, $origin, $destination)
    // {
    //     $currencyPairs = CurrencyPair::where('id_source', $sourceId)->get();
    //     $buyRates = [];
    //     $sellRates = [];

    //     foreach ($currencyPairs as $currencyPair) {
    //         $intermediateCurrency = $currencyPair->destination_code_currency;

    //         $rateBuy1 = $this->getBuyRate($sourceId, $origin, $intermediateCurrency);
    //         $rateBuy2 = $this->getBuyRate($sourceId, $intermediateCurrency, $destination);

    //         $rateSell1 = $this->getSellRate($sourceId, $intermediateCurrency, $destination);
    //         $rateSell2 = $this->getSellRate($sourceId, $origin, $intermediateCurrency);

    //         if ($rateBuy1 !== null) {
    //             $buyRates[] = $rateBuy1;
    //         }

    //         if ($rateBuy2 !== null) {
    //             $buyRates[] = $rateBuy2;
    //         }

    //         if ($rateSell1 !== null) {
    //             $sellRates[] = $rateSell1;
    //         }

    //         if ($rateSell2 !== null) {
    //             $sellRates[] = $rateSell2;
    //         }
    //     }

    //     // Periksa jika ada lebih dari 2 rateBuy
    //     if (count($buyRates) >= 2) {
    //         $buyRate = array_product($buyRates);
    //     } else {
    //         $buyRate = null;
    //     }

    //     // Periksa jika ada lebih dari 2 rateSell
    //     if (count($sellRates) >= 2) {
    //         $sellRate = array_product($sellRates);
    //     } else {
    //         $sellRate = null;
    //     }

    //     return [
    //         'buy_rate' => $buyRate,
    //         'sell_rate' => $sellRate,
    //     ];
    // }

    // public function findCrossRate($sourceId, $origin, $destination)
    // {
    //     $currencyPairs = CurrencyPair::where('id_source', $sourceId)->get();
    //     $buyRates = [];
    //     $sellRates = [];

    //     foreach ($currencyPairs as $currencyPair) {
    //         $intermediateCurrency = $currencyPair->destination_code_currency;

    //         $rateBuy = $this->getBuyRate($sourceId, $origin, $intermediateCurrency);
    //         if ($rateBuy !== null) {
    //             $buyRates[] = $rateBuy;
    //         }

    //         $rateSell = $this->getSellRate($sourceId, $intermediateCurrency, $destination);
    //         if ($rateSell !== null) {
    //             $sellRates[] = $rateSell;
    //         }
    //     }

    //     // Periksa jika ada lebih dari 2 rateBuy
    //     if (count($buyRates) >= 2) {
    //         $crossRateBuy = array_product($buyRates);
    //     } else {
    //         $crossRateBuy = null;
    //     }

    //     // Periksa jika ada lebih dari 2 rateSell
    //     if (count($sellRates) >= 2) {
    //         $crossRateSell = array_product($sellRates);
    //     } else {
    //         $crossRateSell = null;
    //     }

    //     return [
    //         'buy_rate' => $crossRateBuy,
    //         'sell_rate' => $crossRateSell,
    //     ];
    // }

    // public function findCrossRate($sourceId, $origin, $destination)
    // {
    //     // Mengambil mata uang asal dan tujuan yang tersedia
    //     $originAndDestination = $this->getOriginAndDestination($sourceId);
    //     $origins = $originAndDestination['origins'];
    //     $destinations = $originAndDestination['destinations'];

    //     // Inisialisasi buy rate dan sell rate
    //     $buyRate = null;
    //     $sellRate = null;

    //     // Loop melalui mata uang asal dan tujuan
    //     foreach ($origins as $originCurrency) {
    //         foreach ($destinations as $destCurrency) {
    //             if ($originCurrency !== $destCurrency) {
    //                 // Menghindari pasangan mata uang yang sama

    //                 // Periksa apakah tingkat tukar tersedia untuk pasangan mata uang ini
    //                 $rateBuy = $this->getBuyRate($sourceId, $originCurrency, $destCurrency);
    //                 $rateSell = $this->getSellRate($sourceId, $originCurrency, $destCurrency);

    //                 if ($rateBuy !== null && $rateSell !== null) {
    //                     // Hitung cross rate untuk buy rate
    //                     if ($buyRate === null) {
    //                         $buyRate = $rateBuy;
    //                     } else {
    //                         $buyRate = max($buyRate, $rateBuy);
    //                     }

    //                     // Hitung cross rate untuk sell rate
    //                     if ($sellRate === null) {
    //                         $sellRate = $rateSell;
    //                     } else {
    //                         $sellRate = min($sellRate, $rateSell);
    //                     }
    //                 }
    //             }
    //         }
    //     }

    //     return [
    //         'buy_rate' => $buyRate,
    //         'sell_rate' => $sellRate,
    //     ];
    // }


    public function getBuyRate($sourceId, $origin, $destination)
    {
        $buyRate = CurrencyPair::where('id_source', $sourceId)
            ->where('origin_code_currency', $origin)
            ->where('destination_code_currency', $destination)
            ->pluck('rate_buy')
            ->first();

        return $buyRate;
    }

    public function getSellRate($sourceId, $origin, $destination)
    {
        $sellRate = CurrencyPair::where('id_source', $sourceId)
            ->where('origin_code_currency', $origin)
            ->where('destination_code_currency', $destination)
            ->pluck('rate_sell')
            ->first();

        return $sellRate;
    }
}