<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function estate_transactions(){
        return $this->belongsTo(EstateProductTransaction::class,'estate_transactions_id');
    }
    public function estate_type(){
        return $this->belongsTo(EstateProductType::class,'estate_type_id');
    }
    public function estate_product(){
        return $this->belongsTo(EstateProduct::class,'estate_product_id');
    }
    public function car_type(){
        return $this->belongsTo(CarType::class,'car_type_id');
    }
    public function car_model(){
        return $this->belongsTo(CarModel::class,'car_model_id');
    }
    
}
