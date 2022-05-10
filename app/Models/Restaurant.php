<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';

    protected $fillable = [
        'name',
        'phone',
        'openedTime',
        'closedTime',
        'houseNumber',
        'street',
        'food_banner',
        'menu_banner'
    ];
}

