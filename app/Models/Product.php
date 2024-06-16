<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'description',
        'size',
        'stock',
        'price',
        'pre_order',
        'image',
        'category_id',
        'brand_id',
        'discount_id',
        'expired_at'
    ];

    protected $casts = [
        'size' => 'array',
        'expired_at' => 'datetime'
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getRouteKeyName()
    {
        return 'code';
    }
}
