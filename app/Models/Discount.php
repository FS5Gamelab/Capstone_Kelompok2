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
        'type',
        'rules',
        'amount',
        'max_amount',
        'availability',
        'is_global',
        'started_at',
        'expired_at'
    ];

    protected $table = 'discounts';

    protected $casts = [
       'started_at' => 'datetime',
       'expired_at' => 'datetime',
       'archived_at' => 'datetime',
       'deleted_at' => 'datetime',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
