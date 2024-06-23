<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'payment_id',
        'address_id',
        'status',
        'archived_at',
        'deleted_at',
    ];

    public function payment()
    {
        return $this->belongsTo(Payments::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
