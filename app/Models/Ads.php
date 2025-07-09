<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    // public function car_model(){
    //     return $this->belongsTo(CarModel::class,'district_id');
    // }
}
