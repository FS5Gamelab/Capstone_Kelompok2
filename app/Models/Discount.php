<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'applied_to',
        'type',
        'value',
        'max_value',
        'details',
        'product_id',
        'category_id',
        'sub_category_id',
        'brand_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
