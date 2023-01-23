<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'price', 'img', 'status', 'description'];

    protected $casts = [
        'status' => 'boolean',
        'properties' => 'array',
    ];

    public function getCreatedDateAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->timezone('Europe/London')
            ->timestamp;
    }

    public static function getRealPrice($price): float|int
    {
        return $price / 100;
    }

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['name'] . " #" . $attributes['id'],
            set: fn($value, $attributes) => [
                'name' => strtoupper($value),
        ]
        );
    }

    //page_price pagePrice
    public function getPagePriceAttribute()
    {
        return $this->attributes['price'] / 100;
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    public function scopeActive($query)
    {
        $query->where('status', 1);
    }

    public function scopeFilter($query, array $categories = [])
    {
        if ($categories) {
            $query->whereIn('category_id', $categories);
        }
    }
}
