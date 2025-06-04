<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function estate_images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
