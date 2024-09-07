<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Currency;
use App\Models\CurrencyPair;
use App\Models\Source;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sources = Source::query()
            ->when(
                $request->q,
                function (Builder $builder) use ($request) {
                    $builder->where('name', 'like', "%{$request->q}%")
                        ->orWhere('time', 'like', "%{$request->q}%");
                }
            )->latest()->paginate(5);
        $cp = CurrencyPair::query()
        ->when(
            $request->q,
            function (Builder $builder) use ($request){
                $builder->where('id','like', "%{$request->q}%");                
            }
        )->latest()->paginate(5);
        $currencies = Currency::get();
        $pairs = CurrencyPair::get();
        $sous = Source::get();
        $lastSource = $request->q;
        $lastTime = $request->q;
        $usedOriginCodes = CurrencyPair::pluck('origin_code_currency')->toArray();

        $filteredCurrencies = $currencies->reject(function ($currency) use ($usedOriginCodes) {
            return in_array($currency->code, $usedOriginCodes);
        });
        return view('front', compact('pairs', 'currencies', 'sources', 'lastSource', 'lastTime', 'filteredCurrencies', 'sous','cp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}