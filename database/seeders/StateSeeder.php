<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        $country = Country::first();
        $data = ['Cauca', 'Valle del Cauca', 'Antioquia'];

        foreach ($data as $item) {
            State::create([
                'name' => $item,
                'country_id' => $country->id
            ]);
        }
    }
}