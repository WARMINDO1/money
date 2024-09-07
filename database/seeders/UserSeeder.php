<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\CurrencyPair;
use App\Models\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Seeder untuk User
        $user = User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin123',
            'email' => 'super123@gmail.com',
            'password' => bcrypt('superadmin123')
            // 'email_verified_at' => Carbon::now(),
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
            // 'password' => bcrypt('syukur123')
        ]);

        // Seeder untuk Permission
        $permissions = [
            // 'role-list',
            // 'role-create',
            // 'role-edit',
            // 'role-delete',
            'currency-list',
            'currency-create',
            'currency-edit',
            'currency-delete',
            'pairs-list',
            'pairs-create',
            'pairs-edit',
            'pairs-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        // Seeder untuk Currency
        $currencies = array(
            // array('code' => 'AFN', 'name' => 'Afghani'),
            // array('code' => 'ALL', 'name' => 'Lek'),
            // array('code' => 'ANG', 'name' => 'Netherlands Antillian Guilder'),
            // array('code' => 'ARS', 'name' => 'Argentine Peso'),
            array('code' => 'AUD', 'name' => 'Australian Dollar'),
            // array('code' => 'AWG', 'name' => 'Aruban Guilder'),
            // array('code' => 'AZN', 'name' => 'Azerbaijanian Manat'),
            // array('code' => 'BAM', 'name' => 'Convertible Marks'),
            // array('code' => 'BBD', 'name' => 'Barbados Dollar'),
            // array('code' => 'BGN', 'name' => 'Bulgarian Lev'),
            // array('code' => 'BMD', 'name' => 'Bermudian Dollar'),
            // array('code' => 'BND', 'name' => 'Brunei Dollar'),
            // array('code' => 'BOB', 'name' => 'BOV Boliviano Mvdol'),
            // array('code' => 'BRL', 'name' => 'Brazilian Real'),
            // array('code' => 'BSD', 'name' => 'Bahamian Dollar'),
            // array('code' => 'BWP', 'name' => 'Pula'),
            // array('code' => 'BYR', 'name' => 'Belarussian Ruble'),
            // array('code' => 'BZD', 'name' => 'Belize Dollar'),
            array('code' => 'CAD', 'name' => 'Canadian Dollar'),
            array('code' => 'CHF', 'name' => 'Swiss Franc'),
            // array('code' => 'CLP', 'name' => 'CLF Chilean Peso Unidades de fomento'),
            // array('code' => 'CNY', 'name' => 'Yuan Renminbi'),
            // array('code' => 'COP', 'name' => 'COU Colombian Peso Unidad de Valor Real'),
            // array('code' => 'CRC', 'name' => 'Costa Rican Colon'),
            // array('code' => 'CUP', 'name' => 'CUC Cuban Peso Peso Convertible'),
            // array('code' => 'CZK', 'name' => 'Czech Koruna'),
            array('code' => 'DKK', 'name' => 'Danish Krone'),
            // array('code' => 'DOP', 'name' => 'Dominican Peso'),
            // array('code' => 'EGP', 'name' => 'Egyptian Pound'),
            array('code' => 'EUR', 'name' => 'Euro'),
            // array('code' => 'FJD', 'name' => 'Fiji Dollar'),
            // array('code' => 'FKP', 'name' => 'Falkland Islands Pound'),
            array('code' => 'GBP', 'name' => 'Pound Sterling'),
            // array('code' => 'GIP', 'name' => 'Gibraltar Pound'),
            // array('code' => 'GTQ', 'name' => 'Quetzal'),
            // array('code' => 'GYD', 'name' => 'Guyana Dollar'),
            array('code' => 'HKD', 'name' => 'Hong Kong Dollar'),
            // array('code' => 'HNL', 'name' => 'Lempira'),
            // array('code' => 'HRK', 'name' => 'Croatian Kuna'),
            // array('code' => 'HUF', 'name' => 'Forint'),
            array('code' => 'IDR', 'name' => 'Rupiah'),
            // array('code' => 'ILS', 'name' => 'New Israeli Sheqel'),
            // array('code' => 'IRR', 'name' => 'Iranian Rial'),
            // array('code' => 'ISK', 'name' => 'Iceland Krona'),
            // array('code' => 'JMD', 'name' => 'Jamaican Dollar'),
            array('code' => 'JPY', 'name' => 'Yen'),
            // array('code' => 'KGS', 'name' => 'Som'),
            // array('code' => 'KHR', 'name' => 'Riel'),
            // array('code' => 'KPW', 'name' => 'North Korean Won'),
            // array('code' => 'KRW', 'name' => 'Won'),
            // array('code' => 'KYD', 'name' => 'Cayman Islands Dollar'),
            // array('code' => 'KZT', 'name' => 'Tenge'),
            // array('code' => 'LAK', 'name' => 'Kip'),
            // array('code' => 'LBP', 'name' => 'Lebanese Pound'),
            // array('code' => 'LKR', 'name' => 'Sri Lanka Rupee'),
            // array('code' => 'LRD', 'name' => 'Liberian Dollar'),
            // array('code' => 'LTL', 'name' => 'Lithuanian Litas'),
            // array('code' => 'LVL', 'name' => 'Latvian Lats'),
            // array('code' => 'MKD', 'name' => 'Denar'),
            // array('code' => 'MNT', 'name' => 'Tugrik'),
            // array('code' => 'MUR', 'name' => 'Mauritius Rupee'),
            // array('code' => 'MXN', 'name' => 'MXV Mexican Peso Mexican Unidad de Inversion (UDI)'),
            array('code' => 'MYR', 'name' => 'Malaysian Ringgit'),
            // array('code' => 'MZN', 'name' => 'Metical'),
            // array('code' => 'NGN', 'name' => 'Naira'),
            // array('code' => 'NIO', 'name' => 'Cordoba Oro'),
            // array('code' => 'NOK', 'name' => 'Norwegian Krone'),
            // array('code' => 'NPR', 'name' => 'Nepalese Rupee'),
            array('code' => 'NZD', 'name' => 'New Zealand Dollar'),
            // array('code' => 'OMR', 'name' => 'Rial Omani'),
            // array('code' => 'PAB', 'name' => 'USD Balboa US Dollar',),
            // array('code' => 'PEN', 'name' => 'Nuevo Sol'),
            array('code' => 'PHP', 'name' => 'Philippine Peso'),
            // array('code' => 'PKR', 'name' => 'Pakistan Rupee'),
            // array('code' => 'PLN', 'name' => 'Zloty'),
            // array('code' => 'PYG', 'name' => 'Guarani'),
            // array('code' => 'QAR', 'name' => 'Qatari Rial'),
            // array('code' => 'RON', 'name' => 'New Leu'),
            // array('code' => 'RSD', 'name' => 'Serbian Dinar'),
            // array('code' => 'RUB', 'name' => 'Russian Ruble'),
            array('code' => 'SAR', 'name' => 'Saudi Riyal'),
            // array('code' => 'SBD', 'name' => 'Solomon Islands Dollar'),
            // array('code' => 'SCR', 'name' => 'Seychelles Rupee'),
            array('code' => 'SEK', 'name' => 'Swedish Krona'),
            array('code' => 'SGD', 'name' => 'Singapore Dollar'),
            // array('code' => 'SHP', 'name' => 'Saint Helena Pound'),
            // array('code' => 'SOS', 'name' => 'Somali Shilling'),
            // array('code' => 'SRD', 'name' => 'Surinam Dollar'),
            // array('code' => 'SVC', 'name' => 'USD El Salvador Colon US Dollar'),
            // array('code' => 'SYP', 'name' => 'Syrian Pound'),
            array('code' => 'THB', 'name' => 'Baht'),
            // array('code' => 'TRY', 'name' => 'Turkish Lira'),
            // array('code' => 'TTD', 'name' => 'Trinidad and Tobago Dollar'),
            // array('code' => 'TWD', 'name' => 'New Taiwan Dollar'),
            // array('code' => 'UAH', 'name' => 'Hryvnia'),
            array('code' => 'USD', 'name' => 'US Dollar'),
            // array('code' => 'UYU', 'name' => 'UYI Peso Uruguayo Uruguay Peso en Unidades Indexadas'),
            // array('code' => 'UZS', 'name' => 'Uzbekistan Sum'),
            // array('code' => 'VEF', 'name' => 'Bolivar Fuerte'),
            // array('code' => 'VND', 'name' => 'Dong'),
            // array('code' => 'XCD', 'name' => 'East Caribbean Dollar'),
            // array('code' => 'YER', 'name' => 'Yemeni Rial'),
            // array('code' => 'ZAR', 'name' => 'Rand'),
        );

        Currency::insert($currencies);

        // Seeder untuk Sources
        $source = array(
            array('name' => 'e-Rate', 'time' => Carbon::now()),
            array('name' => 'TT Counter', 'time' => Carbon::now()),
            array('name' => 'Bank Notes', 'time' => Carbon::now())
        );

        Source::insert($source);

        // // Seeder untuk Currency Pair
        // $statusChoices = ['Active', 'Non Active'];
        // $randomStatus = $statusChoices[array_rand($statusChoices)];

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
        // );

        // CurrencyPair::insert($pair);
    }
}
