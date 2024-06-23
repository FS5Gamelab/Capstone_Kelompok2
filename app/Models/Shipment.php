<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'order_id',
        'number',
        'status',
        'delivery_at',
        'arrived_at',
        'delivered_at',
    ];
}
