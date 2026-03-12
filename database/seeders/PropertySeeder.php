<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Property::create([
            'name'=>'Villa',
            'description'=>'Grande villa en bord de mer',
            'price_per_night'=>250.00
        ]);
        \App\Models\Property::create([
            'name'=>'Maison',
            'description'=>'Petite maison montagnarde',
            'price_per_night'=>100.00
        ]);
        \App\Models\Property::create([
            'name'=>'Studio',
            'description'=>'En centre ville',
            'price_per_night'=>150.00
        ]);
    }
}
