<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'name',
        'value',
    ];

    /**
     * Get the product that owns the attribute.
     */
    public function product()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}
