<?php

namespace App\Http\Controllers;

use App\Models\CurrencyPair;
use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // $sources = Source::latest()->paginate(10);

        $sources = Source::query()
            ->when(
                $request->q,
                function (Builder $builder) use ($request) {
                    $builder->where('name', 'like', "%{$request->q}%");
                }
            )->latest()->paginate(10);

        return view('sources.index', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $existingSource = Source::where('name', $value)
                        ->count();
                    if ($existingSource > 0) {
                        $fail("Source with the same name already exists");
                    }
                },
            ],
            'time' => 'required',
        ]);

        // $this->validate($request, [
        //     'name' => 'required',
        //     'time' => 'required',
        // ]);

        Source::create([
            'name' => $request->name,
            'time' => $request->time,
        ]);

        $inputFrom = $request->input('input_from');

        if ($inputFrom === 'source') {
            return redirect()->route('sources.index')->with('success', 'Source update successfully');
        } elseif ($inputFrom === 'pair') {
            return redirect()->route('pairs.index')->with('success', 'Pair update successfully');
        }

        // return redirect()->route('sources.index')
        //     ->with('success', 'Source created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Source $source)
    {
        //
        return view('sources.show', compact('source'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Source $source)
    {
        //
        // $source = Source::find($id);
        return view('sources.edit', compact('source'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Source $source)
    {
        $request->validate([
            'name' => 'required',
            'time' => [
                'required',
                function ($attribute, $value, $fail) use ($source) {
                    $existingSource = Source::where('name', $source->name)
                        // ->where('time', $value)
                        ->where('id', '!=', $source->id)
                        ->count();

                    if ($existingSource > 0) {
                        $fail("Source with the same name and time already exists");
                    }
                },
            ],
        ]);

        $source->update([
            'name' => $request->name,
            'time' => $request->time,
        ]);

        return redirect()->route('sources.index', compact('source'))
            ->with('success', 'Source update successfully');
    }

    // public function toggleStatus(Source $source)
    // {
    //     $source->update([
    //         'is_final' => !$source->is_final,
    //     ]);
    //     // $source->save();

    //     // // Panggil fungsi untuk mengupdate status di tabel Pair
    //     // $this->updatePairStatus($source);
    //     $pair = CurrencyPair::where('source_id', $source->id)->all();

    //     $pair->update([
    //         'time' => $source->time,
    //         'status' => !$source->is_final,
    //     ]);


    //     return response()->json(['message' => 'Source status updated successfully.']);
    //     // return redirect()->back()->with('success', 'User status updated successfully.');
    // }


    public function toggleStatus(Source $source)
    {
        $source->update([
            'is_final' => !$source->is_final,
        ]);

        // // Ubah status sumber daya yang dipilih
        // $source->update([
        //     'is_final' => true,
        // ]);

        // Matikan semua sumber daya lainnya kecuali yang dipilih
        Source::where('id', '!=', $source->id)->update([
            'is_final' => false,
        ]);

        // Panggil fungsi untuk mengupdate status di tabel Pair
        $this->updateCurrencyPair($source);

        return response()->json(['message' => 'Source status updated successfully.']);
    }

    protected function updateCurrencyPair($source)
    {
        $currencyPairs = CurrencyPair::where('id_source', $source->id)->get();

        foreach ($currencyPairs as $currencyPair) {
            $currencyPair->update([
                'time' => $source->time,
                'status' => $source->is_final,
            ]);
        }
    }

    public function getSources()
    {
        $sources = Source::all();

        return response()->json($sources);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Source $source)
    {
        //
        $source->delete();

        // $deleteFrom = $request->input('delete_from');

        // if ($deleteFrom === 'source') {
        //     return redirect()->route('sources.index')->with('success', 'Source update successfully');
        // } elseif ($deleteFrom === 'pair') {
        //     return redirect()->route('pairs.index')->with('success', 'Pair update successfully');
        // }

        return redirect()->back()->with('success', 'Source deleted successfully');
        // return redirect()->route('sources.index')
        //     ->with('success', 'Source deleted successfully');
    }
}
