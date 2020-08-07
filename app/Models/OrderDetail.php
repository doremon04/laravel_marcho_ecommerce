<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_id',	'product_id', 'product_attribute_id', 'quantity', 'price',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function productAttribute()
    {
        return $this->belongsTo('App\Models\ProductAttribute', 'product_attribute_id', 'id');
    }
}
