<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'date', 'detail', 'taxes', 'total', 'comments'
    ];

    // Relación Uno a muchos
    public function user()
    {
        return $this->belongsToMany('App\User', 'order_product')
                    ->withPivot('user_id', 'status');
    }

    public function product()
    {
        return $this->belongsToMany('App\Product', 'order_product')
                    ->withPivot('product_id', 'status');
    }
}
