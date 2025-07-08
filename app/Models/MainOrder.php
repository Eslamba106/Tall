<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainOrder extends Model
{
    use HasFactory;
    protected $table = 'main_orders';
    protected $fillable = [
        'customer_id',
        'ads_id',
        'notes',
        'status',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function ads()
    {
        return $this->belongsTo(Ads::class, 'ads_id');
    }
}
