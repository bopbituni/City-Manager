<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
