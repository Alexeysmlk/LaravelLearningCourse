<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'price', 'img', 'status', 'description'];
    use HasFactory;

    public static function getRealPrice($price){
        return $price/100;
    }
}
