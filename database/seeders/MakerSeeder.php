<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Maker;

class MakerSeeder extends Seeder
{
    const MAKERS = [
        'Ford',
        'Toyota',
        'Honda',
        'Nissan',
        'Volkswagen'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::MAKERS as $makers) {
            $maker = new Maker();
            $maker->name = $makers;
            $maker->logo = $makers.'.png';
            $maker->save();
        }


    }
}
