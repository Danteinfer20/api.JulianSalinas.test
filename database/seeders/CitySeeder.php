<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $state = State::first();
        $data = ['Popayán', 'Cali', 'Medellín'];

        foreach ($data as $item) {
            City::create([
                'name' => $item,
                'state_id' => $state->id
            ]);
        }
    }
}