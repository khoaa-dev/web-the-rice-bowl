<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderFood extends Model
{
    protected $table = 'order_food';

    protected $fillable = [
        'orderId', 'foodId'
    ];

    public function food() {
        return $this->belongsTo('App\Model\Food');
    }
}
