<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    // Tambahkan baris ini
    protected $fillable = [
        'order_id', 
        'product_id', 
        'quantity', 
        'subtotal'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}