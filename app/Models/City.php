<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $connection ="tenant";
    public function districts(){
        return $this->hasMany(District::class,'city_id','id');
    }
}
