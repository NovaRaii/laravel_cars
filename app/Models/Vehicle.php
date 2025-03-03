<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ["maker_id","fuel_id","body_id","model_id","VIN", "Reg_Plate"];
    use HasFactory;
}
