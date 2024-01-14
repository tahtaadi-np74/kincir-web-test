<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'stok'
    ];

    /* many to many relation with pivot table */
    public function order()
    {
        return $this->belongsToMany('App\Models\Order', 'order_details')
                    ->withPivot('qty', 'sum_harga');
    }
}
