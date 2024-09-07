<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\CurrencyPair;
use App\Models\Source;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class CurrencyPairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //
        // // $statusChoices = ['Active', 'Non Active'];
        // // $randomStatus = $statusChoices[array_rand($statusChoices)];

        // $statusChoices = ['Active', 'Non Active'];
        // $randomIndex = random_int(0, 1);
        // $randomStatus = $statusChoices[$randomIndex];

        // $pair = array(
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'USD',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 15190,
        //         'rate_sell' => 15210,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'SGD',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 11279,
        //         'rate_sell' => 11293,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'EUR',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 16675,
        //         'rate_sell' => 16694,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'AUD',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 9935,
        //         'rate_sell' => 9952,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'DKK',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 2220,
        //         'rate_sell' => 2258,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'SEK',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 1405,
        //         'rate_sell' => 1444,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'CAD',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 11328,
        //         'rate_sell' => 11338,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'CHF',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 17321,
        //         'rate_sell' => 17344,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'NZD',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 9214,
        //         'rate_sell' => 9229,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'GBP',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 19317,
        //         'rate_sell' => 19336,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'HKD',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 1940,
        //         'rate_sell' => 1947,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'JPY',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 105,
        //         'rate_sell' => 105,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'SAR',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 4044,
        //         'rate_sell' => 4057,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'CNH',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 2100,
        //         'rate_sell' => 2110,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'MYR',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 3315,
        //         'rate_sell' => 3331,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),
        //     array(
        //         'id_currency' => Currency::latest()->value('id'),
        //         'id_source' => Source::latest()->value('id'),
        //         'origin_code_currency' => 'IDR',
        //         'destination_code_currency' => 'THB',
        //         'name_source' => Source::inRandomOrder()->value('name'),
        //         'rate_buy' => 433,
        //         'rate_sell' => 433,
        //         'time' => Carbon::now(),
        //         'status' => $randomStatus,
        //     ),


        //     // array(
        //     //     'id_currency' => Currency::latest()->value('id'),
        //     //     'id_source' => Source::latest()->value('id'),
        //     //     // $ambil_id = Source::inRandomOrder()->latest()->value('id'),
        //     //     // 'id_source' => $ambil_id,
        //     //     'origin_code_currency' => 'USD',
        //     //     'destination_code_currency' => 'IDR',
        //     //     'name_source' => Source::inRandomOrder()->value('name'),
        //     //     // 'name_source' => Source::where('id', $ambil_id)->value('name'),
        //     //     'rate_buy' => 15000,
        //     //     'rate_sell' => 15500,
        //     //     'time' => Carbon::now(),

        //     //     // $statusChoices = ['Active', 'Non Active'],
        //     //     // $randomStatus = $statusChoices[array_rand($statusChoices)],
        //     //     'status' => $randomStatus,

        //     //     // // // $options = ['Choice 1', 'Choice 2', 'Choice 3'],
        //     //     // 'status' => Random::pick(['Active', 'Non Active']), // Memilih satu pilihan acak dari array



        //     //     // 'status' => 'Active',
        //     //     // 'status' => inrandomOrder()->value('Active' | 'Non Active'),

        //     //     // $statusChoices = ['Active', 'Non Active'],
        //     //     // $randomIndex = shuffle($statusChoices),
        //     //     // $randomStatus = $statusChoices[$randomIndex],
        //     //     // 'status' => $randomStatus
        //     // ),
        // );

        // // $pair = (array('status' => 'Active'));

        // // $idSource = $request->input('id_source'); // Ambil id_source dari input

        // // // Ambil nilai name dari model Source berdasarkan id_source
        // // $nameSource = Source::where('id', $idSource)->value('name');

        // // // Buat data pada model CurrencyPair dan isi kolom id_source dan name_source
        // // CurrencyPair::create([
        // //     'id_source' => $idSource,
        // //     'name_source' => $nameSource,
        // //     // Kolom-kolom lain
        // // ]);


        // CurrencyPair::insert($pair);

        // // $role = Role::create(['name' => 'Admin']);

        // // $permissions = Permission::pluck('id', 'id')->all();

        // // $role->syncPermissions($permissions);

        // // $user->assignRole([$role->id]);





        // Seeder untuk Currency Pair

        $pair = array(
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'USD',
                'name_source' => 'e-Rate',
                'rate_buy' => 15190,
                'rate_sell' => 15210,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'SGD',
                'name_source' => 'e-Rate',
                'rate_buy' => 11279,
                'rate_sell' => 11293,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'EUR',
                'name_source' => 'e-Rate',
                'rate_buy' => 16675,
                'rate_sell' => 16694,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'AUD',
                'name_source' => 'e-Rate',
                'rate_buy' => 9935,
                'rate_sell' => 9952,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'DKK',
                'name_source' => 'e-Rate',
                'rate_buy' => 2220,
                'rate_sell' => 2258,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'SEK',
                'name_source' => 'e-Rate',
                'rate_buy' => 1405,
                'rate_sell' => 1444,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'CAD',
                'name_source' => 'e-Rate',
                'rate_buy' => 11328,
                'rate_sell' => 11338,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'CHF',
                'name_source' => 'e-Rate',
                'rate_buy' => 17321,
                'rate_sell' => 17344,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'NZD',
                'name_source' => 'e-Rate',
                'rate_buy' => 9214,
                'rate_sell' => 9229,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'GBP',
                'name_source' => 'e-Rate',
                'rate_buy' => 19317,
                'rate_sell' => 19336,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'HKD',
                'name_source' => 'e-Rate',
                'rate_buy' => 1940,
                'rate_sell' => 1947,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'JPY',
                'name_source' => 'e-Rate',
                'rate_buy' => 105,
                'rate_sell' => 105,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'SAR',
                'name_source' => 'e-Rate',
                'rate_buy' => 4044,
                'rate_sell' => 4057,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'CNH',
                'name_source' => 'e-Rate',
                'rate_buy' => 2100,
                'rate_sell' => 2110,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'MYR',
                'name_source' => 'e-Rate',
                'rate_buy' => 3315,
                'rate_sell' => 3331,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'THB',
                'name_source' => 'e-Rate',
                'rate_buy' => 433,
                'rate_sell' => 433,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),

            // Source TT Counter

            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'USD',
                'name_source' => 'TT Counter',
                'rate_buy' => 15070,
                'rate_sell' => 15370,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'SGD',
                'name_source' => 'TT Counter',
                'rate_buy' => 11166,
                'rate_sell' => 11397,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'EUR',
                'name_source' => 'TT Counter',
                'rate_buy' => 16552,
                'rate_sell' => 16929,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'AUD',
                'name_source' => 'TT Counter',
                'rate_buy' => 9802,
                'rate_sell' => 10059,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'DKK',
                'name_source' => 'TT Counter',
                'rate_buy' => 2217,
                'rate_sell' => 2284,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'SEK',
                'name_source' => 'TT Counter',
                'rate_buy' => 1400,
                'rate_sell' => 1446,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'CAD',
                'name_source' => 'TT Counter',
                'rate_buy' => 11187,
                'rate_sell' => 11454,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'CHF',
                'name_source' => 'TT Counter',
                'rate_buy' => 17169,
                'rate_sell' => 17571,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'NZD',
                'name_source' => 'TT Counter',
                'rate_buy' => 9014,
                'rate_sell' => 9286,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'GBP',
                'name_source' => 'TT Counter',
                'rate_buy' => 19119,
                'rate_sell' => 19565,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'HKD',
                'name_source' => 'TT Counter',
                'rate_buy' => 1918,
                'rate_sell' => 1977,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'JPY',
                'name_source' => 'TT Counter',
                'rate_buy' => 103,
                'rate_sell' => 106,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'SAR',
                'name_source' => 'TT Counter',
                'rate_buy' => 4003,
                'rate_sell' => 4110,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'CNH',
                'name_source' => 'TT Counter',
                'rate_buy' => 2019,
                'rate_sell' => 2182,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'MYR',
                'name_source' => 'TT Counter',
                'rate_buy' => 3273,
                'rate_sell' => 3360,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'THB',
                'name_source' => 'TT Counter',
                'rate_buy' => 429,
                'rate_sell' => 438,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),

            // Source Bank Notes

            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'USD',
                'name_source' => 'Bank Notes',
                'rate_buy' => 15050,
                'rate_sell' => 15350,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'SGD',
                'name_source' => 'Bank Notes',
                'rate_buy' => 11152,
                'rate_sell' => 11384,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'EUR',
                'name_source' => 'Bank Notes',
                'rate_buy' => 16511,
                'rate_sell' => 16891,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'AUD',
                'name_source' => 'Bank Notes',
                'rate_buy' => 9796,
                'rate_sell' => 10042,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'DKK',
                'name_source' => 'Bank Notes',
                'rate_buy' => 2194,
                'rate_sell' => 2268,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'SEK',
                'name_source' => 'Bank Notes',
                'rate_buy' => 1381,
                'rate_sell' => 1439,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'CAD',
                'name_source' => 'Bank Notes',
                'rate_buy' => 11178,
                'rate_sell' => 11449,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'CHF',
                'name_source' => 'Bank Notes',
                'rate_buy' => 17143,
                'rate_sell' => 17535,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'NZD',
                'name_source' => 'Bank Notes',
                'rate_buy' => 9030,
                'rate_sell' => 9216,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'GBP',
                'name_source' => 'Bank Notes',
                'rate_buy' => 19064,
                'rate_sell' => 19494,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'HKD',
                'name_source' => 'Bank Notes',
                'rate_buy' => 1919,
                'rate_sell' => 1968,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'JPY',
                'name_source' => 'Bank Notes',
                'rate_buy' => 102,
                'rate_sell' => 107,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'SAR',
                'name_source' => 'Bank Notes',
                'rate_buy' => 3958,
                'rate_sell' => 4113,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'CNH',
                'name_source' => 'Bank Notes',
                'rate_buy' => 2046,
                'rate_sell' => 2163,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'MYR',
                'name_source' => 'Bank Notes',
                'rate_buy' => 0,
                'rate_sell' => 0,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
            array(
                'id_currency' => Currency::latest()->value('id'),
                'id_source' => Source::latest()->value('id'),
                'origin_code_currency' => 'IDR',
                'destination_code_currency' => 'THB',
                'name_source' => 'Bank Notes',
                'rate_buy' => 403,
                'rate_sell' => 461,
                'time' => Carbon::now(),
                'status' => 'Active',
            ),
        );

        // CurrencyPair::insert($pair);
        foreach ($pair as $pairs) {
            CurrencyPair::firstOrCreate($pairs);
        }
    }
}
