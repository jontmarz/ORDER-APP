<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 'description', 'price'
    ];

    // Relación uno a muchos
    public function user()
    {
        return $this->belongsToMany('App\User', 'order_product')
                    ->withPivot('user_id', 'status');
    }

    public function order()
    {
        return $this->belongsToMany('App\Order', 'order_product')
                    ->withPivot('order_id', 'status');
    }
}
