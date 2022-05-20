<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'villages';

    protected $fillable = [
        'name', 'districtId'
    ];

    public function district() {
        return $this->belongsTo('App\Models\District');
    }
}
