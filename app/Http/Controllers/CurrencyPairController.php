<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\CurrencyPair;
use App\Models\Source;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CurrencyPairController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('role:Admin');
    //     $this->middleware('permission:pair-list|pairs-create|pairs-edit|pairs-delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:pairs-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:pairs-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:pairs-delete', ['only' => ['destroy']]);

    //     // $this->middleware('permission:Currency Management', ['only' => ['destroy']]);
    // }

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
        $currencies = Currency::get();
        $pairs = CurrencyPair::get();
        $sous = Source::get();
        $lastSource = $request->q;
        $lastTime = $request->q;

        $usedOriginCodes = CurrencyPair::pluck('origin_code_currency')->toArray();

        $filteredCurrencies = $currencies->reject(function ($currency) use ($usedOriginCodes) {
            return in_array($currency->code, $usedOriginCodes);
        });
        // $data = CurrencyPair::onlyTrashed()->restore();

        // dd($data);
        return view('pairs.index', compact('pairs', 'currencies', 'sources', 'lastSource', 'lastTime', 'filteredCurrencies', 'sous'));
    }

    public function create()
    {
        $currencies = Currency::get();
        $sources = Source::get();
        return view('pairs.create', compact('currencies', 'sources'));
    }

    public function store(Request $request)
    {
        $selectedSource = $request->input('selected_source');

        if ($selectedSource) {
            // Data akan dimasukkan ke store 1
            return $this->store1($request);
        } else {
            // Data akan dimasukkan ke store 2
            return $this->store2($request);
        }
    }

    public function store1(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'origin_code_currencies' => [
                'required',
                'different:destination_code_currencies',
            ],
            'destination_code_currencies' => 'required',
            'name_source' => [
                function ($attribute, $value, $fail) use ($request) {
                    $existingPair = CurrencyPair::where('origin_code_currency', $request->input('origin_code_currencies'))
                        ->where('destination_code_currency', $request->input('destination_code_currencies'))
                        ->where('name_source', $value)
                        ->count();

                    if ($existingPair > 0) {
                        $fail("Pair already exists with $value as source");
                    }
                },
            ],
            // 'name_source' => '',
            'rate_buy' => 'required',
            'rate_sell' => 'required',
            'time' => 'required',
            'status' => 'in:0,1',
            // 'time' => '',
            // 'status' => '',
        ]);


        $originCurrencyId = Currency::where('code', $request->origin_code_currencies)->value('id');
        $destinationCurrencyId = Currency::where('code', $request->destination_code_currencies)->value('id');

        // mengambil source id berdasarkan name
        $source = Source::where('name', $request->name_source)->firstOrFail();

        $status = $request->has('status') ? $request->input('status') : 0;

        CurrencyPair::create([
            'id_currency' => $originCurrencyId,
            'id_source' => $source->id,
            'origin_code_currency' => $request->origin_code_currencies,
            'destination_code_currency' => $request->destination_code_currencies,
            'name_source' => $request->name_source,
            'rate_buy' => $request->rate_buy,
            'rate_sell' => $request->rate_sell,
            // 'time' => $sourceTimes,
            'time' => $request->time,
            'status' => $status,
        ]);

        // if ('origin_code_currencies' === 'destination_code_currencies') {
        //     return redirect()->back()->with('error', 'Origin code and destination code cannot be the same.');
        // }

        return redirect()->back()->with('success', 'Pair created successfully.');
        // return redirect()->route('pairs.index')->with('success', 'Pair update successfully');
        // return redirect()->back();

        // return response()->json(['message' => 'Pair created successfully']);
    }

    public function store2(Request $request)
    {
        $this->validate($request, [
            'origin_code_currencies' => [
                'required',
                'different:destination_code_currencies',
            ],
            'destination_code_currencies' => 'required',
            'rate_buy' => 'required',
            'rate_sell' => 'required',
        ]);

        $originCurrencyId = Currency::where('code', $request->origin_code_currencies)->value('id');
        $sources = Source::all();
        $atLeastOneSourceEmpty = false;

        foreach ($sources as $source) {
            $existingPairCount = CurrencyPair::where('origin_code_currency', $request->origin_code_currencies)
                ->where('destination_code_currency', $request->destination_code_currencies)
                ->where('name_source', $source->name)
                ->count();

            if ($existingPairCount === 0) {
                $atLeastOneSourceEmpty = true;

                CurrencyPair::create([
                    'id_currency' => $originCurrencyId,
                    'id_source' => $source->id,
                    'origin_code_currency' => $request->origin_code_currencies,
                    'destination_code_currency' => $request->destination_code_currencies,
                    'name_source' => $source->name,
                    'rate_buy' => $request->rate_buy,
                    'rate_sell' => $request->rate_sell,
                    'time' => $source->time,
                    'status' => $source->is_final,
                ]);
            }
        }

        if (!$atLeastOneSourceEmpty) {
            return redirect()->back()->with('error', 'Pair already exists with all sources.');
        }

        return redirect()->back()->with('success', 'Pair(s) created successfully.');
    }

  
    public function show(CurrencyPair $pair)
    {
        //
        return view('pairs.show', compact('pair'));
    }

    public function edit(CurrencyPair $pair)
    {
        $currencies = Currency::get();
        $sources = Source::get();

        $usedOriginCodes = CurrencyPair::where('id', '!=', $pair->id)->pluck('origin_code_currency')->toArray();
        $usedDestinationCodes = CurrencyPair::where('id', '!=', $pair->id)->pluck('destination_code_currency')->toArray();

        $originCode = old('origin_code_currency', $pair->origin_code_currency);
        $destinationCode = old('destination_code_currency', $pair->destination_code_currency);
        $sourceName = old('name_source', $pair->name_source);

        return view('pairs.edit', compact('pair', 'currencies', 'sources', 'originCode', 'destinationCode', 'sourceName', 'usedOriginCodes', 'usedDestinationCodes'));
    }

    public function update(Request $request, CurrencyPair $pair)
    {
        $this->validate($request, [
            'origin_code_currencies' => [
                'required',
                'different:destination_code_currencies',
                function ($attribute, $value, $fail) use ($request, $pair) {
                    $existingPair = CurrencyPair::where('origin_code_currency', $value)
                        ->where('destination_code_currency', $request->input('destination_code_currencies'))
                        ->whereNotIn('id', [$pair->id]) // Exclude the current pair being edited
                        ->count();

                    if ($existingPair > 0) {
                        $fail("Pair already exists for $value to " . $request->input('destination_code_currencies'));
                    }
                },
            ],
            'destination_code_currencies' => 'required',
            'name_source' => 'required',
            'rate_buy' => 'required',
            'rate_sell' => 'required',
            'time' => 'required',
        ]);

        $pair->update($request->all());

        return redirect()->route('pairs.index')
            ->with('success', 'Pair update successfully.');
    }

    public function getSourceData($sourceId)
    {
        $surce = Source::find($sourceId);

        if ($surce) {
            return response()->json([
                'name' => $surce->name,
                'time' => $surce->time,
                'status' => $surce->is_final,
            ]);
        } else {
            return response()->json(['error' => 'Source not found'], 404);
        }
    }

    public function updateRateBuy(Request $request, $pairId)
    {
        $pair = CurrencyPair::findOrFail($pairId);

        $request->validate([
            'buyValue' => 'required',
        ]);

        $pair->update([
            'rate_buy' => $request->input('buyValue'),
        ]);

        return response()->json(['message' => 'Rate buy updated successfully']);
    }

    public function updateRateSell(Request $request, $pairId)
    {
        $pair = CurrencyPair::findOrFail($pairId);

        $request->validate([
            'sellValue' => 'required|numeric',
        ]);

        $pair->update([
            'rate_sell' => $request->input('sellValue'),
        ]);

        return response()->json(['message' => 'Rate sell updated successfully']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CurrencyPair $pair)
    {
        //
        $pair->delete();

        return redirect()->route('pairs.index')
            ->with('success', 'Source deleted successfully');
    }
}