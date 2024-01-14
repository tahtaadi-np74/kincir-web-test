<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelanggan',
        'total_harga',
    ];

    /* many to many relation with pivot table */
    public function product()
    {
        return $this->belongsToMany('App\Models\Product', 'order_details')
                    ->withPivot('qty', 'sum_harga');
    }
}
