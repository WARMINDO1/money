<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = array(
            array('code' => 'AFN', 'name' => 'Afghani'),
            array('code' => 'ALL', 'name' => 'Lek'),
            array('code' => 'ANG', 'name' => 'Netherlands Antillian Guilder'),
            array('code' => 'ARS', 'name' => 'Argentine Peso'),
            array('code' => 'AUD', 'name' => 'Australian Dollar'),
            array('code' => 'AWG', 'name' => 'Aruban Guilder'),
            array('code' => 'AZN', 'name' => 'Azerbaijanian Manat'),
            array('code' => 'BAM', 'name' => 'Convertible Marks'),
            array('code' => 'BBD', 'name' => 'Barbados Dollar'),
            array('code' => 'BGN', 'name' => 'Bulgarian Lev'),
            array('code' => 'BMD', 'name' => 'Bermudian Dollar'),
            array('code' => 'BND', 'name' => 'Brunei Dollar'),
            array('code' => 'BOB', 'name' => 'BOV Boliviano Mvdol'),
            array('code' => 'BRL', 'name' => 'Brazilian Real'),
            array('code' => 'BSD', 'name' => 'Bahamian Dollar'),
            array('code' => 'BWP', 'name' => 'Pula'),
            array('code' => 'BYR', 'name' => 'Belarussian Ruble'),
            array('code' => 'BZD', 'name' => 'Belize Dollar'),
            array('code' => 'CAD', 'name' => 'Canadian Dollar'),
            array('code' => 'CHF', 'name' => 'Swiss Franc'),
            array('code' => 'CLP', 'name' => 'CLF Chilean Peso Unidades de fomento'),
            array('code' => 'CNY', 'name' => 'Yuan Renminbi'),
            array('code' => 'COP', 'name' => 'COU Colombian Peso Unidad de Valor Real'),
            array('code' => 'CRC', 'name' => 'Costa Rican Colon'),
            array('code' => 'CUP', 'name' => 'CUC Cuban Peso Peso Convertible'),
            array('code' => 'CZK', 'name' => 'Czech Koruna'),
            array('code' => 'DKK', 'name' => 'Danish Krone'),
            array('code' => 'DOP', 'name' => 'Dominican Peso'),
            array('code' => 'EGP', 'name' => 'Egyptian Pound'),
            array('code' => 'EUR', 'name' => 'Euro'),
            array('code' => 'FJD', 'name' => 'Fiji Dollar'),
            array('code' => 'FKP', 'name' => 'Falkland Islands Pound'),
            array('code' => 'GBP', 'name' => 'Pound Sterling'),
            array('code' => 'GIP', 'name' => 'Gibraltar Pound'),
            array('code' => 'GTQ', 'name' => 'Quetzal'),
            array('code' => 'GYD', 'name' => 'Guyana Dollar'),
            array('code' => 'HKD', 'name' => 'Hong Kong Dollar'),
            array('code' => 'HNL', 'name' => 'Lempira'),
            array('code' => 'HRK', 'name' => 'Croatian Kuna'),
            array('code' => 'HUF', 'name' => 'Forint'),
            array('code' => 'IDR', 'name' => 'Rupiah'),
            array('code' => 'ILS', 'name' => 'New Israeli Sheqel'),
            array('code' => 'IRR', 'name' => 'Iranian Rial'),
            array('code' => 'ISK', 'name' => 'Iceland Krona'),
            array('code' => 'JMD', 'name' => 'Jamaican Dollar'),
            array('code' => 'JPY', 'name' => 'Yen'),
            array('code' => 'KGS', 'name' => 'Som'),
            array('code' => 'KHR', 'name' => 'Riel'),
            array('code' => 'KPW', 'name' => 'North Korean Won'),
            array('code' => 'KRW', 'name' => 'Won'),
            array('code' => 'KYD', 'name' => 'Cayman Islands Dollar'),
            array('code' => 'KZT', 'name' => 'Tenge'),
            array('code' => 'LAK', 'name' => 'Kip'),
            array('code' => 'LBP', 'name' => 'Lebanese Pound'),
            array('code' => 'LKR', 'name' => 'Sri Lanka Rupee'),
            array('code' => 'LRD', 'name' => 'Liberian Dollar'),
            array('code' => 'LTL', 'name' => 'Lithuanian Litas'),
            array('code' => 'LVL', 'name' => 'Latvian Lats'),
            array('code' => 'MKD', 'name' => 'Denar'),
            array('code' => 'MNT', 'name' => 'Tugrik'),
            array('code' => 'MUR', 'name' => 'Mauritius Rupee'),
            array('code' => 'MXN', 'name' => 'MXV Mexican Peso Mexican Unidad de Inversion (UDI)'),
            array('code' => 'MYR', 'name' => 'Malaysian Ringgit'),
            array('code' => 'MZN', 'name' => 'Metical'),
            array('code' => 'NGN', 'name' => 'Naira'),
            array('code' => 'NIO', 'name' => 'Cordoba Oro'),
            array('code' => 'NOK', 'name' => 'Norwegian Krone'),
            array('code' => 'NPR', 'name' => 'Nepalese Rupee'),
            array('code' => 'NZD', 'name' => 'New Zealand Dollar'),
            array('code' => 'OMR', 'name' => 'Rial Omani'),
            array('code' => 'PAB', 'name' => 'USD Balboa US Dollar',),
            array('code' => 'PEN', 'name' => 'Nuevo Sol'),
            array('code' => 'PHP', 'name' => 'Philippine Peso'),
            array('code' => 'PKR', 'name' => 'Pakistan Rupee'),
            array('code' => 'PLN', 'name' => 'Zloty'),
            array('code' => 'PYG', 'name' => 'Guarani'),
            array('code' => 'QAR', 'name' => 'Qatari Rial'),
            array('code' => 'RON', 'name' => 'New Leu'),
            array('code' => 'RSD', 'name' => 'Serbian Dinar'),
            array('code' => 'RUB', 'name' => 'Russian Ruble'),
            array('code' => 'SAR', 'name' => 'Saudi Riyal'),
            array('code' => 'SBD', 'name' => 'Solomon Islands Dollar'),
            array('code' => 'SCR', 'name' => 'Seychelles Rupee'),
            array('code' => 'SEK', 'name' => 'Swedish Krona'),
            array('code' => 'SGD', 'name' => 'Singapore Dollar'),
            array('code' => 'SHP', 'name' => 'Saint Helena Pound'),
            array('code' => 'SOS', 'name' => 'Somali Shilling'),
            array('code' => 'SRD', 'name' => 'Surinam Dollar'),
            array('code' => 'SVC', 'name' => 'USD El Salvador Colon US Dollar'),
            array('code' => 'SYP', 'name' => 'Syrian Pound'),
            array('code' => 'THB', 'name' => 'Baht'),
            array('code' => 'TRY', 'name' => 'Turkish Lira'),
            array('code' => 'TTD', 'name' => 'Trinidad and Tobago Dollar'),
            array('code' => 'TWD', 'name' => 'New Taiwan Dollar'),
            array('code' => 'UAH', 'name' => 'Hryvnia'),
            array('code' => 'USD', 'name' => 'US Dollar'),
            array('code' => 'UYU', 'name' => 'UYI Peso Uruguayo Uruguay Peso en Unidades Indexadas'),
            array('code' => 'UZS', 'name' => 'Uzbekistan Sum'),
            array('code' => 'VEF', 'name' => 'Bolivar Fuerte'),
            array('code' => 'VND', 'name' => 'Dong'),
            array('code' => 'XCD', 'name' => 'East Caribbean Dollar'),
            array('code' => 'YER', 'name' => 'Yemeni Rial'),
            array('code' => 'ZAR', 'name' => 'Rand'),
        );

        Currency::insert($currencies);
        // DB::table(('positions')->insert($positions);
    }
}
