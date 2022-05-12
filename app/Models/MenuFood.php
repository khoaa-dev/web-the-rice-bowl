<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuFood extends Model
{
    protected $table = 'menu_foods';
    //
    protected $fillable = [
        'menuId', 'foodId'
    ];

    public function Menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }

    public function Food()
    {
        return $this->belongsTo('App\Models\Food');
    }
}
