<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    function __construct()
    {
        $this->middleware('role:Admin');
        $this->middleware('permission:currency-list|currency-create|currency-edit|currency-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:currency-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:currency-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:currency-delete', ['only' => ['destroy']]);

        // $this->middleware('permission:Currency Management', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // //
        // $currencies = Currency::latest()->paginate(5);
        // return view('currencies.index', compact('currencies'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);

        // // Check for search input
        // if (request('search')) {
        //     $cari = Currency::where('name', 'like', '%' . request('search') . '%')->get();
        // } else {
        //     // $currencies = Currency::all();
        //     $cari = Currency::latest()->paginate(10);
        // }

        // $currencies = Currency::latest()->paginate(10);
        // $currencies = Currency::orderBy('id', 'DESC')->paginate(5);
        $currencies = Currency::all();
        // $currencies = Currency::get();
        $currencies = Currency::query()
            ->when(
                $request->q,
                function (Builder $builder) use ($request) {
                    $builder->where('code', 'like', "%{$request->q}%");
                    // ->orWhere('name', 'like', "%{$request->q}%");
                }
            )->latest()->paginate(6);
        // ->simplePaginate(5);

        return view('currencies.index', compact('currencies'));
    }

    // public function search(Request $request)
    // {
    //     $keyword = $request->search;
    //     $panggil = Currency::where('name', 'like', "%" . $keyword . "%")->get();
    //     return view('currencies.index', compact('panggil'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'code' => 'required|unique:currencies,code,' . $request->input('id'),
            'name' => 'required',
        ]);
        // request()->validate([
        //     'code' => 'required',
        //     'name' => 'required',
        // ]);

        Currency::create($request->all());

        return redirect()->route('currencies.index')
            ->with('success', 'Currency created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        //
        return view('currencies.show', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency)
    {
        //
        return view('currencies.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        //
        request()->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $currency->update($request->all());

        return redirect()->route('currencies.index')
            ->with('success', 'Currency update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        //
        $currency->delete();

        return redirect()->route('currencies.index')
            ->with('success', 'Currency deleted successfully');
    }
}