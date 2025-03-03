<?php

namespace Database\Seeders;
use App\Models\Fuel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuelSeeder extends Seeder
{
    const ITEMS = [
        'Diesel',
        'Benzin',
        
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ITEMS as $item) {
            $fuel = new Fuel();
	    $fuel->name = $item;
            $fuel->save();
        }
    }
}
