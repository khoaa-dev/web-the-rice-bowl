<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    protected $table = "food_categories";
    //
    protected $fillable = [
        'id', 'name'
    ];

    public function Food()
    {
        return $this->hasMany('App\Models\Food');
    }
}
