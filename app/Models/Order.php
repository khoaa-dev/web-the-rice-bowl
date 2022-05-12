<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'userId', 'peopleNumber', 'orderDate', 'organizationDate', 'note',
        'paymentId', 'status', 'serviceId', 'packageId'
    ];

    public function PaymentMethod() {
        return $this->belongsTo('App\Models\PaymentMethod');
    }
    public function OrderStatus() {
        return $this->belongsTo('App\Models\OrderStatus');
    }
    public function Service() {
        return $this->belongsTo('App\Models\Service');
    }
    public function User() {
        return $this->belongsTo('App\User');
    }

    public function Package() {
        return $this->belongsTo('App\Models\Package');
    }

    // protected $casts = [
    //     'orderDate' => 'date:Y-m-d',
    //     'organizationDate' => 'datetime:Y-m-d H:i:s',
    // ];

}
