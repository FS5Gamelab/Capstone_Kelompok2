<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'code',
        'name',
        'description',
        'archived_at',
        'deleted_at',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
