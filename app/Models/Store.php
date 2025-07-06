<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $guarded = [];

        public static function getStore($request){
        $host  = $request->getHost();
        $base  = strstr($host, '.', true); 
        $store = self::where('domains' , $base)->first();
        return $store;
    }
}
