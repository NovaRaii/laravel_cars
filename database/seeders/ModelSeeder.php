<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use App\Models\Model;
use App\Models\Maker;
 
 
 
class ModelSeeder extends Seeder
{
 
    const CARS = [
        "Ford"=> ["Focus", "Mondeo", "Kuga"],
        "Toyota"=>["Camry","Hilux","4Rumer","Rav4","Corolla"],
        "Honda"=>["Civic","CRV","Accord","Legend"],
        "Nissan"=>["Micra","Quashqai","Juke","GTR","Skyline"],
        "Volkswagen"=>["Golf","Polo","Passat","Tiguan"]
    ];
 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        foreach(self::CARS as $maker => $models) {
 
            $maker = Maker::where('name', $maker)->firstOrFail();
            $model = new Model();
            $model->maker_id = $maker->id;
       
            foreach($models as $carModel) {
                $model = new Model();
                $model->name = $carModel;
                $model->maker_id = $maker->id;
                $model->save();
            }
        }
    }
}