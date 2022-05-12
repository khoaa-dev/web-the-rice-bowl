<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'criterias';
    //
    protected $fillable = [
        'content'
    ];

    public function PackageCriteria()
    {
        return $this->hasMany('App\Models\PackageCriteria');
    }
}
