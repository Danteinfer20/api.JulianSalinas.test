<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $data = ['Colombia', 'Ecuador', 'España'];

        foreach ($data as $item) {
            Country::create(['nombre_pais' => $item]);
        }
    }
}