<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $source = array(
            array('name' => 'e-Rates'),
            array('name' => 'TT Counter'),
            array('name' => 'Bank Notes')
        );

        Source::insert($source);
    }
}
