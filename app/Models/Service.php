<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "services";
    //
    protected $fillable = [
        'id', 'name', 'detail', 'icon'
    ];

    public function Package()
    {
        return $this->hasMany('App\Models\Package');
    }

    public function Menu()
    {
        return $this->hasMany('App\Models\Menu');
    }

    public function order() {
        return $this->hasMany('App\Models\Order');
    }
}
