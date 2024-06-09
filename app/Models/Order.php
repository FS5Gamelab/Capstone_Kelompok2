<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'address_id',
        'status',
        'archived_at',
        'deleted_at',
    ];
}
