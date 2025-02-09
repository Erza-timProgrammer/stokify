<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'type',
        'quantity',
        'balance',
        'date',
        'status',
        'notes',
    ];

    /**
     * Get the product associated with the stock transaction.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Get the user who performed the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
