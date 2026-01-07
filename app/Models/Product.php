<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'quantity',
        'price'
    ];

    //derived attribute based on calculation (-_-)
    protected $appends = ['total_value'];

    public function getTotalValueAttribute() {
        return $this->quantity * $this->price;
    }
}
