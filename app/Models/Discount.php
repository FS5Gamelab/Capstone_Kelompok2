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
        'code',
        'applied_to',
        'reference_id',
        'type',
        'value',
        'max_value',
        'details'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'reference_id');
    }

    public function getRouteKeyName()
    {
        return 'code';
    }
}
